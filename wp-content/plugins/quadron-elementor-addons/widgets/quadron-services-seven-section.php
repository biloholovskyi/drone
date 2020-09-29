<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Seven_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-seven-section';
    }
    public function get_title() {
        return 'Sevices 7 CheessBox Section';
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
        $this->start_controls_section( 'quadron_services_seven_settings',
            [
                'label' => esc_html__('Services Items', 'quadron')
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'bg_type',
            [
                'label' => esc_html__( 'Background type', 'quadron'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('None', 'quadron'),
                    'bg-base' => esc_html__('BG Base', 'quadron'),
                ],
                'default' => ''
            ]
        );
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/chessbox_fluid_img01.png', __DIR__ )]
            ]
        );
        $repeater->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'img_background',
                'label' => esc_html__( 'Image Section Background', 'quadron' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '',
                'separator' => 'before'
            ]
        );
        $repeater->add_control( 'item_number',
            [
                'label' => esc_html__( 'Number', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '01',
                'label_block' => true
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Item Title',
                'label_block' => true
            ]
        );
        $repeater->add_control( 'item_desc',
            [
                'label' => esc_html__( 'Short Description', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<p>Hammerhead shark, Spanish mackerel, pencil catfish wrasse velvet-belly shark straptail eagle ray coho salmon sand lance whiptail gulper!</p>',
                'dynamic' => ['active' => true],
                'label_block' => true
            ]
        );
        $repeater->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'DISCOVER',
                'label_block' => true
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
                'label' => esc_html__( 'Items', 'nt-quadron' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{item_title}}',
                'default' => [
                    [
                        'bg_type' => '',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/chessbox_fluid_img01.png', __DIR__ )],
                        'item_number' => '01',
                        'item_title' => 'Sparks Controller<br>Combo Drone',
                        'btn_title' => 'DISCOVER',
                        'item_link' => '#',
                        'item_desc' => '<p>Hammerhead shark, Spanish mackerel, pencil catfish wrasse velvet-belly shark straptail eagle ray coho salmon sand lance whiptail gulper!</p>'
                    ],
                    [
                        'bg_type' => 'bg-base',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/chessbox_fluid_img01.png', __DIR__ )],
                        'item_number' => '02',
                        'item_title' => 'Quadron 2 Pro',
                        'btn_title' => 'DISCOVER',
                        'item_link' => '#',
                        'item_desc' => '<p>European perch false moray fire bar danio greenling orangestriped triggerfish. gulper!</p>'
                    ],
                    [
                        'bg_type' => '',
                        'item_image' => ['url' => plugins_url( 'assets/front/img/chessbox_fluid_img01.png', __DIR__ )],
                        'item_number' => '03',
                        'item_title' => 'Inspire 2 HFX',
                        'btn_title' => 'DISCOVER',
                        'item_link' => '#',
                        'item_desc' => '<p>Hammerhead shark, Spanish mackerel, pencil catfish wrasse velvet-belly shark straptail eagle ray coho salmon sand lance whiptail gulper!</p>'
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

        echo '<div class="section--no-padding section">';
            echo '<div class="chessbox02">';
            $counter = 0;
            foreach ($settings['services_items'] as $item) {
                $itarget    = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                $inofollow  = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                $imagealt   = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file(  $item['item_image']['id'] ) );
                $bgbase     = $item['bg_type'] == 'bg-base' ? ' bg-base' : '';
                $bgbase2    = $item['bg_type'] == 'bg-base' ? ' btn-color-01' : '';
                $itembg     = $item['img_background_background'] != '' ? ' style="background-image:url('.$item['img_background_image']['url'].');"' : '';
                $firstitem  = $counter == 0 ? ' chessbox02__item-top' : '';
                $counter++;
                echo '<div class="chessbox02__item'.$firstitem.$bgbase.'">';
                    if ( $item['item_image']['url'] ) {
                        echo '<div class="chessbox02__img"'.$itembg.'><img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'"></div>';
                    }
                    echo '<div class="chessbox02__description">';
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
                        echo $item['item_desc'];
                        if ( $item['item_link']['url'] || $item['btn_title'] ) {
                            echo '<a class="btn-link-icon btn-top'.$bgbase2.'" href="'.$item['item_link']['url'].'"'.$itarget.$inofollow.'>';
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
    }
}
