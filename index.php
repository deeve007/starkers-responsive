<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	
	<section class="main-content">
		<h1>Latest Posts</h1>	
	
		<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_excerpt(); ?>
		</article>
		<?php endwhile; ?>
	</section>
	
	<?php content_nav( 'nav-below' ); ?>
	
<?php else: ?>

	<h1>No posts to display</h1>
	
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>