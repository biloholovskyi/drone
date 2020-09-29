<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Cases_Cpt_Post_Details_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-cases-cpt-post-details';
    }
    public function get_title() {
        return '(CPT) Cases Post Details';
    }
    public function get_icon() {
        return 'eicon-columns';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_cases_post_details_settings',
            [
                'label' => esc_html__( 'Post Details', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_label',
            [
                'label' => esc_html__( 'Label', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Category:',
                'label_block' => true,
            ]
        );
        $repeater->add_control( 'item_desc',
            [
                'label' => esc_html__( 'Short Description', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Experience sharing',
            ]
        );
        $repeater->add_control( 'item_link',
            [
                'label' => esc_html__( 'Item Link', 'quadron' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );
        $this->add_control( 'tables_items',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html( '{{item_title}}' ),
                'default' => [
                    [
                        'item_title' => 'Category:',
                        'item_link' => '',
                        'item_desc' => 'Experience sharing'
                    ],
                    [
                        'item_title' => 'Client:',
                        'item_link' => '',
                        'item_desc' => 'JBD'
                    ],
                    [
                        'item_title' => 'Date:',
                        'item_link' => '',
                        'item_desc' => '03/19/2019'
                    ],
                    [
                        'item_title' => 'URL:',
                        'item_link' => esc_url(home_url('/')),
                        'item_desc' => 'www.JBD.com'
                    ],
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="box-table-01">';
            echo '<table>';
                echo '<tbody>';
                foreach ($settings['tables_items'] as $item) {
                    $target   = $item['item_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $item['item_link']['nofollow'] ? ' rel="nofollow"' : '';
                    echo '<tr>';
                        if ( $item['item_label'] ) {
                            echo '<td>'.$item['item_label'].'</td>';
                        }
                        if ( $item['item_link']['url'] ) {
                            echo '<td><a href="'.$item['item_link']['url'].'" class="item"'.$target.$nofollow.'>'.$item['item_desc'].'</a></td>';
                        } else {
                            echo '<td>'.$item['item_desc'].'</td>';
                        }
                    echo '</tr>';
                }
                echo '</tbody>';
            echo '</table>';
        echo '</div>';
    }
}
