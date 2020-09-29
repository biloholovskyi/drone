<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Promobox_Mobile_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-promobox-mobile-slider-section';
    }
    public function get_title() {
        return 'Promobox Mobile Slider';
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
        $this->start_controls_section( 'quadron_promobox_mobile_slider_settings',
            [
                'label' => esc_html__('Slider Items', 'quadron'),
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
        $this->add_control( 'promobox_items',
            [
                'type'         => Controls_Manager::REPEATER,
                'seperator'    => 'before',
                'default'      => [
                    [
                        'icon_type' => 'img',
                        'item_bg' => ['url' => plugins_url( 'assets/front/img/promobox04-img01.jpg', __DIR__ )],
                        'item_logo1' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo.png', __DIR__ )],
                        'item_logo2' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo02.png', __DIR__ )],
                        'item_desc' => 'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
                    ],
                    [
                        'icon_type' => 'img',
                        'item_bg' => ['url' => plugins_url( 'assets/front/img/promobox04-img01.jpg', __DIR__ )],
                        'item_logo1' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo.png', __DIR__ )],
                        'item_logo2' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo02.png', __DIR__ )],
                        'item_desc' => 'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
                    ],
                    [
                        'icon_type' => 'img',
                        'item_bg' => ['url' => plugins_url( 'assets/front/img/promobox04-img01.jpg', __DIR__ )],
                        'item_logo1' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo.png', __DIR__ )],
                        'item_logo2' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo02.png', __DIR__ )],
                        'item_desc' => 'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
                    ],
                    [
                        'icon_type' => 'img',
                        'item_bg' => ['url' => plugins_url( 'assets/front/img/promobox04-img01.jpg', __DIR__ )],
                        'item_logo1' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo.png', __DIR__ )],
                        'item_logo2' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo02.png', __DIR__ )],
                        'item_desc' => 'Luderick whale catfish turbot river shark loach catfish-- thornyhead; spiny eel harelip sucker speckled trout bass northern Stargazer spiny basslet mola. South American darter brook lamprey marblefish blacktip reef shark.',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'icon_type',
                        'label' => esc_html__( 'Icon Type', 'quadron' ),
                        'type' => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default' => 'img',
                        'options' => [
                            'img' => esc_html__( 'Image', 'quadron' ),
                            'font' => esc_html__( 'Font Icon', 'quadron' )
                        ]
                    ],
                    [
                        'name' => 'item_bg',
                        'label' => esc_html__('Background Image', 'quadron'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => plugins_url( 'assets/front/img/promobox04-img01.jpg', __DIR__ )]
                    ],
                    [
                        'name' => 'item_logo1',
                        'label' => esc_html__('Logo Image', 'quadron'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo.png', __DIR__ )],
                        'condition' => [ 'icon_type'=> 'img' ]
                    ],
                    [
                        'name' => 'item_logo2',
                        'label' => esc_html__('Hover Logo Image', 'quadron'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => plugins_url( 'assets/front/img/promobox04-img01-logo02.png', __DIR__ )],
                        'condition' => [ 'icon_type'=> 'img' ]
                    ],
                    [
                        'name' => 'item_icon',
                        'label' => esc_html__('Icon', 'quadron'),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ],
                        'condition' => [ 'icon_type'=> 'font' ]
                    ],
                    [
                        'name' => 'item_desc',
                        'label' => esc_html__('Short Description', 'quadron'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Title',
                        'label_block' => true
                    ],
                    [
                        'name' => 'item_link',
                        'label' => esc_html__( 'Link', 'quadron' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => esc_html__( 'Place URL here', 'quadron' ),
                    ],
                    [
                        'name' => 'collg',
                        'label' => esc_html__( 'Column LG', 'quadron' ),
                        'type' => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default' => 'col-lg-3',
                        'options' => [
                            'col-lg-3' => esc_html__( 'Default 4 Column', 'quadron' ),
                            'col-lg-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-lg-4' => esc_html__( '3 Column', 'quadron' ),
                            'col-lg-6' => esc_html__( '2 Column', 'quadron' ),
                            'col-lg-12' => esc_html__( '1 Column', 'quadron' ),
                        ]
                    ],
                    [
                        'name' => 'colmd',
                        'label' => esc_html__( 'Column MD', 'quadron' ),
                        'type' => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default' => 'col-md-6',
                        'options' => [
                            'col-md-6' => esc_html__( 'Default 2 Column', 'quadron' ),
                            'col-md-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-md-12' => esc_html__( '1 Column', 'quadron' ),
                        ]
                    ]
                ],
                'title_field' => 'Box #'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        echo '<div class="section nt-mobile-slider">';
            echo '<div class="container">';
                echo '<div class="promobox04-wrapper">';
                    echo '<div class="row no-gutters js-mobile-slider '.$settings['col_flex'].'">';
                        foreach ($settings['promobox_items'] as $item) {
                            $imagealt  = esc_attr(get_post_meta($item['item_logo1']['id'], '_wp_attachment_image_alt', true));
                            $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $item['item_logo1']['id'] ) );
                            $imagealt2  = esc_attr(get_post_meta($item['item_logo2']['id'], '_wp_attachment_image_alt', true));
                            $imagealt2  = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $item['item_logo2']['id'] ) );
                            $colmd      = $item['colmd'] ? $item['colmd'] : 'col-md-6';
                            $collg      = $item['collg'] ? ' '.$item['collg'] : ' col-lg-3';
                            echo '<div class="'.$colmd.$collg.'">';
                                echo '<a href="cases_details.html" class="promobox04 block-once">';
                                    echo '<div class="promobox04__holder" data-bg="'.$item['item_bg']['url'].'"></div>';
                                    if($item['icon_type'] == 'font') {
                                        if ( ! empty($item['item_icon']['value']) ) {
                                            echo '<div class="promobox04__logo font-icon">';
                                                Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                                            echo '</div>';
                                        }
                                        echo '<div class="promobox04__layout font-icon icon-white">';
                                            if ( ! empty($item['item_icon']['value']) ) {
                                                Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                                            }
                                            if($item['item_desc']) {
                                                echo '<p>'.$item['item_desc'].'</p>';
                                            }
                                        echo '</div>';
                                    } else {
                                        echo '<div class="promobox04__logo"><img src="'.$item['item_logo1']['url'].'" alt="'.$imagealt.'"></div>';
                                        echo '<div class="promobox04__layout">';
                                            echo '<img src="'.$item['item_logo2']['url'].'" alt="'.$imagealt2.'">';
                                            if($item['item_desc']) {
                                                echo '<p>'.$item['item_desc'].'</p>';
                                            }
                                        echo '</div>';
                                    }
                                echo '</a>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
