<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Courses_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-courses-slider-section';
    }
    public function get_title() {
        return 'Courses Slider';
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
        $this->start_controls_section( 'quadron_courses_text_settings',
            [
                'label'          => esc_html__( 'Section Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'School' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Available Courses',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_courses_slider_settings',
            [
                'label' => esc_html__('Slider Content', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_time',
            [
                'label'          => esc_html__( 'Time', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( '300$ - 20 hours' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Drone Pilot Ground School',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'Details',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/blog_carusel_img_04.jpg', __DIR__ )]
            ]
        );
        $repeater->add_control( 'item_link',
            [
                'label' => esc_html__( 'Link', 'quadron' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $this->add_control( 'courses',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{item_title}}',
                'default' => [
                    [
                        'item_time' => '300$ - 20 hours',
                        'item_title' => 'Drone Pilot Ground School',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/blog_carusel_img_04.jpg', __DIR__ )],
                        'btn_title' => 'Details',
                        'item_link' => '#'
                    ],
                    [
                        'item_time' => '100$ - 5 hours',
                        'item_title' => 'Ranked Drone Course: Drone Underground',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/blog_carusel_img_04.jpg', __DIR__ )],
                        'btn_title' => 'Details',
                        'item_link' => '#'
                    ],
                    [
                        'item_time' => '550$ - 40 hours',
                        'item_title' => 'Fly Robotics Ground School',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/blog_carusel_img_04.jpg', __DIR__ )],
                        'btn_title' => 'Details',
                        'item_link' => '#'
                    ],
                    [
                        'item_time' => '300$ - 20 hours',
                        'item_title' => 'Drone Pilot Ground School',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/blog_carusel_img_04.jpg', __DIR__ )],
                        'btn_title' => 'Details',
                        'item_link' => '#'
                    ]
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        echo '<div class="section section-blog">';
            echo '<div class="container section--pr">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading section-heading_indentg05 section-heading__right-arrow">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h3 class="title">'.$settings['title'].'</h3>';
                        }
                    echo '</div>';
                }
                echo '<div class="slick-arrow-extraright">';
                    echo '<div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>';
                    echo '<div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>';
                echo '</div>';
                echo '<div class="js-carusel-news promobox02__slider">';
                foreach ($settings['courses'] as $item) {
                    $imagealt  = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                    $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $item['item_image']['id'] ) );
                    $target    = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow  = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                    echo '<div class="item">';
                        echo '<a href="'.$item['item_link']['url'].'"'.$target.$nofollow.' class="promobox02 hover-moving block-once">';
                            echo '<figure>';
                                echo '<img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'">';
                                echo '<figcaption>';
                                    if ( $item['item_time'] ) {
                                        echo '<span class="promobox02__time">'.$item['item_time'].'</span>';
                                    }
                                    if ( $item['item_title'] ) {
                                        echo '<h4 class="promobox02__title">'.$item['item_title'].'</h4>';
                                    }
                                    if ( $item['btn_title'] ) {
                                        echo '<span class="btn-custom">'.$item['btn_title'].'</span>';
                                    }
                                echo '</figcaption>';
                            echo '</figure>';
                        echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
