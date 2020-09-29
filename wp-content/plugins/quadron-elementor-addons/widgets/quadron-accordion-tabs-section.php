<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Accordion_Tabs_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-accordion-tabs-section';
    }
    public function get_title() {
        return 'Accordeon Tabs';
    }
    public function get_icon() {
        return 'eicon-accordion';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_tabs_text_settings',
            [
                'label' => esc_html__('Section Text', 'quadron'),
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Help Center',
                'label_block' => true,
            ]
        );
        // Title
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Frequently Asked Questions',
                'label_block' => true,
            ]
        );
        $this->add_control( 'alignment',
            [
                'label' => esc_html__( 'Alignment', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => 'text-center',
                'options' => [
                    'text-center' => esc_html__( 'center', 'quadron' ),
                    'text-left' => esc_html__( 'left', 'quadron' ),
                    'text-right' => esc_html__( 'right', 'quadron' )
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
        
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_tabs_content_settings',
            [
                'label' => esc_html__( 'Content', 'quadron'),
            ]
        );
        $this->add_control( 'quadron_tabs',
            [
                'type' => Controls_Manager::REPEATER,
                'seperator' => 'before',
                'default' => [
                    [
                        'tab_title' => 'What is the best drone?',
                        'tab_content' => '<p>Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.</p><p>Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.</p>',
                        'tab_default' => ''
                    ],
                    [
                        'tab_title' => 'I\'ve never flown a drone before, which drone should I buy?',
                        'tab_content' => '<p>Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.</p><p>Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.</p>',
                        'tab_default' => ''
                    ],
                    [
                        'tab_title' => 'Is it difficult to fly a drone?',
                        'tab_content' => '<p>Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.</p><p>Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.</p>',
                        'tab_default' => ''
                    ],
                    [
                        'tab_title' => 'What kind of regulations are there to fly a drone?',
                        'tab_content' => '<p>Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.</p><p>Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.</p>',
                        'tab_default' => ''
                    ],
                    [
                        'tab_title' => 'Wait, I have to register my drone and provide my physical address and information?',
                        'tab_content' => '<p>Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.</p><p>Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.</p>',
                        'tab_default' => 'yes'
                    ],
                ],
                'fields'       => [
                    [
                        'name' => 'tab_default',
                        'label' => esc_html__('Set as Default?', 'quadron'),
                        'type' => Controls_Manager::SWITCHER,
                        'default' => 'no',
                        'return_value' => 'yes'
                    ],
                    [
                        'name' => 'tab_title',
                        'label' => esc_html__('Tab Title', 'quadron'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Tab Title', 'quadron'),
                        'label_block' => true
                    ],
                    [
                        'name' => 'tab_content',
                        'label' => esc_html__('Tab Content', 'quadron'),
                        'type' => Controls_Manager::WYSIWYG,
                        'default' => '<p>Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury; porbeagle shark longfin horn shark, longnose dace, long-finned char rough pomfret smelt tarwhine.</p><p>Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish bleak jack, pearl danio french angelfish yellowtail amberjack cusk-eel silver dollar haddock rock bass.</p>',
                        'dynamic' => ['active' => true],
                    ]
                ],
                'title_field' => '{{tab_title}}'
            ]
        );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        echo '<div class="section nt-accordeon">';
            echo '<div class="container">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading '.$settings['alignment'].'">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description">'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h3 class="title">'.$settings['title'].'</h3>';
                        }
                    echo '</div>';
                }
                echo '<div class="accordeon js-accordeon">';
                    foreach ($settings['quadron_tabs'] as $tab) {
                        $active = $tab['tab_default'] == 'yes' ? ' is-open' : '';
                        echo '<div class="accordeon__item'.$active.'">';
                            if ( $tab['tab_title'] ) {
                                echo '<h5 class="accordeon__title">'.$tab['tab_title'].'</h5>';
                            } else {
                                echo '<h5 class="accordeon__title">Add Title</h5>';
                            }
                            if ( $tab['tab_content'] ) {
                                echo '<div class="accordeon__content">'.$tab['tab_content'].'</div>';
                            } else {
                                echo '<div class="accordeon__content">Add Some Content Here</div>';
                            }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }

}

