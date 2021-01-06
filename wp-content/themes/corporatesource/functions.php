<?php
/**
 * customizer for this theme.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/theme-core.php';

require get_template_directory() . '/vendor/wp-bootstrap-navwalker/wp-bootstrap-navwalker.php';


require get_template_directory() . '/inc/theme-layout-hooks.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/post_hooks.php';


require get_template_directory() . '/inc/pro/admin-page.php';


require get_template_directory() . '/inc/tgm/required-plugins.php';
