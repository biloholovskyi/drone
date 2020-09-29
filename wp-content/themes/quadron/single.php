<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Quadron
 * @since 1.0.0
 */

	get_header();

    if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

    	// you can use this action to add any content before single page
    	do_action( "quadron_before_post_single" );

    	$quadron_justify = (stripos(quadron_sidebar_control('single_layout'), 'nt-no-sidebar') !== false) ? ' justify-content-center' : '';
        ?>
    	<!-- Single page general div -->
    	<div id="nt-single" class="nt-single">

    		<!-- Hero section - this function using on all inner pages -->
    		<?php quadron_hero_section(); ?>

    		<!-- Section Post -->
    		<div class="nt-theme-inner-container section section__indent-12">
    			<div class="container">
    				<div class="row<?php echo esc_attr($quadron_justify); ?>">

    					<!-- Left sidebar -->
    					<?php if( 'left-sidebar' == quadron_settings( 'single_layout', 'right-sidebar' )) {
    						get_sidebar();
    					} ?>

    					<!-- Sidebar column control -->
    					<div class="<?php echo quadron_sidebar_control('single_layout'); ?>">

    						<div class="content-container">

    							<!-- start posts -->
    							<div class="nt-theme-content nt-clearfix">

                						<?php
                							// Post content
                							while ( have_posts() ) : the_post();

                								quadron_single_page_post_content();

                							endwhile;

    								echo '</div>'; // nt-theme-content
    							echo '</div>'; // nt-theme-content

                                // single post tags
                                quadron_single_post_categories();

                                // single post tags
                                quadron_single_post_tags();

    							// Post navigation
    							quadron_single_navigation_two();

    							// Related post
    							quadron_single_post_related_two();

    							// Author box
    							quadron_single_post_author_box();

    						 	// Post comments
    							if ( comments_open() || '0' != get_comments_number() ) {
    								comments_template();
    							}

    						?>

    					</div><!-- End column sidebar control -->

    					<!-- Right sidebar -->
    					<?php if( 'right-sidebar' == quadron_settings( 'single_layout', 'right-sidebar' ) ) {
    						get_sidebar();
    					} ?>

    				</div><!-- End row -->
    			</div><!-- End container -->
    		</div><!-- End Section Post -->
    	</div><!--End single page general div -->
        <?php
	   do_action( "quadron_after_post_single" );
    }

	get_footer();
 ?>
