<?php
/*
** Template Name: Nuevo item de portafolio
*/

acf_form_head();

get_header();

?>
<div id="content" class="site-content" role="main">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<p>
	Utilice este formulario para compartir en una página las evidencias de su ejercicio o experiencia. Por favor añada un título y una imagen representativa de su relato. Si desea ver lo que otros han compartido, revise la colección completa de portafolios.
	</p>

	<p>Gracias por agregar su proyecto en esta colección. Los campos marcados con * son obligatorios.</p>

	<?php acf_form('new-portafolio'); ?>
	
</div>

<?php get_footer(); ?>