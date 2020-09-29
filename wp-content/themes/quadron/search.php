<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Quadron
 * @since 1.0.0
 */
	get_header();
	// you can use this action for add any content before container element
	do_action( "quadron_before_search" );
	$quadron_justify = (stripos(quadron_sidebar_control('search_layout'), 'nt-no-sidebar') !== false) ? ' justify-content-center' : '';

?>
<!-- Search page general div -->
	<div id="nt-search" class="nt-search">
		<!-- Hero section - this function using on all inner pages -->
		<?php quadron_hero_section(); ?>
		<div class="nt-theme-inner-container section section__indent-12">
			<div class="container">
				<div class="row<?php echo esc_attr($quadron_justify); ?>">
					<!-- Left sidebar -->
					<?php if( 'left-sidebar' == quadron_settings( 'search_layout', 'right-sidebar' )) {
						get_sidebar();
					} ?>
					<!-- Sidebar none -->
					<div class="<?php echo quadron_sidebar_control( 'search_layout' ); ?>">
					<?php
					if ( have_posts() ) {

						$quadron_inner_grid_style = quadron_settings( 'grid_style', '1' );
						while ( have_posts() ) : the_post();
							quadron_post_style_one();
						endwhile;

						echo '<div class="clearfix"></div>';
						// this function working with wp reading settins + posts
						quadron_index_loop_pagination();
						} else {
							// if there are no posts, read content none function
						quadron_content_none();
						}
					?>
					</div><!-- End sidebar + content -->
					<!-- Right sidebar -->
					<?php if( 'right-sidebar' == quadron_settings( 'search_layout', 'right-sidebar' ) ) {
						get_sidebar();
					} ?>
				</div><!-- End row -->
			</div><!-- End container -->
		</div><!-- End #blog-post -->
	</div><!--End search page general div -->

<?php
	// you can use this action to add any content after search page
	do_action( "quadron_after_search" );
	get_footer();
?>
