<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Counter_Up_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-counter-up';
    }
    public function get_title() {
        return 'Counter Up';
    }
    public function get_icon() {
        return 'eicon-counter';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        // Title Settings
        $this->start_controls_section('quadron_number_settings',
            [
                'label'         => esc_html__( 'Number Settings', 'quadron' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );
        // Number Text
        $this->add_control( 'title',
            [
                'label'         => esc_html__( 'Title', 'quadron' ),
                'type'          => Controls_Manager::TEXTAREA,
                'placeholder'   => esc_html__( 'Type your number here', 'quadron' ),
                'input_type'    => 'number',
                'default'       => esc_html__( 'Delivery Packages', 'quadron' ),
            ]
        );
        // Number
        $this->add_control( 'number',
            [
                'label'         => esc_html__( 'Number', 'quadron' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Type your number here', 'quadron' ),
                'input_type'    => 'number',
                'default'       => esc_html__( '57', 'quadron' ),
            ]
        );
        // Number 2
        $this->add_control( 'number2',
            [
                'label'         => esc_html__( 'Number After Comma', 'quadron' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'Type your number 2 here', 'quadron' ),
                'input_type'    => 'number',
                'default'       => esc_html__( '100', 'quadron' ),
            ]
        );
        // Number 2
        $this->add_control( 'numbertext',
            [
                'label'         => esc_html__( 'Number Text', 'quadron' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'clients',
            ]
        );
        // Text
        $this->add_control( 'text',
            [
                'label'         => esc_html__( 'Description', 'quadron' ),
                'type'          => Controls_Manager::TEXTAREA,
                'placeholder'   => esc_html__( 'Type your description here', 'quadron' ),
                'input_type'    => 'number',
                'default'       => esc_html__( 'Gianttail tailor prickleback stickleback Atlantic cod boxfish deepwater flathead dottyback kokanee mouthbrooder alewife', 'quadron' ),
            ]
        );
        $this->end_controls_section();

        /***** Number Style *****/
        $this->start_controls_section('quadron_number_style_settings',
            [
                'label'       => esc_html__( 'Number Style', 'quadron' ),
                'tab'         => Controls_Manager::TAB_STYLE,
            ]
        );
        // Style function
        $this->quadron_style_controls($hide=array(),$id='quadron_counter_number_style',$selector='.fact .countup');
        $this->end_controls_section();
        /***** End Number Style *****/
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();

        if ( $settings['number'] ) {
            echo '<div class="box-counter">';
                echo '<div class="box-counter__title">'.$settings['title'].'</div>';
                echo '<div class="box-counter__value">';
                    echo '<span data-num="'.$settings['number'].'" class="value animate-number viz">'.$settings['number'].'</span> ';
                    if ( $settings['number2'] ) {
                    echo '<span class="value">,</span>';
                    echo '<span data-num="'.$settings['number2'].'" class="value animate-number viz">'.$settings['number2'].'</span> ';
                    }
                    if ( $settings['numbertext'] ) {
                    echo $settings['numbertext'];
                    }
                echo '</div>';
                if ( $settings['text'] ) {
                    echo '<p>'.$settings['text'].'</p>';
                }
            echo '</div>';
        }
	}

}
