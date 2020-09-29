<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_About_Us_Three_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-about-us-three-section';
    }
    public function get_title() {
        return 'About Us 3';
    }
    public function get_icon() {
        return 'eicon-columns';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_aboutus_three_text_settings',
            [
                'label' => esc_html__( 'Text', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'About',
                'label_block' => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Who we are',
                'label_block' => true,
            ]
        );
        $this->add_control( 'text_content',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<strong class="base-color-01">Port Jackson shark. Beluga sturgeon handfish needlefish titan triggerfish, powen dorado porbeagle shark Blind shark.</strong><p>Wels catfish, boarfish titan triggerfish orangestriped triggerfish dwarf gourami sweeper yellow weaver. Mustache triggerfish. Menhaden temperate ocean-bass North American darter scythe butterfish. <br>Luminous hake, Indian mul pike Siamese fighting fish, weeverfish gulper, flagtail. Sargassum fish lenok Blind shark arowana Pacific saury mudsucker.</p><p>Blue gourami trout cod Black angelfish bass knifefish brook lamprey. Grunt sleeper Black mackerel harelip sucker snook.</p><span class="extra-large-text">Quadron.</span>',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'aboutus_three_background',
                'label' => esc_html__( 'Background Image', 'quadron' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .section--bg-wrapper-03',
                'separator' => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('quadron_aboutus_three_img_settings',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('video_url',
            [
                'label' => esc_html__( 'Video URL', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block' => true,
            ]
        );
        $this->add_control( 'left_img',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/videolink_img01.jpg', __DIR__ )],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'videoimg[url]!' => '' ],
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('quadron_number_settings',
            [
                'label' => esc_html__( 'CounterUp Settings', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'col_flex',
            [
                'label' => esc_html__( 'Column Position', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => 'justify-default',
                'options' => [
                    'justify-default' => esc_html__( 'Default', 'quadron' ),
                    'justify-content-center' => esc_html__( 'Center', 'quadron' )
                ]
            ]
        );
        $this->add_control( 'counter_items',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [
                        'counter_title' => 'Delivery Packages',
                        'counter_number' => '6',
                        'counter_number2' => '500',
                        'counter_numbertext' => 'm',
                        'counter_text' => 'Duis aute irure dolor in reprehenderi voluptate velit esse cillum dolore eu fugiat nulla',
                    ],
                    [
                        'counter_title' => 'Satisfied',
                        'counter_number' => '784',
                        'counter_number2' => '',
                        'counter_numbertext' => 'clients',
                        'counter_text' => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.',
                    ],
                    [
                        'counter_title' => 'Covered',
                        'counter_number' => '57',
                        'counter_number2' => '',
                        'counter_numbertext' => 'countries',
                        'counter_text' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'counter_title',
                        'label' => esc_html__('Title', 'quadron'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Satisfied',
                        'label_block' => true
                    ],
                    [
                        'name' => 'counter_number',
                        'label' => esc_html__( 'Number', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Type your number here', 'quadron' ),
                        'input_type' => 'number',
                        'default' => '57',
                    ],
                    [
                        'name' => 'counter_number2',
                        'label' => esc_html__( 'Number After Comma', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Type your number 2 here', 'quadron' ),
                        'input_type' => 'number',
                        'default' => '100',
                    ],
                    [
                        'name' => 'counter_numbertext',
                        'label' => esc_html__( 'Number Text', 'quadron' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => esc_html__( 'Type your text after the number here', 'quadron' ),
                        'default' => 'clients',
                    ],
                    [
                        'name' => 'counter_text',
                        'label' => esc_html__('Short Description', 'quadron'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Duis aute irure dolor in reprehenderi voluptate velit esse cillum dolore eu fugiat nulla',
                        'label_block' => true
                    ],
                    [
                        'name' => 'colmd',
                        'label' => esc_html__( 'Column MD', 'quadron' ),
                        'type' => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default' => 'col-md-4',
                        'options' => [
                            'col-md-4' => esc_html__( 'Default 3 Column', 'quadron' ),
                            'col-md-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-md-3' => esc_html__( '4 Column', 'quadron' ),
                            'col-md-6' => esc_html__( '2 Column', 'quadron' ),
                            'col-md-12' => esc_html__( '1 Column', 'quadron' ),
                        ]
                    ],
                    [
                        'name' => 'colsm',
                        'label' => esc_html__( 'Column SM', 'quadron' ),
                        'type' => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default' => 'col-sm-6',
                        'options' => [
                            'col-sm-6' => esc_html__( 'Default 2 Column', 'quadron' ),
                            'col-sm-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-sm-12' => esc_html__( '1 Column', 'quadron' ),
                        ]
                    ]
                ],
                'title_field' => '{{counter_title}}'
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $image      = $this->get_settings( 'left_img' );
        $image_url  = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt   = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;

        echo '<div class="section--no-padding section--pr">';
            echo '<div class="section--bg-wrapper-03 section__indent-left"></div>';
            echo '<div class="section__indent-05">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        if ( $imageurl ) {
                        echo '<div class="col-sm-6">';
                        } else {
                        echo '<div class="col-sm-12">';
                        }
                            if ( $settings['subtitle'] || $settings['title'] ) {
                                echo '<div class="section-heading">';
                                    if ( $settings['subtitle'] ) {
                                        echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                    }
                                    if ( $settings['title'] ) {
                                        echo '<h4 class="title title-lg">'.$settings['title'].'</h4>';
                                    }
                                echo '</div>';
                            }
                            echo $settings['text_content'];
                        echo '</div>';
                        if ( $imageurl ) {
                            echo '<div class="divider divider__lg d-block d-sm-none"></div>';
                            echo '<div class="col-sm-5 offset-lg-1">';
                                echo '<a href="'.$settings['video_url'].'" class="videolink video-popup offset-top5">';
                                    echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
                                    echo '<div class="videolink__icon"></div>';
                                echo '</a>';
                                echo '<div class="extra-block01"></div>';
                            echo '</div>';
                        }
                    echo '</div>';

                    echo '<div class="divider divider__48 d-none d-lg-block d-xl-block"></div>';
                    if ( $settings['counter_items'] ) {
                        echo '<div class="box-counter-list">';
                            echo '<div class="row '.$settings['col_flex'].'">';
                                foreach ($settings['counter_items'] as $item) {
                                    if ( $item['counter_number'] ) {
                                        $colsm = $item['colsm'] ? $item['colsm'] : 'col-sm-6';
                                        $colmd = $item['colmd'] ? ' '.$item['colmd'] : ' col-md-4';
                                        echo '<div class="'.$colsm.$colmd.'">';
                                            echo '<div class="box-counter">';
                                                echo '<div class="box-counter__title">'.$item['counter_title'].'</div>';
                                                echo '<div class="box-counter__value">';
                                                    echo '<span data-num="'.$item['counter_number'].'" class="value animate-number viz">'.$item['counter_number'].'</span> ';
                                                    if ( $item['counter_number2'] ) {
                                                    echo '<span class="value">,</span>';
                                                    echo '<span data-num="'.$item['counter_number2'].'" class="value animate-number viz">'.$item['counter_number2'].'</span> ';
                                                    }
                                                    if ( $item['counter_numbertext'] ) {
                                                    echo $item['counter_numbertext'];
                                                    }
                                                echo '</div>';
                                                if ( $item['counter_text'] ) {
                                                    echo '<p>'.$item['counter_text'].'</p>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
