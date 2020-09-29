<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WordPress
* @subpackage Quadron
* @since 1.0.0
*/

get_header();

do_action( "quadron_before_index" );

	$quadron_justify = (stripos(quadron_sidebar_control('index_layout'), 'nt-no-sidebar') !== false) ? ' justify-content-center no-gutter' : '';
	$index_container = quadron_settings( 'index_container_type', 'container' );
	$row_off = 'container-off' == $index_container ? ' row-off' : '';
	$layout_col = quadron_sidebar_control( 'index_layout' );
	$layout_col = (stripos(quadron_sidebar_control('index_layout'), 'nt-no-sidebar') !== false) ? 'col-12 col-lg-12 nt-no-sidebar' : $layout_col;

    $grid_style = quadron_settings( 'grid_style', '1' );
    $index_type = quadron_settings( 'index_type', 'grid' );

?>
<!-- container -->
<div id="nt-index" class="nt-index">

	<!-- Hero section - this function using on all inner pages -->
	<?php quadron_hero_section(); ?>

	<div class="nt-theme-inner-container section section__indent-12">
		<div class="<?php echo esc_attr($index_container); ?>">
			<div class="row<?php echo esc_attr($quadron_justify.$row_off); ?>">

				<!-- left sidebar -->
				<?php if( 'left-sidebar' == quadron_settings( 'index_layout', 'right-sidebar' ) ) {
					get_sidebar();
				} ?>

				<!-- Sidebar column control -->
				<div class="<?php echo esc_attr( $layout_col); ?>">
					<?php

						if ( have_posts() ) {

							// masonry type
							if( 'masonry' == quadron_settings( 'index_type', 'grid' ) ) {
								echo '<div class="row">';
								echo '<div id="masonry-container">';
							}
							if( 'grid' == quadron_settings( 'index_type', 'grid' ) ) {
								echo '<div class="row">';
							}

								while ( have_posts() ) : the_post();

									// if there are posts, run quadron_post function
									// contain supported post formats from theme
									if ( '1' == $grid_style && 'default' == $index_type ) {

										quadron_post_style_one();

									} elseif ('2' == $grid_style && 'default' == $index_type ) {

										quadron_post_style_two();

									} else {

										quadron_post();

									}

								endwhile;

							// masonry type container end
							if( 'masonry' == quadron_settings( 'index_type', 'grid' ) ) {
								echo '</div>';
								echo '</div>';
							}
							if( 'grid' == quadron_settings( 'index_type', 'grid' ) ) {
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
				<!-- End sidebar column control -->

				<!-- right sidebar -->
				<?php if( 'right-sidebar' == quadron_settings( 'index_layout', 'right-sidebar' ) ) {
					 get_sidebar();
				 } ?>

			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</div>
	<!--End #blog -->
</div>
<!--End index general div -->

<?php

	// you can use this action to add any content after index page
	do_action( "quadron_after_index" );

	get_footer();

?>
