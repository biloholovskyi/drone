<?php
	/**  The template for displaying the footer  **/
	if ( ! is_page_template( 'quadron-elementor-page.php' ) ) {

		echo "</main>";

        if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
            quadron_footer();
        }
		
		// include logo, menu and widgets contents
		do_action('quadron_side_menu_action');
		do_action( 'quadron_before_footer' );

		wp_footer();
	}
?>

</body>
</html>
