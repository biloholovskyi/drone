<?php
/**
 * Quadron Admin Page Template
 */
?>

	<div class="quadron-admin-wrapper">
		<div class="container">

			<div class="page-heading">
				<h1 class="page-title"><?php _e( 'Quadron Addons', 'quadron' ); ?></h1>
				<p class="page-description">
					<?php _e( 'Premium & Advanced Essential Elements for Elementor', 'quadron' ); ?>
				</p>
			</div>

			<form class="quadron-form" method="post">

				<div class="row widget-row">

					<div class="col-md-4">
						<div class="widget-toggle">
							<?php
								add_option( 'disable_quadron_button', 0 );
								if ( isset( $_POST['disable_quadron_button'] ) ) {
									update_option( 'disable_quadron_button', $_POST['disable_quadron_button'] );
								}
							?>
							<div class="custom-control custom-switch">
								<input type="hidden" name="disable_quadron_button" value="1">
								<input type="checkbox" class="custom-control-input" id="disable_quadron_button" name="disable_quadron_button" value="0" <?php checked( 0, get_option( 'disable_quadron_button' ), true ); ?>>
								<label class="custom-control-label" for="disable_quadron_button"><?php _e( 'Button', 'quadron' ); ?></label>
							</div>
						</div>
					</div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_section_heading', 0 );
	                        if ( isset( $_POST['disable_quadron_section_heading'] ) ) {
	                            update_option( 'disable_quadron_section_heading', $_POST['disable_quadron_section_heading'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_section_heading" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_section_heading" name="disable_quadron_section_heading" value="0" <?php checked( 0, get_option( 'disable_quadron_section_heading' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_section_heading"><?php _e( 'Section Heading', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_page_hero_section', 0 );
	                        if ( isset( $_POST['disable_quadron_page_hero_section'] ) ) {
	                            update_option( 'disable_quadron_page_hero_section', $_POST['disable_quadron_page_hero_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_page_hero_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_page_hero_section" name="disable_quadron_page_hero_section" value="0" <?php checked( 0, get_option( 'disable_quadron_page_hero_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_page_hero_section"><?php _e( 'Page Hero', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_home_slider_one', 0 );
	                        if ( isset( $_POST['disable_quadron_home_slider_one'] ) ) {
	                            update_option( 'disable_quadron_home_slider_one', $_POST['disable_quadron_home_slider_one'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_home_slider_one" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_home_slider_one" name="disable_quadron_home_slider_one" value="0" <?php checked( 0, get_option( 'disable_quadron_home_slider_one' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_home_slider_one"><?php _e( 'Home Slider 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_home_slider_two', 0 );
	                        if ( isset( $_POST['disable_quadron_home_slider_two'] ) ) {
	                            update_option( 'disable_quadron_home_slider_two', $_POST['disable_quadron_home_slider_two'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_home_slider_two" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_home_slider_two" name="disable_quadron_home_slider_two" value="0" <?php checked( 0, get_option( 'disable_quadron_home_slider_two' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_home_slider_two"><?php _e( 'Home Slider 2', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_home_slider_three', 0 );
	                        if ( isset( $_POST['disable_quadron_home_slider_three'] ) ) {
	                            update_option( 'disable_quadron_home_slider_three', $_POST['disable_quadron_home_slider_three'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_home_slider_three" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_home_slider_three" name="disable_quadron_home_slider_three" value="0" <?php checked( 0, get_option( 'disable_quadron_home_slider_three' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_home_slider_three"><?php _e( 'Home Slider 2', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_rev_slider', 0 );
	                        if ( isset( $_POST['disable_quadron_rev_slider'] ) ) {
	                            update_option( 'disable_quadron_rev_slider', $_POST['disable_quadron_rev_slider'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_rev_slider" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_rev_slider" name="disable_quadron_rev_slider" value="0" <?php checked( 0, get_option( 'disable_quadron_rev_slider' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_rev_slider"><?php _e( 'Revolution Slider', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_accordion_tabs_section', 0 );
	                        if ( isset( $_POST['disable_quadron_accordion_tabs_section'] ) ) {
	                            update_option( 'disable_quadron_accordion_tabs_section', $_POST['disable_quadron_accordion_tabs_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_accordion_tabs_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_accordion_tabs_section" name="disable_quadron_accordion_tabs_section" value="0" <?php checked( 0, get_option( 'disable_quadron_accordion_tabs_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_accordion_tabs_section"><?php _e( 'Accordion Tabs', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_promobox_one', 0 );
	                        if ( isset( $_POST['disable_quadron_promobox_one'] ) ) {
	                            update_option( 'disable_quadron_promobox_one', $_POST['disable_quadron_promobox_one'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_promobox_one" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_promobox_one" name="disable_quadron_promobox_one" value="0" <?php checked( 0, get_option( 'disable_quadron_promobox_one' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_promobox_one"><?php _e( 'Promobox 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_about_us_section', 0 );
	                        if ( isset( $_POST['disable_quadron_about_us_section'] ) ) {
	                            update_option( 'disable_quadron_about_us_section', $_POST['disable_quadron_about_us_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_about_us_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_about_us_section" name="disable_quadron_about_us_section" value="0" <?php checked( 0, get_option( 'disable_quadron_about_us_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_about_us_section"><?php _e( 'Abour Us 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_about_us_two_section', 0 );
	                        if ( isset( $_POST['disable_quadron_about_us_two_section'] ) ) {
	                            update_option( 'disable_quadron_about_us_two_section', $_POST['disable_quadron_about_us_two_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_about_us_two_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_about_us_two_section" name="disable_quadron_about_us_two_section" value="0" <?php checked( 0, get_option( 'disable_quadron_about_us_two_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_about_us_two_section"><?php _e( 'Abour Us 2', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_about_us_three_section', 0 );
	                        if ( isset( $_POST['disable_quadron_about_us_three_section'] ) ) {
	                            update_option( 'disable_quadron_about_us_three_section', $_POST['disable_quadron_about_us_three_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_about_us_three_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_about_us_three_section" name="disable_quadron_about_us_three_section" value="0" <?php checked( 0, get_option( 'disable_quadron_about_us_three_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_about_us_three_section"><?php _e( 'Abour Us 3', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_item', 0 );
	                        if ( isset( $_POST['disable_quadron_services_item'] ) ) {
	                            update_option( 'disable_quadron_services_item', $_POST['disable_quadron_services_item'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_item" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_item" name="disable_quadron_services_item" value="0" <?php checked( 0, get_option( 'disable_quadron_services_item' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_item"><?php _e( 'Services Item', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_section'] ) ) {
	                            update_option( 'disable_quadron_services_section', $_POST['disable_quadron_services_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_section" name="disable_quadron_services_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_section"><?php _e( 'Services Section 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_two_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_two_section'] ) ) {
	                            update_option( 'disable_quadron_services_two_section', $_POST['disable_quadron_services_two_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_two_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_two_section" name="disable_quadron_services_two_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_two_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_two_section"><?php _e( 'Services Section 2', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_three_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_three_section'] ) ) {
	                            update_option( 'disable_quadron_services_three_section', $_POST['disable_quadron_services_three_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_three_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_three_section" name="disable_quadron_services_three_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_three_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_three_section"><?php _e( 'Services Section 3', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_four_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_four_section'] ) ) {
	                            update_option( 'disable_quadron_services_four_section', $_POST['disable_quadron_services_four_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_four_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_four_section" name="disable_quadron_services_four_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_four_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_four_section"><?php _e( 'Services Section 4', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_five_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_five_section'] ) ) {
	                            update_option( 'disable_quadron_services_five_section', $_POST['disable_quadron_services_five_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_five_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_five_section" name="disable_quadron_services_five_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_five_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_five_section"><?php _e( 'Services Section 5', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_six_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_six_section'] ) ) {
	                            update_option( 'disable_quadron_services_six_section', $_POST['disable_quadron_services_six_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_six_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_six_section" name="disable_quadron_services_six_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_six_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_six_section"><?php _e( 'Services Section 6', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_services_seven_section', 0 );
	                        if ( isset( $_POST['disable_quadron_services_seven_section'] ) ) {
	                            update_option( 'disable_quadron_services_seven_section', $_POST['disable_quadron_services_seven_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_services_seven_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_services_seven_section" name="disable_quadron_services_seven_section" value="0" <?php checked( 0, get_option( 'disable_quadron_services_seven_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_services_seven_section"><?php _e( 'Services Section 7', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_features_one_section', 0 );
	                        if ( isset( $_POST['disable_quadron_features_one_section'] ) ) {
	                            update_option( 'disable_quadron_features_one_section', $_POST['disable_quadron_features_one_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_features_one_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_features_one_section" name="disable_quadron_features_one_section" value="0" <?php checked( 0, get_option( 'disable_quadron_features_one_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_features_one_section"><?php _e( 'Features Section 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_features_masonry_section', 0 );
	                        if ( isset( $_POST['disable_quadron_features_masonry_section'] ) ) {
	                            update_option( 'disable_quadron_features_masonry_section', $_POST['disable_quadron_features_masonry_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_features_masonry_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_features_masonry_section" name="disable_quadron_features_masonry_section" value="0" <?php checked( 0, get_option( 'disable_quadron_features_masonry_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_features_masonry_section"><?php _e( 'Features Masonry', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_gallery_grid_section', 0 );
	                        if ( isset( $_POST['disable_quadron_gallery_grid_section'] ) ) {
	                            update_option( 'disable_quadron_gallery_grid_section', $_POST['disable_quadron_gallery_grid_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_gallery_grid_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_gallery_grid_section" name="disable_quadron_gallery_grid_section" value="0" <?php checked( 0, get_option( 'disable_quadron_gallery_grid_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_gallery_grid_section"><?php _e( 'Gallery Section', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_counterup', 0 );
	                        if ( isset( $_POST['disable_quadron_counterup'] ) ) {
	                            update_option( 'disable_quadron_counterup', $_POST['disable_quadron_counterup'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_counterup" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_counterup" name="disable_quadron_counterup" value="0" <?php checked( 0, get_option( 'disable_quadron_counterup' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_counterup"><?php _e( 'CounterUp Item', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_video_popup_item', 0 );
	                        if ( isset( $_POST['disable_quadron_video_popup_item'] ) ) {
	                            update_option( 'disable_quadron_video_popup_item', $_POST['disable_quadron_video_popup_item'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_video_popup_item" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_video_popup_item" name="disable_quadron_video_popup_item" value="0" <?php checked( 0, get_option( 'disable_quadron_video_popup_item' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_video_popup_item"><?php _e( 'Video Popup', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_video_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_video_slider_section'] ) ) {
	                            update_option( 'disable_quadron_video_slider_section', $_POST['disable_quadron_video_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_video_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_video_slider_section" name="disable_quadron_video_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_video_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_video_slider_section"><?php _e( 'Video Slider 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_video_slider_two_section', 0 );
	                        if ( isset( $_POST['disable_quadron_video_slider_two_section'] ) ) {
	                            update_option( 'disable_quadron_video_slider_two_section', $_POST['disable_quadron_video_slider_two_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_video_slider_two_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_video_slider_two_section" name="disable_quadron_video_slider_two_section" value="0" <?php checked( 0, get_option( 'disable_quadron_video_slider_two_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_video_slider_two_section"><?php _e( 'Video Slider 2', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_video_slider_three_section', 0 );
	                        if ( isset( $_POST['disable_quadron_video_slider_three_section'] ) ) {
	                            update_option( 'disable_quadron_video_slider_three_section', $_POST['disable_quadron_video_slider_three_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_video_slider_three_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_video_slider_three_section" name="disable_quadron_video_slider_three_section" value="0" <?php checked( 0, get_option( 'disable_quadron_video_slider_three_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_video_slider_three_section"><?php _e( 'Video Slider 3', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_infobox1_section', 0 );
	                        if ( isset( $_POST['disable_quadron_infobox1_section'] ) ) {
	                            update_option( 'disable_quadron_infobox1_section', $_POST['disable_quadron_infobox1_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_infobox1_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_infobox1_section" name="disable_quadron_infobox1_section" value="0" <?php checked( 0, get_option( 'disable_quadron_infobox1_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_infobox1_section"><?php _e( 'Infobox Section 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_infobox2_section', 0 );
	                        if ( isset( $_POST['disable_quadron_infobox2_section'] ) ) {
	                            update_option( 'disable_quadron_infobox2_section', $_POST['disable_quadron_infobox2_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_infobox2_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_infobox2_section" name="disable_quadron_infobox2_section" value="0" <?php checked( 0, get_option( 'disable_quadron_infobox2_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_infobox2_section"><?php _e( 'Infobox Section 2', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_blog_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_blog_slider_section'] ) ) {
	                            update_option( 'disable_quadron_blog_slider_section', $_POST['disable_quadron_blog_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_blog_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_blog_slider_section" name="disable_quadron_blog_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_blog_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_blog_slider_section"><?php _e( 'Blog Slider', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_blog_list_section', 0 );
	                        if ( isset( $_POST['disable_quadron_blog_list_section'] ) ) {
	                            update_option( 'disable_quadron_blog_list_section', $_POST['disable_quadron_blog_list_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_blog_list_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_blog_list_section" name="disable_quadron_blog_list_section" value="0" <?php checked( 0, get_option( 'disable_quadron_blog_list_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_blog_list_section"><?php _e( 'Blog List Section', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_partners_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_partners_slider_section'] ) ) {
	                            update_option( 'disable_quadron_partners_slider_section', $_POST['disable_quadron_partners_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_partners_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_partners_slider_section" name="disable_quadron_partners_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_partners_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_partners_slider_section"><?php _e( 'Partner Slider 1', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_awards_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_awards_slider_section'] ) ) {
	                            update_option( 'disable_quadron_awards_slider_section', $_POST['disable_quadron_awards_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_awards_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_awards_slider_section" name="disable_quadron_awards_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_awards_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_awards_slider_section"><?php _e( 'Awards Slider', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_courses_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_courses_slider_section'] ) ) {
	                            update_option( 'disable_quadron_courses_slider_section', $_POST['disable_quadron_courses_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_courses_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_courses_slider_section" name="disable_quadron_courses_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_courses_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_courses_slider_section"><?php _e( 'Courses Slider', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_contact_form7', 0 );
	                        if ( isset( $_POST['disable_quadron_contact_form7'] ) ) {
	                            update_option( 'disable_quadron_contact_form7', $_POST['disable_quadron_contact_form7'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_contact_form7" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_contact_form7" name="disable_quadron_contact_form7" value="0" <?php checked( 0, get_option( 'disable_quadron_contact_form7' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_contact_form7"><?php _e( 'Contact Form 7', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_contact_form7_section', 0 );
	                        if ( isset( $_POST['disable_quadron_contact_form7_section'] ) ) {
	                            update_option( 'disable_quadron_contact_form7_section', $_POST['disable_quadron_contact_form7_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_contact_form7_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_contact_form7_section" name="disable_quadron_contact_form7_section" value="0" <?php checked( 0, get_option( 'disable_quadron_contact_form7_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_contact_form7_section"><?php _e( 'Contact Form 7 Section', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_pricing_item', 0 );
	                        if ( isset( $_POST['disable_quadron_pricing_item'] ) ) {
	                            update_option( 'disable_quadron_pricing_item', $_POST['disable_quadron_pricing_item'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_pricing_item" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_pricing_item" name="disable_quadron_pricing_item" value="0" <?php checked( 0, get_option( 'disable_quadron_pricing_item' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_pricing_item"><?php _e( 'Pricing Item', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_mobile_app_section', 0 );
	                        if ( isset( $_POST['disable_quadron_mobile_app_section'] ) ) {
	                            update_option( 'disable_quadron_mobile_app_section', $_POST['disable_quadron_mobile_app_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_mobile_app_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_mobile_app_section" name="disable_quadron_mobile_app_section" value="0" <?php checked( 0, get_option( 'disable_quadron_mobile_app_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_mobile_app_section"><?php _e( 'Mobile App Section', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_testimonials_one_section', 0 );
	                        if ( isset( $_POST['disable_quadron_testimonials_one_section'] ) ) {
	                            update_option( 'disable_quadron_testimonials_one_section', $_POST['disable_quadron_testimonials_one_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_testimonials_one_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_testimonials_one_section" name="disable_quadron_testimonials_one_section" value="0" <?php checked( 0, get_option( 'disable_quadron_testimonials_one_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_testimonials_one_section"><?php _e( 'Testimonials Section', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_woo_product_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_woo_product_slider_section'] ) ) {
	                            update_option( 'disable_quadron_woo_product_slider_section', $_POST['disable_quadron_woo_product_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_woo_product_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_woo_product_slider_section" name="disable_quadron_woo_product_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_woo_product_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_woo_product_slider_section"><?php _e( 'WooCommerce Slider', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_promobox_mobile_slider_section', 0 );
	                        if ( isset( $_POST['disable_quadron_promobox_mobile_slider_section'] ) ) {
	                            update_option( 'disable_quadron_promobox_mobile_slider_section', $_POST['disable_quadron_promobox_mobile_slider_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_promobox_mobile_slider_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_promobox_mobile_slider_section" name="disable_quadron_promobox_mobile_slider_section" value="0" <?php checked( 0, get_option( 'disable_quadron_promobox_mobile_slider_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_promobox_mobile_slider_section"><?php _e( 'Promobox Mobile Slider', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_team_member_item', 0 );
	                        if ( isset( $_POST['disable_quadron_team_member_item'] ) ) {
	                            update_option( 'disable_quadron_team_member_item', $_POST['disable_quadron_team_member_item'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_team_member_item" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_team_member_item" name="disable_quadron_team_member_item" value="0" <?php checked( 0, get_option( 'disable_quadron_team_member_item' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_team_member_item"><?php _e( 'Team Box', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

					<div class="col-md-4">
	                    <div class="widget-toggle">
	                        <?php
	                        add_option( 'disable_quadron_cases_cpt_grid_section', 0 );
	                        if ( isset( $_POST['disable_quadron_cases_cpt_grid_section'] ) ) {
	                            update_option( 'disable_quadron_cases_cpt_grid_section', $_POST['disable_quadron_cases_cpt_grid_section'] );
	                        }
	                        ?>
	                        <div class="custom-control custom-switch">
	                            <input type="hidden" name="disable_quadron_cases_cpt_grid_section" value="1">
	                            <input type="checkbox" class="custom-control-input" id="disable_quadron_cases_cpt_grid_section" name="disable_quadron_cases_cpt_grid_section" value="0" <?php checked( 0, get_option( 'disable_quadron_cases_cpt_grid_section' ), true ); ?>>
	                            <label class="custom-control-label" for="disable_quadron_cases_cpt_grid_section"><?php _e( 'Cases CPT', 'quadron' ); ?></label>
	                        </div>
	                    </div>
	                </div>

				</div>

				<div class="page-actions">
					<div class="row">
						<div class="col-sm-12 submit-container">
							<?php wp_nonce_field( 'quadron_admin_nonce_field' ); ?>
							<button type="submit" class="btn btn-primary"><?php _e( 'Save Settings', 'quadron' ); ?></button>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
