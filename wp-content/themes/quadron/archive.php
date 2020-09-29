<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Quadron
 * @since 1.0.0
 */

	get_header();

	do_action( "quadron_before_archive" );

	$quadron_justify = (stripos(quadron_sidebar_control('archive_layout'), 'nt-no-sidebar') !== false) ? ' justify-content-center' : '';
	?>

		<!-- container -->
		<div id="nt-archive" class="nt-archive" >

			<!-- Hero section - this function using on all inner pages -->
			<?php quadron_hero_section(); ?>

			<div class="nt-theme-inner-container section section__indent-12">
				<div class="container">
					<div class="row<?php echo esc_attr($quadron_justify); ?>">

						<!-- left sidebar -->
						<?php if( 'left-sidebar' == quadron_settings( 'archive_layout', 'right-sidebar' )) {
							get_sidebar();
						} ?>

						<!-- Sidebar column control -->
						<div class="<?php echo quadron_sidebar_control( 'archive_layout' ); ?>">

                            <?php

                                if ( have_posts() ) {

                                    // masonry type
                                    if( 'masonry' == quadron_settings( 'index_type', 'grid' ) ) {

                                        echo '<div class="row">';
                                        echo '<div id="masonry-container">';

                                    }
                                    $quadron_inner_grid_style = '';
                                    if( 'grid' == quadron_settings( 'index_type', 'grid' ) ) {
                                        $quadron_inner_grid_style = quadron_settings( 'grid_style', '1' );
                                        echo '<div class="posts posts--s'.esc_attr($quadron_inner_grid_style).'">';
                                        echo '<div class="__inner">';
                                        echo '<div class="row">';

                                    }

                                        while ( have_posts() ) : the_post();

                                            // if there are posts, run quadron_post function
                                            // contain supported post formats from theme
                                            if ('1' == $quadron_inner_grid_style) {

                                                echo quadron_post_style_one();

                                            } elseif ('2' == $quadron_inner_grid_style) {

                                                echo quadron_post_style_two();

                                            } elseif ('3' == $quadron_inner_grid_style) {

                                                echo quadron_post_style_three();

                                            } elseif ('4' == $quadron_inner_grid_style) {

                                                echo quadron_post_style_four();

                                            } else {

                                                quadron_post();
                                            }

                                        endwhile;

                                    // masonry type container end
                                    if( 'masonry' == quadron_settings( 'index_type', 'grid' ) ) {

                                        echo '</div>';
                                        echo '</div>';

                                    }
                                    // masonry type container end
                                    if( 'grid' == quadron_settings( 'index_type', 'grid' ) ) {

                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';

                                    }

                                    echo '<div class="clearfix"></div>';

                                    // this function working with wp reading settins + posts
                                    quadron_index_loop_pagination();

                                } else {

                                    // if there are no posts, read content none function
                                    quadron_content_none();

                                }

                            ?>
						</div>
	                    <!-- End column control -->

						<!-- Right sidebar -->
						<?php if( 'right-sidebar' == quadron_settings( 'archive_layout', 'right-sidebar' ) ) {
							get_sidebar();
						} ?>

					</div>
	                <!-- End row -->
				</div>
	            <!-- End container -->
			</div>
	        <!-- End div #blog-post -->
		</div>
	    <!-- End archive page general div-->

<?php

	do_action( "quadron_after_archive" );

	get_footer();
 ?>
