<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pemscores
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div id="primary" class="portafolios-area">
		<main id="main" class="site-main" role="main">

		<?php 
			if ( function_exists( 'pemscores_breadcrumbs' ) ) {
				pemscores_breadcrumbs();
			}
		?>

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>		
		<?php else : ?>
			<header>
				<h1 class="page-title screen-reader-text">
					Portafolio de evidencias
				</h1>
			</header>
		<?php endif; ?>

			<div class="grid">

				<?php  while ( have_posts() ) : the_post(); ?>

					<div class="grid-item">
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					</div>
					

				<?php endwhile;

				the_posts_pagination( array(
					'prev_text' => pemscores_get_svg( array( 'icon' => 'arrow-long-left', 'fallback' => true ) ) . __( 'Recientes', 'pemscores' ),
					'next_text' => __( 'Anteriores', 'pemscores' ) . pemscores_get_svg( array( 'icon' => 'arrow-long-right' , 'fallback' => true ) ),
					'before_page_number' => '<span class="screen-reader-text">' . __( 'Página ', 'pemscores' ) . '</span>',
				));

			?>
			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();


else :

	get_template_part( 'template-parts/content', 'none' );
	return;

endif;
?>

<script>
	var elem = document.querySelector('.grid');
	var msnry = new Masonry( elem, {
	// options
	percentPosition: true,
	columnWidth: '.grid-sizer',
	itemSelector: '.grid-item',
	transitionDuration: '0.8s',
	stagger: 30,
	});

	// element argument can be a selector string
	//   for an individual element
	var msnry = new Masonry( '.grid', {
	// options
	});
</script>
