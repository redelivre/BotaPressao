<?php
/*
   Plugin Name: Bota Pressão
   Plugin URI: http://redelivre.org.br
   Description: Plugin for manager and pressure a Public Agents
   Author: Maurilio Atila
   Version: 0.1
   Author URI: https://twitter.com/cabelotaina
 */

defined('ABSPATH') or die('No script kiddies please!');
define( 'MAKE_PRESSURE_PATH', plugin_dir_path( __FILE__ ) );

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
    'public'             => true,
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
    //'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' ),
    'taxonomies'         => array( 'category' ),
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

  if (get_post_type() != "public_agent") return $content;
  
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
    $new_content =  '<a class="fa fa-envelope fa-3x" style="margin:10px;color:green;" href="mailto:';
    $new_content .= $email . $more_emails;
    //$new_content .= '?subject=Excelentissimo' . $email_subject . $space;
    $new_content .= '?subject=Excelentissimo' . $space;
    $new_content .= $cargo_valid;
    $new_content .= $space;
    $new_content .= get_the_title(); 
    $new_content .= '&body=Excelentissimo' .$space;
    $new_content .= $cargo_valid . $space;
    $new_content .= get_the_title() . ", %0A%0A";
    $new_content .= $email_body;
    $new_content .= '"></a>';
  endif;

  $twitter = get_post_meta(  get_the_ID(), 'public_agent_twitter', true);
  
  if ( get_post_meta(  get_the_ID(), 'public_agent_twitter', true) ) :
    $new_content .= '<a class="fa fa-twitter fa-3x" style="margin:10px;color:#1dcaff;"  href="https://twitter.com/intent/tweet?text=@';
    $new_content .= $twitter . $twitter_text;
    $new_content .= '&url=' . $twitter_url;
    $new_content .= '&hashtags=' . $twitter_hashtag . '" class="twitter-mention-button" data-show-count="false"></a>';
  endif;

  $facebook = get_post_meta(  get_the_ID(), 'public_agent_facebook', true);

  if ( get_post_meta(  get_the_ID(), 'public_agent_facebook', true) ) : 
    $new_content .= '<a class="fa fa-facebook-official fa-3x" style="margin:10px;color:#3b5998;" target="_brank" href="';
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
    $new_content .= "<p>Estado: " . $state[0]->name . "</p>";
  if ($job)
    $new_content .= "<p>Cargo: " . $job[0]->name . "</p>";
  if ($genre)
    $new_content .= "<p>Gênero: " . $genre[0]->name . "</p>";
  if ($party)
    $new_content .= "<p>Partido: " . $party[0]->name . "</p>";
  if ($commissions){
    $new_content .= "<p>Comissão: ";
    foreach ($commissions as $commission) {
      $new_content .= $commission->name . " ";
    }
    $new_content .= "</p>";
  }

  return $content . $new_content;
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

add_action('pre_get_posts', 'add_public_agent_to_query');

function add_public_agent_to_query($query)
{
  if (is_home() && $query->is_main_query())
    $query->set('post_type', array('post', 'page', 'public_agent'));
  return $query;
}

add_action('admin_menu', 'public_agent_meta_box');

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

<?php }

add_action('save_post', 'save_public_agent_meta_box', 10, 2);
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

//insert collumns on administration Public Agents page


// XXXX conteudo desabilitado para deixar a página de de todos os agentes publicos mais leve (/wp-admin/edit.php?post_type=public_agent)

//add_filter('manage_public_agent_posts_columns', 'public_agent_filter_columns');

function public_agent_filter_columns($columns)
{
  // this will add the column to the end of the array
  $metas = public_agent_get_metas();
  $i = 0;
  foreach ( $metas as $meta)
  {
    if ( $i === 5) break;
    $columns[$meta['slug']] = $meta['label'];
    $i++;
  }
  return $columns;
}

//add_action('manage_posts_custom_column', 'public_agent_custom_columns', 10, 2);
function public_agent_custom_columns($column_id, $post_id)
{
  //run a switch statement for all of the custom columns created
  $metas = public_agent_get_metas();
  $i = 0;
  foreach ( $metas as $meta)
  {
    if ( $i === 5) break;
    if ( $column_id ==  $meta['slug'] )
      echo ($value = get_post_meta($post_id, $meta['slug'], true)) ? $value : $meta['info'];
    $i++;
  }
}

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

// Filter wp_nav_menu() to add additional links and other output
function public_agent_nav_menu_item($items) {
  $public_agents_link = '<li class="search_people"><a href="' . home_url( '/busca' ) . '">' . __('Busca' , 'public_agent') . '</a></li>';
  // add the home link to the end of the menu
  $items = $items . $public_agents_link;
  return $items;
}
add_filter( 'wp_nav_menu_items', 'public_agent_nav_menu_item' );


add_action('admin_menu','public_agents_menu');

function public_agents_menu()
{
  add_menu_page( __('Bota Pressão','makepressure'), __('Bota Pressão','makepressure'), 'manage_options', 'makepressure_menu', 'makepressure_settings', 'dashicons-megaphone', 100);
  add_submenu_page( 'makepressure_menu', __('Adicionar Deputados Federais', 'makepressure'), __('Adicionar Deputados Federais', 'makepressure'), 'manage_options', 'makepressure-adicionar-deputados', 'makepressure_adicionar_deputados');
}


function makepressure_adicionar_deputados(){
  $Url="http://www.camara.leg.br/SitCamaraWS/Deputados.asmx/ObterDeputados";  
  if (!function_exists('curl_init')){
      die('Sorry cURL is not installed!');
  } 
     $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $Url);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
  $output = curl_exec($ch);
  $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE)
  ;// Close the cURL resource, and free system resources
  curl_close($ch);


  $xml=simplexml_load_string($output) or die("Error: Cannot create object");

  echo '<form method="post">';
  submit_button(__("Importar deputados", "makepressure" ));
  echo '</form>';

  foreach ($xml as $deputado) {

    if($_POST)
    if ($_POST['submit'] == "Importar deputados") {
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
        var_dump($response);
        //break;
      }
      else{

        update_post_meta($response, 'public_agent_email' , (string) $deputado->email);
        update_post_meta($response, 'public_agent_phone' , (string) $deputado->fone);

        wp_set_post_terms( $response, get_term_by( 'slug',(string) $deputado->uf, 'public_agent_state' )->term_id, 'public_agent_state' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $deputado->partido, 'public_agent_party' )->term_id, 'public_agent_party' );
        wp_set_post_terms( $response, get_term_by( 'slug',(string) $deputado->sexo, 'public_agent_genre' )->term_id , 'public_agent_genre' );        
        wp_set_post_terms( $response, 256, 'public_agent_job' );

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
      <!--input id="email_subject" name="email_subject" type="text" placeholder="Adicionar titulo da mensagem" value="<?php echo get_option('makepressure_email_title') ? get_option('makepressure_email_title'):""; ?>" /><br-->
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


register_activation_hook( __FILE__, 'makepressure_activation' );
function makepressure_activation()
{

  update_option('public_agent_partidos' , $public_agent_partidos );
  update_option('public_agent_partidos_array' , $public_agent_partidos_array );
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

require_once dirname(__FILE__)."/options.php"; 

?>
