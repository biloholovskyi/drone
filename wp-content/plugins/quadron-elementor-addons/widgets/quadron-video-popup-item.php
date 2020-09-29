<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Video_Popup_Item_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-video-popup-item';
    }
    public function get_title() {
        return 'Video Popup';
    }
    public function get_icon() {
        return 'eicon-youtube';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_video_popup_settings',
            [
                'label' => esc_html__('Video', 'quadron'),
            ]
        );
        $this->add_control( 'video_url',
            [
                'label' => esc_html__('Video URL', 'quadron'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block' => true
            ]
        );
        $this->add_control( 'video_image',
            [
                'label' => esc_html__('Video Image', 'quadron'),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/videolink_img01.jpg', __DIR__ )]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'video_image[url]!' => '' ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $image      = $this->get_settings( 'video_image' );
        $image_url  = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt   = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;

        echo '<a href="'.$settings['video_url'].'" class="videolink video-popup">';
            echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
            echo '<div class="videolink__icon"></div>';
        echo '</a>';
    }
}
