<?php

	/**
	* The template for displaying 404 pages (not found)
	*
	* @link https://codex.wordpress.org/Creating_an_Error_404_Page
	*
	* @package WordPress
	* @subpackage Quadron
	* @since 1.0.0
	*/

	get_header();

	// you can use this action for add any content before container element

	do_action( "quadron_before_404" );

    $quadron_404_layout_class_control = quadron_settings('error_content_img_visibility', '0');
    $quadron_404_layout_class = $quadron_404_layout_class_control == 1 ? '' : '404fullwidth';

?>

		<main id="mainContent">
			<div id="nt-404" class="nt-404 <?php echo esc_attr($quadron_404_layout_class); ?>">
				<div class="layout404">

					<?php if ( '0' != quadron_settings('error_content_logo_visibility', '1')) { ?>
						<div class="layout404__logo">
							<?php echo esc_html__('OOOPS!','quadron'); ?>
						</div>
					<?php } ?>

					<div class="container">
						<div class="row">

							<?php if ( '0' != quadron_settings('error_content_img_visibility', '0')) { ?>
								<div class="layout404__img">
									<?php if ( '' != quadron_settings('error_content_img')['url']) { ?>
										<img src="<?php echo esc_url(quadron_settings('error_content_img')['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
									<?php } else { ?>
										<img src="<?php echo (get_template_directory_uri(). '/images/image_404.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
									<?php } ?>
								</div>
							<?php } ?>

							<?php if ( '0' != quadron_settings('error_content_img_visibility', '0')) { ?>
								<div class="col-lg-6 offset-lg-6 text-center">
							<?php } else { ?>
								<div class="col-lg-12 text-center">
							<?php } ?>

								<div class="layout404__description">
									<?php if ( '0' != quadron_settings('error_content_subtitle_visibility', '1')) { ?>
										<div class="layout404__text-bg"><?php echo esc_html( quadron_settings( 'error_content_subtitle', '404' ) ); ?></div>
									<?php } ?>
									<?php if ( '0' != quadron_settings('error_content_subtitle_visibility', '1')) { ?>
										<h1 class="layout404__title"><?php echo esc_html( quadron_settings( 'error_content_title', 'ERROR' ) ); ?></h1>
									<?php } ?>
									<?php if ( '0' != quadron_settings('error_content_desc_visibility', '1')) { ?>
										<p><?php echo esc_html( quadron_settings( 'error_content_desc', 'Page you are looking can’t be found' ) ); ?></p>
									<?php } ?>
								</div>

								<?php if ( '0' != quadron_settings('error_content_btn_visibility', '1')) { ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" class="btn-border btn-color-01">
										<?php echo esc_html( quadron_settings( 'error_content_btn_title', 'GO TO HOMEPAGE' ) ); ?>
									</a>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

<?php

	// use this action to add any content after 404 page container element
	do_action( "quadron_after_404" );

	get_footer();

?>
