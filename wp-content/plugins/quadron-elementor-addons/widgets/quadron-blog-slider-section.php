<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Quadron_Blog_Slider_Section_Widget extends Widget_Base {
    use Quadron_Helper;
    public function get_name() {
        return 'quadron-blog-slider-section';
    }
    public function get_title() {
        return 'Blog Slider Section';
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
                'default' => esc_html__( 'Blog' , 'quadron' ),
                'label_block' => true,
            ]
        );
        $this->add_control('title',
            [
                'label' => esc_html__( 'Title', 'quadron' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'News & Insights',
                'label_block' => true,
            ]
        );
        $this->add_control('btn_title',
            [
                'label' => esc_html__( 'Button Title', 'quadron' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'MORE ARTICLES' , 'quadron' ),
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
        $this->start_controls_section( 'nt_post_query',
            [
                'label'         => esc_html__( 'Query', 'nt-addons' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'author_filter_heading',
            [
                'label'            => esc_html__( 'Author Filter', 'nt-addons' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        $this->add_control('author_filter',
            [
                'label'             => esc_html__( 'Author', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_users(),
                'description'       => 'Select Author(s)'
            ]
        );
        $this->add_control('author_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Author', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_users(),
                'description'       => 'Select Author(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        $this->add_control( 'category_filter_heading',
            [
                'label'            => esc_html__( 'Category Filter', 'nt-addons' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        $this->add_control('category_filter',
            [
                'label'             => esc_html__( 'Category', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_categories(),
                'description'       => 'Select Category(s)'
            ]
        );
        $this->add_control('category_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Category', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_categories(),
                'description'       => 'Select Category(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        $this->add_control( 'tag_filter_heading',
            [
                'label'            => esc_html__( 'Tag Filter', 'nt-addons' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        $this->add_control('tag_filter',
            [
                'label'             => esc_html__( 'Tag', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_tags(),
                'description'       => 'Select Tag(s)'
            ]
        );
        $this->add_control('tag_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Tag', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_tags(),
                'description'       => 'Select Tag(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        $this->add_control( 'post_filter_heading',
            [
                'label'            => esc_html__( 'Post Filter', 'nt-addons' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        $this->add_control('post_filter',
            [
                'label'             => esc_html__( 'Specific Post(s)', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_posts(),
                'description'       => 'Select Specific Post(s)'
            ]
        );
        $this->add_control('post_exclude_filter',
            [
                'label'             => esc_html__( 'Exclude Post', 'nt-addons' ),
                'type'              => Controls_Manager::SELECT2,
                'multiple'          => true,
                'options'           => $this->quadron_get_posts(),
                'description'       => 'Select Post(s) to Exclude',
                'separator'         => 'after'
            ]
        );
        $this->add_control( 'post_other_heading',
            [
                'label'            => esc_html__( 'Other Filter', 'nt-addons' ),
                'type'             => Controls_Manager::HEADING
            ]
        );
        $this->add_control('post_per_page',
            [
                'label'             => esc_html__( 'Posts Per Page', 'nt-addons' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 1,
                'max'               => 1000,
                'default'           => 6
            ]
        );
        $this->add_control('offset',
            [
                'label'             => esc_html__( 'Offset', 'nt-addons' ),
                'type'              => Controls_Manager::NUMBER,
                'min'               => 0,
                'max'               => 1000
            ]
        );
        $this->add_control( 'order',
            [
                'label'         => esc_html__( 'Select Order', 'nt-addons' ),
                'type'          => Controls_Manager::SELECT,
                'options'       => [
                    'ASC'       => 'Ascending',
                    'DESC'      => 'Descending'
                ],
                'default'       => 'ASC'
            ]
        );
        $this->add_control( 'orderby',
            [
                'label'                 => esc_html__( 'Order By', 'nt-addons' ),
                'type'                  => Controls_Manager::SELECT,
                'options'               => [
                    'none'              => 'None',
                    'ID'                => 'Post ID',
                    'author'            => 'Author',
                    'title'             => 'Title',
                    'name'              => 'Slug',
                    'date'              => 'Date',
                    'modified'          => 'Last Modified Date',
                    'parent'            => 'Post Parent ID',
                    'rand'              => 'Random',
                    'comment_count'     => 'Number of Comments',
                ],
                'default'               => 'none'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/

        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section( 'quadron_post_options',
            [
                'label'         => esc_html__( 'Post Options', 'nt-addons' ),
                'tab'           => Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control( 'showtitle',
            [
                'label'          => esc_html__( 'Post Title', 'nt-addons' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'nt-addons' ),
                'label_off'      => esc_html__( 'No', 'nt-addons' ),
                'return_value'   => 'yes',
                'default'        => 'yes',
                'separator'      => 'after'
            ]
        );
        $this->add_control( 'showdate',
            [
                'label'          => esc_html__( 'Post Date', 'nt-addons' ),
                'type'           => Controls_Manager::SWITCHER,
                'label_on'       => esc_html__( 'Yes', 'nt-addons' ),
                'label_off'      => esc_html__( 'No', 'nt-addons' ),
                'return_value'   => 'yes',
                'default'        => 'yes'
            ]
        );
        $this->end_controls_section();
        /*****   END CONTROLS SECTION   ******/
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $target     = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow   = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $line_image = plugins_url( 'assets/front/img/sectionbg_vertical_line.png', __DIR__ );
        $lineimg = 'yes' != $settings['hideline'] ? ' data-bg="'.$line_image.'"' : '';
        $args = array(
            'post_type'             => 'post',
            'author__in'            => $settings['author_filter'],
            'author__not_in'        => $settings['author_exclude_filter'],
            'category__in'          => $settings['category_filter'],
            'category__not_in'      => $settings['category_exclude_filter'],
            'tag__in'               => $settings['tag_filter'],
            'tag__not_in'           => $settings['tag_exclude_filter'],
            'post__in'              => $settings['post_filter'],
            'post__not_in'          => $settings['post_exclude_filter'],
            'posts_per_page'        => $settings['post_per_page'],
            'offset'                => $settings['offset'],
            'order'                 => $settings['order'],
            'orderby'               => $settings['orderby'],
        );
        echo '<div class="section section-blog section__indent-03 section--bg-vertical-line section--bg-01"'.$lineimg.'>';
            echo '<div class="container section--pr">';
                if ( $settings['subtitle'] || $settings['title'] ) {
                    echo '<div class="section-heading section-heading_indentg03 section-heading__right-arrow">';
                        if ( $settings['subtitle'] ) {
                            echo '<div class="description"><i></i>'.$settings['subtitle'].'</div>';
                        }
                        if ( $settings['title'] ) {
                            echo '<h3 class="title">'.$settings['title'].'</h3>';
                        }
                    echo '</div>';
                }
                $the_query = new \WP_Query( $args );
                if( $the_query->have_posts() ) :
                    echo '<div class="slick-arrow-extraright">';
                        echo '<div class="slick-arrow slick-prev">';
                            echo '<svg><use xlink:href="#arrow_left"></use></svg>';
                        echo '</div>';
                        echo '<div class="slick-arrow slick-next">';
                            echo '<svg><use xlink:href="#arrow_right"></use></svg>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="js-carusel-news promobox02__slider">';
                        while ($the_query->have_posts()) : $the_query->the_post();
                            if(has_post_thumbnail()) {
                                echo '<div class="item">';
                                    echo '<a href="'.get_post_permalink().'" class="promobox02">';
                                        echo '<figure>';
                                            $cropped  = quadron_aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ), 323, 471, true, true, true );
                                            $imagealt = esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true));
                                            $imagealt = $imagealt ? $imagealt : basename ( get_attached_file( get_post_thumbnail_id() ) );
                                            echo '<img src="'.$cropped.'" alt="'.$imagealt.'">';
                                            echo '<figcaption>';
                                                echo '<div class="promobox02__time">'.get_the_date('d M’ y').'</div>';
                                                echo '<h4 class="promobox02__title">'.get_the_title().'</h4>';
                                            echo '</figcaption>';
                                        echo '</figure>';
                                    echo '</a>';
                                echo '</div>';
                            }
                        endwhile;
                    echo '</div>';
                endif;
                wp_reset_postdata();
                if ( $settings['btn_link']['url'] ) {
                    echo '<div class="btn-row btn-top text-center">';
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
    }
}
