<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Awards_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-awards-slider-section';
    }
    public function get_title() {
        return 'Awards Slider';
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
        $this->start_controls_section( 'quadron_features_one_text_settings',
            [
                'label'          => esc_html__( 'Section Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'Awards' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Our progress',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_awards_slider_settings',
            [
                'label' => esc_html__('Slider Content', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_time',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'Mobile App' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Innovations and Breakthroughs',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/award_img_03.png', __DIR__ )],
            ]
        );
        $repeater->add_control( 'link',
            [
                'label' => esc_html__( 'Button Link', 'quadron' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $this->add_control( 'awards',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{item_title}}',
                'default' => [
                    [
                        'item_time' => '2016',
                        'item_title' => 'Aloha creatic',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/award_img_03.png', __DIR__ )],
                        'link' => '#'
                    ],
                    [
                        'item_time' => '2016',
                        'item_title' => 'Disruption',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/award_img_03.png', __DIR__ )],
                        'link' => '#'
                    ],
                    [
                        'item_time' => '2017',
                        'item_title' => 'Quadron 4000',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/award_img_03.png', __DIR__ )],
                        'link' => '#'
                    ],
                    [
                        'item_time' => '2019',
                        'item_title' => '99d Award',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/award_img_03.png', __DIR__ )],
                        'link' => '#'
                    ],
                    [
                        'item_time' => '2019',
                        'item_title' => 'Quadron 4000',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/award_img_03.png', __DIR__ )],
                        'link' => '#'
                    ]
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();

        echo '<div class="section section-default-top nt-awards">';
            echo '<div class="container">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading section-heading_indentg02">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h3 class="title">'.$settings['title'].'</h3>';
                        }
                    echo '</div>';
                }
                echo '<div class="js-award-carusel carusel-award slick-arrow-center js-align-arrow-award">';
                    foreach ($settings['awards'] as $item) {
                        $imagealt  = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                        $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $item['item_image']['id'] ) );
                        $target    = $item['link']['is_external'] ? ' target="_blank"' : '';
                        $nofollow  = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                        echo '<div class="item">';
                            echo '<a href="'.$item['link']['url'].'"'.$target.$nofollow.' class="award">';
                                echo '<div class="award__img"><img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'"></div>';
                                echo '<div class="award__description">';
                                    if ( $item['item_time'] ) {
                                        echo '<div class="award__caption">'.$item['item_time'].'</div>';
                                    }
                                    if ( $item['item_title'] ) {
                                        echo '<h4 class="award__title">'.$item['item_title'].'</h4>';
                                    }
                                echo '</div>';
                            echo '</a>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
