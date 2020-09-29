<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Four_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-four-section';
    }
    public function get_title() {
        return 'Sevices 4 Section';
    }
    public function get_icon() {
        return 'eicon-columns';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        $this->start_controls_section( 'quadron_services_four_settings',
            [
                'label' => esc_html__('Services Items', 'quadron'),
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
        $repeater = new Repeater();
        $repeater->add_control( 'item_icon',
            [
                'label'          => esc_html__( 'Icon', 'quadron' ),
                'type'           => Controls_Manager::ICONS,
                'default'           => [
                    'value'     => 'fas fa-home',
                    'library'   => 'fa-solid'
                ]
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Item Title',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_desc',
            [
                'label'          => esc_html__( 'Short Description', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'DETAILS',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Item Link', 'quadron' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $repeater->add_control( 'colmd',
            [
                'label'       => esc_html__( 'Column MD', 'quadron' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default'     => 'col-md-4',
                'options'     => [
                    'col-md-4'    => esc_html__( 'Default 4 Column', 'quadron' ),
                    'col-md-auto' => esc_html__( 'Auto', 'quadron' ),
                    'col-md-3'    => esc_html__( '3 Column', 'quadron' ),
                    'col-md-6'    => esc_html__( '6 Column', 'quadron' ),
                    'col-md-12'   => esc_html__( '12 Column', 'quadron' )
                ]
            ]
        );
        $repeater->add_control( 'colsm',
            [
                'label'       => esc_html__( 'Column MD', 'quadron' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default'     => 'col-sm-6',
                'options'     => [
                    'col-sm-6'    => esc_html__( 'Default 6 Column', 'quadron' ),
                    'col-sm-auto' => esc_html__( 'Auto', 'quadron' ),
                    'col-sm-12'   => esc_html__( '12 Column', 'quadron' )
                ]
            ]
        );
        $this->add_control( 'services_items',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{item_title}}',
                'default' => [
                    [
                        'item_title' => 'Delivery',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-sm-6',
                        'btn_link' => '#',
                        'btn_title' => 'DETAILS',
                        'item_desc' => 'Triplefin blenny gibberfish ridgehead stonecat Australian grayling. Glass knifefish Bombay duck Molly Quillfish',
                        'item_icon' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ],
                    [
                        'item_title' => 'News & Media',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-sm-6',
                        'btn_link' => '#',
                        'btn_title' => 'DETAILS',
                        'item_desc' => 'Glass knifefish Bombay duck Molly Miller Quillfish stargazer collared dogfish silver hake. Temperate bass trout filefish medaka',
                        'item_icon' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ],
                    [
                        'item_title' => 'Public Safety',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-sm-6',
                        'btn_link' => '#',
                        'btn_title' => 'DETAILS',
                        'item_desc' => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio',
                        'item_icon' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ],
                    [
                        'item_title' => 'Film & Production',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-sm-6',
                        'btn_link' => '#',
                        'btn_title' => 'DETAILS',
                        'item_desc' => 'Quillfish stargazer collared dogfish silver hake." Temperate bass trout filefish medaka trout-perch herringdevil ray sleeper',
                        'item_icon' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ],
                    [
                        'item_title' => 'Inspection',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-sm-6',
                        'btn_link' => '#',
                        'btn_title' => 'DETAILS',
                        'item_desc' => 'Bass trout filefish medaka trout-perch herringdevil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege',
                        'item_icon' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ],
                    [
                        'item_title' => 'Construction',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-sm-6',
                        'btn_link' => '#',
                        'btn_title' => 'DETAILS',
                        'item_desc' => 'Grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dusky grouper sand dogfish.',
                        'item_icon' => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ],
                ]
            ]
        );
        $this->end_controls_section();
        /*****   Text Options   ******/
        $this->start_controls_section( 'quadron_services_four_text_settings',
            [
                'label'          => esc_html__( 'Bottom Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'text_left',
            [
                'label'          => esc_html__( 'Text Left', 'quadron' ),
                'type'           => Controls_Manager::WYSIWYG,
                'default'        => 'We provide expert inspection services for your organization’s mission critical assets using drone technology.',
                'dynamic'        => ['active' => true],
                'label_block'    => true,
            ]
        );
        $this->add_control( 'text_right',
            [
                'label'          => esc_html__( 'Text Right', 'quadron' ),
                'type'           => Controls_Manager::WYSIWYG,
                'default'        => 'Triplefin blenny gibberfish ridgehead stonecat Australian grayling. Glass knifefish Bombay duck Molly Miller Quillfish stargazer collared dogfish silver hake. Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dogfish.',
                'dynamic'        => ['active' => true],
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        echo '<div class="section section__indent-07">';
            echo '<div class="container">';
                echo '<div class="col-list-box">';
                    echo '<div class="row '.$settings['col_flex'].'">';
                        foreach ($settings['services_items'] as $item) {
                            $itarget    = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
                            $inofollow  = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
                            $colsm      = $item['colsm'] ? $item['colsm'] : 'col-sm-6';
                            $colmd      = $item['colmd'] ? ' '.$item['colmd'] : ' col-md-4';
                            echo '<div class="'.$colsm.$colmd.'">';
                                echo '<div class="box01">';
                                    if ( ! empty($item['item_icon']['value']) ) {
                                        echo '<div class="box01__icon services-four-icon">';
                                            Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                                        echo '</div>';
                                    }
                                    if ( $item['item_title'] ) {
                                        echo '<h4 class="box01__title">'.$item['item_title'].'</h4>';
                                    }
                                    if ( $item['item_desc'] ) {
                                        echo '<p>'.$item['item_desc'].'</p>';
                                    }
                                    if ( $item['btn_link']['url'] || $item['btn_title'] ) {
                                        echo '<a class="btn-link-icon btn-top btn-link-icon-md" href="'.$item['btn_link']['url'].'"'.$itarget.$inofollow.'>';
                                            echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                            if ( $item['btn_title'] ) {
                                                echo '<span class="btn__text btn__text__md">'.$item['btn_title'].'</span>';
                                            }
                                        echo '</a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                        if ( $settings['text_left'] ) {
                            if ( $settings['text_left'] ) {
                            echo '<div class="col-md-5">';
                            } else {
                            echo '<div class="col-md-8">';
                            }
                                echo '<div class="text-sm base-color-01">'.$settings['text_left'].'</div>';
                            echo '</div>';
                        }
                        if ( $settings['text_right'] ) {
                            if ( $settings['text_left'] ) {
                            echo '<div class="col-md-6 ml-auto">';
                            } else {
                            echo '<div class="col-md-8 ml-auto">';
                            }
                                echo $settings['text_right'];
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
