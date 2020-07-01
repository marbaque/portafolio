<?php get_header(); ?>

<?php
// the query
$pf_all_query = new WP_Query(array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => -1,
));
?>
<?php if ($pf_all_query->have_posts()) : ?>

	<div id="primary" class="portafolios-area">
		<main id="main" class="site-main" role="main">

			<?php
			if (function_exists('pemscores_breadcrumbs')) {
				pemscores_breadcrumbs();
			}
			?>

			<?php if (is_home() && !is_front_page()) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php else : ?>
				<header>
					<h1 class="page-title screen-reader-text">
					<?php the_title(); ?>
					</h1>
				</header>
			<?php endif; ?>

			<div class="grid">
				<?php while ($pf_all_query->have_posts()) : $pf_all_query->the_post(); ?>
					<div class="grid-sizer"></div>
						<?php get_template_part('template-parts/content', get_post_format()); ?>
					<?php wp_reset_postdata(); ?>


			<?php endwhile;


			endif; ?>

			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_footer(); ?>