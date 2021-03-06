<?php
/**
 * The Template for displaying all single posts
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article class="main-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
		<?php the_content(); ?>			

		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h2>About <?php echo get_the_author() ; ?></h2>
			<?php the_author_meta( 'description' ); ?>
		<?php endif; ?>

		<?php comments_template( '', true ); ?>
	</article>

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>