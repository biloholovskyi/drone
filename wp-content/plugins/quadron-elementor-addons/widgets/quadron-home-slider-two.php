<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Home_Slider_Two_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-home-slider-two';
    }
    public function get_title() {
        return 'Home Slider';
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
                    ['slider_title' => esc_html__('Slider Item One', 'quadron')],
                    ['slider_title' => esc_html__('Slider Item Two', 'quadron')],
                    ['slider_title' => esc_html__('Slider Item Three', 'quadron')]
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
                        'name' => 'slider_number',
                        'label' => esc_html__( 'Number Image', 'quadron' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => Utils::get_placeholder_image_src()],
                        'condition' => ['slider_item_type!' => 'style2']
                    ],
                    [
                        'name' => 'slider_subtitle',
                        'label' => esc_html__( 'Subtitle', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Quadrone Air',
                        'pleaceholder' => esc_html__( 'Enter subtitle here', 'quadron' ),
                    ],
                    [
                        'name' => 'slider_title',
                        'label' => esc_html__( 'Title', 'quadron' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'The Ultraportable<br>Drone for the Best Video',
                        'pleaceholder' => esc_html__( 'Enter title here', 'quadron' ),
                    ],
                    [
                        'name' => 'slider_desc',
                        'label' => esc_html__( 'Description', 'quadron' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'The ultraportable Mavic Air features high-end flight performance and functionality for limitless exploration.',
                        'pleaceholder' => esc_html__( 'Enter description here', 'quadron' ),
                        'condition' => ['slider_item_type!' => 'style2']
                    ],
                    [
                        'name' => 'slider_btn_title',
                        'label' => esc_html__( 'Button Title', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'DISCOVER',
                        'pleaceholder' => esc_html__( 'Enter button title here', 'quadron' ),
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
                    ]
                ],
                'title_field' => '{{slider_title}}'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'home_slider_socials_section',
            [
                'label' => esc_html__( 'Slider Socials', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'social_icons',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'social_new' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'social_new' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'social_new' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-brands'
                        ]
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'social',
                        'label' => esc_html__( 'Icon', 'quadron' ),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'name' => 'social_link',
                        'label' => esc_html__( 'Link', 'quadron' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true'
                        ],
                        'placeholder' => esc_html__( 'Place URL here', 'quadron' )
                    ]
                ],
                'title_field' => 'Social Media',
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'home_slider_bottom_section',
            [
                'label' => esc_html__( 'Slider Bottom Content', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'video_img',
            [
                'label'           => esc_html__( 'Video Image', 'quadron' ),
                'type'            => Controls_Manager::MEDIA,
                'default'         => ['url' => Utils::get_placeholder_image_src()],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'           => 'thumbnail',
                'default'        => 'full',
                'condition'      => [ 'videoimg[url]!' => '' ],
            ]
        );
        $this->add_control( 'videourl',
            [
                'label'          => esc_html__( 'Video URL', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control( 'details',
            [
                'label'          => esc_html__( 'Content', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'Creative' , 'quadron' ),
                'label_block'    => true,
                'default'    => '<address>5961 Santa Fe Ave, Huntington<br>Park, CA 90255, USA</address><address>+1 800 341 41 41 &nbsp; +1 800 834 62 74<br><a href="mailto:info@quadron.co">info@quadron.co</a></address>',
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
                echo '<div class="mainSlider mainSlider-size-02 slick-nav-02" data-arrow="true" data-dots="true">';
                foreach ( $settings['slider_items'] as $item ) {

                    if ('style1' == $item['slider_item_type']) {
                        echo '<div class="slide">';
                            echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                            echo '<div class="slide-content">';
                                echo '<div class="container" data-animation="fadeInRightSm" data-animation-delay="0s">';
                                    echo '<div class="slide-layout-03 text-left">';
                                        if($item['slider_number']['url']){
                                            echo '<img class="slide-icon" src="'.$item['slider_number']['url'].'" alt="'.$item['slider_title'].'">';
                                        }
                                        if($item['slider_subtitle']){
                                            echo '<div class="slide-subtitle">'.$item['slider_subtitle'].'</div>';
                                        }
                                        if($item['slider_title']){
                                            echo '<div class="slide-title">'.$item['slider_title'].'</div>';
                                        }
                                        if($item['slider_desc']){
                                            echo '<div class="slide-description">'.$item['slider_desc'].'</div>';
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
                    } elseif ('style2' == $item['slider_item_type']) {
                        echo '<div class="slide">';
                            echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                            echo '<div class="slide-content">';
                                echo '<div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">';
                                    echo '<div class="slide-layout-02 text-center">';
                                    if($item['slider_subtitle']){
                                        echo '<div class="slide-subtitle">'.$item['slider_subtitle'].'</div>';
                                    }
                                    if($item['slider_title']){
                                        echo '<div class="slide-title">'.$item['slider_title'].'</div>';
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
                    } else {
                        echo '<div class="slide">';
                            echo '<div class="img--holder" data-bg="'.$item['slider_image']['url'].'"></div>';
                            echo '<div class="slide-content">';
                                echo '<div class="container" data-animation="fadeInRightSm" data-animation-delay="0s">';
                                    echo '<div class="slide-layout-03 text-right">';
                                        if($item['slider_number']['url']){
                                            echo '<img class="slide-icon" src="'.$item['slider_number']['url'].'" alt="'.$item['slider_title'].'">';
                                        }
                                        if($item['slider_subtitle']){
                                            echo '<div class="slide-subtitle">'.$item['slider_subtitle'].'</div>';
                                        }
                                        if($item['slider_title']){
                                            echo '<div class="slide-title">'.$item['slider_title'].'</div>';
                                        }
                                        if($item['slider_desc']){
                                            echo '<div class="slide-description">'.$item['slider_desc'].'</div>';
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

                if ($settings['social_icons']){
                    echo '<ul class="mainSlider-social-icon">';
                        foreach ($settings['social_icons'] as $soc) {
                            if ( ! empty($soc['social']['value']) ) {
                                echo '<li><a href="'.$soc['social_link']['url'].'">';
                                    Icons_Manager::render_icon( $soc['social'], [ 'aria-hidden' => 'true' ] );
                                echo '</a></li>';
                            }
                        }
                    echo '</ul>';
                }
                echo '<div class="mainSlider-box02">';
                    echo '<div class="container container-fluid-lg-nogutters">';
                        echo '<div class="wrapper-col">';

                            echo '<div class="mainSlider-box02__layout">';
                            echo $settings['details'];
                            echo '</div>';

                            if($settings['videourl']){
                                echo '<div class="mainSlider-box02-video">';
                                    echo '<a href="'.$settings['videourl'].'" class="video-popup link-icon-video color-reverse">';
                                        echo '<i class="icon-video"></i>';
                                        echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
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
