<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Promobox_One_Widget extends Widget_Base {

    use Quadron_Helper;

    public function get_name() {
        return 'quadron-promobox-one';
    }
    public function get_title() {
        return 'Features Item';
    }
    public function get_icon() {
        return 'eicon-youtube';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   Text Options   ******/
        $this->start_controls_section('quadron_promobox_one_settings',
            [
                'label'          => esc_html__( 'Content', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'videoimg',
            [
                'label'           => esc_html__( 'Video Image', 'quadron' ),
                'type'            => Controls_Manager::MEDIA,
                'default'         => ['url' => Utils::get_placeholder_image_src()],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'           => 'thumbnail',
                'default'        => 'full',
                'condition'      => [ 'videoimg[url]!' => '' ],
            ]
        );
        $this->add_control( 'videourl',
            [
                'label'          => esc_html__( 'Video URL', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control( 'details',
            [
                'label'          => esc_html__( 'Content', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => esc_html__( 'Creative' , 'quadron' ),
                'label_block'    => true,
                'default'    => '<address>5961 Santa Fe Ave, Huntington<br>Park, CA 90255, USA</address><address>+1 800 341 41 41 &nbsp; +1 800 834 62 74<br><a href="mailto:info@quadron.co">info@quadron.co</a></address>',
            ]
        );
        $this->add_control( 'promobox_social_icons_display',
            [
                'label'         => esc_html__( 'Display Social Profiles?', 'quadron' ),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => 'yes',
            ]
        );
        $this->add_control( 'promobox_social_icons',
            [
                'type' => Controls_Manager::REPEATER,
                'condition' => [ 'promobox_social_icons_display!' => '' ],
                'default' => [
                    [
                        'social_new' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'social_new' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'social_new' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-brands'
                        ]
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'social_new',
                        'label' => esc_html__( 'Icon', 'quadron' ),
                        'type' => Controls_Manager::ICONS,
                        'fa4compatibility' => 'social',
                        'default' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands',
                        ]
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__( 'Link', 'quadron' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '',
                            'is_external' => 'true',
                        ],
                        'placeholder' => esc_html__( 'Place URL here', 'quadron' ),
                    ]
                ],
                'title_field' => '<i class="{{ social_new.value }}"></i> {{{ social_new.value.replace( \'fas fa-\', \'\' ).replace( \'-\', \' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
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
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        $image     = $this->get_settings( 'videoimg' );
        $image_url = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt  = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl  = empty( $image_url ) ? $image['url'] : $image_url;
        echo '<div class="section--bg-01 section--pr">';
            echo '<div class="container container-fluid-lg-nogutters">';
                echo '<div class="promobox-slider">';
                    if ('' != $settings['videourl'] && $imageurl) {
                    echo '<div class="promobox-slider__img">';
                        echo '<a href="'.$settings['videourl'].'" class="video-popup link-icon-video"><i class="icon-video"></i><img src="'.$imageurl.'" alt="'.$imagealt.'"></a>';
                    echo '</div>';
                    }
                    echo '<div class="promobox-slider__layout">';
                        echo $settings['details'];
                        if ( 'yes' == $settings['promobox_social_icons_display']) {
                            echo '<ul class="social-icon">';
                            foreach ( $settings['promobox_social_icons'] as $item ) {
                                $icon_migrated = isset($item['__fa4_migrated']['social_new']);
                                $icon_is_new = empty($item['social']);
                                if ( ! empty( $item['social'] ) || !empty($item['social_new'])) {
                                    $target = $item['link']['is_external'] ? ' target="_blank"' : '';
                                    echo '<li class="social-link">';
                                        echo '<a href="'.esc_attr( $item['link']['url'] ).'" '.$target.'>';
                                            if ($icon_is_new || $icon_migrated) {
                                                echo '<i class="'.esc_attr($item['social_new']['value'] ).'"></i>';
                                            } else {
                                                echo '<i class="'.esc_attr($item['social'] ).'"></i>';
                                            }
                                        echo '</a>';
                                    echo '</li>';
                                }
                            }
                            echo '</ul>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }

}
