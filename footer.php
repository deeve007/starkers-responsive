
	<footer id="colophon">
		&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
	</footer>

</div><!-- /#wrapper -->

<!-- javascript required for flexnav responsive menu -->
<script src="http://code.jquery.com/jquery-1.9.0.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.flexnav.min.js"></script>
<script>
	$(".flexnav").flexNav();
</script>

<?php wp_footer(); ?>
</body>
</html>