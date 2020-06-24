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
	if (has_post_thumbnail()) { ?>
		<figure class="featured-image full-bleed">
			<?php
			the_post_thumbnail('pemscores-full-bleed');
			?>
		</figure><!-- .featured-image full-bleed -->
	<?php } ?>

	<header class="entry-header">
		<?php pemscores_the_category_list(); ?>

		<?php
		if (is_single()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif; ?>

		<div class="entry-meta">
			<?php pemscores_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<section class="post-content">

		<div class="post-content__wrap">



			<div class="entry-content">
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
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php pemscores_entry_footer(); ?>
			</footer><!-- .entry-footer -->

			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
			?>
		 </div><!--post-content__wrap -->
	</section><!-- .post-content -->
</article><!-- #post-## -->