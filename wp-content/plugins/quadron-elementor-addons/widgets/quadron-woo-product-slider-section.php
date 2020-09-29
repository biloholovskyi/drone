<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Woo_Product_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-woo-product-slider-section';
    }
    public function get_title() {
        return 'Woo Slider';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'quadron' ];
    }
    // Registering Controls
    protected function _register_controls() {
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_woo_product_slider_text_settings',
            [
                'label'          => esc_html__( 'Text', 'quadron' ),
                'tab'            => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'subtitle',
            [
                'label'          => esc_html__( 'Subtitle', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => esc_html__( 'Products' , 'quadron' ),
                'label_block'    => true,
            ]
        );
        $this->add_control( 'title',
            [
                'label'          => esc_html__( 'Title', 'quadron' ),
                'type'           => Controls_Manager::TEXTAREA,
                'default'        => 'Discover newest <br>technologies',
                'label_block'    => true,
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'post_query_section',
            [
                'label'         => esc_html__( 'Query', 'quadron' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'from_title',
            [
                'label'          => esc_html__( 'Text Before Price', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'From',
                'label_block'    => true,
            ]
        );
        $this->add_control( 'btn_title',
            [
                'label'          => esc_html__( 'Button Title', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'default'        => 'ADD TO CART',
                'label_block'    => true,
            ]
        );
        // Author Filter Heading
        $this->add_control( 'author_filter_heading',
            [
                'label'            => esc_html__( 'Author Filter', 'quadron' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        // Author Filter
        $this->add_control( 'author_filter',
            [
                'label'             => esc_html__( 'Author', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_users(),
                'description'       => 'Select Author(s)'
            ]
        );
        // Author Exclude Filter
        $this->add_control( 'author_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Author', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_users(),
                'description'       => 'Select Author(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        // Category Filter Heading
        $this->add_control( 'category_filter_heading',
            [
                'label'            => esc_html__( 'Category Filter', 'quadron' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        // Category Filter
        $this->add_control( 'category_filter',
            [
                'label'             => esc_html__( 'Category', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_cpt_taxonomies('product_cat'),
                'description'       => 'Select Category(s)'
            ]
        );
        // Exclude Category
        $this->add_control( 'category_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Category', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_cpt_taxonomies('product_cat'),
                'description'       => 'Select Category(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        // Post Filter Heading
        $this->add_control( 'post_filter_heading',
            [
                'label'            => esc_html__( 'Post Filter', 'quadron' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        // Specific Post
        $this->add_control( 'post_filter',
            [
                'label'             => esc_html__( 'Specific Post(s)', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
        'options'           => $this->quadron_cpt_get_post_title('product'),
                'description'       => 'Select Specific Post(s)'
            ]
        );
        // Exclude Post
        $this->add_control( 'post_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Post', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_cpt_get_post_title('product'),
                'description'       => 'Select Post(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        // Other Filter Heading
        $this->add_control( 'post_other_heading',
            [
                'label'            => esc_html__( 'Other Filter', 'quadron' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        // Posts Per Page
        $this->add_control( 'post_per_page',
            [
                'label'             => esc_html__( 'Posts Per Page', 'quadron' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 1000,
                'default'           => 20
            ]
        );
        // Offset
        $this->add_control( 'offset',
            [
                'label'             => esc_html__( 'Offset', 'quadron' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 0,
                'max'               => 1000
            ]
        );
        // Order
        $this->add_control( 'order',
            [
                'label'         => esc_html__( 'Select Order', 'quadron' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ASC'       => esc_html__( 'Ascending', 'quadron' ),
                    'DESC'      => esc_html__( 'Descending', 'quadron' )
                ],
                'default'       => 'ASC'
            ]
        );
        // Order By
        $this->add_control( 'orderby',
            [
                'label'                 => esc_html__( 'Order By', 'quadron' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => [
                    'none'           => esc_html__( 'None', 'quadron' ),
                    'ID'             => esc_html__( 'Post ID', 'quadron' ),
                    'author'         => esc_html__( 'Author', 'quadron' ),
                    'title'          => esc_html__( 'Title', 'quadron' ),
                    'name'           => esc_html__( 'Slug', 'quadron' ),
                    'date'           => esc_html__( 'Date', 'quadron' ),
                    'modified'       => esc_html__( 'Last Modified Date', 'quadron' ),
                    'parent'         => esc_html__( 'Post Parent ID', 'quadron' ),
                    'rand'           => esc_html__( 'Random', 'quadron' ),
                    'comment_count'  => esc_html__( 'Number of Comments', 'quadron' )
                ],
                'default'               => 'none'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }
    protected function render() {
        global $wp_query,$woocommerce,$product;
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type'      => 'product',
            'author__in'     => $settings['author_filter'],
            'author__not_in' => $settings['author_exclude_filter'],
            'post__in'       => $settings['post_filter'],
            'post__not_in'   => $settings['post_exclude_filter'],
            'posts_per_page' => $settings['post_per_page'],
            'offset'         => $settings['offset'],
            'order'          => $settings['order'],
            'orderby'        => $settings['orderby'],
            'tax_query'      => array(
                array(
                    'taxonomy'  => 'product_cat',
                    'field'     => 'id',
                    'terms'     => $settings['category_filter'] ? $settings['category_filter'] : 'all',
                    'operator'  => 'IN'
                ),
                array(
                    'taxonomy'  => 'product_cat',
                    'field'     => 'id',
                    'terms'     => $settings['category_exclude_filter'] ? $settings['category_exclude_filter'] : '',
                    'operator'  => 'NOT IN'
                )
            )
        );
        if (class_exists('woocommerce')) {
            echo '<div class="section section--bg-02 section-default-inner nt-carousel-products">';
                echo '<div class="container">';
                    if ( $settings['subtitle'] || $settings['title'] ) {
                        echo '<div class="section-heading section-heading_indentg04">';
                            if ( $settings['subtitle'] ) {
                                echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                            }
                            if ( $settings['title'] ) {
                                echo '<h4 class="title">'.$settings['title'].'</h4>';
                            }
                        echo '</div>';
                    }
                    $the_query = new \WP_Query( $args );
                    if( $the_query->have_posts() ) {
                        echo '<div class="js-carousel-products carousel-products slick-arrow-center">';
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            global $product;
                            if ( has_post_thumbnail() ) {
                                $bcropped  = quadron_aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), 430, 370, true, true, true );
                                $bcropped2 = quadron_aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), 500, 430, true, true, true );
                                $imagealt2 = esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true));
                                $imagealt2 = $imagealt2 ? $imagealt2 : basename( get_attached_file( get_post_thumbnail_id() ) );
                                if ( $product->is_in_stock() ) {
                                    echo '<div class="item">';
                                        echo '<div class="product nomove-hover">';
                                            echo '<div class="product__img"><a href="'.get_post_permalink().'">';
                                                echo '<picture>';
                                                    echo '<source srcset="'.$bcropped.'" media="(min-width:789px)">';
                                                    echo '<img src="'.$bcropped2.'" alt="'.$imagealt2.'">';
                                                echo '</picture>';
                                            echo '</a></div>';
                                            $regular = get_post_meta( get_the_ID(), '_regular_price', true);
                                            $sale    = get_post_meta( get_the_ID(), '_sale_price', true);
                                            $price   = $sale ? $sale : $regular;
                                            echo '<div class="product__description">';
                                                echo '<div class="product__price">'.$settings['from_title'].' <span>'.get_woocommerce_currency_symbol().$price.'</span></div>';
                                                echo '<h3 class="product__title"><a href="'.get_post_permalink().'">'.get_the_title().'</a></h3>';
                                            echo '</div>';
                                            echo '<div class="product__btn">';
                                                woocommerce_template_loop_add_to_cart();
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                        }
                        echo '</div>';
                    }
                    wp_reset_query();
                echo '</div>';
            echo '</div>';
        }
    }
}
