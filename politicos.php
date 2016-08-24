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


function politicos_get_metas()
{
  return array(
      array ( 'label' => 'Email', 'slug'=>'politico_email' ,'info' => 'Nenhum Email Informado ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
      array ( 'label' => 'Facebook', 'slug'=>'politico_facebook' ,'info' => 'Nenhum Facebook Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
      array ( 'label' => 'Twitter', 'slug'=>'politico_twitter' ,'info' => 'Nenhum Twitter Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
      array ( 'label' => 'WhatsApp', 'slug'=>'politico_whatsapp' ,'info' => 'Nenhum WhatsApp Informado' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
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
            array ( 'label' => 'Partido', 'slug'=>'politico_partido' ,'info' =>  'Nenhum Partido Informado', 'html' => array ('tag'=> 'select', 'options' => get_option('politicos_partidos_array'))),
            array ( 'label' => 'Cargo Politico', 'slug'=>'politico_cargo' ,'info' =>  'Nenhum Cargo Informado', 'html' => array ('tag'=> 'select', 'options' => array(
                    array ( 'value' => '' , 'content' => 'Selecione' ),
                    array ( 'value' => 'presidente', 'content' => 'Presidentx' ) ,
                    array ( 'value' => 'vice_presidente', 'content' => 'Vice-Presidentx' ) ,
                    array ( 'value' => 'Ministro', 'content' => 'Ministrx' ) ,
                    array ( 'value' => 'secretário', 'content' => 'Secretarix' ) ,
                    array ( 'value'=> 'deputado_federal', 'content' => 'Deputadx Federal' ) ,
                    array ( 'value' =>'senador', 'content' => 'Senadorx' ) ,
                    array ( 'value' => 'governador', 'content' => 'Governadorx' ) ,
                    array ( 'value' => 'vice_governador', 'content' => 'Vice-Governadorx' ) ,
                    array ( 'value' => 'deputado_estadual', 'content' => 'Deputadx Estadual' ) ,
                    array ( 'value' => 'prefeito', 'content' => 'Prefeitx' ), 
                    array ( 'value' => 'vice_prefeito', 'content' => 'Vice-Prefeitx' ), 
                    array ( 'value' => 'vereador', 'content' => 'Vereadorx' ) ,
                    )
                  )
                ),
            array ( 'label' => 'Gênero', 'slug'=>'politico_genero' ,'info' =>  'Nenhuma gênero Informado', 'html' => array ('tag'=> 'select', 'options' => array(
                    array ( 'value' => '' , 'content' => 'Selecione' ),
                    array ( 'value' => 'Feminino' , 'content' => 'Feminino' ),
                    array ( 'value' => 'Masculino' , 'content' => 'Masculino' )))),
            array ( 'label' => 'Declaração de voto', 'slug'=>'politico_declaracao_voto' ,'info' => 'Nenhuma Declaração de voto Informada ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
            array ( 'label' => 'Ocorrências Judiciais', 'slug'=>'politico_ocorrencias' ,'info' => 'Nenhuma Ocorrencia Judicial Informada ', 'html' => array ('tag'=> 'textarea', 'rows' => 4 , 'cols' => 50 ) ),
            array ( 'label' => 'Número de ocorrências', 'slug'=>'politico_numero_ocorrencias' ,'info' => 'Nenhum Número de Ocorrências Informado ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
            array ( 'label' => 'Tipo de Voto', 'slug'=>'politico_tipo_voto' ,'info' =>  'Nenhum Tipo de Voto Informado', 'html' => array ('tag'=> 'select', 'options' => array(
                    array ( 'value' => '' , 'content' => 'Selecione' ),
                    array ( 'value' => 'Sim' , 'content' => 'Sim' ),
                    array ( 'value' => 'Indeciso' , 'content' => 'Indeciso' ),
                    array ( 'value' => 'Não' , 'content' => 'Não' )))),
            array ( 'label' => 'Bancada que compões', 'slug'=>'politico_bancada' ,'info' => 'Nenhuma Bancada Informada ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
            array ( 'label' => 'Profissão', 'slug'=>'politico_profissao' ,'info' => 'Nenhuma Profissão Informada ' , 'html' => array ('tag'=> 'input', 'type' => 'text' )),
            ); 


}

function get_jobs()
{
  return array (
      array ( 'presidente' => 'Presidentx' ) ,
      array ( 'vice_presidente' => 'Vice-Presidentx' ) ,
      array ( 'Ministro' => 'Ministrx' ) ,
      array ( 'secretário' => 'Secretarix' ) ,
      array ( 'deputado_federal' => 'Deputadx Federal' ) ,
      array ( 'senador' => 'Senadorx' ) ,
      array ( 'governador' => 'Governador' ) ,
      array ( 'vice_governador' => 'Vice-Governador' ) ,
      array ( 'deputado_estadual' => 'Deputado Estadual' ) ,
      array ( 'prefeito' => 'Prefeito' ), 
      array ( 'vice_prefeito' => 'Vice-Prefeito' ), 
      array ( 'vereador' => 'Vereador' ) ,
      );

}


function politicos_add_picture($post)
{
  if (is_home() && is_front_page()) return;
  $post = $post->queried_object;
  if (isset($post->post_type) && $post->post_type!="politicos") return ; 
  if (isset($post->post_type) && $post->post_type=="politicos") {
    $picture_meta = get_post_meta( $post->ID, 'politico_picture', true);
    ?>
      <p>
      <img id="picture" src="<?php if ( isset ( $picture_meta ) ) echo $picture_meta; ?>">
      <?php
  }
}

add_action('loop_start' , 'politicos_add_picture' );

function politicos_the_meta($post)
{
  if( !is_object($post) ) return;
  $post = $post->queried_object;
  if (isset($post->post_type) && $post->post_type!="politicos") return; 
  if (isset($post->post_type) && $post->post_type=="politicos") 
  {
    $job = get_jobs();

    $metas = politicos_get_metas();
    foreach($metas as $meta)
    {
      if ($meta['slug'] == "politico_email"){
        ?>
          <ul class="post-meta">
          <li><span class="post-meta-key">Email:</span>
          <a href="mailto:<?php print_r(get_post_meta( $post->ID, 'politico_email', true)); ?>?subject=Excelentissimo%20<?php echo get_post_meta( $post->ID, 'politico_cargo', true); ?>%20<?php echo get_the_title(); ?>&body=Excelentissimo%20<?php echo (get_post_meta( $post->ID, 'politico_cargo', true) != null)?$job[0][get_post_meta( $post->ID, 'politico_cargo', true)]:""; ?>%20<?php echo get_the_title(); ?>,%20...">
          <?php print_r(get_post_meta( $post->ID, 'politico_email', true)); ?>
          </a>
          </li>
          <?php 
          continue;
      }
      ?>
        <li><span class="post-meta-key"><?php echo $meta['label']; ?>: </span><?php print_r(get_post_meta( $post->ID, $meta['slug'] , true)); ?></li>


        <?php       
    } ?>
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
  add_meta_box('politico-meta-box', 'Informações Complementares', 'display_politico_meta_box', 'politicos', 'normal', 'high');
  add_meta_box('politico-picture-meta-box', 'Imagem', 'display_politico_picture_meta_box', 'politicos', 'normal', 'high');

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
    <!!-- XXX arrumar a imagem do politico sem imagem-->
    <input type="text" name="politico_picture" id="politico_picture" value="<?php if ( isset ( $picture_meta ) ) echo $picture_meta; ?>" />
    <input type="button" id="politico_picture_button" class="politico_picture_button" value="<?php _e( 'Escolha uma imagem para o politico', 'politicos' )?>" />
    </p>
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#politico_picture_button').click(function(e) {
          e.preventDefault();
          var image = wp.media({ 
title: 'Enviar foto',
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
  $metas = politicos_get_metas();
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
        var_dump($option);
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

  $metas = politicos_get_metas();
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
  $metas = politicos_get_metas();
  $i = 0;
  foreach ( $metas as $meta)
  {
    if ( $i === 5) break;
    $columns[$meta['slug']] = $meta['label'];
    $i++;
  }
  return $columns;
}

add_action('manage_posts_custom_column', 'politicos_action_custom_columns_content', 10, 2);

function politicos_action_custom_columns_content($column_id, $post_id)
{
  //run a switch statement for all of the custom columns created
  $metas = politicos_get_metas();
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

  if ( isset( $_POST['partidos'] ) )
  {
    $politicos_partidos = array( array ( 'value' => '' , 'content' => 'Selecione' ) );
    $duplas = explode( ',' , $_POST['partidos'] ) ;
    foreach( $duplas as $dupla)
    {
      $politicos_partidos[] = array( 'value' => $dupla[0] , 'content' => $dupla[1]);
    }

    isset($_POST['partidos'])? update_option('politicos_partidos' , $_POST['partidos']):"";
    isset($_POST['presidente'])? update_option('politicos_presidente' , $_POST['presidente']):"";
    isset($_POST['vice_presidente'])? update_option('politicos_vice_presidente' , $_POST['vice_presidente']):"";
    isset($_POST['ministro'])? update_option('politicos_ministro' , $_POST['ministro']):"";
    isset($_POST['secretario'])? update_option('politicos_secretario' , $_POST['secretario']):"";
    isset($_POST['deputado_federal'])? update_option('politicos_deputado_federal' , $_POST['deputado_federal']):"";
    isset($_POST['senador'])? update_option('politicos_senador' , $_POST['senador']):"";
    isset($_POST['governador'])? update_option('politicos_governador' , $_POST['governador']):"";
    isset($_POST['vice_governador'])? update_option('politicos_vice_governador' , $_POST['vice_governador']):"";
    isset($_POST['deputado_estadual'])? update_option('politicos_deputado_estadual' , $_POST['deputado_estadual']):"";
    isset($_POST['prefeito'])? update_option('politicos_prefeito' , $_POST['prefeito']):"";
    isset($_POST['vice_prefeito'])? update_option('politicos_vice_prefeito' , $_POST['vice_prefeito']):"";
    isset($_POST['vereador'])? update_option('politicos_vereador' , $_POST['vereador']):"";
    

    update_option('politicos_partidos_array' , $politicos_partidos);
  }
  ?>
    <div class="wrap">
    <h2>Configurações Politicos</h2>
    Por favor insira abaixo os Partidos Politicos, da seguinte forma:
    <br>
    sigla|nome do partido,
    sigla|nome do partido
      <br>
      <form method="post" >
      <textarea name="partidos" rows="20" cols="50" ><?php echo get_option('politicos_partidos'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </div>
      <div>

      <h4>definir novos campos para os politicos</h4>
      <p>Abaixo você pode definir campos novos aos vários politicos, basta usar os shortcodes do bota pressão:

      <p>["nome do campo", "tipo do campo", "informações no placeholder"]</p>

      <strong>tipos de campos disponiveis:</strong>
      <p>text</p>
      <p>email</p>
      <p>textarea</p>
      <p>    ["nome do campo", "tipo do campo", "informações no placeholder"]</p>
      <p>select<p>
      <p>    ["nome do campo", "tipo do campo", "informações no placeholder", options... ]</p>
      </p>
      <p><strong>Presidentx</strong></p>
      <form method="post">
      <textarea name="presidente" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_presidente'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      <p><strong>Vice Presidentx</strong></p>
      <form method="post">
      <textarea name="vice_presidente" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_vice_presidente'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Ministrx</strong></p>
      <form method="post">
      <textarea name="ministro" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_ministro'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Secretárix</strong></p>
      <form method="post">
      <textarea name="secretario" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_secretario'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Deputadx Federal</strong></p>
      <form method="post">
      <textarea name="deputado_federal" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_deputado_federal'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Senadorx</strong></p>
      <form method="post">
      <textarea name="senador" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_senador'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Governadorx</strong></p>
      <form method="post">
      <textarea name="governador" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_governador'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Deputadx Estadual</strong></p>
      <form method="post">
      <textarea name="deputado_estadual" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_deputado_estadual'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Prefeitx</strong></p>
      <form method="post">
      <textarea name="prefeito" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_prefeito'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Vice Prefeitx</strong></p>
      <form method="post">
      <textarea name="vice_prefeito" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_vice_prefeito'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>
      </form>
      <p><strong>Vereadorx</strong></p>
      <form method="post">
      <textarea name="vereador" rows="5" cols="50" placeholder="Coloque shortcodes para definir novos campos" ><?php echo get_option('fields_vereador'); ?></textarea>
      <?php submit_button( 'Salvar' ); ?>
      </form>

      </div>


      <?php
}

add_action('init','politicos_menu');

function politicos_menu()
{
  //add_menu_page( __('Painel Politicos','politicos'), __('Painel Politicos','jaiminho'), 'manage_options', 'politicos-settings', 'politicos_settings', POLITICOS_URL . 'img/jaiminho-bg-16.png' );
  add_menu_page( __('Painel Politicos','politicos'), __('Painel Politicos','jaiminho'), 'manage_options', 'politicos-settings', 'politicos_settings');


}


function politicos_settings()
{ ?>
  <form method="post">
  <div id="selecao_politicos">
    <h1>Bota Pressão</h1>
    <p>Qual o grupo instancia que deve ser precionado?</p>
    <textarea placeholder="Entre com a lista de identificadores dos politcos" ></textarea>
  </div> 
  <div id="descricao">
    <input type="text" name="titulo_pressao" id="titulo_pressao" placeholder="Qual o titúlo da sua pressão?"></input>
    <br>
    <textarea name="descricao_pressao" id="descricao_pressao" placeholder="Descreva sua pressão"></textarea>
  </div>
  <div>
    redes e links e ...
  </div>
  <div id="ferramentas">
    <p>Ferramentas - conjunto de infos dos deputados que devem aparecer em seus cards</p>
    <p>
      <input type="checkbox" id="email" name="email">
      <label>Email
    </p>
    <p>
      <input type="checkbox" id="facebook" name="facebook"/>
      <label>Facebook</label>
    </p>
    <p>
      <input type="checkbox" id="twitter" name="twitter"/>
      <label>twitter</label>
    </p>
    <p>
      <input type="checkbox" id="whatsapp" name="whatsapp"/>
      <label>whatsapp</label>
    </p>
    <p>
      <input type="checkbox" id="telefone" name="telefone"/>
      <label>Telefone</label>
    </p>
    <p>
      <label>Correio</label>
      <br>
      <p>
        <input type="checkbox" id="cartao_postal" name="cartao_postal"/>
        </label>Cartão Postal</label>
      </p>
      <p>
        <input type="checkbox" id="telegrama" name="cartao_postal"/>
        </label>Telegrama</label>
      </p>
      <p>
        </label>Encomenda</label>
        <p>
          <input type="checkbox" id="flores" name="flores"/>
          </label>Flores</label>
        </p>
        <p>
          <input type="checkbox" id="carro_de_som" name="carro_de_som"/>
          </label>Carro de Som</label>
        </p>
      </p>
    </p>
  </div>

<?php  
}



function politicos_activation()
{
  // comissao

  $comissoes = "";

  // frente_parlamentar

  $frente_parlamentar = "";

  // bancada

  $bancadas_deputados_federais = "Bancada da Bala,
    Bancada da Bíblia";

  $bancadas_deputados_estatuais = "";

  $bancadas_vereadores = ""; 

  $politicos_partidos = "PMDB|PARTIDO DO MOVIMENTO DEMOCRÁTICO BRASILEIRO,
    PTB|PARTIDO DO MOVIMENTO DEMOCRÁTICO BRASILEIRO,
    PDT|PARTIDO DEMOCRÁTICO TRABALHISTA,
    PT|PARTIDO DOS TRABALHADORES,
    DEM|DEMOCRATAS,
    PCdoB|PARTIDO COMUNISTA DO BRASIL,
    PSB|PARTIDO SOCIALISTA BRASILEIRO,
    PSDB|PARTIDO DA SOCIAL DEMOCRACIA BRASILEIRA,
    PTC|PARTIDO TRABALHISTA CRISTÃO,
    PSC|PARTIDO SOCIAL CRISTÃO,
    PMN|PARTIDO DA MOBILIZAÇÃO NACIONAL,
    PRP|PARTIDO REPUBLICANO PROGRESSISTA,
    PPS|PARTIDO POPULAR SOCIALISTA,
    PV|PARTIDO VERDE,
    PTdoB|PARTIDO TRABALHISTA DO BRASIL,
    PP|PARTIDO PROGRESSISTA,
    PSTU|PARTIDO SOCIALISTA DOS TRABALHADORES UNIFICADO,
    PCB|PARTIDO COMUNISTA BRASILEIRO,
    PRTB|PARTIDO RENOVADOR TRABALHISTA BRASILEIRO,
    PHS|PARTIDO HUMANISTA DA SOLIDARIEDADE,
    PSDC|PARTIDO SOCIAL DEMOCRATA CRISTÃO,
    PCO|PARTIDO DA CAUSA OPERÁRIA,
    PTN|PARTIDO TRABALHISTA NACIONAL,
    PSL|PARTIDO SOCIAL LIBERAL,
    PRB|PARTIDO REPUBLICANO BRASILEIRO,
    PSOL|PARTIDO SOCIALISMO E LIBERDADE,
    PR|PARTIDO DA REPÚBLICA,
    PSD|PARTIDO SOCIAL DEMOCRÁTICO,
    PPL|PARTIDO PÁTRIA LIVRE,
    PEN|PARTIDO ECOLÓGICO NACIONAL,
    PROS|PARTIDO REPUBLICANO DA ORDEM SOCIAL,
    SD|SOLIDARIEDADE,
    NOVO|PARTIDO NOVO,
    REDE|REDE SUSTENTABILIDADE,
    PMB|PARTIDO DA MULHER BRASILEIRA";

  $politicos_partidos_array = array( 
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
        );


  update_option('politicos_partidos' , $politicos_partidos );
  update_option('politicos_partidos_array' , $politicos_partidos_array );

}

register_activation_hook( __FILE__, 'politicos_activation' );

require_once dirname(__FILE__)."/options.php"; 

?>
