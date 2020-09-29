<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Partners_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-partners-slider-section';
    }
    public function get_title() {
        return 'Partners Slider';
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
        $this->start_controls_section( 'quadron_partner_slider_settings',
            [
                'label' => esc_html__('Slider Content', 'quadron'),
            ]
        );
        $this->add_control( 'slider_type',
            [
                'label' => esc_html__('Style', 'quadron'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'type1' => esc_html__('Style 1', 'quadron'),
                    'type2' => esc_html__('Style 2', 'quadron'),
                    'type3' => esc_html__('Style 3', 'quadron'),
                ],
                'default' => 'type1'
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'partner1_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $repeater->add_control( 'link1',
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
        $repeater->add_control( 'partner2_image',
            [
                'label' => esc_html__( 'Image 2', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $repeater->add_control( 'link2',
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
        $this->add_control('partners',
            [
                'label'          => esc_html__( 'Items', 'nt-addons' ),
                'type'           => Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'title_field'    => 'Slide Item',
                'default'        => [
                    [
                        'partner1_image'  => esc_html__( 'Image 1', 'nt-addons' ),
                        'partner2_image'  => esc_html__( 'Image 2', 'nt-addons' ),
                    ],
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'section_bg_styling',
            [
                'label' => esc_html__( 'Section Partners Style', 'urip' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_partners_bg',
                'label' => esc_html__( 'Background', 'quadron' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .section--bg-03, {{WRAPPER}} .section--bg-01',
                'separator' => 'before'
            ]
        );
        $this->add_control( 'section_partners_inner_trans_bg',
            [
                'label' => esc_html__('Set inner bg as Transparent?', 'quadron'),
                'type' => Controls_Manager::SWITCHER,
                'selectors' => [
                    '{{WRAPPER}} .wrapper-carusel-two-col' => 'background-color: transparent;',
                    '{{WRAPPER}} .extra-wrapper-left:before' => 'background-color: transparent;',
                    '{{WRAPPER}} .wrapper-carusel-two-col .carusel-two-col:before' => 'background-image: none;',
                ]
            ]
        );
        $this->add_responsive_control( 'section_partners_margin',
            [
                'label' => esc_html__( 'Margin', 'urip' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section--bg-03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section--bg-01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control( 'section_partners_padding',
            [
                'label' => esc_html__( 'Margin', 'urip' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section--bg-03' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section--bg-01' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        if ($settings['slider_type'] == 'type2' ) {
            echo '<div class="section section__indent-11 section--bg-03 section--pr partners-type2">';
                echo '<div class="container">';
                    echo '<div class="section">';
                        echo '<div class="wrapper-carusel-partners wrapper-arrow-center">';
                            echo '<div class="carusel-partners js-carusel-partners">';
                                foreach ($settings['partners'] as $item) {
                                    $imagealt1   = esc_attr(get_post_meta($item['partner1_image']['id'], '_wp_attachment_image_alt', true));
                                    $imagealt1   = $imagealt1 ? $imagealt1 : basename ( get_attached_file( $item['partner1_image']['id'] ) );
                                    $imagealt2   = esc_attr(get_post_meta($item['partner2_image']['id'], '_wp_attachment_image_alt', true));
                                    $imagealt2   = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $item['partner2_image']['id'] ) );
                                    $target1     = $item['link1']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow1   = $item['link1']['nofollow'] ? ' rel="nofollow"' : '';
                                    $target2     = $item['link2']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow2   = $item['link2']['nofollow'] ? ' rel="nofollow"' : '';
                                    echo '<div class="item">';
                                        echo '<a href="'.$item['link1']['url'].'"'.$target1.$nofollow1.'><img src="'.$item['partner1_image']['url'].'" alt="'.$imagealt1.'"></a>';
                                        echo '<a href="'.$item['link2']['url'].'"'.$target2.$nofollow2.'><img src="'.$item['partner2_image']['url'].'" alt="'.$imagealt2.'"></a>';
                                    echo '</div>';
                                }
                            echo '</div>';
                            echo '<div class="slick-slick-arrow">';
                                echo '<div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>';
                                echo '<div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        } elseif ($settings['slider_type'] == 'type3' ) {
            echo '<div class="section section__indent-11 section--bg-03 section--pr partners-type3">';
                echo '<div class="container">';
                    echo '<div class="section">';
                        echo '<div class="wrapper-carusel-partners wrapper-arrow-left">';
                            echo '<div class="carusel-two-col js-carusel-twocol-fullwidth">';
                            foreach ($settings['partners'] as $item) {
                                $imagealt1   = esc_attr(get_post_meta($item['partner1_image']['id'], '_wp_attachment_image_alt', true));
                                $imagealt1   = $imagealt1 ? $imagealt1 : basename ( get_attached_file( $item['partner1_image']['id'] ) );
                                $imagealt2   = esc_attr(get_post_meta($item['partner2_image']['id'], '_wp_attachment_image_alt', true));
                                $imagealt2   = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $item['partner2_image']['id'] ) );
                                $target1     = $item['link1']['is_external'] ? ' target="_blank"' : '';
                                $nofollow1   = $item['link1']['nofollow'] ? ' rel="nofollow"' : '';
                                $target2     = $item['link2']['is_external'] ? ' target="_blank"' : '';
                                $nofollow2   = $item['link2']['nofollow'] ? ' rel="nofollow"' : '';
                                echo '<div class="item">';
                                    echo '<a href="'.$item['link1']['url'].'"'.$target1.$nofollow1.'><img src="'.$item['partner1_image']['url'].'" alt="'.$imagealt1.'"></a>';
                                    echo '<div class="carusel-separator"><i class="icon"></i></div>';
                                    echo '<a href="'.$item['link2']['url'].'"'.$target2.$nofollow2.'><img src="'.$item['partner2_image']['url'].'" alt="'.$imagealt2.'"></a>';
                                echo '</div>';
                            }
                            echo '</div>';
                            echo '<div class="slick-slick-arrow">';
                                echo '<div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>';
                                echo '<div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

        } else {
        echo '<div class="section section--bg-01 section--pr">';
            echo '<div class="container extra-wrapper-left">';
                echo '<div class="wrapper-carusel-two-col section">';
                    echo '<div class="carusel-two-col js-carusel-two-col js-slick slick-arrow-extraleft">';
                        foreach ($settings['partners'] as $item) {
                            $imagealt1   = esc_attr(get_post_meta($item['partner1_image']['id'], '_wp_attachment_image_alt', true));
                            $imagealt1   = $imagealt1 ? $imagealt1 : basename ( get_attached_file( $item['partner1_image']['id'] ) );
                            $imagealt2   = esc_attr(get_post_meta($item['partner2_image']['id'], '_wp_attachment_image_alt', true));
                            $imagealt2   = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $item['partner2_image']['id'] ) );
                            $target1     = $item['link1']['is_external'] ? ' target="_blank"' : '';
                            $nofollow1   = $item['link1']['nofollow'] ? ' rel="nofollow"' : '';
                            $target2     = $item['link2']['is_external'] ? ' target="_blank"' : '';
                            $nofollow2   = $item['link2']['nofollow'] ? ' rel="nofollow"' : '';
                            echo '<div class="item">';
                                echo '<a href="'.$item['link1']['url'].'"'.$target1.$nofollow1.'><img src="'.$item['partner1_image']['url'].'" alt="'.$imagealt1.'"></a>';
                                echo '<div class="carusel-separator"><i class="icon"></i></div>';
                                echo '<a href="'.$item['link2']['url'].'"'.$target2.$nofollow2.'><img src="'.$item['partner2_image']['url'].'" alt="'.$imagealt2.'"></a>';
                            echo '</div>';
                        }
                    echo '</div>';
                    echo '<div class="slick-arrow-extraleft">';
                        echo '<div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>';
                        echo '<div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        }
    }
}
