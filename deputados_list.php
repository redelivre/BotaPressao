<?php
function the_content_max_charlength($charlength, $content) {
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
  //get_the_content();
  $email = isset( $_POST['email'] ) ? $_POST['email'] : '';
  $phone = isset( $_POST['phone'] ) ? $_POST['phone'] : '';
  
  $email_array = $email != '' ? array( 'key' => 'email','value' => $email,'compare' => 'LIKE'): array();
  $phone_array = $phone != '' ? array( 'key' => 'phone', 'value' => $phone, 'compare' => 'LIKE') : array() ;
  $args = array(
	'post_type' => 'deputados',
	'post_status' => 'publish',
        'meta_query' => array ( $email_array , $phone_array)
  );

  $query = new WP_Query( $args );
  $deputados = $query->posts;
  ?>
 
  <form method="post" action="<?php site_url('?deputados') ?>"  name="form">
    <input type="text" name="email" placeholder="Busca por email" value="<?php echo $email; ?>"/>
    <br>
    <br>
    <input type="text" name="phone" placeholder="Busca por Telefone" value="<?php echo $phone; ?>"/>
    <br>
    <br>
    <br>
    <input type="submit" name="submit" id="submit" class="button button-primary" value="Search"  />
  </form>
  <br>
  <?php
  foreach( $deputados as $deputado )
  { 
   echo '<h2><a href="' . $deputado->guid . '">' . $deputado->post_title . '</a><br></h2>';
   //echo $deputado->post_content;
   echo the_content_max_charlength( 300, $deputado->post_content);
   echo '<br>';
   $metas = array( 'deputado_email', 'deputado_phone' ,  ) ; 
   foreach( $metas as $meta )
   {
     $value = get_post_meta($deputado->ID, $meta, true);
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

?>
</body>
</html> 

