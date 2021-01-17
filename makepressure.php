<?php
/*
   Plugin Name: Bota Pressão
   Plugin URI: https://github.com/redelivre/botapressao
   Description: Plugin for manager and pressure Public Agent's
   Author: Maurilio Atila
   Version: 0.3
   Author URI: https://github.com/cabelotaina/
 */

defined('ABSPATH') or die('No script kiddies please!');
define( 'MAKE_PRESSURE_PATH', plugin_dir_path( __FILE__ ) );

include_once "makepressure_widget.php";
require_once MAKE_PRESSURE_PATH."/options.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'wp-divi'. DIRECTORY_SEPARATOR .'modules.php';

add_action('init', 'create_public_agent');
function create_public_agent()
{
 $labels = array(
    'name'               => esc_html__( 'Agente Público', 'et_builder' ),
    'singular_name'      => esc_html__( 'Agente Público', 'et_builder' ),
    'add_new'            => esc_html__( 'Adicionar Novo', 'et_builder' ),
    'add_new_item'       => esc_html__( 'Adicionar Novo Agente Público', 'et_builder' ),
    'edit_item'          => esc_html__( 'Editar Agente Público', 'et_builder' ),
    'new_item'           => esc_html__( 'Novo Agente Público', 'et_builder' ),
    'all_items'          => esc_html__( 'Todos os Agentes Públicos', 'et_builder' ),
    'view_item'          => esc_html__( 'Visualizar Agente Público', 'et_builder' ),
    'search_items'       => esc_html__( 'Buscar Agente Público', 'et_builder' ),
    'not_found'          => esc_html__( 'Nada Encontrado', 'et_builder' ),
    'not_found_in_trash' => esc_html__( 'Nada encontrado na Lixeira', 'et_builder' ),
    'parent_item_colon'  => '',
  );

  $args = array(
    'labels'             => $labels,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'can_export'         => true,
    'show_in_nav_menus'  => true,
    'query_var'          => true,
    'has_archive'        => true,
    'rewrite'            => apply_filters( 'et_public_agent_posttype_rewrite_args', array(
      'feeds'            => true,
      'slug'             => 'public_agent',
      'with_front'       => false,
    ) ),
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'author', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' ),
    //'taxonomies'         => array( 'category' ),
    'menu_icon'          =>  'dashicons-businessman',
  );

  register_post_type( 'public_agent', apply_filters( 'et_public_agent_posttype_args', $args ) );

  $labels = array(
          'name'              => esc_html__( 'Estados', 'et_builder' ),
          'singular_name'     => esc_html__( 'Estado', 'et_builder' ),
          'search_items'      => esc_html__( 'Buscar Estados', 'et_builder' ),
          'all_items'         => esc_html__( 'Todas os Estados', 'et_builder' ),
          'parent_item'       => esc_html__( 'Estado Pai', 'et_builder' ),
          'parent_item_colon' => esc_html__( 'Estado Pai:', 'et_builder' ),
          'edit_item'         => esc_html__( 'Editar Estado', 'et_builder' ),
          'update_item'       => esc_html__( 'Atualizar Estado', 'et_builder' ),
          'add_new_item'      => esc_html__( 'Adicionar Novo Estado', 'et_builder' ),
          'new_item_name'     => esc_html__( 'Novo nome do Estado', 'et_builder' ),
          'menu_name'         => esc_html__( 'Estados', 'et_builder' ),
  );

  register_taxonomy( 'public_agent_state', array( 'public_agent' ), array(
          'hierarchical'      => true,
          'labels'            => $labels,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
    )
  );

  $labels = array(
          'name'              => esc_html__( 'Partidos', 'et_builder' ),
          'singular_name'     => esc_html__( 'Partido', 'et_builder' ),
          'search_items'      => esc_html__( 'Buscar Partidos', 'et_builder' ),
          'all_items'         => esc_html__( 'Todas os Partidos', 'et_builder' ),
          'parent_item'       => esc_html__( 'Partido Pai', 'et_builder' ),
          'parent_item_colon' => esc_html__( 'Partido Pai:', 'et_builder' ),
          'edit_item'         => esc_html__( 'Editar Partido', 'et_builder' ),
          'update_item'       => esc_html__( 'Atualizar Partido', 'et_builder' ),
          'add_new_item'      => esc_html__( 'Adicionar Novo Partido', 'et_builder' ),
          'new_item_name'     => esc_html__( 'Novo nome do Partido', 'et_builder' ),
          'menu_name'         => esc_html__( 'Partidos', 'et_builder' ),
  );

  register_taxonomy( 'public_agent_party', array( 'public_agent' ), array(
          'hierarchical'      => true,
          'labels'            => $labels,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
    )
  );

  $labels = array(
          'name'              => esc_html__( 'Cargos', 'et_builder' ),
          'singular_name'     => esc_html__( 'Cargo', 'et_builder' ),
          'search_items'      => esc_html__( 'Buscar Cargos', 'et_builder' ),
          'all_items'         => esc_html__( 'Todas os Cargos', 'et_builder' ),
          'parent_item'       => esc_html__( 'Cargo Pai', 'et_builder' ),
          'parent_item_colon' => esc_html__( 'Cargo Pai:', 'et_builder' ),
          'edit_item'         => esc_html__( 'Editar Cargo', 'et_builder' ),
          'update_item'       => esc_html__( 'Atualizar Cargo', 'et_builder' ),
          'add_new_item'      => esc_html__( 'Adicionar Novo Cargo', 'et_builder' ),
          'new_item_name'     => esc_html__( 'Novo nome do Cargo', 'et_builder' ),
          'menu_name'         => esc_html__( 'Cargos', 'et_builder' ),
  );

  register_taxonomy( 'public_agent_job', array( 'public_agent' ), array(
          'hierarchical'      => true,
          'labels'            => $labels,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
    )
  );

  $labels = array(
          'name'              => esc_html__( 'Gêneros', 'et_builder' ),
          'singular_name'     => esc_html__( 'Gênero', 'et_builder' ),
          'search_items'      => esc_html__( 'Buscar Gêneros', 'et_builder' ),
          'all_items'         => esc_html__( 'Todas os Gêneros', 'et_builder' ),
          'parent_item'       => esc_html__( 'Gênero Pai', 'et_builder' ),
          'parent_item_colon' => esc_html__( 'Gênero Pai:', 'et_builder' ),
          'edit_item'         => esc_html__( 'Editar Gênero', 'et_builder' ),
          'update_item'       => esc_html__( 'Atualizar Gênero', 'et_builder' ),
          'add_new_item'      => esc_html__( 'Adicionar Novo Gênero', 'et_builder' ),
          'new_item_name'     => esc_html__( 'Novo nome do Gênero', 'et_builder' ),
          'menu_name'         => esc_html__( 'Gêneros', 'et_builder' ),
  );

  register_taxonomy( 'public_agent_genre', array( 'public_agent' ), array(
          'hierarchical'      => true,
          'labels'            => $labels,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
    )
  );

  $labels = array(
          'name'              => esc_html__( 'Comissões', 'et_builder' ),
          'singular_name'     => esc_html__( 'Comissão', 'et_builder' ),
          'search_items'      => esc_html__( 'Buscar Comissões', 'et_builder' ),
          'all_items'         => esc_html__( 'Todas os Comissões', 'et_builder' ),
          'parent_item'       => esc_html__( 'Comissão Pai', 'et_builder' ),
          'parent_item_colon' => esc_html__( 'Comissão Pai:', 'et_builder' ),
          'edit_item'         => esc_html__( 'Editar Comissão', 'et_builder' ),
          'update_item'       => esc_html__( 'Atualizar Comissão', 'et_builder' ),
          'add_new_item'      => esc_html__( 'Adicionar Novo Comissão', 'et_builder' ),
          'new_item_name'     => esc_html__( 'Novo nome do Comissão', 'et_builder' ),
          'menu_name'         => esc_html__( 'Comissões', 'et_builder' ),
  );

  register_taxonomy( 'public_agent_commission', array( 'public_agent' ), array(
          'hierarchical'      => true,
          'labels'            => $labels,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
    )
  );
}

function public_agent_get_metas()
{
  $metas = array();

  if ( get_option('makepressure_email_show') ) {
    $metas[] = array ( 'label' => 'Email', 'slug'=>'public_agent_email' ,'info' => __('Nenhum Email Informado ', 'makepressure') , 'html' => array ('tag'=> 'input', 'type' => 'text' ));
  }

  if ( get_option('makepressure_facebook_show') ) {
    $metas[] = array ( 'label' => 'Facebook', 'slug'=>'public_agent_facebook' ,'info' => __('Nenhum Facebook Informado', 'makepressure') , 'html' => array ('tag'=> 'input', 'type' => 'text' ));
  }

  if ( get_option('makepressure_whatsapp_show') ) {
    $metas[] = array ( 'label' => 'WhatsApp', 'slug'=>'public_agent_whatsapp' ,'info' => __('Nenhum WhatsApp Informado', 'makepressure') , 'html' => array ('tag'=> 'input', 'type' => 'text' ));
  }

  if ( get_option('makepressure_twitter_show') ) {
    $metas[] = array ( 'label' => 'Twitter', 'slug'=>'public_agent_twitter' ,'info' => __('Nenhum Twitter Informado', 'makepressure') , 'html' => array ('tag'=> 'input', 'type' => 'text' ));
  }
  
  if ( get_option('makepressure_phone_show') ) {
    $metas[] = array ( 'label' => 'Telefone', 'slug'=>'public_agent_phone' ,'info' => __('Nenhum Telefone Informado', 'makepressure') , 'html' => array ('tag'=> 'input', 'type' => 'text' ));
  }

  return $metas;


}

function public_agent_the_meta($content)
{
  if ( is_singular( 'public_agent' ) && !is_search() && is_single() ) {
    $new_content = "";

    $email = get_post_meta(  get_the_ID(), "public_agent_email", true);
    $cargo = get_post_meta(  get_the_ID(), "public_agent_cargo", true);
    $cargo_valid = isset($cargo) ? get_post_meta(  get_the_ID(), 'public_agent_cargo', true) : "";
    $space = '%20';
    
    $email_subject = get_option( 'makepressure_email_title' );
    $email_body = get_option( 'makepressure_email_body' );
    $more_emails = get_option( 'makepressure_more_emails' );

    $twitter_text = get_option( 'makepressure_twitter_text' );
    $twitter_url = get_option( 'makepressure_twitter_url' );
    $twitter_hashtag = get_option( 'makepressure_twitter_hashtag' );

    if ( get_post_meta(  get_the_ID(), 'public_agent_email', true) ) : 
      $new_content =  '<a id="' . get_the_ID() . '" class="fa fa-envelope fa-3x makepressure_email" style="margin:10px;color:green;" href="mailto:';
      $new_content .= $email . $more_emails;
      //$new_content .= '?subject=Excelentissimo' . $email_subject . $space;
      $genre = wp_get_post_terms( get_the_ID() , 'public_agent_genre');
      if (is_array($genre)) {
        $genre = $genre[0];
        $genre_slug = $genre->slug;
      }
      $new_content .= '?subject=Excelentissim' . ($genre_slug=='feminino'?'a':'o') . $space;
      $new_content .= $cargo_valid;
      $new_content .= $space;
      $new_content .= get_the_title(); 
      $new_content .= '&body=Excelentissim' . ($genre_slug=='feminino'?'a':'o') . $space;
      $new_content .= $cargo_valid . $space;
      $new_content .= get_the_title() . ", %0A%0A";
      $new_content .= $email_body;
      $new_content .= '"></a>';
    endif;

    $twitter = get_post_meta(  get_the_ID(), 'public_agent_twitter', true);
    
    if ( get_post_meta(  get_the_ID(), 'public_agent_twitter', true) ) :
      $new_content .= '<a id="' . get_the_ID() . '" class="fa fa-twitter fa-3x makepressure_twitter" style="margin:10px;color:#1dcaff;"  href="https://twitter.com/intent/tweet?text=@';
      $new_content .= $twitter . $twitter_text;
      $new_content .= '&url=' . $twitter_url;
      $new_content .= '&hashtags=' . $twitter_hashtag . '" class="twitter-mention-button" data-show-count="false"></a>';
    endif;

    $facebook = get_post_meta(  get_the_ID(), 'public_agent_facebook', true);

    if ( get_post_meta(  get_the_ID(), 'public_agent_facebook', true) ) : 
      $new_content .= '<a id="' . get_the_ID() . '" class="fa fa-facebook-official fa-3x makepressure_facebook" style="margin:10px;color:#3b5998;" target="_brank" href="';
      $new_content .= $facebook;
      $new_content .= '"></a><br><br>';
    endif;

    $phone = get_post_meta(  get_the_ID(), 'public_agent_phone', true);

    if ( get_post_meta(  get_the_ID(), 'public_agent_phone', true) ) : 
      $new_content .= '<p><a class="fa fa-phone fa-3x" target="_brank" href="tel:';
      $new_content .= $phone;
      $new_content .= '">';
      $new_content .= $phone;
      $new_content .= '</a></p>';
    endif;

    $whatsapp = get_post_meta(  get_the_ID(), 'public_agent_whatsapp', true);

    if ( get_post_meta(  get_the_ID(), 'public_agent_whatsapp', true) ) : 
      $new_content .= '<p><a class="fa fa-whatsapp fa-3x" style="color:green;" target="_brank" href="tel:';
      $new_content .= $whatsapp;
      $new_content .= '">';
      $new_content .= $whatsapp;
      $new_content .= '</a></p>';
    endif;

    $metas = public_agent_get_metas();

    foreach($metas as $meta)
    {
      if (  $meta['slug'] == 'public_agent_email' ) continue;
      if (  $meta['slug'] == 'public_agent_facebook' ) continue;
      if (  $meta['slug'] == 'public_agent_twitter' ) continue;
      if (  $meta['slug'] == 'public_agent_whatsapp' ) continue;
      if (  $meta['slug'] == 'public_agent_phone' ) continue;
      if (get_post_meta( get_the_ID(), $meta['slug'] , true) != "") {
        $new_content .= '<p>';
        $new_content .= $meta['label'];
        $new_content .= ': ';
        $new_content .= get_post_meta( get_the_ID(), $meta['slug'] , true) . "</p>";
      }
    }

    //pre get categories

    $state = wp_get_post_terms( get_the_ID() , 'public_agent_state');
    $job = wp_get_post_terms( get_the_ID() , 'public_agent_job');
    $genre = wp_get_post_terms( get_the_ID() , 'public_agent_genre');
    $party = wp_get_post_terms( get_the_ID() , 'public_agent_party');
    $commissions = wp_get_post_terms( get_the_ID() , 'public_agent_commission');
    //$category = wp_get_post_terms( get_the_ID() , 'category')[0];

    if ($state)
      $new_content .= '<p>Estado: <a href="' . get_category_link( $state[0]->term_id ) . '">' . $state[0]->name . '</a></p>';
    if ($job)
      $new_content .= '<p>Cargo: <a href="' . get_category_link( $job[0]->term_id ) . '">' . $job[0]->name . '</a></p>';
    if ($genre)
      $new_content .= '<p>Gênero: <a href="' . get_category_link( $genre[0]->term_id ) . '">' . $genre[0]->name . '</a></p>';
    if ($party)
      $new_content .= '<p>Partido: <a href="' . get_category_link( $party[0]->term_id ) . '">' . $party[0]->name . '</a></p>';
    if ($commissions){


      $new_content .= "<p>Comissões: ";
      foreach ($commissions as $commission) {
        $term_id = get_ancestors( $commission->term_id,'public_agent_commission');
        $commission_father = get_term_by('id', $term_id[0], 'public_agent_commission');
        $new_content .= '<a href="'. get_category_link( $commission_father->term_id ) . '">' . $commission_father->name . '</a> (<a href="' . get_category_link($commission->term_id) . '">' . $commission->name . '</a>) ';
      }
      $new_content .= "</p>";
    }

    $email = get_post_meta( get_the_ID(), 'makepressure_email_counter' )?get_post_meta( get_the_ID(), 'makepressure_email_counter' ):0;
    $email = is_array($email)?$email[0]:0;
    $twitter = get_post_meta( get_the_ID(), 'makepressure_twitter_counter' )?get_post_meta( get_the_ID(), 'makepressure_twitter_counter' ):0;
    $twitter = is_array($twitter)?$twitter[0]:0;
    $facebook = get_post_meta( get_the_ID(), 'makepressure_facebook_counter' )?get_post_meta( get_the_ID(), 'makepressure_facebook_counter' ):0;
    $facebook = is_array($facebook)?$facebook[0]:0;

    $new_content .= '<script type="text/javascript" >
          jQuery(function ($) {
              var ctx = document.getElementById("makepressure");
              var myChart = new Chart(ctx, {
                  type: "polarArea",
                  data: {
                      labels: ["Email", "Twitter", "Facebook"],
                      datasets: [{
                          label: "Número de cliques para cada botão:",
                          data:  [' . $email . ', ' . $twitter . ', ' . $facebook . '],
                          backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(255, 99, 132, 0.2)", "rgba(255, 206, 86, 0.2)"],
                          borderColor: ["rgba(75, 192, 192, 1)", "rgba(255,99,132,1)","rgba(255, 206, 86, 1)"] ,
                          borderWidth: 1
                      }],                    
                  } 
              });

            });
    </script>';
    $new_content .= '<canvas height="500px" width="1080" id="makepressure" style="display: block; width: 1080px; height: 500px;"></canvas>';

    return $content . $new_content;
  }

  return $content;
}
add_filter("the_content", "public_agent_the_meta");

function public_agent_change_post_placeholder($title)
{
  $screen = get_current_screen();
  if ('public_agent' == $screen->post_type) {
    $title = __('Insira o nome do Agente Público', 'makepressure');
  }
  return $title;
}
add_filter('enter_title_here', 'public_agent_change_post_placeholder');


function public_agent_meta_box()
{
  add_meta_box('public_agent-meta-box', __('Informações Complementares', 'makepressure'), 'display_public_agent_meta_box', 'public_agent', 'normal', 'high');

}

function display_public_agent_meta_box($object, $box)
{ 
  $metas = public_agent_get_metas();
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
         <input type="<?php echo $meta['html']['type'] ?>" name="<?php echo $meta['slug'] ?>" 
           id="<?php echo $meta['slug'] ?>" style="width:50%"
           value="<?php echo get_post_meta($object->ID, $meta['slug'] , true); ?>">
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

  <!--h2><?php _e( 'Estado:' ); ?></h2>
  <?php wp_dropdown_categories( 'show_count=1&hierarchical=1&taxonomy=public_agent_state&hide_empty=0&name=state' ); ?>
  <h2><?php _e( 'Gênero:' ); ?></h2>
  <?php wp_dropdown_categories( 'show_count=1&hierarchical=1&taxonomy=public_agent_genre&hide_empty=0&name=genre' ); ?>
  <h2><?php _e( 'Cargo:' ); ?></h2>
  <?php wp_dropdown_categories( 'show_count=1&hierarchical=1&taxonomy=public_agent_job&hide_empty=0&name=job' ); ?>
  <h2><?php _e( 'Partido:' ); ?></h2>
  <?php wp_dropdown_categories( 'show_count=1&hierarchical=1&taxonomy=public_agent_party&hide_empty=0&name=party' ); ?>
  <input type="hidden" name="makepressure_meta_box_nonce" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>"/-->

  <?php 
}
add_action('admin_menu', 'public_agent_meta_box');

function save_public_agent_meta_box($post_id, $post)
{
  if (!current_user_can('edit_post', $post_id))
    return;

  $metas = public_agent_get_metas();
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
add_action('save_post', 'save_public_agent_meta_box', 10, 2);

add_action('admin_menu','public_agents_menu');

function public_agents_menu()
{
  add_menu_page( __('Bota Pressão','makepressure'), __('Bota Pressão','makepressure'), 'manage_options', 'makepressure_menu', 'makepressure_settings', 'dashicons-megaphone', 100);
  add_submenu_page( 'makepressure_menu', __('Adicionar Deputados Federais', 'makepressure'), __('Adicionar Deputados Federais', 'makepressure'), 'manage_options', 'makepressure-adicionar-deputados', 'makepressure_adicionar_deputados');
  add_submenu_page( 'makepressure_menu', __('Adicionar Redes Sociais Deputados', 'makepressure'), __('Adicionar Redes Sociais Deputados', 'makepressure'), 'manage_options', 'makepressure-adicionar-redes-deputados', 'makepressure_adicionar_redes_deputados');
  add_submenu_page( 'makepressure_menu', __('Adicionar Comissões', 'makepressure'), __('Adicionar Comissões', 'makepressure'), 'manage_options', 'makepressure-adicionar-comissoes', 'makepressure_adicionar_comissoes');
  add_submenu_page( 'makepressure_menu', __('Adicionar Senadores', 'makepressure'), __('Adicionar Senadores', 'makepressure'), 'manage_options', 'makepressure-adicionar-senadores', 'makepressure_adicionar_senadores');
  add_submenu_page( 'makepressure_menu', __('Adicionar Redes Sociais Senadores', 'makepressure'), __('Adicionar Redes Sociais Senadores', 'makepressure'), 'manage_options', 'makepressure-adicionar-redes-senadores', 'makepressure_adicionar_redes_senadores');
  add_submenu_page( 'makepressure_menu', __('Remover todos os Agentes', 'makepressure'), __('Remover todos os Agentes', 'makepressure'), 'manage_options', 'makepressure-remover-agentes', 'makepressure_remove_all_public_agents');
}

function makepressure_remove_all_public_agents(){
  ?><h1>Remover todos os posts</h1>
  <p>Esta ação não podera ser desfeita, faça apenas se vc tem centeza do que esta fazendo</p><?php
  echo '<form method="post">';
  submit_button(__("Sim", "makepressure" ));
  echo '</form>';
  if($_POST){
    $submit = isset($_POST['submit'])?$_POST['submit']:'';
    if ($submit == "Sim") {
      $the_query = new WP_Query(array( 'post_type' => 'public_agent', 'posts_per_page' => -1 , 'field' => 'ids'));
      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        wp_delete_post( get_the_ID() );
      }
    }
  }
}


function makepressure_adicionar_redes_deputados(){
?>
<h1><?php _e( 'Adicionar Redes', 'makepressure'); ?></h1>
<?php
  echo '<form method="post">';
  submit_button(__("Adicionar Redes", "makepressure" ));
  echo '</form>';

  if($_POST){
    $submit = isset($_POST['submit'])?$_POST['submit']:'';
    if ($submit === "Adicionar Redes") {
      set_time_limit(0);
      $aux = array(
        array( "facebook" => "https://www.facebook.com/cesarmessiaspsb/","twitter" => "","instagram" => "","e-mail" => "dep.cesarmessias","formacao" => "Pecuarista" ),
        array( "facebook" => "https://www.facebook.com/angelim.acre","twitter" => "RaimundoAngelim","instagram" => "","e-mail" => "dep.angelim","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/leodopt1331/","twitter" => "leodopt","instagram" => "https://instagram.com/leodebritoacre/","e-mail" => "dep.leodebrito","formacao" => "Advogado(a),professor de Direito" ),
        array( "facebook" => "https://www.facebook.com/sibamachado1313/","twitter" => "sibamachado13","instagram" => "","e-mail" => "dep.sibamachado","formacao" => "Geográfo" ),
        array( "facebook" => "https://www.facebook.com/Ronaldo-Lessa-139755579370881/","twitter" => "ronaldolessapdt","instagram" => "","e-mail" => "dep.ronaldolessa","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/carimbao/","twitter" => "givaldocarimbao","instagram" => "","e-mail" => "dep.givaldocarimbao","formacao" => "Comerciante e Gráfico" ),
        array( "facebook" => "https://www.facebook.com/paulaodopt","twitter" => "paulaodopt","instagram" => "https://www.instagram.com/paulaodopt/","e-mail" => "dep.paulao","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/hissa.abrahao/","twitter" => "hissa_abrahao","instagram" => "https://www.instagram.com/hissaabrahao/","e-mail" => "dep.hissaabrahao","formacao" => "Comerciante" ),
        array( "facebook" => "https://www.facebook.com/AlfredoNascimentoOficial","twitter" => "","instagram" => "https://www.instagram.com/AlfredoNascimentoOficial/","e-mail" => "dep.alfredonascimento","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadafederalprofessoramarcivania/","twitter" => "","instagram" => "","e-mail" => "dep.professoramarcivania","formacao" => "Professora de Português, Servidora Público Estadual" ),
        array( "facebook" => "https://www.facebook.com/RobertoGoesAmapa/","twitter" => "ascomrg","instagram" => "","e-mail" => "dep.robertogoes","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/OsCabucusOficial/","twitter" => "depcabucu","instagram" => "https://www.instagram.com/dr.damiao/","e-mail" => "dep.cabucuborges","formacao" => "Comunicador de Rádio,economista" ),
        array( "facebook" => "https://www.facebook.com/depandreabdon","twitter" => "dep_andreabdon","instagram" => "https://instagram.com/dep_andreabdon/","e-mail" => "dep.andreabdon","formacao" => "Engenheiro Florestal" ),
        array( "facebook" => "https://www.facebook.com/deputadoviniciusgurgel/","twitter" => "","instagram" => "","e-mail" => "dep.viniciusgurgel","formacao" => "Contador" ),
        array( "facebook" => "https://www.facebook.com/Janete-Capiberibe-263657017084590/","twitter" => "janetecapi","instagram" => "https://instagram.com/janetecapi/","e-mail" => "dep.janetecapiberibe","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DepMarcosReategui","twitter" => "marcos_reategui","instagram" => "https://www.instagram.com/depmarcosreategui/","e-mail" => "dep.marcosreategui","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadajozirocha/","twitter" => "","instagram" => "","e-mail" => "dep.joziaraujo","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadaaliceportugal","twitter" => "alice_portugal","instagram" => "https://www.instagram.com/aliceportugal/","e-mail" => "dep.aliceportugal","formacao" => "Química Industrial e Farmacêutica Bioquímica" ),
        array( "facebook" => "https://www.facebook.com/depdanielalmeida/","twitter" => "daniel_pcdob","instagram" => "https://instagram.com/daniel_pcdob/","e-mail" => "dep.danielalmeida","formacao" => "Industriário" ),
        array( "facebook" => "https://www.facebook.com/davidson.magalhaessantos/","twitter" => "davidson65","instagram" => "https://www.instagram.com/davidson.magalhaes/","e-mail" => "dep.davidsonmagalhaes","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/felixjunior1234/","twitter" => "felixmendoncajr","instagram" => "","e-mail" => "dep.felixmendoncajunior","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/CacaLeaoOficial/","twitter" => "cacaleao","instagram" => "http://instagram.com/diegoandrademg","e-mail" => "dep.cacaleao","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/depmarionegromontejr/","twitter" => "depnegromontejr","instagram" => "","e-mail" => "dep.marionegromontejr","formacao" => "Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/robertopereirabritto/","twitter" => "deprobertobritt","instagram" => "","e-mail" => "dep.robertobritto","formacao" => "Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/RonaldoCarlettoOficial","twitter" => "","instagram" => "https://www.instagram.com/ronaldocarletto/","e-mail" => "dep.ronaldocarletto","formacao" => "Empresário de Transporte" ),
        array( "facebook" => "https://www.facebook.com/Jo%25C3%25A3o-Carlos-Bacelar-543245952454205/","twitter" => "","instagram" => "","e-mail" => "dep.joaocarlosbacelar","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/deputadojosecarlosaraujo/","twitter" => "depjosecarlos","instagram" => "","e-mail" => "dep.josecarlosaraujo","formacao" => "Administrador." ),
        array( "facebook" => "https://www.facebook.com/dep.joserocha","twitter" => "","instagram" => "","e-mail" => "dep.joserocha","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/bebetogalvao","twitter" => "deputadobebeto","instagram" => "https://www.instagram.com/bebetogalvao/","e-mail" => "dep.bebeto","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/antoniobritobahia/","twitter" => "antoniobritoba","instagram" => "","e-mail" => "dep.antoniobrito","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/deputadofernandotorres","twitter" => "torrespsd5528","instagram" => "","e-mail" => "dep.fernandotorres","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadojosenunes","twitter" => "josenunesDep","instagram" => "","e-mail" => "dep.josenunes","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/dep.paulo.magalhaes","twitter" => "","instagram" => "","e-mail" => "dep.paulomagalhaes","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/depfederalsergiobrito/","twitter" => "","instagram" => "","e-mail" => "dep.sergiobrito","formacao" => "Administrador de Empresas, Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/afonsoflorence13","twitter" => "afonso_florence","instagram" => "https://www.instagram.com/afonsoflorence/","e-mail" => "dep.afonsoflorence","formacao" => "Professor de História, Servidor Público" ),
        array( "facebook" => "https://www.facebook.com/luiz.caetanoBA","twitter" => "depcaetano","instagram" => "https://www.instagram.com/goulart_oficial/","e-mail" => "dep.caetano","formacao" => "Farmacêutico Bioquímico" ),
        array( "facebook" => "https://www.facebook.com/depjorgesolla","twitter" => "depjorgesolla","instagram" => "","e-mail" => "dep.jorgesolla","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/MoemaGramacho/","twitter" => "moemagramacho","instagram" => "","e-mail" => "dep.moemagramacho","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/falavalmir","twitter" => "depvalmir","instagram" => "https://www.instagram.com/depvalmir/","e-mail" => "dep.valmirassuncao","formacao" => "Agricultor" ),
        array( "facebook" => "https://www.facebook.com/deputadowaldenorpereira/","twitter" => "waldenorpereira","instagram" => "","e-mail" => "dep.waldenorpereira","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/bacelaroficial","twitter" => "deputadobacelar","instagram" => "http://instagram.com/deputadobacelar/","e-mail" => "dep.bacelar","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/dep.chicolopes/","twitter" => "depchicolopes","instagram" => "","e-mail" => "dep.chicolopes","formacao" => "Professor e Auditor-fiscal" ),
        array( "facebook" => "https://www.facebook.com/deputadoariostoholanda","twitter" => "deputadoariosto","instagram" => "https://www.instagram.com/ariostoholanda/","e-mail" => "dep.ariostoholanda","formacao" => "Professor Universitário e Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/9099leonidascristino","twitter" => "leonidas9099","instagram" => "","e-mail" => "dep.leonidascristino","formacao" => "Engenheiro Civil." ),
        array( "facebook" => "https://www.facebook.com/DeputadoVicenteArruda/","twitter" => "","instagram" => "","e-mail" => "dep.vicentearruda","formacao" => "Advogado, Cientista Político e Jornalista" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Macedo-332526423613752/","twitter" => "DeputadoMacedo","instagram" => "https://www.instagram.com/deputadomacedo/","e-mail" => "dep.macedo","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/adailcarneiro31/?fref=ts","twitter" => "adail12321","instagram" => "","e-mail" => "dep.adailcarneiro","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadagoretepereira","twitter" => "d_goretepereira","instagram" => "","e-mail" => "dep.goretepereira","formacao" => "Fisioterapeuta" ),
        array( "facebook" => "https://www.facebook.com/odoricoamonteiro/","twitter" => "onyxlorenzoni","instagram" => "https://instagram.com/onyxlorenzoni/","e-mail" => "dep.odoricomonteiro","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/DomingosNetoCeara","twitter" => "domingos_neto","instagram" => "https://www.instagram.com/domingosneto/","e-mail" => "dep.domingosneto","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/Joseairtoncirilo/","twitter" => "joseairtonpt","instagram" => "","e-mail" => "dep.joseairtoncirilo","formacao" => "Advogado e Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/DeputadoJoseGuimaraes/","twitter" => "Dep_Guimaraes","instagram" => "https://www.instagram.com/guimaraes1322","e-mail" => "dep.joseguimaraes","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/luizianneinstitucional","twitter" => "1313luizianne","instagram" => "","e-mail" => "dep.luiziannelins","formacao" => "Professora Universitária" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Arnon-Bezerra-430249640450487","twitter" => "","instagram" => "","e-mail" => "dep.arnonbezerra","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/ErikaKokay","twitter" => "erikakokay","instagram" => "http://instagram.com/erikakokay","e-mail" => "dep.erikakokay","formacao" => "Bancária" ),
        array( "facebook" => "https://www.facebook.com/GivaldoVieiraES/","twitter" => "givaldovieira","instagram" => "https://instagram.com/givaldovieira_es/","e-mail" => "dep.givaldovieira","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/helder.salomao.313/","twitter" => "heldersalomao","instagram" => "https://www.instagram.com/heldersalomao/","e-mail" => "dep.heldersalomao","formacao" => "Professor(a)" ),
        array( "facebook" => "https://www.facebook.com/flaviamoraisoficial","twitter" => "depflaviamorais","instagram" => "","e-mail" => "dep.flaviamorais","formacao" => "Professora de Educação Física" ),
        array( "facebook" => "https://www.facebook.com/rubensotoni/","twitter" => "rubensotoni","instagram" => "https://www.instagram.com/rubensotoni","e-mail" => "dep.rubensotoni","formacao" => "Professor Universitário e Consultor Jurídico" ),
        array( "facebook" => "https://www.facebook.com/Deprubenspereirajr/","twitter" => "rubenspereirajr","instagram" => "https://www.instagram.com/rubenspereirajr/","e-mail" => "dep.rubenspereirajunior","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/wevertonrocha12/","twitter" => "","instagram" => "","e-mail" => "dep.wevertonrocha","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/juniormarrecaoficial","twitter" => "juniormarreca","instagram" => "https://www.instagram.com/juniormarreca/","e-mail" => "dep.juniormarreca","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/Jo%25C3%25A3o-Marcelo-1555-1648893302002419","twitter" => "","instagram" => "","e-mail" => "dep.joaomarcelosouza","formacao" => "Psicólogo" ),
        array( "facebook" => "https://www.facebook.com/fapagewaldirmaranhao/","twitter" => "waldirmaranhao","instagram" => "https://instagram.com/waldirmaranhao/","e-mail" => "dep.waldirmaranhao","formacao" => "Médico Veterinário" ),
        array( "facebook" => "https://www.facebook.com/deputadocleberverde/","twitter" => "cleberverde10","instagram" => "https://www.instagram.com/cleberverde/","e-mail" => "dep.cleberverde","formacao" => "Vendedor Autônomo, Professor, Servidor Público, Político e Bacharel Em Direito" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.josereinaldo","formacao" => "Administrador Público,engenheiro" ),
        array( "facebook" => "https://www.instagram.com/depzecarlospt/","twitter" => "dep_zecarlospt","instagram" => "https://instagram.com/buffon45222/","e-mail" => "dep.zecarlos","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Pedro-Fernandes-337091196480678/","twitter" => "oPedroFernandes","instagram" => "","e-mail" => "dep.pedrofernandes","formacao" => "Engenheiro Civil e Bancário" ),
        array( "facebook" => "https://www.facebook.com/AluisioMendesOficial","twitter" => "a_mendes2727","instagram" => "","e-mail" => "dep.aluisiomendes","formacao" => "Funcionário Público Federal" ),
        array( "facebook" => "https://www.facebook.com/deputadajomoraes/","twitter" => "jomoraes","instagram" => "","e-mail" => "dep.jomoraes","formacao" => "Funcionária Pública" ),
        array( "facebook" => "https://www.facebook.com/subtenentegonzaga/","twitter" => "subgonzagamg","instagram" => "","e-mail" => "dep.subtenentegonzaga","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/odair.oficial","twitter" => "odaircunha_?lang=pt","instagram" => "","e-mail" => "","formacao" => "Empresário e Produtor Rural" ),
        array( "facebook" => "https://www.facebook.com/AeltonFreitasMG/","twitter" => "aeltonfreitasmg","instagram" => "","e-mail" => "dep.aeltonfreitas","formacao" => "Produtor Rural, Empresário, Engenheiro Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/deputadabrunny","twitter" => "","instagram" => "","e-mail" => "dep.brunny","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/george.hilton.9469?fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.georgehilton","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/raquelmuniz","twitter" => "","instagram" => "https://www.instagram.com/raquel.muniz/","e-mail" => "dep.raquelmuniz","formacao" => "Médica" ),
        array( "facebook" => "https://www.facebook.com/deputadoadelmo","twitter" => "deputadoadelmo","instagram" => "","e-mail" => "dep.adelmocarneiroleao","formacao" => "Professor(a)" ),
        array( "facebook" => "https://www.facebook.com/patrusananias13/?ref=ts&fref=ts","twitter" => "Patrus_Ananias","instagram" => "","e-mail" => "dep.patrusananias","formacao" => "Médico, Advogado" ),
        array( "facebook" => "https://www.facebook.com/gabrielguimaraesmg/","twitter" => "gguimaraespt","instagram" => "https://www.instagram.com/gabrielguimaraesmg/","e-mail" => "dep.gabrielguimaraes","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/depleomonteiro","twitter" => "depleomonteiro","instagram" => "","e-mail" => "dep.leonardomonteiro","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/jfmargarida","twitter" => "jfmargarida","instagram" => "","e-mail" => "dep.margaridasalomao","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/padrejoao/","twitter" => "https://www.twitter.com/deppaeslandim","instagram" => "","e-mail" => "dep.padrejoao","formacao" => "Sacerdote Católico" ),
        array( "facebook" => "https://www.facebook.com/ReginaldoLopesOficial/","twitter" => "reginaldolopes","instagram" => "https://instagram.com/reginaldolopesptmg/","e-mail" => "dep.reginaldolopes","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/dagobertopdt/","twitter" => "dagobertopdt","instagram" => "https://www.instagram.com/dagobertopdt/","e-mail" => "dep.dagoberto","formacao" => "Advogado e Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/vanderfazmais","twitter" => "vanderfazmais","instagram" => "https://www.instagram.com/vanderfazmais/","e-mail" => "dep.vanderloubet","formacao" => "Bancário e Funcionário Público" ),
        array( "facebook" => "https://www.facebook.com/zecadopt13/","twitter" => "zecadopt","instagram" => "https://www.instagram.com/zecadopt/","e-mail" => "dep.zecadopt","formacao" => "Bancário" ),
        array( "facebook" => "https://www.facebook.com/valtenirpereiraoficial","twitter" => "depvaltenir","instagram" => "","e-mail" => "dep.valtenirpereira","formacao" => "Advogado, Vendedor Autônomo, Vendedor, Auxiliar de Escritório, Engraxate, Defensor Público e Professor de Direito" ),
        array( "facebook" => "https://www.facebook.com/saguasfederal","twitter" => "saguasmoraes","instagram" => "","e-mail" => "dep.saguasmoraes","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/elcionepmdb/","twitter" => "elcionepmdb","instagram" => "","e-mail" => "dep.elcionebarbalho","formacao" => "Pedagoga" ),
        array( "facebook" => "https://www.facebook.com/AgoraePriante/","twitter" => "prianteoficial","instagram" => "https://www.instagram.com/prianteoficial/","e-mail" => "dep.josepriante","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/Simone-Morgado-385219224834647/","twitter" => "simone_morgado","instagram" => "https://www.instagram.com/simonemorgado_","e-mail" => "dep.simonemorgado","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/betosalame/","twitter" => "salamefilho","instagram" => "","e-mail" => "dep.betosalame","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/luciovale22/","twitter" => "LucioVale22","instagram" => "","e-mail" => "dep.luciovale","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/edmilsonpsol/","twitter" => "edmilsonpsol","instagram" => "https://www.instagram.com/edmilsonpsol/","e-mail" => "dep.edmilsonrodrigues","formacao" => "Professor(a)" ),
        array( "facebook" => "https://www.facebook.com/beto.faro.5/","twitter" => "betofaropt","instagram" => "","e-mail" => "dep.betofaro","formacao" => "Agricultor Familiar" ),
        array( "facebook" => "https://www.facebook.com/zegeraldofederal","twitter" => "zegeraldopt13","instagram" => "","e-mail" => "dep.zegeraldo","formacao" => "Agricultor" ),
        array( "facebook" => "drdamiaooficial","twitter" => "","instagram" => "https://www.instagram.com/dr.damiao/","e-mail" => "dep.damiaofeliciano","formacao" => "Médico, Empresário e Radialista" ),
        array( "facebook" => "https://www.facebook.com/venezianocomvoce/","twitter" => "mobiliza15","instagram" => "","e-mail" => "dep.venezianovitaldorego","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/deputadowellingtonroberto/","twitter" => "dep_wellington","instagram" => "https://www.instagram.com/wellingtonrobertopb/","e-mail" => "dep.wellingtonroberto","formacao" => "Não Informada" ),
        array( "facebook" => "https://www.facebook.com/luizcoutopt/","twitter" => "luizcoutopt","instagram" => "","e-mail" => "dep.luizcouto","formacao" => "Professor Adjunto" ),
        array( "facebook" => "https://www.facebook.com/deputadalucianaoficial","twitter" => "","instagram" => "https://instagram.com/deputadaluciana/","e-mail" => "dep.lucianasantos","formacao" => "Engenheiro Elétrico" ),
        array( "facebook" => "https://www.facebook.com/wolney.queiroz.1?fref=ts","twitter" => "mandatowolney","instagram" => "https://www.instagram.com/wolneyqueiroz/","e-mail" => "dep.wolneyqueiroz","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/dududafonte","twitter" => "eduardodafonte","instagram" => "","e-mail" => "dep.eduardodafonte","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/sebaoliveirajr","twitter" => "seba_oliveira","instagram" => "","e-mail" => "dep.sebastiaooliveira","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/DepGonzagaPatriota/","twitter" => "","instagram" => "","e-mail" => "dep.gonzagapatriota","formacao" => "Advogado, Contador , Administrador de Empresas e Jornalista." ),
        array( "facebook" => "https://www.facebook.com/marinaldo.rosendo/","twitter" => "marinaldorosend","instagram" => "https://instagram.com/marinaldorosendo/","e-mail" => "dep.marinaldorosendo","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/dep.adalberto.cavalcanti","twitter" => "dep_adalbertoc","instagram" => "","e-mail" => "dep.adalbertocavalcanti","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/zecacavalcantiPTB/","twitter" => "","instagram" => "https://www.instagram.com/zecacavalcanti/","e-mail" => "dep.zecacavalcanti","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DeputadoSilvioCosta","twitter" => "silvio_cfilho","instagram" => "","e-mail" => "dep.silviocosta","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/ricardoteobaldooficial","twitter" => "psdbricardo45","instagram" => "https://www.instagram.com/ricardoteobaldooficial/","e-mail" => "dep.ricardoteobaldo","formacao" => "" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.marcelocastro","formacao" => "" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.mainha","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/assiscarvalho.pt/","twitter" => "assis_carvalho","instagram" => "https://www.instagram.com/assiscarvalho13/","e-mail" => "dep.assiscarvalho","formacao" => "Funcionário Público Federal" ),
        array( "facebook" => "https://www.facebook.com/paes.landim.56/","twitter" => "deppastoreurico","instagram" => "","e-mail" => "dep.paeslandim","formacao" => "Professor e Advogado" ),
        array( "facebook" => "https://www.facebook.com/capfabioabreupi/?fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.capitaofabioabreu","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadoassisdocouto","twitter" => "assisdocouto","instagram" => "","e-mail" => "dep.assisdocouto","formacao" => "Agricultor" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.hermesparcianello","formacao" => "Contador" ),
        array( "facebook" => "https://www.facebook.com/JoaoArruda15/","twitter" => "joao_arruda","instagram" => "https://www.instagram.com/joao_arruda/","e-mail" => "dep.joaoarruda","formacao" => "Bacharel Em Ciências Físicas e Naturais" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.nelsonmeurer","formacao" => "Agropecuarista" ),
        array( "facebook" => "https://www.facebook.com/DeputadoToninhoWandscheer/","twitter" => "deputadotoninho","instagram" => "","e-mail" => "dep.toninhowandscheer","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/enioverri/","twitter" => "enioverri13","instagram" => "https://instagram.com/enioverri","e-mail" => "dep.enioverri","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadofederalzecadirceu/","twitter" => "zeca_dirceu","instagram" => "https://www.instagram.com/zecadirceu/","e-mail" => "dep.zecadirceu","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/AlielMachadoVereador/","twitter" => "alielmachado","instagram" => "https://instagram.com/alielmachado","e-mail" => "dep.alielmachado","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/sigajandira2","twitter" => "jandira_feghali","instagram" => "https://www.instagram.com/jfeghali","e-mail" => "dep.jandirafeghali","formacao" => "Médico, Músico" ),
        array( "facebook" => "https://www.facebook.com/leonardopicciani15/","twitter" => "depleopicciani","instagram" => "","e-mail" => "dep.leonardopicciani","formacao" => "Agropecuarista e Bacharel de Direito." ),
        array( "facebook" => "https://www.facebook.com/celsopansera/?fref=ts","twitter" => "search?q=CELSO%20PANSERA&src=typd","instagram" => "","e-mail" => "dep.celsopansera","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/chicoalencar/","twitter" => "depchicoalencar","instagram" => "https://www.instagram.com/chico.alencar","e-mail" => "dep.chicoalencar","formacao" => "Professor de Ensino Superior" ),
        array( "facebook" => "https://www.facebook.com/glauber.braga1/","twitter" => "glauber_braga","instagram" => "https://www.instagram.com/glauberbraga_oficial","e-mail" => "dep.glauberbraga","formacao" => "Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/jean.wyllys/","twitter" => "jeanwyllys_real","instagram" => "https://www.instagram.com/jeanwyllys_real/","e-mail" => "dep.jeanwyllys","formacao" => "Comunicador, Escritor, Jornalista, Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/blogdabenedita","twitter" => "blogdabenedita","instagram" => "","e-mail" => "dep.beneditadasilva","formacao" => "Assistente Social, Auxiliar de Enfermagem, Professor, Servidor Público" ),
        array( "facebook" => "https://www.facebook.com/chicodangelo","twitter" => "chico_dangelo","instagram" => "https://instagram.com/chicodangelo/","e-mail" => "dep.chicodangelo","formacao" => "Médico" ),
        array( "facebook" => "depluizsergio","twitter" => "","instagram" => "","e-mail" => "dep.luizsergio","formacao" => "Delineador Naval" ),
        array( "facebook" => "https://www.facebook.com/wadihdamous/","twitter" => "wadih_damous","instagram" => "","e-mail" => "dep.wadihdamous","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/MolonRJ/","twitter" => "alessandromolon","instagram" => "https://instagram.com/molonrj","e-mail" => "dep.alessandromolon","formacao" => "Advogado, Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/depzenaidemaia","twitter" => "","instagram" => "https://www.instagram.com/dep.zenaidemaia/","e-mail" => "dep.zenaidemaia","formacao" => "Médica" ),
        array( "facebook" => "https://www.facebook.com/deputadoediolopes/","twitter" => "ediolopes","instagram" => "","e-mail" => "dep.ediolopes","formacao" => "Servidor Público" ),
        array( "facebook" => "https://www.facebook.com/AfonsoMottaOpina/","twitter" => "afonso_motta","instagram" => "https://instagram.com/afonso_motta/","e-mail" => "dep.afonsomotta","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/pompeodemattosPDT/","twitter" => "pompeodemattos","instagram" => "https://instagram.com/deputadopompeo/","e-mail" => "dep.pompeodemattos","formacao" => "Advogado e Bancário" ),
        array( "facebook" => "https://www.facebook.com/bohngass13","twitter" => "bohngass","instagram" => "","e-mail" => "dep.bohngass","formacao" => "Agricultor Familiar, Professor de História" ),
        array( "facebook" => "https://www.facebook.com/deputadohenriquefontana/","twitter" => "henriquefontana","instagram" => "","e-mail" => "dep.henriquefontana","formacao" => "Médico e Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/depmarcomaia","twitter" => "depmarcomaia","instagram" => "","e-mail" => "dep.marcomaia","formacao" => "Industriário (metalúrgico)" ),
        array( "facebook" => "https://www.facebook.com/deputadomarcon/","twitter" => "depmarcon","instagram" => "","e-mail" => "dep.marcon","formacao" => "Agricultor" ),
        array( "facebook" => "https://www.facebook.com/Maria-Do-Rosário-Nunes-154111111330577/","twitter" => "_mariadorosario","instagram" => "","e-mail" => "dep.mariadorosario","formacao" => "Professora" ),
        array( "facebook" => "https://www.facebook.com/deputadofederal/","twitter" => "deputadofederal","instagram" => "","e-mail" => "dep.paulopimenta","formacao" => "Técnico Agrícola e Jornalista" ),
        array( "facebook" => "https://www.facebook.com/sigapepevargas/","twitter" => "sigapepevargas","instagram" => "","e-mail" => "dep.pepevargas","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/celso.maldaner/","twitter" => "celsomaldaner","instagram" => "https://www.instagram.com/maldaner_celso/","e-mail" => "dep.celsomaldaner","formacao" => "Economista, Empresário" ),
        array( "facebook" => "https://www.facebook.com/VotoDecioLima/","twitter" => "deciolimapt","instagram" => "https://instagram.com/deciolimapt/","e-mail" => "dep.deciolima","formacao" => "Professor de Ensino Médio e Advogado" ),
        array( "facebook" => "https://www.facebook.com/PedroUczai/","twitter" => "uczai","instagram" => "","e-mail" => "dep.pedrouczai","formacao" => "Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/fabioreis1515","twitter" => "fabio__reis","instagram" => "https://www.instagram.com/fabioreis1515","e-mail" => "dep.fabioreis","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/jony.marcos.1","twitter" => "dep_jonymarcos","instagram" => "","e-mail" => "dep.jonymarcos","formacao" => "Radialista" ),
        array( "facebook" => "https://www.facebook.com/fabio.mitidieri.98/","twitter" => "FabioMitidieri1","instagram" => "","e-mail" => "dep.fabiomitidieri","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadojoaodaniel/","twitter" => "joaodanielpt","instagram" => "","e-mail" => "dep.joaodaniel","formacao" => "Agricultor" ),
        array( "facebook" => "https://www.facebook.com/orlandosilvasp/","twitter" => "osmar_serraglio","instagram" => "","e-mail" => "dep.orlandosilva","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/IvanValentePSOL/","twitter" => "dep_ivanvalente","instagram" => "https://www.instagram.com/ivanvalentepsol","e-mail" => "dep.ivanvalente","formacao" => "Matemático e Engenheiro." ),
        array( "facebook" => "https://www.facebook.com/luizaerundina/","twitter" => "luiza_erundina","instagram" => "https://www.instagram.com/luizaerundina/","e-mail" => "dep.luizaerundina","formacao" => "Assistente Social" ),
        array( "facebook" => "https://www.facebook.com/ana.perugini/","twitter" => "deputadoana","instagram" => "https://instagram.com/anaperugini","e-mail" => "dep.anaperugini","formacao" => "Advogada" ),
        array( "facebook" => "https://www.facebook.com/torcidaandres","twitter" => "torcidaandres","instagram" => "https://www.instagram.com/torcidaandres/","e-mail" => "dep.andressanchez","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/depchinaglia/","twitter" => "achinaglia","instagram" => "https://www.instagram.com/depchinaglia/","e-mail" => "dep.arlindochinaglia","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/dep.zarattini/","twitter" => "carloszarattini","instagram" => "https://www.instagram.com/zecacavalcanti/","e-mail" => "dep.carloszarattini","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/JoseMentorPT/","twitter" => "jose_mentor","instagram" => "","e-mail" => "dep.josementor","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/niltotattosp/","twitter" => "niltonsalomao","instagram" => "","e-mail" => "dep.niltotatto","formacao" => "Coordenador de Projetos" ),
        array( "facebook" => "https://www.facebook.com/DeputadoPauloTeixeira/","twitter" => "pauloteixeira13","instagram" => "https://www.instagram.com/pauloteixeira13/","e-mail" => "dep.pauloteixeira","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/valmir.prascidelli/","twitter" => "prascidelli","instagram" => "https://www.instagram.com/valmirprascidelli/","e-mail" => "dep.valmirprascidelli","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadovicentecandido","twitter" => "vicente_candido","instagram" => "","e-mail" => "dep.vicentecandido","formacao" => "Advogado, Comerciante" ),
        array( "facebook" => "https://www.facebook.com/DeputadoFederalVicentinho/","twitter" => "vicentinhopt","instagram" => "","e-mail" => "dep.vicentinho","formacao" => "Bacharel Em Direito e Metalúrgico." ),
        array( "facebook" => "https://www.facebook.com/VicentinhoJr/","twitter" => "vicentinhojr","instagram" => "https://www.instagram.com/vicentinhojunior/","e-mail" => "dep.vicentinhojunior","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/irajaabreu/","twitter" => "irajaabreu","instagram" => "https://instagram.com/iraja_abreu/","e-mail" => "dep.irajaabreu","formacao" => "Empresário, Produtor Rural" ),
        array( "facebook" => "https://www.facebook.com/flavianomelo15","twitter" => "flaviano_melo","instagram" => "","e-mail" => "dep.flavianomelo","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/alanrickm?fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.alanrick","formacao" => "Administrador de Empresas,jornalista" ),
        array( "facebook" => "","twitter" => "major_rocha45","instagram" => "https://www.instagram.com/majorrocha45/","e-mail" => "dep.rocha","formacao" => "Bacharel Em Direito,jornalista,oficial da Polícia Militar" ),
        array( "facebook" => "https://www.facebook.com/MarxBeltrao","twitter" => "","instagram" => "","e-mail" => "dep.marxbeltrao","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/arthurliradeputadofederal","twitter" => "departhurlira","instagram" => "","e-mail" => "dep.arthurlira","formacao" => "Agropecuarista, Bacharel Em Direito, Empresário" ),
        array( "facebook" => "https://www.facebook.com/mauricioquintella","twitter" => "depquintella","instagram" => "","e-mail" => "dep.mauricioquintellalessa","formacao" => "Servidor Público" ),
        array( "facebook" => "https://www.facebook.com/Deputado.JHC/","twitter" => "deputadojhc","instagram" => "https://www.instagram.com/deputadojhc","e-mail" => "dep.jhc","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/ciceroalmeidapolitico","twitter" => "","instagram" => "","e-mail" => "dep.ciceroalmeida","formacao" => "Cantor,radialista,repórter" ),
        array( "facebook" => "https://www.facebook.com/pedrovilela.al/","twitter" => "vilelapedro","instagram" => "https://www.instagram.com/vilelapedro","e-mail" => "dep.pedrovilela","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/pauderneytomazavelino/","twitter" => "pauderney","instagram" => "https://www.instagram.com/pauderney/","e-mail" => "dep.pauderneyavelino","formacao" => "Engenheiro Civil, Professor" ),
        array( "facebook" => "https://www.facebook.com/marcosrottaoficial/","twitter" => "marcosrotta","instagram" => "https://instagram.com/marcos_rotta/","e-mail" => "dep.marcosrotta","formacao" => "Jornalista,publicitário" ),
        array( "facebook" => "https://www.facebook.com/deputadaconceicaosampaio/","twitter" => "dep_csampaio","instagram" => "https://www.instagram.com/deputadaconceicaosampaio/","e-mail" => "dep.conceicaosampaio","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DepSilas/","twitter" => "silascamara_","instagram" => "https://www.instagram.com/depsilascamara/","e-mail" => "dep.silascamara","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/Deputado-%25C3%2581tila-Lins-329607960409077","twitter" => "","instagram" => "","e-mail" => "dep.atilalins","formacao" => "Bacharel Em Direito, Graduado Pela Universidade Federal do Amazonas Em 1.976; Advogado Com Inscrição Na Oab/am Nº 1.000 ; Bacharel Em Economia, Graduado Pela Universidade Federal do Amazonas Em 1.986; Auditor Concursado do Tce/am, 1.977" ),
        array( "facebook" => "https://www.facebook.com/arthurvirgiliobisneto","twitter" => "arthurbisneto","instagram" => "https://www.instagram.com/arthurbisnetooficial","e-mail" => "dep.arthurvirgiliobisneto","formacao" => "Político" ),
        array( "facebook" => "https://www.facebook.com/deputadocajado/","twitter" => "claudio_cajado","instagram" => "","e-mail" => "dep.claudiocajado","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/elmarnascimento/","twitter" => "depelmar","instagram" => "","e-mail" => "dep.elmarnascimento","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/josecarlosaleluia/","twitter" => "aleluiacosta","instagram" => "https://instagram.com/josecarlosaleluia/","e-mail" => "dep.josecarlosaleluia","formacao" => "Professor Universitário e Engenheiro Elétrico" ),
        array( "facebook" => "https://www.facebook.com/pauloazi/","twitter" => "pauloazi","instagram" => "https://www.instagram.com/deppauloazi/","e-mail" => "dep.pauloazi","formacao" => "Administrador de Empresas,engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/deputadoeriveltonsantana/","twitter" => "dep_erivelton","instagram" => "","e-mail" => "dep.eriveltonsantana","formacao" => "Assessor Político, Auxiliar de Administração" ),
        array( "facebook" => "https://www.facebook.com/luciovieiralima","twitter" => "","instagram" => "","e-mail" => "dep.luciovieiralima","formacao" => "Cacauicultor, Engenheiro Agrônomo, Pecuarista" ),
        array( "facebook" => "https://www.facebook.com/arthur.oliveiramaia/","twitter" => "departhurmaia","instagram" => "https://www.instagram.com/departhuroliveiramaia/","e-mail" => "dep.arthuroliveiramaia","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/deputadofederalmarciomarinho/","twitter" => "dpmarciomarinho","instagram" => "https://www.instagram.com/mcmmarinho/","e-mail" => "dep.marciomarinho","formacao" => "Radialista" ),
        array( "facebook" => "https://www.facebook.com/TiaEron/","twitter" => "tiaeron","instagram" => "https://www.instagram.com/tiaeron","e-mail" => "dep.tiaeron","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Irmão-Lázaro-741329655946890/","twitter" => "irmaolazaro","instagram" => "","e-mail" => "dep.irmaolazaro","formacao" => "Cantor,compositor,músico" ),
        array( "facebook" => "https://www.facebook.com/antonio.imbassahy/","twitter" => "dep_imbassahy","instagram" => "https://www.instagram.com/antonioimbassahy/","e-mail" => "dep.antonioimbassahy","formacao" => "Engenheiro Eletricista" ),
        array( "facebook" => "https://www.facebook.com/JoaoGualbertoOficial","twitter" => "","instagram" => "","e-mail" => "dep.joaogualberto","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/jutahymagalhaesjr","twitter" => "jotacosme","instagram" => "","e-mail" => "dep.jutahyjunior","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/Benito-Gama-584677634909297/","twitter" => "benitogama","instagram" => "https://www.instagram.com/benitogama/","e-mail" => "dep.benitogama","formacao" => "Economista,professor(a)" ),
        array( "facebook" => "https://www.facebook.com/ulduricojunior3637","twitter" => "UlduricoJunior","instagram" => "https://instagram.com/ulduricojunior/","e-mail" => "dep.ulduricojunior","formacao" => "Estudante Universitário" ),
        array( "facebook" => "https://www.facebook.com/MoroniTorgan/","twitter" => "deputadomoroni","instagram" => "","e-mail" => "dep.moronitorgan","formacao" => "Delegado de Polícia Federal" ),
        array( "facebook" => "https://www.facebook.com/moses2323/","twitter" => "depfederalmoses","instagram" => "https://instagram.com/mosesrodrigues/","e-mail" => "dep.mosesrodrigues","formacao" => "Administrador,professor de Geografia,professor de História" ),
        array( "facebook" => "https://www.facebook.com/vitorvalimfanpage","twitter" => "vitorvalim","instagram" => "","e-mail" => "dep.vitorvalim","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Cabo-Sabino-697004213668375/","twitter" => "","instagram" => "https://instagram.com/cabosabino/","e-mail" => "dep.cabosabino","formacao" => "Corretor de Imóveis" ),
        array( "facebook" => "https://www.facebook.com/deputadoronaldomartins","twitter" => "ronaldoprb10","instagram" => "https://instagram.com/ronaldomartins1010/","e-mail" => "dep.ronaldomartins","formacao" => "Músico,radialista" ),
        array( "facebook" => "https://www.facebook.com/danilobforte/","twitter" => "depdaniloforte","instagram" => "https://www.instagram.com/depdaniloforte/","e-mail" => "dep.daniloforte","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/raimundo.matos/","twitter" => "raimundo_matos","instagram" => "","e-mail" => "dep.raimundogomesdematos","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Federal-Genecias-Noronha-213910975288105/","twitter" => "depgenecias","instagram" => "https://instagram.com/geneciasnoronha/","e-mail" => "dep.geneciasnoronha","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/albertofraga.oficial/","twitter" => "alberto_fraga","instagram" => "https://instagram.com/joaoalbertofraga","e-mail" => "dep.albertofraga","formacao" => "Coronel da Polícia Militar do DF" ),
        array( "facebook" => "https://www.facebook.com/roneynemerdf/","twitter" => "roneynemer","instagram" => "","e-mail" => "dep.roneynemer","formacao" => "Servidor Público Estadual" ),
        array( "facebook" => "https://www.facebook.com/Laerte-Bessa-449211941872123/","twitter" => "laerte_bessa","instagram" => "","e-mail" => "dep.laertebessa","formacao" => "Delegado de Polícia" ),
        array( "facebook" => "https://www.facebook.com/ronaldofonsecaoficial/","twitter" => "depronaldo","instagram" => "https://www.instagram.com/depronaldo/","e-mail" => "dep.ronaldofonseca","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/RogerioRossoOficial/","twitter" => "","instagram" => "https://www.instagram.com/rogeriorosso/","e-mail" => "dep.rogeriorosso","formacao" => "Músico, Advogado" ),
        array( "facebook" => "https://www.facebook.com/izalci/","twitter" => "izalcilucas","instagram" => "https://www.instagram.com/izalci/","e-mail" => "dep.izalci","formacao" => "Professor e Contador" ),
        array( "facebook" => "https://www.facebook.com/DepAugustoCarvalho","twitter" => "dep_augustodf","instagram" => "","e-mail" => "dep.augustocarvalho","formacao" => " Bancário e Sociólogo" ),
        array( "facebook" => "https://www.facebook.com/vidigalsergio/","twitter" => "vidigalsergio","instagram" => "","e-mail" => "dep.sergiovidigal","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DrJorgeSilva/","twitter" => "jssilvajorge","instagram" => "","e-mail" => "dep.dr.jorgesilva","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/falecomlelo","twitter" => "lelocoimbra_","instagram" => "","e-mail" => "dep.lelocoimbra","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/dep.marcusvicente","twitter" => "marcusvicentes","instagram" => "","e-mail" => "dep.marcusvicente","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/Paulo-Foletto-184948081656256/","twitter" => "deputadofoletto","instagram" => "https://www.instagram.com/foletto4040/","e-mail" => "dep.paulofoletto","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/max.maurofilho/","twitter" => "maxmaurofilho","instagram" => "https://www.instagram.com/maxmaurofilho/","e-mail" => "dep.maxfilho","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/evair.vieirademelo/","twitter" => "evairdemelo","instagram" => "","e-mail" => "dep.evairdemelo","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputado.manato","twitter" => "deputadomanato","instagram" => "https://www.instagram.com/majorrocha45/","e-mail" => "dep.carlosmanato","formacao" => "Medico" ),
        array( "facebook" => "https://www.facebook.com/danielvilelaoficial/","twitter" => "danielvilela15","instagram" => "https://www.instagram.com/danielvilela15","e-mail" => "dep.danielvilela","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DEPUTADOFEDERALPEDROCHAVESPMDB","twitter" => "depsimaopedro","instagram" => "","e-mail" => "dep.pedrochaves","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/robertobalestraequipe/","twitter" => "mandatobalestra","instagram" => "https://instagram.com/mandatobalestra/","e-mail" => "dep.robertobalestra","formacao" => "Agropecuarista, Industrial, Advogado, Comerciante e Técnico em Laticínios" ),
        array( "facebook" => "https://www.facebook.com/sandesjunior/","twitter" => "sandes_junior","instagram" => "https://instagram.com/sandesjunior/","e-mail" => "dep.sandesjunior","formacao" => "Radialista e Advogado" ),
        array( "facebook" => "https://www.facebook.com/MarcosAbrao/","twitter" => "marcosabraor","instagram" => "https://www.instagram.com/marcosabraororiz","e-mail" => "dep.marcosabrao","formacao" => "Economista e Empresário na Área Pecuarista" ),
        array( "facebook" => "https://www.facebook.com/delegado.waldir/","twitter" => "delegadowaldir","instagram" => "","e-mail" => "dep.delegadowaldir","formacao" => "Delegado" ),
        array( "facebook" => "https://www.facebook.com/MagdaMofattoH/","twitter" => "Magdamofatto","instagram" => "","e-mail" => "dep.magdamofatto","formacao" => "Empresária" ),
        array( "facebook" => "https://www.facebook.com/deputadojoaocampos/","twitter" => "depjoaocampos","instagram" => "","e-mail" => "dep.joaocampos","formacao" => "Delegado de Polícia de Classe Especial" ),
        array( "facebook" => "https://www.facebook.com/heuler.cruvinel.7/","twitter" => "heuler5500","instagram" => "","e-mail" => "dep.heulercruvinel","formacao" => "Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/CelioSilveiraOficial/","twitter" => "csilveira4599","instagram" => "https://www.instagram.com/celiosilveiradeputado/","e-mail" => "dep.celiosilveira","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/FabioSousaOficial/","twitter" => "depfabiosousa","instagram" => "","e-mail" => "dep.fabiosousa","formacao" => "Radialista, Apresentador de Televisão, Pastor e Gestor Público" ),
        array( "facebook" => "https://www.facebook.com/G.Vecci45/","twitter" => "depvecci45","instagram" => "https://www.instagram.com/gvecci/","e-mail" => "dep.giuseppevecci","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/jovairarantes1414","twitter" => "jovair1414","instagram" => "https://instagram.com/jovair_arantes","e-mail" => "dep.jovairarantes","formacao" => "Cirurgião-dentista" ),
        array( "facebook" => "https://www.facebook.com/alexandrebaldyoficial/","twitter" => "alexandrebaldy","instagram" => "https://www.instagram.com/alexandrebaldy/","e-mail" => "dep.alexandrebaldy","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/lucasvergilio7777","twitter" => "vergiliolucas77","instagram" => "","e-mail" => "dep.lucasvergilio","formacao" => "Administrador de Empresas e Corretor de Seguros" ),
        array( "facebook" => "https://www.facebook.com/DepJuscelinoFilho/","twitter" => "depjuscelino","instagram" => "https://www.instagram.com/juscelinofilho","e-mail" => "dep.juscelinofilho","formacao" => "Empresário,médico(a)" ),
        array( "facebook" => "https://www.facebook.com/Alberto-Filho-1522-1514803892083442/","twitter" => "depalbertofilho","instagram" => "","e-mail" => "dep.albertofilho","formacao" => "Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/hildorocha1","twitter" => "hildorocha","instagram" => "https://instagram.com/hildorocha/","e-mail" => "dep.hildorocha","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Andr%25C3%25A9-Fufuca-474257199269888/","twitter" => "depandrefufuca","instagram" => "https://www.instagram.com/andre_fufuca/","e-mail" => "dep.andrefufuca","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/elizianegama","twitter" => "elizianegama","instagram" => "https://www.instagram.com/elizianegama/","e-mail" => "dep.elizianegama","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/victormendesma/","twitter" => "victormendesma","instagram" => "https://www.instagram.com/victormendesma/","e-mail" => "dep.victormendes","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/joaocastelo","twitter" => "","instagram" => "","e-mail" => "dep.joaocastelo","formacao" => "Empresário e Advogado" ),
        array( "facebook" => "https://www.facebook.com/sarneyfilho/","twitter" => "sarneyfilho","instagram" => "https://www.instagram.com/sarneyfilho/","e-mail" => "dep.sarneyfilho","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/DeputadoCarlosMelles/","twitter" => "carlosmelles","instagram" => "https://www.instagram.com/ronaldocarletto/","e-mail" => "dep.carlosmelles","formacao" => "Engenheiro Agrônomo e Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadomisaelvarella/","twitter" => "","instagram" => "https://www.instagram.com/misaelvarella/","e-mail" => "dep.misaelvarella","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadomarioheringer","twitter" => "mario_heringer","instagram" => "http://instagram.com/marioheringer","e-mail" => "dep.marioheringer","formacao" => "Medico" ),
        array( "facebook" => "https://www.facebook.com/marceloaro/","twitter" => "marceloaro","instagram" => "https://www.instagram.com/marceloaro/","e-mail" => "dep.marceloaro","formacao" => "Jornalista" ),
        array( "facebook" => "https://www.facebook.com/deputadofabioramalho4311/","twitter" => "_fabinhoramalho","instagram" => "","e-mail" => "dep.fabioramalho","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/WelitonPrado","twitter" => "pradoweliton","instagram" => "","e-mail" => "dep.welitonprado","formacao" => "Bacharel Em Filosofia" ),
        array( "facebook" => "https://www.facebook.com/deputadoleonardoquintao/","twitter" => "leonardoquintao","instagram" => "https://www.instagram.com/leonardoquintao/","e-mail" => "dep.leonardoquintao","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/Newton-Cardoso-Júnior-650863341637642/","twitter" => "newton1510","instagram" => "https://www.instagram.com/newtoncardosojr/","e-mail" => "dep.newtoncardosojr","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/RodrigoPacheco1515/","twitter" => "","instagram" => "","e-mail" => "dep.rodrigopacheco","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/Saraiva-Felipe-552014011498511/","twitter" => "","instagram" => "","e-mail" => "dep.saraivafelipe","formacao" => "Professor Universitário e Médico" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.wadsonribeiro","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/depdimasfabiano.toledo","twitter" => "depdimasfabiano","instagram" => "","e-mail" => "dep.dimasfabiano","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Pastor-Franklin-Lima-1386517181671346/?fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.franklinlima","formacao" => "pastor" ),
        array( "facebook" => "https://www.facebook.com/deputadoluizfernando/","twitter" => "depluizfernando","instagram" => "","e-mail" => "dep.luizfernandofaria","formacao" => "Engenheiro Mecânico, Agropecuarista, Empresário - Administração" ),
        array( "facebook" => "https://www.facebook.com/odelmoleao","twitter" => "odoricomonteiro","instagram" => "https://www.instagram.com/odoricomonteiro/","e-mail" => "dep.odelmoleao","formacao" => "Produtor Rural e Bancário" ),
        array( "facebook" => "https://www.facebook.com/deputadorenzobraz/","twitter" => "deputadorenzo","instagram" => "","e-mail" => "dep.renzobraz","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/toninho.pinheiro.3/","twitter" => "pinheirotoninho","instagram" => "","e-mail" => "dep.toninhopinheiro","formacao" => "Comerciante" ),
        array( "facebook" => "https://www.facebook.com/deputadofederalbilacpinto/","twitter" => "bilac_pinto","instagram" => "","e-mail" => "dep.bilacpinto","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/DelegadoEdsonMoreiraPolitico/","twitter" => "delegadomoreira","instagram" => "https://www.instagram.com/delegadomoreira/","e-mail" => "dep.delegadoedsonmoreira","formacao" => "Advogado(a),delegado de Polícia Civil,policial Militar,professor de Direito" ),
        array( "facebook" => "https://www.facebook.com/marceloalvaroantonio/","twitter" => "marceloalvaroan","instagram" => "https://www.instagram.com/marceloalvaroantonio","e-mail" => "dep.marceloalvaroantonio","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadolincolnportela/","twitter" => "lincoln_portela","instagram" => "","e-mail" => "dep.lincolnportela","formacao" => "Radialista e Comunicador." ),
        array( "facebook" => "https://www.facebook.com/erosbiondini/","twitter" => "eros_1433","instagram" => "https://www.instagram.com/erosbiondini/","e-mail" => "dep.erosbiondini","formacao" => "Médico Veterinário, Músico" ),
        array( "facebook" => "https://www.facebook.com/julio.delgado.1654","twitter" => "depjuliodelgado","instagram" => "","e-mail" => "dep.juliodelgado","formacao" => "Consultor e Advogado" ),
        array( "facebook" => "https://www.facebook.com/tenentelucio1","twitter" => "deptenentelucio","instagram" => "","e-mail" => "dep.tenentelucio","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/diegoandrademg/","twitter" => "","instagram" => "http://instagram.com/diegoandrademg","e-mail" => "dep.diegoandrade","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/jaiminho.martins","twitter" => "jaiminhomartins","instagram" => "","e-mail" => "dep.jaimemartins","formacao" => "Empresário, Engenheiro e Advogado" ),
        array( "facebook" => "https://www.facebook.com/deputadomarcosmontes/","twitter" => "depmarcosmontes","instagram" => "","e-mail" => "dep.marcosmontes","formacao" => "Médico, Professor de Medicina, Médico do Trabalho" ),
        array( "facebook" => "https://www.facebook.com/PastorStefanoAguiar/","twitter" => "depstefano","instagram" => "","e-mail" => "dep.stefanoaguiar","formacao" => "Administrador e Ministro do Evangelho" ),
        array( "facebook" => "https://www.facebook.com/Dep.BonifacioAndrada/","twitter" => "bandrada","instagram" => "","e-mail" => "dep.bonifaciodeandrada","formacao" => "Advogado e Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/caionarcio/","twitter" => "caionarcio","instagram" => "https://instagram.com/jeronimogoergen/","e-mail" => "dep.caionarcio","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/domingossaviomg/","twitter" => "domingossaviomg","instagram" => "https://www.instagram.com/domingossaviomg/","e-mail" => "dep.domingossavio","formacao" => "Médico Veterinário" ),
        array( "facebook" => "https://www.facebook.com/deputadofederaleduardobarbosa/","twitter" => "eduardobarbosa_","instagram" => "","e-mail" => "dep.eduardobarbosa","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/depmarcuspestana","twitter" => "marcus_pestana","instagram" => "","e-mail" => "dep.marcuspestana","formacao" => "Economista, Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/abiackelpaulo/","twitter" => "pauloabiackel","instagram" => "","e-mail" => "dep.pauloabiackel","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/rodrigodecastro45/","twitter" => "rodrigocastro45","instagram" => "https://instagram.com/rodrigocastro45/","e-mail" => "dep.rodrigodecastro","formacao" => "Advogado e Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/deputadafederaldaminapereira/","twitter" => "deputadadamina","instagram" => "https://www.instagram.com/deputadadamina/","e-mail" => "dep.daminapereira","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Laudiviocarvalho/","twitter" => "laudivioc","instagram" => "","e-mail" => "dep.laudiviocarvalho","formacao" => "Jornalista" ),
        array( "facebook" => "https://www.facebook.com/deputadofederalzesilva/","twitter" => "ZeSilva_","instagram" => "","e-mail" => "dep.zesilva","formacao" => "Agricultor, Agrônomo, Extensionista Rural" ),
        array( "facebook" => "https://www.facebook.com/henriquemandetta","twitter" => "dep_mandetta","instagram" => "https://www.instagram.com/henriquemandetta/","e-mail" => "dep.mandetta","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/carlos.marun","twitter" => "deputadomarun","instagram" => "","e-mail" => "dep.carlosmarun","formacao" => "Advogado(a),engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/GeraldoResendeMS/","twitter" => "dep_geraldo","instagram" => "","e-mail" => "dep.geraldoresende","formacao" => "Médico e Gráfico" ),
        array( "facebook" => "https://www.facebook.com/terezacristinams/","twitter" => "tereza_20456","instagram" => "","e-mail" => "dep.terezacristina","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/dionizioelizeu/","twitter" => "elizeudionizio","instagram" => "https://www.instagram.com/elizeudionizio/","e-mail" => "dep.elizeudionizio","formacao" => "Estudante Universitário" ),
        array( "facebook" => "https://www.facebook.com/AdiltonSachetti","twitter" => "adiltonsachetti","instagram" => "https://instagram.com/adiltonsachetti","e-mail" => "dep.adiltonsachetti","formacao" => "Arquiteto" ),
        array( "facebook" => "https://www.facebook.com/fabiogarcia4010","twitter" => "fabiogarcia4010","instagram" => "https://instagram.com/depfabiogarcia/","e-mail" => "dep.fabiogarcia","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/VictorioGalliOficial/","twitter" => "","instagram" => "","e-mail" => "dep.professorvictoriogalli","formacao" => "Professor" ),
        array( "facebook" => "https://www.facebook.com/tampinha1212/","twitter" => "","instagram" => "","e-mail" => "dep.joseaugustocurvo","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/nilsonleitao","twitter" => "nilson_leitao","instagram" => "","e-mail" => "dep.nilsonleitao","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/HelioLeite2525/","twitter" => "h_leite","instagram" => "","e-mail" => "dep.helioleite","formacao" => "Corretor de Imóveis" ),
        array( "facebook" => "https://www.facebook.com/deputadoarnaldojordy","twitter" => "arnaldojordy","instagram" => "https://www.instagram.com/arnaldojordy/","e-mail" => "dep.arnaldojordy","formacao" => "Político" ),
        array( "facebook" => "https://www.facebook.com/Júlia-Marinho-762808637093675/","twitter" => "","instagram" => "","e-mail" => "dep.juliamarinho","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/oficialedermauro","twitter" => "edermauroficial","instagram" => "https://instagram.com/edermauroficial/","e-mail" => "dep.delegadoedermauro","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/joaquimpassarinhooficial/","twitter" => "joaquimpassarin","instagram" => "","e-mail" => "dep.joaquimpassarinho","formacao" => "Arquiteto" ),
        array( "facebook" => "https://www.facebook.com/Nilson-Pinto-354764524584734/","twitter" => "depnilsonpinto","instagram" => "","e-mail" => "dep.nilsonpinto","formacao" => "Professor" ),
        array( "facebook" => "https://www.facebook.com/JosueBengtsonUmsocoracao","twitter" => "josuebengtson","instagram" => "https://www.instagram.com/prjosuebengtson/","e-mail" => "dep.josuebengtson","formacao" => "Pastor Evangélico" ),
        array( "facebook" => "https://www.facebook.com/chapadinha55","twitter" => "chapadinha55","instagram" => "","e-mail" => "dep.franciscochapadinha","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadowlad/","twitter" => "deputadowlad","instagram" => "https://instagram.com/deputadowlad/","e-mail" => "dep.wladimircosta","formacao" => "Locutor e Comentarista de Radio e Televisao e Radialista" ),
        array( "facebook" => "https://www.facebook.com/Efraim-Filho_2511-810714015625617/","twitter" => "efraimfilho","instagram" => "https://instagram.com/efraimfilhopb","e-mail" => "dep.efraimfilho","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/hugomottapb/","twitter" => "hugomottapb","instagram" => "https://instagram.com/hugomottapb","e-mail" => "dep.hugomotta","formacao" => "Estudante Universitário" ),
        array( "facebook" => "https://www.facebook.com/ManoelJuniorOficial/","twitter" => "depmanoeljunior","instagram" => "https://instagram.com/depmanoeljunior/","e-mail" => "dep.manoeljunior","formacao" => "Médico" ),
        array( "facebook" => "","twitter" => "aguinaldo1111","instagram" => "","e-mail" => "dep.aguinaldoribeiro","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/R%C3%B4mulo-Gouveia-701538999871261/","twitter" => "romulogouveia","instagram" => "https://www.instagram.com/romulogouveiapb","e-mail" => "dep.romulogouveia","formacao" => "Servidor Público" ),
        array( "facebook" => "https://www.facebook.com/pedrocloficial/?fref=ts","twitter" => "pedroocl","instagram" => "","e-mail" => "dep.pedrocunhalima","formacao" => "Policial Civil, Engenheiro Mecânico, Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/wilsonfilhodep/","twitter" => "wilsonfilho_","instagram" => "https://www.instagram.com/wilsonsantiagofilho/","e-mail" => "dep.wilsonfilho","formacao" => "" ),
        array( "facebook" => "","twitter" => "benjamimaranhao","instagram" => "","e-mail" => "dep.benjaminmaranhao","formacao" => "Cirurgião-dentista" ),
        array( "facebook" => "https://www.facebook.com/mendoncafilhoPE","twitter" => "mendonca_filho","instagram" => "https://www.instagram.com/mendonca2525/","e-mail" => "dep.mendoncafilho","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Federal-Pastor-Eurico-203543366481082/","twitter" => "","instagram" => "","e-mail" => "dep.pastoreurico","formacao" => "Comerciário, Comunicador de Rádio" ),
        array( "facebook" => "https://www.facebook.com/JarbasVasconcelos/","twitter" => "ejarbas15","instagram" => "","e-mail" => "dep.jarbasvasconcelos","formacao" => "Advogado(a),funcionário Público" ),
        array( "facebook" => "https://www.facebook.com/deputadokaiomanicoba","twitter" => "kaiocmmnf","instagram" => "https://instagram.com/dep.kaio","e-mail" => "dep.kaiomanicoba","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/andersonferreirafederal/","twitter" => "federalanderson","instagram" => "","e-mail" => "dep.andersonferreira","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/fernandofilhope","twitter" => "fbcfilho","instagram" => "https://www.instagram.com/fbcfilho/","e-mail" => "dep.fernandocoelhofilho","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://pt-br.facebook.com/danilocabral4010/","twitter" => "danilo4010","instagram" => "","e-mail" => "dep.rauljungmann","formacao" => "Outros" ),
        array( "facebook" => "https://www.facebook.com/TadeuAlencar4020/","twitter" => "","instagram" => "https://www.instagram.com/deputadotadeualencar/","e-mail" => "dep.tadeualencar","formacao" => "Procurador" ),
        array( "facebook" => "https://www.facebook.com/andredepaulaoficial/","twitter" => "psdparanatama","instagram" => "","e-mail" => "dep.fernandomonteiro","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/betinho45/","twitter" => "betinhogomes","instagram" => "","e-mail" => "dep.betinhogomes","formacao" => "Engenheiro Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/BrunoAraujoPE","twitter" => "brunoaraujo4511","instagram" => "https://www.instagram.com/brunoaraujo4511/","e-mail" => "dep.brunoaraujo","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/DanielCoelho45/","twitter" => "danielcoelho45","instagram" => "https://www.instagram.com/danielcoelho45/","e-mail" => "dep.danielcoelho","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/jorgecorterealpe/","twitter" => "jorgecortereal","instagram" => "https://www.instagram.com/jorgecreal/","e-mail" => "dep.jorgecortereal","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/augusto.coutinho","twitter" => "augustocmelo","instagram" => "https://www.instagram.com/augustocmelo/","e-mail" => "dep.augustocoutinho","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/iracemaportella/","twitter" => "iracemaportela","instagram" => "","e-mail" => "dep.iracemaportella","formacao" => "Empresária, Professor" ),
        array( "facebook" => "https://www.facebook.com/atilafreitaslira/","twitter" => "deputadoatila","instagram" => "https://instagram.com/atilafreitaslira/","e-mail" => "dep.atilalira","formacao" => "Administrador de Empresas e Economista" ),
        array( "facebook" => "https://www.facebook.com/hfortespi/","twitter" => "heraclitopi","instagram" => "http://instagram.com/heraclitofortes","e-mail" => "dep.heraclitofortes","formacao" => "Servidor Público" ),
        array( "facebook" => "https://www.facebook.com/rodrigomartins4120391/","twitter" => "rodrigopsb","instagram" => "","e-mail" => "dep.rodrigomartins","formacao" => "Cirurgião-dentista" ),
        array( "facebook" => "https://www.facebook.com/depfederaljuliocesar/","twitter" => "depjuliocesarpi","instagram" => "","e-mail" => "dep.juliocesar","formacao" => "Professor, Advogado e Produtor Rural" ),
        array( "facebook" => "https://www.facebook.com/DiegoGarciaDeputado","twitter" => "diegogarciapr","instagram" => "https://www.instagram.com/deputadodiegogarcia/","e-mail" => "dep.diegogarcia","formacao" => "Autônomo" ),
        array( "facebook" => "https://www.facebook.com/DeputadoOsmarSerraglio/","twitter" => "osmarterra","instagram" => "","e-mail" => "dep.osmarserraglio","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/sergiosouza1512/","twitter" => "_sergiosouza","instagram" => "","e-mail" => "dep.sergiosouza","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/depsperafico/","twitter" => "depsperafico","instagram" => "","e-mail" => "dep.dilceusperafico","formacao" => "Industrial, Bacharel Em Direito, Filósofo e Agropecuarista" ),
        array( "facebook" => "https://www.facebook.com/marcelobelinatimartins/","twitter" => "marcelobelinati","instagram" => "https://www.instagram.com/marcelobelinati_/","e-mail" => "dep.marcelobelinati","formacao" => "Advogado(a),médico(a)" ),
        array( "facebook" => "https://www.facebook.com/RicardoBarrosOficial/","twitter" => "ricardobarrospp","instagram" => "","e-mail" => "dep.ricardobarros","formacao" => "Engenheiro Civil e Empresário" ),
        array( "facebook" => "https://www.facebook.com/rubensbuenopps/","twitter" => "rubensbuenopps","instagram" => "","e-mail" => "dep.rubensbueno","formacao" => "Professor" ),
        array( "facebook" => "https://www.facebook.com/depsandroalex/","twitter" => "sandroalex2323","instagram" => "","e-mail" => "dep.sandroalex","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/ChristianeYared","twitter" => "christianeyared","instagram" => "https://www.instagram.com/christianeyared/","e-mail" => "dep.christianedesouzayared","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/giacobofernando","twitter" => "giacobofernando","instagram" => "","e-mail" => "dep.giacobo","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/nishimoriluiz/","twitter" => "luiznishimori","instagram" => "","e-mail" => "dep.luiznishimori","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/MeyerFanPage/","twitter" => "leopoldo_meyer","instagram" => "","e-mail" => "dep.leopoldomeyer","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/LucianoDucci/","twitter" => "lucianoducci","instagram" => "","e-mail" => "dep.lucianoducci","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/nelsonpadovani.com.br","twitter" => "","instagram" => "","e-mail" => "dep.nelsonpadovani","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadotakayama","twitter" => "pastortakayama","instagram" => "","e-mail" => "dep.takayama","formacao" => "Professor, Empresário e Ministro Evangélico" ),
        array( "facebook" => "https://www.facebook.com/evandrorogerio.roman/","twitter" => "roman_evandro","instagram" => "https://www.instagram.com/evandroroman/","e-mail" => "dep.evandroroman","formacao" => "Professor de Educação Física" ),
        array( "facebook" => "https://www.facebook.com/hauly45/","twitter" => "deputadohauly","instagram" => "","e-mail" => "dep.luizcarloshauly","formacao" => "Economista e Professor" ),
        array( "facebook" => "https://www.facebook.com/profile.php?id=100009157101003&fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.paulomartins","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Dep.AlfredoKaefer/","twitter" => "alfredokaefer","instagram" => "https://www.instagram.com/alfredokaefer/","e-mail" => "dep.alfredokaefer","formacao" => "Industrial" ),
        array( "facebook" => "https://www.facebook.com/alexcanziani1414","twitter" => "canzianialex","instagram" => "https://www.instagram.com/alex_canziani/","e-mail" => "dep.alexcanziani","formacao" => "Registrador de Imóveis" ),
        array( "facebook" => "https://www.facebook.com/LeandreOficial/","twitter" => "leandredaideal","instagram" => "","e-mail" => "dep.leandre","formacao" => "Engenheira Civil" ),
        array( "facebook" => "https://www.facebook.com/FernandoFrancischiniBR/","twitter" => "francischini_","instagram" => "https://www.instagram.com/fernando_francischini_/","e-mail" => "dep.fernandofrancischini","formacao" => "Delegado de Polícia Federal" ),
        array( "facebook" => "https://www.facebook.com/DepFranciscoFloriano","twitter" => "dep_francisco","instagram" => "","e-mail" => "dep.franciscofloriano","formacao" => "Apresentador de Televisão, Locutor, Publicitário, Representante Comercial" ),
        array( "facebook" => "https://www.facebook.com/DeputadoMarcosSoares/","twitter" => "marcossoaresdep","instagram" => "","e-mail" => "dep.marcossoares","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/RodrigoMaiaRJ/","twitter" => "deprodrigomaia","instagram" => "https://instagram.com/rodrigomaiarj/","e-mail" => "dep.rodrigomaia","formacao" => "Bancário" ),
        array( "facebook" => "https://www.facebook.com/sostenescavalcante","twitter" => "depsostenes","instagram" => "https://www.instagram.com/depsostenes/","e-mail" => "dep.sostenescavalcante","formacao" => "Teólogo" ),
        array( "facebook" => "https://www.facebook.com/deputadomarcelomatos/","twitter" => "","instagram" => "https://instagram.com/deputadomarcelomatos/","e-mail" => "dep.marcelomatos","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/altineucortes/","twitter" => "altineu","instagram" => "","e-mail" => "dep.altineucortes","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/DeputadoEduardoCunha","twitter" => "DepEduardoCunha","instagram" => "https://www.instagram.com/depeduardocunha/","e-mail" => "dep.eduardocunha","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/fernando.jordao","twitter" => "","instagram" => "","e-mail" => "dep.fernandojordao","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/sorayasantos1513/","twitter" => "","instagram" => "","e-mail" => "dep.sorayasantos","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/rio.pedropaulo/","twitter" => "pedropaulo","instagram" => "","e-mail" => "dep.pedropaulo","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/sergio.zveiter/?fref=ts","twitter" => "search?q=SERGIO%20ZVEITER&src=typd","instagram" => "","e-mail" => "dep.sergiozveiter","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/marcoantonio.nevescabral/?fref=ts","twitter" => "search?q=MARCO%20ANTONIO%20CABRAL&src=typd","instagram" => "","e-mail" => "ep.marcoantoniocabral","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/juliolopesfanpagerj/","twitter" => "juliolopes_rj","instagram" => "https://www.instagram.com/juliolopes_rio/","e-mail" => "dep.juliolopes","formacao" => "Administrador de Empresas, Professor" ),
        array( "facebook" => "https://www.facebook.com/DeputadoSimaoSessim","twitter" => "simao_sessim","instagram" => "","e-mail" => "dep.simaosessim","formacao" => "Professor e Advogado" ),
        array( "facebook" => "https://www.facebook.com/Valle.Alexandre/","twitter" => "","instagram" => "","e-mail" => "dep.alexandrevalle","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/drjoaoferreiraneto/","twitter" => "DrJoaoOficial","instagram" => "https://instagram.com/Drjoaooficial","e-mail" => "dep.dr.joao","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/deputadopaulofeijo/","twitter" => "paulofeijo2288","instagram" => "https://instagram.com/feijofederal/","e-mail" => "dep.paulofeijo","formacao" => "Engenheiro Mecânico" ),
        array( "facebook" => "https://www.facebook.com/robertosalesoficial/","twitter" => "depzeroberto","instagram" => "","e-mail" => "dep.robertosales","formacao" => "Administrador,corretor de Imóveis" ),
        array( "facebook" => "https://www.facebook.com/rosangelasgomesrj/","twitter" => "rosangelacurado","instagram" => "https://www.instagram.com/rosangelacurado/","e-mail" => "dep.rosangelagomes","formacao" => "Bacharela Em Direito" ),
        array( "facebook" => "https://www.facebook.com/FelipeBornier/","twitter" => "felipebornierrj","instagram" => "https://www.instagram.com/felipebornier","e-mail" => "dep.felipebornier","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadohugoleal","twitter" => "dephugoleal","instagram" => "https://instagram.com/dephugoleal/","e-mail" => "dep.hugoleal","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/jairmessias.bolsonaro","twitter" => "depbolsonaro","instagram" => "https://www.instagram.com/jairmessiasbolsonaro/","e-mail" => "dep.jairbolsonaro","formacao" => "Militar" ),
        array( "facebook" => "https://www.facebook.com/alexandreserfiotis/","twitter" => "aleserfiotis","instagram" => "","e-mail" => "dep.alexandreserfiotis","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/indiodacosta/","twitter" => "indio","instagram" => "https://www.instagram.com/indio.dacosta/","e-mail" => "dep.indiodacosta","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/OtavioLeite/","twitter" => "dep_padrejoao","instagram" => "","e-mail" => "dep.otavioleite","formacao" => "Advogado e Professor de Direito" ),
        array( "facebook" => "https://www.facebook.com/cristiane.brasil/","twitter" => "Dep_CrisBrasil","instagram" => "https://www.instagram.com/deputadacristianebrasil/","e-mail" => "dep.cristianebrasil","formacao" => "Advogada" ),
        array( "facebook" => "https://www.facebook.com/deputadodeley/","twitter" => "","instagram" => "","e-mail" => "dep.deley","formacao" => "Atleta Profissional e Tecnico Em Desportos" ),
        array( "facebook" => "https://www.facebook.com/TV-Daciolo-264727663651168","twitter" => "cabodaciolo","instagram" => "","e-mail" => "dep.cabodaciolo","formacao" => "Bombeiro" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.ezequielteixeira","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/LuizCarlosRamos/","twitter" => "https://www.twitter.com/lcrbr","instagram" => "","e-mail" => "dep.luizcarlosramos","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/Miro.teixeirapros90/","twitter" => "miroteixeira","instagram" => "","e-mail" => "dep.miroteixeira","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/AureoDeputado/","twitter" => "deputadoaureo","instagram" => "https://www.instagram.com/aureodeputado/","e-mail" => "dep.aureo","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/felipemaiarn","twitter" => "depfelipemaia","instagram" => "https://instagram.com/depfelipemaia","e-mail" => "dep.felipemaia","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Walter-Alves-457272360980075/","twitter" => "walteralvesrn","instagram" => "https://www.instagram.com/walteralvesrn","e-mail" => "dep.walteralves","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/betorosado1111/","twitter" => "betorosado","instagram" => "https://www.instagram.com/betorosado1111/","e-mail" => "dep.betorosado","formacao" => "Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/rafaelmottarn/","twitter" => "rafaelmottarn","instagram" => "https://instagram.com/rafaelmottarn","e-mail" => "dep.rafaelmotta","formacao" => "Engenheiro" ),
        array( "facebook" => "https://www.facebook.com/fabiofaria5555/","twitter" => "fabiofaria5555","instagram" => "https://www.instagram.com/fabiofaria55/","e-mail" => "dep.fabiofaria","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/rogeriosmarinho/?fref=photo","twitter" => "rogeriosmarinho","instagram" => "","e-mail" => "dep.rogeriomarinho","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/jacomern","twitter" => "antoniojacome","instagram" => "https://www.instagram.com/jacomern/","e-mail" => "dep.antoniojacome","formacao" => "Advogado(a),médico(a),teólogo" ),
        array( "facebook" => "https://www.facebook.com/depmarcosrogerio/","twitter" => "marcosrogeriodf","instagram" => "","e-mail" => "dep.marcosrogerio","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadoluciomosquini","twitter" => "luciomosquini","instagram" => "https://www.instagram.com/luciomosquini","e-mail" => "dep.luciomosquini","formacao" => "Engenheiro Eletricista" ),
        array( "facebook" => "https://www.facebook.com/MarinhaRaupp","twitter" => "depmarinharaupp","instagram" => "","e-mail" => "dep.marinharaupp","formacao" => "Psicóloga, Técnica Em Assuntos Educacionais, Professora e Servidora Pública" ),
        array( "facebook" => "https://www.facebook.com/deputadoluizclaudio","twitter" => "","instagram" => "","e-mail" => "dep.luizclaudio","formacao" => "Professor(a),técnico Agrícola" ),
        array( "facebook" => "https://www.facebook.com/LindomarGarcon1521/","twitter" => "depgarcon","instagram" => "","e-mail" => "dep.lindomargarcon","formacao" => "Comerciante" ),
        array( "facebook" => "https://www.facebook.com/dep.expeditonetto/","twitter" => "netto_expedito","instagram" => "","e-mail" => "dep.expeditonetto","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/marianacarvalho45","twitter" => "marianapsdb","instagram" => "","e-mail" => "dep.marianacarvalho","formacao" => "Bacharela Em Direito,médica" ),
        array( "facebook" => "https://www.facebook.com/deputadoniltoncapixaba/","twitter" => "odelmoleao","instagram" => "Suplente","e-mail" => "dep.niltoncapixaba","formacao" => "Empresário" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.abelmesquitajr","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadocarlosandrade/","twitter" => "carlosandradedf","instagram" => "https://instagram.com/deputadomarcelomatos/","e-mail" => "dep.carlosandrade","formacao" => "Administrador,eletricitário" ),
        array( "facebook" => "https://www.facebook.com/DeputadoHiranGoncalves","twitter" => "","instagram" => "","e-mail" => "dep.hirangoncalves","formacao" => "Médico Legista,médico(a)" ),
        array( "facebook" => "https://www.facebook.com/RemidioMonaiRR/","twitter" => "remidiomonai","instagram" => "https://www.instagram.com/remidiomonai/","e-mail" => "dep.remidiomonai","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DepJhonatanJesus/","twitter" => "jhonatan_djesus","instagram" => "https://instagram.com/jhonatandejesus/","e-mail" => "dep.jhonatandejesus","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadamariahelena","twitter" => "","instagram" => "","e-mail" => "dep.mariahelena","formacao" => "Advogada" ),
        array( "facebook" => "https://www.facebook.com/sheridan4545/","twitter" => "depsheridan","instagram" => "","e-mail" => "dep.sheridan","formacao" => "Psicóloga" ),
        array( "facebook" => "https://www.facebook.com/onyx.lorenzoni/","twitter" => "orlandosilva_jr","instagram" => "","e-mail" => "dep.onyxlorenzoni","formacao" => "Veterinario" ),
        array( "facebook" => "https://www.facebook.com/deputadogiovanicherini","twitter" => "giovanicherini","instagram" => "https://www.instagram.com/deputadogiovanicherini/","e-mail" => "dep.giovanicherini","formacao" => "Tecnólogo Em Cooperativismo" ),
        array( "facebook" => "https://www.facebook.com/depalceumoreira/","twitter" => "alceu_moreira","instagram" => "","e-mail" => "dep.alceumoreira","formacao" => "Comerciante" ),
        array( "facebook" => "https://www.facebook.com/DarcisioPerondi","twitter" => "darcisioperondi","instagram" => "https://www.instagram.com/darcisioperondi/","e-mail" => "dep.darcisioperondi","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/josefogacapoa/","twitter" => "jose_fogaca","instagram" => "https://www.instagram.com/josefog/","e-mail" => "dep.josefogaca","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/mauropereirapmdb/","twitter" => "","instagram" => "","e-mail" => "dep.mauropereira","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DeputadoOsmarTerra","twitter" => "otavioleite","instagram" => "","e-mail" => "dep.osmarterra","formacao" => "Médico" ),
        array( "facebook" => "https://www.facebook.com/Afonso-Hamm-Jaguar%25C3%25A3o-RS-1537371759814828","twitter" => "depafonsohamm","instagram" => "","e-mail" => "dep.afonsohamm","formacao" => "Engenheiro Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/covatti.filho/","twitter" => "covattifilho","instagram" => "https://www.instagram.com/covattifilho/","e-mail" => "dep.covattifilho","formacao" => "" ),
        array( "facebook" => "jeronimogoergen","twitter" => "","instagram" => "https://instagram.com/jeronimogoergen/","e-mail" => "dep.jeronimogoergen","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/Jos%25C3%25A9-Ot%25C3%25A1vio-Germano-1427594324119758/","twitter" => "jotaviogermano","instagram" => "","e-mail" => "dep.joseotaviogermano","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/deputadoheinze/","twitter" => "deputadoheinze","instagram" => "","e-mail" => "dep.luiscarlosheinze","formacao" => "Engenheiro Agrônomo e Produtor Rural" ),
        array( "facebook" => "https://www.facebook.com/renatomolling/","twitter" => "renatomolling","instagram" => "https://www.instagram.com/renatomolling/","e-mail" => "dep.renatomolling","formacao" => "Administrador, Assessor Político, Industriário, Professor e Auxiliar de Escritório" ),
        array( "facebook" => "https://www.facebook.com/deputadocarlosgomes/","twitter" => "carlosgomesdep","instagram" => "https://www.instagram.com/raquel.muniz/","e-mail" => "dep.carlosgomes","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/heitorschuchoficial","twitter" => "heitorschuch","instagram" => "","e-mail" => "dep.heitorschuch","formacao" => "Agricultor Familiar" ),
        array( "facebook" => "https://www.facebook.com/jose.stedile4080","twitter" => "josestedile","instagram" => "https://instagram.com/josestedile/","e-mail" => "dep.josestedile","formacao" => "Administrador Público, Metalúrgico" ),
        array( "facebook" => "https://www.facebook.com/Danrlei-Hinterholz-351569478324459/?pnref=story","twitter" => "danrleifederal","instagram" => "https://www.instagram.com/danrlei5501/","e-mail" => "dep.danrleidedeushinterholz","formacao" => "Atleta Profissional de Futebol" ),
        array( "facebook" => "https://www.facebook.com/nelsonmarchezan/","twitter" => "marchezan_","instagram" => "","e-mail" => "dep.nelsonmarchezanjunior","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/luizcarlosbusatoptb","twitter" => "Deputado_Busato","instagram" => "https://instagram.com/lcbusato/","e-mail" => "dep.luizcarlosbusato","formacao" => "Arquiteto, Corretor de Imóveis" ),
        array( "facebook" => "https://www.facebook.com/ronaldonogueirarn/","twitter" => "ronaldornrn","instagram" => "https://www.instagram.com/ronaldonogueira_rn/","e-mail" => "dep.ronaldonogueira","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/depsergiomoraes/","twitter" => "depsergiomoraes","instagram" => "","e-mail" => "dep.sergiomoraes","formacao" => "Comerciante" ),
        array( "facebook" => "https://www.facebook.com/JoaoDerlyOficial","twitter" => "joaoderly","instagram" => "https://www.instagram.com/joaoderly/","e-mail" => "dep.joaoderly","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadomauromariani/","twitter" => "mauro_mariani","instagram" => "","e-mail" => "dep.mauromariani","formacao" => "Diretor de Empresas" ),
        array( "facebook" => "https://www.facebook.com/deputadopeninha/","twitter" => "deputadopeninha","instagram" => "","e-mail" => "dep.rogeriopeninhamendonca","formacao" => "Engenheiro Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/RonaldoBenedet/","twitter" => "ronaldo_benedet","instagram" => "","e-mail" => "dep.ronaldobenedet","formacao" => "Advogado" ),
        array( "facebook" => "https://www.facebook.com/deputadovaldircolatto","twitter" => "colattodeputado","instagram" => "","e-mail" => "dep.valdircolatto","formacao" => "Engenheiro Agrônomo" ),
        array( "facebook" => "https://www.facebook.com/esperidiaoamin/","twitter" => "esperidiaoamin_","instagram" => "","e-mail" => "dep.esperidiaoamin","formacao" => "Administrador, Advogado, Professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/Deputado-Jorge-Boeira-118820584879830/","twitter" => "deputadoboeira","instagram" => "","e-mail" => "dep.jorgeboeira","formacao" => "Engenheiro Mecânico." ),
        array( "facebook" => "https://www.facebook.com/DeputadaCarmenZanotto","twitter" => "carmenzanotto","instagram" => "https://www.instagram.com/dep.zenaidemaia/","e-mail" => "dep.carmenzanotto","formacao" => "Enfermeira" ),
        array( "facebook" => "https://www.facebook.com/jorginhomello.sc/","twitter" => "jorginhomello","instagram" => "","e-mail" => "dep.jorginhomello","formacao" => "Advogado, Bancário" ),
        array( "facebook" => "https://www.facebook.com/JoaoRodriguesprincipal","twitter" => "joaorodriguessc","instagram" => "https://www.instagram.com/joaorodriguessc/","e-mail" => "dep.joaorodrigues","formacao" => "Empresário, Radialista" ),
        array( "facebook" => "https://www.facebook.com/jpkleinubing/?fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.joaopaulokleinubing","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadocesarsouza","twitter" => "","instagram" => "","e-mail" => "dep.cezarsouza","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/geovaniasarodrigues","twitter" => "geovaniadesa","instagram" => "https://www.instagram.com/geovaniasa","e-mail" => "dep.geovaniadesa","formacao" => "Administradora de Empresas" ),
        array( "facebook" => "https://www.facebook.com/matebaldi","twitter" => "mtebaldi","instagram" => "","e-mail" => "dep.marcotebaldi","formacao" => "Engenheiro, Funcionário Público" ),
        array( "facebook" => "https://www.facebook.com/adelsonbarretofilho/?fref=ts","twitter" => "adelson_barreto","instagram" => "","e-mail" => "dep.adelsonbarreto","formacao" => "Jornalista,radialista" ),
        array( "facebook" => "https://www.facebook.com/ValadaresFilho/","twitter" => "valadares_filho","instagram" => "https://www.instagram.com/valadaresfilho","e-mail" => "dep.valadaresfilho","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/OficialAndreMoura/","twitter" => "andremourapsc_","instagram" => "https://www.instagram.com/andremourapsc/","e-mail" => "dep.andremoura","formacao" => "Político" ),
        array( "facebook" => "https://www.facebook.com/deputadolaerciooliveira/","twitter" => "laerciofederal","instagram" => "","e-mail" => "dep.laerciooliveira","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/DeputadoFederalAlexandreLeite/","twitter" => "lexandreleite","instagram" => "","e-mail" => "dep.alexandreleite","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/EliCorreaFilho/","twitter" => "elicorreafilho","instagram" => "https://www.instagram.com/elicorreafilho/","e-mail" => "dep.elicorreafilho","formacao" => "Radialista" ),
        array( "facebook" => "https://www.facebook.com/deputadojorgetadeu/","twitter" => "jtadeumudalen","instagram" => "https://instagram.com/deputadojorgetadeu/","e-mail" => "dep.jorgetadeumudalen","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/deputadojoseolimpio/","twitter" => "","instagram" => "","e-mail" => "dep.missionariojoseolimpio","formacao" => "Comerciante" ),
        array( "facebook" => "https://www.facebook.com/ricardo.garcia.mira?fref=ts","twitter" => "","instagram" => "","e-mail" => "dep.rodrigogarcia","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/BaleiaRossi/","twitter" => "baleia_rossi","instagram" => "https://www.instagram.com/baleiarossi/","e-mail" => "dep.baleiarossi","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadoedinhoaraujo/","twitter" => "_edinhoaraujo","instagram" => "","e-mail" => "dep.edinhoaraujo","formacao" => "Advogado, Professor" ),
        array( "facebook" => "https://www.facebook.com/faustopinato/","twitter" => "faustopinato10","instagram" => "","e-mail" => "dep.faustopinato","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/deputadoguilhermemussi","twitter" => "guilhermemussi","instagram" => "https://www.instagram.com/deputadoguilhermemussi","e-mail" => "dep.guilhermemussi","formacao" => "Administrador de Empresas" ),
        array( "facebook" => "https://www.facebook.com/paulosmaluf","twitter" => "paulosalimmaluf","instagram" => "https://www.instagram.com/paulosalimmaluf/","e-mail" => "dep.paulomaluf","formacao" => "Engenheiro Civil, Industrial" ),
        array( "facebook" => "https://www.facebook.com/ricardoizaroficial/","twitter" => "ricardoizar","instagram" => "https://www.instagram.com/ricardoizar/","e-mail" => "dep.ricardoizar","formacao" => "Economista, Empresário" ),
        array( "facebook" => "https://www.facebook.com/alexmanentesbc/","twitter" => "alexmanentepps","instagram" => "https://www.instagram.com/alexmanente/","e-mail" => "dep.alexmanente","formacao" => "Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/deputadoarnaldojardim/","twitter" => "search?q=Arnaldo%20Jardim&src=tyah","instagram" => "","e-mail" => "dep.arnaldojardim","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/capitaoaugustooficial/","twitter" => "capitao_augusto","instagram" => "https://instagram.com/deputadaluciana/","e-mail" => "dep.capitaoaugusto","formacao" => "Policial Militar" ),
        array( "facebook" => "https://www.facebook.com/deputadofederalmiltonmonti/","twitter" => "","instagram" => "https://www.instagram.com/milton_monti/","e-mail" => "dep.miltonmonti","formacao" => "Economista" ),
        array( "facebook" => "https://www.facebook.com/deputadopaulofreire/","twitter" => "df_paulofreire","instagram" => "","e-mail" => "dep.paulofreire","formacao" => "Ministro do Evangelho" ),
        array( "facebook" => "https://www.facebook.com/antonio.bulhoes.7/","twitter" => "depbulhoes","instagram" => "https://www.instagram.com/antoniobulhoes/","e-mail" => "dep.antoniobulhoes","formacao" => "Apresentador de Televisão, Administrador, Teólogo e Bispo Evangélico" ),
        array( "facebook" => "https://www.facebook.com/betomansur/","twitter" => "betomansur10","instagram" => "https://www.instagram.com/betomansur10","e-mail" => "dep.betomansur","formacao" => "Radialista, Empresário e Engenheiro Eletrônico" ),
        array( "facebook" => "https://www.facebook.com/celsorussomanno","twitter" => "celsorussomanno","instagram" => "https://www.instagram.com/celsorussomanno/","e-mail" => "dep.celsorussomanno","formacao" => "Apresentador de Televisão, Repórter e Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/marcelo.squassoni","twitter" => "","instagram" => "","e-mail" => "dep.marcelosquassoni","formacao" => "Bacharel Em Direito" ),
        array( "facebook" => "https://www.facebook.com/RobertoAlvesPRB","twitter" => "RobertoAlvesPRB","instagram" => "","e-mail" => "dep.robertoalves","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadosergioreis/","twitter" => "sergioreis","instagram" => "","e-mail" => "dep.sergioreis","formacao" => "Cantor" ),
        array( "facebook" => "https://www.facebook.com/viniciuscarvalhooficial/","twitter" => "viniciusfederal","instagram" => "https://instagram.com/viniciuscarvalhoprb/","e-mail" => "dep.viniciuscarvalho","formacao" => "Administrador de Empresas, Advogado, Radialista, Jornalista" ),
        array( "facebook" => "https://www.facebook.com/Flavinhocn/","twitter" => "flavinhocn","instagram" => "https://www.instagram.com/flavinhocn","e-mail" => "dep.flavinho","formacao" => "Apresentador de Televisão,cantor,compositor,empresário,escritor,locutor" ),
        array( "facebook" => "https://www.facebook.com/keikootadeputada","twitter" => "keikoota_","instagram" => "","e-mail" => "dep.keikoota","formacao" => "Empresária, Escritor" ),
        array( "facebook" => "https://www.facebook.com/luizlauro.filho/","twitter" => "luizlaurofilho","instagram" => "https://www.instagram.com/luizlaurofilho/","e-mail" => "dep.luizlaurofilho","formacao" => "Publicitário" ),
        array( "facebook" => "https://www.facebook.com/bolsonaro.enb/","twitter" => "bolsonarosp","instagram" => "https://www.instagram.com/bolsonarosp/","e-mail" => "dep.eduardobolsonaro","formacao" => "Policial Federal" ),
        array( "facebook" => "https://www.facebook.com/gilbertonascimento.psc20/","twitter" => "comunicagr","instagram" => "https://www.instagram.com/gnascimento_20/","e-mail" => "dep.gilbertonascimento","formacao" => "Advogado e Delegado de Polícia" ),
        array( "facebook" => "https://www.facebook.com/PastorMarcoFeliciano","twitter" => "marcofeliciano","instagram" => "https://www.instagram.com/marcofeliciano/","e-mail" => "dep.pr.marcofeliciano","formacao" => "Conferencista, Empresário, Pastor Evangélico" ),
        array( "facebook" => "https://www.facebook.com/goulartoficial","twitter" => "","instagram" => "https://www.instagram.com/goulart_oficial/","e-mail" => "dep.goulart","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/HerculanoPassosJr","twitter" => "herculanopassos","instagram" => "","e-mail" => "dep.herculanopassos","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/PrJeffersonCampos/","twitter" => "depjefferson","instagram" => "https://instagram.com/depjefferson/","e-mail" => "dep.jeffersoncampos","formacao" => "Ministro do Evangelho, Advogado, Tecnologo, Radialista, Bacharel Em Teologia" ),
        array( "facebook" => "https://www.facebook.com/BrunaFurlanDeputadaFederal/","twitter" => "depbrunafurlan","instagram" => "https://www.instagram.com/depbrunafurlan/","e-mail" => "dep.brunafurlan","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/BrunoCovasOficial/","twitter" => "brunocovas","instagram" => "https://www.instagram.com/brunocovas/","e-mail" => "dep.brunocovas","formacao" => "Advogado(a),economista" ),
        array( "facebook" => "https://www.facebook.com/DeputadoCarlosSampaio/","twitter" => "carlossampaio_","instagram" => "https://www.instagram.com/deputadotadeualencar/","e-mail" => "dep.carlossampaio","formacao" => "Promotor de Justiça." ),
        array( "facebook" => "https://www.facebook.com/nogueiraduarte/?fref=ts","twitter" => "duarte_nogueira","instagram" => "","e-mail" => "dep.duartenogueira","formacao" => "Contador e Bancário" ),
        array( "facebook" => "https://www.facebook.com/EduardoCuryOficial/","twitter" => "eduardo_cury","instagram" => "https://www.instagram.com/eduardocuryoficial/","e-mail" => "dep.eduardocury","formacao" => "Engenheiro Mecânico" ),
        array( "facebook" => "https://www.facebook.com/joaopaulopapaoficial/","twitter" => "CesarMessias_Ac","instagram" => "https://www.instagram.com/joaopaulopapaoficial/","e-mail" => "dep.joaopaulopapa","formacao" => "Engenheiro,professor(a)" ),
        array( "facebook" => "https://www.facebook.com/maragabrilli/","twitter" => "maragabrilli","instagram" => "https://www.instagram.com/maragabrilli/","e-mail" => "dep.maragabrilli","formacao" => "Psicóloga, Publicitária" ),
        array( "facebook" => "https://www.facebook.com/miguelmhaddad/","twitter" => "miguelmhaddad","instagram" => "","e-mail" => "dep.miguelhaddad","formacao" => "Advogado(a)" ),
        array( "facebook" => "https://www.facebook.com/ricardotripoli","twitter" => "ricardotripoli","instagram" => "https://www.instagram.com/tripolioficial/","e-mail" => "dep.ricardotripoli","formacao" => "Advogado." ),
        array( "facebook" => "https://www.facebook.com/DeputadoFederalSamuelMoreira","twitter" => "samuelmoreira","instagram" => "https://www.instagram.com/depsamuelmoreira/","e-mail" => "dep.samuelmoreira","formacao" => "Engenheiro Civil" ),
        array( "facebook" => "https://www.facebook.com/SilvioTorresPSDB/","twitter" => "_silviotorres_","instagram" => "https://www.instagram.com/silviotorres_/","e-mail" => "dep.silviotorres","formacao" => "Jornalista e Empresário" ),
        array( "facebook" => "https://www.facebook.com/deputadomacris","twitter" => "vanderleimacris","instagram" => "https://www.instagram.com/vanderleimacris/","e-mail" => "dep.vanderleimacris","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/vitorlippi/","twitter" => "depvitorlippi","instagram" => "","e-mail" => "dep.vitorlippi","formacao" => "Médico(a)" ),
        array( "facebook" => "https://www.facebook.com/florianopesaro45/posts/1007623522663546:0","twitter" => "Floriano45","instagram" => "http://linkis.com/www.instagram.com/p/22yWC","e-mail" => "dep.florianopesaro","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/DeputadoSamuelMoreira/?fref=ts","twitter" => "samuelmoreira","instagram" => "","e-mail" => "dep.samuelmoreira","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadoarnaldofariadesa/","twitter" => "dep_arnaldo1452","instagram" => "","e-mail" => "dep.arnaldofariadesa","formacao" => "Contabilista, Radialista, Professor e Advogado" ),
        array( "facebook" => "https://www.facebook.com/marquezelli1434","twitter" => "marquezellinews","instagram" => "https://www.instagram.com/marquezelli1434/","e-mail" => "dep.nelsonmarquezelli","formacao" => "Empresário" ),
        array( "facebook" => "https://www.facebook.com/drsinvalmalheiros4311","twitter" => "sinvalmalheiros","instagram" => "https://www.instagram.com/drsinval/","e-mail" => "dep.dr.sinvalmalheiros","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/renataabreu1919/","twitter" => "","instagram" => "https://www.instagram.com/renataabreuoficial/","e-mail" => "dep.renataabreu","formacao" => "Advogada" ),
        array( "facebook" => "https://www.facebook.com/evandro.gussi/","twitter" => "evandrogussi","instagram" => "","e-mail" => "dep.evandrogussi","formacao" => "Advogado(a),professor Universitário" ),
        array( "facebook" => "https://www.facebook.com/olimpio.major/","twitter" => "majorolimpio","instagram" => "https://www.instagram.com/majorolimpio/","e-mail" => "dep.majorolimpio","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/paulinho.face","twitter" => "dep_paulinho","instagram" => "https://www.instagram.com/dep_paulinho/","e-mail" => "dep.paulopereiradasilva","formacao" => "Sindicalista, Controlador de Qualidade, Metalúrgico" ),
        array( "facebook" => "https://www.facebook.com/profdorinha","twitter" => "profdorinha","instagram" => "https://instagram.com/profdorinha/","e-mail" => "dep.professoradorinhaseabrarezende","formacao" => "Professora Universitária" ),
        array( "facebook" => "https://www.facebook.com/dulcepaganimiranda","twitter" => "dulcemiranda_to","instagram" => "","e-mail" => "dep.dulcemiranda","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/josinunesto/","twitter" => "josinunesto","instagram" => "https://instagram.com/josinunesto/","e-mail" => "dep.josinunes","formacao" => "Professora Universitária,psicóloga" ),
        array( "facebook" => "https://www.facebook.com/cesarhalum/","twitter" => "cesarhalum","instagram" => "https://www.instagram.com/cesarhalum/","e-mail" => "dep.cesarhalum","formacao" => "Médico Veterinário" ),
        array( "facebook" => "https://www.facebook.com/carlos.gaguim/","twitter" => "carlos_prb","instagram" => "https://www.instagram.com/renataabreuoficial/","e-mail" => "dep.carloshenriquegaguim","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/dep.jessicasales","twitter" => "","instagram" => "","e-mail" => "dep.jessicasales","formacao" => "" ),
        array( "facebook" => "","twitter" => "","instagram" => "","e-mail" => "dep.anibalgomes","formacao" => "Cirurgião-dentista e Agropecuarista" ),
        array( "facebook" => "https://www.facebook.com/luis.tibeii/","twitter" => "luistibe","instagram" => "https://www.instagram.com/luistibe/","e-mail" => "dep.luistibe","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/deputadocarlosbezerra","twitter" => "","instagram" => "","e-mail" => "dep.carlosbezerra","formacao" => "Industrial, Advogado e Professor" ),
        array( "facebook" => "https://www.facebook.com/joaofernandocoutinho/","twitter" => "joaofernandope","instagram" => "","e-mail" => "dep.joaofernandocoutinho","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/washingtonreisoficial/","twitter" => "wreis_oficial","instagram" => "","e-mail" => "dep.washingtonreis","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/wsbeserra/","twitter" => "","instagram" => "","e-mail" => "dep.wilsonbeserra","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/ClarissaGarotinhoRJ/","twitter" => "dep_clarissa","instagram" => "https://www.instagram.com/clarissagarotinho/","e-mail" => "dep.clarissagarotinho","formacao" => "" ),
        array( "facebook" => "https://www.facebook.com/marcioalvino/","twitter" => "","instagram" => "","e-mail" => "dep.marcioalvino","formacao" => "Administrador" ),
        array( "facebook" => "https://www.facebook.com/miguellombardi.deputadofederal/","twitter" => "","instagram" => "","e-mail" => "dep.miguellombardi","formacao" => "Corretor de Imóveis" ),
        array( "facebook" => "https://www.facebook.com/tiriricaPR","twitter" => "tiriricanaweb","instagram" => "https://www.instagram.com/tiriricanaweb/","e-mail" => "dep.tiririca","formacao" => "Ator" ),
        array( "facebook" => "https://www.facebook.com/dep.lazaro/","twitter" => "lazarobotelho","instagram" => "","e-mail" => "dep.lazarobotelho","formacao" => "Empresário, Pecuarista" ),
      );

      foreach ($aux as $deputado) {
        $args = array(
          'post_type' => 'public_agent',
          'post_status' => 'publish',
           'meta_query' => array(
               array(
                   'key' => 'public_agent_email',
                   'value' => $deputado['e-mail'],
                   'compare' => 'LIKE',
               )
           )
        );
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '"' . get_the_title() . '", "' . $deputado['facebook'] . '", "'  .  $deputado['twitter'] . '"<br>';
            update_post_meta(get_the_ID(), 'public_agent_facebook', $deputado['facebook']);
            update_post_meta(get_the_ID(), 'public_agent_twitter', $deputado['twitter']);

          }
          /* Restore original Post Data */
          wp_reset_postdata();
        } else {
          // no posts found
        }
      }
    }
  }
}

function makepressure_adicionar_redes_senadores(){
  ?>
  <h1><?php _e( 'Adicionar Redes', 'makepressure'); ?></h1>
  <?php
  echo '<form method="post">';
  submit_button(__("Adicionar Redes", "makepressure" ));
  echo '</form>';

  if($_POST)
    if ($_POST['submit'] == "Adicionar Redes") {
      set_time_limit(0);
      $aux = array(
                  array(
                      "facebook" => "https://www.facebook.com/magnomalta", 
                      "telefone" => "(61) 3303-4161 / 5867", 
                      "email" => "magno.malta@senador.leg.br", 
                      "twitter" => "MagnoMaltaOfc"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/marcelocrivella", 
                      "telefone" => "(61) 3303-5730 / 5225", 
                      "email" => "marcelo.crivella@senador.leg.br", 
                      "twitter" => "MCrivella"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/marta.suplic", 
                      "telefone" => "(61) 3303-6510 / 6514", 
                      "email" => "marta.suplicy@senadora.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/OmarAzizPSD", 
                      "telefone" => "(61) 3303-6579", 
                      "email" => "omar.aziz@senador.leg.br", 
                      "twitter" => "OmarAzizPSD"
                  ), 
                  array(
                      "facebook" => "", 
                      "telefone" => "(61) 3303-1464 / 1467", 
                      "email" => "otto.alencar@senador.leg.br", 
                      "twitter" => "ottoalencar"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/paulobauer", 
                      "telefone" => "(61) 3303-6529 / 6530", 
                      "email" => "paulo.bauer@senador.leg.br", 
                      "twitter" => "paulobauer45"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/paulopaim", 
                      "telefone" => "(61) 3303-5232 / 5231 / 5230", 
                      "email" => "paulopaim@senador.leg.br", 
                      "twitter" => "paulopaim"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/profile.php?id=100009496378193&amp;fref=ts", 
                      "telefone" => "(61) 3303-3800", 
                      "email" => "paulo.rocha@senador.leg.br", 
                      "twitter" => "Sen_PauloRocha"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/SenadorRaimundoLira", 
                      "telefone" => "(61) 3303-6747 / 6754", 
                      "email" => "raimundo.lira@senador.leg.br", 
                      "twitter" => "RaimundoLiraPB"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/randolferodrigues", 
                      "telefone" => "(61) 3303-6568 / 6567 / 6574", 
                      "email" => "randolfe.rodrigues@senador.leg.br", 
                      "twitter" => "randolfeap"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/regina.sousa.37", 
                      "telefone" => "(61) 3303-9049", 
                      "email" => "reginasousa@senadora.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/reguffeoficial", 
                      "telefone" => "(61) 3303-6355", 
                      "email" => "reguffe@senador.leg.br", 
                      "twitter" => "Reguffe"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/renancalheirosoficial", 
                      "telefone" => "(61) 3303-2261", 
                      "email" => "renan.calheiros@senador.leg.br", 
                      "twitter" => "renancalheiros"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/RicardoFerraco/",
                      "telefone" => "(61) 3303-6590 / 6593", 
                      "email" => "ricardo.ferraco@senador.leg.br", 
                      "twitter" => "RicardoFerraco"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/Senador-Ricardo-Franco-1630724127180145",
                      "telefone" => "(61) 3303-1306 / 4055", 
                      "email" => "ricardo.franco@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/robertorequiao", 
                      "telefone" => "(61) 3303-6623 / 6624 / 6621 / 6625", 
                      "email" => "roberto.requiao@senador.leg.br", 
                      "twitter" => "requiaopmdb"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/robertorocha400", 
                      "telefone" => "(61) 3303-1437 / 1506", 
                      "email" => "robertorocha@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/romariodesouzafaria", 
                      "telefone" => "(61) 3303-6519 / 6517", 
                      "email" => "romario@senador.leg.br", 
                      "twitter" => "RomarioOnze"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senromerojuca", 
                      "telefone" => "(61) 3303-2115 / 2111 / 2119", 
                      "email" => "romero.juca@senador.leg.br", 
                      "twitter" => "romerojuca"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/ronaldocaiado25", 
                      "telefone" => "(61) 3303-6439 / 6440 / 6445", 
                      "email" => "ronaldo.caiado@senador.leg.br", 
                      "twitter" => "SenadorCaiado"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadorarosedefreitas", 
                      "telefone" => "(61) 3303-1156", 
                      "email" => "rose.freitas@senadora.leg.br", 
                      "twitter" => "senadorarose"
                  ), 
                  array(
                      "facebook" => "", 
                      "telefone" => "(61) 3303-6230 / 6227", 
                      "email" => "sandrabraga@senadora.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/sergiopetecao", 
                      "telefone" => "(61) 3303-6708 / 6709", 
                      "email" => "sergio.petecao@senador.leg.br", 
                      "twitter" => "senadorpetecao"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/simonetebet", 
                      "telefone" => "(61) 3303-1128", 
                      "email" => "simone.tebet@senadora.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/tassocomvoce", 
                      "telefone" => "(61) 3303-4502 / 4503", 
                      "email" => "tasso.jereissati@senador.leg.br", 
                      "twitter" => "tassocomvoce"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/telmariomotarr", 
                      "telefone" => "(61) 3303-6315", 
                      "email" => "telmariomota@senador.leg.br", 
                      "twitter" => "TelmarioMotaRR"
                  ), 
                  array(
                      "facebook" => "", 
                      "telefone" => "(61) 3303-2252 / 2253", 
                      "email" => "valdir.raupp@senador.leg.br", 
                      "twitter" => "SENADORRAUPP"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/VanessaGrazziotin", 
                      "telefone" => "(61) 3303-6726 / 6733", 
                      "email" => "vanessa.grazziotin@senadora.leg.br", 
                      "twitter" => "SouVanessa65"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/vicentinhoalves", 
                      "telefone" => "(61) 3303-6469 / 6467", 
                      "email" => "vicentinho.alves@senador.leg.br", 
                      "twitter" => "SenVicentinho"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/SenadorWaldemirMOKA", 
                      "telefone" => "(61) 3303-6767 / 6768", 
                      "email" => "waldemir.moka@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "", 
                      "telefone" => "(61) 3303-6788 / 6790", 
                      "email" => "pinheiro@senador.leg.br", 
                      "twitter" => "pinheirosenador"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/wellington.fagundes.mt", 
                      "telefone" => "(61) 3303-6219 / 6213 / 6221", 
                      "email" => "wellington.fagundes@senador.leg.br", 
                      "twitter" => "sen_wellington"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/wildermorais", 
                      "telefone" => "(61) 3303-2092 / 2093 / 1809 / 2099 / 2964", 
                      "email" => "wilder.morais@senador.leg.br", 
                      "twitter" => "wildermorais"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/zezeperrella", 
                      "telefone" => "(61) 3303-2191 / 2192", 
                      "email" => "zeze.perrella@senador.leg.br", 
                      "twitter" => "zezeperrella"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/AcirGurgacz", 
                      "telefone" => "(61) 3303-3132 / 3131", 
                      "email" => "acir@senador.leg.br", 
                      "twitter" => "acirgurgacz"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/AecioNevesOficial", 
                      "telefone" => "(61) 3303-6049 / 6050", 
                      "email" => "aecio.neves@senador.leg.br", 
                      "twitter" => "AecioNeves"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/aloysionunes/", 
                      "telefone" => "(61) 3303-6063 / 6064", 
                      "email" => "aloysionunes.ferreira@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/ad.alvarodias", 
                      "telefone" => "(61) 3303-4059 / 4060", 
                      "email" => "alvarodias@senador.leg.br", 
                      "twitter" => "alvarodias_"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/anaamelia.lemo", 
                      "telefone" => "(61) 3303-6083", 
                      "email" => "ana.amelia@senadora.leg.br", 
                      "twitter" => "anaamelialemos"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/angelaportela13", 
                      "telefone" => "(61) 3303-6103 / 6104 / 6105", 
                      "email" => "angela.portela@senadora.leg.br", 
                      "twitter" => "AngelaPortelaRR"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/AntonioAnastasiaOficial", 
                      "telefone" => "(61) 3303-5717", 
                      "email" => "antonio.anastasia@senador.leg.br", 
                      "twitter" => "Anastasia"
                  ), 
                  array(
                      "facebook" => "", 
                      "telefone" => "(61) 3303-2201 / 2203 / 2204 / 1786", 
                      "email" => "antoniocarlosvaladares@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/SenadorAtaidesOliveira", 
                      "telefone" => "(61) 3303-2163 / 2164 / 2165", 
                      "email" => "ataides.oliveira@senador.leg.br", 
                      "twitter" => "Senador_Ataides"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/BeneditodeLira", 
                      "telefone" => "(61) 3303-6148 / 6149 / 6151", 
                      "email" => "benedito.lira@senador.leg.br", 
                      "twitter" => "BiudeLira"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadorblairomaggi", 
                      "telefone" => "(61) 3303-6167 / 6161 / 6168", 
                      "email" => "blairomaggi@senador.leg.br", 
                      "twitter" => "blairomaggi"

                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/cassiocunhalima", 
                      "telefone" => "(61) 3303-9808 / 9809 / 9810", 
                      "email" => "cassio.cunha.lima@senador.leg.br", 
                      "twitter" => "cassiocl"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/cironogueira", 
                      "telefone" => "(61) 3303-6187 / 6189", 
                      "email" => "ciro.nogueira@senador.leg.br", 
                      "twitter" => "ciro_nogueira"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/Cristovam.Buarque", 
                      "telefone" => "(61) 3303-2281", 
                      "email" => "cristovam.buarque@senador.leg.br", 
                      "twitter" => "Sen_Cristovam"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadordaliriobeber", 
                      "telefone" => "(61) 3303-6446 / 6447", 
                      "email" => "dalirio.beber@senador.leg.br", 
                      "twitter" => "daliriobeber"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/DarioEliasBerger", 
                      "telefone" => "(61) 3303-5947 / 5951", 
                      "email" => "dario.berger@senador.leg.br", 
                      "twitter" => "darioberger"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/davialcolumbre2", 
                      "telefone" => "(61) 3303-6717 / 6720 / 6722", 
                      "email" => "davi.alcolumbre@senador.leg.br", 
                      "twitter" => "davialcolumbre"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/Delcidio.Amaral", 
                      "telefone" => "(61) 3303-2453 / 2454 / 2455 / 2456 / 2457", 
                      "email" => "delcidio.amaral@senador.leg.br", 
                      "twitter" => "delcidiox9"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/donizetidopt", 
                      "telefone" => "(61) 3303-2464 / 2708 / 5771 / 2466", 
                      "email" => "donizeti.nogueira@senador.leg.br", 
                      "twitter" => "DonizetiPT"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/profile.php?id=100006192737710&amp;fref=ts", 
                      "telefone" => "(61) 3303-6130 / 6127", 
                      "email" => "douglas.cintra@senador.leg.br", 
                      "twitter" => "DouglasCintra14"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadoredisonlobao1", 
                      "telefone" => "(61) 3303-2311 / 2312 / 1989", 
                      "email" => "edison.lobao@senador.leg.br", 
                      "twitter" => "senadorlobao"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/eduardoamorim20", 
                      "telefone" => "(61) 3303-6205 / 6206 / 6207 / 6208 / 6209 / 6210 / 6211", 
                      "email" => "eduardo.amorim@senador.leg.br", 
                      "twitter" => "eduardoamorimse"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/elmanoferreroficial",
                      "telefone" => "(61) 3303-2415 / 3055 / 1015", 
                      "email" => "elmano.ferrer@senador.leg.br", 
                      "twitter" => "elmanoferrer"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/Eun%C3%ADcio-Oliveira-147474322001734",
                      "telefone" => "(61) 3303-6245 / 6246", 
                      "email" => "eunicio.oliveira@senador.leg.br", 
                      "twitter" => "Eunicio"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/FatimaBezerra13", 
                      "telefone" => "(61) 3303-1777 / 1682 / 1602", 
                      "email" => "fatima.bezerra@senadora.leg.br", 
                      "twitter" => "Fatima_Bezerra"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/fernando.bezerracoelho", 
                      "telefone" => "(61) 3303-2182", 
                      "email" => "fernandobezerracoelho@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/colloralagoas", 
                      "telefone" => "(61) 3303-5783", 
                      "email" => "fernando.collor@senador.leg.br", 
                      "twitter" => "Collor"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadorflexaribeiro", 
                      "telefone" => "(61) 3303-2342", 
                      "email" => "flexa.ribeiro@senador.leg.br", 
                      "twitter" => "senadorflexa"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/OficialFilho/", 
                      "telefone" => "(61) 3303-2371 / 2372", 
                      "email" => "garibaldi.alves@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/GladsonCameli", 
                      "telefone" => "(61) 3303-1357 / 1367", 
                      "email" => "gladson.cameli@senador.leg.br", 
                      "twitter" => "senadorCameli"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/gleisi.hoffmann", 
                      "telefone" => "(61) 3303-6265", 
                      "email" => "gleisi@senadora.leg.br", 
                      "twitter" => "gleisi"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/profile.php?id=100008684373153&amp;fref=ts", 
                      "telefone" => "(61) 3303-6640 / 6645 / 6646", 
                      "email" => "heliojose@senador.leg.br", 
                      "twitter" => "senador_helio"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/humbertocostapt", 
                      "telefone" => "(61) 3303-6285 / 6286", 
                      "email" => "humberto.costa@senador.leg.br", 
                      "twitter" => "humbertocostapt"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/ivo.cassol.9", 
                      "telefone" => "(61) 3303-6328 / 6329", 
                      "email" => "ivo.cassol@senador.leg.br", 
                      "twitter" => "senadorcassol"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/JaderpeloPara", 
                      "telefone" => "(61) 3303-9826 / 9831 / 9827 / 9832", 
                      "email" => "jader.barbalho@senador.leg.br", 
                      "twitter" => "jader_barbalho"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/joaoalbertosenado", 
                      "telefone" => "(61) 3303-6349 / 6352", 
                      "email" => "joao.alberto.souza@senador.leg.br", 
                      "twitter" => ""
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadorcap", 
                      "telefone" => "(61) 3303-9011 / 9013", 
                      "email" => "joao.capiberibe@senador.leg.br", 
                      "twitter" => "joaocapi"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadorjorgeviana", 
                      "telefone" => "(61) 3303-6366 / 6369", 
                      "email" => "jorge.viana@senador.leg.br", 
                      "twitter" => "JorgeVianaAcre"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/joseagripinomaia", 
                      "telefone" => "(61) 3303-2366 / 2361 / 2362", 
                      "email" => "jose.agripino@senador.leg.br", 
                      "twitter" => "joseagripino"
                  ), 
                  array(
                      "facebook" => "", 
                      "telefone" => "(61) 3303-6490 / 6485", 
                      "email" => "jose.maranhao@senador.leg.br", 
                      "twitter" => "josemaranhaopb"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/senadorjosemedeiros", 
                      "telefone" => "(61) 3303-1146 / 1148", 
                      "email" => "josemedeiros@senador.leg.br", 
                      "twitter" => "JoseMedeirosMT"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/JosePimentelPT", 
                      "telefone" => "(61) 3303-6390 / 6391", 
                      "email" => "jose.pimentel@senador.leg.br", 
                      "twitter" => "jose_pimentel"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/JoseSerraOficial", 
                      "telefone" => "(61) 3303-6651 / 6655", 
                      "email" => "jose.serra@senador.leg.br", 
                      "twitter" => "joseserra_"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/LasierMartinsOficial", 
                      "telefone" => "(61) 3303-2323", 
                      "email" => "lasier.martins@senador.leg.br", 
                      "twitter" => "lasierm"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/LidicedaMata/?ref=ts&amp;fref=ts", 
                      "telefone" => "(61) 3303-6408 / 6410", 
                      "email" => "lidice.mata@senadora.leg.br", 
                      "twitter" => "lidicedamata"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/lindbergh.farias", 
                      "telefone" => "(61) 3303-6426 / 6427", 
                      "email" => "lindbergh.farias@senador.leg.br", 
                      "twitter" => "LindbergFarias"
                  ), 
                  array(
                      "facebook" => "https://www.facebook.com/Senadora-L%C3%BAcia-V%C3%A2nia-127980693947760",
                      "telefone" => "(61) 3303-2844 / 2035", 
                      "email" => "lucia.vania@senadora.leg.br", 
                      "twitter" => "Lucia_Vania"
                  )
                );

      foreach ($aux as $senador) {
        $args = array(
          'post_type' => 'public_agent',
          'post_status' => 'publish',
           'meta_query' => array(
               array(
                   'key' => 'public_agent_email',
                   'value' => $senador['email'],
                   'compare' => 'LIKE',
               )
           )
        );
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '"' . get_the_title() . '", "' . $senador['facebook'] . '", "'  .  $senador['twitter'] . '", "' . $senador['telefone'] . '"<br>';
            update_post_meta(get_the_ID(), 'public_agent_facebook', $senador['facebook']);
            update_post_meta(get_the_ID(), 'public_agent_twitter', $senador['twitter']);
            update_post_meta(get_the_ID(), 'public_agent_phone', $senador['telefone']);

          }
          /* Restore original Post Data */
          wp_reset_postdata();
        } else {
          // no posts found
        }
      }
    }
}

function makepressure_adicionar_comissoes(){
    echo '<form method="post">';
  submit_button(__("Adicionar Comissões", "makepressure" ));
  echo '</form>';

  if($_POST)
    if ($_POST['submit'] == "Adicionar Comissões") {
      set_time_limit(0);
      $mei_commision = array(
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PDT","Titular","ASSIS DO COUTO","PDT","PR","03/05/2016",428,4,"3215-5428","3215-2428","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PDT","Titular","DAGOBERTO","PDT","MS","03/05/2016",654,4,"3215-5654","3215-2654","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PDT","Suplente","AFONSO MOTTA","PDT","RS","03/05/2016",711,4,"3215-5711","3215-2711","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PDT","Suplente","GIOVANI CHERINI","PR","RS","03/05/2016",468,3,"3215-5468",32152468,"Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALBERTO FRAGA","DEM","DF","03/05/2016",511,4,"3215-5511","3215-2511","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS HENRIQUE GAGUIM","PTN","TO","06/07/2016",222,4,"3215-5222","3215-2222","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CELSO MALDANER","PMDB","SC","03/05/2016",311,4,"3215-5311","3215-2311","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DILCEU SPERAFICO","PP","PR","03/05/2016",746,4,"3215-5746","3215-2746","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EVANDRO ROMAN","PSD","PR","03/05/2016",303,4,"3215-5303","3215-2303","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JERÔNIMO GOERGEN","PP","RS","03/05/2016",316,4,"3215-5316","3215-2316","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JONY MARCOS","PRB","SE","03/05/2016",807,4,"3215-5807","3215-2807","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOSUÉ BENGTSON","PTB","PA","03/05/2016",505,4,"3215-5505","3215-2505","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LÁZARO BOTELHO","PP","TO","03/05/2016",478,3,"3215-5478","3215-2478","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIS CARLOS HEINZE","PP","RS","03/05/2016",526,4,"3215-5526","3215-2526","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCELO ARO","PHS","MG","03/05/2016",280,3,"3215-5280","3215-2280","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NELSON MEURER","PP","PR","03/05/2016",916,4,"3215-5916","3215-2916","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ODELMO LEÃO","PP","MG","03/05/2016",419,4,"3215-5419","3215-2419","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ONYX LORENZONI","DEM","RS","03/05/2016",828,4,"3215-5828","3215-2828","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PEDRO CHAVES","PMDB","GO","03/05/2016",406,4,"3215-5406","3215-2406","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROBERTO BALESTRA","PP","GO","03/05/2016",219,4,"3215-5219","3215-2219","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROGÉRIO PENINHA MENDONÇA","PMDB","SC","03/05/2016",656,4,"3215-5656","3215-2656","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SERGIO SOUZA","PMDB","PR","03/05/2016",702,4,"3215-5702","3215-2702","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VALDIR COLATTO","PMDB","SC","19/05/2016",516,4,"3215-5516","3215-2516","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","WALTER ALVES","PMDB","RN","03/05/2016",435,4,"3215-5435","3215-2435","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ZÉ SILVA","SD","MG","02/05/2016",608,4,"3215-5608","3215-2608","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ZECA DO PT","PT","MS","03/05/2016",860,4,"3215-5860","3215-2860","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALCEU MOREIRA","PMDB","RS","03/05/2016",238,4,"3215-5238","3215-2238","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALEXANDRE BALDY","PTN","GO","03/05/2016",441,4,"3215-5441","3215-2441","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BETO ROSADO","PP","RN","03/05/2016",840,4,"3215-5840","3215-2840","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BOSCO COSTA","PROS","SE","02/08/2016",660,4,"3215-5660","3215-2660","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS BEZERRA","PMDB","MT","03/05/2016",815,4,"3215-5815","3215-2815","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS MELLES","DEM","MG","03/05/2016",243,4,"3215-5243","3215-2243","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CÉSAR HALUM","PRB","TO","11/05/2016",422,4,"3215-5422","3215-2422","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DANIEL VILELA","PMDB","GO","03/05/2016",471,3,"3215-5471","3215-2471","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","GIVALDO CARIMBÃO","PHS","AL","03/05/2016",732,4,"3215-5732","3215-2732","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HÉLIO LEITE","DEM","PA","03/05/2016",403,4,"3215-5403","3215-2403","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JORGE BOEIRA","PP","SC","03/05/2016",342,4,"3215-5342","3215-2342","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MÁRIO HERINGER","PDT","MG","03/05/2016",211,4,"3215-5211","3215-2211","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NELSON MARQUEZELLI","PTB","SP","03/05/2016",920,4,"3215-5920","3215-2920","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NEWTON CARDOSO JR","PMDB","MG","03/05/2016",932,4,"3215-5932","3215-2932","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NILTON CAPIXABA","PTB","RO","03/05/2016",724,4,"3215-5724","3215-2724","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PROFESSOR VICTÓRIO GALLI","PSC","MT","03/05/2016",'','','','',"Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PROFESSORA DORINHA SEABRA REZENDE","DEM","TO","04/05/2016",432,4,"3215-5432","3215-2432","Exma. Senhora Deputada"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RENZO BRAZ","PP","MG","03/05/2016",736,4,"3215-5736","3215-2736","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SÉRGIO REIS","PRB","SP","03/05/2016",213,4,"3215-5213","3215-2213","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WILSON FILHO","PTB","PB","03/05/2016",534,4,"3215-5534","3215-2534","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","ADILTON SACHETTI","PSB","MT","03/05/2016",374,3,"3215-5374","3215-2374","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","ANDRÉ ABDON","PP","AP","02/05/2016",831,4,"3215-5831","3215-2831","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","DOMINGOS SÁVIO","PSDB","MG","03/05/2016",345,4,"3215-5345","3215-2345","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","EVAIR VIEIRA DE MELO","PV","ES","03/05/2016",443,4,"3215-5443","3215-2443","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","HEITOR SCHUCH","PSB","RS","03/05/2016",277,3,"3215-5277","3215-2277","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","NELSON PADOVANI","PSDB","PR","03/05/2016",513,4,"3215-5513","3215-2513","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","NILSON LEITÃO","PSDB","MT","03/05/2016",825,4,"3215-5825","3215-2825","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","RAIMUNDO GOMES DE MATOS","PSDB","CE","03/05/2016",725,4,"3215-5725","3215-2725","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Titular","TEREZA CRISTINA","PSB","MS","03/05/2016",448,4,"3215-5448","3215-2448","Exma. Senhora Deputada"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","CÉLIO SILVEIRA","PSDB","GO","06/06/2016",565,3,"3215-5565","3215-2565","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","DAVI ALVES SILVA JÚNIOR","PR","MA","06/06/2016",202,4,"3215-5202","3215-2202","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","DUARTE NOGUEIRA","PSDB","SP","03/05/2016",921,4,"3215-5921","3215-2921","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","LUCIANO DUCCI","PSB","PR","03/05/2016",427,4,"3215-5427","3215-2427","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","ROCHA","PSDB","AC","03/05/2016",607,4,"3215-5607","3215-2607","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","SHÉRIDAN","PSDB","RR","03/05/2016",246,4,"3215-5246","3215-2246","Exma. Senhora Deputada"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSDB/PSB/PPS/PV","Suplente","ULDURICO JUNIOR","PV","BA","03/05/2016",729,4,"3215-5729","3215-2729","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PSOL","Titular","CÉSAR MESSIAS","PSB","AC","03/05/2016",956,4,"3215-5956","3215-2956","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","AFONSO HAMM","PP","RS","03/05/2016",604,4,"3215-5604","3215-2604","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","BETO FARO","PT","PA","03/05/2016",723,4,"3215-5723","3215-2723","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","BOHN GASS","PT","RS","03/05/2016",469,3,"3215-5469","3215-2469","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","EXPEDITO NETTO","PSD","RO","03/05/2016",943,4,"3215-5943","3215-2943","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","FRANCISCO CHAPADINHA","PTN","PA","02/05/2016",385,3,"3215-5385","3215-2385","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","IRAJÁ ABREU","PSD","TO","03/05/2016",802,4,"3215-5802","3215-2802","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","JOÃO DANIEL","PT","SE","03/05/2016",605,4,"3215-5605","3215-2605","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","JOÃO RODRIGUES","PSD","SC","03/05/2016",503,4,"3215-5503","3215-2503","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","LUIZ CLÁUDIO","PR","RO","02/05/2016",643,4,"3215-5643","3215-2643","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","LUIZ NISHIMORI","PR","PR","02/05/2016",907,4,"3215-5907","3215-2907","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","MAGDA MOFATTO","PR","GO","02/05/2016",934,4,"3215-5934","3215-2934","Exma. Senhora Deputada"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","MARCON","PT","RS","03/05/2016",569,3,"3215-5569","3215-2569","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","TAMPINHA","PSD","MT","12/09/2016",539,4,"3215-5539","3215-2539","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","VALMIR ASSUNÇÃO","PT","BA","03/05/2016",739,4,"3215-5739","3215-2739","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Titular","ZÉ CARLOS","PT","MA","03/05/2016",748,4,"3215-5748","3215-2748","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","CAJAR NARDES","PR","RS","19/05/2016",625,4,"3215-5625","3215-2625","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","CARLOS MARUN","PMDB","MS","02/05/2016",372,3,"3215-5372","3215-2372","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","DIEGO ANDRADE","PSD","MG","03/05/2016",307,4,"3215-5307","3215-2307","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","HEULER CRUVINEL","PSD","GO","18/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","MARCOS MONTES","PSD","MG","03/05/2016",334,4,"3215-5334","3215-2334","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","MIGUEL LOMBARDI","PR","SP","02/05/2016",835,4,"3215-5835","3215-2835","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","PADRE JOÃO","PT","MG","03/05/2016",743,4,"3215-5743","3215-2743","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","PEPE VARGAS","PT","RS","03/05/2016",858,4,"3215-5858","3215-2858","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","RAQUEL MUNIZ","PSD","MG","03/05/2016",444,4,"3215-5444","3215-2444","Exma. Senhora Deputada"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","REMÍDIO MONAI","PR","RR","02/05/2016",641,4,"3215-5641","3215-2641","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","VANDER LOUBET","PT","MS","03/05/2016",838,4,"3215-5838","3215-2838","Exmo. Senhor Deputado"),
        array( "CAPADR","Comissão de Agricultura, Pecuária, Abastecimento e Desenvolvimento Rural","PT/PSD/PR/PROS/PCdoB","Suplente","WELLINGTON ROBERTO","PR","PB","02/05/2016",514,4,"3215-5514","3215-2514","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PDT","Titular","FÉLIX MENDONÇA JÚNIOR","PDT","BA","03/05/2016",912,4,"3215-5912","3215-2912","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PDT","Titular","VICENTE ARRUDA","PDT","CE","03/05/2016",522,4,"3215-5522","3215-2522","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PDT","Suplente","AFONSO MOTTA","PDT","RS","03/05/2016",711,4,"3215-5711","3215-2711","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PDT","Suplente","SÓSTENES CAVALCANTE","DEM","RJ","18/05/2016",560,4,"3215-5560","3215-2560","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALCEU MOREIRA","PMDB","RS","03/05/2016",238,4,"3215-5238","3215-2238","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANDRÉ AMARAL","PMDB","PB","10/08/2016",833,4,"3215-5833","3215-2833","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANDRE MOURA","PSC","SE","03/05/2016",846,4,"3215-5846","3215-2846","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANTONIO BULHÕES","PRB","SP","03/05/2016",327,4,"3215-5327","3215-2327","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ARTHUR LIRA","PP","AL","03/05/2016",942,4,"3215-5942","3215-2942","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS BEZERRA","PMDB","MT","03/05/2016",815,4,"3215-5815","3215-2815","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","COVATTI FILHO","PP","RS","03/05/2016",228,4,"3215-5228","3215-2228","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CRISTIANE BRASIL","PTB","RJ","03/05/2016",644,4,"3215-5644","3215-2644","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ELMAR NASCIMENTO","DEM","BA","03/05/2016",935,4,"3215-5935","3215-2935","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ESPERIDIÃO AMIN","PP","SC","03/05/2016",252,4,"3215-5252","3215-2252","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FÁBIO RAMALHO","PMDB","MG","03/05/2016",452,4,"3215-5452","3215-2452","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FAUSTO PINATO","PP","SP","03/05/2016",562,4,"3215-5562","3215-2562","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FELIPE MAIA","DEM","RN","03/05/2016",528,4,"3215-5528","3215-2528","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GENECIAS NORONHA","SD","CE","02/05/2016",244,4,"3215-5244","3215-2244","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOÃO CAMPOS","PRB","GO","03/05/2016",315,4,"3215-5315","3215-2315","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOSÉ CARLOS ALELUIA","DEM","BA","03/05/2016",854,4,"3215-5854","3215-2854","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOSÉ FOGAÇA","PMDB","RS","03/05/2016",376,3,"3215-5376","3215-2376","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOZI ARAÚJO","PTN","AP","06/07/2016",309,4,"3215-5309","3215-2309","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LINCOLN PORTELA","PRB","MG","03/05/2016",615,4,"3215-5615","3215-2615","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MAIA FILHO","PP","PI","03/05/2016",624,4,"3215-5624","3215-2624","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCOS ROGÉRIO","DEM","RO","15/07/2016",930,4,"3215-5930","3215-2930","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","OSMAR SERRAGLIO","PMDB","PR","03/05/2016",845,4,"3215-5845","3215-2845","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PAES LANDIM","PTB","PI","22/08/2016",648,4,"3215-5648","3215-2648","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PAULO MALUF","PP","SP","24/05/2016",512,4,"3215-5512","3215-2512","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PAULO PEREIRA DA SILVA","SD","SP","06/07/2016",217,4,"3215-5217","3215-2217","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RODRIGO PACHECO","PMDB","MG","03/05/2016",510,4,"3215-5510","3215-2510","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SORAYA SANTOS","PMDB","RJ","03/05/2016",352,4,"3215-5352","3215-2352","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VALTENIR PEREIRA","PMDB","MT","03/05/2016",913,4,"3215-5913","3215-2913","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VITOR VALIM","PMDB","CE","21/06/2016",545,4,"3215-5545","3215-2545","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","AGUINALDO RIBEIRO","PP","PB","03/05/2016",735,4,"3215-5735","3215-2735","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALTINEU CÔRTES","PMDB","RJ","03/05/2016",578,3,"3215-5578","3215-2578","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ARNALDO FARIA DE SÁ","PTB","SP","03/05/2016",929,4,"3215-5929","3215-2929","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BONIFÁCIO DE ANDRADA","PSDB","MG","03/05/2016",208,4,"3215-5208","3215-2208","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS MARUN","PMDB","MS","03/05/2016",372,3,"3215-5372","3215-2372","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DR. SINVAL MALHEIROS","PTN","SP","24/08/2016",520,4,"3215-5520","3215-2520","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FRANCISCO FLORIANO","DEM","RJ","03/05/2016",719,4,"3215-5719","3215-2719","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HILDO ROCHA","PMDB","MA","03/05/2016",734,4,"3215-5734","3215-2734","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HIRAN GONÇALVES","PP","RR","03/05/2016",274,3,"3215-5274","3215-2274","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HUGO MOTTA","PMDB","PB","28/06/2016",237,4,"3215-5237","3215-2237","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JERÔNIMO GOERGEN","PP","RS","03/05/2016",316,4,"3215-5316","3215-2316","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JUSCELINO FILHO","DEM","MA","03/05/2016",370,3,"3215-5370","3215-2370","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","KAIO MANIÇOBA","PMDB","PE","03/05/2016",525,4,"3215-5525","3215-2525","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LAERCIO OLIVEIRA","SD","SE","12/05/2016",629,4,"3215-5629","3215-2629","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LAURA CARNEIRO","PMDB","RJ","20/09/2016",382,3,"3215-5382","3215-2382","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUCAS VERGILIO","SD","GO","02/08/2016",816,4,"3215-5816","3215-2816","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MANOEL JUNIOR","PMDB","PB","03/05/2016",601,4,"3215-5601","3215-2601","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MÁRIO NEGROMONTE JR.","PP","BA","24/05/2016",517,4,"3215-5517","3215-2517","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MORONI TORGAN","DEM","CE","03/05/2016",445,4,"3215-5445","3215-2445","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ODELMO LEÃO","PP","MG","03/05/2016",419,4,"3215-5419","3215-2419","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PASTOR EURICO","PHS","PE","03/05/2016",906,4,"3215-5906","3215-2906","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAUDERNEY AVELINO","DEM","AM","15/07/2016",610,4,"3215-5610","3215-2610","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","POMPEO DE MATTOS","PDT","RS","03/05/2016",704,4,"3215-5704","3215-2704","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PR. MARCO FELICIANO","PSC","SP","03/05/2016",254,4,"3215-5254","3215-2254","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RICARDO BARROS","PP","PR","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SERGIO SOUZA","PMDB","PR","03/05/2016",702,4,"3215-5702","3215-2702","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SILAS CÂMARA","PRB","AM","03/05/2016",532,4,"3215-5532","3215-2532","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TIA ERON","PRB","BA","03/05/2016",618,4,"3215-5618","3215-2618","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","BETINHO GOMES","PSDB","PE","03/05/2016",269,3,"3215-5269",32152269,"Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","BRUNO COVAS","PSDB","SP","03/05/2016",521,4,"3215-5521","3215-2521","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","DANILO FORTE","PSB","CE","03/05/2016",384,3,"3215-5384","3215-2384","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","EVANDRO GUSSI","PV","SP","03/05/2016",433,4,"3215-5433","3215-2433","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","FÁBIO SOUSA","PSDB","GO","03/05/2016",271,3,"3215-5271","3215-2271","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","JOÃO FERNANDO COUTINHO","PSB","PE","20/06/2016",567,3,32155567,32152567,"Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","JÚLIO DELGADO","PSB","MG","03/05/2016",323,4,"3215-5323","3215-2323","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","JUTAHY JUNIOR","PSDB","BA","03/05/2016",407,4,"3215-5407","3215-2407","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","MAX FILHO","PSDB","ES","03/05/2016",276,3,"3215-5276","3215-2276","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","PAULO ABI-ACKEL","PSDB","MG","03/05/2016",460,4,"3215-5460","3215-2460","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","ROCHA","PSDB","AC","03/05/2016",607,4,"3215-5607","3215-2607","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","RUBENS BUENO","PPS","PR","06/07/2016",623,4,"3215-5623","3215-2623","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Titular","TADEU ALENCAR","PSB","PE","03/05/2016",820,4,"3215-5820","3215-2820","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","ARTHUR OLIVEIRA MAIA","PPS","BA","06/07/2016",830,4,"3215-5830","3215-2830","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","DANIEL COELHO","PSDB","PE","03/05/2016",813,4,"3215-5813","3215-2813","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","ELIZEU DIONIZIO","PSDB","MS","03/05/2016",531,4,"3215-5531","3215-2531","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","GONZAGA PATRIOTA","PSB","PE","02/08/2016",430,4,"3215-5430","3215-2430","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","HUGO LEAL","PSB","RJ","20/06/2016",631,4,"3215-5631","3215-2631","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","JANETE CAPIBERIBE","PSB","AP","03/05/2016",209,4,"3215-5209","3215-2209","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","JHC","PSB","AL","03/05/2016",958,4,"3215-5958","3215-2958","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","JOSÉ CARLOS ARAÚJO","PR","BA","03/05/2016",232,4,"3215-5232","3215-2232","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","NELSON MARCHEZAN JUNIOR","PSDB","RS","03/05/2016",250,4,"3215-5250","3215-2250","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","ONYX LORENZONI","DEM","RS","03/05/2016",828,4,"3215-5828","3215-2828","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","RICARDO TRIPOLI","PSDB","SP","03/05/2016",241,4,"3215-5241","3215-2241","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","RODRIGO DE CASTRO","PSDB","MG","03/05/2016",701,4,"3215-5701","3215-2701","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSDB/PSB/PPS/PV","Suplente","SARNEY FILHO","PV","MA","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSOL","Titular","CHICO ALENCAR","PSOL","RJ","03/05/2016",848,4,"3215-5848","3215-2848","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PSOL","Suplente","IVAN VALENTE","PSOL","SP","03/05/2016",716,4,"3215-5716","3215-2716","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","CAPITÃO AUGUSTO","PR","SP","02/05/2016",273,3,"3215-5273","3215-2273","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","DELEGADO ÉDER MAURO","PSD","PA","03/05/2016",586,3,32155586,32152586,"Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","DELEGADO EDSON MOREIRA","PR","MG","02/05/2016",933,4,"3215-5933","3215-2933","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","DELEGADO WALDIR","PR","GO","02/05/2016",645,4,"3215-5645","3215-2645","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","DOMINGOS NETO","PSD","CE","03/05/2016",546,4,"3215-5546","3215-2546","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","JORGINHO MELLO","PR","SC","01/08/2016",329,4,"3215-5329","3215-2329","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ MENTOR","PT","SP","03/05/2016",502,4,"3215-5502","3215-2502","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","LUIZ COUTO","PT","PB","03/05/2016",442,4,"3215-5442","3215-2442","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","MARIA DO ROSÁRIO","PT","RS","03/05/2016",312,4,"3215-5312","3215-2312","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","PATRUS ANANIAS","PT","MG","17/05/2016",720,4,"3215-5720","3215-2720","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","PAULO FREIRE","PR","SP","01/08/2016",416,4,"3215-5416","3215-2416","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","PAULO MAGALHÃES","PSD","BA","03/05/2016",903,4,"3215-5903","3215-2903","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","PAULO TEIXEIRA","PT","SP","03/05/2016",281,3,"3215-5281","3215-2281","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","ROGÉRIO ROSSO","PSD","DF","03/05/2016",283,3,"3215-5283","3215-2283","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","RONALDO FONSECA","PROS","DF","02/05/2016",223,4,"3215-5223","3215-2223","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","RUBENS OTONI","PT","GO","03/05/2016",501,4,"3215-5501","3215-2501","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","RUBENS PEREIRA JÚNIOR","PCdoB","MA","03/05/2016",574,3,"3215-5574","3215-2574","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","THIAGO PEIXOTO","PSD","GO","03/05/2016",941,4,"3215-5941","3215-2941","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Titular","VALMIR PRASCIDELLI","PT","SP","03/05/2016",837,4,"3215-5837","3215-2837","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","ANA PERUGINI","PT","SP","03/05/2016",436,4,"3215-5436","3215-2436","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","CABO SABINO","PR","CE","03/05/2016",617,4,"3215-5617","3215-2617","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","CLARISSA GAROTINHO","PR","RJ","23/08/2016",714,4,"3215-5714","3215-2714","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","DANIEL ALMEIDA","PCdoB","BA","03/05/2016",317,4,"3215-5317","3215-2317","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","EDIO LOPES","PR","RR","31/08/2016",408,4,"3215-5408","3215-2408","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","EFRAIM FILHO","DEM","PB","02/05/2016",744,4,"3215-5744","3215-2744","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","EXPEDITO NETTO","PSD","RO","03/05/2016",943,4,"3215-5943","3215-2943","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","FÁBIO FARIA","PSD","RN","03/05/2016",706,4,"3215-5706","3215-2706","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","GABRIEL GUIMARÃES","PT","MG","03/05/2016",821,4,"3215-5821","3215-2821","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","GORETE PEREIRA","PR","CE","02/05/2016",206,4,"3215-5206","3215-2206","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","INDIO DA COSTA","PSD","RJ","03/05/2016",509,4,"3215-5509","3215-2509","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","JEFFERSON CAMPOS","PSD","SP","03/05/2016",346,4,"3215-5346","3215-2346","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ GUIMARÃES","PT","CE","03/05/2016",306,4,"3215-5306","3215-2306","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","LAERTE BESSA","PR","DF","02/08/2016",340,4,"3215-5340","3215-2340","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","MOEMA GRAMACHO","PT","BA","03/05/2016",576,3,"3215-5576","3215-2576","Exma. Senhora Deputada"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","REGINALDO LOPES","PT","MG","03/05/2016",426,4,"3215-5426","3215-2426","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","SANDRO ALEX","PSD","PR","03/05/2016",221,4,"3215-5221","3215-2221","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","VICENTINHO","PT","SP","03/05/2016",740,4,"3215-5740","3215-2740","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","PT/PSD/PR/PROS/PCdoB","Suplente","WELLINGTON ROBERTO","PR","PB","01/08/2016",514,4,"3215-5514","3215-2514","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","REDE","Titular","ALESSANDRO MOLON","REDE","RJ","03/05/2016",652,4,"3215-5652","3215-2652","Exmo. Senhor Deputado"),
        array( "CCJC","Comissão de Constituição e Justiça e de Cidadania","REDE","Suplente","ALIEL MACHADO","REDE","PR","03/05/2016",480,3,"3215-5480","3215-2480","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PDT","Titular","AFONSO MOTTA","PDT","RS","03/05/2016",711,4,"3215-5711","3215-2711","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PDT","Suplente","DAMIÃO FELICIANO","PDT","PB","03/05/2016",938,4,"3215-5938","3215-2938","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANDRÉ DE PAULA","PSD","PE","06/09/2016",754,4,"3215-5754","3215-2754","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CELSO PANSERA","PMDB","RJ","03/05/2016",475,3,"3215-5475","3215-2475","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ERIVELTON SANTANA","PEN","BA","03/05/2016",756,4,"3215-5756","3215-2756","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FABIO REIS","PMDB","SE","03/05/2016",456,4,"3215-5456","3215-2456","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FRANKLIN LIMA","PP","MG","03/05/2016",627,4,"3215-5627","3215-2627","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GILBERTO NASCIMENTO","PSC","SP","03/05/2016",834,4,"3215-5834","3215-2834","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HÉLIO LEITE","DEM","PA","03/05/2016",403,4,"3215-5403","3215-2403","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JORGE TADEU MUDALEN","DEM","SP","03/05/2016",538,4,"3215-5538","3215-2538","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIZA ERUNDINA","PSOL","SP","03/05/2016",620,4,"3215-5620","3215-2620","Exma. Senhora Deputada"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCELO AGUIAR","DEM","SP","03/05/2016",367,3,"3215-5367","3215-2367","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RENATA ABREU","PTN","SP","03/05/2016",726,4,"3215-5726","3215-2726","Exma. Senhora Deputada"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RONALDO NOGUEIRA","PTB","RS","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TIA ERON","PRB","BA","03/05/2016",618,4,"3215-5618","3215-2618","Exma. Senhora Deputada"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","WLADIMIR COSTA","SD","PA","02/05/2016",343,4,"3215-5343","3215-2343","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ANDRÉ FIGUEIREDO","PDT","CE","19/05/2016",940,4,"3215-5940","3215-2940","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BENITO GAMA","PTB","BA","03/05/2016",414,4,"3215-5414","3215-2414","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BRUNA FURLAN","PSDB","SP","03/05/2016",836,4,"3215-5836","3215-2836","Exma. Senhora Deputada"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CLAUDIO CAJADO","DEM","BA","03/05/2016",630,4,"3215-5630","3215-2630","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ELI CORRÊA FILHO","DEM","SP","03/05/2016",850,4,"3215-5850","3215-2850","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ELIZEU DIONIZIO","PSDB","MS","03/05/2016",531,4,"3215-5531","3215-2531","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FÁBIO SOUSA","PSDB","GO","04/05/2016",271,3,"3215-5271","3215-2271","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FERNANDO MONTEIRO","PP","PE","03/05/2016",282,3,"3215-5282","3215-2282","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSUÉ BENGTSON","PTB","PA","03/05/2016",505,4,"3215-5505","3215-2505","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JULIO LOPES","PP","RJ","17/05/2016",544,4,"3215-5544","3215-2544","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LINDOMAR GARÇON","PRB","RO","03/05/2016",548,4,"3215-5548","3215-2548","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NELSON MEURER","PP","PR","03/05/2016",916,4,"3215-5916","3215-2916","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PR. MARCO FELICIANO","PSC","SP","03/05/2016",254,4,"3215-5254","3215-2254","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ROGÉRIO PENINHA MENDONÇA","PMDB","SC","03/05/2016",656,4,"3215-5656","3215-2656","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RONALDO MARTINS","PRB","CE","03/05/2016",568,3,"3215-5568","3215-2568","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SANDES JÚNIOR","PP","GO","27/07/2016",536,4,"3215-5536","3215-2536","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SÓSTENES CAVALCANTE","DEM","RJ","03/05/2016",560,4,"3215-5560","3215-2560","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VITOR VALIM","PMDB","CE","03/05/2016",545,4,"3215-5545","3215-2545","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","ALEXANDRE LEITE","DEM","SP","03/05/2016",841,4,"3215-5841","3215-2841","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","EDUARDO CURY","PSDB","SP","03/05/2016",368,3,"3215-5368","3215-2368","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","FRANCISCO FLORIANO","DEM","RJ","02/05/2016",719,4,"3215-5719","3215-2719","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","HERÁCLITO FORTES","PSB","PI","03/05/2016",708,4,"3215-5708","3215-2708","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","JHC","PSB","AL","03/05/2016",958,4,"3215-5958","3215-2958","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","ROBERTO ALVES","PRB","SP","03/05/2016",946,4,"3215-5946","3215-2946","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","SILAS CÂMARA","PRB","AM","03/05/2016",532,4,"3215-5532","3215-2532","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Titular","VITOR LIPPI","PSDB","SP","03/05/2016",823,4,"3215-5823","3215-2823","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","ARTHUR VIRGÍLIO BISNETO","PSDB","AM","03/05/2016",583,3,"3215-5583","3215-2583","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","FLAVINHO","PSB","SP","03/05/2016",379,3,"3215-5379","3215-2379","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","IZALCI","PSDB","DF","03/05/2016",602,4,"3215-5602","3215-2602","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","MARINALDO ROSENDO","PSB","PE","03/05/2016",827,4,"3215-5827","3215-2827","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","NILSON PINTO","PSDB","PA","03/05/2016",527,4,"3215-5527","3215-2527","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","PAULO MARTINS","PSDB","PR","03/05/2016",412,4,"3215-5412","3215-2412","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSDB/PSB/PPS/PV","Suplente","ROBERTO FREIRE","PPS","SP","02/05/2016",242,4,"3215-5242","3215-2242","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PSL","Suplente","ALFREDO KAEFER","PSL","PR","02/05/2016",818,4,"3215-5818","3215-2818","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","BILAC PINTO","PR","MG","02/05/2016",806,4,"3215-5806","3215-2806","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","FÁBIO FARIA","PSD","RN","17/05/2016",706,4,"3215-5706","3215-2706","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ NUNES","PSD","BA","23/05/2016",728,4,"3215-5728","3215-2728","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","LUCIANA SANTOS","PCdoB","PE","03/05/2016",524,4,"3215-5524","3215-2524","Exma. Senhora Deputada"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","MARCOS SOARES","DEM","RJ","02/05/2016",741,4,"3215-5741","3215-2741","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","MARGARIDA SALOMÃO","PT","MG","03/05/2016",236,4,"3215-5236","3215-2236","Exma. Senhora Deputada"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","MISSIONÁRIO JOSÉ OLIMPIO","DEM","SP","02/05/2016",507,4,"3215-5507","3215-2507","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","SANDRO ALEX","PSD","PR","03/05/2016",221,4,"3215-5221","3215-2221","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","SIBÁ MACHADO","PT","AC","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Titular","VICTOR MENDES","PSD","MA","03/05/2016",580,3,"3215-5580","3215-2580","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","ALEXANDRE VALLE","PR","RJ","02/05/2016",587,3,"3215-5587",32152587,"Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","BETO FARO","PT","PA","03/05/2016",723,4,"3215-5723","3215-2723","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","CAETANO","PT","BA","03/05/2016",415,4,"3215-5415","3215-2415","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","GOULART","PSD","SP","18/05/2016",533,4,"3215-5533","3215-2533","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","INDIO DA COSTA","PSD","RJ","03/05/2016",509,4,"3215-5509","3215-2509","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO DANIEL","PT","SE","03/05/2016",605,4,"3215-5605","3215-2605","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ ROCHA","PR","BA","02/05/2016",908,4,"3215-5908","3215-2908","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","LAUDIVIO CARVALHO","SD","MG","04/05/2016",717,4,"3215-5717","3215-2717","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","MILTON MONTI","PR","SP","02/05/2016",328,4,"3215-5328","3215-2328","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","PAULÃO","PT","AL","03/05/2016",366,3,"3215-5366","3215-2366","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","PAULO ABI-ACKEL","PSDB","MG","02/05/2016",460,4,"3215-5460","3215-2460","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PT/PSD/PR/PROS/PCdoB","Suplente","RÔMULO GOUVEIA","PSD","PB","03/05/2016",411,4,"3215-5411","3215-2411","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PTdoB","Titular","LUIS TIBÉ","PTdoB","MG","03/05/2016",632,4,"3215-5632","3215-2632","Exmo. Senhor Deputado"),
        array( "CCTCI","Comissão de Ciência e Tecnologia, Comunicação e Informática","PTdoB","Suplente","SILVIO COSTA","PTdoB","PE","03/05/2016",417,4,"3215-5417","3215-2417","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PDT","Titular","SÓSTENES CAVALCANTE","DEM","RJ","23/05/2016",560,4,"3215-5560","3215-2560","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PDT","Suplente","FLAVINHO","PSB","SP","19/05/2016",379,3,"3215-5379","3215-2379","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CABUÇU BORGES","PMDB","AP","11/05/2016",380,3,"3215-5380","3215-2380","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CELSO JACOB","PMDB","RJ","01/08/2016",917,4,"3215-5917","3215-2917","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CELSO PANSERA","PMDB","RJ","03/05/2016",475,3,"3215-5475","3215-2475","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CLAUDIO CAJADO","DEM","BA","23/05/2016",630,4,"3215-5630","3215-2630","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DOMINGOS SÁVIO","PSDB","MG","05/07/2016",345,4,"3215-5345","3215-2345","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EFRAIM FILHO","DEM","PB","06/06/2016",744,4,"3215-5744","3215-2744","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JANDIRA FEGHALI","PCdoB","RJ","03/05/2016",622,4,"3215-5622","3215-2622","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JEAN WYLLYS","PSOL","RJ","03/05/2016",646,4,"3215-5646","3215-2646","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RONALDO MARTINS","PRB","CE","11/05/2016",568,3,"3215-5568","3215-2568","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DIEGO GARCIA","PHS","PR","03/05/2016",745,4,"3215-5745","3215-2745","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LINCOLN PORTELA","PRB","MG","03/05/2016",615,4,"3215-5615","3215-2615","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUCIANA SANTOS","PCdoB","PE","03/05/2016",524,4,"3215-5524","3215-2524","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARINHA RAUPP","PMDB","RO","03/05/2016",614,4,"3215-5614","3215-2614","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MOSES RODRIGUES","PMDB","CE","19/05/2016",809,4,"3215-5809","3215-2809","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PEDRO UCZAI","PT","SC","03/05/2016",229,4,"3215-5229","3215-2229","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Titular","GIUSEPPE VECCI","PSDB","GO","03/05/2016",383,3,"3215-5383","3215-2383","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Titular","JOSE STÉDILE","PSB","RS","03/05/2016",354,4,"3215-5354","3215-2354","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Titular","OTAVIO LEITE","PSDB","RJ","03/05/2016",225,4,"3215-5225","3215-2225","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Titular","TADEU ALENCAR","PSB","PE","03/05/2016",820,4,"3215-5820","3215-2820","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Suplente","ALICE PORTUGAL","PCdoB","BA","04/05/2016",420,4,"3215-5420","3215-2420","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Suplente","MANDETTA","DEM","MS","18/05/2016",577,3,"3215-5577","3215-2577","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PSDB/PSB/PPS/PV","Suplente","ROCHA","PSDB","AC","11/05/2016",607,4,"3215-5607","3215-2607","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Titular","CHICO D'ANGELO","PT","RJ","03/05/2016",542,4,"3215-5542","3215-2542","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Titular","EDUARDO BOLSONARO","PSC","SP","05/07/2016",481,3,"3215-5481","3215-2481","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Titular","MARGARIDA SALOMÃO","PT","MG","03/05/2016",236,4,"3215-5236","3215-2236","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Titular","PAULÃO","PT","AL","03/05/2016",366,3,"3215-5366","3215-2366","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Titular","SANDRO ALEX","PSD","PR","11/05/2016",221,4,"3215-5221","3215-2221","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Titular","TIRIRICA","PR","SP","02/05/2016",637,4,"3215-5637","3215-2637","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Suplente","ELIZIANE GAMA","PPS","MA","12/05/2016",205,4,"3215-5205","3215-2205","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Suplente","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Suplente","EVANDRO GUSSI","PV","SP","31/05/2016",433,4,"3215-5433","3215-2433","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZIANNE LINS","PT","CE","03/05/2016",713,4,"3215-5713","3215-2713","Exma. Senhora Deputada"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Suplente","MARCELO AGUIAR","DEM","SP","18/05/2016",367,3,"3215-5367","3215-2367","Exmo. Senhor Deputado"),
        array( "CCULT","Comissão de Cultura","PT/PSD/PR/PROS/PCdoB","Suplente","WALDENOR PEREIRA","PT","BA","03/05/2016",954,4,"3215-5954","3215-2954","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PDT","Titular","DIMAS FABIANO","PP","MG","03/05/2016",325,4,"3215-5325","3215-2325","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PDT","Suplente","EDUARDO DA FONTE","PP","PE","03/05/2016",628,4,"3215-5628","3215-2628","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANTÔNIO JÁCOME","PTN","RN","03/05/2016",230,4,"3215-5230","3215-2230","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CELSO RUSSOMANNO","PRB","SP","03/05/2016",960,4,"3215-5960","3215-2960","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ELI CORRÊA FILHO","DEM","SP","03/05/2016",850,4,"3215-5850","3215-2850","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ELIZIANE GAMA","PPS","MA","03/05/2016",205,4,"3215-5205","3215-2205","Exma. Senhora Deputada"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EROS BIONDINI","PROS","MG","03/05/2016",321,4,"3215-5321","3215-2321","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","IRACEMA PORTELLA","PP","PI","03/05/2016",924,4,"3215-5924","3215-2924","Exma. Senhora Deputada"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOVAIR ARANTES","PTB","GO","03/05/2016",504,4,"3215-5504","3215-2504","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCOS ROTTA","PMDB","AM","03/05/2016",333,4,"3215-5333","3215-2333","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RICARDO IZAR","PP","SP","03/05/2016",634,4,"3215-5634","3215-2634","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VINICIUS CARVALHO","PRB","SP","03/05/2016",356,4,"3215-5356","3215-2356","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","WELITON PRADO","PMB","MG","03/05/2016",862,4,"3215-5862","3215-2862","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","AUREO","SD","RJ","02/05/2016",212,4,"3215-5212","3215-2212","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DELEY","PTB","RJ","03/05/2016",742,4,"3215-5742","3215-2742","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","GUILHERME MUSSI","PP","SP","03/05/2016",712,4,"3215-5712","3215-2712","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","KAIO MANIÇOBA","PMDB","PE","03/05/2016",525,4,"3215-5525","3215-2525","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LEONARDO QUINTÃO","PMDB","MG","03/05/2016",914,4,"3215-5914","3215-2914","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCELO ARO","PHS","MG","04/05/2016",280,3,"3215-5280","3215-2280","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCELO BELINATI","PP","PR","03/05/2016",268,3,"3215-5268","3215-2268","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MÁRCIO MARINHO","PRB","BA","03/05/2016",326,4,"3215-5326","3215-2326","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAULO AZI","DEM","BA","04/05/2016",635,4,"3215-5635","3215-2635","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Titular","MARCO TEBALDI","PSDB","SC","03/05/2016",284,3,"3215-5284","3215-2284","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Titular","MARIA HELENA","PSB","RR","03/05/2016",410,4,"3215-5410","3215-2410","Exma. Senhora Deputada"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Titular","NELSON MARCHEZAN JUNIOR","PSDB","RS","03/05/2016",250,4,"3215-5250","3215-2250","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Titular","SEVERINO NINHO","PSB","PE","08/08/2016",314,4,"3215-5314","3215-2314","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Suplente","ALEX MANENTE","PPS","SP","03/05/2016",245,4,"3215-5245","3215-2245","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Suplente","BRUNO COVAS","PSDB","SP","03/05/2016",521,4,"3215-5521","3215-2521","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Suplente","ELIZEU DIONIZIO","PSDB","MS","04/05/2016",531,4,"3215-5531","3215-2531","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Suplente","JOÃO FERNANDO COUTINHO","PSB","PE","03/05/2016",567,3,32155567,32152567,"Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PSDB/PSB/PPS/PV","Suplente","JÚLIO DELGADO","PSB","MG","03/05/2016",323,4,"3215-5323","3215-2323","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Titular","CÉSAR HALUM","PRB","TO","12/05/2016",422,4,"3215-5422","3215-2422","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Titular","IVAN VALENTE","PSOL","SP","03/05/2016",716,4,"3215-5716","3215-2716","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ CARLOS ARAÚJO","PR","BA","02/05/2016",232,4,"3215-5232","3215-2232","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","CABO SABINO","PR","CE","05/07/2016",617,4,"3215-5617","3215-2617","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","CHICO LOPES","PCdoB","CE","12/05/2016",310,4,"3215-5310","3215-2310","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","FELIPE MAIA","DEM","RN","02/05/2016",528,4,"3215-5528","3215-2528","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","HEULER CRUVINEL","PSD","GO","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","PAULO PIMENTA","PT","RS","03/05/2016",552,4,"3215-5552","3215-2552","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","SÉRGIO BRITO","PSD","BA","03/05/2016",638,4,"3215-5638","3215-2638","Exmo. Senhor Deputado"),
        array( "CDC","Comissão de Defesa do Consumidor","PT/PSD/PR/PROS/PCdoB","Suplente","SILVIO COSTA","PTdoB","PE","03/05/2016",417,4,"3215-5417","3215-2417","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PDT","Suplente","CHICO LOPES","PCdoB","CE","29/08/2016",310,4,"3215-5310","3215-2310","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMB","Titular","JOÃO ARRUDA","PMDB","PR","11/05/2016",633,4,"3215-5633","3215-2633","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMB","Suplente","MARINALDO ROSENDO","PSB","PE","22/06/2016",827,4,"3215-5827","3215-2827","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ADAIL CARNEIRO","PP","CE","03/05/2016",335,4,"3215-5335","3215-2335","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","AUREO","SD","RJ","03/05/2016",212,4,"3215-5212","3215-2212","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JORGE CÔRTE REAL","PTB","PE","03/05/2016",621,4,"3215-5621","3215-2621","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LAERCIO OLIVEIRA","SD","SE","02/05/2016",629,4,"3215-5629","3215-2629","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUCAS VERGILIO","SD","GO","28/06/2016",816,4,"3215-5816","3215-2816","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PASTOR EURICO","PHS","PE","05/07/2016",906,4,"3215-5906","3215-2906","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RENATO MOLLING","PP","RS","03/05/2016",337,4,"3215-5337","3215-2337","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROSANGELA GOMES","PRB","RJ","05/07/2016",438,4,"3215-5438","3215-2438","Exma. Senhora Deputada"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","AUGUSTO COUTINHO","SD","PE","02/05/2016",373,3,"3215-5373","3215-2373","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CONCEIÇÃO SAMPAIO","PP","AM","03/05/2016",515,4,"3215-5515","3215-2515","Exma. Senhora Deputada"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","COVATTI FILHO","PP","RS","03/05/2016",228,4,"3215-5228","3215-2228","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HERCULANO PASSOS","PSD","SP","03/05/2016",926,4,"3215-5926","3215-2926","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSI NUNES","PMDB","TO","15/06/2016",950,4,"3215-5950","3215-2950","Exma. Senhora Deputada"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCELO MATOS","PHS","RJ","03/05/2016",579,3,"3215-5579","3215-2579","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VINICIUS CARVALHO","PRB","SP","03/05/2016",356,4,"3215-5356","3215-2356","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ZECA CAVALCANTI","PTB","PE","03/05/2016",318,4,"3215-5318","3215-2318","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PSDB/PSB/PPS/PV","Titular","KEIKO OTA","PSB","SP","23/06/2016",523,4,"3215-5523","3215-2523","Exma. Senhora Deputada"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PSDB/PSB/PPS/PV","Titular","OTAVIO LEITE","PSDB","RJ","03/05/2016",225,4,"3215-5225","3215-2225","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PSDB/PSB/PPS/PV","Titular","PAULO MARTINS","PSDB","PR","03/05/2016",412,4,"3215-5412","3215-2412","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PSDB/PSB/PPS/PV","Suplente","JÚLIO CESAR","PSD","PI","03/05/2016",944,4,"3215-5944","3215-2944","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PSDB/PSB/PPS/PV","Suplente","LUIZ CARLOS RAMOS","PTN","RJ","03/05/2016",636,4,"3215-5636","3215-2636","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PSDB/PSB/PPS/PV","Suplente","ROGÉRIO MARINHO","PSDB","RN","03/05/2016",446,4,"3215-5446","3215-2446","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Titular","HELDER SALOMÃO","PT","ES","03/05/2016",573,3,"3215-5573","3215-2573","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Titular","JORGE BOEIRA","PP","SC","03/05/2016",342,4,"3215-5342","3215-2342","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Titular","MARCOS REATEGUI","PSD","AP","03/05/2016",344,4,"3215-5344","3215-2344","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Titular","MAURO PEREIRA","PMDB","RS","03/05/2016",843,4,"3215-5843","3215-2843","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Titular","RONALDO MARTINS","PRB","CE","22/09/2016",568,3,"3215-5568","3215-2568","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Suplente","ENIO VERRI","PT","PR","03/05/2016",472,3,"3215-5472","3215-2472","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Suplente","FERNANDO TORRES","PSD","BA","03/05/2016",642,4,"3215-5642","3215-2642","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Suplente","GOULART","PSD","SP","03/05/2016",533,4,"3215-5533","3215-2533","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ NISHIMORI","PR","PR","01/06/2016",907,4,"3215-5907","3215-2907","Exmo. Senhor Deputado"),
        array( "CDEICS","Comissão de Desenvolvimento Econômico, Indústria, Comércio e Serviços","PT/PSD/PR/PROS/PCdoB","Suplente","MARCELO ÁLVARO ANTÔNIO","PR","MG","02/05/2016",824,4,"3215-5824","3215-2824","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PDT","Titular","CHICO ALENCAR","PSOL","RJ","03/05/2016",848,4,"3215-5848","3215-2848","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PDT","Suplente","JEAN WYLLYS","PSOL","RJ","03/05/2016",646,4,"3215-5646","3215-2646","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ARNALDO JORDY","PPS","PA","03/05/2016",506,4,"3215-5506","3215-2506","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FRANKLIN LIMA","PP","MG","03/05/2016",627,4,"3215-5627","3215-2627","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LINCOLN PORTELA","PRB","MG","03/05/2016",615,4,"3215-5615","3215-2615","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NILTO TATTO","PT","SP","19/05/2016",267,3,"3215-5267","3215-2267","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PR. MARCO FELICIANO","PSC","SP","03/05/2016",254,4,"3215-5254","3215-2254","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RONALDO NOGUEIRA","PTB","RS","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SÓSTENES CAVALCANTE","DEM","RJ","03/05/2016",560,4,"3215-5560","3215-2560","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VITOR VALIM","PMDB","CE","03/05/2016",545,4,"3215-5545","3215-2545","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EDUARDO BOLSONARO","PSC","SP","03/05/2016",481,3,"3215-5481","3215-2481","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","IRACEMA PORTELLA","PP","PI","03/05/2016",924,4,"3215-5924","3215-2924","Exma. Senhora Deputada"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAJOR OLIMPIO","SD","SP","02/05/2016",279,3,"3215-5279","3215-2279","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCELO AGUIAR","DEM","SP","03/05/2016",367,3,"3215-5367","3215-2367","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PATRUS ANANIAS","PT","MG","31/05/2016",720,4,"3215-5720","3215-2720","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RONALDO FONSECA","PROS","DF","03/05/2016",223,4,"3215-5223","3215-2223","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Titular","ELIZEU DIONIZIO","PSDB","MS","03/05/2016",531,4,"3215-5531","3215-2531","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Titular","EZEQUIEL TEIXEIRA","PTN","RJ","03/05/2016",210,4,"3215-5210","3215-2210","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Titular","FLAVINHO","PSB","SP","03/05/2016",379,3,"3215-5379","3215-2379","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Titular","JANETE CAPIBERIBE","PSB","AP","03/05/2016",209,4,"3215-5209","3215-2209","Exma. Senhora Deputada"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Suplente","DANIEL COELHO","PSDB","PE","03/05/2016",813,4,"3215-5813","3215-2813","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Suplente","KEIKO OTA","PSB","SP","03/05/2016",523,4,"3215-5523","3215-2523","Exma. Senhora Deputada"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Suplente","LUIZA ERUNDINA","PSOL","SP","03/05/2016",620,4,"3215-5620","3215-2620","Exma. Senhora Deputada"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PSDB/PSB/PPS/PV","Suplente","PAULO MARTINS","PSDB","PR","03/05/2016",412,4,"3215-5412","3215-2412","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Titular","ANDERSON FERREIRA","PR","PE","28/06/2016",450,4,"3215-5450","3215-2450","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Titular","DELEGADO ÉDER MAURO","PSD","PA","03/05/2016",586,3,32155586,32152586,"Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Titular","ERIKA KOKAY","PT","DF","02/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Titular","PADRE JOÃO","PT","MG","03/05/2016",743,4,"3215-5743","3215-2743","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Titular","PAULO PIMENTA","PT","RS","03/05/2016",552,4,"3215-5552","3215-2552","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Suplente","CAPITÃO AUGUSTO","PR","SP","02/05/2016",273,3,"3215-5273","3215-2273","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ COUTO","PT","PB","03/05/2016",442,4,"3215-5442","3215-2442","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Suplente","PEPE VARGAS","PT","RS","17/05/2016",858,4,"3215-5858","3215-2858","Exmo. Senhor Deputado"),
        array( "CDHM","Comissão de Direitos Humanos e Minorias","PT/PSD/PR/PROS/PCdoB","Suplente","VICENTINHO","PT","SP","03/05/2016",740,4,"3215-5740","3215-2740","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PDT","Suplente","MAURO MARIANI","PMDB","SC","03/05/2016",925,4,"3215-5925","3215-2925","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CACÁ LEÃO","PP","BA","03/05/2016",320,4,"3215-5320","3215-2320","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS MARUN","PMDB","MS","03/05/2016",372,3,"3215-5372","3215-2372","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DÂMINA PEREIRA","PSL","MG","03/05/2016",434,4,"3215-5434","3215-2434","Exma. Senhora Deputada"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FLAVIANO MELO","PMDB","AC","03/05/2016",224,4,"3215-5224","3215-2224","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JAIME MARTINS","PSD","MG","03/05/2016",904,4,"3215-5904","3215-2904","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCOS ABRÃO","PPS","GO","03/05/2016",375,3,"3215-5375","3215-2375","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MIGUEL HADDAD","PSDB","SP","03/05/2016",369,3,"3215-5369","3215-2369","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PEDRO PAULO","PMDB","RJ","28/06/2016",727,4,"3215-5727","3215-2727","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALBERTO FILHO","PMDB","MA","03/05/2016",350,4,"3215-5350","3215-2350","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","GENECIAS NORONHA","SD","CE","03/05/2016",244,4,"3215-5244","3215-2244","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HILDO ROCHA","PMDB","MA","03/05/2016",734,4,"3215-5734","3215-2734","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JULIO LOPES","PP","RJ","03/05/2016",544,4,"3215-5544","3215-2544","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","KAIO MANIÇOBA","PMDB","PE","03/05/2016",525,4,"3215-5525","3215-2525","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SÉRGIO MORAES","PTB","RS","03/05/2016",258,4,"3215-5258","3215-2258","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TONINHO WANDSCHEER","PROS","PR","03/05/2016",902,4,"3215-5902","3215-2902","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Titular","DUARTE NOGUEIRA","PSDB","SP","03/05/2016",921,4,"3215-5921","3215-2921","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Titular","JOÃO PAULO PAPA","PSDB","SP","03/05/2016",476,3,"3215-5476","3215-2476","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Titular","LEOPOLDO MEYER","PSB","PR","03/05/2016",233,4,"3215-5233","3215-2233","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Titular","VALADARES FILHO","PSB","SE","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Suplente","HERÁCLITO FORTES","PSB","PI","03/05/2016",708,4,"3215-5708","3215-2708","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Suplente","MAX FILHO","PSDB","ES","03/05/2016",276,3,"3215-5276","3215-2276","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Suplente","SILVIO TORRES","PSDB","SP","03/05/2016",404,4,"3215-5404","3215-2404","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PSDB/PSB/PPS/PV","Suplente","TENENTE LÚCIO","PSB","MG","03/05/2016",239,4,"3215-5239","3215-2239","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Titular","ALEX MANENTE","PPS","SP","02/05/2016",245,4,"3215-5245","3215-2245","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Titular","CAETANO","PT","BA","03/05/2016",415,4,"3215-5415","3215-2415","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Titular","FABIANO HORTA","PT","RJ","10/05/2016",483,3,"3215-5483","3215-2483","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Titular","HEULER CRUVINEL","PSD","GO","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Titular","MOEMA GRAMACHO","PT","BA","03/05/2016",576,3,"3215-5576","3215-2576","Exma. Senhora Deputada"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Suplente","ANGELIM","PT","AC","03/05/2016",543,4,"3215-5543","3215-2543","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ NUNES","PSD","BA","22/09/2016",728,4,"3215-5728","3215-2728","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ ROCHA","PR","BA","02/05/2016",908,4,"3215-5908","3215-2908","Exmo. Senhor Deputado"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZIANNE LINS","PT","CE","03/05/2016",713,4,"3215-5713","3215-2713","Exma. Senhora Deputada"),
        array( "CDU","Comissão de Desenvolvimento Urbano","PT/PSD/PR/PROS/PCdoB","Suplente","NILTO TATTO","PT","SP","03/05/2016",267,3,"3215-5267","3215-2267","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PDT","Titular","DAMIÃO FELICIANO","PDT","PB","03/05/2016",938,4,"3215-5938","3215-2938","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PDT","Suplente","CREUZA PEREIRA","PSB","PE","31/05/2016",662,4,"3215-5662","3215-2662","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALAN RICK","PRB","AC","03/05/2016",650,4,"3215-5650","3215-2650","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ARNALDO FARIA DE SÁ","PTB","SP","03/05/2016",929,4,"3215-5929","3215-2929","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BACELAR","PTN","BA","15/06/2016",381,3,"3215-5381","3215-2381","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CAIO NARCIO","PSDB","MG","03/05/2016",431,4,"3215-5431","3215-2431","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CELSO JACOB","PMDB","RJ","01/08/2016",917,4,"3215-5917","3215-2917","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DANILO CABRAL","PSB","PE","06/06/2016",423,4,"3215-5423","3215-2423","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DIEGO GARCIA","PHS","PR","03/05/2016",745,4,"3215-5745","3215-2745","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDUARDO BOLSONARO","PSC","SP","03/05/2016",481,3,"3215-5481","3215-2481","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ELIZEU DIONIZIO","PSDB","MS","03/05/2016",531,4,"3215-5531","3215-2531","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JAIR BOLSONARO","PSC","RJ","03/05/2016",482,3,"3215-5482","3215-2482","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOSI NUNES","PMDB","TO","03/05/2016",950,4,"3215-5950","3215-2950","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MOISÉS DINIZ","PCdoB","AC","30/08/2016",421,4,"3215-5421","3215-2421","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MOSES RODRIGUES","PMDB","CE","03/05/2016",809,4,"3215-5809","3215-2809","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PEDRO FERNANDES","PTB","MA","03/05/2016",814,4,"3215-5814","3215-2814","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PR. MARCO FELICIANO","PSC","SP","03/05/2016",254,4,"3215-5254","3215-2254","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PROFESSORA DORINHA SEABRA REZENDE","DEM","TO","03/05/2016",432,4,"3215-5432","3215-2432","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PROFESSORA MARCIVANIA","PCdoB","AP","03/05/2016",338,4,"3215-5338","3215-2338","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SERGIO VIDIGAL","PDT","ES","03/05/2016",812,4,"3215-5812","3215-2812","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ZECA DIRCEU","PT","PR","03/05/2016",613,4,"3215-5613","3215-2613","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BETO ROSADO","PP","RN","03/05/2016",840,4,"3215-5840","3215-2840","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CELSO PANSERA","PMDB","RJ","10/05/2016",475,3,"3215-5475","3215-2475","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DANIEL VILELA","PMDB","GO","03/05/2016",471,3,"3215-5471","3215-2471","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DELEY","PTB","RJ","03/05/2016",742,4,"3215-5742","3215-2742","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DR. JORGE SILVA","PHS","ES","03/05/2016",227,4,"3215-5227","3215-2227","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ELCIONE BARBALHO","PMDB","PA","03/05/2016",919,4,"3215-5919","3215-2919","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EVANDRO GUSSI","PV","SP","03/05/2016",433,4,"3215-5433","3215-2433","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LELO COIMBRA","PMDB","ES","04/05/2016",801,4,"3215-5801","3215-2801","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LINCOLN PORTELA","PRB","MG","03/05/2016",615,4,"3215-5615","3215-2615","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MANDETTA","DEM","MS","03/05/2016",577,3,"3215-5577","3215-2577","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCOS ROGÉRIO","DEM","RO","03/05/2016",930,4,"3215-5930","3215-2930","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARX BELTRÃO","PMDB","AL","03/05/2016",474,3,"3215-5474","3215-2474","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ONYX LORENZONI","DEM","RS","03/05/2016",828,4,"3215-5828","3215-2828","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAES LANDIM","PTB","PI","03/05/2016",648,4,"3215-5648","3215-2648","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAULO AZI","DEM","BA","11/05/2016",635,4,"3215-5635","3215-2635","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SARAIVA FELIPE","PMDB","MG","03/05/2016",429,4,"3215-5429","3215-2429","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TAKAYAMA","PSC","PR","03/05/2016",910,4,"3215-5910","3215-2910","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TONINHO PINHEIRO","PP","MG","03/05/2016",584,3,"3215-5584","3215-2584","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","ÁTILA LIRA","PSB","PI","03/05/2016",640,4,"3215-5640","3215-2640","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","LOBBE NETO","PSDB","SP","03/05/2016",275,3,"3215-5275","3215-2275","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","MARIANA CARVALHO","PSDB","RO","03/05/2016",508,4,"3215-5508","3215-2508","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","NILSON PINTO","PSDB","PA","03/05/2016",527,4,"3215-5527","3215-2527","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","PEDRO CUNHA LIMA","PSDB","PB","03/05/2016",611,4,"3215-5611","3215-2611","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","PEDRO UCZAI","PT","SC","03/05/2016",229,4,"3215-5229","3215-2229","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","PROFESSOR VICTÓRIO GALLI","PSC","MT","02/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Titular","ROGÉRIO MARINHO","PSDB","RN","03/05/2016",446,4,"3215-5446","3215-2446","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","ANDRÉ DE PAULA","PSD","PE","29/08/2016",754,4,"3215-5754","3215-2754","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","BETINHO GOMES","PSDB","PE","03/05/2016",269,3,"3215-5269",32152269,"Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","BONIFÁCIO DE ANDRADA","PSDB","MG","03/05/2016",208,4,"3215-5208","3215-2208","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","EDUARDO BARBOSA","PSDB","MG","03/05/2016",540,4,"3215-1540","3215-2540","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","FLAVINHO","PSB","SP","03/05/2016",379,3,"3215-5379","3215-2379","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","GERALDO RESENDE","PSDB","MS","03/05/2016",905,4,"3215-5905","3215-2905","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","KEIKO OTA","PSB","SP","03/05/2016",523,4,"3215-5523","3215-2523","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PSDB/PSB/PPS/PV","Suplente","RAFAEL MOTTA","PSB","RN","03/05/2016",737,4,"3215-5737","3215-2737","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","ALICE PORTUGAL","PCdoB","BA","03/05/2016",420,4,"3215-5420","3215-2420","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","ANA PERUGINI","PT","SP","03/05/2016",436,4,"3215-5436","3215-2436","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","ANGELIM","PT","AC","03/05/2016",543,4,"3215-5543","3215-2543","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","GEORGE HILTON","PROS","MG","02/05/2016",804,4,"3215-5804","3215-2804","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","GIUSEPPE VECCI","PSDB","GO","03/05/2016",383,3,"3215-5383","3215-2383","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","GIVALDO VIEIRA","PT","ES","03/05/2016",805,4,"3215-5805","3215-2805","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","GLAUBER BRAGA","PSOL","RJ","03/05/2016",362,4,"3215-5362","3215-2362","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","IZALCI","PSDB","DF","03/05/2016",602,4,"3215-5602","3215-2602","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","LEONARDO MONTEIRO","PT","MG","03/05/2016",922,4,"3215-5922","3215-2922","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","RAQUEL MUNIZ","PSD","MG","03/05/2016",444,4,"3215-5444","3215-2444","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","REGINALDO LOPES","PT","MG","03/05/2016",426,4,"3215-5426","3215-2426","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","SÁGUAS MORAES","PT","MT","03/05/2016",371,3,"3215-5371","3215-2371","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Titular","WALDENOR PEREIRA","PT","BA","02/05/2016",954,4,"3215-5954","3215-2954","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","ÁTILA LINS","PSD","AM","03/05/2016",730,4,"3215-5730","3215-2730","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","BRUNNY","PR","MG","03/05/2016",260,4,"3215-5260","3215-2260","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","DANRLEI DE DEUS HINTERHOLZ","PSD","RS","03/05/2016",566,3,"3215-5566","3215-2566","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","DELEGADO WALDIR","PR","GO","02/05/2016",645,4,"3215-5645","3215-2645","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","HELDER SALOMÃO","PT","ES","03/05/2016",573,3,"3215-5573","3215-2573","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","JORGINHO MELLO","PR","SC","02/05/2016",329,4,"3215-5329","3215-2329","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","MARGARIDA SALOMÃO","PT","MG","03/05/2016",236,4,"3215-5236","3215-2236","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","MARIA DO ROSÁRIO","PT","RS","03/05/2016",312,4,"3215-5312","3215-2312","Exma. Senhora Deputada"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","ODORICO MONTEIRO","PROS","CE","02/05/2016",582,3,"3215-5582","3215-2582","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","ORLANDO SILVA","PCdoB","SP","03/05/2016",923,4,"3215-5923","3215-2923","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","OSMAR SERRAGLIO","PMDB","PR","01/06/2016",845,4,"3215-5845","3215-2845","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","WILSON FILHO","PTB","PB","03/05/2016",534,4,"3215-5534","3215-2534","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PT/PSD/PR/PROS/PCdoB","Suplente","ZÉ CARLOS","PT","MA","03/05/2016",748,4,"3215-5748","3215-2748","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PTdoB","Titular","ALIEL MACHADO","REDE","PR","03/05/2016",480,3,"3215-5480","3215-2480","Exmo. Senhor Deputado"),
        array( "CE","Comissão de Educação","PTdoB","Suplente","CHICO ALENCAR","PSOL","RJ","03/05/2016",848,4,"3215-5848","3215-2848","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PDT","Titular","ROBERTO GÓES","PDT","AP","03/05/2016",462,4,"3215-5462","3215-2462","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PDT","Suplente","FLÁVIA MORAIS","PDT","GO","03/05/2016",738,4,"3215-5738","3215-2738","Exma. Senhora Deputada"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","AFONSO HAMM","PP","RS","03/05/2016",604,4,"3215-5604","3215-2604","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CÉSAR HALUM","PRB","TO","03/05/2016",422,4,"3215-5422","3215-2422","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DANRLEI DE DEUS HINTERHOLZ","PSD","RS","03/05/2016",566,3,"3215-5566","3215-2566","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DELEY","PTB","RJ","03/05/2016",742,4,"3215-5742","3215-2742","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDINHO BEZ","PMDB","SC","11/05/2016",703,4,"3215-5703","3215-2703","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FABIO REIS","PMDB","SE","03/05/2016",456,4,"3215-5456","3215-2456","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FERNANDO MONTEIRO","PP","PE","03/05/2016",282,3,"3215-5282","3215-2282","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HÉLIO LEITE","DEM","PA","03/05/2016",403,4,"3215-5403","3215-2403","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOÃO DERLY","REDE","RS","04/05/2016",901,4,"3215-5901","3215-2901","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MÁRCIO MARINHO","PRB","BA","03/05/2016",326,4,"3215-5326","3215-2326","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALTINEU CÔRTES","PMDB","RJ","03/05/2016",578,3,"3215-5578","3215-2578","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BENJAMIN MARANHÃO","SD","PB","02/05/2016",458,4,"3215-5458","3215-2458","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS EDUARDO CADOCA","PDT","PE","10/05/2016",718,4,"3215-5718","3215-2718","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CELSO JACOB","PMDB","RJ","01/08/2016",917,4,"3215-5917","3215-2917","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FAUSTO PINATO","PP","SP","06/06/2016",562,4,"3215-5562","3215-2562","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCUS VICENTE","PP","ES","03/05/2016",360,4,"3215-5360","3215-2360","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PEDRO CHAVES","PMDB","GO","03/05/2016",406,4,"3215-5406","3215-2406","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PEDRO FERNANDES","PTB","MA","03/05/2016",814,4,"3215-5814","3215-2814","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PROFESSORA DORINHA SEABRA REZENDE","DEM","TO","03/05/2016",432,4,"3215-5432","3215-2432","Exma. Senhora Deputada"),
        array( "CESPO","Comissão do Esporte","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RUBENS BUENO","PPS","PR","09/06/2016",623,4,"3215-5623","3215-2623","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Titular","JOÃO FERNANDO COUTINHO","PSB","PE","03/05/2016",567,3,32155567,32152567,"Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Titular","RAIMUNDO GOMES DE MATOS","PSDB","CE","03/05/2016",725,4,"3215-5725","3215-2725","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Titular","ROGÉRIO MARINHO","PSDB","RN","03/05/2016",446,4,"3215-5446","3215-2446","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Titular","VALADARES FILHO","PSB","SE","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Suplente","CARLOS SAMPAIO","PSDB","SP","03/05/2016",207,4,"3215-5207","3215-2207","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Suplente","GOULART","PSD","SP","03/05/2016",533,4,"3215-5533","3215-2533","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Suplente","MARCELO MATOS","PHS","RJ","03/05/2016",579,3,"3215-5579","3215-2579","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PSDB/PSB/PPS/PV","Suplente","SILVIO TORRES","PSDB","SP","03/05/2016",404,4,"3215-5404","3215-2404","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Titular","ANDRES SANCHEZ","PT","SP","03/05/2016",939,4,"3215-5939","3215-2939","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Titular","FÁBIO MITIDIERI","PSD","SE","03/05/2016",286,3,"3215-5286","3215-2286","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Titular","HIRAN GONÇALVES","PP","RR","02/05/2016",274,3,"3215-5274","3215-2274","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ AIRTON CIRILO","PT","CE","03/05/2016",319,4,"3215-5319","3215-2319","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ ROCHA","PR","BA","02/05/2016",908,4,"3215-5908","3215-2908","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Titular","ROBERTO ALVES","PRB","SP","03/05/2016",946,4,"3215-5946","3215-2946","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Suplente","ADELSON BARRETO","PR","SE","02/05/2016",937,4,"3215-5937","3215-2937","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Suplente","ARNALDO JORDY","PPS","PA","07/06/2016",506,4,"3215-5506","3215-2506","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Suplente","EVANDRO ROMAN","PSD","PR","03/05/2016",303,4,"3215-5303","3215-2303","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Suplente","LEO DE BRITO","PT","AC","03/05/2016",619,4,"3215-5619","3215-2619","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Suplente","RUBENS OTONI","PT","GO","03/05/2016",501,4,"3215-5501","3215-2501","Exmo. Senhor Deputado"),
        array( "CESPO","Comissão do Esporte","PT/PSD/PR/PROS/PCdoB","Suplente","VICENTE CANDIDO","PT","SP","03/05/2016",819,4,"3215-5819","3215-2819","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PDT","Suplente","ZECA DIRCEU","PT","PR","03/05/2016",613,4,"3215-5613","3215-2613","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANÍBAL GOMES","PMDB","CE","03/05/2016",731,4,"3215-5731","3215-2731","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FERNANDO FRANCISCHINI","SD","PR","02/05/2016",265,3,"3215-5265","3215-2265","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HUGO MOTTA","PMDB","PB","03/05/2016",237,4,"3215-5237","3215-2237","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NILTON CAPIXABA","PTB","RO","03/05/2016",724,4,"3215-5724","3215-2724","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PAUDERNEY AVELINO","DEM","AM","03/05/2016",610,4,"3215-5610","3215-2610","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SANDES JÚNIOR","PP","GO","27/07/2016",536,4,"3215-5536","3215-2536","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TONINHO WANDSCHEER","PROS","PR","03/05/2016",902,4,"3215-5902","3215-2902","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ANTONIO BULHÕES","PRB","SP","03/05/2016",327,4,"3215-5327","3215-2327","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","COVATTI FILHO","PP","RS","18/05/2016",228,4,"3215-5228","3215-2228","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DULCE MIRANDA","PMDB","TO","03/05/2016",530,4,"3215-5530","3215-2530","Exma. Senhora Deputada"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EDINHO BEZ","PMDB","SC","19/05/2016",703,4,"3215-5703","3215-2703","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EFRAIM FILHO","DEM","PB","06/06/2016",744,4,"3215-5744","3215-2744","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ESPERIDIÃO AMIN","PP","SC","03/05/2016",252,4,"3215-5252","3215-2252","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EZEQUIEL TEIXEIRA","PTN","RJ","03/05/2016",210,4,"3215-5210","3215-2210","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HILDO ROCHA","PMDB","MA","03/05/2016",734,4,"3215-5734","3215-2734","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VALTENIR PEREIRA","PMDB","MT","03/05/2016",913,4,"3215-5913","3215-2913","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WLADIMIR COSTA","SD","PA","02/05/2016",343,4,"3215-5343","3215-2343","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PSDB/PSB/PPS/PV","Titular","ALBERTO FILHO","PMDB","MA","03/05/2016",350,4,"3215-5350","3215-2350","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PSDB/PSB/PPS/PV","Titular","ULDURICO JUNIOR","PV","BA","03/05/2016",729,4,"3215-5729","3215-2729","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PSDB/PSB/PPS/PV","Suplente","EDIO LOPES","PR","RR","03/05/2016",408,4,"3215-5408","3215-2408","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PSDB/PSB/PPS/PV","Suplente","HEITOR SCHUCH","PSB","RS","03/05/2016",277,3,"3215-5277","3215-2277","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PSDB/PSB/PPS/PV","Suplente","IZALCI","PSDB","DF","03/05/2016",602,4,"3215-5602","3215-2602","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PSDB/PSB/PPS/PV","Suplente","VANDERLEI MACRIS","PSDB","SP","03/05/2016",348,4,"3215-5348","3215-2348","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","ADELMO CARNEIRO LEÃO","PT","MG","03/05/2016",231,4,"3215-5231","3215-2231","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","LEO DE BRITO","PT","AC","03/05/2016",619,4,"3215-5619","3215-2619","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","LINDOMAR GARÇON","PRB","RO","03/05/2016",548,4,"3215-5548","3215-2548","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","PAULÃO","PT","AL","03/05/2016",366,3,"3215-5366","3215-2366","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","PAULO PIMENTA","PT","RS","03/05/2016",552,4,"3215-5552","3215-2552","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","VINICIUS GURGEL","PR","AP","02/05/2016",852,4,"3215-5852","3215-2852","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Titular","WELLINGTON ROBERTO","PR","PB","01/08/2016",514,4,"3215-5514","3215-2514","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","EDMAR ARRUDA","PSD","PR","02/08/2016",962,4,"3215-5962","3215-2962","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","JORGE SOLLA","PT","BA","03/05/2016",571,3,"3215-5571","3215-2571","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ CLÁUDIO","PR","RO","02/05/2016",643,4,"3215-5643","3215-2643","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","MARCOS REATEGUI","PSD","AP","03/05/2016",344,4,"3215-5344","3215-2344","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","MOISÉS DINIZ","PCdoB","AC","22/08/2016",421,4,"3215-5421","3215-2421","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","PAULO FEIJÓ","PR","RJ","02/05/2016",336,4,"3215-5336","3215-2336","Exmo. Senhor Deputado"),
        array( "CFFC","Comissão de Fiscalização Financeira e Controle","PT/PSD/PR/PROS/PCdoB","Suplente","VICENTE CANDIDO","PT","SP","03/05/2016",819,4,"3215-5819","3215-2819","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PDT","Suplente","FÉLIX MENDONÇA JÚNIOR","PDT","BA","03/05/2016",912,4,"3215-5912","3215-2912","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ADEMIR CAMILO","PTN","MG","03/05/2016",556,4,"3215-5556","3215-2556","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALFREDO KAEFER","PSL","PR","03/05/2016",818,4,"3215-5818","3215-2818","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BENITO GAMA","PTB","BA","03/05/2016",414,4,"3215-5414","3215-2414","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS MELLES","DEM","MG","03/05/2016",243,4,"3215-5243","3215-2243","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDUARDO DA FONTE","PP","PE","03/05/2016",628,4,"3215-5628","3215-2628","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","FERNANDO MONTEIRO","PP","PE","03/05/2016",282,3,"3215-5282","3215-2282","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GIVALDO CARIMBÃO","PHS","AL","03/05/2016",732,4,"3215-5732","3215-2732","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HILDO ROCHA","PMDB","MA","03/05/2016",734,4,"3215-5734","3215-2734","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LELO COIMBRA","PMDB","ES","04/05/2016",801,4,"3215-5801","3215-2801","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LEONARDO QUINTÃO","PMDB","MG","03/05/2016",914,4,"3215-5914","3215-2914","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUCIO VIEIRA LIMA","PMDB","BA","03/05/2016",612,4,"3215-5612","3215-2612","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIZ FERNANDO FARIA","PP","MG","03/05/2016",832,4,"3215-5832","3215-2832","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MANOEL JUNIOR","PMDB","PB","03/05/2016",601,4,"3215-5601","3215-2601","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NEWTON CARDOSO JR","PMDB","MG","10/05/2016",932,4,"3215-5932","3215-2932","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PAULO AZI","DEM","BA","03/05/2016",635,4,"3215-5635","3215-2635","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RICARDO BARROS","PP","PR","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RONALDO BENEDET","PMDB","SC","03/05/2016",918,4,"3215-5918","3215-2918","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SIMONE MORGADO","PMDB","PA","03/05/2016",440,4,"3215-5440","3215-2440","Exma. Senhora Deputada"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ANDRE MOURA","PSC","SE","03/05/2016",846,4,"3215-5846","3215-2846","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS ANDRADE","PHS","RR","03/05/2016",758,4,"3215-5758","3215-2758","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DARCÍSIO PERONDI","PMDB","RS","04/05/2016",518,4,"3215-5518","3215-2518","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ELMAR NASCIMENTO","DEM","BA","18/05/2016",935,4,"3215-5935","3215-2935","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ESPERIDIÃO AMIN","PP","SC","03/05/2016",252,4,"3215-5252","3215-2252","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FÁBIO RAMALHO","PMDB","MG","03/05/2016",452,4,"3215-5452","3215-2452","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HÉLIO LEITE","DEM","PA","03/05/2016",403,4,"3215-5403","3215-2403","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JULIO LOPES","PP","RJ","03/05/2016",544,4,"3215-5544","3215-2544","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUCAS VERGILIO","SD","GO","31/05/2016",816,4,"3215-5816","3215-2816","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUIS CARLOS HEINZE","PP","RS","03/05/2016",526,4,"3215-5526","3215-2526","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAIA FILHO","PP","PI","03/05/2016",624,4,"3215-5624","3215-2624","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAURO PEREIRA","PMDB","RS","03/05/2016",843,4,"3215-5843","3215-2843","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MOSES RODRIGUES","PMDB","CE","03/05/2016",809,4,"3215-5809","3215-2809","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAUDERNEY AVELINO","DEM","AM","03/05/2016",610,4,"3215-5610","3215-2610","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAULO MALUF","PP","SP","24/05/2016",512,4,"3215-5512","3215-2512","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RENATA ABREU","PTN","SP","03/05/2016",726,4,"3215-5726","3215-2726","Exma. Senhora Deputada"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SORAYA SANTOS","PMDB","RJ","03/05/2016",352,4,"3215-5352","3215-2352","Exma. Senhora Deputada"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TIA ERON","PRB","BA","03/05/2016",618,4,"3215-5618","3215-2618","Exma. Senhora Deputada"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VALTENIR PEREIRA","PMDB","MT","19/05/2016",913,4,"3215-5913","3215-2913","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VINICIUS CARVALHO","PRB","SP","03/05/2016",356,4,"3215-5356","3215-2356","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Titular","JOÃO GUALBERTO","PSDB","BA","03/05/2016",358,4,"3215-5358","3215-2358","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Titular","KAIO MANIÇOBA","PMDB","PE","03/05/2016",525,4,"3215-5525","3215-2525","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Titular","LUIZ CARLOS HAULY","PSDB","PR","03/05/2016",220,4,"3215-5220","3215-2220","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Titular","RODRIGO MARTINS","PSB","PI","03/05/2016",558,4,"3215-5558","3215-2558","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Titular","SILVIO TORRES","PSDB","SP","03/05/2016",404,4,"3215-5404","3215-2404","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","ANTONIO CARLOS MENDES THAME","PV","SP","02/05/2016",915,4,"3215-5915","3215-2915","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","BEBETO","PSB","BA","03/05/2016",541,4,"3215-5541","3215-2541","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","BETINHO GOMES","PSDB","PE","03/05/2016",269,3,"3215-5269",32152269,"Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","EDUARDO CURY","PSDB","SP","03/05/2016",368,3,"3215-5368","3215-2368","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","GONZAGA PATRIOTA","PSB","PE","22/09/2016",430,4,"3215-5430","3215-2430","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","IZALCI","PSDB","DF","03/05/2016",602,4,"3215-5602","3215-2602","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","MARCUS PESTANA","PSDB","MG","03/05/2016",715,4,"3215-5715","3215-2715","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","NELSON MARCHEZAN JUNIOR","PSDB","RS","03/05/2016",250,4,"3215-5250","3215-2250","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSDB/PSB/PPS/PV","Suplente","TADEU ALENCAR","PSB","PE","03/05/2016",820,4,"3215-5820","3215-2820","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PSOL","Titular","EDMILSON RODRIGUES","PSOL","PA","03/05/2016",301,4,"3215-5301","3215-2301","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","AELTON FREITAS","PR","MG","02/05/2016",204,4,"3215-5204","3215-2204","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","AFONSO FLORENCE","PT","BA","03/05/2016",305,4,"3215-5305","3215-2305","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","ANDRES SANCHEZ","PT","SP","03/05/2016",939,4,"3215-5939","3215-2939","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","CABO SABINO","PR","CE","02/05/2016",617,4,"3215-5617","3215-2617","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","DAVI ALVES SILVA JÚNIOR","PR","MA","07/06/2016",202,4,"3215-5202","3215-2202","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","EDMAR ARRUDA","PSD","PR","02/08/2016",962,4,"3215-5962","3215-2962","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","ENIO VERRI","PT","PR","03/05/2016",472,3,"3215-5472","3215-2472","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","JOÃO CARLOS BACELAR","PR","BA","01/08/2016",928,4,"3215-5928","3215-2928","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","JOÃO PAULO KLEINÜBING","PSD","SC","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ GUIMARÃES","PT","CE","03/05/2016",306,4,"3215-5306","3215-2306","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","JÚLIO CESAR","PSD","PI","03/05/2016",944,4,"3215-5944","3215-2944","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","MENDONÇA FILHO","DEM","PE","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Titular","VICENTE CANDIDO","PT","SP","03/05/2016",819,4,"3215-5819","3215-2819","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","ASSIS CARVALHO","PT","PI","03/05/2016",909,4,"3215-5909","3215-2909","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","CÉSAR MESSIAS","PSB","AC","16/06/2016",956,4,"3215-5956","3215-2956","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","CHRISTIANE DE SOUZA YARED","PR","PR","02/05/2016",201,4,"3215-5201","3215-2201","Exma. Senhora Deputada"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","DELEGADO EDSON MOREIRA","PR","MG","02/05/2016",933,4,"3215-5933","3215-2933","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","DOMINGOS NETO","PSD","CE","03/05/2016",546,4,"3215-5546","3215-2546","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","EVAIR VIEIRA DE MELO","PV","ES","02/05/2016",443,4,"3215-5443","3215-2443","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","HELDER SALOMÃO","PT","ES","03/05/2016",573,3,"3215-5573","3215-2573","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","JERÔNIMO GOERGEN","PP","RS","03/05/2016",316,4,"3215-5316","3215-2316","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ MENTOR","PT","SP","03/05/2016",502,4,"3215-5502","3215-2502","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","MARCELO ÁLVARO ANTÔNIO","PR","MG","02/05/2016",824,4,"3215-5824","3215-2824","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","PAULO TEIXEIRA","PT","SP","23/05/2016",281,3,"3215-5281","3215-2281","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","PEDRO UCZAI","PT","SC","03/05/2016",229,4,"3215-5229","3215-2229","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","TAMPINHA","PSD","MT","12/09/2016",539,4,"3215-5539","3215-2539","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","PT/PSD/PR/PROS/PCdoB","Suplente","ZÉ CARLOS","PT","MA","03/05/2016",748,4,"3215-5748","3215-2748","Exmo. Senhor Deputado"),
        array( "CFT","Comissão de Finanças e Tributação","REDE","Titular","MIRO TEIXEIRA","REDE","RJ","03/05/2016",270,3,"3215-5270","3215-2270","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PDT","Titular","POMPEO DE MATTOS","PDT","RS","03/05/2016",704,4,"3215-5704","3215-2704","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PDT","Suplente","FLÁVIA MORAIS","PDT","GO","03/05/2016",738,4,"3215-5738","3215-2738","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DÂMINA PEREIRA","PSL","MG","11/05/2016",434,4,"3215-5434","3215-2434","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DELEY","PTB","RJ","15/06/2016",742,4,"3215-5742","3215-2742","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EROS BIONDINI","PROS","MG","15/06/2016",321,4,"3215-5321","3215-2321","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GEOVANIA DE SÁ","PSDB","SC","31/08/2016",606,4,"3215-5606","3215-2606","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOÃO MARCELO SOUZA","PMDB","MA","03/05/2016",639,4,"3215-5639","3215-2639","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LAURA CARNEIRO","PMDB","RJ","22/09/2016",382,3,"3215-5382","3215-2382","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIZ CARLOS RAMOS","PTN","RJ","03/05/2016",636,4,"3215-5636","3215-2636","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARINHA RAUPP","PMDB","RO","03/05/2016",614,4,"3215-5614","3215-2614","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CONCEIÇÃO SAMPAIO","PP","AM","04/05/2016",515,4,"3215-5515","3215-2515","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CRISTIANE BRASIL","PTB","RJ","11/05/2016",644,4,"3215-5644","3215-2644","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DULCE MIRANDA","PMDB","TO","11/05/2016",530,4,"3215-5530","3215-2530","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAIA FILHO","PP","PI","18/05/2016",624,4,"3215-5624","3215-2624","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCELO MATOS","PHS","RJ","08/06/2016",579,3,"3215-5579","3215-2579","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ROBERTO ALVES","PRB","SP","30/08/2016",946,4,"3215-5946","3215-2946","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PSDB/PSB/PPS/PV","Titular","CREUZA PEREIRA","PSB","PE","18/05/2016",662,4,"3215-5662","3215-2662","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PSDB/PSB/PPS/PV","Titular","GONZAGA PATRIOTA","PSB","PE","19/05/2016",430,4,"3215-5430","3215-2430","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PSDB/PSB/PPS/PV","Titular","LEANDRE","PV","PR","03/05/2016",454,4,"3215-5454","3215-2454","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PSDB/PSB/PPS/PV","Titular","ROBERTO DE LUCENA","PV","SP","03/05/2016",235,4,"3215-5235","3215-2235","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PSDB/PSB/PPS/PV","Suplente","GERALDO RESENDE","PSDB","MS","03/05/2016",905,4,"3215-5905","3215-2905","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PSDB/PSB/PPS/PV","Suplente","MARIANA CARVALHO","PSDB","RO","15/06/2016",508,4,"3215-5508","3215-2508","Exma. Senhora Deputada"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PT/PSD/PR/PROS/PCdoB","Titular","EDMAR ARRUDA","PSD","PR","30/08/2016",962,4,"3215-5962","3215-2962","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PT/PSD/PR/PROS/PCdoB","Titular","EVAIR VIEIRA DE MELO","PV","ES","03/05/2016",443,4,"3215-5443","3215-2443","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PT/PSD/PR/PROS/PCdoB","Titular","REGINALDO LOPES","PT","MG","03/05/2016",426,4,"3215-5426","3215-2426","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PT/PSD/PR/PROS/PCdoB","Titular","SARNEY FILHO","PV","MA","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CIDOSO","Comissão de Defesa dos Direitos da Pessoa Idosa","PT/PSD/PR/PROS/PCdoB","Suplente","MIGUEL LOMBARDI","PR","SP","03/05/2016",835,4,"3215-5835","3215-2835","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PDT","Titular","WILSON FILHO","PTB","PB","03/05/2016",534,4,"3215-5534","3215-2534","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PDT","Suplente","BETO SALAME","PP","PA","03/05/2016",473,3,"3215-5473","3215-2473","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALAN RICK","PRB","AC","03/05/2016",650,4,"3215-5650","3215-2650","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANDRÉ ABDON","PP","AP","03/05/2016",831,4,"3215-5831","3215-2831","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BETO ROSADO","PP","RN","03/05/2016",840,4,"3215-5840","3215-2840","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JÚLIA MARINHO","PSC","PA","03/05/2016",707,4,"3215-5707","3215-2707","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUCIO MOSQUINI","PMDB","RO","03/05/2016",581,3,"3215-5581","3215-2581","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCOS ABRÃO","PPS","GO","03/05/2016",375,3,"3215-5375","3215-2375","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARINHA RAUPP","PMDB","RO","03/05/2016",614,4,"3215-5614","3215-2614","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ZECA CAVALCANTI","PTB","PE","03/05/2016",318,4,"3215-5318","3215-2318","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ABEL MESQUITA JR.","DEM","RR","03/05/2016",248,4,"3215-5248","3215-2248","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ANDRÉ AMARAL","PMDB","PB","10/08/2016",833,4,"3215-5833","3215-2833","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CACÁ LEÃO","PP","BA","03/05/2016",320,4,"3215-5320","3215-2320","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ELCIONE BARBALHO","PMDB","PA","03/05/2016",919,4,"3215-5919","3215-2919","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JORGE BOEIRA","PP","SC","03/05/2016",342,4,"3215-5342","3215-2342","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAES LANDIM","PTB","PI","03/05/2016",648,4,"3215-5648","3215-2648","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PROFESSORA MARCIVANIA","PCdoB","AP","03/05/2016",338,4,"3215-5338","3215-2338","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SILAS CÂMARA","PRB","AM","03/05/2016",532,4,"3215-5532","3215-2532","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SIMONE MORGADO","PMDB","PA","04/05/2016",440,4,"3215-5440","3215-2440","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PSDB/PSB/PPS/PV","Titular","JANETE CAPIBERIBE","PSB","AP","03/05/2016",209,4,"3215-5209","3215-2209","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PSDB/PSB/PPS/PV","Titular","NILSON PINTO","PSDB","PA","03/05/2016",527,4,"3215-5527","3215-2527","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PSDB/PSB/PPS/PV","Titular","ROCHA","PSDB","AC","03/05/2016",607,4,"3215-5607","3215-2607","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PSDB/PSB/PPS/PV","Suplente","EDMILSON RODRIGUES","PSOL","PA","03/05/2016",301,4,"3215-5301","3215-2301","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PSDB/PSB/PPS/PV","Suplente","MARIA HELENA","PSB","RR","03/05/2016",410,4,"3215-5410","3215-2410","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PSDB/PSB/PPS/PV","Suplente","RICARDO TEOBALDO","PTN","PE","03/05/2016",603,4,"3215-5603","3215-2603","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Titular","ANGELIM","PT","AC","03/05/2016",543,4,"3215-5543","3215-2543","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Titular","ARNALDO JORDY","PPS","PA","03/05/2016",506,4,"3215-5506","3215-2506","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Titular","ÁTILA LINS","PSD","AM","03/05/2016",730,4,"3215-5730","3215-2730","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Titular","JÉSSICA SALES","PMDB","AC","02/05/2016",952,4,"3215-5952","3215-2952","Exma. Senhora Deputada"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Titular","SÁGUAS MORAES","PT","MT","03/05/2016",371,3,"3215-5371","3215-2371","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Titular","ZÉ GERALDO","PT","PA","03/05/2016",266,3,"3215-5266","3215-2266","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO DANIEL","PT","SE","03/05/2016",605,4,"3215-5605","3215-2605","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Suplente","JOAQUIM PASSARINHO","PSD","PA","03/05/2016",339,4,"3215-5339","3215-2339","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Suplente","LEO DE BRITO","PT","AC","03/05/2016",619,4,"3215-5619","3215-2619","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ CLÁUDIO","PR","RO","12/05/2016",643,4,"3215-5643","3215-2643","Exmo. Senhor Deputado"),
        array( "CINDRA","Comissão de Integração Nacional, Desenvolvimento Regional e da Amazônia","PT/PSD/PR/PROS/PCdoB","Suplente","REMÍDIO MONAI","PR","RR","02/05/2016",641,4,"3215-5641","3215-2641","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PDT","Titular","RONALDO LESSA","PDT","AL","03/05/2016",722,4,"3215-5722","3215-2722","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PDT","Suplente","ASSIS DO COUTO","PDT","PR","17/05/2016",428,4,"3215-5428","3215-2428","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALIEL MACHADO","REDE","PR","05/07/2016",480,3,"3215-5480","3215-2480","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANGELA ALBINO","PCdoB","SC","08/08/2016",609,4,"3215-5609","3215-2609","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GLAUBER BRAGA","PSOL","RJ","17/05/2016",362,4,"3215-5362","3215-2362","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LINCOLN PORTELA","PRB","MG","03/05/2016",615,4,"3215-5615","3215-2615","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIZ COUTO","PT","PB","03/05/2016",442,4,"3215-5442","3215-2442","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NELSON MARQUEZELLI","PTB","SP","03/05/2016",920,4,"3215-5920","3215-2920","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PASTOR LUCIANO BRAGA","PMB","BA","04/05/2016",467,3,"3215-5467","3215-2467","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CELSO JACOB","PMDB","RJ","01/08/2016",917,4,"3215-5917","3215-2917","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FÁBIO RAMALHO","PMDB","MG","04/05/2016",452,4,"3215-5452","3215-2452","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LEONARDO MONTEIRO","PT","MG","03/05/2016",922,4,"3215-5922","3215-2922","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARIA DO ROSÁRIO","PT","RS","05/07/2016",312,4,"3215-5312","3215-2312","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PSDB/PSB/PPS/PV","Titular","JANETE CAPIBERIBE","PSB","AP","03/05/2016",209,4,"3215-5209","3215-2209","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PSDB/PSB/PPS/PV","Titular","LUIZA ERUNDINA","PSOL","SP","03/05/2016",620,4,"3215-5620","3215-2620","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PSDB/PSB/PPS/PV","Suplente","ARNALDO JORDY","PPS","PA","03/05/2016",506,4,"3215-5506","3215-2506","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PSDB/PSB/PPS/PV","Suplente","CHICO ALENCAR","PSOL","RJ","31/05/2016",848,4,"3215-5848","3215-2848","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Titular","CHICO LOPES","PCdoB","CE","03/05/2016",310,4,"3215-5310","3215-2310","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Titular","JÔ MORAES","PCdoB","MG","04/05/2016",322,4,"3215-5322","3215-2322","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Titular","ORLANDO SILVA","PCdoB","SP","04/05/2016",923,4,"3215-5923","3215-2923","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Titular","PEDRO UCZAI","PT","SC","03/05/2016",229,4,"3215-5229","3215-2229","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Titular","RAQUEL MUNIZ","PSD","MG","03/05/2016",444,4,"3215-5444","3215-2444","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Suplente","BENEDITA DA SILVA","PT","RJ","03/05/2016",330,4,"3215-5330","3215-2330","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Suplente","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Suplente","JORGINHO MELLO","PR","SC","04/05/2016",329,4,"3215-5329","3215-2329","Exmo. Senhor Deputado"),
        array( "CLP","Comissão de Legislação Participativa","PT/PSD/PR/PROS/PCdoB","Suplente","PATRUS ANANIAS","PT","MG","31/05/2016",720,4,"3215-5720","3215-2720","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PDT","Titular","JOSUÉ BENGTSON","PTB","PA","03/05/2016",505,4,"3215-5505","3215-2505","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PDT","Suplente","ASSIS DO COUTO","PDT","PR","03/05/2016",428,4,"3215-5428","3215-2428","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ADILTON SACHETTI","PSB","MT","03/05/2016",374,3,"3215-5374","3215-2374","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","AUGUSTO CARVALHO","SD","DF","02/05/2016",215,4,"3215-5215","3215-2215","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HEITOR SCHUCH","PSB","RS","03/05/2016",277,3,"3215-5277","3215-2277","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MAURO PEREIRA","PMDB","RS","17/05/2016",843,4,"3215-5843","3215-2843","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROBERTO BALESTRA","PP","GO","03/05/2016",219,4,"3215-5219","3215-2219","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROBERTO SALES","PRB","RJ","03/05/2016",332,4,"3215-5332","3215-2332","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TONINHO PINHEIRO","PP","MG","03/05/2016",584,3,"3215-5584","3215-2584","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VALDIR COLATTO","PMDB","SC","03/05/2016",516,4,"3215-5516","3215-2516","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALCEU MOREIRA","PMDB","RS","03/05/2016",238,4,"3215-5238","3215-2238","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS GOMES","PRB","RS","03/05/2016",285,3,"3215-5285","3215-2285","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS MELLES","DEM","MG","03/05/2016",243,4,"3215-5243","3215-2243","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CELSO MALDANER","PMDB","SC","03/05/2016",311,4,"3215-5311","3215-2311","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FRANKLIN LIMA","PP","MG","03/05/2016",627,4,"3215-5627","3215-2627","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAES LANDIM","PTB","PI","13/07/2016",648,4,"3215-5648","3215-2648","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RICARDO IZAR","PP","SP","03/05/2016",634,4,"3215-5634","3215-2634","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ZÉ SILVA","SD","MG","02/05/2016",608,4,"3215-5608","3215-2608","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Titular","DANIEL COELHO","PSDB","PE","03/05/2016",813,4,"3215-5813","3215-2813","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Titular","LUIZ LAURO FILHO","PSB","SP","03/05/2016",519,4,"3215-5519","3215-2519","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Titular","RICARDO TRIPOLI","PSDB","SP","03/05/2016",241,4,"3215-5241","3215-2241","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Titular","RODRIGO MARTINS","PSB","PI","03/05/2016",558,4,"3215-5558","3215-2558","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Suplente","JÚLIO DELGADO","PSB","MG","03/05/2016",323,4,"3215-5323","3215-2323","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Suplente","MAX FILHO","PSDB","ES","03/05/2016",276,3,"3215-5276","3215-2276","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Suplente","NILSON LEITÃO","PSDB","MT","03/05/2016",825,4,"3215-5825","3215-2825","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PSDB/PSB/PPS/PV","Suplente","TEREZA CRISTINA","PSB","MS","03/05/2016",448,4,"3215-5448","3215-2448","Exma. Senhora Deputada"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Titular","GIVALDO VIEIRA","PT","ES","02/05/2016",805,4,"3215-5805","3215-2805","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Titular","LEONARDO MONTEIRO","PT","MG","03/05/2016",922,4,"3215-5922","3215-2922","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Titular","NILTO TATTO","PT","SP","03/05/2016",267,3,"3215-5267","3215-2267","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Titular","STEFANO AGUIAR","PSD","MG","03/05/2016",341,4,"3215-5341","3215-2341","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Titular","VICTOR MENDES","PSD","MA","02/05/2016",580,3,"3215-5580","3215-2580","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Suplente","ANTONIO CARLOS MENDES THAME","PV","SP","03/05/2016",915,4,"3215-5915","3215-2915","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Suplente","BILAC PINTO","PR","MG","03/05/2016",806,4,"3215-5806","3215-2806","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO DANIEL","PT","SE","03/05/2016",605,4,"3215-5605","3215-2605","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Suplente","MARCOS MONTES","PSD","MG","03/05/2016",334,4,"3215-5334","3215-2334","Exmo. Senhor Deputado"),
        array( "CMADS","Comissão de Meio Ambiente e Desenvolvimento Sustentável","PT/PSD/PR/PROS/PCdoB","Suplente","MARGARIDA SALOMÃO","PT","MG","03/05/2016",236,4,"3215-5236","3215-2236","Exma. Senhora Deputada"),
        array( "CME","Comissão de Minas e Energia","PDT","Titular","BETO SALAME","PP","PA","03/05/2016",473,3,"3215-5473","3215-2473","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PDT","Titular","LEÔNIDAS CRISTINO","PDT","CE","03/05/2016",948,4,"3215-5948","3215-2948","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PDT","Suplente","DAGOBERTO","PDT","MS","03/05/2016",654,4,"3215-5654","3215-2654","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PDT","Suplente","FÉLIX MENDONÇA JÚNIOR","PDT","BA","03/05/2016",912,4,"3215-5912","3215-2912","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ABEL MESQUITA JR.","DEM","RR","03/05/2016",248,4,"3215-5248","3215-2248","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALUISIO MENDES","PTN","MA","03/05/2016",931,4,"3215-5931","3215-2931","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BETO ROSADO","PP","RN","03/05/2016",840,4,"3215-5840","3215-2840","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CABUÇU BORGES","PMDB","AP","03/05/2016",380,3,"3215-5380","3215-2380","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS ANDRADE","PHS","RR","22/09/2016",758,4,"3215-5758","3215-2758","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CLAUDIO CAJADO","DEM","BA","03/05/2016",630,4,"3215-5630","3215-2630","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EFRAIM FILHO","DEM","PB","03/05/2016",744,4,"3215-5744","3215-2744","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GUILHERME MUSSI","PP","SP","03/05/2016",712,4,"3215-5712","3215-2712","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOSÉ OTÁVIO GERMANO","PP","RS","03/05/2016",424,4,"3215-5424","3215-2424","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOSÉ PRIANTE","PMDB","PA","03/05/2016",752,4,"3215-5752","3215-2752","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUCIO MOSQUINI","PMDB","RO","03/05/2016",581,3,"3215-5581","3215-2581","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MACEDO","PP","CE","03/05/2016",214,4,"3215-5214","3215-2214","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCELO SQUASSONI","PRB","SP","03/05/2016",550,4,"3215-5550","3215-2550","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCUS VICENTE","PP","ES","03/05/2016",360,4,"3215-5360","3215-2360","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SIMÃO SESSIM","PP","RJ","03/05/2016",709,4,"3215-5709","3215-2709","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TAKAYAMA","PSC","PR","03/05/2016",910,4,"3215-5910","3215-2910","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALTINEU CÔRTES","PMDB","RJ","03/05/2016",578,3,"3215-5578","3215-2578","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ANDRÉ ABDON","PP","AP","03/05/2016",831,4,"3215-5831","3215-2831","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","AUGUSTO CARVALHO","SD","DF","02/05/2016",215,4,"3215-5215","3215-2215","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CLEBER VERDE","PRB","MA","03/05/2016",710,4,"3215-5710","3215-2710","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DIMAS FABIANO","PP","MG","03/05/2016",325,4,"3215-5325","3215-2325","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EDINHO BEZ","PMDB","SC","11/05/2016",703,4,"3215-5703","3215-2703","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ERIVELTON SANTANA","PEN","BA","03/05/2016",756,4,"3215-5756","3215-2756","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EZEQUIEL FONSECA","PP","MT","23/05/2016",658,4,"3215-5658","3215-2658","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FERNANDO JORDÃO","PMDB","RJ","03/05/2016",626,4,"3215-5626","3215-2626","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FRANCISCO CHAPADINHA","PTN","PA","03/05/2016",385,3,"3215-5385","3215-2385","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JONY MARCOS","PRB","SE","22/06/2016",807,4,"3215-5807","3215-2807","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSÉ CARLOS ALELUIA","DEM","BA","03/05/2016",854,4,"3215-5854","3215-2854","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOZI ARAÚJO","PTN","AP","03/05/2016",309,4,"3215-5309","3215-2309","Exma. Senhora Deputada"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MÁRIO NEGROMONTE JR.","PP","BA","03/05/2016",517,4,"3215-5517","3215-2517","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MISSIONÁRIO JOSÉ OLIMPIO","DEM","SP","03/05/2016",507,4,"3215-5507","3215-2507","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NEWTON CARDOSO JR","PMDB","MG","03/05/2016",932,4,"3215-5932","3215-2932","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ROBERTO BALESTRA","PP","GO","03/05/2016",219,4,"3215-5219","3215-2219","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RONALDO BENEDET","PMDB","SC","04/05/2016",918,4,"3215-5918","3215-2918","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VICENTINHO JÚNIOR","PR","TO","03/05/2016",817,4,"3215-5817","3215-2817","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","ANTONIO CARLOS MENDES THAME","PV","SP","03/05/2016",915,4,"3215-5915","3215-2915","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","ARNALDO JORDY","PPS","PA","02/05/2016",506,4,"3215-5506","3215-2506","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","ARTHUR VIRGÍLIO BISNETO","PSDB","AM","03/05/2016",583,3,"3215-5583","3215-2583","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","FABIO GARCIA","PSB","MT","03/05/2016",278,3,"3215-5278","3215-2278","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","JOÃO CASTELO","PSDB","MA","03/05/2016",324,4,"3215-5324","3215-2324","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","JOSÉ REINALDO","PSB","MA","03/05/2016",529,4,"3215-5529","3215-2529","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","JOSE STÉDILE","PSB","RS","03/05/2016",354,4,"3215-5354","3215-2354","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","RAFAEL MOTTA","PSB","RN","03/05/2016",737,4,"3215-5737","3215-2737","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Titular","RODRIGO DE CASTRO","PSDB","MG","03/05/2016",701,4,"3215-5701","3215-2701","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","BEBETO","PSB","BA","03/05/2016",541,4,"3215-5541","3215-2541","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","CABO SABINO","PR","CE","03/05/2016",617,4,"3215-5617","3215-2617","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","CAIO NARCIO","PSDB","MG","03/05/2016",431,4,"3215-5431","3215-2431","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","DOMINGOS SÁVIO","PSDB","MG","03/05/2016",345,4,"3215-5345","3215-2345","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","EROS BIONDINI","PROS","MG","03/05/2016",321,4,"3215-5321","3215-2321","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","JOÃO FERNANDO COUTINHO","PSB","PE","03/05/2016",567,3,32155567,32152567,"Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","NELSON PADOVANI","PSDB","PR","03/05/2016",513,4,"3215-5513","3215-2513","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","PAULO ABI-ACKEL","PSDB","MG","03/05/2016",460,4,"3215-5460","3215-2460","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PSDB/PSB/PPS/PV","Suplente","TEREZA CRISTINA","PSB","MS","03/05/2016",448,4,"3215-5448","3215-2448","Exma. Senhora Deputada"),
        array( "CME","Comissão de Minas e Energia","PSOL","Suplente","SERGIO VIDIGAL","PDT","ES","03/05/2016",812,4,"3215-5812","3215-2812","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","EDIO LOPES","PR","RR","02/05/2016",408,4,"3215-5408","3215-2408","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","FERNANDO TORRES","PSD","BA","03/05/2016",642,4,"3215-5642","3215-2642","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","GABRIEL GUIMARÃES","PT","MG","03/05/2016",821,4,"3215-5821","3215-2821","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","JOAQUIM PASSARINHO","PSD","PA","03/05/2016",339,4,"3215-5339","3215-2339","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ ROCHA","PR","BA","02/05/2016",908,4,"3215-5908","3215-2908","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","MARCELO ÁLVARO ANTÔNIO","PR","MG","04/05/2016",824,4,"3215-5824","3215-2824","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","MARCOS MONTES","PSD","MG","03/05/2016",334,4,"3215-5334","3215-2334","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","PAULO FEIJÓ","PR","RJ","02/05/2016",336,4,"3215-5336","3215-2336","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","VANDER LOUBET","PT","MS","03/05/2016",838,4,"3215-5838","3215-2838","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Titular","ZÉ GERALDO","PT","PA","03/05/2016",266,3,"3215-5266","3215-2266","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","BILAC PINTO","PR","MG","02/05/2016",806,4,"3215-5806","3215-2806","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","CARLOS ZARATTINI","PT","SP","03/05/2016",808,4,"3215-5808","3215-2808","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","EVANDRO ROMAN","PSD","PR","03/05/2016",303,4,"3215-5303","3215-2303","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","IRAJÁ ABREU","PSD","TO","03/05/2016",802,4,"3215-5802","3215-2802","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO CARLOS BACELAR","PR","BA","02/05/2016",928,4,"3215-5928","3215-2928","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO PAULO KLEINÜBING","PSD","SC","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","JUNIOR MARRECA","PEN","MA","03/05/2016",537,4,"3215-5537","3215-2537","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ SÉRGIO","PT","RJ","04/05/2016",409,4,"3215-5409","3215-2409","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","MAGDA MOFATTO","PR","GO","02/05/2016",934,4,"3215-5934","3215-2934","Exma. Senhora Deputada"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","PAULO MAGALHÃES","PSD","BA","03/05/2016",903,4,"3215-5903","3215-2903","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","RUBENS PEREIRA JÚNIOR","PCdoB","MA","03/05/2016",574,3,"3215-5574","3215-2574","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","VALMIR PRASCIDELLI","PT","SP","03/05/2016",837,4,"3215-5837","3215-2837","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","WALNEY ROCHA","PEN","RJ","08/06/2016",585,3,"3215-5585","3215-2585","Exmo. Senhor Deputado"),
        array( "CME","Comissão de Minas e Energia","PT/PSD/PR/PROS/PCdoB","Suplente","WELLINGTON ROBERTO","PR","PB","04/05/2016",514,4,"3215-5514","3215-2514","Exmo. Senhor Deputado"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PDT","Titular","FLÁVIA MORAIS","PDT","GO","03/05/2016",738,4,"3215-5738","3215-2738","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PDT","Suplente","DÂMINA PEREIRA","PSL","MG","22/08/2016",434,4,"3215-5434","3215-2434","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ELCIONE BARBALHO","PMDB","PA","03/05/2016",919,4,"3215-5919","3215-2919","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","IRACEMA PORTELLA","PP","PI","03/05/2016",924,4,"3215-5924","3215-2924","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOZI ARAÚJO","PTN","AP","03/05/2016",309,4,"3215-5309","3215-2309","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LAURA CARNEIRO","PMDB","RJ","22/09/2016",382,3,"3215-5382","3215-2382","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUCAS VERGILIO","SD","GO","03/05/2016",816,4,"3215-5816","3215-2816","Exmo. Senhor Deputado"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PROFESSORA DORINHA SEABRA REZENDE","DEM","TO","03/05/2016",432,4,"3215-5432","3215-2432","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SORAYA SANTOS","PMDB","RJ","11/05/2016",352,4,"3215-5352","3215-2352","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CONCEIÇÃO SAMPAIO","PP","AM","04/05/2016",515,4,"3215-5515","3215-2515","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ELIZIANE GAMA","PPS","MA","03/05/2016",205,4,"3215-5205","3215-2205","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSI NUNES","PMDB","TO","04/05/2016",950,4,"3215-5950","3215-2950","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAGDA MOFATTO","PR","GO","03/05/2016",934,4,"3215-5934","3215-2934","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TIA ERON","PRB","BA","10/05/2016",618,4,"3215-5618","3215-2618","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PSDB/PSB/PPS/PV","Titular","KEIKO OTA","PSB","SP","03/05/2016",523,4,"3215-5523","3215-2523","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PSDB/PSB/PPS/PV","Titular","MARIA HELENA","PSB","RR","03/05/2016",410,4,"3215-5410","3215-2410","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PSDB/PSB/PPS/PV","Titular","MARIANA CARVALHO","PSDB","RO","03/05/2016",508,4,"3215-5508","3215-2508","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PSDB/PSB/PPS/PV","Titular","SHÉRIDAN","PSDB","RR","03/05/2016",246,4,"3215-5246","3215-2246","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PSDB/PSB/PPS/PV","Suplente","CREUZA PEREIRA","PSB","PE","18/05/2016",662,4,"3215-5662","3215-2662","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PSDB/PSB/PPS/PV","Suplente","DIEGO GARCIA","PHS","PR","04/05/2016",745,4,"3215-5745","3215-2745","Exmo. Senhor Deputado"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","ANA PERUGINI","PT","SP","03/05/2016",436,4,"3215-5436","3215-2436","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","GORETE PEREIRA","PR","CE","02/05/2016",206,4,"3215-5206","3215-2206","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","JANETE CAPIBERIBE","PSB","AP","05/07/2016",209,4,"3215-5209","3215-2209","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","MARIA DO ROSÁRIO","PT","RS","03/05/2016",312,4,"3215-5312","3215-2312","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","MOEMA GRAMACHO","PT","BA","12/05/2016",576,3,"3215-5576","3215-2576","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","RAQUEL MUNIZ","PSD","MG","06/06/2016",444,4,"3215-5444","3215-2444","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Titular","ZENAIDE MAIA","PR","RN","02/05/2016",439,4,"3215-5439","3215-2439","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Suplente","BENEDITA DA SILVA","PT","RJ","03/05/2016",330,4,"3215-5330","3215-2330","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Suplente","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZIANNE LINS","PT","CE","12/05/2016",713,4,"3215-5713","3215-2713","Exma. Senhora Deputada"),
        array( "CMULHER","Comissão de Defesa dos Direitos da Mulher","PT/PSD/PR/PROS/PCdoB","Suplente","MARCOS REATEGUI","PSD","AP","06/06/2016",344,4,"3215-5344","3215-2344","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PDT","Titular","SUBTENENTE GONZAGA","PDT","MG","03/05/2016",750,4,"3215-5750","3215-2750","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PDT","Suplente","ASSIS DO COUTO","PDT","PR","03/05/2016",428,4,"3215-5428","3215-2428","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ADAIL CARNEIRO","PP","CE","04/05/2016",335,4,"3215-5335","3215-2335","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DIEGO GARCIA","PHS","PR","03/05/2016",745,4,"3215-5745","3215-2745","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DR. JORGE SILVA","PHS","ES","03/05/2016",227,4,"3215-5227","3215-2227","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDUARDO BOLSONARO","PSC","SP","29/08/2016",481,3,"3215-5481","3215-2481","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MISAEL VARELLA","DEM","MG","03/05/2016",721,4,"3215-5721","3215-2721","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PROFESSOR VICTÓRIO GALLI","PSC","MT","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PROFESSORA DORINHA SEABRA REZENDE","DEM","TO","03/05/2016",432,4,"3215-5432","3215-2432","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","REMÍDIO MONAI","PR","RR","08/06/2016",641,4,"3215-5641","3215-2641","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROBERTO ALVES","PRB","SP","03/05/2016",946,4,"3215-5946","3215-2946","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARMEN ZANOTTO","PPS","SC","03/05/2016",240,4,"3215-5240","3215-2240","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CONCEIÇÃO SAMPAIO","PP","AM","04/05/2016",515,4,"3215-5515","3215-2515","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DELEY","PTB","RJ","03/05/2016",742,4,"3215-5742","3215-2742","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MANDETTA","DEM","MS","03/05/2016",577,3,"3215-5577","3215-2577","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PR. MARCO FELICIANO","PSC","SP","03/05/2016",254,4,"3215-5254","3215-2254","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PROFESSORA MARCIVANIA","PCdoB","AP","03/05/2016",338,4,"3215-5338","3215-2338","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SORAYA SANTOS","PMDB","RJ","31/05/2016",352,4,"3215-5352","3215-2352","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WILSON FILHO","PTB","PB","11/05/2016",534,4,"3215-5534","3215-2534","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PSDB/PSB/PPS/PV","Titular","EDUARDO BARBOSA","PSDB","MG","03/05/2016",540,4,"3215-1540","3215-2540","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PSDB/PSB/PPS/PV","Titular","OTAVIO LEITE","PSDB","RJ","03/05/2016",225,4,"3215-5225","3215-2225","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PSDB/PSB/PPS/PV","Titular","RODRIGO MARTINS","PSB","PI","03/05/2016",558,4,"3215-5558","3215-2558","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PSDB/PSB/PPS/PV","Titular","VALADARES FILHO","PSB","SE","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PSDB/PSB/PPS/PV","Suplente","GEOVANIA DE SÁ","PSDB","SC","06/09/2016",606,4,"3215-5606","3215-2606","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Titular","LUIZIANNE LINS","PT","CE","03/05/2016",713,4,"3215-5713","3215-2713","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Titular","MARIA DO ROSÁRIO","PT","RS","03/05/2016",312,4,"3215-5312","3215-2312","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Titular","RÔMULO GOUVEIA","PSD","PB","03/05/2016",411,4,"3215-5411","3215-2411","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Titular","RUBENS OTONI","PT","GO","03/05/2016",501,4,"3215-5501","3215-2501","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Titular","ZENAIDE MAIA","PR","RN","02/05/2016",439,4,"3215-5439","3215-2439","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Suplente","EDMAR ARRUDA","PSD","PR","02/08/2016",962,4,"3215-5962","3215-2962","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Suplente","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Suplente","ERIVELTON SANTANA","PEN","BA","18/05/2016",756,4,"3215-5756","3215-2756","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Suplente","MIGUEL LOMBARDI","PR","SP","02/05/2016",835,4,"3215-5835","3215-2835","Exmo. Senhor Deputado"),
        array( "CPD","Comissão de Defesa dos Direitos das Pessoas com Deficiência","PT/PSD/PR/PROS/PCdoB","Suplente","PEPE VARGAS","PT","RS","03/05/2016",858,4,"3215-5858","3215-2858","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PDT","Titular","ROBERTO GÓES","PDT","AP","03/05/2016",462,4,"3215-5462","3215-2462","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PDT","Suplente","SUBTENENTE GONZAGA","PDT","MG","03/05/2016",750,4,"3215-5750","3215-2750","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ARNON BEZERRA","PTB","CE","03/05/2016",413,4,"3215-5413","3215-2413","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BONIFÁCIO DE ANDRADA","PSDB","MG","03/05/2016",208,4,"3215-5208","3215-2208","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CLAUDIO CAJADO","DEM","BA","03/05/2016",630,4,"3215-5630","3215-2630","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EZEQUIEL FONSECA","PP","MT","23/05/2016",658,4,"3215-5658","3215-2658","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JARBAS VASCONCELOS","PMDB","PE","03/05/2016",304,4,"3215-5304","3215-2304","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCELO CASTRO","PMDB","PI","03/05/2016",811,4,"3215-5811","3215-2811","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MÁRCIO MARINHO","PRB","BA","03/05/2016",326,4,"3215-5326","3215-2326","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCUS VICENTE","PP","ES","03/05/2016",360,4,"3215-5360","3215-2360","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MOSES RODRIGUES","PMDB","CE","03/05/2016",809,4,"3215-5809","3215-2809","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","PASTOR EURICO","PHS","PE","03/05/2016",906,4,"3215-5906","3215-2906","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RICARDO TEOBALDO","PTN","PE","03/05/2016",603,4,"3215-5603","3215-2603","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RÔMULO GOUVEIA","PSD","PB","03/05/2016",411,4,"3215-5411","3215-2411","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROSANGELA GOMES","PRB","RJ","03/05/2016",438,4,"3215-5438","3215-2438","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TADEU ALENCAR","PSB","PE","03/05/2016",820,4,"3215-5820","3215-2820","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TAKAYAMA","PSC","PR","03/05/2016",910,4,"3215-5910","3215-2910","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BRUNO COVAS","PSDB","SP","03/05/2016",521,4,"3215-5521","3215-2521","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CABO DACIOLO","PTdoB","RJ","03/05/2016",803,4,"3215-5803","3215-2803","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS ANDRADE","PHS","RR","03/05/2016",758,4,"3215-5758","3215-2758","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CRISTIANE BRASIL","PTB","RJ","03/05/2016",644,4,"3215-5644","3215-2644","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DILCEU SPERAFICO","PP","PR","03/05/2016",746,4,"3215-5746","3215-2746","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JAIR BOLSONARO","PSC","RJ","03/05/2016",482,3,"3215-5482","3215-2482","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUIZ CARLOS BUSATO","PTB","RS","03/05/2016",570,3,"3215-5570","3215-2570","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAJOR OLIMPIO","SD","SP","02/05/2016",279,3,"3215-5279","3215-2279","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MORONI TORGAN","DEM","CE","03/05/2016",445,4,"3215-5445","3215-2445","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NELSON MARQUEZELLI","PTB","SP","03/05/2016",920,4,"3215-5920","3215-2920","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PAES LANDIM","PTB","PI","03/05/2016",648,4,"3215-5648","3215-2648","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SÁGUAS MORAES","PT","MT","03/05/2016",371,3,"3215-5371","3215-2371","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VALDIR COLATTO","PMDB","SC","03/05/2016",516,4,"3215-5516","3215-2516","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VANDERLEI MACRIS","PSDB","SP","03/05/2016",348,4,"3215-5348","3215-2348","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VINICIUS CARVALHO","PRB","SP","03/05/2016",356,4,"3215-5356","3215-2356","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Titular","BENITO GAMA","PTB","BA","03/05/2016",414,4,"3215-5414","3215-2414","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Titular","HERÁCLITO FORTES","PSB","PI","03/05/2016",708,4,"3215-5708","3215-2708","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Titular","LUIZ CARLOS HAULY","PSDB","PR","03/05/2016",220,4,"3215-5220","3215-2220","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Titular","MIGUEL HADDAD","PSDB","SP","18/05/2016",369,3,"3215-5369","3215-2369","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Titular","PEDRO VILELA","PSDB","AL","03/05/2016",705,4,"3215-5705","3215-2705","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Titular","RUBENS BUENO","PPS","PR","02/05/2016",623,4,"3215-5623","3215-2623","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Suplente","ÁTILA LIRA","PSB","PI","03/05/2016",640,4,"3215-5640","3215-2640","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Suplente","EDUARDO BARBOSA","PSDB","MG","18/05/2016",540,4,"3215-1540","3215-2540","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Suplente","JOÃO GUALBERTO","PSDB","BA","04/05/2016",358,4,"3215-5358","3215-2358","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Suplente","JUTAHY JUNIOR","PSDB","BA","03/05/2016",407,4,"3215-5407","3215-2407","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Suplente","MARIANA CARVALHO","PSDB","RO","18/05/2016",508,4,"3215-5508","3215-2508","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSDB/PSB/PPS/PV","Suplente","RAFAEL MOTTA","PSB","RN","08/06/2016",737,4,"3215-5737","3215-2737","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSOL","Titular","JEAN WYLLYS","PSOL","RJ","03/05/2016",646,4,"3215-5646","3215-2646","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PSOL","Suplente","DÉCIO LIMA","PT","SC","03/05/2016",218,4,"3215-5218","3215-2218","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","ARLINDO CHINAGLIA","PT","SP","03/05/2016",4,1,"3215-5966",32152966,"Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","ÁTILA LINS","PSD","AM","03/05/2016",730,4,"3215-5730","3215-2730","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","BRUNA FURLAN","PSDB","SP","03/05/2016",836,4,"3215-5836","3215-2836","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","CAPITÃO AUGUSTO","PR","SP","02/05/2016",273,3,"3215-5273","3215-2273","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","CARLOS ZARATTINI","PT","SP","03/05/2016",808,4,"3215-5808","3215-2808","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","HENRIQUE FONTANA","PT","RS","03/05/2016",256,4,"3215-5256","3215-2256","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","JEFFERSON CAMPOS","PSD","SP","03/05/2016",346,4,"3215-5346","3215-2346","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","JÔ MORAES","PCdoB","MG","03/05/2016",322,4,"3215-5322","3215-2322","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","MARCO MAIA","PT","RS","03/05/2016",28,1,"3215-5964","3215-2964","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Titular","ROBERTO FREIRE","PPS","SP","02/05/2016",242,4,"3215-5242","3215-2242","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","ANTONIO BRITO","PSD","BA","03/05/2016",479,3,"3215-5479","3215-2479","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","BENEDITA DA SILVA","PT","RJ","03/05/2016",330,4,"3215-5330","3215-2330","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","JANDIRA FEGHALI","PCdoB","RJ","03/05/2016",622,4,"3215-5622","3215-2622","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ NISHIMORI","PR","PR","02/05/2016",907,4,"3215-5907","3215-2907","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZ SÉRGIO","PT","RJ","03/05/2016",409,4,"3215-5409","3215-2409","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","NELSON PELLEGRINO","PT","BA","01/08/2016",826,4,"3215-5826","3215-2826","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","RONALDO LESSA","PDT","AL","02/05/2016",722,4,"3215-5722","3215-2722","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","SHÉRIDAN","PSDB","RR","18/05/2016",246,4,"3215-5246","3215-2246","Exma. Senhora Deputada"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","STEFANO AGUIAR","PSD","MG","23/05/2016",341,4,"3215-5341","3215-2341","Exmo. Senhor Deputado"),
        array( "CREDN","Comissão de Relações Exteriores e de Defesa Nacional","PT/PSD/PR/PROS/PCdoB","Suplente","VICENTE CANDIDO","PT","SP","03/05/2016",819,4,"3215-5819","3215-2819","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PDT","Titular","SUBTENENTE GONZAGA","PDT","MG","03/05/2016",750,4,"3215-5750","3215-2750","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PDT","Suplente","POMPEO DE MATTOS","PDT","RS","03/05/2016",704,4,"3215-5704","3215-2704","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALBERTO FRAGA","DEM","DF","03/05/2016",511,4,"3215-5511","3215-2511","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALEXANDRE BALDY","PTN","GO","03/05/2016",441,4,"3215-5441","3215-2441","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALEXANDRE LEITE","DEM","SP","03/05/2016",841,4,"3215-5841","3215-2841","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DELEGADO EDSON MOREIRA","PR","MG","03/05/2016",933,4,"3215-5933","3215-2933","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDUARDO BOLSONARO","PSC","SP","03/05/2016",481,3,"3215-5481","3215-2481","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EFRAIM FILHO","DEM","PB","03/05/2016",744,4,"3215-5744","3215-2744","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GIVALDO CARIMBÃO","PHS","AL","03/05/2016",732,4,"3215-5732","3215-2732","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","GUILHERME MUSSI","PP","SP","03/05/2016",712,4,"3215-5712","3215-2712","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOÃO CAMPOS","PRB","GO","03/05/2016",315,4,"3215-5315","3215-2315","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LAUDIVIO CARVALHO","SD","MG","04/05/2016",717,4,"3215-5717","3215-2717","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MAURO LOPES","PMDB","MG","19/05/2016",844,4,"3215-5844","3215-2844","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RONALDO MARTINS","PRB","CE","03/05/2016",568,3,"3215-5568","3215-2568","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","VITOR VALIM","PMDB","CE","03/05/2016",545,4,"3215-5545","3215-2545","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","WILSON FILHO","PTB","PB","03/05/2016",534,4,"3215-5534","3215-2534","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ADEMIR CAMILO","PTN","MG","03/05/2016",556,4,"3215-5556","3215-2556","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ARNALDO FARIA DE SÁ","PTB","SP","03/05/2016",929,4,"3215-5929","3215-2929","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CARLOS HENRIQUE GAGUIM","PTN","TO","03/05/2016",222,4,"3215-5222","3215-2222","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CELSO RUSSOMANNO","PRB","SP","03/05/2016",960,4,"3215-5960","3215-2960","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JAIR BOLSONARO","PSC","RJ","03/05/2016",482,3,"3215-5482","3215-2482","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LAURA CARNEIRO","PMDB","RJ","22/09/2016",382,3,"3215-5382","3215-2382","Exma. Senhora Deputada"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LINCOLN PORTELA","PRB","MG","03/05/2016",615,4,"3215-5615","3215-2615","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MOSES RODRIGUES","PMDB","CE","06/06/2016",809,4,"3215-5809","3215-2809","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","OSMAR TERRA","PMDB","RS","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","PASTOR EURICO","PHS","PE","03/05/2016",906,4,"3215-5906","3215-2906","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RENZO BRAZ","PP","MG","03/05/2016",736,4,"3215-5736","3215-2736","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Titular","CAPITÃO AUGUSTO","PR","SP","03/05/2016",273,3,"3215-5273","3215-2273","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Titular","EZEQUIEL TEIXEIRA","PTN","RJ","03/05/2016",210,4,"3215-5210","3215-2210","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Titular","GONZAGA PATRIOTA","PSB","PE","03/05/2016",430,4,"3215-5430","3215-2430","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Titular","KEIKO OTA","PSB","SP","03/05/2016",523,4,"3215-5523","3215-2523","Exma. Senhora Deputada"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Titular","PAULO MARTINS","PSDB","PR","03/05/2016",412,4,"3215-5412","3215-2412","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Titular","ROCHA","PSDB","AC","03/05/2016",607,4,"3215-5607","3215-2607","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Suplente","HUGO LEAL","PSB","RJ","03/05/2016",631,4,"3215-5631","3215-2631","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Suplente","NELSON MARCHEZAN JUNIOR","PSDB","RS","03/05/2016",250,4,"3215-5250","3215-2250","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Suplente","PEDRO VILELA","PSDB","AL","03/05/2016",705,4,"3215-5705","3215-2705","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Suplente","RONALDO BENEDET","PMDB","SC","03/05/2016",918,4,"3215-5918","3215-2918","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSDB/PSB/PPS/PV","Suplente","SEVERINO NINHO","PSB","PE","10/08/2016",314,4,"3215-5314","3215-2314","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSOL","Titular","FERNANDO FRANCISCHINI","SD","PR","05/07/2016",265,3,"3215-5265","3215-2265","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PSOL","Suplente","CABO DACIOLO","PTdoB","RJ","03/05/2016",803,4,"3215-5803","3215-2803","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","ALUISIO MENDES","PTN","MA","03/05/2016",931,4,"3215-5931","3215-2931","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","CABO SABINO","PR","CE","02/05/2016",617,4,"3215-5617","3215-2617","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","DELEGADO ÉDER MAURO","PSD","PA","03/05/2016",586,3,32155586,32152586,"Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","GILBERTO NASCIMENTO","PSC","SP","03/05/2016",834,4,"3215-5834","3215-2834","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","LAERTE BESSA","PR","DF","02/05/2016",340,4,"3215-5340","3215-2340","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","MORONI TORGAN","DEM","CE","03/05/2016",445,4,"3215-5445","3215-2445","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","ONYX LORENZONI","DEM","RS","03/05/2016",828,4,"3215-5828","3215-2828","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","PAULO FREIRE","PR","SP","03/05/2016",416,4,"3215-5416","3215-2416","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Titular","REGINALDO LOPES","PT","MG","03/05/2016",426,4,"3215-5426","3215-2426","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","DELEGADO WALDIR","PR","GO","02/05/2016",645,4,"3215-5645","3215-2645","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO RODRIGUES","PSD","SC","03/05/2016",503,4,"3215-5503","3215-2503","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ MENTOR","PT","SP","03/05/2016",502,4,"3215-5502","3215-2502","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","MAJOR OLIMPIO","SD","SP","04/05/2016",279,3,"3215-5279","3215-2279","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","MARCIO ALVINO","PR","SP","02/05/2016",331,4,"3215-5331","3215-2331","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","MARCOS REATEGUI","PSD","AP","03/05/2016",344,4,"3215-5344","3215-2344","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","RÔMULO GOUVEIA","PSD","PB","01/06/2016",411,4,"3215-5411","3215-2411","Exmo. Senhor Deputado"),
        array( "CSPCCO","Comissão de Segurança Pública e Combate ao Crime Organizado","PT/PSD/PR/PROS/PCdoB","Suplente","SILAS FREIRE","PR","PI","02/05/2016",484,3,"3215-5484","3215-2484","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PDT","Titular","MÁRIO HERINGER","PDT","MG","03/05/2016",211,4,"3215-5211","3215-2211","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PDT","Titular","POMPEO DE MATTOS","PDT","RS","03/05/2016",704,4,"3215-5704","3215-2704","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PDT","Suplente","FLÁVIA MORAIS","PDT","GO","03/05/2016",738,4,"3215-5738","3215-2738","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PDT","Suplente","SERGIO VIDIGAL","PDT","ES","03/05/2016",812,4,"3215-5812","3215-2812","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALEXANDRE SERFIOTIS","PMDB","RJ","03/05/2016",554,4,"3215-5554","3215-2554","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS GOMES","PRB","RS","03/05/2016",285,3,"3215-5285","3215-2285","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS MANATO","SD","ES","02/05/2016",313,4,"3215-5313","3215-2313","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CONCEIÇÃO SAMPAIO","PP","AM","03/05/2016",515,4,"3215-5515","3215-2515","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DARCÍSIO PERONDI","PMDB","RS","10/08/2016",518,4,"3215-5518","3215-2518","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DR. JORGE SILVA","PHS","ES","03/05/2016",227,4,"3215-5227","3215-2227","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DR. SINVAL MALHEIROS","PTN","SP","03/05/2016",520,4,"3215-5520","3215-2520","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DULCE MIRANDA","PMDB","TO","03/05/2016",530,4,"3215-5530","3215-2530","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HIRAN GONÇALVES","PP","RR","03/05/2016",274,3,"3215-5274","3215-2274","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JHONATAN DE JESUS","PRB","RR","03/05/2016",535,4,"3215-5535","3215-2535","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JOÃO MARCELO SOUZA","PMDB","MA","03/05/2016",639,4,"3215-5639","3215-2639","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LAURA CARNEIRO","PMDB","RJ","22/09/2016",382,3,"3215-5382","3215-2382","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MANDETTA","DEM","MS","15/07/2016",577,3,"3215-5577","3215-2577","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCELO BELINATI","PP","PR","03/05/2016",268,3,"3215-5268","3215-2268","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARX BELTRÃO","PMDB","AL","03/05/2016",474,3,"3215-5474","3215-2474","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MISAEL VARELLA","DEM","MG","03/05/2016",721,4,"3215-5721","3215-2721","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SARAIVA FELIPE","PMDB","MG","03/05/2016",429,4,"3215-5429","3215-2429","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SÉRGIO REIS","PRB","SP","10/05/2016",213,4,"3215-5213","3215-2213","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SÓSTENES CAVALCANTE","DEM","RJ","03/05/2016",560,4,"3215-5560","3215-2560","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","TONINHO PINHEIRO","PP","MG","03/05/2016",584,3,"3215-5584","3215-2584","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ZECA CAVALCANTI","PTB","PE","03/05/2016",318,4,"3215-5318","3215-2318","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ADAIL CARNEIRO","PP","CE","03/05/2016",335,4,"3215-5335","3215-2335","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","AFONSO HAMM","PP","RS","03/05/2016",604,4,"3215-5604","3215-2604","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ALAN RICK","PRB","AC","03/05/2016",650,4,"3215-5650","3215-2650","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ANTÔNIO JÁCOME","PTN","RN","03/05/2016",230,4,"3215-5230","3215-2230","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ARNALDO FARIA DE SÁ","PTB","SP","03/05/2016",929,4,"3215-5929","3215-2929","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ARNON BEZERRA","PTB","CE","03/05/2016",413,4,"3215-5413","3215-2413","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","CRISTIANE BRASIL","PTB","RJ","03/05/2016",644,4,"3215-5644","3215-2644","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","DIEGO GARCIA","PHS","PR","03/05/2016",745,4,"3215-5745","3215-2745","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FRANCISCO FLORIANO","DEM","RJ","03/05/2016",719,4,"3215-5719","3215-2719","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","HUGO MOTTA","PMDB","PB","03/05/2016",237,4,"3215-5237","3215-2237","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JORGE TADEU MUDALEN","DEM","SP","03/05/2016",538,4,"3215-5538","3215-2538","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JUSCELINO FILHO","DEM","MA","03/05/2016",370,3,"3215-5370","3215-2370","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUIZ CARLOS BUSATO","PTB","RS","03/05/2016",570,3,"3215-5570","3215-2570","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MACEDO","PP","CE","11/05/2016",214,4,"3215-5214","3215-2214","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCOS SOARES","DEM","RJ","03/05/2016",741,4,"3215-5741","3215-2741","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RENATO MOLLING","PP","RS","11/05/2016",337,4,"3215-5337","3215-2337","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RÔNEY NEMER","PP","DF","03/05/2016",572,3,"3215-5572","3215-2572","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SILAS CÂMARA","PRB","AM","03/05/2016",532,4,"3215-5532","3215-2532","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","TAKAYAMA","PSC","PR","03/05/2016",910,4,"3215-5910","3215-2910","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VALTENIR PEREIRA","PMDB","MT","03/05/2016",913,4,"3215-5913","3215-2913","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VITOR LIPPI","PSDB","SP","03/05/2016",823,4,"3215-5823","3215-2823","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WILSON FILHO","PTB","PB","03/05/2016",534,4,"3215-5534","3215-2534","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","CARMEN ZANOTTO","PPS","SC","02/05/2016",240,4,"3215-5240","3215-2240","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","CÉLIO SILVEIRA","PSDB","GO","06/06/2016",565,3,"3215-5565","3215-2565","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","EDUARDO BARBOSA","PSDB","MG","03/05/2016",540,4,"3215-1540","3215-2540","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","FLAVINHO","PSB","SP","03/05/2016",379,3,"3215-5379","3215-2379","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","GERALDO RESENDE","PSDB","MS","03/05/2016",905,4,"3215-5905","3215-2905","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","LEANDRE","PV","PR","03/05/2016",454,4,"3215-5454","3215-2454","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","LUCIANO DUCCI","PSB","PR","03/05/2016",427,4,"3215-5427","3215-2427","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","MARCUS PESTANA","PSDB","MG","03/05/2016",715,4,"3215-5715","3215-2715","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","PAULO FOLETTO","PSB","ES","03/05/2016",839,4,"3215-5839","3215-2839","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Titular","SHÉRIDAN","PSDB","RR","03/05/2016",246,4,"3215-5246","3215-2246","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","ARTHUR OLIVEIRA MAIA","PPS","BA","02/05/2016",830,4,"3215-5830","3215-2830","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","DANILO FORTE","PSB","CE","03/05/2016",384,3,"3215-5384","3215-2384","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","HEITOR SCHUCH","PSB","RS","03/05/2016",277,3,"3215-5277","3215-2277","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","JOÃO CAMPOS","PRB","GO","01/06/2016",315,4,"3215-5315","3215-2315","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","LOBBE NETO","PSDB","SP","03/05/2016",275,3,"3215-5275","3215-2275","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","MARIANA CARVALHO","PSDB","RO","03/05/2016",508,4,"3215-5508","3215-2508","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","PEDRO CUNHA LIMA","PSDB","PB","03/05/2016",611,4,"3215-5611","3215-2611","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","RAIMUNDO GOMES DE MATOS","PSDB","CE","03/05/2016",725,4,"3215-5725","3215-2725","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSDB/PSB/PPS/PV","Suplente","WELITON PRADO","PMB","MG","03/05/2016",862,4,"3215-5862","3215-2862","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSOL","Titular","JEAN WYLLYS","PSOL","RJ","03/05/2016",646,4,"3215-5646","3215-2646","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PSOL","Suplente","IVAN VALENTE","PSOL","SP","03/05/2016",716,4,"3215-5716","3215-2716","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","ADELSON BARRETO","PR","SE","03/05/2016",937,4,"3215-5937","3215-2937","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","ANTONIO BRITO","PSD","BA","03/05/2016",479,3,"3215-5479","3215-2479","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","ASSIS CARVALHO","PT","PI","03/05/2016",909,4,"3215-5909","3215-2909","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","BENEDITA DA SILVA","PT","RJ","03/05/2016",330,4,"3215-5330","3215-2330","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","BRUNNY","PR","MG","02/05/2016",260,4,"3215-5260","3215-2260","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","CHICO D'ANGELO","PT","RJ","03/05/2016",542,4,"3215-5542","3215-2542","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","CLARISSA GAROTINHO","PR","RJ","02/05/2016",714,4,"3215-5714","3215-2714","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","GEOVANIA DE SÁ","PSDB","SC","22/09/2016",606,4,"3215-5606","3215-2606","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","GIOVANI CHERINI","PR","RS","03/05/2016",468,3,"3215-5468",32152468,"Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","JANDIRA FEGHALI","PCdoB","RJ","03/05/2016",622,4,"3215-5622","3215-2622","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","JORGE SOLLA","PT","BA","03/05/2016",571,3,"3215-5571","3215-2571","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","MIGUEL LOMBARDI","PR","SP","02/05/2016",835,4,"3215-5835","3215-2835","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","ODORICO MONTEIRO","PROS","CE","02/05/2016",582,3,"3215-5582","3215-2582","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","PEPE VARGAS","PT","RS","03/05/2016",858,4,"3215-5858","3215-2858","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Titular","ZENAIDE MAIA","PR","RN","02/05/2016",439,4,"3215-5439","3215-2439","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","ADELMO CARNEIRO LEÃO","PT","MG","03/05/2016",231,4,"3215-5231","3215-2231","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","ARLINDO CHINAGLIA","PT","SP","03/05/2016",4,1,"3215-5966",32152966,"Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","CHRISTIANE DE SOUZA YARED","PR","PR","02/05/2016",201,4,"3215-5201","3215-2201","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","DR. JOÃO","PR","RJ","02/05/2016",911,4,"3215-5911","3215-2911","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","ELI CORRÊA FILHO","DEM","SP","15/06/2016",850,4,"3215-5850","3215-2850","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","FÁBIO MITIDIERI","PSD","SE","03/05/2016",286,3,"3215-5286","3215-2286","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","HENRIQUE FONTANA","PT","RS","03/05/2016",256,4,"3215-5256","3215-2256","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","JÔ MORAES","PCdoB","MG","03/05/2016",322,4,"3215-5322","3215-2322","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","JOÃO PAULO KLEINÜBING","PSD","SC","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","RAQUEL MUNIZ","PSD","MG","02/05/2016",444,4,"3215-5444","3215-2444","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","RÔMULO GOUVEIA","PSD","PB","03/05/2016",411,4,"3215-5411","3215-2411","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","SÁGUAS MORAES","PT","MT","03/05/2016",371,3,"3215-5371","3215-2371","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","SILAS FREIRE","PR","PI","02/05/2016",484,3,"3215-5484","3215-2484","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PT/PSD/PR/PROS/PCdoB","Suplente","ZECA DIRCEU","PT","PR","03/05/2016",613,4,"3215-5613","3215-2613","Exmo. Senhor Deputado"),
        array( "CSSF","Comissão de Seguridade Social e Família","PTdoB","Titular","ANGELA ALBINO","PCdoB","SC","03/08/2016",609,4,"3215-5609","3215-2609","Exma. Senhora Deputada"),
        array( "CSSF","Comissão de Seguridade Social e Família","PTdoB","Suplente","ROSANGELA GOMES","PRB","RJ","03/05/2016",438,4,"3215-5438","3215-2438","Exma. Senhora Deputada"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PDT","Titular","WOLNEY QUEIROZ","PDT","PE","03/05/2016",936,4,"3215-5936","3215-2936","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PDT","Suplente","JORGE CÔRTE REAL","PTB","PE","03/05/2016",621,4,"3215-5621","3215-2621","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ANDRÉ FIGUEIREDO","PDT","CE","18/05/2016",940,4,"3215-5940","3215-2940","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","AUGUSTO COUTINHO","SD","PE","03/05/2016",373,3,"3215-5373","3215-2373","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BENJAMIN MARANHÃO","SD","PB","03/05/2016",458,4,"3215-5458","3215-2458","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","DANIEL VILELA","PMDB","GO","03/05/2016",471,3,"3215-5471","3215-2471","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIZ CARLOS BUSATO","PTB","RS","03/05/2016",570,3,"3215-5570","3215-2570","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NIVALDO ALBUQUERQUE","PRP","AL","06/07/2016",425,4,"3215-5425","3215-2425","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ORLANDO SILVA","PCdoB","SP","03/05/2016",923,4,"3215-5923","3215-2923","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RÔNEY NEMER","PP","DF","03/05/2016",572,3,"3215-5572","3215-2572","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SILVIO COSTA","PTdoB","PE","03/05/2016",417,4,"3215-5417","3215-2417","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","WALNEY ROCHA","PEN","RJ","11/07/2016",585,3,"3215-5585","3215-2585","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ADEMIR CAMILO","PTN","MG","03/05/2016",556,4,"3215-5556","3215-2556","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EFRAIM FILHO","DEM","PB","03/05/2016",744,4,"3215-5744","3215-2744","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSÉ OTÁVIO GERMANO","PP","RS","03/05/2016",424,4,"3215-5424","3215-2424","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOVAIR ARANTES","PTB","GO","03/05/2016",504,4,"3215-5504","3215-2504","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JUNIOR MARRECA","PEN","MA","11/07/2016",537,4,"3215-5537","3215-2537","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LELO COIMBRA","PMDB","ES","10/05/2016",801,4,"3215-5801","3215-2801","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUCAS VERGILIO","SD","GO","03/05/2016",816,4,"3215-5816","3215-2816","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RICARDO BARROS","PP","PR","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","VITOR VALIM","PMDB","CE","03/05/2016",545,4,"3215-5545","3215-2545","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WLADIMIR COSTA","SD","PA","03/05/2016",343,4,"3215-5343","3215-2343","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Titular","BEBETO","PSB","BA","03/05/2016",541,4,"3215-5541","3215-2541","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Titular","CARLOS EDUARDO CADOCA","PDT","PE","04/05/2016",718,4,"3215-5718","3215-2718","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Titular","FLÁVIA MORAIS","PDT","GO","03/05/2016",738,4,"3215-5738","3215-2738","Exma. Senhora Deputada"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Suplente","ARTHUR OLIVEIRA MAIA","PPS","BA","04/05/2016",830,4,"3215-5830","3215-2830","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Suplente","FÁBIO SOUSA","PSDB","GO","03/05/2016",271,3,"3215-5271","3215-2271","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Suplente","MARIA HELENA","PSB","RR","03/05/2016",410,4,"3215-5410","3215-2410","Exma. Senhora Deputada"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSDB/PSB/PPS/PV","Suplente","NELSON MARCHEZAN JUNIOR","PSDB","RS","11/05/2016",250,4,"3215-5250","3215-2250","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PSL","Suplente","ALFREDO KAEFER","PSL","PR","18/05/2016",818,4,"3215-5818","3215-2818","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","DANIEL ALMEIDA","PCdoB","BA","03/05/2016",317,4,"3215-5317","3215-2317","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","ERIKA KOKAY","PT","DF","03/05/2016",203,4,"3215-5203","3215-2203","Exma. Senhora Deputada"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","FÁBIO MITIDIERI","PSD","SE","03/05/2016",286,3,"3215-5286","3215-2286","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","GORETE PEREIRA","PR","CE","02/05/2016",206,4,"3215-5206","3215-2206","Exma. Senhora Deputada"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","NELSON PELLEGRINO","PT","BA","01/08/2016",826,4,"3215-5826","3215-2826","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","ROBERTO DE LUCENA","PV","SP","14/06/2016",235,4,"3215-5235","3215-2235","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Titular","VICENTINHO","PT","SP","03/05/2016",740,4,"3215-5740","3215-2740","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","ALICE PORTUGAL","PCdoB","BA","03/05/2016",420,4,"3215-5420","3215-2420","Exma. Senhora Deputada"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","CABO SABINO","PR","CE","02/05/2016",617,4,"3215-5617","3215-2617","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","CAPITÃO AUGUSTO","PR","SP","02/05/2016",273,3,"3215-5273","3215-2273","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","GEORGE HILTON","PROS","MG","04/05/2016",804,4,"3215-5804","3215-2804","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","LEONARDO MONTEIRO","PT","MG","03/05/2016",922,4,"3215-5922","3215-2922","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","VALMIR PRASCIDELLI","PT","SP","03/05/2016",837,4,"3215-5837","3215-2837","Exmo. Senhor Deputado"),
        array( "CTASP","Comissão de Trabalho, de Administração e Serviço Público","PT/PSD/PR/PROS/PCdoB","Suplente","ZÉ CARLOS","PT","MA","03/05/2016",748,4,"3215-5748","3215-2748","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PDT","Suplente","HISSA ABRAHÃO","PDT","AM","03/05/2016",272,3,"3215-5272","3215-2272","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ADALBERTO CAVALCANTI","PTB","PE","03/05/2016",402,4,"3215-5402","3215-2402","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ALEX MANENTE","PPS","SP","03/05/2016",245,4,"3215-5245","3215-2245","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BEBETO","PSB","BA","03/05/2016",541,4,"3215-5541","3215-2541","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS EDUARDO CADOCA","PDT","PE","04/05/2016",718,4,"3215-5718","3215-2718","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CARLOS MANATO","SD","ES","03/05/2016",313,4,"3215-5313","3215-2313","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","HERCULANO PASSOS","PSD","SP","03/05/2016",926,4,"3215-5926","3215-2926","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MAURO LOPES","PMDB","MG","03/05/2016",844,4,"3215-5844","3215-2844","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MOSES RODRIGUES","PMDB","CE","03/05/2016",809,4,"3215-5809","3215-2809","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RENATO MOLLING","PP","RS","03/05/2016",337,4,"3215-5337","3215-2337","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","EVAIR VIEIRA DE MELO","PV","ES","03/05/2016",443,4,"3215-5443","3215-2443","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOÃO MARCELO SOUZA","PMDB","MA","03/05/2016",639,4,"3215-5639","3215-2639","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LAERCIO OLIVEIRA","SD","SE","03/05/2016",629,4,"3215-5629","3215-2629","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARQUINHO MENDES","PMDB","RJ","10/05/2016",302,4,"3215-5302","3215-2302","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MAURO MARIANI","PMDB","SC","03/05/2016",925,4,"3215-5925","3215-2925","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","NELSON MEURER","PP","PR","04/05/2016",916,4,"3215-5916","3215-2916","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ROBERTO BRITTO","PP","BA","03/05/2016",733,4,"3215-5733","3215-2733","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RUBENS BUENO","PPS","PR","18/05/2016",623,4,"3215-5623","3215-2623","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WALTER ALVES","PMDB","RN","10/05/2016",435,4,"3215-5435","3215-2435","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PSDB/PSB/PPS/PV","Titular","CARLOS SAMPAIO","PSDB","SP","03/05/2016",207,4,"3215-5207","3215-2207","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PSDB/PSB/PPS/PV","Titular","FABIO GARCIA","PSB","MT","03/05/2016",278,3,"3215-5278","3215-2278","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PSDB/PSB/PPS/PV","Titular","JOÃO GUALBERTO","PSDB","BA","03/05/2016",358,4,"3215-5358","3215-2358","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PSDB/PSB/PPS/PV","Titular","RAFAEL MOTTA","PSB","RN","03/05/2016",737,4,"3215-5737","3215-2737","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PSDB/PSB/PPS/PV","Suplente","OTAVIO LEITE","PSDB","RJ","03/05/2016",225,4,"3215-5225","3215-2225","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PSDB/PSB/PPS/PV","Suplente","VALADARES FILHO","PSB","SE","03/05/2016","","","","","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ AIRTON CIRILO","PT","CE","03/05/2016",319,4,"3215-5319","3215-2319","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Titular","JOSÉ NUNES","PSD","BA","12/05/2016",728,4,"3215-5728","3215-2728","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Titular","MAGDA MOFATTO","PR","GO","02/05/2016",934,4,"3215-5934","3215-2934","Exma. Senhora Deputada"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Titular","ROBERTO DE LUCENA","PV","SP","03/05/2016",235,4,"3215-5235","3215-2235","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Titular","RUBENS OTONI","PT","GO","03/05/2016",501,4,"3215-5501","3215-2501","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Titular","SÉRGIO BRITO","PSD","BA","03/05/2016",638,4,"3215-5638","3215-2638","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Suplente","EDINHO BEZ","PMDB","SC","01/06/2016",703,4,"3215-5703","3215-2703","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Suplente","GOULART","PSD","SP","11/05/2016",533,4,"3215-5533","3215-2533","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ MENTOR","PT","SP","03/05/2016",502,4,"3215-5502","3215-2502","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ ROCHA","PR","BA","02/05/2016",908,4,"3215-5908","3215-2908","Exmo. Senhor Deputado"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Suplente","LUIZIANNE LINS","PT","CE","03/05/2016",713,4,"3215-5713","3215-2713","Exma. Senhora Deputada"),
        array( "CTUR","Comissão de Turismo","PT/PSD/PR/PROS/PCdoB","Suplente","MARCIO ALVINO","PR","SP","02/05/2016",331,4,"3215-5331","3215-2331","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PDT","Titular","ALEXANDRE VALLE","PR","RJ","03/05/2016",587,3,"3215-5587",32152587,"Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PDT","Titular","MARQUINHO MENDES","PMDB","RJ","03/05/2016",302,4,"3215-5302","3215-2302","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PDT","Suplente","ARNALDO FARIA DE SÁ","PTB","SP","03/05/2016",929,4,"3215-5929","3215-2929","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PDT","Suplente","LEÔNIDAS CRISTINO","PDT","CE","03/05/2016",948,4,"3215-5948","3215-2948","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","BOSCO COSTA","PROS","SE","09/08/2016",660,4,"3215-5660","3215-2660","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","CLEBER VERDE","PRB","MA","03/05/2016",710,4,"3215-5710","3215-2710","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDINHO ARAÚJO","PMDB","SP","03/05/2016",418,4,"3215-5418","3215-2418","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EDINHO BEZ","PMDB","SC","11/05/2016",703,4,"3215-5703","3215-2703","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ELCIONE BARBALHO","PMDB","PA","03/05/2016",919,4,"3215-5919","3215-2919","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","EZEQUIEL FONSECA","PP","MT","23/05/2016",658,4,"3215-5658","3215-2658","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JULIO LOPES","PP","RJ","03/05/2016",544,4,"3215-5544","3215-2544","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","JUSCELINO FILHO","DEM","MA","03/05/2016",370,3,"3215-5370","3215-2370","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LAUDIVIO CARVALHO","SD","MG","03/05/2016",717,4,"3215-5717","3215-2717","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","LUIZ CARLOS RAMOS","PTN","RJ","03/05/2016",636,4,"3215-5636","3215-2636","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARCELO MATOS","PHS","RJ","03/05/2016",579,3,"3215-5579","3215-2579","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MARINHA RAUPP","PMDB","RO","03/05/2016",614,4,"3215-5614","3215-2614","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","MAURO LOPES","PMDB","MG","03/05/2016",844,4,"3215-5844","3215-2844","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","NELSON MARQUEZELLI","PTB","SP","22/08/2016",920,4,"3215-5920","3215-2920","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RENZO BRAZ","PP","MG","03/05/2016",736,4,"3215-5736","3215-2736","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROBERTO BRITTO","PP","BA","03/05/2016",733,4,"3215-5733","3215-2733","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","ROBERTO SALES","PRB","RJ","03/05/2016",332,4,"3215-5332","3215-2332","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","RONALDO CARLETTO","PP","BA","03/05/2016",262,4,"3215-5262","3215-2262","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","SÉRGIO MORAES","PTB","RS","03/05/2016",258,4,"3215-5258","3215-2258","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Titular","WASHINGTON REIS","PMDB","RJ","03/05/2016",856,4,"3215-5856","3215-2856","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","ADALBERTO CAVALCANTI","PTB","PE","03/05/2016",402,4,"3215-5402","3215-2402","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","AUREO","SD","RJ","02/05/2016",212,4,"3215-5212","3215-2212","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","BENJAMIN MARANHÃO","SD","PB","03/05/2016",458,4,"3215-5458","3215-2458","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FÁBIO RAMALHO","PMDB","MG","03/05/2016",452,4,"3215-5452","3215-2452","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FAUSTO PINATO","PP","SP","03/05/2016",562,4,"3215-5562","3215-2562","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","FLAVIANO MELO","PMDB","AC","03/05/2016",224,4,"3215-5224","3215-2224","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSÉ REINALDO","PSB","MA","03/05/2016",529,4,"3215-5529","3215-2529","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JOSI NUNES","PMDB","TO","31/05/2016",950,4,"3215-5950","3215-2950","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","JÚLIA MARINHO","PSC","PA","03/05/2016",707,4,"3215-5707","3215-2707","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUCIO MOSQUINI","PMDB","RO","03/05/2016",581,3,"3215-5581","3215-2581","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","LUIS TIBÉ","PTdoB","MG","17/05/2016",632,4,"3215-5632","3215-2632","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCELO SQUASSONI","PRB","SP","03/05/2016",550,4,"3215-5550","3215-2550","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARCOS ROGÉRIO","DEM","RO","09/08/2016",930,4,"3215-5930","3215-2930","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MÁRIO NEGROMONTE JR.","PP","BA","03/05/2016",517,4,"3215-5517","3215-2517","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MARX BELTRÃO","PMDB","AL","03/05/2016",474,3,"3215-5474","3215-2474","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","MISAEL VARELLA","DEM","MG","03/05/2016",721,4,"3215-5721","3215-2721","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","RICARDO IZAR","PP","SP","03/05/2016",634,4,"3215-5634","3215-2634","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","SIMÃO SESSIM","PP","RJ","03/05/2016",709,4,"3215-5709","3215-2709","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PMDB/PP/PTB/DEM/PRB/SD/PSC/PHS/PTN/PMN/PRP/PSDC/PEN/PRTB","Suplente","WALTER ALVES","PMDB","RN","03/05/2016",435,4,"3215-5435","3215-2435","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","DR. JOÃO","PR","RJ","02/05/2016",911,4,"3215-5911","3215-2911","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","GONZAGA PATRIOTA","PSB","PE","03/05/2016",430,4,"3215-5430","3215-2430","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","HUGO LEAL","PSB","RJ","20/06/2016",631,4,"3215-5631","3215-2631","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","MAURO MARIANI","PMDB","SC","03/05/2016",925,4,"3215-5925","3215-2925","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","REMÍDIO MONAI","PR","RR","03/05/2016",641,4,"3215-5641","3215-2641","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","SILAS FREIRE","PR","PI","03/05/2016",484,3,"3215-5484","3215-2484","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","TENENTE LÚCIO","PSB","MG","03/05/2016",239,4,"3215-5239","3215-2239","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Titular","VANDERLEI MACRIS","PSDB","SP","03/05/2016",348,4,"3215-5348","3215-2348","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","DELEGADO EDSON MOREIRA","PR","MG","02/05/2016",933,4,"3215-5933","3215-2933","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","GIUSEPPE VECCI","PSDB","GO","15/06/2016",383,3,"3215-5383","3215-2383","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","JOÃO PAULO PAPA","PSDB","SP","03/05/2016",476,3,"3215-5476","3215-2476","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","JOSE STÉDILE","PSB","RS","03/05/2016",354,4,"3215-5354","3215-2354","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","LEOPOLDO MEYER","PSB","PR","03/05/2016",233,4,"3215-5233","3215-2233","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","MARINALDO ROSENDO","PSB","PE","03/05/2016",827,4,"3215-5827","3215-2827","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSDB/PSB/PPS/PV","Suplente","MIGUEL HADDAD","PSDB","SP","03/05/2016",369,3,"3215-5369","3215-2369","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PSOL","Suplente","FABIO GARCIA","PSB","MT","03/05/2016",278,3,"3215-5278","3215-2278","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","ALTINEU CÔRTES","PMDB","RJ","03/05/2016",578,3,"3215-5578","3215-2578","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","CAJAR NARDES","PR","RS","19/05/2016",625,4,"3215-5625","3215-2625","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","CHRISTIANE DE SOUZA YARED","PR","PR","02/05/2016",201,4,"3215-5201","3215-2201","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","DANRLEI DE DEUS HINTERHOLZ","PSD","RS","03/05/2016",566,3,"3215-5566","3215-2566","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","DIEGO ANDRADE","PSD","MG","03/05/2016",307,4,"3215-5307","3215-2307","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","FERNANDO JORDÃO","PMDB","RJ","03/05/2016",626,4,"3215-5626","3215-2626","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","GOULART","PSD","SP","03/05/2016",533,4,"3215-5533","3215-2533","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","HERMES PARCIANELLO","PMDB","PR","03/05/2016",234,4,"3215-5234","3215-2234","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","LUIZ SÉRGIO","PT","RJ","04/05/2016",409,4,"3215-5409","3215-2409","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","MARCIO ALVINO","PR","SP","02/05/2016",331,4,"3215-5331","3215-2331","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","MILTON MONTI","PR","SP","02/05/2016",328,4,"3215-5328","3215-2328","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Titular","VICENTINHO JÚNIOR","PR","TO","03/05/2016",817,4,"3215-5817","3215-2817","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","ALFREDO NASCIMENTO","PR","AM","03/05/2016",401,4,"3215-5401","3215-2401","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","CLARISSA GAROTINHO","PR","RJ","02/05/2016",714,4,"3215-5714","3215-2714","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","DELEY","PTB","RJ","03/05/2016",742,4,"3215-5742","3215-2742","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","DOMINGOS NETO","PSD","CE","03/05/2016",546,4,"3215-5546","3215-2546","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","FABIANO HORTA","PT","RJ","10/05/2016",483,3,"3215-5483","3215-2483","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","JAIME MARTINS","PSD","MG","03/05/2016",904,4,"3215-5904","3215-2904","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","JOSÉ AIRTON CIRILO","PT","CE","03/05/2016",319,4,"3215-5319","3215-2319","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","MARCELO ÁLVARO ANTÔNIO","PR","MG","03/05/2016",824,4,"3215-5824","3215-2824","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","PAULO FREIRE","PR","SP","06/06/2016",416,4,"3215-5416","3215-2416","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","SÉRGIO BRITO","PSD","BA","03/05/2016",638,4,"3215-5638","3215-2638","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","VINICIUS GURGEL","PR","AP","03/05/2016",852,4,"3215-5852","3215-2852","Exmo. Senhor Deputado"),
        array( "CVT","Comissão de Viação e Transportes","PT/PSD/PR/PROS/PCdoB","Suplente","ZENAIDE MAIA","PR","RN","02/05/2016",439,4,"3215-5439","3215-2439","Exma. Senhora Deputada"),
        array( "CVT","Comissão de Viação e Transportes","REDE","Suplente","JOÃO DERLY","REDE","RS","23/05/2016",901,4,"3215-5901","3215-2901","Exmo. Senhor Deputado"),
      );
      
      foreach ($mei_commision as $deputado) {
        if(!isset($deputado[4])){
          //TODO add error message
          continue;
        }
        $args = array(
          'post_type' => 'public_agent',
          'post_status' => 'publish',
          's' => $deputado[4]
        );
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            if (isset($deputado[0]) && isset($deputado[1]) && isset($deputado[3])) {
              echo '"' . get_the_title() . '", "' . $deputado[4] . '", "'  .  $deputado[0] . '", "'  .  $deputado[1] . '"<br>';
              $term = term_exists( $deputado[1], 'public_agent_commission' );
              if( !$term ) {
                $term = wp_insert_term(
                  $deputado[1],
                  'public_agent_commission',
                  array(
                    'slug' => $deputado[0]
                  )
                );
                $titular = wp_insert_term(
                  "titular",
                  'public_agent_commission',
                  array(
                    'slug' => "titular-" . $deputado[0],
                    'parent' => $term["term_id"]
                  )
                );
                $suplente = wp_insert_term(
                  "suplente",
                  'public_agent_commission',
                  array(
                    'slug' => "suplente-" . $deputado[0],
                    'parent' => $term["term_id"]
                  )
                );
              }

              if ($deputado[3] == 'Titular') {
                wp_set_post_terms( get_the_ID(), get_term_by( 'slug', "titular-" . $deputado[0], 'public_agent_commission' )->term_id , 'public_agent_commission' );  
                
              }elseif($deputado[3] == 'Suplente') {
                wp_set_post_terms( get_the_ID(), get_term_by( 'slug', "suplente-" . $deputado[0], 'public_agent_commission' )->term_id , 'public_agent_commission' );  
              }

              
            }

          }
          /* Restore original Post Data */
          wp_reset_postdata();
        } else {
          // no posts found
        }
      }
    }
}

function makepressure_adicionar_deputados(){
?>
<h1><?php _e('Lista de Deputados para importação' , 'makepressure') ?></h1>
<?php

  $Url="https://www.camara.leg.br/SitCamaraWS/Deputados.asmx/ObterDeputados";  
  if (!function_exists('curl_init')){
      die('Sorry cURL is not installed!');
  } 
     $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $Url);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
  $data = curl_exec($ch);
  $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE)
  ;// Close the cURL resource, and free system resources
  curl_close($ch);


  $xml = simplexml_load_string($data) or die("Error: Cannot create object");

  echo '<form method="post">';
  submit_button(__("Importar deputados", "makepressure" ));
  echo '</form>';

  foreach ($xml as $deputado) {

    if($_POST)
    if ($_POST['submit'] == "Importar deputados") {
      set_time_limit(0);
      $postarr = array(
          'post_title' => (string) $deputado->nomeParlamentar,
          'post_type' => 'public_agent',
          'post_status' => 'publish',
          'meta_input' => array(
              'public_agent_email' => (string) $deputado->email,
              'public_agent_phone' => (string) $deputado->fone,
            )

        );
      //post id
      $response = wp_insert_post( $postarr, true );

      if (is_wp_error($response) || $response == 0) {
        break;
      }
      else{

        wp_set_post_terms( $response, get_term_by( 'slug',"deputado_federal", 'public_agent_job' )->term_id, 'public_agent_job' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $deputado->uf, 'public_agent_state' )->term_id, 'public_agent_state' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $deputado->partido, 'public_agent_party' )->term_id, 'public_agent_party' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $deputado->sexo, 'public_agent_genre' )->term_id , 'public_agent_genre' );

        // example image
        $image = (string) $deputado->urlFoto;

        // magic sideload image returns an HTML image, not an ID
        $media = media_sideload_image($image, $response);

        // therefore we must find it so we can set it as featured ID
        if(!empty($media) && !is_wp_error($media)){
            $args = array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'post_status' => 'any',
                'post_parent' => $response
            );

            // reference new image to set as featured
            $attachments = get_posts($args);

            if(isset($attachments) && is_array($attachments)){
                foreach($attachments as $attachment){
                    // grab source of full size images (so no 300x150 nonsense in path)
                    $image = wp_get_attachment_image_src($attachment->ID, 'full');
                    // determine if in the $media image we created, the string of the URL exists
                    if(strpos($media, $image[0]) !== false){
                        // if so, we found our image. set it as thumbnail
                        set_post_thumbnail($response, $attachment->ID);
                        // only want one image
                    }
                }
            }
        }
      }

    }

    echo "<div>";
    echo '<img src="' . $deputado->urlFoto . '" /><br>';
    echo $deputado->nomeParlamentar . "<br>";
    echo $deputado->partido . "<br>";
    echo $deputado->uf . "<br>";
    echo $deputado->sexo . "<br>";
    echo $deputado->email . "<br>";
    echo "061 " . $deputado->fone . "<br>";
    echo "</div>";

    echo '<br>';
  }
}

function makepressure_adicionar_senadores(){
  ?>
<h1><?php _e('Lista de Senadores para importação' , 'makepressure') ?></h1>
<?php
  $url="http://legis.senado.leg.br/dadosabertos/senador/lista/atual";
  $response_xml_data = file_get_contents($url);
  if($response_xml_data){
    echo '<br>' . __("Parlamentares lidos com sucesso!", 'makepressure') . '</br>';
  }

  $data = simplexml_load_string($response_xml_data);

  echo '<form method="post">';
  submit_button(__("Importar senadores", "makepressure" ));
  echo '</form>';

  $parlamentares = $data->Parlamentares->Parlamentar;
  foreach ($parlamentares as $parlamentar) {
    $senador = $parlamentar->IdentificacaoParlamentar;
    if($_POST)
    if ($_POST['submit'] == "Importar senadores") {
      set_time_limit(0);
      $postarr = array(
          'post_title' => (string) $senador->NomeParlamentar,
          'post_type' => 'public_agent',
          'post_status' => 'publish',
          'meta_input' => array(
              'public_agent_email' => (string) $senador->EmailParlamentar,
              //'public_agent_phone' => (string) $senador->fone,
            )

        );
      //post id
      $response = wp_insert_post( $postarr, true );

      if (is_wp_error($response) || $response == 0) {
        echo __( "Erro na criação do agente público representando " ) . $senador->NomeParlamentar;
        break;
      }
      else{

        wp_set_post_terms( $response, get_term_by( 'slug',"senador", 'public_agent_job' )->term_id, 'public_agent_job' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $senador->UfParlamentar, 'public_agent_state' )->term_id, 'public_agent_state' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $senador->SiglaPartidoParlamentar, 'public_agent_party' )->term_id, 'public_agent_party' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $senador->SexoParlamentar, 'public_agent_genre' )->term_id , 'public_agent_genre' );

        // example image
        $image = (string) $senador->UrlFotoParlamentar;

        // magic sideload image returns an HTML image, not an ID
        $media = media_sideload_image($image, $response);

        // therefore we must find it so we can set it as featured ID
        if(!empty($media) && !is_wp_error($media)){
            $args = array(
                'post_type' => 'attachment',
                'posts_per_page' => -1,
                'post_status' => 'any',
                'post_parent' => $response
            );

            // reference new image to set as featured
            $attachments = get_posts($args);

            if(isset($attachments) && is_array($attachments)){
                foreach($attachments as $attachment){
                    // grab source of full size images (so no 300x150 nonsense in path)
                    $image = wp_get_attachment_image_src($attachment->ID, 'full');
                    // determine if in the $media image we created, the string of the URL exists
                    if(strpos($media, $image[0]) !== false){
                        // if so, we found our image. set it as thumbnail
                        set_post_thumbnail($response, $attachment->ID);
                        // only want one image
                    }
                }
            }
        }
      }

    }

    echo "<div>";
    echo '<img src="' . $senador->UrlFotoParlamentar . '" /><br>';
    echo $senador->NomeParlamentar . "<br>";
    echo $senador->SiglaPartidoParlamentar . "<br>";
    echo $senador->UfParlamentar . "<br>";
    echo $senador->SexoParlamentar . "<br>";
    echo $senador->EmailParlamentar . "<br>";
    //echo "061 " . $senador->fone . "<br>";
    echo "</div>";

    echo '<br>';
  }
}


function makepressure_settings()
{ 
  ?>
  <h1>Página de Configuração do Bota Pressão</h1>
  <form method="post" action="admin-post.php" >
  <input type="hidden" name="action" value="update_options">
  <div id="ferramentas">
    <p>Marque quais as ferramentas de pressão sobre cada agente público</p>
    <p>
      <input type="checkbox" id="email" name="email"  <?php echo get_option('makepressure_email_show') ? "checked":""; ?>/>
      <label>Email
    </p>
    <p>
      <input type="checkbox" id="facebook" name="facebook"  <?php echo get_option('makepressure_facebook_show') ? "checked":""; ?>/>
      <label>Facebook</label>
    </p>
    <p>
      <input type="checkbox" id="twitter" name="twitter" <?php echo get_option('makepressure_twitter_show') ? "checked":""; ?>/>
      <label>twitter</label>
    </p>
    <p>
      <input type="checkbox" id="whatsapp" name="whatsapp"  <?php echo get_option('makepressure_whatsapp_show') ? "checked":""; ?>/>
      <label>whatsapp</label>
    </p>
    <p>
      <input type="checkbox" id="phone" name="phone"  <?php echo get_option('makepressure_phone_show') ? "checked":""; ?>/>
      <label>Telefone</label>
    </p>
    <p>
      <label>Correio</label>
      <br>
      <p>
        <input type="checkbox" id="cartao_postal" name="cartao_postal"  <?php echo get_option('makepressure_correio_show') ? "checked":""; ?>/>
        </label>Cartão Postal</label>
      </p>
      <p>
        <input type="checkbox" id="cartao_postal" name="cartao_postal"  <?php echo get_option('makepressure_cartao_postal_show') ? "checked":""; ?>/>
        </label>Telegrama</label>
      </p>
      <p>
        </label>Encomenda</label>
        <p>
          <input type="checkbox" id="flores" name="flores"  <?php echo get_option('makepressure_flores_show') ? "checked":""; ?>/>
          </label>Flores</label>
        </p>
        <p>
          <input type="checkbox" id="carro_de_som" name="carro_de_som"  <?php echo get_option('makepressure_carro_de_som_show') ? "checked":""; ?>/>
          </label>Carro de Som</label>
        </p>
      </p>
    </p>
    <!-- TODO -->
    <p>
      <label>Inserir mensagem padrão para email:</label><br>
      <input id="email_subject" name="email_subject" type="text" placeholder="Adicionar titulo da mensagem" value="<?php echo get_option('makepressure_email_title') ? get_option('makepressure_email_title'):""; ?>" /><br>
      <textarea cols="50" rows="7" id="email_body" name="email_body" placeholder="Adicionar o corpo da mensagem"><?php echo get_option('makepressure_email_body') ? get_option('makepressure_email_body'):""; ?></textarea><br>
      * Favor utilizar %0A%0A para enviar enter nas url's.
      <!--textarea name="more_emails" placeholder="Adicionar + email's na mensagem, separados por virgula"><?php echo get_option('makepressure_more_emails') ? get_option('makepressure_more_emailsmails'):""; ?></textarea><br-->
    </p>
    <p>
      <label>Inserir mensagem padrão para o twitter:</label><br>
      <textarea cols="50" rows="7" id="twitter_text" name="twitter_text" placeholder="Adicionar o corpo da mensagem"><?php echo get_option('makepressure_twitter_text') ? get_option('makepressure_twitter_text'):""; ?></textarea><br>
      <p>* Atenção com o limite de caracteres previsto pelo twitter</p>
      <input id="twitter_hashtag" name="twitter_hashtag" type="text" placeholder="Adicionar uma hashtag sem # no inicio" value="<?php echo get_option('makepressure_twitter_hashtag') ? get_option('makepressure_twitter_hashtag'):""; ?>"><br>
      <input id="twitter_url" name="twitter_url" type="text" placeholder="Adicionar uma url" value="<?php echo get_option('makepressure_twitter_url') ? get_option('makepressure_twitter_url'):""; ?>"><br>
    </p>
    <p>
  </div>

  <?php  
  submit_button("Salvar");
}

add_action( 'admin_post_update_options', 'public_agent_show_hide_fields' );
function public_agent_show_hide_fields() 
{


  $email = $_POST["email"] == 'on'? "1" : '0';
  $facebook = $_POST["facebook"] == 'on'? "1" : '0';
  $twitter = $_POST["twitter"] == 'on'? "1" : '0';
  $whatsapp = $_POST["whatsapp"] == 'on'? "1" : '0';
  $phone = $_POST["phone"] == 'on'? "1" : '0';
  
  $email_subject = isset( $_POST["email_subject"]) ? $_POST["email_subject"]:"";
  $email_body = isset( $_POST["email_body"]) ? $_POST["email_body"]:"";
  $more_emails = isset( $_POST["more_emails"]) ? $_POST["more_emails"]:"";
  $twitter_text = isset( $_POST["twitter_text"]) ? $_POST["twitter_text"]:"";
  $twitter_hashtag = isset( $_POST["twitter_hashtag"]) ? $_POST["twitter_hashtag"]:"";
  $twitter_url = isset( $_POST["twitter_url"]) ? $_POST["twitter_url"]:"";


  update_option( "makepressure_email_show", $email);
  update_option( "makepressure_facebook_show", $facebook);
  update_option( "makepressure_twitter_show", $twitter);
  update_option( "makepressure_whatsapp_show", $whatsapp);
  update_option( "makepressure_phone_show", $phone);
  update_option( "makepressure_email_title", $email_subject);
  update_option( "makepressure_email_body", $email_body);
  update_option( "makepressure_more_emails", $more_emails);
  update_option( "makepressure_twitter_text", $twitter_text);
  update_option( "makepressure_twitter_hashtag", $twitter_hashtag);
  update_option( "makepressure_twitter_url", $twitter_url);


    wp_redirect( "admin.php?page=makepressure_menu" );
    exit;
}

function makepressure_activate() {

  add_option( 'Activated_MakePressure', 'makepressure' );

  /* activation code here */
}
register_activation_hook( __FILE__, 'makepressure_activate' );

function load_plugin() {

    if ( is_admin() && get_option( 'Activated_MakePressure' ) == 'makepressure' ) {

        delete_option( 'Activated_MakePressure' );
        makepressure_activation();
      }
}
add_action( 'admin_init', 'load_plugin' );


function makepressure_activation()
{

  update_option( "makepressure_email_show", '1' );
  update_option( "makepressure_facebook_show", '1' );
  update_option( "makepressure_twitter_show", '1' );
  update_option( "makepressure_whatsapp_show", '1' );
  update_option( "makepressure_phone_show", '1' );

  //add new category

  //add terms to category

  $states = array( array( 'Acre', 'AC' ), array( 'Alagoas', 'AL' ), array( 'Amapa', 'AP' ), array( 'Amazonas', 'AM' ), array( 'Bahia', 'BA' ), array( 'Ceara', 'CE' ), array( 'Distrito Federal', 'DF' ), array( 'Espirito Santo', 'ES' ), array( 'Goias', 'GO' ), array( 'Maranhao', 'MA' ), array( 'Mato Grosso do Sul', 'MS' ), array( 'Mato Grosso', 'MT' ), array( 'Minas Gerais', 'MG' ), array( 'Para', 'PA' ), array( 'Paraiba', 'PB' ), array( 'Parana', 'PR' ), array( 'Pernambuco', 'PE' ), array( 'Piaui', 'PI' ), array( 'Rio de Janeiro', 'RJ' ), array( 'Rio Grande do Norte', 'RN' ), array( 'Rio Grande do Sul', 'RS' ), array( 'Rondonia', 'RO' ), array( 'Roraima', 'RR' ), array( 'Santa Catarina', 'SC' ), array( 'Sao Paulo', 'SP' ), array( 'Sergipe', 'SE' ), array( 'Tocantins', 'TO' ) );

  foreach ($states as $state) {
    $public_agent_cat = array('cat_name' => $state[0], 'category_description' => '', 'category_nicename' => $state[1], 'category_parent' => "", 'taxonomy' => 'public_agent_state');
    $public_agent_cat_id = wp_insert_category($public_agent_cat);
  }

   $parties =  array( array ( 'Partido Do Movimento Democrático Brasileiro', 'PMDB' ), array ( 'Partido Do Movimento Democrático Brasileiro', 'PTB' ), array ( 'Partido Democrático Trabalhista', 'PDT' ), array ( 'Partido Dos Trabalhadores', 'PT' ), array ( 'Democratas', 'DEM' ), array ( 'Partido Comunista Do Brasil', 'PCdoB' ), array ( 'Partido Socialista Brasileiro', 'PSB' ), array ( 'Partido Da Social-Democracia Brasileira', 'PSDB' ), array ( 'Partido Trabalhista Cristão', 'PTC' ), array ( 'Partido Social Cristão', 'PSC' ), array ( 'Partido Da Mobilização Nacional', 'PMN' ), array ( 'Partido Republicano Progressista', 'PRP' ), array ( 'Partido Popular Socialista', 'PPS' ), array ( 'Partido Verde', 'PV' ), array ( 'Partido Trabalhista Do Brasil', 'PTdoB' ), array ( 'Partido Progressista', 'PP' ), array ( 'Partido Socialista Dos Trabalhadores Unificado', 'PSTU' ), array ( 'Partido Comunista Brasileiro', 'PCB' ), array ( 'Partido Renovador Trabalhista Brasileiro', 'PRTB' ), array ( 'Partido Humanista Da Solidariedade', 'PHS' ), array ( 'Partido Social Democrata Cristão', 'PSDC' ), array ( 'Partido Da Causa Operária', 'PCO' ), array ( 'Partido Trabalhista Nacional', 'PTN' ), array ( 'Partido Social Liberal', 'PSL' ), array ( 'Partido Republicano Brasileiro', 'PRB' ), array ( 'Partido Socialismo E Liberdade', 'PSOL' ), array ( 'Partido Da República', 'PR' ), array ( 'Partido Social Democrático', 'PSD' ), array ( 'Partido Pátria Livre', 'PPL' ), array ( 'Partido Ecológico Nacional', 'PEN' ), array ( 'Partido Republicano Da Ordem Social', 'PROS' ), array ( 'Solidariedade', 'SD' ), array ( 'Partido Novo', 'NOVO' ), array ( 'Rede Sustentabilidade', 'REDE' ), array ( 'Partido Da Mulher Brasileira' , 'PMB') );

  foreach ($parties as $party) {
    $public_agent_cat = array('cat_name' => $party[0], 'category_description' => '', 'category_nicename' => $party[1], 'category_parent' => "", 'taxonomy' => 'public_agent_party');
    $public_agent_cat_id = wp_insert_category($public_agent_cat);
  }
  
  $jobs = array( array( 'Presidentx', 'presidente' ), array( 'Vice-Presidentx', 'vice_presidente' ), array( 'Ministrx', 'Ministro' ), array( 'Secretarix Federal', 'secretario_federal' ), array( 'Deputadx Federal', 'deputado_federal' ), array( 'Senadorx', 'senador' ), array( 'Governadorx', 'governador' ), array( 'Vice-Governadorx', 'vice_governador' ), array( 'Deputadx Estadual', 'deputado_estadual' ), array( 'Secretarix Estadual', 'secretario_estadual' ), array( 'Prefeitx', 'prefeito' ), array( 'Vice-Prefeitx', 'vice_prefeito' ), array( 'Vereadorx', 'vereador' ), array( 'Secretarix Municipal', 'secretario_municipal' ) );

  foreach ($jobs as $job) {
    $public_agent_cat = array('cat_name' => $job[0], 'category_description' => '', 'category_nicename' => $job[1], 'category_parent' => "", 'taxonomy' => 'public_agent_job');
    $public_agent_cat_id = wp_insert_category($public_agent_cat);
  }

  $genres = array( 'Feminino', 'Masculino' );

  foreach ($genres as $genre) {
    $public_agent_cat = array('cat_name' => $genre, 'category_description' => '', 'category_nicename' => $genre, 'category_parent' => "", 'taxonomy' => 'public_agent_genre');
    $public_agent_cat_id = wp_insert_category($public_agent_cat);
  }

}

function wp_divi_delibera_enqueue_style() {
  wp_register_style( 'fontawesome',  plugin_dir_url( __FILE__ ).'css/font-awesome.min.css' );
  wp_enqueue_style( 'fontawesome' );
}

add_action( 'wp_enqueue_scripts', 'wp_divi_delibera_enqueue_style' );

// counter email
if(is_admin()){
  //add_action( 'wp_ajax_makepressure_email', 'makepressure_email_callback' );
  //add_action( 'wp_ajax_nopriv_makepressure_email', 'makepressure_email_callback' );  
}

function makepressure_email_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_email') ) {

        $count = get_post_meta( $_POST['post_id'], 'makepressure_email_counter', true );
        update_post_meta( $_POST['post_id'], 'makepressure_email_counter', ( $count === '' ? 1 : $count + 1 ) );
    }
    wp_die();
}


//add_action( 'wp_head', 'makepressure_email_click_head' );

function makepressure_email_click_head() {
    global $post;

    if( isset( $post->ID ) ) {
?>
    <script type="text/javascript" >
    jQuery(function ($) {
        var ajax_options = {
            action: 'makepressure_email',
            nonce: '<?php echo wp_create_nonce( 'makepressure_email'); ?>',
            ajaxurl: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            post_id: ''
        };

        $( '.makepressure_email' ).on( 'click', function() {
            var self = $( this );
            ajax_options.post_id = self.attr( 'id' );
            $.post( ajax_options.ajaxurl, ajax_options, function() {
                window.location.href = self.attr( "href" );
            });
            return false;
        });
    });
    </script>
<?php
    }
}

// counter facebook
if(is_admin()){
  //add_action( 'wp_ajax_makepressure_facebook', 'makepressure_facebook_callback' );
  //add_action( 'wp_ajax_nopriv_makepressure_facebook', 'makepressure_facebook_callback' );  
}

function makepressure_facebook_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_facebook') ) {

        $count = get_post_meta( $_POST['post_id'], 'makepressure_facebook_counter', true );
        update_post_meta( $_POST['post_id'], 'makepressure_facebook_counter', ( $count === '' ? 1 : $count + 1 ) );
    }
    wp_die();
}

//add_action( 'wp_head', 'makepressure_facebook_click_head' );
function makepressure_facebook_click_head() {
    global $post;

    if( isset( $post->ID ) ) {
?>
    <script type="text/javascript" >
    jQuery(function ($) {
        var ajax_options = {
            action: 'makepressure_facebook',
            nonce: '<?php echo wp_create_nonce( 'makepressure_facebook'); ?>',
            ajaxurl: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            post_id: ''
        };

        $( '.makepressure_facebook' ).on( 'click', function() {
            var self = $( this );
            ajax_options.post_id = self.attr( 'id' );
            $.post( ajax_options.ajaxurl, ajax_options, function() {
                window.location.href = self.attr( "href" );
            });
            return false;
        });
    });
    </script>
<?php
    }
}

// counter twitter
if(is_admin()){
  //add_action( 'wp_ajax_makepressure_twitter', 'makepressure_twitter_callback' );
  //add_action( 'wp_ajax_nopriv_makepressure_twitter', 'makepressure_twitter_callback' );  
}
function makepressure_twitter_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_twitter') ) {

        $count = get_post_meta( $_POST['post_id'], 'makepressure_twitter_counter', true );
        update_post_meta( $_POST['post_id'], 'makepressure_twitter_counter', ( $count === '' ? 1 : $count + 1 ) );
    }
    wp_die();
}

//add_action( 'wp_head', 'makepressure_twitter_click_head' );
function makepressure_twitter_click_head() {
    global $post;

    if( isset( $post->ID ) ) {
?>
    <script type="text/javascript" >
    jQuery(function ($) {
        var ajax_options = {
            action: 'makepressure_twitter',
            nonce: '<?php echo wp_create_nonce( 'makepressure_twitter'); ?>',
            ajaxurl: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            post_id: ''
        };

        $( '.makepressure_twitter' ).on( 'click', function() {
            var self = $( this );
            ajax_options.post_id = self.attr( 'id' );
            $.post( ajax_options.ajaxurl, ajax_options, function() {
                window.location.href = self.attr( "href" );
            });
            return false;
        });
    });
    </script>
<?php
    }
}

// counter superpressure
if(is_admin()){
  //add_action( 'wp_ajax_makepressure_superpressure', 'makepressure_superpressure_callback' );
  //add_action( 'wp_ajax_nopriv_makepressure_superpressure', 'makepressure_superpressure_callback' );  
}

function makepressure_superpressure_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['css_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_superpressure') ) {

        $count = get_option( $_POST['css_id'] );
        update_option( $_POST['css_id'], ( $count ? $count + 1 : 1 ) );
    }
    wp_die();
}

//add_action( 'wp_head', 'makepressure_superpressure_click_head' );
function makepressure_superpressure_click_head() {
    global $post;

    if( isset( $post->ID ) ) {
?>
    <script type="text/javascript" >
    jQuery(function ($) {
        var ajax_options = {
            action: 'makepressure_superpressure',
            nonce: '<?php echo wp_create_nonce( 'makepressure_superpressure'); ?>',
            ajaxurl: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
            css_id: ''
        };

        $( '.makepressure_superpressure' ).on( 'click', function() {
            var self = $( this );
            ajax_options.css_id = self.attr( 'id' );
            $.post( ajax_options.ajaxurl, ajax_options, function() {
                window.location.href = self.attr( "href" );
            });
            return false;
        });
    });
    </script>
<?php
    }
}

function makepressure_addscripts(){
  wp_enqueue_script( "chartjs", plugin_dir_url(__FILE__)."/node_modules/chart.js/dist/Chart.min.js");
}
//add_action('init', 'makepressure_addscripts');

function makepressure_statistics() {
  add_rewrite_tag( '%stat%', '([^&]+)' );
  add_rewrite_rule( 'stats/([^&]+)/?', 'index.php?stat=$matches[1]', 'top' );
}

//add_action( 'init', 'makepressure_statistics' );

function makepressure_statistics_endpoint_data() {

  global $wp_query;

  $tag = $wp_query->get( 'stat' );

  if ( $tag == 'public_agent_state' || $tag == 'public_agent_genre' || $tag == 'public_agent_party' ) {
    $states_count = array();
  
    $cat_terms = get_terms(
      $tag,
      array(
       'hide_empty'    => false,
       'orderby'       => 'name',
       'order'         => 'ASC',
       'number'        => 200
      )
    );

    foreach($cat_terms as $term){
      $email_sum = 0;
      $twitter_sum = 0;
      $facebook_sum = 0;

      $args = array(
        'post_type'             => 'public_agent',
        'nopaging'              => true, 
        'post_status'           => 'publish',
        'tax_query'             => array(
          array(
            'taxonomy' => $tag,
            'field'    => 'id',
            'terms'    => $term->term_id,
          ),
        )
      );
      $posts = new WP_Query( $args );

      if( $posts->have_posts() ) :
        while( $posts->have_posts() ) : $posts->the_post();
        $email = get_post_meta( get_the_ID(), 'makepressure_email_counter' )?get_post_meta( get_the_ID(), 'makepressure_email_counter' ):"";
        $twitter = get_post_meta( get_the_ID(), 'makepressure_twitter_counter' )?get_post_meta( get_the_ID(), 'makepressure_twitter_counter' ):"";
        $facebook = get_post_meta( get_the_ID(), 'makepressure_facebook_counter' )?get_post_meta( get_the_ID(), 'makepressure_facebook_counter' ):"";
        if (is_array($email))
          $email_sum +=  (int)$email[0];
        if(is_array($twitter))
          $twitter_sum +=  (int)$twitter[0];
        if(is_array($facebook))
          $facebook_sum +=  (int)$facebook[0];

        endwhile;
      endif;
      wp_reset_postdata(); //important
      $count[$term->name] = array ( 
        'email'     => ($email_sum != ""?$email_sum:0),
        'twitter'   => ($twitter_sum =! ""?$twitter_sum:0),
        'facebook'  => ($facebook_sum =! ""?$facebook_sum:0)
      );
    }


    wp_send_json( $count );
  }


  return;
}

//add_action( 'template_redirect', 'makepressure_statistics_endpoint_data' );

function makepressure_add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
//add_action('init','makepressure_add_cors_http_header');

// register Widget MakePressure
function makepressure_register_widget() {
    register_widget( 'makepressure_widget' );
}
//add_action( 'widgets_init', 'makepressure_register_widget' );

// old functions

/*
//insert collumns on administration Public Agents page

// pages and search system
function public_agent_rewrite_add_var( $vars ) {
  $vars[] = 'busca';
  return $vars;
}
add_filter( 'query_vars', 'public_agent_rewrite_add_var' );

// Create the rewrites
function public_agent_rewrite_rule() {
  add_rewrite_tag( '%busca%', '([^&]+)' );
  add_rewrite_rule(
      '^busca',
      'index.php?busca',
      'top'
  );
}
add_action('init','public_agent_rewrite_rule');

// Catch the URL and redirect it to a template file
function public_agent_rewrite_catch() {
  global $wp_query;
  if ( array_key_exists( 'busca', $wp_query->query_vars ) ) {
    include ( MAKE_PRESSURE_PATH . 'people_list.php');
    exit;
  }
}
add_action( 'template_redirect', 'public_agent_rewrite_catch' );
*/
