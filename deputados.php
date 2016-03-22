<?php
/**
 * @package Deputados
 * @version 0.0
 */
/*
   Plugin Name: Deputados
   Plugin URI: http://redelivre.org.br
   Description: Plugin for manager a Deputados Content
   Author: Maurilio Atila
   Version: 0.0
   Author URI: https://twitter.com/cabelotaina
 */

defined('ABSPATH') or die('No script kiddies please!');



add_action('init', 'create_deputados');
function create_deputados()
{
	register_post_type('deputados',
			array(
				'labels' => array(
					'name' => __('Deputados', 'deputados'),
					'singular_name' => __('Deputado', 'deputados'),
					'add_new_item' => __('Adicionar Novo Deputado', 'deputados'),
					'edit_item' => __('Editar Deputado', 'deputados'),
					'all_items' => __('Todos os Deputados', 'deputados'),
					'update_item' => __('Atualizar Deputado', 'deputados'),
					'search_items' => __('Buscar Deputados', 'deputados'),
					'menu_name' => __('Deputados', 'deputados'),
					'not_found' => __('Não Encontrado', 'deputados'),
					'not_found_in_trash' => __('Não Encontrado na lixeira', 'deputados'),
					'description' => __('Conjunto de Deputados', 'deputados')
					),
				'public' => true,
				'rewrite' => array(
					'with_front' => false,
					'slug' => 'deputados'
					),
				'menu_icon' => 'dashicons-admin-users',
			     )
				     );
}


function get_metas()
{
	return array(
			array ( 'label' => 'Partido', 'slug'=>'deputado_partido' ,'info' => 'Nenhum Partido Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Email', 'slug'=>'deputado_email' ,'info' => 'Nenhum Email Informado ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Está na Comissão?', 'slug'=>'deputado_comissao' ,'info' =>  'Nenhuma Comissao Informado', 'html' => array ('tag'=> 'select', 'options' => array(
						array ( 'value' => '' , 'content' => 'Selecione' ),
						array ( 'value' => 'Sim' , 'content' => 'Sim' ),
						array ( 'value' => 'Não' , 'content' => 'Não' )))),
			array ( 'label' => 'Voto no Impeachment?', 'slug'=>'deputado_impeachment' ,'info' =>  'Nenhuma Posição de Impeachemnt Informado', 'html' => array ('tag'=> 'select', 'options' => array(
						array ( 'value' => '' , 'content' => 'Selecione' ),
						array ( 'value' => 'A Favor' , 'content' => 'A Favor' ),
						array ( 'value' => 'Contra' , 'content' => 'Contra' ),
						array ( 'value' => 'Indeciso' , 'content' => 'Indeciso' )))),
			array ( 'label' => 'Facebook', 'slug'=>'deputado_facebook' ,'info' => 'Nenhum Facebook Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Twitter', 'slug'=>'deputado_twitter' ,'info' => 'Nenhum Twitter Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Instagram', 'slug'=>'deputado_instagram' ,'info' => 'Nenhum Instagram Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
			array ( 'label' => 'Telefone Gabinete', 'slug'=>'deputado_phone' ,'info' =>  'Nenhum Telefone Informado', 'html' => array ('tag'=> 'input', 'type' => 'text' ) ),
			//array ( 'label' => '', 'slug'=>'' ,'info' => '', 'html' => array ('tag'=> 'textarea', 'rows' => 4 , 'cols' => 50 ) ),
			array ( 'label' => 'Estado', 'slug'=>'deputado_estado' ,'info' =>  'Nenhum Estado Informado', 'html' => array ('tag'=> 'select', 'options' => array(
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
						array ( 'label' => 'Partido', 'slug'=>'deputado_partido' ,'info' =>  'Nenhum Partido Informado', 'html' => array ('tag'=> 'select', 'options' => array(
										array ( 'value' => 'PMDB' , 'content' => 'PARTIDO DO MOVIMENTO DEMOCRÁTICO BRASILEIRO' ) ,
										array ( 'value' => 'PTB' , 'content' => 'PARTIDO TRABALHISTA BRASILEIRO' ) ,
										array ( 'value' => 'PDT' , 'content' => 'PARTIDO DEMOCRÁTICO TRABALHISTA' ) ,
										array ( 'value' => 'PCdoB' , 'content' => 'PARTIDO COMUNISTA DO BRASIL' ) ,
										array ( 'value' => 'PSB' , 'content' => 'PARTIDO SOCIALISTA BRASILEIRO' ) ,
										array ( 'value' => 'PSDB' , 'content' => 'PARTIDO DA SOCIAL DEMOCRACIA BRASILEIRA' ) ,
										array ( 'value' => 'PTC' , 'content' => 'PARTIDO TRABALHISTA CRISTÃO' ) ,
										array ( 'value' => 'PSC' , 'content' => 'PARTIDO SOCIAL CRISTÃO' ) ,
										array ( 'value' => 'PRP' , 'content' => 'PARTIDO REPUBLICANO PROGRESSISTA' ) ,
										array ( 'value' => 'PPS' , 'content' => 'PARTIDO POPULAR SOCIALISTA' ) ,
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
										array ( 'value' => 'PSOL' , 'content' => 'PARTIDO SOCIALISMO E LIBERDADE' ) ,
										array ( 'value' => 'PR' , 'content' => 'PARTIDO DA REPÚBLICA' )
											)
											)
											)
											); 


}

function deputados_the_meta()
{
	the_meta();
}

add_action("loop_end", "deputados_the_meta");

function deputados_change_post_placeholder($title)
{
	$screen = get_current_screen();
	if ('deputados' == $screen->post_type) {
		$title = 'Insira o nome do deputado';
	}
	return $title;
}

add_filter('enter_title_here', 'deputados_change_post_placeholder');

add_action('pre_get_posts', 'add_deputados_to_query');

function add_deputados_to_query($query)
{
	if (is_home() && $query->is_main_query())
		$query->set('post_type', array('post', 'page', 'deputados'));
	return $query;
}

add_action('admin_menu', 'deputados_meta_box');
add_action('save_post', 'save_deputados_meta_box', 10, 2);

function deputados_meta_box()
{
	add_meta_box('Deputado-meta-box', 'Informações Complementares', 'display_Deputado_meta_box', 'deputados', 'normal', 'high');
}

function display_deputado_meta_box($object, $box)
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

				foreach ($meta['html']['options'] as $option) {
					?>
						<option value="<?php echo $option['value'] ?>" <?php echo esc_html(get_post_meta($object->ID, $meta['slug'] , true), 1) === $option['value'] ? 'selected' : ''; ?> ><?php echo $option['content'] ?></option>
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

function save_deputados_meta_box($post_id, $post)
{
	if (!current_user_can('edit_post', $post_id))
		return;

	$metas = get_metas();
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

add_filter('manage_deputados_posts_columns', 'filter_deputados_columns');

function filter_deputados_columns($columns)
{
	// this will add the column to the end of the array
	$metas = get_metas();
	foreach ( $metas as $meta)
	{
		$columns[$meta['slug']] = $meta['label'];
	}
	return $columns;
}

add_action('manage_posts_custom_column', 'action_custom_columns_content', 10, 2);

function action_custom_columns_content($column_id, $post_id)
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
function userpage_rewrite_add_var( $vars ) {
	$vars[] = 'deputados';
	return $vars;
}
add_filter( 'query_vars', 'userpage_rewrite_add_var' );

// Create the rewrites
function userpage_rewrite_rule() {
	add_rewrite_tag( '%deputados%', '([^&]+)' );
	add_rewrite_rule(
			'^deputados',
			'index.php?deputados',
			'top'
			);
}
add_action('init','userpage_rewrite_rule');

// Catch the URL and redirect it to a template file
function userpage_rewrite_catch() {
	global $wp_query;
	if ( array_key_exists( 'deputados', $wp_query->query_vars ) ) {
		include ( ABSPATH . 'wp-content/plugins/deputados/deputados_list.php');
		exit;
	}
}
add_action( 'template_redirect', 'userpage_rewrite_catch' );

// Filter wp_nav_menu() to add additional links and other output
function new_nav_menu_items($items) {
	$deputados_link = '<li class="deputados"><a href="' . home_url( '/deputados' ) . '">' . __('Deputados') . '</a></li>';
	// add the home link to the end of the menu
	$items = $items . $deputados_link;
	return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );

//options page
add_action( 'admin_menu', 'deputados_custom_admin_menu' );

function deputados_custom_admin_menu() {
	add_options_page(
			'Configurações dos Deputados',
			'Configurações dos Deputados',
			'manage_options',
			'deputados',
			'deputados_options_page'
			);

}

function deputados_options_page() {
	?>
		<div class="wrap">
		<h2>Configurações Deputados</h2>
		Futura Página de Configurações do Plugin Deputados 
		</div>
		<?php
}

?>
