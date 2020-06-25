<?php
/*
** Template Name: Formulario de nuevo ítem
*/

acf_form_head();

get_header();

?>
<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				acf_form('new-portafolio');

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>