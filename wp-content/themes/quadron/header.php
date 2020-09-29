<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<!-- Meta UTF8 charset -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />

	<?php wp_head(); ?>

</head>

<!-- BODY START -->
<body <?php body_class(); ?>>

    <?php

        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }


    	if ( ! is_page_template( 'quadron-elementor-page.php' ) ) {
    		// theme preloader
    		quadron_preloader();
    		// use this action to add any content before  header container element
    		do_action('quadron_before_header');
            if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
        		// include logo, menu and more contents
        		do_action('quadron_header_action');
            }
    		// theme back to top button
    		quadron_backtop();

    		echo '<main id="mainContent">';
    	}

	?>
