<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Cases_Cpt_Post_Video_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-cases-cpt-post-video';
    }
    public function get_title() {
        return '(CPT) Cases Post Video';
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
        $this->start_controls_section( 'quadron_cases_cpt_post_video_popup_settings',
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
                'default' => ['url' => get_the_post_thumbnail_url(get_the_ID(), 'full')]
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
        $imagealt   = $imagealt ? $imagealt : get_the_title();
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;

        if ( post_type_exists( 'cases') ) {
            echo '<a href="'.$settings['video_url'].'" class="videolink video-popup no-shadow text-center">';
                echo '<div class="videolink__icon"></div>';
                echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
            echo '</a>';
        }
    }
}
