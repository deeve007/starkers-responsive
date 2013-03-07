<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>

	<section class="main-content">
		<?php if ( is_day() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h1>							
		<?php elseif ( is_month() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h1>	
		<?php elseif ( is_year() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>								
		<?php else : ?>
			<h1>Archive</h1>	
		<?php endif; ?>

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
		<h1>No posts to display</h1>	
	</article>
		
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>