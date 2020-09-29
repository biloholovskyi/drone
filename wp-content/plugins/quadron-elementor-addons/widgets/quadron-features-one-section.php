<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Features_One_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-features-one-section';
    }
    public function get_title() {
        return 'Features 1 Section';
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
        $this->start_controls_section( 'quadron_features_one_text_settings',
            [
                'label'          => esc_html__( 'Section Top', 'quadron' ),
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
        $this->add_control('text_content',
            [
                'label' => esc_html__( 'Description', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officiadese runt mollit anim id est laborum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );
        $this->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'MORE' , 'quadron' ),
                'label_block'    => true,
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
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [ 'image[url]!' => '' ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_features_one_bottom_settings',
            [
                'label'          => esc_html__( 'Section Bottom Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle2',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Mobile App' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title2',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Innovations and <br>Breakthroughs',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'btn_title2',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'GET STARTED' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'btn_link2',
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
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'         => 'featgures_bottom_background',
                'label'        => esc_html__( 'Background', 'quadron' ),
                'types'        => [ 'classic', 'gradient' ],
                'selector'     => '{{WRAPPER}} .custom-layout03-wrapper:before',
                'separator'    => 'before'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_features_one_items_settings',
            [
                'label' => esc_html__('Features Items', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $repeater->add_control( 'item_number',
            [
                'label'          => esc_html__( 'Number', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => '01',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Item Title',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_desc',
            [
                'label'          => esc_html__( 'Short Description', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Temperate bass trout filefish medaka trout-perch herring; devil ray sleeper dusky grouper sand diver. Garibaldi',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'item_more',
            [
                'label'          => esc_html__( 'More', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'MORE',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'colmd',
            [
                'label'       => esc_html__( 'Column MD', 'quadron' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default'     => 'col-md-4',
                'options'     => [
                    'col-md-4'    => esc_html__( 'Default 4 Column', 'quadron' ),
                    'col-md-auto' => esc_html__( 'Auto', 'quadron' ),
                    'col-md-3'    => esc_html__( '3 Column', 'quadron' ),
                    'col-md-6'    => esc_html__( '6 Column', 'quadron' ),
                    'col-md-12'   => esc_html__( '12 Column', 'quadron' )
                ]
            ]
        );
        $repeater->add_control( 'colsm',
            [
                'label'       => esc_html__( 'Column SM', 'quadron' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default'     => 'col-sm-6',
                'options'     => [
                    'col-sm-6'    => esc_html__( 'Default 6 Column', 'quadron' ),
                    'col-sm-auto' => esc_html__( 'Auto', 'quadron' ),
                    'col-sm-12'   => esc_html__( '12 Column', 'quadron' )
                ]
            ]
        );
        $repeater->add_control( 'item_link',
            [
                'label' => esc_html__( 'Item Link', 'quadron' ),
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
                'label'          => esc_html__( 'Items', 'nt-addons' ),
                'type'           => Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'title_field'    => '{{item_title}}',
                'default'        => [
                    [
                        'item_number'  => esc_html__( '01', 'nt-addons' ),
                        'item_title'  => esc_html__( 'The ultraportable MaviCopter Air features', 'nt-addons' ),
                        'colmd'  => 'col-md-4',
                        'colsm'  => 'col-sm-6',
                        'item_link'  => '#',
                        'item_more'  => 'MORE',
                        'item_desc'  => 'Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring.'
                    ],
                    [
                        'item_number'  => esc_html__( '02', 'nt-addons' ),
                        'item_title'  => esc_html__( 'Quadrone Announces Pricing and Availability of Multilink', 'nt-addons' ),
                        'colmd'  => 'col-md-4',
                        'colsm'  => 'col-sm-6',
                        'item_link'  => '#',
                        'item_more'  => 'MORE',
                        'item_desc'  => 'Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring.'
                    ],
                    [
                        'item_number'  => esc_html__( '03', 'nt-addons' ),
                        'item_title'  => esc_html__( 'Air features is Ultraportable MaviCopter', 'nt-addons' ),
                        'colmd'  => 'col-md-4',
                        'colsm'  => 'col-sm-6',
                        'item_link'  => '#',
                        'item_more'  => 'MORE',
                        'item_desc'  => 'Staghorn sculpin plownose chimaera sawfish temperate perch goatfish jackfish darter scaly dragonfish king of herring.'
                    ]
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        $image     = $this->get_settings( 'image' );
        $image_url = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt  = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl  = empty( $image_url ) ? $image['url'] : $image_url;
        $target    = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow  = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        echo '<div class="section section-default-top section--bg-03 section--pr">';
            echo '<div class="custom-layout03-wrapper">';
                echo '<div class="container">';
                    echo '<div class="custom-layout02 layout-color-01">';
                        echo '<div class="row align-items-center">';
                            echo '<div class="col-md-6 d-none d-lg-block d-xl-block">';
                                echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
                            echo '</div>';
                            echo '<div class="col-md-8 col-lg-6">';
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
                                if ( $settings['btn_title'] ) {
                                    echo '<a class="btn-link-icon btn-top btn-link-icon-md" href="'.$settings['btn_link']['url'].'"'.$target .$nofollow.'>';
                                        echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                        if ( $settings['btn_title'] ) {
                                            echo '<span class="btn__text btn__text__md">'.$settings['btn_title'].'</span>';
                                        }
                                    echo '</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="custom-layout03">';
                        echo '<div class="row">';
                            echo '<div class="col-auto mr-auto">';
                                if ( $settings['subtitle2'] || $settings['title2'] ) {
                                    echo '<div class="section-heading section-heading_indentg04">';
                                        if ( $settings['subtitle2'] ) {
                                            echo '<div class="description"><i></i>'.$settings['subtitle2'].'</div>';
                                        }
                                        if ( $settings['title2'] ) {
                                            echo '<h4 class="title">'.$settings['title2'].'</h4>';
                                        }
                                    echo '</div>';
                                }
                            echo '</div>';
                            echo '<div class="col-12 col-md-auto align-self-center">';
                                if ( $settings['btn_title2'] ) {
                                    $target2    = $settings['btn_link2']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow2  = $settings['btn_link2']['nofollow'] ? ' rel="nofollow"' : '';
                                    echo '<a class="btn-link-icon" href="'.$settings['btn_link2']['url'].'"'.$target2 .$nofollow2.'>';
                                        echo '<i class="btn__icon"><svg><use xlink:href="#arrow_right"></use></svg></i>';
                                        if ( $settings['btn_title2'] ) {
                                            echo '<span class="btn__text btn__text__md">'.$settings['btn_title2'].'</span>';
                                        }
                                    echo '</a>';
                                }
                                echo '<div class="divider divider__lg d-block d-md-none"></div>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="row">';
                        foreach ($settings['services_items'] as $item) {
                            $itarget    = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                            $inofollow  = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                            $colmd      = $item['colmd'] ? ' '.$item['colmd'] : ' col-md-4';
                            $colsm      = $item['colsm'] ? $item['colsm'] : 'col-sm-6';
                            $imagealt2  = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                            $imagealt2  = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $item['item_image']['id'] ) );
                            echo '<div class="'.$colsm.$colmd.'">';
                                echo '<div class="box02">';
                                    echo '<div class="box02__img"><a href="'.$item['item_link']['url'].'"><img src="'.$item['item_image']['url'].'" alt="'.$imagealt2.'"></a></div>';
                                    if ( $item['item_number'] ) {
                                        echo '<div class="box02__data">'.$item['item_number'].'</div>';
                                    }
                                    if ( $item['item_title'] ) {
                                        echo '<h4 class="box02__title"><a href="'.$item['item_link']['url'].'">'.$item['item_title'].'</a></h4>';
                                    }
                                    if ( $item['item_desc'] ) {
                                        echo '<p>'.$item['item_desc'].'</p>';
                                    }
                                    if ( $item['item_more'] ) {
                                        echo '<a href="'.$item['item_link']['url'].'" class="box02__link">'.$item['item_more'].'</a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
