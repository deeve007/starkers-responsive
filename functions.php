<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
	 * @package 	WordPress
	 * @subpackage 	Starkers
	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Add menu and thumbnail support

	======================================================================================================================== */

	register_nav_menus(array('primary' => 'Primary Navigation'));

	add_theme_support('post-thumbnails');

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	if (!is_admin()) add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
		
		// add css file for menu
		wp_register_style( 'navcss', get_template_directory_uri().'/css/nav.css', '', '', 'screen' );
		wp_enqueue_style( 'navcss' );
		
		// add jquery to theme
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
		wp_enqueue_script('jquery');
	}
	
	// need to manually add html5 shim for IE versions not supporting html5
	add_action( 'wp_head', 'wps_add_ie_html5_shim' );
	function wps_add_ie_html5_shim() {
		global $is_IE;
		if ( $is_IE ) {
			echo '<!--[if lt IE 9]>';
			echo '<script src="'.get_stylesheet_directory_uri().'/js/html5shiv.js"></script>';
			echo '<![endif]-->';
		}
	}

	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>"><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/* ========================================================================================================================

	Archive Pagination: Displays navigation to next/previous pages when applicable.

	======================================================================================================================== */

	if ( ! function_exists( 'content_nav' ) ) :
		function content_nav( $html_id ) {
			global $wp_query;
			$html_id = esc_attr( $html_id );
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="pagination">
					<div class="past-page"><?php previous_posts_link( 'Newer &raquo;' ); ?></div>
					<div class="next-page"><?php next_posts_link( ' &laquo; Older' ); ?></div>
				</nav>
			<?php endif;
		}
	endif;

	/* ========================================================================================================================

	Sidebars

	======================================================================================================================== */

	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => 'Sidebar 1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
	}
	
	/* ========================================================================================================================

	Google Analytics

	======================================================================================================================== */
	
	add_action('wp_footer', 'add_googleanalytics');
	function add_googleanalytics() { ?>
		<!-- paste you google analytics code here -->
	<?php }
	
	/* ========================================================================================================================

	Extra WP Security

	======================================================================================================================== */
	
	// Remove WP version number from all frontend feeds
	remove_action('wp_head', 'wp_generator');
	
	// remove wp version param from any enqueued scripts
	function vc_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

?>