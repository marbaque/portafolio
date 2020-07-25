<? get_header(); ?>

<?
// the query
$pf_all_query = new WP_Query(array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => -1,
));
?>
<? if ($pf_all_query->have_posts()) : ?>

	<div id="primary" class="portafolios-area">
		<main id="main" class="site-main" role="main">

			<?
			if (function_exists('pemscores_breadcrumbs')) {
				pemscores_breadcrumbs();
			}
			?>

			<? if (is_home() && !is_front_page()) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><? single_post_title(); ?></h1>
				</header>
			<? else : ?>
				<header>
					<h1 class="page-title screen-reader-text">
					<? the_title(); ?>
					</h1>
				</header>
			<? endif; ?>
				
			<div class="grid">
				<? while ( have_posts() ) : the_post(); ?>
					
					<div class="grid-sizer"></div>
						<? get_template_part( 'template-parts/content', get_post_format() ); ?>
					<? wp_reset_postdata(); ?>


				<? endwhile;


			endif; ?>

			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

	<? get_footer(); ?>