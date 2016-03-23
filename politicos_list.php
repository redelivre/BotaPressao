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
$search = isset( $_POST['search'] ) ? $_POST['search'] : '';

$args = array(
		'post_type'   => 'politicos',
		'post_status' => 'publish',
		's'           =>  $search
	     );

$query = new WP_Query( $args );
$politicos = $query->posts;
?>

<form method="post" action="<?php site_url('?busca') ?>"  name="form">
<input type="text" name="search" placeholder="Insira o nome do politico" value="<?php echo $search; ?>"/>
<br>
<br>
<input type="submit" name="submit" id="submit" class="button button-primary" value="Search"  />
</form>
<br>
	<?php
foreach( $politicos as $deputado )
{ 
	echo '<h2><a href="' . $deputado->guid . '">' . $deputado->post_title . '</a><br></h2>';
	//echo $deputado->post_content;
	echo the_content_max_charlength( 300, $deputado->post_content);
	echo '<br>';
	$metas = array( 'politico_email', 'politico_phone' ,  ) ; 
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

