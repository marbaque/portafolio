<?php
/*
** Template Name: Modo edición
** Template Post Type: post, page
*/

acf_form_head();

get_header();

?>
<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

			<?php
			$post_id = $_GET["post"];
			
			while ( have_posts() ) : the_post();

				the_title('<h2>', '</h2>');

				//get_template_part( 'template-parts/content', 'page' );

				acf_form(array(
					'post_id'	   => $post_id, //Variable that you'll get from the URL
					'post_title'   => true,
					'post_content' => false,
					'field_groups' => array('group_5ef1515c035ad'), // Create post field group ID(s)            
					'submit_value' => 'Actualizar contenido',
					'return' => '%post_url%' //Returns to the original post
				));

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>