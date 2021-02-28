<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pemscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	// Load value
	$video = get_field('pf_video');

	if ($video) : ?>
		<div class="embed-container featured-image full-bleed">
			<?php the_field('pf_video'); ?>
		</div>

	<?php elseif (has_post_thumbnail()) : ?>
		<figure class="featured-image full-bleed">
			<?php the_post_thumbnail('pemscores-full-bleed'); ?>
		</figure><!-- .featured-image full-bleed -->
	<?php endif; ?>

	<?php
	if (function_exists('pemscores_breadcrumbs')) {
		pemscores_breadcrumbs();
	}
	?>

	<header class="entry-header">
		<?php pemscores_the_category_list(); ?>

		<?php
		if (is_single()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif; ?>

		<div class="entry-meta">
			<?php portafolios_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<section class="post-content">

		<div class="post-content__wrap">


			<?php if (have_rows('pf_contenidos')) : ?>
				<aside class="item-sidebar">
					<div class="sticky-things">
						<div class="widget widget-secciones">
							<h3 class="menu-title">Contenidos</h3>
							<ul class="menu-secciones">
								<?php while (have_rows('pf_contenidos')) : the_row();
									$secTitle = get_sub_field('seccion_title');
								?>
									<li><a href="#title_<?php echo get_row_index(); ?>"><?php echo $secTitle; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php
						require get_stylesheet_directory() . '/inc/map.php';

						$location = get_field('pf_map');
						if ($location) : ?>
							<div class="widget widget-map">
								<h3 class="menu-title map">Ubicación</h3>
							</div>
							<div class="acf-map" data-zoom="16">
								<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
							</div>

						<?php endif; ?>
					</div>
				</aside>
			<?php endif; ?>


			<div class="entry-content post-content">
				<?php if (have_rows('pf_contenidos')) : ?>
					<div class="secciones">
						<?php while (have_rows('pf_contenidos')) : the_row();
							$secTitle = get_sub_field('seccion_title');
							$secCont = get_sub_field('pf_seccion');
						?>
							<div id="title_<?php echo get_row_index(); ?>" class="seccion">
								<h3><?php echo $secTitle; ?></h3>
								<?php echo $secCont; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php else : ?>
					<?php
					the_content(sprintf(
						/* translators: %s: Name of current post. */
						wp_kses(__('Continuar leyendo %s <span class="meta-nav">&rarr;</span>', 'pemscores'), array('span' => array('class' => array()))),
						the_title('<span class="screen-reader-text">"', '"</span>', false)
					));

					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Páginas:', 'pemscores'),
						'after'  => '</div>',
					));
					?>
				<?php endif; ?>

				<footer class="entry-footer">
					<?php pemscores_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div><!-- .entry-content -->



			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
			?>
		</div>
		<!--post-content__wrap -->
	</section><!-- .post-content -->
</article><!-- #post-## -->