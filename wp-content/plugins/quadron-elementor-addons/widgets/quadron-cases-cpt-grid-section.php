<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Cases_Cpt_Grid_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-cases-cpt-section';
    }
    public function get_title() {
        return '(CPT) Cases Grid';
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
        $this->start_controls_section( 'post_query_section',
            [
                'label'         => esc_html__( 'Query', 'quadron' ),
                'tab'           => Controls_Manager::TAB_CONTENT
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
                'options'           => $this->quadron_cpt_taxonomies('cases_cat'),
                'description'       => 'Select Category(s)'
            ]
        );
        // Exclude Category
        $this->add_control( 'category_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Category', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_cpt_taxonomies('cases_cat'),
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
        'options'           => $this->quadron_cpt_get_post_title('cases'),
                'description'       => 'Select Specific Post(s)'
            ]
        );
        // Exclude Post
        $this->add_control( 'post_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Post', 'quadron' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_cpt_get_post_title('cases'),
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
        $this->add_control( 'pagination',
            [
                'label'          => esc_html__( 'Pagination', 'quadron' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'quadron' ),
                'label_off'      => esc_html__( 'No', 'quadron' ),
                'return_value'   => 'yes',
                'default'        => 'no'
            ]
        );
        $this->add_control( 'pag_prev',
            [
                'label'          => esc_html__( 'Pagination Prev Text', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'label_block'    => true,
                'default'        => 'PREV',
                'condition'        => ['pagination' => 'yes']
            ]
        );
        $this->add_control( 'pag_next',
            [
                'label'          => esc_html__( 'Pagination Next Text', 'quadron' ),
                'type'           => Controls_Manager::TEXT,
                'label_block'    => true,
                'default'        => 'NEXT',
                'condition'        => ['pagination' => 'yes']
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }
    protected function render() {
        global $wp_query,$woocommerce,$product;
        $settings = $this->get_settings_for_display();
        if ( is_home() || is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        } else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        }
        $args = array(
            'post_type'      => 'cases',
            'author__in'     => $settings['author_filter'],
            'author__not_in' => $settings['author_exclude_filter'],
            'post__in'       => $settings['post_filter'],
            'post__not_in'   => $settings['post_exclude_filter'],
            'posts_per_page' => $settings['post_per_page'],
            'offset'         => $settings['offset'],
            'order'          => $settings['order'],
            'orderby'        => $settings['orderby'],
            'paged'          => $paged,
            'tax_query'      => array(
                array(
                    'taxonomy'  => 'cases_cat',
                    'field'     => 'id',
                    'terms'     => $settings['category_filter'] ? $settings['category_filter'] : 'all',
                    'operator'  => 'IN'
                ),
                array(
                    'taxonomy'  => 'cases_cat',
                    'field'     => 'id',
                    'terms'     => $settings['category_exclude_filter'] ? $settings['category_exclude_filter'] : '',
                    'operator'  => 'NOT IN'
                )
            )
        );
        if ( post_type_exists( 'cases') ) {
            echo '<div class="section section__indent-13">';
                echo '<div class="container">';
                    echo '<div class="list-videoblock">';
                        echo '<div class="row">';
                            $the_query = new \WP_Query( $args );
                            if( $the_query->have_posts() ) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    if ( has_post_thumbnail() ) {
                                        $bcropped  = quadron_aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), 570, 321, true, true, true );
                                        $imagealt = esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true));
                                        $imagealt = $imagealt ? $imagealt : basename( get_attached_file( get_post_thumbnail_id() ) );
                                        echo '<div class="col-sm-6">';
                                            echo '<a href="'.get_post_permalink().'" class="videoblock">';
                                                echo '<div class="videoblock__img">';
                                                    echo '<img src="'.$bcropped.'" alt="'.$imagealt.'">';
                                                    echo '<div class="videoblock__icon"></div>';
                                                echo '</div>';
                                                echo '<div class="videoblock__description">';
                                                    echo '<h2 class="videoblock__title">'.get_the_title().'</h2>';
                                                echo '</div>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                }
                            }
                            wp_reset_query();
                        echo '</div>';
                    echo '</div>';
                    if ($settings['pagination'] == 'yes' ) {
                        echo '<div class="page_nav d-flex justify-content-center align-items-center mt-60">';
                            $total_pages = $the_query->max_num_pages;
                            $big = 999999999;
                            if ($total_pages > 1){
                                echo paginate_links(array(
                                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format'    => '?paged=%#%',
                                    'current'   => max(1, $paged),
                                    'total'     => $total_pages,
                                    'type'      => '',
                                    'prev_text' => $settings['pag_prev'] ? esc_html($settings['pag_prev']) : 'PREV',
                                    'next_text' => $settings['pag_next'] ? esc_html($settings['pag_next']) : 'NEXT',
                                    'before_page_number' => '<div class="page-nav-item">',
                                    'after_page_number' => '</div>'
                                ));
                            }
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
    }
}
