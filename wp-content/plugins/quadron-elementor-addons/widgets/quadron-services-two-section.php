<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Two_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-two-section';
    }
    public function get_title() {
        return 'Sevices 2 Section';
    }
    public function get_icon() {
        return 'eicon-columns';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   Text Options   ******/
        $this->start_controls_section('quadron_services_two_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Services' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'We Help you<br>Embarace the Future',
                'label_block'    => true,
            ]
        );
        $this->add_control('text1',
            [
                'label'          => esc_html__( 'Bottom Left Text', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'We provide expert inspection services for your organization’s mission critical assets using drone technology.',
                'label_block'    => true,
            ]
        );
        $this->add_control('text2',
            [
                'label'          => esc_html__( 'Bottom Right Text', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Triplefin blenny gibberfish ridgehead stonecat Australian grayling. Glass knifefish Bombay duck Molly Miller Quillfish stargazer collared dogfish silver hake." Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dogfish.',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
        /*****   Text Options   ******/
        $this->start_controls_section( 'quadron_services_items_two_settings',
            [
                'label' => esc_html__('Services Items', 'quadron'),
            ]
        );
        $this->add_control( 'services_items',
            [
                'type'         => Controls_Manager::REPEATER,
                'seperator'    => 'before',
                'default'      => [
                    [
                        'item_title' => 'Delivery',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => 'News & Media',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => 'Public Safety',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => 'Film<br>Production',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => 'Inspection',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'number' => esc_html__('06', 'quadron'),
                        'item_title' => 'Construction',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ]
                ],
                'fields'       => [
                    [
                        'name'           => 'item_title',
                        'label'          => esc_html__('Title', 'quadron'),
                        'type'           => Controls_Manager::TEXTAREA,
                        'default'        => 'Title',
                        'label_block'    => true
                    ],
                    [
                        'name'              => 'item_icon',
                        'label'             => esc_html__('Icon', 'quadron'),
                        'type'              => Controls_Manager::ICONS,
                        'fa4compatibility'  => 'quadron_tabs_tab_title_icon',
                        'default'           => [
                            'value'     => 'fas fa-home',
                            'library'   => 'fa-solid'
                        ]
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
                        'name'        => 'colmd',
                        'label'       => esc_html__( 'Column MD', 'quadron' ),
                        'type'        => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default'     => 'col-md-4',
                        'options'     => [
                            'col-md-4'    => esc_html__( 'Default 4 Column', 'quadron' ),
                            'col-md-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-md-3'    => esc_html__( '3 Column', 'quadron' ),
                            'col-md-6'    => esc_html__( '6 Column', 'quadron' ),
                            'col-md-12'   => esc_html__( '12 Column', 'quadron' ),
                        ]
                    ],
                    [
                        'name'        => 'colsm',
                        'label'       => esc_html__( 'Column SM', 'quadron' ),
                        'type'        => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default'     => 'col-sm-6',
                        'options'     => [
                            'col-sm-6'    => esc_html__( 'Default 6 Column', 'quadron' ),
                            'col-sm-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-sm-12'   => esc_html__( '12 Column', 'quadron' ),
                        ]
                    ]
                ],

                'title_field'     => '{{item_title}}'
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();

        echo '<div class="section section-default-inner section--bg-wrapper-02">';
            echo '<div class="container">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading section-heading_indentg04">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h2 class="title">'.$settings['title'].'</h2>';
                        }
                    echo '</div>';
                }

                echo '<div class="col-list-box">';
                    echo '<div class="row">';
                        foreach ($settings['services_items'] as $item) {
                            $itarget    = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                            $inofollow  = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                            $colmd      = $item['colmd'] ? ' '.$item['colmd'] : ' col-md-4';
                            $colsm      = $item['colsm'] ? $item['colsm'] : 'col-sm-6';
                            echo '<div class="'.$colsm.$colmd.'">';
                                echo '<a class="box01" href="'.$item['item_link']['url'].'"'.$itarget.$inofollow.'>';
                                    echo '<div class="box01__icon">';
                                        if ( ! empty($item['item_icon']['value']) ) {
                                            Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                                        }
                                    echo '</div>';
                                    if ( $item['item_title'] ) {
                                        echo '<h4 class="box01__title">' . $item['item_title'] . '</h4>';
                                    }
                                echo '</a>';
                            echo '</div>';
                        }
                        if ( $settings['text1'] ) {
                            if ( $settings['text2'] ) {
                                echo '<div class="col-md-5">';
                                    echo '<div class="text-sm base-color-01">'.$settings['text1'].'</div>';
                                echo '</div>';
                            } else {
                                echo '<div class="col-md-12">';
                                    echo '<div class="text-sm base-color-01">'.$settings['text1'].'</div>';
                                echo '</div>';
                            }
                        }
                        if ( $settings['text2'] ) {
                            if ( $settings['text1'] ) {
                                echo '<div class="col-md-6 ml-auto">'.$settings['text2'].'</div>';
                            } else {
                                echo '<div class="col-md-12">'.$settings['text2'].'</div>';
                            }
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
