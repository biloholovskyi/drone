<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Team_Member_Item_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-team-member-item';
    }
    public function get_title() {
        return 'Team Member';
    }
    public function get_icon() {
        return 'eicon-person';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_team_member_section',
            [
                'label' => esc_html__( 'Team Item', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'team_name',
            [
                'label' => esc_html__( 'Name', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'pleaceholder' => esc_html__( 'Enter name here', 'quadron' ),
                'default' => 'Team Name',
                'label_block' => true,
            ]
        );
        $this->add_control( 'team_pos',
            [
                'label' => esc_html__( 'Position', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter position here', 'quadron' ),
                'default' => 'Chief Executive Officer',
                'label_block' => true,
            ]
        );
        $this->add_control( 'team_image',
            [
                'label' => esc_html__( 'Avatar Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/team_img_01.jpg', __DIR__ )],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'team_image[url]!' => '' ],
            ]
        );
        $this->add_control( 'team_finger',
            [
                'label' => esc_html__( 'Fingerprints Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => plugins_url( 'assets/front/img/team_img_01_fingersprint.png', __DIR__ )],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail2',
                'default' => 'full',
                'condition' => [ 'team_finger[url]!' => '' ],
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
        
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'team_social_profiles',
            [
                'label' => esc_html__( 'Social Profiles', 'quadron' )
            ]
        );
        $this->add_control( 'social_icons',
            [
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'social' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'social' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'social' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-brands'
                        ]
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'social',
                        'label' => esc_html__( 'Icon', 'quadron' ),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__( 'Link', 'quadron' ),
                        'type' => Controls_Manager::URL,
                        'label_block' => true,
                        'default' => [
                            'url' => '#',
                            'is_external' => 'true',
                        ],
                        'placeholder' => esc_html__( 'Place URL here', 'quadron' )
                    ]
                ],
                'title_field' => 'Social Media #',
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }
    protected function render() {
        $settings   = $this->get_settings_for_display();
        $elementid  = $this->get_id();
        $image      = $this->get_settings( 'team_image' );
        $image_url  = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt   = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt   = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl   = empty( $image_url ) ? $image['url'] : $image_url;
        $image2     = $this->get_settings( 'team_finger' );
        $image_url2 = Group_Control_Image_Size::get_attachment_image_src( $image2['id'], 'thumbnail2', $settings );
        $imagealt2  = esc_attr(get_post_meta($image2['id'], '_wp_attachment_image_alt', true));
        $imagealt2  = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $image2['id'] ) );
        $imageurl2  = empty( $image_url2 ) ? $image2['url'] : $image_url2;
        echo '<div class="team-item">';
            echo '<div class="team-item__img">';
                echo '<div class="img"><img src="'.$imageurl.'" alt="'.$imagealt.'"></div>';
                if ( $settings['team_finger']['url'] ) {
                    echo '<img class="align-img" src="'.$imageurl2.'" alt="'.$imagealt2.'">';
                }
                echo '<ul class="social-icon">';
                    foreach ( $settings['social_icons'] as $item ) {
                        $target = $item['link']['is_external'] ? ' target="_blank"' : '';
                        echo '<li class="eael-team-member-social-link">';
                            echo '<a href="'.esc_attr( $item['link']['url'] ).'"'.$target.'>';
                            if ( ! empty($item['social']['value']) ) {
                                Icons_Manager::render_icon( $item['social'], [ 'aria-hidden' => 'true' ] );
                            }
                            echo '</a>';
                        echo '</li>';
                    }
                echo '</ul>';
            echo '</div>';
            if ( $settings['team_pos'] || $settings['team_name'] ) {
                echo '<div class="team-item__description">';
                    if ( $settings['team_pos'] ) {
                        echo '<div class="team-item__caption">'.$settings['team_pos'].'</div>';
                    }
                    if ( $settings['team_name'] ) {
                        echo '<h6 class="team-item__title">'.$settings['team_name'].'</h6>';
                    }
                echo '</div>';
            }
        echo '</div>';
    }
}
