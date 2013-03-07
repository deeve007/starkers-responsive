<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article class="main-content">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php // comments_template( '', true ); // pages never have comments, but uncomment if you want ?>
	</article>

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>