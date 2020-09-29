<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Video_Slider_Three_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-video-slider-three-section';
    }
    public function get_title() {
        return 'Video Slider 3';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_video_three_text_settings',
            [
                'label' => esc_html__('Section Text', 'quadron'),
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Cases' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Every client is a new strategy',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'text_content',
            [
                'label' => esc_html__( 'Description', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Dhufish crestfish yellowtail clownfish Shingle Fish velvet-belly shark mouthbrooder, Old World rivuline.',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'         => 'featgures_bottom_background',
                'label'        => esc_html__( 'Background', 'quadron' ),
                'types'        => [ 'classic', 'gradient' ],
                'selector'     => '{{WRAPPER}} .custom-layout04:before',
                'separator'    => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_video_three_items_settings',
            [
                'label' => esc_html__('Slider Items', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'video_url',
            [
                'label'          => esc_html__('Video URL', 'quadron'),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block'    => true
            ]
        );
        $repeater->add_control( 'video_image',
            [
                'label' => esc_html__( 'Video Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $this->add_control( 'video_items',
            [
                'label'          => esc_html__( 'Items', 'nt-addons' ),
                'type'           => Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'title_field'    => 'Video URL #',
                'default'        => [
                    [
                        'video_url'  => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                    ],
                    [
                        'video_url'  => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                    ],
                    [
                        'video_url'  => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                    ],
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        echo '<div class="section video-slider-three">';
            echo '<div class="custom-layout04 layout-color-01 section-default-inner">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        echo '<div class="col-md-6">';
                            echo '<div class="section-heading section-heading_indentg01">';
                                if ( $settings['subtitle'] ) {
                                    echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                }
                                if ( $settings['title'] ) {
                                    echo '<h4 class="title">'.$settings['title'].'</h4>';
                                }
                            echo '</div>';
                            echo $settings['text_content'];
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="caruser-custom-wrapper">';
                        echo '<div class="js-caruser-custom">';
                            foreach ($settings['video_items'] as $item) {
                                $imagealt  = esc_attr(get_post_meta($item['video_image']['id'], '_wp_attachment_image_alt', true));
                                $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $item['video_image']['id'] ) );
                                echo '<div class="item">';
                                    echo '<a href="'.$item['video_url'].'" class="videolink video-popup">';
                                        echo '<img src="'.$item['video_image']['url'].'" alt="'.$imagealt.'">';
                                        echo '<div class="videolink__icon"></div>';
                                    echo '</a>';
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
