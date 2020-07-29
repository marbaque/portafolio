<?php get_header(); ?>

<?php if (have_posts()) : ?>

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
						Portafolio de evidencias
					</h1>
				</header>
			<?php endif; ?>

			<div class="grid">

				<?php while (have_posts()) : the_post(); ?>

					<div class="grid-item">
						<?php get_template_part('template-parts/content', get_post_format()); ?>
					</div>


				<?php endwhile;

				the_posts_pagination(array(
					'prev_text' => pemscores_get_svg(array('icon' => 'arrow-long-left', 'fallback' => true)) . __('Recientes', 'pemscores'),
					'next_text' => __('Anteriores', 'pemscores') . pemscores_get_svg(array('icon' => 'arrow-long-right', 'fallback' => true)),
					'before_page_number' => '<span class="screen-reader-text">' . __('Página ', 'pemscores') . '</span>',
				));

				?>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	//get_sidebar();
	get_footer();


else :

	get_template_part('template-parts/content', 'none');
	return;

endif;
?>