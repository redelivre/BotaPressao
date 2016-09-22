<?php
/*
   Plugin Name: Bota Pressão
   Plugin URI: http://redelivre.org.br
   Description: Plugin for manager and pressure Public Agent's
   Author: Maurilio Atila
   Version: 0.1
   Author URI: https://github.com/cabelotaina/
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
    $new_content =  '<a id="' . get_the_ID() . '" class="fa fa-envelope fa-3x makepressure_email" style="margin:10px;color:green;" href="mailto:';
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
      $new_content .= '<a href="'. get_category_link( $commission->term_id ) . '">' . $commission->name . "</a> ";
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
    add_submenu_page( 'makepressure_menu', __('Adicionar Redes Sociais', 'makepressure'), __('Adicionar Redes Sociais', 'makepressure'), 'manage_options', 'makepressure-adicionar-redes', 'makepressure_adicionar_redes');
}

function makepressure_adicionar_redes(){
    echo '<form method="post">';
  submit_button(__("Adicionar Redes", "makepressure" ));
  echo '</form>';

  if($_POST)
    if ($_POST['submit'] == "Adicionar Redes") {
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

      //var_dump($aux[0]);

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

// counter email
if(is_admin()){
  add_action( 'wp_ajax_makepressure_email', 'makepressure_email_callback' );
  add_action( 'wp_ajax_nopriv_makepressure_email', 'makepressure_email_callback' );  
}
function makepressure_email_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_email') ) {

        $count = get_post_meta( $_POST['post_id'], 'makepressure_email_counter', true );
        update_post_meta( $_POST['post_id'], 'makepressure_email_counter', ( $count === '' ? 1 : $count + 1 ) );
    }
    wp_die();
}


add_action( 'wp_head', 'makepressure_email_click_head' );
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
  add_action( 'wp_ajax_makepressure_facebook', 'makepressure_facebook_callback' );
  add_action( 'wp_ajax_nopriv_makepressure_facebook', 'makepressure_facebook_callback' );  
}
function makepressure_facebook_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_facebook') ) {

        $count = get_post_meta( $_POST['post_id'], 'makepressure_facebook_counter', true );
        update_post_meta( $_POST['post_id'], 'makepressure_facebook_counter', ( $count === '' ? 1 : $count + 1 ) );
    }
    wp_die();
}


add_action( 'wp_head', 'makepressure_facebook_click_head' );
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
  add_action( 'wp_ajax_makepressure_twitter', 'makepressure_twitter_callback' );
  add_action( 'wp_ajax_nopriv_makepressure_twitter', 'makepressure_twitter_callback' );  
}
function makepressure_twitter_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['post_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_twitter') ) {

        $count = get_post_meta( $_POST['post_id'], 'makepressure_twitter_counter', true );
        update_post_meta( $_POST['post_id'], 'makepressure_twitter_counter', ( $count === '' ? 1 : $count + 1 ) );
    }
    wp_die();
}


add_action( 'wp_head', 'makepressure_twitter_click_head' );
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
  add_action( 'wp_ajax_makepressure_superpressure', 'makepressure_superpressure_callback' );
  add_action( 'wp_ajax_nopriv_makepressure_superpressure', 'makepressure_superpressure_callback' );  
}
function makepressure_superpressure_callback() {

    if ( isset( $_POST['nonce'] ) &&  isset( $_POST['css_id'] ) && wp_verify_nonce( $_POST['nonce'], 'makepressure_superpressure') ) {

        $count = get_option( $_POST['css_id'] );
        update_option( $_POST['css_id'], ( $count ? $count + 1 : 1 ) );
    }
    wp_die();
}


add_action( 'wp_head', 'makepressure_superpressure_click_head' );
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

add_action('init', 'makepressure_addscripts');
function makepressure_addscripts(){
  wp_enqueue_script( "chartjs", plugin_dir_url(__FILE__)."/node_modules/chart.js/dist/Chart.min.js");
}

function makepressure_statistics() {
  add_rewrite_tag( '%stat%', '([^&]+)' );
  add_rewrite_tag( '%category%', '([^&]+)' );
  add_rewrite_rule( 'stats/([^&]+)/([^&]+)?', 'index.php?stat=$matches[1]&category=$matches[2]', 'top' );
}

add_action( 'init', 'makepressure_statistics' );

function makepressure_statistics_endpoint_data() {

  global $wp_query;

  $tag = $wp_query->get( 'stat' );
  $category = $wp_query->get( 'category' );

  if ( $tag == 'states' ) {
    $states_count = array();
  
    $cat_terms = get_terms(
      $category,
      array(
       'hide_empty'    => false,
       'orderby'       => 'name',
       'order'         => 'ASC',
       'number'        => 200 //specify yours
      )
    );

    foreach($cat_terms as $term){
      $email_sum = 0;
      $twitter_sum = 0;
      $facebook_sum = 0;

      $args = array(
        'post_type'             => 'public_agent',
        'nopaging'              => true, //specify yours
        'post_status'           => 'publish',
        'tax_query'             => array(
          array(
            'taxonomy' => $category,
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

function makepressure_add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','makepressure_add_cors_http_header');

add_action( 'template_redirect', 'makepressure_statistics_endpoint_data' );


require_once dirname(__FILE__)."/options.php"; 

?>
