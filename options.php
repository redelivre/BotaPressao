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
			__('Importar/Exportar politicos do arquivo','botapressao'),
			__('Importar/Exportar politicos do arquivo','botapressao'),
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
    	if(function_exists('mapasdevista_get_coords') )
    	{
    		//include_once dirname(__FILE__).'/Tratar.php';
    		
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
    		$getLocation = true; // try to get location from google maps api
    		$begin = 0;
    		$header_size = 2; //Header size
    		$header_n = 1; // Header slugs on
    		$id_column = 0;
    		$last_column = 16;
    		$sep = ','; // field csv separator
    		$no_import = array(1, 12, 13); // do not import this columns 
    		
    		$ids = array();
    		
    		$pins_args = array (
	    		'post_type' => 'attachment',
				'meta_key' => '_pin_anchor',
        		'posts_per_page' => '-1'
	    	);
			$pinsTodos = get_posts($pins_args);
			
			$pins = array();
			
			foreach ($pinsTodos as $pin)
			{
				/**
				 * Set default mark for type
				 */
				/*switch ($pin->post_name)
				{
					case 'deputado-png':
						$pins['Deputado Federal'] = $pin->ID;
						$pins['Deputado Estadual'] = $pin->ID;
					break;
				}*/
			}
			
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
	    				'post_title'     => $row[1], //The title of your post.
	    				'post_type'      => 'politicos',
	    				'post_status'	 => 'publish'
	    		);
	    
				$post_id = 0;
	    		if(!$debug) $post_id = wp_insert_post($post);
	    
	    		$location = false;
	    		
	    		if(count($coords) > 0)
	    		{
	    			$location = $coords[$row[3]];
	    		}
	    		
	    		if($getLocation && $location === false)
	    		{
		    		$location = mapasdevista_get_coords($row[3]); // Município do politico
	    		}
	    		
	    		if($debug)
	    		{
	    			self::log($post, true);
	    			
	    			if($location !== false) self::log("{$row[3]};{$location['lat']};{$location['lon']}");
	    			else self::log("$row[3] -> politico não encontrado");
	    			
	    			self::log('<br/>');
	    		}
	    		else
	    		{
	    			if($location !== false)
	    			{
	    				self::log("{$row[3]};{$location['lat']};{$location['lon']}"); // exportar lat e lon
	    				self::log('<br/>');
	    				update_post_meta($post_id, '_mpv_location', $location);
	    			}
	    			else 
	    			{
	    				self::log("$row[3] -> politico não encontrado");
	    				self::log('<br/>');
	    			}
	    		}
	    		
	    		$picture_meta = get_post_meta( $post_id, 'politico_picture', true);
	    		
	    		if(empty($picture_meta))
	    		{
	    			$id = get_post_meta($post_id, 'politico_id_planilha', true);
	    			$upload = wp_upload_dir();
	    			if( !empty($id) && file_exists($upload['basedir']."/fotos/".$id.".jpg"))
	    			{
	    				$picture_meta = $upload['baseurl']."/fotos/".$id.".jpg";
	    				update_post_meta( $post_id, 'politico_picture', $picture_meta);
	    			}
	    		}
	    		
    			if(!$debug && is_int($post_id) && count($pins) > 0 )
    			{
    				update_post_meta($post_id, '_mpv_pin', $pins[$row[0]]);
    					
    				delete_post_meta($post_id, '_mpv_inmap');
    				delete_post_meta($post_id, '_mpv_in_img_map');
    				add_post_meta($post_id, "_mpv_inmap", 1);
    			}
    			elseif(count($pins) > 0)
    			{
    				self::log("Pin: {$pins[$row[0]]}");
    				self::log('<br/>');
    			}
    			
    			foreach ($row as $key => $custom_field)
    			{
    				/*if($key > 22 && $key < 44) // jump a column
    				{
    					continue;
    				}*/
    				if($key > $last_column) // last column
    				{
    					break;
    				}
    				
    				if(!in_array($key, $no_import))
    				{
    					$h = ''; // "prefix" nome da coluna
    					if($debug)
    					{
    						self::log("update_post_meta($post_id, ".$h.$names[$header_n][$key].", $custom_field);<br/>");
    					}
    					else 
    					{
    						update_post_meta($post_id, $h.$names[$header_n][$key], $custom_field);
    					}
    				}
    			}
    			
    			
    			/**
				 * Taxonomies
    			 *
    			Tratar::tipo($post_id, 'tipo', $row[0]);
    			*/
	    
	    		$row = fgetcsv( $file, 0, $sep);
	    		$i++;
	    	} while ($row !== false);// && $i < 10);
	    	SettingsPage::log('</pre>');
	    	fclose ( $file );
    	}
    	echo '</div>';
    	die();
    }

}

if( is_admin() )
    $botapressao_settings_page = new \BotaPressao\SettingsPage();
