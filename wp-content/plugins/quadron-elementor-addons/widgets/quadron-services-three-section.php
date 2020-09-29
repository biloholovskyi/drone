<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Three_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-three-section';
    }
    public function get_title() {
        return 'Sevices 3 Section';
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
        $this->start_controls_section( 'quadron_services_three_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Additional Services' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Special Things',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section( 'quadron_services_three_settings',
            [
                'label' => esc_html__('Services Items', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $repeater->add_control( 'item_number',
            [
                'label'          => esc_html__( 'Number', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => '01',
                'label_block'    => true,
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
        $repeater->add_control( 'item_more',
            [
                'label'          => esc_html__( 'More', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'MORE',
                'label_block'    => true,
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
        $repeater->add_control( 'item_link',
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
        $this->add_control( 'services_items',
            [
                'label'          => esc_html__( 'Items', 'nt-addons' ),
                'type'           => Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'title_field'    => '{{item_title}}',
                'default'        => [
                    [
                        'item_number'  => esc_html__( '01', 'nt-addons' ),
                        'item_title'  => esc_html__( 'Entertainment', 'nt-addons' ),
                        'colmd'  => 'col-md-4',
                        'colsm'  => 'col-sm-6',
                        'item_link'  => '#',
                        'item_more'  => 'MORE',
                        'item_desc'  => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver.'
                    ],
                    [
                        'item_number'  => esc_html__( '02', 'nt-addons' ),
                        'item_title'  => esc_html__( 'Broadcasts', 'nt-addons' ),
                        'colmd'  => 'col-md-4',
                        'colsm'  => 'col-sm-6',
                        'item_link'  => '#',
                        'item_more'  => 'MORE',
                        'item_desc'  => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver.'
                    ],
                    [
                        'item_number'  => esc_html__( '03', 'nt-addons' ),
                        'item_title'  => esc_html__( 'Science', 'nt-addons' ),
                        'colmd'  => 'col-md-4',
                        'colsm'  => 'col-sm-6',
                        'item_link'  => '#',
                        'item_more'  => 'MORE',
                        'item_desc'  => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver.'
                    ]
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();

        echo '<div class="section">';
            echo '<div class="container">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading text-center section-heading_indentg04">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description">'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h4 class="title">'.$settings['title'].'</h4>';
                        }
                    echo '</div>';
                }
                echo '<div class="row">';
                $count = 0;
                foreach ($settings['services_items'] as $item) {
                    $itarget    = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                    $inofollow  = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                    $colmd      = $item['colmd'] ? ' '.$item['colmd'] : ' col-md-4';
                    $colsm      = $item['colsm'] ? $item['colsm'] : 'col-sm-6';
                    $imagealt   = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                    $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file(  $item['item_image']['id'] ) );
                    echo '<div class="'.$colsm.$colmd.'">';
                        echo '<a href="'.$item['item_link']['url'].'"'.$itarget.$inofollow.' class="promobox03 block-once">';
                            echo '<div class="promobox03__img">';
                                echo '<img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'">';
                            echo '</div>';
                            echo '<div class="promobox03__description">';
                                if ( $item['item_number'] ) {
                                    echo '<div class="promobox03__number">'.$item['item_number'].'</div>';
                                }
                                echo '<div class="promobox03__layout">';
                                    if ( $item['item_title'] ) {
                                        echo '<h4 class="promobox03__title">'.$item['item_title'].'</h4>';
                                    }
                                    echo '<div class="promobox03__show">';
                                        if ( $item['item_desc'] ) {
                                            echo '<p>'.$item['item_desc'].'</p>';
                                        }
                                        if ( $item['item_more'] ) {
                                            echo '<span class="promobox03__link">'.$item['item_more'].'</span>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
