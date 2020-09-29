<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-section';
    }
    public function get_title() {
        return 'Sevices Section';
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
                'default'        => esc_html__( 'Services' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'We Help you<br>Embarace the Future',
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('text_content',
            [
                'label'          => esc_html__( 'Description', 'quadron' ),
                'type'           => Controls_Manager::WYSIWYG,
                'default'        => 'Threadsail yellowfin surgeonfish river shark sawtooth eel golden trout sand tiger. Canary rockfish anchovy clingfish,Dragon goby plunderfish killifish flounder bluntnose minnow cuckoo wrasse? Triggerfish panga goatfish zander spearfish longfin smelt, false brotula Rattail cherry salmon.',
                'dynamic'        => ['active' => true],
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'DISCOVER' , 'quadron' ),
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
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'         => 'bgimg',
                'label'        => esc_html__( 'Background Image', 'quadron' ),
                'types'        => [ 'classic', 'gradient' ],
                'selector'     => '{{WRAPPER}} .section--bg-01',
                'separator'    => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   Text Options   ******/
        $this->start_controls_section( 'quadron_services_items_settings',
            [
                'label' => esc_html__('Content', 'quadron'),
            ]
        );
        $this->add_control( 'services_items',
            [
                'type'         => Controls_Manager::REPEATER,
                'seperator'    => 'before',
                'default'      => [
                    [
                        'number' => esc_html__('01', 'quadron'),
                        'item_title' => 'Delivery',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'number' => esc_html__('02', 'quadron'),
                        'item_title' => 'News & Media',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'number' => esc_html__('03', 'quadron'),
                        'item_title' => 'Public Safety',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'number' => esc_html__('04', 'quadron'),
                        'item_title' => 'Film<br>Production',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'number' => esc_html__('05', 'quadron'),
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
                        'name'           => 'number',
                        'label'          => esc_html__('Number', 'quadron'),
                        'type'           => Controls_Manager::TEXT,
                        'default'        => esc_html__('01', 'quadron'),
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
                        'name'              => 'item_icon',
                        'label'             => esc_html__('Icon', 'quadron'),
                        'type'              => Controls_Manager::ICONS,
                        'default'           => [
                            'value'     => 'fas fa-home',
                            'library'   => 'fa-solid'
                        ],
                        'condition' => [ 'use_imgicon!' => 'yes' ]
                    ],
                    [
                        'name'           => 'use_imgicon',
                        'label'          => esc_html__( 'Use Image Icon?', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'return_value'   => 'yes',
                        'default'        => 'no'
                    ],
                    [
                        'name' => 'item_imgicon',
                        'label' => esc_html__( 'Icon Image', 'quadron' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => ['url' => ''],
                        'condition' => [ 'use_imgicon' => 'yes' ]
                    ],
                    [
                        'name'           => 'use_asbg',
                        'label'          => esc_html__( 'Use This Image as Background?', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'return_value'   => 'yes',
                        'default'        => 'no',
                        'condition' => [ 'use_imgicon' => 'yes' ]
                    ],
                    [
                        'name' => 'min_height',
                        'label' => esc_html__( 'Min Height', 'nt-addons' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 300,
                        'default' => '',
                        'conditions' => [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name' => 'use_imgicon',
                                    'operator' => '==',
                                    'value' => 'yes'
                                ],
                                [
                                    'name' => 'use_asbg',
                                    'operator' => '==', // it accepts:  =,==, !=,!==,  in, !in etc.
                                    'value' => 'yes'
                                ]
                            ]
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
        $target     = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow   = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );

        echo '<div class="section--bg-01 section--bg-wrapper-01 section--pr">';
            echo '<div class="section__indent-01 section--bg-vertical-line" data-bg="'.$line_image.'">';
                echo '<div class="container">';
                    echo '<div class="row no-gutters">';
                        echo '<div class="col-xl-4">';
                            if ( $settings['subtitle'] || $settings['title'] ) {
                                echo '<div class="section-heading">';
                                    if ( $settings['subtitle'] ) {
                                        echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                    }
                                    if ( $settings['title'] ) {
                                        echo '<h3 class="title">'.$settings['title'].'</h3>';
                                    }
                                echo '</div>';
                            }
                            echo $settings['text_content'];
                            if ( $settings['btn_link']['url'] || $settings['btn_title'] ) {
                                echo '<a class="btn-link-icon btn-top" href="'.$settings['btn_link']['url'].'"'.$target .$nofollow.'>';
                                    echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                    if ( $settings['btn_title'] ) {
                                        echo '<span class="btn__text">'.$settings['btn_title'].'</span>';
                                    }
                                echo '</a>';
                            }
                        echo '</div>';
                        echo '<div class="divider divider__lg d-block d-xl-none"></div>';
                        echo '<div class="col-xl-7 offset-xl-1">';
                            echo '<ul class="list-menu">';
                            foreach ($settings['services_items'] as $item) {
                                $itarget     = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                                $inofollow   = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                                $hasimgicon   = 'yes' == $item['use_imgicon'] ? ' has-img-icon' : '';
                                echo '<li class="list-menu_item">';
                                    if ( $item['item_link']['url'] ) {
                                        echo '<a href="'.$item['item_link']['url'].'"'.$itarget.$inofollow.'>';
                                    }
                                    if ( 'yes' == $item['use_imgicon'] && $item['item_imgicon']['url'] ) {

                                        $min_height = $item['min_height'] ? ' min-height:'.$item['min_height'].'px;' : '';
                                        $imgicon = $item['item_imgicon']['url'];
                                        $bgimg = 'yes' == $item['use_asbg'] ? ' style="background:#fff url(\''.esc_url($imgicon).'\') no-repeat center;background-size:cover;'.$min_height.'"' : '';
                                        echo '<div class="list-menu__icon"'.$bgimg.'>';
                                            if ( $item['item_imgicon']['url'] && 'yes' != $item['use_asbg'] ) {
                                                $imagealt   = esc_attr(get_post_meta($item['item_imgicon']['id'], '_wp_attachment_image_alt', true));
                                                $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $item['item_imgicon']['id'] ) );
                                                echo '<img class="icon-img" src="'.$imgicon.'" alt="'.$imagealt.'">';
                                            }
                                        echo '</div>';
                                    } else {
                                        echo '<div class="list-menu__icon">';
                                            if ( ! empty($item['item_icon']['value']) ) {
                                                Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                                            }
                                        echo '</div>';
                                    }
                                        echo '<div class="list-menu__description">';
                                            if ( $item['number'] ) {
                                                echo '<span class="list-menu__value">' . $item['number'] . '</span>';
                                            }
                                            if ( $item['item_title'] ) {
                                                echo '<h4 class="list-menu__title">' . $item['item_title'] . '</h4>';
                                            }
                                        echo '</div>';
                                        if ( $item['item_link']['url'] ) {
                                            echo '</a>';
                                        }
                                echo '</li>';
                            }
                            echo '</ul>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
