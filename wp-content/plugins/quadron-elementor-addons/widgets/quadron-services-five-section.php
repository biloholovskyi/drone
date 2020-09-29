<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Five_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-five-section';
    }
    public function get_title() {
        return 'Sevices 5 List Section';
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
        $this->start_controls_section( 'quadron_services_text_settings',
            [
                'label' => esc_html__( 'Text', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Use Platform' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Efficiency and Optimization',
                'label_block' => true,
            ]
        );
        $this->add_control( 'text_content',
            [
                'label' => esc_html__( 'Text Content and List', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<p>Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi giant danio ziege Siamese fighting fish collared dogfish</p>
                <ul class="list-marker-02">
                <li>Amberjack emperor. Pelagic</li>
                <li>Cod morid cod Raccoon butterfly fish</li>
                <li>Gulper cuchia cow shark pollyfish</li>
                </ul>',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );

        $this->add_control('btn_title',
            [
                'label' => esc_html__( 'Button Title', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'MORE' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control( 'btn_link',
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
        $this->end_controls_section();
        $this->start_controls_section('quadron_services_image_settings',
            [
                'label' => esc_html__( 'Image and Background', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bgimg',
                'label' => esc_html__( 'Background Image', 'quadron' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .section--bg-wrapper-04',
                'separator' => 'before'
            ]
        );
        $this->add_control( 'left_image',
            [
                'label' => esc_html__( 'Left Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/img_01.png', __DIR__ )],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'left_image[url]!' => '' ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $image      = $this->get_settings( 'left_image' );
        $target     = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow   = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $image_url  = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt   = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;
        echo '<div class="section section__indent-08 section__indent-right section--bg-wrapper-04 layout-color-01">';
            echo '<div class="layout01">';
                if ( $settings['left_image']['url'] ) {
                    echo '<div class="layout01__img"><img src="'.$imageurl.'" alt="'.$imagealt.'"></div>';
                }
                echo '<div class="layout01__description">';
                    if ( $settings['subtitle'] || $settings['title'] ) {
                        echo '<div class="section-heading">';
                            if ( $settings['subtitle'] ) {
                                echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                            }
                            if ( $settings['title'] ) {
                                echo '<h4 class="title">'.$settings['title'].'</h4>';
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
            echo '</div>';
        echo '</div>';
    }
}
