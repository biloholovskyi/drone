<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Features_Masonry_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-features-masonry-section';
    }
    public function get_title() {
        return 'Features Masonry Section';
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
        $this->start_controls_section( 'quadron_features_one_text_settings',
            [
                'label' => esc_html__( 'Text', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Mobile App' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Innovations and <br>Breakthroughs',
                'label_block' => true,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'         => 'featgures_background',
                'label'        => esc_html__( 'Background', 'quadron' ),
                'types'        => [ 'classic', 'gradient' ],
                'selector'     => '{{WRAPPER}} .section--bg-wrapper-03',
                'separator'    => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_features_one_items_settings',
            [
                'label' => esc_html__('Features Items', 'quadron'),
            ]
        );
        $this->add_control( 'column',
            [
                'label' => esc_html__( 'Column', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '3',
                'options' => [
                    '2' => esc_html__( '2 Column', 'quadron' ),
                    '3' => esc_html__( '3 Column', 'quadron' ),
                    '4' => esc_html__( '4 Column', 'quadron' ),
                ]
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
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'item_image[url]!' => '' ]
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Item Title',
                'label_block' => true,
            ]
        );
        $repeater->add_control( 'item_desc',
            [
                'label' => esc_html__( 'Short Description', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi',
                'label_block' => true,
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
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html( '{{item_title}}' ),
                'default' => [
                    [
                        'item_title' => 'Create cinematic<br> dron footage',
                        'item_link' => '#',
                        'item_desc' => 'X-ray tetra, saury queen danio Ragfish Red whalefish lamprey poolfish combtooth blenny; jackfish arowana.'
                    ],
                    [
                        'item_title' => 'How to Fly Safely Over Water',
                        'item_link' => '#',
                        'item_desc' => 'Plaice nurseryfish wels catfish tadpole fish bigmouth buffalo.'
                    ],
                    [
                        'item_title' => 'In-depth Customer Service Experience',
                        'item_link' => '#',
                        'item_desc' => 'Bigmouth buffalo bullhead shark fire bar danio river stingray warbonnet; chub shrimpfish. Lampfish marlin'
                    ],
                    [
                        'item_title' => '9 MUST DO\'S in Thailand',
                        'item_link' => '#',
                        'item_desc' => 'Plaice nurseryfish wels catfish tadpole fish bigmouth buffalo bullhead shark fire bar danio river stingray warbonnet.'
                    ],
                    [
                        'item_title' => 'Sky using<br>Mavic 2 Pro!',
                        'item_link' => '#',
                        'item_desc' => 'X-ray tetra, saury queen danio Ragfish Red whalefish lamprey poolfish combtooth blenny; jackfish arowana.'
                    ],
                    [
                        'item_title' => 'Create cinematic<br> dron footage',
                        'item_link' => '#',
                        'item_desc' => 'Bar danio river stingray warbonnet; chub shrimpfish.'
                    ]
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        $column    = $settings['column'] ? $settings['column'] : '3';
        echo '<div class="section section--bg-wrapper-03 section-default-inner section--bg-wrapper-bottom features-masonry">';
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
                echo '<div class="masonry-layout-01">';
                    echo '<div class="masonry-layout-01-init grid-col-'.$column.'">';
                        foreach ($settings['services_items'] as $item) {
                            $itarget   = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                            $inofollow = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                            $imagealt  = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                            $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $item['item_image']['id'] ) );
                            echo '<div class="element-item">';
                                echo '<a href="'.$item['item_link']['url'].'" class="item"'.$itarget.$inofollow.'>';
                                    echo '<div class="item__wrapper">';
                                        if ( $item['item_title'] ) {
                                            echo '<h4 class="item__title">'.$item['item_title'].'</h4>';
                                        }
                                        if ( $item['item_desc'] ) {
                                            echo '<p>'.$item['item_desc'].'</p>';
                                        }
                                    echo '</div>';
                                    echo '<img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'">';
                                echo '</a>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
