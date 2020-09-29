<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_About_Us_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-about-us-one';
    }
    public function get_title() {
        return 'About Us';
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
        $this->start_controls_section( 'quadron_aboutus_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'About',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'We are Quadron Company',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'text_content',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::WYSIWYG,
                'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, neque qui velit. Magni dolorum quidem ipsam eligendi, totam, facilis laudantium cum accusamus ullam voluptatibus commodi numquam, error, est. Ea, consequatur.',
                'dynamic'        => ['active' => true],
                'label_block'    => true,
            ]
        );
        $this->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'MORE ABOUT',
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
        $this->start_controls_section('quadron_aboutus_img_settings',
            [
                'label'          => esc_html__( 'Image', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'left_img',
            [
                'label'           => esc_html__( 'Image', 'quadron' ),
                'type'            => Controls_Manager::MEDIA,
                'default'         => ['url' => Utils::get_placeholder_image_src()],
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
        $this->add_control( 'img_title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Creative Quadron <br>Training Team',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'img_link_title',
            [
                'label'          => esc_html__( 'Text Bottom', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'MORE ABOUT TRANING',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'img_link',
            [
                'label'         => esc_html__( 'Image Link', 'quadron' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                'default'       => [
                    'url'         => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $this->add_control( 'hideline',
            [
                'label'          => esc_html__( 'Hide Background Line?', 'quadron' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'quadron' ),
                'label_off'      => esc_html__( 'No', 'quadron' ),
                'return_value'   => 'yes',
                'default'        => 'no'
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

        $lineimg = 'yes' != $settings['hideline'] ? ' data-bg="'.$line_image.'"' : '';

        echo '<div class="section section__indent-02-custom section--bg-vertical-line section--bg-00"'.$lineimg.'>';
            echo '<div class="container-fluid no-gutters">';
                echo '<div class="row flex-sm-row-reverse">';
                    echo '<div class="col-md-7 col-xl-7">';
                        echo '<div class="promo-box-01-description">';
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
                    echo '</div>';
                    echo '<div class="divider divider__lg d-block d-md-none d-lg-none d-xl-none"></div>';
                    echo '<div class="col-md-5 col-xl-5">';
                        echo '<a href="'.$settings['img_link']['url'].'" class="promo-box-01">';
                            echo '<div class="promo-box-img">';
                                echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
                            echo '</div>';
                            echo '<div class="promo-box__description">';
                                echo '<div class="promo-box__title">'.$settings['img_title'].'</div>';
                                echo '<div class="promo-box__link">'.$settings['img_link_title'].'</div>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
