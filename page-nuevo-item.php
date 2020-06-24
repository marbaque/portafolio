<?php 

acf_form_head();

get_header();

?>
<div id="content" class="site-content" role="main">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php acf_form('new-portafolio'); ?>
	
</div>

<?php get_footer(); ?>