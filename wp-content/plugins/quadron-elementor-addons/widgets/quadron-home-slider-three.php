<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Home_Slider_Three_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-home-slider-three';
    }
    public function get_title() {
        return 'Home Slider 3';
    }
    public function get_icon() {
        return 'eicon-sliders';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'home_slider_section',
            [
                'label' => esc_html__( 'Slider Item', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'slider_items',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [
                        'slider_item_type' => 'style1',
                    ],
                    [
                        'slider_item_type' => 'style2',
                        'slider_subtitle' => 'Quadron Air',
                        'slider_title' => 'The Ultraportable <br>Quadrone MGB 21',
                        'slider_desc' => 'The ultraportable Copter features high-end flight performance and functionality for limitless exploration.',
                        'slider_price' => '$1,499 USD',
                        'slider_btn_title' => 'ADD TO CART',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_item_type' => 'style3',
                        'slider_subtitle' => 'Quadron Air',
                        'slider_title' => 'Awesome Quadrone<br> Copter CH21',
                        'slider_desc' => 'The ultraportable Copter features high-end flight performance and functionality for limitless exploration.',
                        'slider_price' => '$1,499 USD',
                        'slider_btn_title' => 'ADD TO CART',
                        'slider_btn_link' => '#',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'slider_item_type',
                        'label' => esc_html__('Slider Item Style', 'quadron'),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'style1' => esc_html__('Style 1', 'quadron'),
                            'style2' => esc_html__('Style 2', 'quadron'),
                            'style3' => esc_html__('Style 3', 'quadron'),
                        ],
                        'default' => 'style2'
                    ],
                    [
                        'name' => 'slider_image',
                        'label' => esc_html__( 'Image', 'quadron' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => Utils::get_placeholder_image_src()]
                    ],
                    [
                        'name' => 'slider_subtitle',
                        'label' => esc_html__( 'Subtitle', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Quadrone Air',
                        'pleaceholder' => esc_html__( 'Enter subtitle here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style1']
                    ],
                    [
                        'name' => 'slider_title',
                        'label' => esc_html__( 'Title', 'quadron' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'The Ultraportable<br>Drone for the Best Video',
                        'pleaceholder' => esc_html__( 'Enter title here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style1']
                    ],
                    [
                        'name' => 'slider_desc',
                        'label' => esc_html__( 'Description', 'quadron' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'The ultraportable Mavic Air features high-end flight performance and functionality for limitless exploration.',
                        'pleaceholder' => esc_html__( 'Enter description here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style1']
                    ],
                    [
                        'name' => 'slider_price',
                        'label' => esc_html__( 'Price', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '$1,499 USD',
                        'pleaceholder' => esc_html__( 'Enter price here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style1']
                    ],
                    [
                        'name' => 'slider_btn_title',
                        'label' => esc_html__( 'Button Title', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'ADD TO CART',
                        'pleaceholder' => esc_html__( 'Enter button title here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style1']
                    ],
                    [
                        'name' => 'slider_btn_link',
                        'label' => esc_html__( 'Button Link', 'quadron' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                                'is_external' => 'true',
                            ],
                        'placeholder' => esc_html__( 'Place URL here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style1']
                    ]
                ],
                'title_field' => '{{slider_title}}'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'home_slider_three_list_section',
            [
                'label' => esc_html__( 'Product Details', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'slider_list',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'list_title' => 'Flight time',
                        'list_value' => '16 min',
                        'list_icon' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid'
                        ],

                    ],
                    [
                        'list_title' => 'Effective Pixels',
                        'list_value' => '12 mp',
                        'list_icon' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid'
                        ],

                    ],
                    [
                        'list_title' => 'Transmission Distance',
                        'list_value' => '1.2 ml (2 km)',
                        'list_icon' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid'
                        ],

                    ],
                    [
                        'list_title' => 'VPS range',
                        'list_value' => '30 m',
                        'list_icon' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid'
                        ],

                    ],
                ],
                'fields' => [
                    [
                        'name' => 'list_icon',
                        'label' => esc_html__( 'Icon', 'quadron' ),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'name' => 'list_title',
                        'label' => esc_html__( 'List Title', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Flight time',
                    ],
                    [
                        'name' => 'list_value',
                        'label' => esc_html__( 'List Value', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '16 min',
                    ],
                ],
                'title_field' => '{{list_title}}',
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $loading    = plugins_url( 'assets/front/img/loader-large.svg', __DIR__ );
        $image      = $this->get_settings( 'video_img' );
        $image_url  = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt   = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;

        echo '<div class="container-indent section--bg-vertical-line">';
            echo '<div class="mainSlider-layout">';
                echo '<div class="loading-content" data-bg="'.$loading.'"></div>';
                echo '<div class="mainSlider mainSlider-size-03 slick-nav-03" data-arrow="false" data-dots="true">';
                    foreach ( $settings['slider_items'] as $item ) {
                        if ('style1' == $item['slider_item_type']) {
                            echo '<div class="slide">';
                                if($item['slider_image']['url']){
                                    echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                                }
                            echo '</div>';
                        } elseif ('style2' == $item['slider_item_type']) {
                            echo '<div class="slide">';
                                if($item['slider_image']['url']){
                                    echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                                }
                                echo '<div class="slide-content">';
                                    echo '<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">';
                                        echo '<div class="slide-layout-01">';
                                            if($item['slider_subtitle']){
                                                echo '<div class="slide-subtitle text-color-01">'.$item['slider_subtitle'].'</div>';
                                            }
                                            if($item['slider_title']){
                                                echo '<div class="slide-title text-color-01">'.$item['slider_title'].'</div>';
                                            }
                                            if($item['slider_desc']){
                                                echo '<div class="slide-description">'.$item['slider_desc'].'</div>';
                                            }
                                            if($item['slider_price']){
                                                echo '<div class="slide-price text-color-01">'.$item['slider_price'].'</div>';
                                            }
                                            if($item['slider_btn_title']){
                                                echo '<a class="btn-link-icon btn-link-icon__md text-color-01" href="'.esc_attr( $item['slider_btn_link']['url'] ).'">';
                                                    echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                                    echo '<span class="btn__text">'.$item['slider_btn_title'].'</span>';
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<div class="slide">';
                                if($item['slider_image']['url']){
                                    echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                                }
                                echo '<div class="slide-content">';
                                    echo '<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">';
                                        echo '<div class="slide-layout-01 text-right">';
                                            if($item['slider_subtitle']){
                                                echo '<div class="slide-subtitle">'.$item['slider_subtitle'].'</div>';
                                            }
                                            if($item['slider_title']){
                                                echo '<div class="slide-title">'.$item['slider_title'].'</div>';
                                            }
                                            if($item['slider_desc']){
                                                echo '<div class="slide-description">'.$item['slider_desc'].'</div>';
                                            }
                                            if($item['slider_price']){
                                                echo '<div class="slide-price">'.$item['slider_price'].'</div>';
                                            }
                                            if($item['slider_btn_title']){
                                                echo '<a class="btn-link-icon btn-link-icon__md" href="'.esc_attr( $item['slider_btn_link']['url'] ).'">';
                                                    echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                                    echo '<span class="btn__text">'.$item['slider_btn_title'].'</span>';
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                echo '</div>';
                echo '<div id="mainSlider-nav"></div>';
                if ($settings['slider_list']){
                    echo '<div class="mainSlider-box03">';
                        echo '<ul class="list-icon">';
                            foreach ($settings['slider_list'] as $list) {
                                echo '<li>';
                                    if ( ! empty($list['list_icon']['value']) ) {
                                        echo '<div class="list-icon__icon">';
                                            Icons_Manager::render_icon( $list['list_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</div>';
                                    }
                                    echo '<div class="list-icon__description">';
                                        if ( $list['list_title']) {
                                            echo '<span class="list-icon__title">'.$list['list_title'].'</span>';
                                        }
                                        if ( $list['list_value']) {
                                            echo '<span class="list-icon__value">'.$list['list_value'].'</span>';
                                        }
                                    echo '</div>';
                                echo '</li>';
                            }
                        echo '</ul>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    }
}
