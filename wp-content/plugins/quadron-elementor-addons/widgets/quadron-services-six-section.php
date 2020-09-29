<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Six_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-six-section';
    }
    public function get_title() {
        return 'Sevices 6 CheessBox Section';
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
        $this->start_controls_section( 'quadron_services_three_text_settings',
            [
                'label' => esc_html__( 'Heading Text Content', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'text_content',
            [
                'label' => esc_html__( 'Content', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Footballfish bottlenose steelhead eel sawtooth eel South American Lungfish marine hatchetfish. Sabertooth Ganges shark whalefish clown triggerfish, Rabbitfish hairtail tarwhine vendace.',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_services_six_settings',
            [
                'label' => esc_html__('Services Items', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/chessbox_img_01.jpg', __DIR__ )],
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
        $repeater->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'DISCOVER',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_link',
            [
                'label' => esc_html__( 'Button Link', 'quadron' ),
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
                        'item_image'  => ['url' => plugins_url( 'assets/front/img/chessbox_img_01.jpg', __DIR__ )],
                        'item_number'  => '01',
                        'item_title'  => 'Care Refresh –<br>Protect Your Purchase',
                        'btn_title'  => 'DISCOVER',
                        'item_link'  => '#',
                        'item_desc'  => 'Garden eel labyrinth fish; round stingray. Fathead sculpin hawkfish mudskipper bonytail chub ruffe barbeled dragonfish yellowbelly tail catfish, spotted danio.'
                    ],
                    [
                        'item_image'  => ['url' => plugins_url( 'assets/front/img/chessbox_img_01.jpg', __DIR__ )],
                        'item_number'  => '02',
                        'item_title'  => 'When the quadcopter <br>is first switched on',
                        'btn_title'  => 'DISCOVER',
                        'item_link'  => '#',
                        'item_desc'  => 'Garden eel labyrinth fish; round stingray. Fathead sculpin hawkfish mudskipper bonytail chub ruffe barbeled dragonfish yellowbelly tail catfish, spotted danio'
                    ]
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        echo '<div class="section section__indent-03" style="overflow: hidden;">';
            echo '<div class="container">';
                echo '<div class="row justify-content-center">';
                    if ( $settings['text_content'] ) {
                        echo '<div class="col-10 col-lg-8"><div class="text-center text-md base-color-01">'.$settings['text_content'].'</div></div>';
                    }
                    echo '<div class="chessbox chessbox-top-01">';
                    foreach ($settings['services_items'] as $item) {
                        $itarget    = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                        $inofollow  = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                        $imagealt   = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file(  $item['item_image']['id'] ) );
                        echo '<div class="chessbox__item">';
                            if ( $item['item_image']['url'] ) {
                                echo '<div class="chessbox__img"><img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'"></div>';
                            }
                            echo '<div class="chessbox__description">';
                                if ( $item['item_number'] || $item['item_title'] ) {
                                    echo '<div class="section-heading">';
                                        if ( $item['item_number'] ) {
                                            echo '<div class="description"><i></i>'.$item['item_number'].'</div>';
                                        }
                                        if ( $item['item_title'] ) {
                                            echo '<h4 class="title">'.$item['item_title'].'</h4>';
                                        }
                                    echo '</div>';
                                }
                                if ( $item['item_desc'] ) {
                                    echo '<p>'.$item['item_desc'].'</p>';
                                }
                                if ( $item['item_link']['url'] || $item['btn_title'] ) {
                                    echo '<a class="btn-link-icon btn-top" href="'.$item['item_link']['url'].'"'.$itarget.$inofollow.'>';
                                        echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                        if ( $item['btn_title'] ) {
                                            echo '<span class="btn__text">'.$item['btn_title'].'</span>';
                                        }
                                    echo '</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
