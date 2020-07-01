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
	if (function_exists('pemscores_breadcrumbs')) {
		pemscores_breadcrumbs();
	}
	?>

	<?php while (have_posts()) : the_post(); ?>
		<?php acf_form(); ?>
	<?php endwhile; ?>



	</div>
	<!--post-content__wrap -->
	</section><!-- .post-content -->
</article><!-- #post-## -->