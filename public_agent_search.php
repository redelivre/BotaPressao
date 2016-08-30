<?php
function make_presure_excerpt($charlength, $content) {
  $content = wp_strip_all_tags($content);
  $charlength++;

  if ( mb_strlen( $content ) > $charlength ) {
    $subex = mb_substr( $content, 0, $charlength - 5 );
    $exwords = explode( ' ', $subex );
    $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
    if ( $excut < 0 ) {
      echo mb_substr( $subex, 0, $excut );
    } else {
      echo $subex;
    }
    echo '[...]';
  } else {
    echo $content;
  }
}

get_header();
$search = isset( $_POST['search'] ) ? $_POST['search'] : '';

$args = array(
    'post_type'   => 'public_agent',
    'post_status' => 'publish',
    's'           =>  $search
  );

$query = new WP_Query( $args );
$public_agents = $query->posts;

?>

<form method="post" action="<?php site_url('?busca') ?>"  name="form">
  <input type="text" name="search" placeholder="Insira o nome do politico" value="<?php echo $search; ?>"/>
  <br>
  <br>
  <input type="submit" name="submit" id="submit" class="button button-primary" value="Search"  />
</form>
<br>
<?php
  foreach( $public_agents as $public_agent )
  { 
    echo '<h2><a href="' . $public_agent->guid . '">' . $public_agent->post_title . '</a><br></h2>';
    //echo $public_agent->post_content;
    echo make_presure_excerpt( 300, $public_agent->post_content);
    echo '<br>';
    $metas = array( 'politico_email', 'politico_phone' ,  ) ; 
    foreach( $metas as $meta )
    {
      $value = get_post_meta($public_agent->ID, $meta, true);
      if ( $value != '' )
      { 
        echo $value . '<br>';
      }

    }
    echo '<br>';
  }
  /* Restore original Post Data */
  wp_reset_postdata();
  wp_footer();
