<aside class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'Sidebar 1' ) ) { ?>
		<?php dynamic_sidebar( 'Sidebar 1' ); ?>
	<?php } else { ?>
		<?php get_search_form(); ?>
	<?php } ?>
</aside>
