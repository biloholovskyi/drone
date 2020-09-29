<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Video_Slider_Two_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-video-slider-two-section';
    }
    public function get_title() {
        return 'Video Slider 2';
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
        $this->start_controls_section( 'quadron_video_two_text_settings',
            [
                'label' => esc_html__('Section Text', 'quadron'),
            ]
        );
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Cases' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Vision Based <br>Protection',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_video_items_two_settings',
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
        $repeater->add_control( 'video_image_mobile',
            [
                'label' => esc_html__( 'Responsive Image (Phone)', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $repeater->add_control( 'video_title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'WATCH THE VIDEO',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'video_desc',
            [
                'label'          => esc_html__( 'Short Description', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Tommy ruff Mozambique tilapia pirarucu yellowfin surgeonfish scorpionfish yellow-and-black triplefin trunkfish cod icefish yellowtail kingfish ayu.',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Details Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'DETAILS',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Details Button Link', 'quadron' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $repeater->add_control( 'all_btn_title',
            [
                'label'          => esc_html__( 'All Project Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'ALL PROJECTS',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'all_btn_link',
            [
                'label' => esc_html__( 'All Project Button Link', 'quadron' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $this->add_control( 'video_items',
            [
                'label'          => esc_html__( 'Items', 'nt-addons' ),
                'type'           => Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'title_field'    => '{{video_title}}',
                'default'        => [
                    [
                        'video_url'  => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                        'video_title'  => esc_html__( 'WATCH THE VIDEO', 'nt-addons' ),
                        'all_btn_title'  => 'ALL PROJECTS',
                        'all_btn_link'  => '#',
                        'btn_title'  => 'DETAILS',
                        'btn_link'  => '#',
                        'video_desc'  => 'Tommy ruff Mozambique tilapia pirarucu yellowfin surgeonfish scorpionfish yellow-and-black triplefin trunkfish cod icefish yellowtail kingfish ayu.'
                    ],
                    [
                        'video_url'  => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                        'video_title'  => esc_html__( 'WATCH THE VIDEO', 'nt-addons' ),
                        'all_btn_title'  => 'ALL PROJECTS',
                        'all_btn_link'  => '#',
                        'btn_title'  => 'DETAILS',
                        'btn_link'  => '#',
                        'video_desc'  => 'Tommy ruff Mozambique tilapia pirarucu yellowfin surgeonfish scorpionfish yellow-and-black triplefin trunkfish cod icefish yellowtail kingfish ayu.'
                    ],
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        echo '<div class="section video-slider-two">';
            echo '<div class="container">';
                echo '<div class="presentation-projects slick-arrow-position-left">';
                    echo '<div class="col-link">';
                        echo '<div class="js-presentation-projects">';
                            foreach ($settings['video_items'] as $item) {
                                $target     = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
                                $nofollow   = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
                                $target2    = $item['all_btn_link']['is_external'] ? ' target="_blank"' : '';
                                $nofollow2  = $item['all_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
                                $imagealt   = esc_attr(get_post_meta($item['video_image']['id'], '_wp_attachment_image_alt', true));
                                $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $item['video_image']['id'] ) );
                                $imagealt2  = esc_attr(get_post_meta($item['video_image_mobile']['id'], '_wp_attachment_image_alt', true));
                                $imagealt2  = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $item['video_image_mobile']['id'] ) );
                                echo '<div class="item">';
                                    echo '<div class="col-link-wrapper">';
                                        echo '<a href="'.$item['video_url'].'" class="link-video video-popup">';
                                            echo '<i class="btn__icon"></i>';
                                            if ( $item['video_title'] ) {
                                                echo '<span class="btn__text">'.$item['video_title'].'</span>';
                                            }
                                        echo '</a>';
                                        if ( $item['all_btn_title'] ) {
                                            echo '<a class="btn-link-icon btn-link-icon__md" href="'.$item['all_btn_link']['url'].'"'.$target2.$nofollow2.'>';
                                                echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                                echo '<span class="btn__text">'.$item['all_btn_title'].'</span>';
                                            echo '</a>';
                                        }
                                    echo '</div>';
                                    if ( $item['video_image_mobile']['url'] ) {
                                        echo '<picture>';
                                            echo '<source srcset="'.$item['video_image']['url'].'" media="(min-width:576px)">';
                                            echo '<img src="'.$item['video_image_mobile']['url'].'" alt="'.$imagealt.'">';
                                        echo '</picture>';
                                    } else {
                                        echo '<picture>';
                                            echo '<img src="'.$item['video_image']['url'].'" alt="'.$imagealt.'">';
                                        echo '</picture>';
                                    }
                                    echo '<div class="layout-content">';
                                        echo '<div class="col-title">';
                                            echo '<div class="section-heading size-sm">';
                                                if ( $settings['subtitle'] ) {
                                                    echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                                }
                                                if ( $settings['title'] ) {
                                                    echo '<h4 class="title">'.$settings['title'].'</h4>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-description">';
                                            echo $item['video_desc'];
                                            if ( $item['btn_title'] ) {
                                                echo '<p><a href="'.$item['btn_link']['url'].'" class="link-default"'.$target.$nofollow.'>'.$item['btn_title'].'</a></p>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="slick-slick-arrow">
                        <div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>
                        <div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>
                    </div>
                </div>
            </div>
        </div>';
    }
}
