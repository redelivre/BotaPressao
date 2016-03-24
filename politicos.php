<?php
/**
 * @package Politicos
 * @version 0.0
 */
/*
   Plugin Name: Politicos
   Plugin URI: http://redelivre.org.br
   Description: Plugin for manager a Politicos Content
   Author: Maurilio Atila
   Version: 0.0
   Author URI: https://twitter.com/cabelotaina
 */

defined('ABSPATH') or die('No script kiddies please!');
define( 'POLITICOS_PATH', plugin_dir_path( __FILE__ ) );


add_action('init', 'create_politicos');
function create_politicos()
{
	register_post_type('politicos',
			array(
				'labels' => array(
					'name' => __('Politicos', 'politicos'),
					'singular_name' => __('Politico', 'politicos'),
					'add_new_item' => __('Adicionar Novo Politico', 'politicos'),
					'edit_item' => __('Editar Politico', 'politicos'),
					'all_items' => __('Todos os Politicos', 'politicos'),
					'update_item' => __('Atualizar Politico', 'politicos'),
					'search_items' => __('Buscar Politicos', 'politicos'),
					'menu_name' => __('Politicos', 'politicos'),
					'not_found' => __('Não Encontrado', 'politicos'),
					'not_found_in_trash' => __('Não Encontrado na lixeira', 'politicos'),
					'description' => __('Conjunto de Politicos', 'politicos')
					),
				'public' => true,
				'rewrite' => array(
					'with_front' => false,
					'slug' => 'politicos'
					),
				'menu_icon' => 'dashicons-admin-users',
			     )
				     );
}


function get_metas()
{
	return array(
			array ( 'label' => 'Email', 'slug'=>'politico_email' ,'info' => 'Nenhum Email Informado ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Está na Comissão?', 'slug'=>'politico_comissao' ,'info' =>  'Nenhuma Comissao Informado', 'html' => array ('tag'=> 'select', 'options' => array(
						array ( 'value' => '' , 'content' => 'Selecione' ),
						array ( 'value' => 'Sim' , 'content' => 'Sim' ),
						array ( 'value' => 'Não' , 'content' => 'Não' )))),
			array ( 'label' => 'Voto no Impeachment?', 'slug'=>'politico_impeachment' ,'info' =>  'Nenhuma Posição de Impeachemnt Informado', 'html' => array ('tag'=> 'select', 'options' => array(
						array ( 'value' => '' , 'content' => 'Selecione' ),
						array ( 'value' => 'A Favor' , 'content' => 'A Favor' ),
						array ( 'value' => 'Contra' , 'content' => 'Contra' ),
						array ( 'value' => 'Indeciso' , 'content' => 'Indeciso' )))),
			array ( 'label' => 'Facebook', 'slug'=>'politico_facebook' ,'info' => 'Nenhum Facebook Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Twitter', 'slug'=>'politico_twitter' ,'info' => 'Nenhum Twitter Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Instagram', 'slug'=>'politico_instagram' ,'info' => 'Nenhum Instagram Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Telefone Gabinete', 'slug'=>'politico_phone' ,'info' =>  'Nenhum Telefone Informado', 'html' => array ('tag'=> 'input', 'type' => 'text' ) ),
			//array ( 'label' => '', 'slug'=>'' ,'info' => '', 'html' => array ('tag'=> 'textarea', 'rows' => 4 , 'cols' => 50 ) ),
			array ( 'label' => 'Estado', 'slug'=>'politico_estado' ,'info' =>  'Nenhum Estado Informado', 'html' => array ('tag'=> 'select', 'options' => array(
						array ( 'value' => '' , 'content' => 'Selecione' ),
						array ( 'value' => 'AC' , 'content' => 'Acre' ),
						array ( 'value' => 'AL' , 'content' => 'Alagoas' ),
						array ( 'value' => 'AP' , 'content' => 'Amapá' ),
						array ( 'value' => 'AM' , 'content' => 'Amazonas' ),
						array ( 'value' => 'BA' , 'content' => 'Bahia' ),
						array ( 'value' => 'CE' , 'content' => 'Ceará' ),
						array ( 'value' => 'DF' , 'content' => 'Distrito Federal' ),
						array ( 'value' => 'ES' , 'content' => 'Espirito Santo' ),
						array ( 'value' => 'GO' , 'content' => 'Goiás' ),
						array ( 'value' => 'MA' , 'content' => 'Maranhão' ),
						array ( 'value' => 'MS' , 'content' => 'Mato Grosso do Sul' ),
						array ( 'value' => 'MT' , 'content' => 'Mato Grosso' ),
						array ( 'value' => 'MG' , 'content' => 'Minas Gerais' ),
						array ( 'value' => 'PA' , 'content' => 'Pará' ),
						array ( 'value' => 'PB' , 'content' => 'Paraíba' ),
						array ( 'value' => 'PR' , 'content' => 'Paraná' ),
						array ( 'value' => 'PE' , 'content' => 'Pernambuco' ),
						array ( 'value' => 'PI' , 'content' => 'Piauí' ),
						array ( 'value' => 'RJ' , 'content' => 'Rio de Janeiro' ),
						array ( 'value' => 'RN' , 'content' => 'Rio Grande do Norte' ),
						array ( 'value' => 'RS' , 'content' => 'Rio Grande do Sul' ),
						array ( 'value' => 'RO' , 'content' => 'Rondônia' ),
						array ( 'value' => 'RR' , 'content' => 'Roraima' ),
						array ( 'value' => 'SC' , 'content' => 'Santa Catarina' ),
						array ( 'value' => 'SP' , 'content' => 'São Paulo' ),
						array ( 'value' => 'SE' , 'content' => 'Sergipe' ),
						array ( 'value' => 'TO' , 'content' => 'Tocantins' )
							)
							)
							),
						array ( 'label' => 'Partido', 'slug'=>'politico_partido' ,'info' =>  'Nenhum Partido Informado', 'html' => array ('tag'=> 'select', 'options' => array(
										array ( 'value' => '' , 'content' => 'Selecione' ),
										array ( 'value' => 'PMDB' , 'content' => 'PARTIDO DO MOVIMENTO DEMOCRÁTICO BRASILEIRO' ) ,
										array ( 'value' => 'PTB' , 'content' => 'PARTIDO DO MOVIMENTO DEMOCRÁTICO BRASILEIRO' ) ,
										array ( 'value' => 'PDT' , 'content' => 'PARTIDO DEMOCRÁTICO TRABALHISTA' ) ,
										array ( 'value' => 'PT' , 'content' => 'PARTIDO DOS TRABALHADORES' ) ,
										array ( 'value' => 'DEM' , 'content' => 'DEMOCRATAS' ) ,
										array ( 'value' => 'PCdoB' , 'content' => 'PARTIDO COMUNISTA DO BRASIL' ) ,
										array ( 'value' => 'PSB' , 'content' => 'PARTIDO SOCIALISTA BRASILEIRO' ) ,
										array ( 'value' => 'PSDB' , 'content' => 'PARTIDO DA SOCIAL DEMOCRACIA BRASILEIRA' ) ,
										array ( 'value' => 'PTC' , 'content' => 'PARTIDO TRABALHISTA CRISTÃO' ) ,
										array ( 'value' => 'PSC' , 'content' => 'PARTIDO SOCIAL CRISTÃO' ) ,
										array ( 'value' => 'PMN' , 'content' => 'PARTIDO DA MOBILIZAÇÃO NACIONAL' ) ,
										array ( 'value' => 'PRP' , 'content' => 'PARTIDO REPUBLICANO PROGRESSISTA' ) ,
										array ( 'value' => 'PPS' , 'content' => 'PARTIDO POPULAR SOCIALISTA' ) ,
										array ( 'value' => 'PV' , 'content' => 'PARTIDO VERDE' ) ,
										array ( 'value' => 'PTdoB' , 'content' => 'PARTIDO TRABALHISTA DO BRASIL' ) ,
										array ( 'value' => 'PP' , 'content' => 'PARTIDO PROGRESSISTA' ) ,
										array ( 'value' => 'PSTU' , 'content' => 'PARTIDO SOCIALISTA DOS TRABALHADORES UNIFICADO' ) ,
										array ( 'value' => 'PCB' , 'content' => 'PARTIDO COMUNISTA BRASILEIRO' ) ,
										array ( 'value' => 'PRTB' , 'content' => 'PARTIDO RENOVADOR TRABALHISTA BRASILEIRO' ) ,
										array ( 'value' => 'PHS' , 'content' => 'PARTIDO HUMANISTA DA SOLIDARIEDADE' ) ,
										array ( 'value' => 'PSDC' , 'content' => 'PARTIDO SOCIAL DEMOCRATA CRISTÃO' ) ,
										array ( 'value' => 'PCO' , 'content' => 'PARTIDO DA CAUSA OPERÁRIA' ) ,
										array ( 'value' => 'PTN' , 'content' => 'PARTIDO TRABALHISTA NACIONAL' ) ,
										array ( 'value' => 'PSL' , 'content' => 'PARTIDO SOCIAL LIBERAL' ) ,
										array ( 'value' => 'PRB' , 'content' => 'PARTIDO REPUBLICANO BRASILEIRO' ) ,
										array ( 'value' => 'PSOL' , 'content' => 'PARTIDO SOCIALISMO E LIBERDADE' ) ,
										array ( 'value' => 'PR' , 'content' => 'PARTIDO DA REPÚBLICA' ) ,
										array ( 'value' => 'PSD' , 'content' => 'PARTIDO SOCIAL DEMOCRÁTICO' ) ,
										array ( 'value' => 'PPL' , 'content' => 'PARTIDO PÁTRIA LIVRE' ) ,
										array ( 'value' => 'PEN' , 'content' => 'PARTIDO ECOLÓGICO NACIONAL' ) ,
										array ( 'value' => 'PROS' , 'content' => 'PARTIDO REPUBLICANO DA ORDEM SOCIAL' ) ,
										array ( 'value' => 'SD' , 'content' => 'SOLIDARIEDADE' ) ,
										array ( 'value' => 'NOVO' , 'content' => 'PARTIDO NOVO' ) ,
										array ( 'value' => 'REDE' , 'content' => 'REDE SUSTENTABILIDADE' ) ,
										array ( 'value' => 'PMB' , 'content' => 'PARTIDO DA MULHER BRASILEIRA' )
											)
											)
											),
										array ( 'label' => 'Cargo Politico', 'slug'=>'politico_cargo' ,'info' =>  'Nenhum Cargo Informado', 'html' => array ('tag'=> 'select', 'options' => array(
														array ( 'value' => '' , 'content' => 'Selecione' ),
														array ( 'value' => 'DF' , 'content' => 'Deputado Federal' ) ,
														array ( 'value' => 'SE' , 'content' => 'Senador' ) ,
														array ( 'value' => 'DE' , 'content' => 'Deputado Estadual' ) ,
														array ( 'value' => 'VR' , 'content' => 'Vereador' ) ,
														array ( 'value' => 'PR' , 'content' => 'Presidente' ) ,
														array ( 'value' => 'GV' , 'content' => 'Governador' ) ,
														array ( 'value' => 'PF' , 'content' => 'Prefeito' ) ,
														)
													)
										      )
											); 


}

function get_jobs()
{
	return array (
                           array ( 'DF' => 'Deputado Federal' ) ,
	                   array ( 'SE' => 'Senador' ) ,
	                   array ( 'DE' => 'Deputado Estadual' ) ,
	                   array ( 'VR' => 'Vereador' ) ,
	                   array ( 'PR' => 'Presidente' ) ,
	                   array ( 'GV' => 'Governador' ) ,
	                   array ( 'PF' => 'Prefeito' ) 
                      );

}

function politicos_the_meta($post)
{
	if( !is_object($post) ) return;
	$post = $post->queried_object;
	if (isset($post->post_type) && $post->post_type!="politicos") return; 
	if (isset($post->post_type) && $post->post_type=="politicos") 
	{
		$job = get_jobs();
		?>


			<ul class="post-meta">
			<li><span class="post-meta-key">Email:</span>
			<a href="mailto:<?php print_r(get_post_meta( $post->ID, 'politico_email', true)); ?>?subject=Excelentissimo%20<?php echo get_post_meta( $post->ID, 'politico_cargo', true); ?>%20<?php echo get_the_title(); ?>&body=Excelentissimo%20<?php echo $job[0][get_post_meta( $post->ID, 'politico_cargo', true)]; ?>%20<?php echo get_the_title(); ?>,%20...">
			<?php print_r(get_post_meta( $post->ID, 'politico_email', true)); ?>
			</a>
			</li>
			<li><span class="post-meta-key">Esta na Comissão:</span><?php print_r(get_post_meta( $post->ID, 'politico_comissao', true)); ?></li>
			<li><span class="post-meta-key">Voto no Impeachment?</span><?php print_r(get_post_meta( $post->ID, 'politico_impeachment', true)); ?></li>
			<li><span class="post-meta-key">Facebook</span><?php echo get_post_meta( $post->ID, 'politico_facebook', true); ?></li>
			<li><span class="post-meta-key">Twitter:</span><?php echo get_post_meta( $post->ID, 'politico_twitter', true); ?></li>
			<li><span class="post-meta-key">Instagram:</span><?php echo get_post_meta( $post->ID, 'politico_instagram', true); ?></li>
			<li><span class="post-meta-key">Telefone Gabinete:</span><?php echo get_post_meta( $post->ID, 'politico_phone', true); ?></li>
			<li><span class="post-meta-key">Estado:</span><?php echo get_post_meta( $post->ID, 'politico_estado', true); ?></li>
			<li><span class="post-meta-key">Partido:</span><?php echo get_post_meta( $post->ID, 'politico_partido', true); ?></li>
			<li><span class="post-meta-key">Partido:</span><?php echo get_post_meta( $post->ID, 'politico_cargo', true); ?></li>
			</ul>
			<?php
	}
}

add_action("loop_end", "politicos_the_meta");

function politicos_change_post_placeholder($title)
{
	$screen = get_current_screen();
	if ('politicos' == $screen->post_type) {
		$title = 'Insira o nome do deputado';
	}
	return $title;
}

add_filter('enter_title_here', 'politicos_change_post_placeholder');

add_action('pre_get_posts', 'add_politicos_to_query');

function add_politicos_to_query($query)
{
	if (is_home() && $query->is_main_query())
		$query->set('post_type', array('post', 'page', 'politicos'));
	return $query;
}

add_action('admin_menu', 'politicos_meta_box');
add_action('save_post', 'save_politicos_meta_box', 10, 2);

function politicos_meta_box()
{
	add_meta_box('deputado-meta-box', 'Informações Complementares', 'display_politico_meta_box', 'politicos', 'normal', 'high');
	add_meta_box('deputado-picture-meta-box', 'Imagem', 'display_politico_picture_meta_box', 'politicos', 'normal', 'high');

}

function display_politico_picture_meta_box($post)
{
	// jQuery
	wp_enqueue_script('jquery');
	// This will enqueue the Media Uploader script
	wp_enqueue_media();
	$picture_meta = get_post_meta( $post->ID, 'politico_picture', true);

	if(empty($picture_meta))
	{
		$id = get_post_meta($post->ID, 'politico_id_planilha', true);
		$upload = wp_upload_dir();
		if( !empty($id) && file_exists($upload['basedir']."/fotos/".$id.".jpg"))
		{
			$picture_meta = $upload['baseurl']."/fotos/".$id.".jpg";
			update_post_meta( $post->ID, 'politico_picture', $picture_meta);
		}
	}
	
	?>
		<p>
		<img id="picture" src="<?php if ( isset ( $picture_meta ) ) echo $picture_meta; ?>">
		<p>
		<p>
		<label for="politico_picture" class="politico_picture"><?php _e( 'Foto', 'politicos' )?></label>
		<input type="text" name="politico_picture" id="politico_picture" value="<?php if ( isset ( $picture_meta ) ) echo $picture_meta; ?>" />
		<input type="button" id="politico_picture_button" class="politico_picture_button" value="<?php _e( 'Escolha uma imagem para o politico', 'politicos' )?>" />
		</p>
		<script type="text/javascript">
		jQuery(document).ready(function($){
				$('#politico_picture_button').click(function(e) {
					e.preventDefault();
					var image = wp.media({ 
title: 'Upload Foto',
// mutiple: true if you want to upload multiple files at once
multiple: false
}).open()
					.on('select', function(e){
						// This will return the selected image from the Media Uploader, the result is an object
						var uploaded_image = image.state().get('selection').first();
						// We convert uploaded_image to a JSON object to make accessing it easier
						// Output to the console uploaded_image
						console.log(uploaded_image);
						var politico_picture = uploaded_image.toJSON().url;
						// Let's assign the url value to the input field
						$('#politico_picture').val(politico_picture);
						});
					});
				});
</script>
<?php
}


function display_politico_meta_box($object, $box)
{ 
	$metas = get_metas();



	foreach($metas as $meta)
	{

		if ($meta['html']['tag'] == 'select')
		{
			?>
				<p>
				<label for="<?php echo $meta['slug'] ?>"><?php echo $meta['label'] ?>:</label>
				<br>
				<select name="<?php echo $meta['slug'] ?>">
				<?php
				setlocale(LC_ALL, "en_US.utf8");
			foreach ($meta['html']['options'] as $option) {
				$content = iconv("utf-8", "ascii//TRANSLIT", $option['content']);
				?>
					<option value="<?php echo $option['value'] ?>" <?php echo esc_html(get_post_meta($object->ID, $meta['slug'] , true), 1) === $option['value'] ? 'selected' : ''; ?> ><?php echo ucwords(strtolower($content)) ?></option>
					<?php
			}
			?>
				</select>
				</p>
				<?php

		}
		else if ( $meta['html']['tag'] == 'input' )
		{
			?>
				<p>
				<label for="<?php echo $meta['slug'] ?>"><?php echo $meta['label'] ?></label>
				<br>
				<input type="<?php echo $meta['html']['type'] ?>" name="<?php echo $meta['slug'] ?>" id="<?php echo $meta['slug'] ?>" style="width:50%"
				value="<?php echo esc_html(get_post_meta($object->ID, $meta['slug'] , true), 1); ?>">
				</p>
				<?php
		}
		else if ( $meta['html']['tag'] == 'textarea' )
		{
			?>
				<p>
				<label for="<?php echo $meta['slug'] ?>"><?php echo $meta['label'] ?></label>
				<br/>
				<textarea name="<?php echo $meta['slug'] ?>" rows="<?php echo $meta['html']['rows']; ?>" cols="<?php echo $meta['html']['cols']; ?>" id="<?php echo $meta['slug'] ?>" style="width:50%" ><?php echo esc_html(get_post_meta($object->ID, $meta['slug'] , true), 1); ?></textarea>
				</p>
				<?php
		}
	} 
	?>
		<input type="hidden" name="my_meta_box_nonce"
		value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>"/>

		<?php }

function save_politicos_meta_box($post_id, $post)
{
	if (!current_user_can('edit_post', $post_id))
		return;

	$metas = get_metas();
	$metas[] = array ( 'slug' => 'politico_picture');
	foreach ( $metas as $meta)
	{
		if (isset($_POST[$meta['slug']])) {
			$meta_striped = stripslashes($_POST[$meta['slug']]);

			if ($meta_striped && '' == get_post_meta($post_id, $meta['slug'], true))
				add_post_meta($post_id, $meta['slug'], $meta_striped, true);

			elseif ($meta_striped != get_post_meta($post_id, $meta['slug'], true))
				update_post_meta($post_id, $meta['slug'], $meta_striped);

			elseif ('' == $meta_striped && get_post_meta($post_id, $meta['slug'], true))
				delete_post_meta($post_id, $meta['slug'], get_post_meta($post_id, $meta['slug'], true));
		}
	}
}

//insert collumns on administration Deputado's page

add_filter('manage_politicos_posts_columns', 'politicos_filter_columns');

function politicos_filter_columns($columns)
{
	// this will add the column to the end of the array
	$metas = get_metas();
	foreach ( $metas as $meta)
	{
		$columns[$meta['slug']] = $meta['label'];
	}
	return $columns;
}

add_action('manage_posts_custom_column', 'politicos_action_custom_columns_content', 10, 2);

function politicos_action_custom_columns_content($column_id, $post_id)
{
	//run a switch statement for all of the custom columns created
	$metas = get_metas();
	foreach ( $metas as $meta)
	{
		if ( $column_id ==  $meta['slug'] )
			echo ($value = get_post_meta($post_id, $meta['slug'], true)) ? $value : $meta['info'];
	}
}


// pages and search system
function politicos_rewrite_add_var( $vars ) {
	$vars[] = 'busca';
	return $vars;
}
add_filter( 'query_vars', 'politicos_rewrite_add_var' );

// Create the rewrites
function politicos_rewrite_rule() {
	add_rewrite_tag( '%busca%', '([^&]+)' );
	add_rewrite_rule(
			'^busca',
			'index.php?busca',
			'top'
			);
}
add_action('init','politicos_rewrite_rule');

// Catch the URL and redirect it to a template file
function politicos_rewrite_catch() {
	global $wp_query;
	if ( array_key_exists( 'busca', $wp_query->query_vars ) ) {
		include ( POLITICOS_PATH . 'politicos_list.php');
		exit;
	}
}
add_action( 'template_redirect', 'politicos_rewrite_catch' );

// Filter wp_nav_menu() to add additional links and other output
function politicos_nav_menu_items($items) {
	$politicos_link = '<li class="politicos"><a href="' . home_url( '/busca' ) . '">' . __('Busca' , 'politicos') . '</a></li>';
	// add the home link to the end of the menu
	$items = $items . $politicos_link;
	return $items;
}
add_filter( 'wp_nav_menu_items', 'politicos_nav_menu_items' );

//options page
add_action( 'admin_menu', 'politicos_custom_admin_menu' );

function politicos_custom_admin_menu() {
	add_options_page(
			'Configurações dos Politicos',
			'Configurações dos Politicos',
			'manage_options',
			'politicos',
			'politicos_options_page'
			);

}

function politicos_options_page() {
	?>
		<div class="wrap">
		<h2>Configurações Politicos</h2>
		Futura Página de Configurações do Plugin Politicos 
		</div>
		<?php
}

require_once dirname(__FILE__)."/options.php"; 

?>
