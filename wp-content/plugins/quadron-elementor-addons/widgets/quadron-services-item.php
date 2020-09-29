<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Services_Item_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-services-item';
    }
    public function get_title() {
        return 'Services Item';
    }
    public function get_icon() {
        return 'eicon-icon-box';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   Text Options   ******/
        $this->start_controls_section('quadron_services_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Title
        $this->add_control('number',
            [
                'label'          => esc_html__( 'Number', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( '01' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Creative' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Icon
        $this->add_control( 'features_icon',
            [
                'label'        => esc_html__( 'Icon', 'quadron' ),
                'type'         => Controls_Manager::ICONS,
                'separator'    => 'before',
                'default'      => [
                    'value'        => 'far fa-star',
                    'library'      => 'solid'
                ]
            ]
        );
        $this->add_control( 'custom_icon',
            [
                'label'          => esc_html__( 'Custom Icon', 'quadron' ),
                'description'    => esc_html__( 'HTML allowed.', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => '',
                'placeholder'    => sprintf(esc_html__('Enter your custom icon. Example :   %s', 'quadron' ),'<i class="icon-name"></i>'),
                'label_block'    => true,
            ]
        );
        $this->add_responsive_control( 'icon_size',
            [
                'label'         => esc_html__( 'Icon Size', 'quadron' ),
                'type'          => Controls_Manager::SLIDER,
                'size_units'    => ['px','em'],
                'range'         => [
                    'px'   => ['max' => 100],
                    'em'   => ['max' => 10],
                ],
                'default'  => [
                    'unit' => 'em',
                    'size' => 4,
                ],
                'selectors'     => [ '{{WRAPPER}} .feature-icon i' => 'font-size: {{SIZE}}{{UNIT}};' ]
            ]
        );
        $this->add_control( 'item_link',
            [
                'label'         => esc_html__( 'Add Link', 'quadron' ),
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
        $t_tag = $settings['title_tag'] ? $settings['title_tag'] : 'p';
        $desc_tag = $settings['desc_tag'] ? $settings['desc_tag'] : 'h6';
        $target   = $settings['item_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['item_link']['nofollow'] ? ' rel="nofollow"' : '';

        echo '<div class="list-menu_item">';

            if ( $settings['item_link']['url'] ) {
                echo '<a href="'.$settings['item_link']['url'].'">';
            }
                echo '<div class="list-menu__icon">';
                if ( $settings['custom_icon'] != '' ) {
                    echo $settings['custom_icon'];
                } else {
                    if ( ! empty($settings['features_icon']['value']) ) {
                        Icons_Manager::render_icon( $settings['features_icon'], [ 'aria-hidden' => 'true' ] );
                    }
                }
                echo '</div>';
                echo '<div class="list-menu__description">';
                    if ( $settings['number'] ) {
                        echo '<span class="list-menu__value">' . $settings['number'] . '</span>';
                    }
                    if ( $settings['title'] ) {
                        echo '<h4 class="list-menu__title">' . $settings['title'] . '</h4>';
                    }
                echo '</div>';
                if ( $settings['item_link']['url'] ) {
                    echo '</a>';
                }
        echo '</div>';
    }
}
