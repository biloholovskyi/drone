<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Mobile_App_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-mobile-app-section';
    }
    public function get_title() {
        return 'Mobile App Section';
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
        $this->start_controls_section( 'quadron_mobile_app_text_settings',
            [
                'label'          => esc_html__( 'Text and Image', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Mobile App' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Innovations and <br>Breakthroughs',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'text_content',
            [
                'label' => esc_html__( 'Description', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Aerial surveying is not just about the aircraft. It’s about total UAV solutions, complete with all the tools geospatial pros need to perform jobs accurately, efficiently, and safely.<br>Our mdMapper packages integrate high-performance drones with advanced sensors and software. They’re designed for quick learning and easy use, so you can get your UAV services off the ground immediately.',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );
        $this->add_control( 'left_image',
            [
                'label' => esc_html__( 'Left Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'left_thumbnail',
                'default' => 'full',
                'condition' => [ 'left_image[url]!' => '' ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_mobile_app_btn_settings',
            [
                'label' => esc_html__('Buttons', 'quadron'),
            ]
        );
        $this->add_control( 'btn_image1',
            [
                'label' => esc_html__( 'Button Image 1', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'btn_image1[url]!' => '' ]
            ]
        );
        $this->add_control( 'btn_link1',
            [
                'label'          => esc_html__( 'Button Link 1', 'quadron' ),
                'type'           => Controls_Manager::URL,
                'label_block'    => true,
                'default'        => [
                    'url'            => '#',
                    'is_external'    => ''
                ],
                'show_external'  => true,
            ]
        );
        $this->add_control( 'btn_image2',
            [
                'label' => esc_html__( 'Button Image 2', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail2',
                'default' => 'full',
                'condition' => [ 'btn_image2[url]!' => '' ]
            ]
        );
        $this->add_control( 'btn_link2',
            [
                'label'          => esc_html__( 'Button Link 2', 'quadron' ),
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
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();

        $image     = $this->get_settings( 'left_image' );
        $image_url = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'left_thumbnail', $settings );
        $imageurl  = empty( $image_url ) ? $image_url['url'] : $image_url;
        $imagealt  = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );

        $btn_image     = $this->get_settings( 'btn_image1' );
        $btn_image_url = Group_Control_Image_Size::get_attachment_image_src( $btn_image['id'], 'thumbnail', $settings );
        $btn_imagealt  = esc_attr(get_post_meta($btn_image['id'], '_wp_attachment_image_alt', true));
        $btn_imagealt  = $btn_imagealt ? $btn_imagealt : basename ( get_attached_file( $btn_image['id'] ) );
        $btn_imageurl  = empty( $btn_image_url ) ? $btn_image['url'] : $btn_image_url;

        $btn_image2     = $this->get_settings( 'btn_image2' );
        $btn_image_url2 = Group_Control_Image_Size::get_attachment_image_src( $btn_image2['id'], 'thumbnail', $settings );
        $btn_imagealt2  = esc_attr(get_post_meta($btn_image2['id'], '_wp_attachment_image_alt', true));
        $btn_imagealt2  = $btn_imagealt2 ? $btn_imagealt : basename ( get_attached_file( $btn_image2['id'] ) );
        $btn_imageurl2  = empty( $btn_image_url2 ) ? $btn_image2['url'] : $btn_image_url2;

        $target1   = $settings['btn_link1']['is_external'] ? ' target="_blank"' : '';
        $nofollow1 = $settings['btn_link1']['nofollow'] ? ' rel="nofollow"' : '';
        $target2   = $settings['btn_link2']['is_external'] ? ' target="_blank"' : '';
        $nofollow2 = $settings['btn_link2']['nofollow'] ? ' rel="nofollow"' : '';
        echo '<div class="section section-default-top">';
            echo '<div class="container">';
                echo '<div class="custom-layout01">';
                    if ( $imageurl ) {
                        echo '<div class="custom-layout01__img">';
                            echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
                        echo '</div>';
                    }
                    echo '<div class="custom-layout01__description">';
                        echo '<div class="custom-layout01__description-indent">';
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
                            echo wpautop($settings['text_content']);
                            if ( $btn_imageurl || $btn_imageurl2 ) {
                                echo '<ul class="list-img">';
                                    if ( $btn_imageurl ) {
                                        echo '<li><a class="link-simple-fade" href="'.$settings['btn_link1']['url'].'"'.$target1.$nofollow1.'><img src="'.$btn_imageurl.'" alt="'.$btn_imagealt.'"></a></li>';
                                    }
                                    if ( $btn_imageurl2 ) {
                                        echo '<li><a class="link-simple-fade" href="'.$settings['btn_link1']['url'].'"'.$target2.$nofollow2.'><img src="'.$btn_imageurl2.'" alt="'.$btn_imagealt2.'"></a></li>';
                                    }
                                echo '</ul>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
