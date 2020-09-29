<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Infobox2_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-infobox2-section';
    }
    public function get_title() {
        return 'Infobox 2 Section';
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
        $this->start_controls_section('quadron_services_text_settings',
            [
                'label' => esc_html__( 'Text', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Alpin White' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control('title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Quadron Controller <br>Combo Copter',
                'label_block' => true,
            ]
        );
        $this->add_control('text_content',
            [
                'label' => esc_html__( 'Description', 'quadron' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => 'Threadsail yellowfin surgeonfish river shark sawtooth eel golden trout sand tiger. Canary rockfish anchovy clingfish,Dragon goby plunderfish killifish flounder bluntnose minnow cuckoo wrasse? Triggerfish panga goatfish zander spearfish longfin smelt, false brotula Rattail cherry salmon.',
                'dynamic' => ['active' => true],
                'label_block' => true,
            ]
        );
        $this->add_control('btn_title',
            [
                'label' => esc_html__( 'Button Title', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'DISCOVER' , 'quadron' ),
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
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_services_items_settings',
            [
                'label' => esc_html__('Features', 'quadron'),
            ]
        );
        $this->add_control( 'services_items',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [
                        'item_title' => 'Flight time',
                        'item_value' => '16 min',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => esc_html__('Transmission Distance', 'quadron'),
                        'item_value' => '1.2 ml (2 km)',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => esc_html__('Effective Pixels', 'quadron'),
                        'item_value' => '12 mp',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ],
                    [
                        'item_title' => esc_html__('VPS range', 'quadron'),
                        'item_value' => '30 m',
                        'item_icon' => [
                            'value' => 'fab fa-wordpress',
                            'library' => 'fa-brands'
                        ]
                    ]
                ],
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => esc_html__('Title', 'quadron'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Flight time', 'quadron'),
                        'label_block' => true
                    ],
                    [
                        'name' => 'item_value',
                        'label' => esc_html__('Item Value', 'quadron'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => '16 min',
                        'label_block' => true
                    ],
                    [
                        'name' => 'item_icon',
                        'label' => esc_html__('Icon', 'quadron'),
                        'type' => Controls_Manager::ICONS,
                        'default'   => [
                            'value' => 'fas fa-home',
                            'library' => 'fa-solid'
                        ]
                    ]
                ],
                'title_field'     => '{{item_title}}'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('quadron_infobox2_iamge_settings',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'infobox2_image',
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
                'condition' => [ 'infobox2_image[url]!' => '' ]
            ]
        );
        $this->add_control( 'infobox2_mobile_image',
            [
                'label' => esc_html__( 'Mobile Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail2',
                'default' => 'full',
                'condition' => [ 'infobox2_mobile_image[url]!' => '' ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
		/***** End Title Style ******/
        $this->start_controls_section('section_image_styling',
            [
                'label'         => esc_html__( 'Image Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('txtshadow','typo','color'),$id='section_image',$selector='.infobox02-extra-img img');
        $this->end_controls_section();
		/***** End Title Style ******/
		/***** End Title Style ******/
        $this->start_controls_section('section_info_styling',
            [
                'label'         => esc_html__( 'Section Info Background', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'         => 'section_info_background',
				'label'        => esc_html__( 'Background', 'r-energy' ),
				'types'        => [ 'classic', 'gradient' ],
				'selector'     => '{{WRAPPER}} .wrapper-extra-right:before, {{WRAPPER}} .infobox02',
			]
		);
        $this->end_controls_section();
		/***** End Title Style ******/

        /***** End Title Style ******/
        $this->start_controls_section('section_subtitle_styling',
            [
                'label'         => esc_html__( 'Section Subtitle Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow'),$id='section_subtitle',$selector='.section-heading:not(.size-sm):not(.size-md) .description');
        $this->end_controls_section();
		/***** End Title Style ******/

        /***** End Title Style ******/
        $this->start_controls_section('section_title_styling',
            [
                'label'         => esc_html__( 'Section Title Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow'),$id='section_title',$selector='.section-heading:not(.size-sm):not(.size-md) .title');
        $this->end_controls_section();
		/***** End Title Style ******/

        /***** End Title Style ******/
        $this->start_controls_section('section_desc_styling',
            [
                'label'         => esc_html__( 'Section Description Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow'),$id='section_desc',$selector='.infobox02 p');
        $this->end_controls_section();

        /***** End Title Style ******/
        $this->start_controls_section('features_title_styling',
            [
                'label'         => esc_html__( 'Features Title Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow'),$id='feature_title',$selector='.list-icon .list-icon__title');
        $this->end_controls_section();
        /***** End Title Style ******/

        /***** Description Style ******/
        $this->start_controls_section('features_desc_styling',
            [
                'label'         => esc_html__( 'Features Description Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('shadow'),$id='feature_desc',$selector='.list-icon .list-icon__value');
        $this->end_controls_section();
        /***** End Description Style ******/

        /***** Icon Style ******/
        $this->start_controls_section('features_icon_styling',
            [
                'label'         => esc_html__( 'Features Icon Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array('typo','shadow'),$id='feature_icon',$selector='.list-icon i, {{WRAPPER}} .list-icon svg');
        $this->end_controls_section();
        /***** End Icon Style ******/

        /***** Button Style ******/
        $this->start_controls_section('features_btn_styling',
            [
                'label'         => esc_html__( 'Section Button Style', 'quadron' ),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'btn_typo',
				'label'         => esc_html__( 'Typography', 'quadron' ),
				'scheme'        => Scheme_Typography::TYPOGRAPHY_1,
				'selector'      => '{{WRAPPER}} .btn-link-icon .btn__text'
			]
		);
        $this->start_controls_tabs('features_tabs');
        $this->start_controls_tab( 'features_normal_tab',
            [ 'label'  => esc_html__( 'Normal', 'quadron' ) ]
        );
		$this->add_control('btn_clr',
			[
				'label'         => esc_html__( 'Button Title Color', 'quadron' ),
				'type'          => Controls_Manager::COLOR,
				'default'       => '',
				'selectors'     => ['{{WRAPPER}} .btn-link-icon .btn__text, {{WRAPPER}} .btn-link-icon' => 'color: {{VALUE}};']
			]
		);
		$this->add_control( 'btn_brdclr',
			[
				'label'         => esc_html__( 'Button Border Color', 'quadron' ),
				'type'          => Controls_Manager::COLOR,
				'default'       => '',
				'selectors'     => ['{{WRAPPER}} .btn-link-icon .btn__icon' => 'border-color: {{VALUE}};']
			]
		);
		$this->add_control('btn_bgcolor',
			[
				'label'         => esc_html__( 'Button Background Color', 'quadron' ),
				'type'          => Controls_Manager::COLOR,
				'default'       => '',
				'selectors'     => ['{{WRAPPER}} .btn-link-icon .btn__icon' => 'background-color: {{VALUE}};']
			]
		);
        // Style function
        $this->end_controls_tab();

        $this->start_controls_tab('features_hover_tab',
            [ 'label'  => esc_html__( 'Hover', 'quadron' ) ]
        );
		$this->add_control('btn_hvrclr',
			[
				'label'         => esc_html__( 'Button Title Color', 'quadron' ),
				'type'          => Controls_Manager::COLOR,
				'default'       => '',
				'selectors'     => ['{{WRAPPER}} .btn-link-icon:hover .btn__text, {{WRAPPER}} .btn-link-icon:hover' => 'color: {{VALUE}};']
			]
		);
		$this->add_control( 'btn_hvrbrdclr',
			[
				'label'         => esc_html__( 'Button Icon Border Color', 'quadron' ),
				'type'          => Controls_Manager::COLOR,
				'default'       => '',
				'selectors'     => ['{{WRAPPER}} .btn-link-icon:hover .btn__icon' => 'border-color: {{VALUE}};']
			]
		);
		$this->add_control('btn_hvrbgcolor',
			[
				'label'         => esc_html__( 'Button Icon Background Color', 'quadron' ),
				'type'          => Controls_Manager::COLOR,
				'default'       => '',
				'selectors'     => ['{{WRAPPER}} .btn-link-icon:hover .btn__icon' => 'background-color: {{VALUE}};']
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /***** End Button Styling *****/
    }

    protected function render() {
        $settings    = $this->get_settings_for_display();
        $elementid   = $this->get_id();
        $target      = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow    = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $line_image  = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $lineimg = 'yes' != $settings['hideline'] ? ' data-bg="'.$line_image.'"' : '';
        $image       = $this->get_settings( 'infobox2_image' );
        $image_url   = Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );
        $imagealt    = esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true));
        $imagealt    = $imagealt ? $imagealt : basename ( get_attached_file( $image['id'] ) );
        $imageurl    = empty( $image_url ) ? $image['url'] : $image_url;
        $image2      = $this->get_settings( 'infobox2_mobile_image' );
        $image_url2  = Group_Control_Image_Size::get_attachment_image_src( $image2['id'], 'thumbnail2', $settings );
        $imagealt2   = esc_attr(get_post_meta($image2['id'], '_wp_attachment_image_alt', true));
        $imagealt2    = $imagealt2 ? $imagealt2 : basename ( get_attached_file( $image2['id'] ) );
        $imageurl2   = empty( $image_url2 ) ? $image2['url'] : $image_url2;

        echo '<div class="section section__indent-04 section--bg-vertical-line section--bg-01"'.$lineimg.'>';
            echo '<div class="infobox02-extra-img d-none d-lg-block d-xl-block">';
                echo '<img src="'.$imageurl.'" alt="'.$imagealt.'">';
            echo '</div>';
            echo '<div class="container">';
                echo '<div class="row no-gutters">';
                    echo '<div class="wrapper-extra-right">';
                        echo '<div class="offset-lg-2 col-lg-10 offset-xl-4 col-xl-8">';
                            echo '<div class="infobox02">';
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
                                echo '<p class="d-lg-none d-xl-none text-center">';
                                    echo '<img src="'.$imageurl2.'" alt="'.$imagealt2.'">';
                                echo '</p>';
                                echo '<ul class="list-icon">';
                                    foreach ($settings['services_items'] as $item) {
                                        echo '<li>';
                                            if ( ! empty($item['item_icon']['value']) ) {
                                                echo '<span class="list-icon__icon">';
                                                Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] );
                                                echo '</span>';
                                            }
                                            echo '<div class="list-icon__description">';
                                                if ( $item['item_title'] ) {
                                                    echo '<span class="list-icon__title">' . $item['item_title'] . '</span>';
                                                }
                                                if ( $item['item_value'] ) {
                                                    echo '<span class="list-icon__value">' . $item['item_value'] . '</span>';
                                                }
                                            echo '</div>';
                                        echo '</li>';
                                    }
                                echo '</ul>';
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
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
