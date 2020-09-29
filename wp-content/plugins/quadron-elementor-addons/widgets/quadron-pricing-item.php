<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Pricing_Item_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-pricing-item';
    }
    public function get_title() {
        return 'Pricing Item';
    }
    public function get_icon() {
        return 'eicon-price-table';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {

        // Post Options
        $this->start_controls_section( 'quadron_pricing_options',
            [
                'label'          => esc_html__( 'Pack Options', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT
            ]
        );
        // Custom Data Options
        $this->add_control( 'pack_icon',
            [
                'label' => esc_html__('Icon', 'quadron'),
                'type' => Controls_Manager::ICONS,
                'default'   => [
                    'value' => 'fas fa-home',
                    'library' => 'fa-solid'
                ]
            ]
        );
        $this->add_control( 'pack_title',
            [
                'label'          => esc_html__( 'Pack Name', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'pleaceholder'   => esc_html__( 'Enter pack title here', 'quadron' ),
                'default'        => 'Personal',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'price',
            [
                'label'          => esc_html__( 'Price', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'pleaceholder'   => esc_html__( 'Enter pack price here', 'quadron' ),
                'default'        => '$100',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'pack_list',
            [
                'type'         => Controls_Manager::REPEATER,
                'label'        => esc_html__( 'Features of Pack', 'quadron' ),
                'seperator'    => 'before',
                'default'      => [
                    ['list_item' => esc_html__('Occaecat cupidatat', 'quadron')],
                    ['list_item' => esc_html__('Officiadese runt mollit', 'quadron')],
                    ['list_item' => esc_html__('Lanim id est laborum.', 'quadron')],
                    ['list_item' => esc_html__('Anim id est laborum.', 'quadron')],
                ],
                'fields'       => [
                    [
                        'name'           => 'list_item',
                        'label'          => esc_html__('Features', 'quadron'),
                        'type'           => Controls_Manager::TEXT,
                        'default'        => esc_html__('Features list 1', 'quadron'),
                        'label_block'    => true,
                    ],
                    [
                        'name'           => 'checked',
                        'label'          => esc_html__( 'Checked?', 'quadron' ),
                        'type'           => Controls_Manager::SWITCHER,
                        'default'        => 'no',
                        'return_value'   => 'yes',
                    ]
                ],
                'title_field'     => '{{list_item}}',
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('quadron_pricing_btn_settings',
            [
                'label'          => esc_html__( 'Button', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'label_block'    => true,
                'default'        => esc_html__( 'GET STARTED', 'quadron' )
            ]
        );
        $this->add_control( 'btn_link',
            [
                'label'          => esc_html__( 'Button Link', 'quadron' ),
                'type'           => Controls_Manager::URL,
                'label_block'    => true,
                'default'        => [
                    'url'            => '#',
                    'is_external'    => ''
                ],
                'show_external'  => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="promo-cart">';
            if ( ! empty($settings['pack_icon']['value']) ) {
                echo '<div class="promo-cart__icon">';
                    Icons_Manager::render_icon( $settings['pack_icon'], [ 'aria-hidden' => 'true' ] );
                echo '</div>';
            }
            if ( $settings['pack_title'] ) {
                echo '<div class="promo-cart__title">'.$settings['pack_title'].'</div>';
            }
            echo '<div class="promo-cart__list">';
                echo '<ul>';
                foreach ($settings['pack_list'] as $list) {
                    echo '<li>';
                        echo $list['checked'] == 'yes' ? '<span class="icon"><svg><use xlink:href="#list_marker_02"></use></svg></span>' : '';
                        echo $list['list_item'];
                    echo '</li>';
                }
                echo '</ul>';
            echo '</div>';
            if ( $settings['price'] ) {
                echo '<div class="promo-cart__price">'.$settings['price'].'</div>';
            }
            if ( $settings['btn_title'] ) {
                $target   = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
                echo '<a href="'.$settings['btn_link']['url'].'"'.$target.$nofollow.' class="btn-custom">'.$settings['btn_title'].'</a>';
            }
        echo '</div>';
    }
}
