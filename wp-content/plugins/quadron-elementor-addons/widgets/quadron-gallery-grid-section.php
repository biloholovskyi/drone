<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Gallery_Grid_Section_Widget extends Widget_Base {
    use Quadron_Helper;


    public function get_name() {
        return 'quadron-gallery-grid-section';
    }
    public function get_title() {
        return 'Gallery Grid ';
    }
    public function get_icon() {
        return 'eicon-gallery-grid';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_gallery_column_settings',
            [
                'label' => esc_html__( 'Column', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'gallery_type',
            [
                'label' => esc_html__( 'Type', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => 'grid',
                'options' => [
                    'grid' => esc_html__( 'grid', 'quadron' ),
                    'masonry' => esc_html__( 'masonry', 'quadron' )
                ]
            ]
        );
        $this->add_control( 'collg',
            [
                'label' => esc_html__( 'Column', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '3',
                'options' => [
                    '3' => esc_html__( 'Default 4 Column', 'quadron' ),
                    '4' => esc_html__( '3 Column', 'quadron' ),
                    '6' => esc_html__( '2 Column', 'quadron' )
                ],
            ]
        );
        $this->add_control( 'colmd',
            [
                'label' => esc_html__( 'Column Desktop', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '3',
                'options' => [
                    '3' => esc_html__( 'Default 4 Column', 'quadron' ),
                    '4' => esc_html__( '3 Column', 'quadron' ),
                    '6' => esc_html__( '2 Column', 'quadron' )
                ],
                'condition' => ['gallery_type' => 'grid']
            ]
        );
        $this->add_control( 'colsm',
            [
                'label' => esc_html__( 'Column Tablet', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '6',
                'options' => [
                    '6' => esc_html__( 'Default 2 Column', 'quadron' ),
                    '4' => esc_html__( '3 Column', 'quadron' ),
                    '12' => esc_html__( '1 Column', 'quadron' )
                ],
                'condition' => ['gallery_type' => 'grid']
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_gallery_filters_settings',
            [
                'label' => esc_html__( 'Filter Gallery', 'quadron' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'all_text',
            [
                'label' => esc_html__( 'All Text', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'All' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $filters = new Repeater();
        $filters->add_control( 'item_filter',
            [
                'label' => esc_html__( 'Category', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Copters' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control( 'gallery_filters',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $filters->get_controls(),
                'title_field' => '{{item_filter}}',
                'default' => [
                    ['item_filter' =>'copter'],
                    ['item_filter' =>'nature'],
                    ['item_filter' =>'sea']
                ]
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_gallery_image_settings',
            [
                'label' => esc_html__('Gallery Items', 'quadron'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control( 'item_cat',
            [
                'label' => esc_html__( 'Category Name', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'description' => 'Type category name'
            ]
        );
        $repeater->add_control( 'item_title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Item Title',
                'label_block' => true,
            ]
        );
        $repeater->add_control( 'add_video',
            [
                'label' => esc_html__( 'Add Video', 'quadron' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'return_value' => 'yes',
            ]
        );
        $repeater->add_control( 'video_url',
            [
                'label' => esc_html__( 'Video URL', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'http://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
                'label_block' => true,
                'condition' => ['add_video' => 'yes']
            ]
        );
        $def_image = plugins_url( 'assets/front/img/gallery01_img-01.jpg', __DIR__ );
        $repeater->add_control( 'item_image',
            [
                'label' => esc_html__( 'Image', 'quadron' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $def_image],
            ]
        );
        $repeater->add_control( 'item_type',
            [
                'label' => esc_html__( 'Masonry Item Width', 'quadron' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Default Width', 'quadron' ),
                    'x2' => esc_html__( '2X', 'quadron' ),
                ]
            ]
        );
        $this->add_control( 'gallery',
            [
                'label' => esc_html__( 'Items', 'nt-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{item_title}}',
                'default' => [
                    [
                        'item_cat' => 'copter',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'nature',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'sea',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'copter',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'nature',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'sea',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'nature',
                        'item_image' => ['url' => $def_image],
                    ],
                    [
                        'item_cat' => 'sea',
                        'item_image' => ['url' => $def_image],
                    ],
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function quadron_get_filter() {
        $settings = $this->get_settings_for_display();
        $options = [];
        foreach ($settings['gallery_filters'] as $filterr) {
            $filter_item = mb_strtolower(str_replace(' ', '-', esc_attr($filterr['item_filter'])));
            $options[$filter_item] = $filterr['item_filter'];
        }
        return $options;
    }

    protected function render() {

        $settings  = $this->get_settings_for_display();
        $elementid = $this->get_id();
        echo '<div class="section nt-gallery">';
            echo '<div class="galley-masonry">';
                if ( $settings['gallery_filters'] ) {
                    echo '<div class="container">';
                        echo '<div class="filter-nav">';
                            echo '<div class="button active f-btn" data-filter="*">'.mb_strtoUpper($settings['all_text']).'</div>';
                            foreach ($settings['gallery_filters'] as $items) {
                                $filter_item = mb_strtolower(str_replace(' ', '-', esc_attr($items['item_filter'])));
                                echo '<div class="button f-btn" data-filter=".'.$filter_item.'">'.mb_strtoUpper($items['item_filter']).'</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                }
                $type = $settings['gallery_type'] == 'masonry' ? 'grid-col-'.$settings['collg'] : 'row no-gutters';
                $col = $settings['gallery_type'] == 'grid' ? ' col-sm-'.$settings['colsm'].' col-md-'.$settings['colmd'].' col-lg-'.$settings['collg'] : '';
                echo '<div class="tt-portfolio-content layout-default '.$type.'">';
                foreach ($settings['gallery'] as $item) {
                    $imagealt  = esc_attr(get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true));
                    $imagealt  = $imagealt ? $imagealt : basename ( get_attached_file( $item['item_image']['id'] ) );
                    $width     = $settings['gallery_type'] == 'masonry' && $item['item_type'] == 'x2' ? ' element-item2x' : '';
                    $video     = $item['add_video'] == 'yes' ? ' videolink video-popup' : 'btn-zomm';
                    $videourl  = $item['add_video'] == 'yes' && $item['video_url'] ? $item['video_url'] : $item['item_image']['url'];
                    echo '<div class="element-item '.$item['item_cat'].$width.$col.'">';
                        echo '<a href="'.$videourl.'" class="'.$video.'">';
                            echo '<figure>';
                                echo '<img src="'.$item['item_image']['url'].'" alt="'.$imagealt.'">';
                                if ( $item['item_title'] ) {
                                    echo '<figcaption>';
                                        echo '<h6 class="gallery-title">'.$item['item_title'].'</h6>';
                                    echo '</figcaption>';
                                }
                            echo '</figure>';
                            if ( $item['add_video'] == 'yes' && $item['video_url']) {
                                echo '<div class="videolink__icon"></div>';
                            }
                        echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
