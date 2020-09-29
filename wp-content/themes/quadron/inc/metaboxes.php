<?php
function quadron_metaboxes_acf_init() {

    // get acf version
    $version = acf_get_setting('version');

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_5dd57ac4263d0',
            'title' => esc_html__( 'Quadron Default Page Customize Options', 'quadron' ),
            'fields' => array(
                array(
                    'key' => 'field_5dd57b1a15fe7',
                    'label' => esc_html__( 'Hide Page Header?', 'quadron' ),
                    'name' => 'quadron_hide_page_header',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Use this option, if you want to hide the page header.', 'quadron' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec27bb70c2d',
                    'label' => esc_html__( 'Hide Page Footer?', 'quadron' ),
                    'name' => 'quadron_hide_page_footer',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Select this option if you want to hide the page main footer for this page.', 'quadron' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec29a6552e7',
                    'label' => esc_html__( 'Hide Page Footer Widget Area?', 'quadron' ),
                    'name' => 'quadron_hide_page_footer_widget_area',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => ''
                    ),
                    'message' => esc_html__( 'Select this option if you want to hide the page footer widget area for this page.', 'quadron' ),
                    'default_value' => 1,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => ''
                ),
                array(
                    'key' => 'field_5dec2d17d0575',
                    'label' => esc_html__( 'Page Layout', 'quadron' ),
                    'name' => 'quadron_page_layout',
                    'type' => 'button_group',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '40',
                        'class' => '',
                        'id' => ''
                    ),
                    'choices' => array(
                        'right-sidebar' => esc_html__( 'Right Sidebar', 'quadron' ),
                        'left-sidebar' => esc_html__( 'Left Sidebar', 'quadron' ),
                        'full-width' => esc_html__( 'Full Width', 'quadron' )
                    ),
                    'allow_null' => 0,
                    'default_value' => 'full',
                    'layout' => 'horizontal',
                    'return_format' => 'value'
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        acf_add_local_field_group(array(
            'key' => 'group_5dd5758191fc6',
            'title' => esc_html__( 'Page Hero Oprions', 'quadron' ),
            'fields' => array(
                array(
                    'key' => 'field_5dd576425240d',
                    'label' => esc_html__( 'Hide Page Hero?', 'quadron' ),
                    'name' => 'quadron_hide_page_hero',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '20',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => esc_html__( 'Use this option, if you want to hide the page hero section.', 'quadron' ),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
                array(
                    'key' => 'field_5dd5773e99d7b',
                    'label' => esc_html__( 'Hero Customize', 'quadron' ),
                    'name' => 'quadron_page_hero_customize',
                    'type' => 'group',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5dd576425240d',
                                'operator' => '!=',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '80',
                        'class' => '',
                        'id' => '',
                    ),
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5dec3dc8c84e7',
                            'label' => esc_html__( 'Page Hero Background', 'quadron' ),
                            'name' => 'quadron_page_hero_background_customize',
                            'type' => 'group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'row',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5dec3e19c84e8',
                                    'label' => esc_html__( 'Background Image', 'quadron' ),
                                    'name' => 'quadron_hero_bg_img',
                                    'type' => 'image',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'return_format' => 'url',
                                    'preview_size' => 'quadron-570-hard',
                                    'library' => 'all',
                                    'min_width' => '',
                                    'min_height' => '',
                                    'min_size' => '',
                                    'max_width' => '',
                                    'max_height' => '',
                                    'max_size' => '',
                                    'mime_types' => '',
                                ),
                                array(
                                    'key' => 'field_5dec3e8ac84e9',
                                    'label' => esc_html__( 'Background Color', 'quadron' ),
                                    'name' => 'quadron_page_hero_bg_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_5dec3f4a217db',
                            'label' => esc_html__( 'Page Hero Text Customize', 'quadron' ),
                            'name' => 'quadron_page_hero_text_customize',
                            'type' => 'group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'row',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5dec3f9b217dc',
                                    'label' => esc_html__( 'Alternative Page Site Title', 'quadron' ),
                                    'name' => 'quadron_page_subtitle',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => esc_html__( 'if you want to use a different subtitle for the page you can type here', 'quadron' ),
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                                array(
                                    'key' => 'field_5dec3fe7217dd',
                                    'label' => esc_html__( 'Alternative Page Title', 'quadron' ),
                                    'name' => 'quadron_page_title',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => esc_html__( 'if you want to use a different title for the page you can type here', 'quadron' ),
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                                array(
                                    'key' => 'field_5dec3cb91c943',
                                    'label' => esc_html__( 'Page Title Background Color', 'quadron' ),
                                    'name' => 'quadron_page_title_bg_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                                array(
                                    'key' => 'field_5dec3c1df1c76',
                                    'label' => esc_html__( 'Page Title Color', 'quadron' ),
                                    'name' => 'quadron_page_title_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                                array(
                                    'key' => 'field_5dec3c881c942',
                                    'label' => esc_html__( 'Page Site Title Color', 'quadron' ),
                                    'name' => 'quadron_page_subtitle_color',
                                    'type' => 'color_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                ),
                                array(
                                    'key' => 'field_5dec468b5990a',
                                    'label' => esc_html__( 'Page Breadcrumbs Display', 'quadron' ),
                                    'name' => 'quadron_page_bread_visibility',
                                    'type' => 'button_group',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'choices' => array(
                                        1 => 'Show',
                                        0 => 'Hide',
                                    ),
                                    'allow_null' => 0,
                                    'default_value' => 0,
                                    'layout' => 'horizontal',
                                    'return_format' => 'value',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                ),
            ),
            'menu_order' => 1,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    endif;
}
add_action('acf/init', 'quadron_metaboxes_acf_init');
