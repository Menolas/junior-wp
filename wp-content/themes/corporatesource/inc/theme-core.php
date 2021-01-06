<?php
/**
 * Corporate Source functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Corporate_Source
 */

if ( ! function_exists( 'corporatesource_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function corporatesource_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Corporate Source, use a find and replace
		 * to change 'corporatesource' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'corporatesource', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'corporatesource' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		/*
		* Enable support for Post Formats.
		* See https://developer.wordpress.org/themes/functionality/post-formats/
		*/
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
			'quote'
		) );
		
		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'corporatesource_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		// Add theme editor style.
		add_editor_style( 'assets/editor-style.css' );
		
	}
endif;
add_action( 'after_setup_theme', 'corporatesource_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corporatesource_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corporatesource_content_width', 640 );
}
add_action( 'after_setup_theme', 'corporatesource_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corporatesource_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corporatesource' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corporatesource' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'corporatesource' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'corporatesource' ),
		'before_widget' => '<aside id="%1$s" class="col-md-4 col-sm-6 col-xs-6 ftr-widget widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Slider', 'corporatesource' ),
		'id'            => 'front_page_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'corporatesource' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Page Slider', 'corporatesource' ),
		'id'            => 'blog_page_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'corporatesource' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title screen-reader-text">',
		'after_title'   => '</h3>',
	) );
	
	
}
add_action( 'widgets_init', 'corporatesource_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function corporatesource_scripts() {
	/* PLUGIN CSS */
	wp_enqueue_style( 'corporatesource-raleway','//fonts.googleapis.com/css?family=Raleway:400,600,700' );
	wp_enqueue_style( 'corporatesource-Roboto+Condensed','//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' );
	wp_enqueue_style( 'corporatesource-Poppins','//fonts.googleapis.com/css?family=Poppins:400,600,700' );

	/* PLUGIN CSS */
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/vendor/bootstrap/css/bootstrap.css' ), '3.3.7' );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/vendor/font-awesome/css/font-awesome.css' ), '4.7.0' );
	wp_enqueue_style( 'bootstrap-toolkit', get_theme_file_uri( '/assets/css/bootstrap_toolkit.css' ), '7.0.0' );
	wp_enqueue_style( 'rd-navbar-css', get_theme_file_uri( '/vendor/rd-navbar/css/rd-navbar.css' ), '2.1.6' );
	wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/vendor/owlCarousel/assets/owl.carousel.css' ), '2.2.1' );
	wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/vendor/magnific-popup/magnific-popup.css' ), '1.1.0' );
	
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'corporatesource-style', get_stylesheet_uri() );
	
	$secondary_color = corporatesource_get_option('primary_color');  
      	$custom_css = '
            a,.post-comments .media-content > a::before,.post-comments .media-content > a,.form-group .btn,.button,.post-modern__title a:hover,.post-modern__meta > li i,.widget-title span.color_style,#secondary li a:hover, #secondary li:hover::before,h2 span.color_style,.feature-block::before,.feature-block a,ul.cs-icon-list li .icon,.rd-navbar-static.rd-navbar-transparent .rd-navbar-nav > li.active > a, .rd-navbar-static.rd-navbar-transparent .rd-navbar-nav > li > a:focus,.rd-navbar-static.rd-navbar-transparent .rd-navbar-nav > li > a:hover,.read_more_icon,#hero_block .btn, #hero_block .btn.blue:hover,a:hover, a:focus,.theme-loop-product__title a:hover,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a::after,.service-icon i,.footer-main button { color:'.esc_attr( $secondary_color ).';}
			
			 .post-modern__title a:hover, .post-modern__meta > li i,.post-modern__meta a:hover,.woocommerce .multipurpose-shop-grid-list a.active,.woocommerce .multipurpose-shop-grid-list a:hover,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.address-box .address-content i,.woocommerce-message::before, .woocommerce .woocommerce-breadcrumb a:hover,.woocommerce .woocommerce-message a.button:hover, .woocommerce .woocommerce-message button.button:hover, .woocommerce .woocommerce-message input.button:hover,td.product-name a:hover,.service-item .inner h4 a:hover,.service-item .inner h4 a span,.why-choose-icon,li.rd-navbar--has-dropdown:hover>a, .rd-navbar-static .rd-navbar-dropdown > li > a:hover,.rd-navbar-static .rd-navbar-dropdown > li > a::before{
				  color:'.esc_attr( $secondary_color ).';
			 }
			 .product-category-image-grid-wrp a.more-link:hover,
			 .single-product-extra-container li a:hover{
				  background-color:'.esc_attr( $secondary_color ).'!important;
			 }
			  
			.woocommerce-message {
				border-top-color:'.esc_attr( $secondary_color ).';
			}

			.form-group .btn:hover,.button:hover,.ui-to-top,.widget_search .search-submit,#primary .search-form .search-submit,.cs-work-process:hover .project-icon,.project-icon p,.cs-work-process::before,.cs-services .s-feature-box,.portfolio-filter ul li.active, .portfolio-filter ul li:hover, .tags_wrp a:hover,.feature-block::before,.address-box .address-content-1,.tc-member-style1 .member-icons,.tc-member-style1 .member-icons::before,.tc-member-style1.member-align-center .member-icons::after,.list-style li:hover::before,.widget_search .search-submit, #primary .search-form .search-submit,.theme-btn, .woocommerce ul.products li.product .button.theme-btn, .woocommerce ul.products li.product a.button,.woocommerce span.onsale, .woocommerce ul.products li.product .onsale,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,button.plus:hover, button.minus:hover,.woocommerce .woocommerce-message a.button, .woocommerce .woocommerce-message button.button, .woocommerce .woocommerce-message input.button,.woocommerce button.button, .woocommerce input.button, .woocommerce a.button,.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover,.owl-nav [class*="owl-"],.pagination-custom a:hover, .pagination-custom span.current,.swatch.swatch-label.opacity.selected,.why-choose-inner:hover .why-choose-icon,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .ui-slider .ui-slider-range{ background-color:'.esc_attr( $secondary_color ).'; }
			
			#primary .search-form .search-submit,.widget_search .search-submit,ul.cs-icon-list li .icon,.cs-services i,.cs-services .mask-bottom i,.portfolio-filter ul li.active, .portfolio-filter ul li:hover,.tags_wrp a:hover,.list-style li::before,.widget_search .search-submit, #primary .search-form .search-submit,.woocommerce button.button, .woocommerce input.button, .woocommerce a.button,.woocommerce .multipurpose-shop-grid-list a.active,.woocommerce .multipurpose-shop-grid-list a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce .woocommerce-message a.button, .woocommerce .woocommerce-message button.button, .woocommerce .woocommerce-message input.button,.woocommerce .coupon input.button,.woocommerce form .form-row .input-text:focus, .woocommerce-page form .form-row .input-text:focus, .woocommerce form .form-row .input-text:focus,#hero_block .btn:hover, #hero_block .btn.blue,#hero_block .btn, #hero_block .btn.blue:hover,.pagination-custom a:hover, .pagination-custom span.current,.why-choose-icon{ border-color:'.esc_attr( $secondary_color ).';} ';
			
			
	
	 wp_add_inline_style( 'corporatesource-style', $custom_css );
	
	/* PLUGIN JS */
	wp_enqueue_script( 'tether', get_theme_file_uri( '/vendor/tether.js' ), 0, '', true );
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/vendor/bootstrap/js/bootstrap.js' ), array('jquery','masonry','imagesloaded'), '3.3.7', true );
	
	wp_enqueue_script( 'rd-navbar-js', get_theme_file_uri( '/vendor/rd-navbar/js/jquery.rd-navbar.js' ), 0, '', true );
	wp_enqueue_script( 'jquery-toTop', get_theme_file_uri( '/vendor/jquery.toTop.js' ), 0, '', true );
	wp_enqueue_script( 'owl-carousel', get_theme_file_uri(  '/vendor/owlCarousel/owl.carousel.js' ), 0, '', true );
	wp_enqueue_script( 'magnific-popup', get_theme_file_uri(  '/vendor/magnific-popup/jquery.magnific-popup.js' ), 0, '', true );
	
	/*THEME JS */
	wp_enqueue_script( 'corporatesource-js', get_theme_file_uri( '/assets/js/corporatesource.js' ), 0, '20151215', true );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'corporatesource_scripts' );



/**
 * Set up the WordPress core custom header feature.
 *
 * @uses corporatesource_header_style()
 */
function corporatesource_custom_header_setup() {
	
	add_theme_support( 'custom-header', apply_filters( 'corporatesource_custom_header_args', array(
			'default-image' => get_template_directory_uri() . '/images/custom-header.jpg',
			'width'         => 1920,
			'height'        => 500,
			'flex-height'   => false,
			'header-text'   => false,
	) ) );
	
	
	register_default_headers( array(
		'default-image' => array(
		'url' => '%s/images/custom-header.jpg',
		'thumbnail_url' => '%s/images/custom-header.jpg',
		'description' => esc_html__( 'Default Header Image', 'corporatesource' ),
		),
	));
}
add_action( 'after_setup_theme', 'corporatesource_custom_header_setup' );

if ( ! function_exists( 'corporatesource_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see corporatesource_custom_header_setup().
	 */
	function corporatesource_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function corporatesource_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'corporatesource_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function corporatesource_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'corporatesource_pingback_header' );