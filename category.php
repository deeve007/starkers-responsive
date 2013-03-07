<?php
/**
 * The template for displaying Category Archive pages
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>

	<section class="main-content">
		<h1>Category Archive: <?php echo single_cat_title( '', false ); ?></h1>
	
		<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_excerpt(); ?>
		</article>
		<?php endwhile; ?>
	</section>
	
	<?php content_nav( 'nav-below' ); ?>

<?php else: ?>

	<article class="main-content">
		<h1>No posts to display in <?php echo single_cat_title( '', false ); ?></h1>
	</article>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>