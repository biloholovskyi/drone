<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_About_Us_Two_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-about-us-two-section';
    }
    public function get_title() {
        return 'About Us 2';
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
        $this->start_controls_section('quadron_aboutus_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'About',
                'label_block'    => true,
            ]
        );
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Who we are',
                'label_block'    => true,
            ]
        );
        $this->add_control('text_content',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::WYSIWYG,
                'default'        => 'Manefish Billfish bluntnose minnow yellowfin grouper yellowtail amberjack emperor. Pelagic cod morid cod Raccoon butterfly fish whiptail gulper cuchia cow shark pollyfish. X-ray tetra, saury queen danio Ragfish Red whalefish lamprey poolfish combtooth blenny; jackfish',
                'dynamic'        => ['active' => true],
                'label_block'    => true,
            ]
        );
        $this->add_control('btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'MORE',
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
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('quadron_aboutus_two_img_settings',
            [
                'label'          => esc_html__( 'Image', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('video_url',
            [
                'label'          => esc_html__( 'Video URL', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'left_img',
            [
                'label'           => esc_html__( 'Image', 'quadron' ),
                'type'            => Controls_Manager::MEDIA,
                'default'         => ['url' => plugins_url( 'assets/front/img/videolink_img01.jpg', __DIR__ )],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'           => 'thumbnail',
                'default'        => 'full',
                'condition'      => [ 'left_img[url]!' => '' ],
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $target     = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow   = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $image      = $this->get_settings( 'left_img' );
        $image_url  = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt   = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;

        echo '<div class="section--no-padding section--pr section-default-inner section__indent-top-xl">';
            echo '<div class="container">';
                echo '<div class="row flex-sm-row-reverse">';
                    echo '<div class="col-md-6 offset-md-1 align-self-center">';
                        if ( $settings['subtitle'] || $settings['title'] ) {
                            echo '<div class="section-heading size-md">';
                                if ( $settings['subtitle'] ) {
                                    echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                }
                                if ( $settings['title'] ) {
                                    echo '<h4 class="title title-lg">'.$settings['title'].'</h4>';
                                }
                            echo '</div>';
                        }
                        echo $settings['text_content'];
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
                    echo '<div class="divider divider__lg d-block d-lg-none d-md-none"></div>';
                    echo '<div class="col-md-5">';
                        echo '<a href="'.$settings['video_url'].'" class="videolink video-popup offset-top5">';
                            echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
                            echo '<div class="videolink__icon"></div>';
                        echo '</a>';
                        echo '<div class="extra-block02"></div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
