<?php
/**
 * The template for displaying Author Archive pages
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): the_post(); ?>

	<section class="main-content">
		<h1>Author Archives: <?php echo get_the_author() ; ?></h1>

		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h2>About <?php echo get_the_author() ; ?></h2>
			<?php the_author_meta( 'description' ); ?>
		<?php endif; ?>

		<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_content(); ?>
		</article>
		<?php endwhile; ?>
	</section>
	
	<?php content_nav( 'nav-below' ); ?>

<?php else: ?>

	<article class="main-content">
		<h1>No posts to display for <?php echo get_the_author() ; ?></h1>
	</article>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>