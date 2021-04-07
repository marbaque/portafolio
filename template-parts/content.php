<?php

/**
 * Template part for displaying items del portafolio.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pemscores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_post_thumbnail()) : ?>
		<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
			<figure class="featured-image index-img">
				<?php
				the_post_thumbnail('pemscores-index-img');
				?>
			</figure><!-- .featured-image index-image -->
		</a>
	<?php endif; ?>

	<div class="post__content">
		<header class="entry-header">
			<?php pemscores_the_category_list(); ?>
			<?php
			if (is_single()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;

			if ('post' === get_post_type()) : ?>
				<div class="entry-meta">
					<?php portafolios_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			// Mostrar el texto de la primera sección del 
			// field pf_contenidos en vez del excerpt.
			$secciones = get_field('pf_contenidos' );
			if( $secciones ) :
				$first_row = $secciones[0];
				$first_row_content = $first_row['pf_seccion'];
				echo substr( strip_tags($first_row_content), 0, 180 );
				echo '...';
			?>
				
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>
		</div><!-- .entry-content -->

	</div><!-- .post__content -->
</article><!-- #post-## -->