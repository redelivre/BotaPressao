<?php

// PHP 5.3 and later:
namespace BotaPressao;

class SettingsPage
{
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Add options page
	 */
	public function add_settings_page()
	{
		// These will be under "Tools"
		add_management_page(
				__('Importar politicos de um csv','botapressao'),
				__('Importar politicos de um csv','botapressao'),
				'import',
				'botapressao-import-file',
				array($this, 'create_admin_page')
				);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page()
	{
		// Set class property
		$this->options = get_option( 'botapressao_plugin_options', array() );
		?>
			<div class="wrap">
			<h2><?php _e('Configurações do Plugin BotaPressao de Cultura', 'botapressaodecultura') ?></h2>           
			<form id="botapressao_csv_import_form" method="post" action="options.php">
			<?php
			// This prints out all hidden setting fields
			settings_fields( 'botapressao_option_group' );   
		do_settings_sections( 'botapressao-setting-admin' );
		echo '<b>'.__('Arquivo a importar:', 'botapressao').'</b>';
		echo '<input id="botapressao-import-csv" '
			. 'name="botapressao-import-csv" type="file">';
		submit_button("Importar Csv", 'secundary', 'importcsv' );
		submit_button();
		//<input type="hidden" name="action" value="ImportarCsv" >
		?>
			</form>
			<div id="result">
			</div>
			</div>
			<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init()
	{        
		register_setting(
				'botapressao_option_group', // Option group
				'botapressao_plugin_options', // Option name
				array( $this, 'sanitize' ) // Sanitize
				);


		if(array_key_exists('page', $_REQUEST) && $_REQUEST['page'] == 'botapressao-import-file')
		{
			$path = plugin_dir_url(__FILE__) ;
			wp_register_script('botapressao_options_scripts', $path . '/js/botapressao_options_scripts.js', array('jquery'));

			wp_enqueue_script('botapressao_options_scripts');

			wp_localize_script( 'botapressao_options_scripts', 'botapressao_options_scripts_object',
					array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
		}
		add_action( 'wp_ajax_ImportarCsv', array($this, 'ImportarCsv_callback') );
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input )
	{
		$new_input = array();


		return $new_input;
	}

	/** 
	 * Print the Section text
	 */
	public function print_section_info()
	{
		_e('Configurações personalizadas do Plugin: Bota Pressão', 'botapressaodecultura');
	}

	public function fetch_remote_file( $url, $post ) {

		global $url_remap;

		// extract the file name and extension from the url
		$file_name = basename( $url );

		// get placeholder file in the upload dir with a unique, sanitized filename
		$upload = wp_upload_bits( $file_name, 0, '',
				array_key_exists('upload_date', $post) ? $post['upload_date'] : null );
		if ( $upload['error'] )
			return new WP_Error( 'upload_dir_error', $upload['error'] );

		// fetch the remote url and write it to the placeholder file
		$headers = wp_get_http( $url, $upload['file'] );

		// request failed
		if ( ! $headers ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', __('Remote server did not respond', 'wordpress-importer') );
		}

		// make sure the fetch was successful
		if ( $headers['response'] != '200' ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', sprintf( __('Remote server returned error response %1$d %2$s', 'wordpress-importer'), esc_html($headers['response']), get_status_header_desc($headers['response']) ) );
		}

		$filesize = filesize( $upload['file'] );

		if ( isset( $headers['content-length'] ) && $filesize != $headers['content-length'] ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', __('Remote file is incorrect size', 'wordpress-importer') );
		}

		if ( 0 == $filesize ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', __('Zero size file downloaded', 'wordpress-importer') );
		}


		// keep track of the old and new urls so we can substitute them later
		$url_remap[$url] = $upload['url'];


		return $upload;
	}

	protected $logfilename = 'csv_import.log';

	public static function log($msn, $print_r = false)
	{
		if($print_r)
		{
			print_r($msn);
			file_put_contents("/tmp/csv_import.log", print_r($msn, true), FILE_APPEND);
		}
		else
		{
			echo $msn;
			$msn = str_replace("<br/>", "\n", $msn);
			$msn = str_replace("<br>", "\n", $msn);
			file_put_contents("/tmp/csv_import.log", $msn, FILE_APPEND);
		}
	}

	public static function newLog()
	{
		file_put_contents("/tmp/csv_import.log", date('Y-m-d').'\n');
	}

	public function ImportarCsv_callback()
	{
		SettingsPage::newLog();

		echo '<div id="result">';

		//print_r($_POST);print_r($_FILES);die();

		if (!array_key_exists('file-0', $_FILES)
				|| !array_key_exists('tmp_name', $_FILES['file-0'])
				|| $_FILES['file-0']['error'])
		{
			_e('CSV inválido', 'botapressao');
			die;
		}

		$file = fopen($_FILES['file-0']['tmp_name'], 'r');

		$debug = false;
		$begin = 1;
		$header_size = 1; //Header size
		$header_n = 1; // Header slugs on
		$id_column = 0;
		$last_column = 9;
		$sep = ','; // field csv separator

		$ids = array();

		ini_set("memory_limit", "2048M");
		set_time_limit(0);

		$names = array();

		$coords = array();

		for ($i = 0; $i < $header_size; $i++) // first n lines has header
		{
			$row = fgetcsv( $file, 0, $sep);

			if ($row === false)
			{
				_e('CSV inválido', 'botapressao');
				die;
			}

			$names[$i] = $row;
		}
		for ($i = 0; $i < $begin; $i++) // move pointer to begin of data
		{
			$row = fgetcsv( $file, 0, $sep);
		}
		SettingsPage::log('<pre>');

		$row = fgetcsv( $file, 0, $sep);
		$i = 0;
		do
		{
			if(count($ids) > 0) // have ids limit
			{
				while ($row !== false && !in_array($row[$id_column], $ids)) // locate next valid id 
				{
					$row = fgetcsv( $file, 0, $sep);
				}
				if($row === false) break;
			}
			$post = array(
					'post_author'    => 1, //The user ID number of the author.
					'post_content'   => '',
					'post_title'     => $row[0], //The title of your post.
					'post_type'      => 'politicos',
					'post_status'	 => 'publish'
				     );

			$post_id = 0;
			if(!$debug) $post_id = wp_insert_post($post);
			foreach( $names as $name )
			{
				foreach ($name as $key => $value){
					if($debug)
					{
						self::log("update_post_meta($post_id, ".$value." ,".$row[$key].");<br/>");
					}
					else 
					{
						//var_dump( wp_upload_dir()['baseurl']);
						//echo "(" . $value . ": " . $row[$key] . "<br>";
						if ($value=="title") continue;
						else if($value=="politico_picture")
							update_post_meta($post_id, $value ,wp_upload_dir()['baseurl']."/politicos/".$row[$key]);
						else
							update_post_meta($post_id, $value ,$row[$key]);
					}
				}
			}

			$row = fgetcsv( $file, 0, $sep);
			$i++;
		} while ($row !== false);// && $i < 10);
		SettingsPage::log('</pre>');
		fclose ( $file );
		echo '</div>';
		die();
	}

}

if( is_admin() )
	$botapressao_settings_page = new \BotaPressao\SettingsPage();
