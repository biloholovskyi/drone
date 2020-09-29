<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Testimonials_One_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-testimonials-one-section';
    }
    public function get_title() {
        return 'Testimonials';
    }
    public function get_icon() {
        return 'eicon-testimonial';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_testimonials_one_text_settings',
            [
                'label' => esc_html__('Section Text', 'quadron'),
            ]
        );
        $this->add_control('subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Testimonials' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        // Title
        $this->add_control('title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'What People <br>Say About Us',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_testimonials_one_items_settings',
            [
                'label' => esc_html__('Testimonials Items', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'testi_image',
            [
                'label' => esc_html__( 'Testimonials Avatar Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()]
            ]
        );
        $repeater->add_control( 'testi_name',
            [
                'label'          => esc_html__( 'Name', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'STEPHANY',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'testi_pos',
            [
                'label'          => esc_html__( 'Position', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'Sales Manager',
                'label_block'    => true,
            ]
        );
        $repeater->add_control( 'testi_text',
            [
                'label'          => esc_html__( 'Quote', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Who could look on these monuments without reflecting on the vanity
                of mortals in thus offering up testimonials of their respect for persons
                of whose very names posterity is ignorant?”',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'testi_items',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{testi_name}}',
                'default' => [
                    [
                        'testi_name'  => 'STEPHANY',
                        'testi_pos'  => 'Sales Manager',
                        'testi_text'  => 'Who could look on these monuments without reflecting on the vanity
                        of mortals in thus offering up testimonials of their respect for persons
                        of whose very names posterity is ignorant?”',
                    ],
                    [
                        'testi_name'  => 'STEPHANY',
                        'testi_pos'  => 'Sales Manager',
                        'testi_text'  => 'Who could look on these monuments without reflecting on the vanity of mortals in thus offering up testimonials of their respect for persons of whose very names posterity is ignorant?”  Whitebait woody sculpin humuhumunukunukuapua sillago, taimen scaly dragonfish lanternfish salmon. Sixgill ray skipping goby spotted danio European perch. Kelpfish: ribbon sawtail fish longnose dace common tunny North Pacific daggertooth; halfbeak mackerel Atlantic salmon flabby whalefish.',
                    ],
                    [
                        'testi_name'  => 'STEPHANY',
                        'testi_pos'  => 'Sales Manager',
                        'testi_text'  => 'Who could look on these monuments without reflecting on the vanity of mortals in thus offering up testimonials of their respect for persons of whose very names posterity is ignorant?”',
                    ],
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
    }

    protected function render() {
        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        echo '<div class="section nt-testimonials">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-md-4 col-xl-3">';
                        echo '<div class="section-heading">';
                            if ( $settings['subtitle'] ) {
                                echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                            }
                            if ( $settings['title'] ) {
                                echo '<h4 class="title">'.$settings['title'].'</h4>';
                            }
                        echo '</div>';
                        echo '<div class="slick-arrow-external">';
                            echo '<div class="slick-arrow slick-prev"><svg><use xlink:href="#arrow_left"></use></svg></div>';
                            echo '<div class="slick-arrow slick-next"><svg><use xlink:href="#arrow_right"></use></svg></div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="divider divider__lg d-block d-xl-none d-lg-none d-md-none"></div>';
                    echo '<div class="col-md-8 col-xl-9">';
                        echo '<div class="js-carusel-blockquote">';
                            foreach ($settings['testi_items'] as $item) {
                                $imagealt = esc_attr(get_post_meta($item['testi_image']['id'], '_wp_attachment_image_alt', true));
                                $imagealt = $imagealt ? $imagealt : basename ( get_attached_file( $item['testi_image']['id'] ) );
                                echo '<div class="item">';
                                    echo '<div class="blockquote-box">';
                                        echo '<div class="blockquote-box__icon"><svg><use xlink:href="#quotes"></use></svg></div>';
                                        if ( $item['testi_text'] ) {
                                            echo '<div class="blockquote-box__description">'.$item['testi_text'].'</div>';
                                        }
                                        echo '<div class="blockquote-box__caption">';
                                            if ( $item['testi_image']['url'] ) {
                                                echo '<div class="caption__img"><span><img src="'.$item['testi_image']['url'].'" alt="'.$imagealt.'"></span></div>';
                                            }
                                            if ( $item['testi_name'] || $item['testi_pos'] ) {
                                                echo '<div class="caption__content">';
                                                    if ( $item['testi_name'] ) {
                                                        echo $item['testi_name'];
                                                    }
                                                    if ( $item['testi_pos'] ) {
                                                        echo '<strong>'.$item['testi_pos'].'</strong>';
                                                    }
                                                echo '</div>';
                                            }
                                        echo '</div>';
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
