<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Video_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-video-slider-section';
    }
    public function get_title() {
        return 'Video Slider';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   Text Options   ******/
        $this->start_controls_section('quadron_services_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Title
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Cases' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Mass Media<br>Production',
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('text_content',
            [
                'label'          => esc_html__( 'Description', 'quadron' ),
                'type'           => Controls_Manager::WYSIWYG,
                'default'        => 'Round whitefish flat loach goldspotted killifish ronquil. Long-finned pike escolar northern squawfish eel, Australian herring',
                'dynamic'        => ['active' => true],
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'NEXT' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'hideline',
            [
                'label'          => esc_html__( 'Hide Background Line?', 'quadron' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'quadron' ),
                'label_off'      => esc_html__( 'No', 'quadron' ),
                'return_value'   => 'yes',
                'default'        => 'no',
                'separator'      => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   Text Options   ******/
        $this->start_controls_section( 'quadron_video_slider_settings',
            [
                'label' => esc_html__('Slider Content', 'quadron'),
            ]
        );
        $this->add_control( 'video_items',
            [
                'type'         => Controls_Manager::REPEATER,
                'seperator'    => 'before',
                'default'      => [
                    ['video_url' => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE'],
                    ['video_url' => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE']
                ],
                'fields'       => [
                    [
                        'name'           => 'video_url',
                        'label'          => esc_html__('Video URL', 'quadron'),
                        'type'           => Controls_Manager::TEXTAREA,
                        'default'        => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                        'label_block'    => true
                    ],
                    [
                        'name'           => 'video_image',
                        'label'          => esc_html__('Video Image', 'quadron'),
                        'type'           => Controls_Manager::MEDIA,
                        'default'        => ['url' => Utils::get_placeholder_image_src()]
                    ]
                ],
                'title_field'     => '{{video_url}}'
            ]
        );
        $this->end_controls_section();
        /*****   End Button Options   ******/

        /***** Title Style ******/
        $this->start_controls_section('features_title_styling',
            [
                'label'         => esc_html__( 'Title Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow','txtshadow'),$id='feature_title',$selector='.the-feature .title');
        $this->end_controls_section();
        /***** End Title Style ******/

        /***** Description Style ******/
        $this->start_controls_section('features_desc_styling',
            [
                'label'         => esc_html__( 'Description Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow','txtshadow'),$id='feature_desc',$selector='.the-feature .desc');
        $this->end_controls_section();
        /***** End Description Style ******/

        /***** Icon Style ******/
        $this->start_controls_section('features_icon_styling',
            [
                'label'         => esc_html__( 'Icon Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo'),$id='feature_icon',$selector='.the-feature i, {{WRAPPER}} .the-feature span');
        $this->end_controls_section();
        /***** End Icon Style ******/

        /***** Button Style ******/
        $this->start_controls_section('features_btn_styling',
            [
                'label'         => esc_html__( 'Box Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs('features_tabs');
        $this->start_controls_tab( 'features_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('color'),$id='features_normal',$selector='.the-feature');
        $this->end_controls_tab();

        $this->start_controls_tab('features_hover_tab',
            [ 'label'  => esc_html__( 'Hover', 'quadron' ) ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','margin'),$id='features_hover',$selector='.the-feature:hover');
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /***** End Button Styling *****/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $lineimg = 'yes' != $settings['hideline'] ? ' data-bg="'.$line_image.'"' : '';
        echo '<div class="section--no-padding section">';
            echo '<div class="js-carusel-external-box carusel-external-box">';
            foreach ($settings['video_items'] as $item) {
                $imagealt = esc_attr(get_post_meta($item['video_image']['id'], '_wp_attachment_image_alt', true));
                $imagealt = $imagealt ? $imagealt : basename ( get_attached_file( $item['video_image']['id'] ) );
                if ( $item['video_image']['url'] ) {
                    echo '<div class="item">';
                        echo '<a href="'.$item['video_url'].'" class="video-popup link-icon-video02">';
                            echo '<span class="icon-video"><i></i></span>';
                            echo '<img src="'.$item['video_image']['url'].'" alt="'.$imagealt.'">';
                        echo '</a>';
                    echo '</div>';
                }
            }
            echo '</div>';
            echo '<div class="container-fluid no-gutters section--bg-vertical-line section--bg-01"'.$lineimg.'>';
                echo '<div class="row row-eq-height">';
                    echo '<div class="col-xl-8 col-12 ml-auto">';
                        echo '<div class="layout-external-box">';
                            $col72 = $settings['text_content'] ? '' : ' col-w-72';
                            echo '<div class="col-title'.$col72.'">';
                                echo '<div class="section-heading size-sm">';
                                    if ( $settings['subtitle'] ) {
                                        echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                                    }
                                    if ( $settings['title'] ) {
                                        echo '<h4 class="title">'.$settings['title'].'</h4>';
                                    }
                                echo '</div>';
                            echo '</div>';
                            if ( $settings['text_content'] ) {
                                echo '<div class="col-description">';
                                    echo '<p>'.$settings['text_content'].'</p>';
                                echo '</div>';
                            }
                            echo '<div class="col-nav-slider">';
                                echo '<span class="btn__text">'.$settings['btn_title'].'</span>';
                                echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
