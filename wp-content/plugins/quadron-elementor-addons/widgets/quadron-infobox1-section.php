<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Infobox1_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-infobox1-section';
    }
    public function get_title() {
        return 'Infobox 1 Section';
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
        $this->start_controls_section('quadron_services_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Title
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'How we work' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Creative Work<br>with Corporate Clients',
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'CONTACT US' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'btn_link',
            [
                'label'         => esc_html__( 'Button Link', 'quadron' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'         => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $this->add_control( 'hideline',
            [
                'label'          => esc_html__( 'Hide Background Line?', 'quadron' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'quadron' ),
                'label_off'      => esc_html__( 'No', 'quadron' ),
                'return_value'   => 'yes',
                'default'        => 'no',
                'separator'      => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   Text Options   ******/
        $this->start_controls_section( 'quadron_services_items_settings',
            [
                'label' => esc_html__('Content', 'quadron'),
            ]
        );
        $this->add_control( 'infobox_items',
            [
                'type'         => Controls_Manager::REPEATER,
                'seperator'    => 'before',
                'default'      => [
                    [
                        'number' => esc_html__('01', 'quadron'),
                        'number2' => esc_html__('06', 'quadron'),
                        'item_title' => 'Identify a core <br>business problem.',
                        'colxl' => 'col-xl-2',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-6',
                    ],
                    [
                        'number' => esc_html__('02', 'quadron'),
                        'number2' => esc_html__('06', 'quadron'),
                        'item_title' => 'Arrive to a <br>technical solution.',
                        'colxl' => 'col-xl-2',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-6',
                    ],
                    [
                        'number' => esc_html__('03', 'quadron'),
                        'number2' => esc_html__('06', 'quadron'),
                        'item_title' => 'Consectetur <br>adipisicing',
                        'colxl' => 'col-xl-2',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-6',
                    ],
                    [
                        'number' => esc_html__('04', 'quadron'),
                        'number2' => esc_html__('06', 'quadron'),
                        'item_title' => 'Connection with <br>Customer Services',
                        'colxl' => 'col-xl-2',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-6',
                    ],
                    [
                        'number' => esc_html__('05', 'quadron'),
                        'number2' => esc_html__('06', 'quadron'),
                        'item_title' => 'Prepare <br>Documentation',
                        'colxl' => 'col-xl-2',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-6',
                    ],
                    [
                        'number' => esc_html__('06', 'quadron'),
                        'number2' => esc_html__('06', 'quadron'),
                        'item_title' => 'Close Project <br>Process',
                        'colxl' => 'col-xl-2',
                        'colmd' => 'col-md-4',
                        'colsm' => 'col-6',
                    ]
                ],
                'fields'       => [
                    [
                        'name'           => 'number',
                        'label'          => esc_html__('Number', 'quadron'),
                        'type'           => Controls_Manager::TEXT,
                        'default'        => esc_html__('01', 'quadron'),
                        'label_block'    => true
                    ],
                    [
                        'name'           => 'number2',
                        'label'          => esc_html__('Number 2', 'quadron'),
                        'type'           => Controls_Manager::TEXT,
                        'default'        => esc_html__('06', 'quadron'),
                        'label_block'    => true
                    ],
                    [
                        'name'           => 'item_title',
                        'label'          => esc_html__('Title', 'quadron'),
                        'type'           => Controls_Manager::TEXTAREA,
                        'default'        => 'Title',
                        'label_block'    => true
                    ],
                    [
                        'name'        => 'colxl',
                        'label'       => esc_html__( 'Column XL', 'quadron' ),
                        'type'        => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default'     => 'col-xl-2',
                        'options'     => [
                            'col-xl-2'    => esc_html__( 'Default', 'quadron' ),
                            'col-xl-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-xl-3'    => esc_html__( '3 Column', 'quadron' ),
                            'col-xl-4'    => esc_html__( '4 Column', 'quadron' ),
                            'col-xl-6'    => esc_html__( '6 Column', 'quadron' ),
                            'col-xl-12'   => esc_html__( '12 Column', 'quadron' ),
                        ]
                    ],
                    [
                        'name'        => 'colmd',
                        'label'       => esc_html__( 'Column XL', 'quadron' ),
                        'type'        => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default'     => 'col-md-2',
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
                        'label'       => esc_html__( 'Column XL', 'quadron' ),
                        'type'        => Controls_Manager::SELECT,
                        'label_block' => 'true',
                        'default'     => 'col-6',
                        'options'     => [
                            'col-6'    => esc_html__( 'Default 6 Column', 'quadron' ),
                            'col-auto' => esc_html__( 'Auto', 'quadron' ),
                            'col-12'   => esc_html__( '12 Column', 'quadron' ),
                        ]
                    ]
                ],
                'title_field'     => '{{item_title}}'
            ]
        );
        $this->end_controls_section();
        /*****   End Button Options   ******/

        /***** Title Style ******/
        $this->start_controls_section('features_title_styling',
            [
                'label'         => esc_html__( 'Title Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow','txtshadow'),$id='feature_title',$selector='.the-feature .title');
        $this->end_controls_section();
        /***** End Title Style ******/

        /***** Description Style ******/
        $this->start_controls_section('features_desc_styling',
            [
                'label'         => esc_html__( 'Description Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow','txtshadow'),$id='feature_desc',$selector='.the-feature .desc');
        $this->end_controls_section();
        /***** End Description Style ******/

        /***** Icon Style ******/
        $this->start_controls_section('features_icon_styling',
            [
                'label'         => esc_html__( 'Icon Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo'),$id='feature_icon',$selector='.the-feature i, {{WRAPPER}} .the-feature span');
        $this->end_controls_section();
        /***** End Icon Style ******/

        /***** Button Style ******/
        $this->start_controls_section('features_btn_styling',
            [
                'label'         => esc_html__( 'Box Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs('features_tabs');
        $this->start_controls_tab( 'features_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('color'),$id='features_normal',$selector='.the-feature');
        $this->end_controls_tab();

        $this->start_controls_tab('features_hover_tab',
            [ 'label'  => esc_html__( 'Hover', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','margin'),$id='features_hover',$selector='.the-feature:hover');
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /***** End Button Styling *****/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $target     = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow   = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $lineimg = 'yes' != $settings['hideline'] ? ' data-bg="'.$line_image.'"' : '';

        echo '<div class="section section__indent-04 section--bg-vertical-line section--bg-01 section--inner-01"'.$lineimg.'>';
            echo '<div class="container">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading section-heading_indentg02">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h4 class="title">'.$settings['title'].'</h4>';
                        }
                    echo '</div>';
                }
                echo '<div class="infobox01-list-col">';
                    echo '<div class="row">';
                        foreach ($settings['infobox_items'] as $item) {
                            $colxl = $item['colxl'] ? $item['colxl'] : 'col-xl-2';
                            $colmd = $item['colmd'] ? ' '.$item['colmd'] : ' col-md-4';
                            $colsm = $item['colsm'] ? ' '.$item['colsm'] : ' col-6';
                            echo '<div class="'.$colxl.$colmd.$colsm.'">';
                                echo '<div class="infobox01">';
                                    if ( $item['number'] ) {
                                        $number2 = $item['number2'] ? '<span>/'.$item['number2'].'</span>' : '';
                                        echo '<div class="infobox01__value">'.$item['number'].$number2.'</div>';
                                    }
                                    if ( $item['item_title'] ) {
                                        echo '<div class="infobox01__title">'.$item['item_title'].'</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
                if ( $settings['btn_link']['url'] ) {
                    echo '<div class="btn-row btn-top">';
                        echo '<a class="btn-link-icon" href="'.$settings['btn_link']['url'].'"'.$target .$nofollow.'>';
                            echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                            if ( $settings['btn_title'] ) {
                                echo '<span class="btn__text">'.$settings['btn_title'].'</span>';
                            }
                        echo '</a>';
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    }
}
