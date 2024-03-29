<?php

/**
* default page template
*/

	get_header();

    $quadron_page_layout = function_exists('get_field') ? get_field('quadron_page_layout'): 'full-width';

	// if empty metabox option set metabox page layout
	$quadron_page_layout_ctrl = ( $quadron_page_layout == 'left-sidebar' OR $quadron_page_layout == 'right-sidebar' ) ? 'col-12 col-lg-8 col-xl-8 pr-lg-40 nt-has-sidebar' : 'col-10 col-lg-10 nt-no-sidebar' ; // sidebar setting
	$quadron_justify = 'full-width' == $quadron_page_layout ? ' justify-content-center' : '';


	do_action( "quadron_before_page" );

?>

	<div id="nt-page-container" class="nt-page-layout">

		<!-- Hero section - this function using on all inner pages -->
		<?php quadron_hero_section(); ?>

		<div id="nt-page" class="nt-theme-inner-container section section__indent-12">
			<div class="container">
				<div class="row<?php echo esc_attr($quadron_justify); ?> justify-content-center">

					<!-- Left sidebar -->
					<?php if( $quadron_page_layout =='left-sidebar' ){
                        get_sidebar();
                    } ?>

					<!-- Sidebar control column -->
					<div class="<?php echo esc_attr( $quadron_page_layout_ctrl ) ?>">

					<?php while ( have_posts() ) : the_post(); ?>

						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="nt-theme-content nt-clearfix content-container">
								<?php

									/* translators: %s: Name of current post */
									the_content( sprintf(
										esc_html__( 'Continue reading %s', 'quadron' ),
										the_title( '<span class="screen-reader-text">', '</span>', false )
									) );

									/* theme page link pagination */
									quadron_wp_link_pages();

								?>
							</div><!-- End .nt-theme-content -->

						</div><!--End article -->

						<?php

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}

							// End the loop.
							endwhile;

						?>

					</div>

					<!-- Right sidebar -->
					<?php if( $quadron_page_layout =='right-sidebar' ){
                        get_sidebar();
                    } ?>

				</div><!--End row -->
			</div><!--End container -->
		</div><!--End #blog -->
	</div><!--End page general div -->

<?php

    // you can use this action for add any content after container element
	do_action( "quadron_after_page" );
	get_footer();

?>
