<?php

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if (! class_exists('Redux')) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $quadron_pre = "quadron";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $quadron_theme = wp_get_theme(); // For use with some settings. Not necessary.

    $quadron_options_args = array(
        // TYPICAL -> Change these values as you need/desire
        'quadron_pre' => $quadron_pre,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name' => $quadron_theme->get('Name'),
        // Name that appears at the top of your panel
        'display_version' => $quadron_theme->get('Version'),
        // Version that appears at the top of your panel
        'menu_type' => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu' => false,
        // Show the sections below the admin menu item or not
        'menu_title' => esc_html__('Theme Options', 'quadron'),
        'page_title' => esc_html__('Theme Options', 'quadron'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key' => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography' => false,
        // Use a asynchronous font on the front end or font string
        'admin_bar' => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon' => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority' => 50,
        // Choose an priority for the admin bar menu
        'global_variable' => 'quadron',
        // Set a different name for your global variable other than the quadron_pre
        'dev_mode' => false,
        // Show the time the page took to load, etc
        'update_notice' => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer' => true,
        // Enable basic customizer support

        // OPTIONAL -> Give you extra features
        'page_priority' => 99,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent' => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions' => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon' => '',
        // Specify a custom URL to an icon
        'last_tab' => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon' => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug' => '',
        // Page slug used to denote the panel, will be based off page title then menu title then quadron_pre if not provided
        'save_defaults' => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show' => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark' => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export' => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time' => 60 * MINUTE_IN_SECONDS,
        'output' => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database' => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon' => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'dark',
                'shadow' => true,
                'rounded' => false,
                'style' => '',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $quadron_options_args['admin_bar_links'][] = array(
        'id' => 'ninetheme-quadron-docs',
        'href' => 'http://demo-ninetheme.com/quadron/doc.html',
        'title' => esc_html__('quadron Documentation', 'quadron'),
    );
    $quadron_options_args['admin_bar_links'][] = array(
        'id' => 'ninetheme-support',
        'href' => 'https://9theme.ticksy.com/',
        'title' => esc_html__('Support', 'quadron'),
    );
    $quadron_options_args['admin_bar_links'][] = array(
        'id' => 'ninetheme-portfolio',
        'href' => 'https://themeforest.net/user/ninetheme/portfolio',
        'title' => esc_html__('NineTheme Portfolio', 'quadron'),
    );

    // Add content after the form.
    $quadron_options_args['footer_text'] = esc_html__('If you need help please read docs and open a ticket on our support center.', 'quadron');

    Redux::setArgs($quadron_pre, $quadron_options_args);

    /* END ARGUMENTS */

    /* START SECTIONS */


    /*************************************************
    ## MAIN SETTING SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Main Setting', 'quadron'),
        'id' => 'basic',
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'customizer_width' => '400px',
        'icon' => 'el el-cog',
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Theme Color', 'quadron'),
        'id' => 'themebreadcrumbssubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__('Theme Main Color', 'quadron'),
                'subtitle' => esc_html__('Change theme main color.', 'quadron'),
                'id' => 'theme_main_color',
                'type' => 'color',
                'default' => '#2e3192'
            )
        )
    ));
    //BREADCRUMBS SETTINGS SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Breadcrumbs', 'quadron'),
        'id' => 'thememaincolorsubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'customizer_width' => '450px',
        'fields' => array(
            array(
                'title' => esc_html__('Breadcrumbs', 'quadron'),
                'subtitle' => esc_html__('If enabled, adds breadcrumbs navigation to bottom of page title.', 'quadron'),
                'id' => 'breadcrumbs_visibility',
                'type' => 'switch',
                'default' => false
            ),
            array(
                'title' => esc_html__('Breadcrumbs Typography', 'quadron'),
                'id' => 'breadcrumbs_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '.nt-breadcrumbs, .nt-breadcrumbs .nt-breadcrumbs-list' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'breadcrumbs_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Breadcrumbs Current Color', 'quadron'),
                'id' => 'breadcrumbs_current',
                'type' => 'color',
                'default' => '#fff',
                'output' => array( '.nt-breadcrumbs .nt-breadcrumbs-list li.active' ),
                'required' => array(
                    array( 'breadcrumbs_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__('Breadcrumbs Icon Color', 'quadron'),
                'id' => 'breadcrumbs_icon',
                'type' => 'color',
                'default' => '#fff',
                'output' => array( '.nt-breadcrumbs .nt-breadcrumbs-list i' ),
                'required' => array(
                    array( 'breadcrumbs_visibility', '=', '1' )
                )
            )
        )
    ));
    //PRELOADER SETTINGS SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Preloader', 'quadron'),
        'id' => 'themepreloadersubsection',
        'icon' => 'el el-brush',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__('Preloader', 'quadron'),
                'subtitle' => esc_html__('If enabled, adds preloader.', 'quadron'),
                'id' => 'preloader_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__('Preloader Type', 'quadron'),
                'subtitle' => esc_html__('Select your site preloader type.', 'quadron'),
                'id' => 'pre_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '01' => esc_html__('Type 1', 'quadron'),
                    '02' => esc_html__('Type 2', 'quadron'),
                    '03' => esc_html__('Type 3', 'quadron'),
                    '04' => esc_html__('Type 4', 'quadron'),
                    '05' => esc_html__('Type 5', 'quadron'),
                    '06' => esc_html__('Type 6', 'quadron'),
                    '07' => esc_html__('Type 7', 'quadron'),
                    '08' => esc_html__('Type 8', 'quadron'),
                    '09' => esc_html__('Type 9', 'quadron'),
                    '10' => esc_html__('Type 10', 'quadron'),
                    '11' => esc_html__('Type 11', 'quadron'),
                    '12' => esc_html__('Type 12', 'quadron'),
                    'custom' => esc_html__('Custom Gif Image ', 'quadron')
                ),
                'default' => '01',
                'required' => array( 'preloader_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Custom preloder image', 'quadron'),
                'subtitle' => esc_html__('Upload your custom preloder image.', 'quadron'),
                'id' => 'pre_custom_img',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                    array( 'pre_type', '=', 'custom' )
                ),
            ),
            array(
                'title' => esc_html__('Preloader Background Color', 'quadron'),
                'subtitle' => esc_html__('Add preloader background color.', 'quadron'),
                'id' => 'pre_bg',
                'type' => 'color',
                'default' => '#fff',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' )
                ),
            ),
            array(
                'title' => esc_html__('Preloader Spin Color', 'quadron'),
                'subtitle' => esc_html__('Add preloader spin color.', 'quadron'),
                'id' => 'pre_spin',
                'type' => 'color',
                'default' => '#292940',
                'required' => array(
                    array( 'preloader_visibility', '=', '1' ),
                    array( 'pre_type', '!=', 'custom' )
                )
            )
    )));
    //MAIN THEME TYPOGRAPHY SUBSECTION
    Redux::setSection($quadron_pre, array(
    'title' => esc_html__('Typograhy General', 'quadron'),
    'id' => 'themetypographysection',
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('H1 Headings', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for h1", 'quadron'),
            'id' => 'font_h1',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h1' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            )
        ),
        array(
            'title' => esc_html__('H2 Headings', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for h2", 'quadron'),
            'id' => 'font_h2',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h2' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            )
        ),
        array(
            'title' => esc_html__('H3 Headings', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for h3", 'quadron'),
            'id' => 'font_h3',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h3' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            )
        ),
        array(
            'title' => esc_html__('H4 Headings', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for h4", 'quadron'),
            'id' => 'font_h4',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h4' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            )
        ),
        array(
            'title' => esc_html__('H5 Headings', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for h5", 'quadron'),
            'id' => 'font_h5',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h5' ),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            )
        ),
        array(
            'title' => esc_html__('H6 Headings', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for h6", 'quadron'),
            'id' => 'font_h6',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'h6' ),
            'units' => 'px',
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => ''
            )
        ),
        array(
            'id' =>'info_body_font',
            'type' => 'info',
            'customizer' => false,
            'desc' => esc_html__('Body Font Options', 'quadron')
        ),
        array(
            'title' => esc_html__('Paragraph', 'quadron'),
            'subtitle' => esc_html__("Choose Size and Style for paragraph", 'quadron'),
            'id' => 'font_p',
            'type' => 'typography',
            'font-backup' => false,
            'letter-spacing' => true,
            'text-transform' => true,
            'all_styles' => true,
            'output' => array( 'p' ),
            'default' => array(
                'font-family' =>'',
                'color' =>"",
                'font-style' =>'',
                'font-size' =>'',
                'line-height' =>''
            )
        )
    )));
    //BACKTOTOP BUTTON SUBSECTION
    Redux::setSection($quadron_pre, array(
    'title' => esc_html__('Back-to-top Button', 'quadron'),
    'id' => 'backtotop',
    'icon' => 'el el-brush',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Back-to-top', 'quadron'),
            'subtitle' => esc_html__('Switch On-off', 'quadron'),
            'desc' => esc_html__('If enabled, adds preloader.', 'quadron'),
            'id' => 'backtotop_visibility',
            'type' => 'switch',
            'default' => true
        ),
        array(
            'title' => esc_html__('Top Offset', 'quadron'),
            'subtitle' => esc_html__('Set custom top offset for the back-to-top button', 'quadron'),
            'desc' => esc_html__('If enabled, adds preloader.', 'quadron'),
            'id' => 'backtotop_offset',
            'type' => 'slider',
            'default' => 800,
            'min' => 10,
            'step' => 1,
            'max'=> 2000,
            'required' => array( 'backtotop_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Back-to-top Background', 'quadron'),
            'id' => 'backtotop_bg',
            'type' => 'color',
            'mode' => 'background',
            'output' => array( '#btn-to-top-wrap #btn-to-top' ),
            'default' =>  '#292940',
            'required' => array( 'backtotop_visibility', '=', '1' )
        )
    )));

    // THEME PAGINATION SUBSECTION
    Redux::setSection($quadron_pre, array(
    'title' => esc_html__('Pagination', 'quadron'),
    'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
    'id' => 'pagination',
    'subsection' => true,
    'icon' => 'el el-link',
    'fields' => array(
        array(
            'title' => esc_html__('Pagination', 'quadron'),
            'subtitle' => esc_html__('Switch On-off', 'quadron'),
            'desc' => esc_html__('If enabled, adds pagination.', 'quadron'),
            'id' => 'pagination_visibility',
            'type' => 'switch',
            'default' => true
        ),
        array(
            'title' => esc_html__('Pagination Type', 'quadron'),
            'subtitle' => esc_html__('Select type.', 'quadron'),
            'id' => 'pag_type',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'default' => esc_html__('Default', 'quadron'),
                'outline' => esc_html__('Outline', 'quadron')
            ),
            'default' => 'outline',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Pagination size', 'quadron'),
            'subtitle' => esc_html__('Select size.', 'quadron'),
            'id' => 'pag_size',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'small' => esc_html__('small', 'quadron'),
                'medium' => esc_html__('medium', 'quadron'),
                'large' => esc_html__('large', 'quadron')
            ),
            'default' => 'medium',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Pagination group', 'quadron'),
            'subtitle' => esc_html__('Select group.', 'quadron'),
            'id' => 'pag_group',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'yes' => esc_html__('Yes', 'quadron'),
                'no' => esc_html__('No', 'quadron')
            ),
            'default' => 'no',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Pagination corner', 'quadron'),
            'subtitle' => esc_html__('Select corner type.', 'quadron'),
            'id' => 'pag_corner',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'square' => esc_html__('square', 'quadron'),
                'rounded' => esc_html__('rounded', 'quadron'),
                'circle' => esc_html__('circle', 'quadron')
            ),
            'default' => 'circle',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Pagination align', 'quadron'),
            'subtitle' => esc_html__('Select align.', 'quadron'),
            'id' => 'pag_align',
            'type' => 'select',
            'customizer' => true,
            'options' => array(
                'left' => esc_html__('left', 'quadron'),
                'right' => esc_html__('right', 'quadron'),
                'center' => esc_html__('center', 'quadron')
            ),
            'default' => 'center',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Pagination default/outline color', 'quadron'),
            'id' => 'pag_clr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Active and Hover pagination color', 'quadron'),
            'id' => 'pag_hvrclr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Pagination number color', 'quadron'),
            'id' => 'pag_nclr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        ),
        array(
            'title' => esc_html__('Active and Hover pagination number color', 'quadron'),
            'id' => 'pag_hvrnclr',
            'type' => 'color',
            'mode' => 'color',
            'required' => array( 'pagination_visibility', '=', '1' )
        )
    )));

    /*************************************************
    ## LOGO SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Logo', 'quadron'),
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'id' => 'logosection',
        'customizer_width' => '400px',
        'icon' => 'el el-star-empty',
        'fields' => array(
            array(
                'title' => esc_html__('Logo Switch', 'quadron'),
                'subtitle' => esc_html__('You can select logo on or off.', 'quadron'),
                'id' => 'logo_visibility',
                'type' => 'switch',
                'default' => true
            ),
            array(
                'title' => esc_html__('Logo Type', 'quadron'),
                'subtitle' => esc_html__('Select your logo type.', 'quadron'),
                'id' => 'logo_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'img' => esc_html__('Image Logo', 'quadron'),
                    'sitename' => esc_html__('Site Name', 'quadron'),
                    'customtext' => esc_html__('Custom Text', 'quadron')
                ),
                'default' => 'sitename',
                'required' => array( 'logo_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Custom text for logo', 'quadron'),
                'desc' => esc_html__('Text entered here will be used as logo', 'quadron'),
                'id' => 'text_logo',
                'type' => 'text',
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'customtext' )
                ),
            ),
            array(
                'title' => esc_html__('Sitename or Custom Text Logo Font', 'quadron'),
                'desc' => esc_html__("Choose size and style your sitename, if you don't use an image logo.", 'quadron'),
                'id' =>'logo_style',
                'type' => 'typography',
                'font-family' => true,
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false, // Select a backup non-google font in addition to a google font
                'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                'subsets' => true, // Only appears if google is true and subsets not set to false
                'font-size' => true,
                'line-height' => true,
                'text-transform' => true,
                'text-align' => false,
                'customizer' => true,
                'color' => true,
                'preview' => true, // Disable the previewer
                'output' => array('#nt-logo.logo-type-customtext, #nt-logo.logo-type-sitename'),
                'default' => array(
                    'font-family' =>'',
                    'color' =>"",
                    'font-style' =>'',
                    'font-size' =>'',
                    'line-height' =>''
                ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', 'img' )
                )
            ),
            array(
                'title' => esc_html__('Hover Text Logo Color', 'quadron'),
                'desc' => esc_html__('Set your own hover color for the text logo.', 'quadron'),
                'id' => 'text_logo_hvr',
                'type' => 'color',
                'output' => array( '#top-bar #nt-logo.logo-type-customtext:hover, #top-bar #nt-logo.logo-type-sitename:hover' ),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '!=', 'img' )
                )
            ),
            array(
                'title' => esc_html__('Logo image', 'quadron'),
                'subtitle' => esc_html__('Upload your Logo. If left blank theme will use site default logo.', 'quadron'),
                'id' => 'img_logo',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__('Logo Dimensions', 'quadron'),
                'subtitle' => esc_html__('Set the logo width and height of the image.', 'quadron'),
                'id' => 'img_logo_dimensions',
                'type' => 'dimensions',
                'customizer' => true,
                'output' => array('#nt-logo img.main-logo'),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' )
                )
            ),
            array(
                'title' => esc_html__('Sticky Logo Switch', 'quadron'),
                'subtitle' => esc_html__('You can select sticky logo on or off.', 'quadron'),
                'id' => 'sticky_logo_visibility',
                'type' => 'switch',
                'default' => false,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' )
                )
            ),
            array(
                'title' => esc_html__('Sticky logo image', 'quadron'),
                'subtitle' => esc_html__('Upload your Logo. If left blank theme will use site default logo.', 'quadron'),
                'id' => 'sticky_logo',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' ),
                    array( 'sticky_logo_visibility', '=', '1' )
                )
            ),
            array(
                'title' => esc_html__('Sticky logo Dimensions', 'quadron'),
                'subtitle' => esc_html__('Set the sticky logo width and height of the image.', 'quadron'),
                'id' => 'sticky_logo_dimensions',
                'type' => 'dimensions',
                'customizer' => true,
                'output' => array('#nt-logo img.sticky-logo'),
                'required' => array(
                    array( 'logo_visibility', '=', '1' ),
                    array( 'logo_type', '=', 'img' ),
                    array( 'logo_type', '!=', '' ),
                    array( 'sticky_logo_visibility', '=', '1' )
                )
            )
    )));

    /*************************************************
    ## HEADER & NAV SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Header', 'quadron'),
        'id' => 'headersection',
        'icon' => 'el el-justify',
    ));
    //HEADER MENU
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Header Menu', 'quadron'),
        'id' => 'headernavsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Menu Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site navigation.', 'quadron'),
                'id' => 'nav_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Sticky Menu Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site navigation sticky option.', 'quadron'),
                'id' => 'nav_sticky_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Header Background Color', 'quadron'),
                'id' => 'nav_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '#top-bar:not(.no-indent-mainContent)' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Header Border Bottom Color', 'quadron'),
                'id' => 'nav_brd_btm',
                'type' => 'color',
                'mode' => 'color',
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Sticky Menu Background', 'quadron'),
                'id' => 'nav_bg_sticky',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '#top-bar.stuck:not(.no-stuck)' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_sticky_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Menu Item Font and Color', 'quadron'),
                'subtitle' => esc_html__("Choose Size and Style for primary menu", 'quadron'),
                'id' => 'nav_a_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#top-bar__navigation > ul > li > a, #top-bar__navigation > ul > li ul li.active > a, #nav-aside_menu > ul > li > a, #nav-aside_menu > ul > li ul li.active > a' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Menu Item Color ( Hover and Active )', 'quadron'),
                'desc' => esc_html__('Set your own hover color for the navigation menu item.', 'quadron'),
                'id' => 'nav_hvr_a',
                'type' => 'color',
                'output' => array( '#top-bar__navigation > ul > li > a:hover,#top-bar__navigation > ul > li.active > a, #top-bar__navigation > ul > li ul li > a:hover, #top-bar__navigation > ul > li ul li.active > a, #nav-aside_menu > ul > li > a:hover, #nav-aside_menu > ul > li.active > a, #nav-aside_menu > ul > li ul li.active > a, #nav-aside_menu > ul > li.is-open > a, #nav-aside_menu > ul > li ul li a:hover' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Menu Item Border Color ( Hover and Active )', 'quadron'),
                'desc' => esc_html__('Set your own hover color for the navigation menu item.', 'quadron'),
                'id' => 'nav_hvr_a_brd',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '#top-bar__navigation > ul > li > a span:before, #top-bar__navigation > ul > li ul li a:before, #nav-aside_menu > ul > li > a span:before' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Dropdown Submenu Background Color', 'quadron'),
                'desc' => esc_html__('Set your own background-color for the navigation dropdown menu.', 'quadron'),
                'id' => 'nav_drop_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '#top-bar__navigation > ul > li ul' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Dropdown Submenu Item Font and Color', 'quadron'),
                'subtitle' => esc_html__("Choose Size and Style for dropdown menu item", 'quadron'),
                'id' => 'nav_drop_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#top-bar__navigation > ul > li ul li a, #nav-aside_menu > ul > li ul li > a' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Dropdown Item Color ( Hover )', 'quadron'),
                'desc' => esc_html__('Set your own hover color for the navigation dropdown menu item.', 'quadron'),
                'id' => 'nav_drop_i',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '#top-bar__navigation > ul > li ul li a:hover, #top-bar__navigation > ul > li ul li.active a, #nav-aside_menu > ul > li ul li.active > a' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Toggle Button Bar Color', 'quadron'),
                'desc' => esc_html__('Set your own color for mobile menu navbar toggle button.', 'quadron'),
                'id' => 'nav_icon',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '#top-bar__navigation-toggler' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Toggle Bar Color ( Hover )', 'quadron'),
                'desc' => esc_html__('Set your own color for mobile menu navbar toggle button.', 'quadron'),
                'id' => 'nav_icon_hvr',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '#top-bar__navigation-toggler:hover' ),
                'required' => array( 'nav_visibility', '=', '1' )
            ),
            //information on-off
            array(
                'id' =>'info_nav0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Success!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('%s is disabled on the site. Please activate to view options.', 'quadron'), '<b>Navigation</b>'),
                'required' => array( 'nav_visibility', '=', '0' )
            ),
    )));
    //HEADER RIGHT BUTTON
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Sidebar Menu', 'quadron'),
        'id' => 'headersidebarnavsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Sidebar Menu Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site header language.', 'quadron'),
                'id' => 'sidebar_menu_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Text Logo Color', 'quadron'),
                'desc' => esc_html__('Set your own color for the side menu text logo.', 'quadron'),
                'id' => 'sidebar_menu_text_logo_clr',
                'type' => 'color',
                'output' => array( '#nav-aside .nav-aside__close' ),
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Close Icon Color', 'quadron'),
                'desc' => esc_html__('Set your own color for the side menu text logo.', 'quadron'),
                'id' => 'sidebar_menu_close_clr',
                'type' => 'color',
                'output' => array( '#nav-aside .nav-aside__close svg' ),
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Background Color', 'quadron'),
                'id' => 'sidebar_menu_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '#nav-aside' ),
                'default' => '',
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Link Color', 'quadron'),
                'id' => 'sidebar_menu_link_clr',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '#nav-aside a, #nav-aside .nav-asid__list li a, #nav-aside address a, #nav-aside div a' ),
                'default' => '',
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Link Hover Color', 'quadron'),
                'id' => 'sidebar_menu_link_hvrclr',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '#nav-aside .nav-asid__list li a:hover' ),
                'default' => '',
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Link Hover Bottom Line Color', 'quadron'),
                'id' => 'sidebar_menu_link_bottomclr',
                'type' => 'color',
                'mode' => 'background-color',
                'output' => array( '#nav-aside .nav-asid__list li a:before' ),
                'default' => '',
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Text Color ( Sidebar Menu Widget Area )', 'quadron'),
                'id' => 'sidebar_menu_text_bottomclr',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '#nav-aside .side-menu__menu, #nav-aside .side-menu__menu p, #nav-aside .side-menu__menu address' ),
                'default' => '',
                'required' => array( 'sidebar_menu_visibility', '=', '1' )
            )
     )));
    //HEADER RIGHT BUTTON
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Header Right Buttons', 'quadron'),
        'id' => 'headernavbtnsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            //nav second button
            array(
                'title' => esc_html__('Shop Cart Icon Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site header shop icon.', 'quadron'),
                'id' => 'header_shop_cart_display',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Button Right Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site header right button.', 'quadron'),
                'id' => 'nav_btn_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            //nav second button
            array(
                'title' => esc_html__('Button Title', 'quadron'),
                'subtitle' => esc_html__('Add button title.', 'quadron'),
                'id' => 'nav_btn_title',
                'type' => 'text',
                'default' => 'Make Order',
                'validate' => 'html_custom',
                'allowed_html' => array(
                    'i' => array(
                        'class' => array(),
                        'style' => array()
                    ),
                    'span' => array(
                        'class' => array(),
                        'style' => array()
                    )
                ),
                'default' => '',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_btn_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Button URL', 'quadron'),
                'subtitle' => esc_html__('Add button URL/Link.', 'quadron'),
                'id' => 'nav_btn_url',
                'type' => 'text',
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_btn_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Background Color', 'quadron'),
                'id' => 'nav_btn_bg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.top-bar__custom-btn:before' ),
                'default' => array(
                    'color' => '',
                    'alpha' => 1
                ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_btn_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Background Color ( Hover )', 'quadron'),
                'id' => 'nav_btn_hvrbg',
                'type' => 'color_rgba',
                'mode' => 'background',
                'output' => array( '.top-bar__custom-btn:hover:before' ),
                'default' => array(
                    'color' => '',
                    'alpha' => 1
                ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_btn_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Title Color', 'quadron'),
                'id' => 'nav_btn_clr',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '.top-bar__custom-btn' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_btn_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Title Color ( Hover )', 'quadron'),
                'id' => 'nav_btn_hvrclr',
                'type' => 'color',
                'mode' => 'color',
                'output' => array( '.top-bar__custom-btn:hover' ),
                'required' => array(
                    array( 'nav_visibility', '=', '1' ),
                    array( 'nav_btn_visibility', '=', '1' ),
                )
            )
    )));
    /*************************************************
    ## SIDEBARS SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Sidebars', 'quadron'),
        'id' => 'sidebarssection',
        'customizer_width' => '400px',
        'icon' => 'el el-website',
    ));
    // SIDEBAR LAYOUT SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Sidebars Layout', 'quadron'),
        'desc' => esc_html__('You can change the below default layout type.', 'quadron'),
        'id' => 'sidebarslayoutsection',
        'subsection' => true,
        'icon' => 'el el-cogs',
        'fields' => array(
            array(
                'title' => esc_html__('Sidebar type', 'quadron'),
                'subtitle' => esc_html__('Select sidebar type.', 'quadron'),
                'id' => 'sidebar_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '' => esc_html__('Select type', 'quadron'),
                    'default' => esc_html__('default', 'quadron'),
                    'bordered' => esc_html__('bordered', 'quadron')
                ),
                'default' => 'default',
            )
    )));
    // SIDEBAR COLORS SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Sidebar Customize', 'quadron'),
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'id' => 'sidebarsgenaralsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Sidebar Background', 'quadron'),
                'id' => 'sdbr_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.nt-sidebar' )
            ),
            array(
                'id' => 'sdbr_brd',
                'type' => 'border',
                'title' => esc_html__('Sidebar Border', 'quadron'),
                'output' => array( '.nt-sidebar' ),
                'all' => false
            ),
            array(
                'title' => esc_html__('Sidebar Padding', 'quadron'),
                'id' => 'sdbr_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
            array(
                'title' => esc_html__('Sidebar Margin', 'quadron'),
                'id' => 'sdbr_mar',
                'type' => 'spacing',
                'mode' => 'margin',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
    )));
    // SIDEBAR WIDGET COLORS SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Widget Customize', 'quadron'),
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'id' => 'sidebarwidgetsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Sidebar Widgets Background Color', 'quadron'),
                'id' => 'sdbr_w_bg',
                'type' => 'color',
                'mode' => 'background',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' )
            ),
            array(
                'title' => esc_html__('Widgets Border', 'quadron'),
                'id' => 'sdbr_w_brd',
                'type' => 'border',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' ),
                'all' => false
            ),
            array(
                'title' => esc_html__('Widget Title Color', 'quadron'),
                'desc' => esc_html__('Set your own colors for the widgets.', 'quadron'),
                'id' => 'sdbr_wt',
                'type' => 'color',
                'output' => array( '#nt-sidebar .widget-title' )
            ),
            array(
                'title' => esc_html__('Widget Text Color', 'quadron'),
                'desc' => esc_html__('Set your own colors for the widgets.', 'quadron'),
                'id' => 'sdbr_wp',
                'type' => 'color',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget, .nt-sidebar .nt-sidebar-inner-widget p' )
            ),
            array(
                'title' => esc_html__('Widget Link Color', 'quadron'),
                'desc' => esc_html__('Set your own colors for the widgets.', 'quadron'),
                'id' => 'sdbr_a',
                'type' => 'color',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget a' )
            ),
            array(
                'title' => esc_html__('Widget Hover Link Color', 'quadron'),
                'desc' => esc_html__('Set your own hover colors for the widgets.', 'quadron'),
                'id' => 'sdbr_hvr_a',
                'type' => 'color',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget a:hover' )
            ),
            array(
                'title' => esc_html__('Widget Padding', 'quadron'),
                'id' => 'sdbr_w_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            ),
            array(
                'title' => esc_html__('Widget Margin', 'quadron'),
                'id' => 'sdbr_w_mar',
                'type' => 'spacing',
                'mode' => 'margin',
                'all' => false,
                'units' => array( 'em', 'px', '%' ),
                'units_extended' => 'true',
                'output' => array( '.nt-sidebar .nt-sidebar-inner-widget' ),
                'default' => array(
                    'margin-top' => '',
                    'margin-right' => '',
                    'margin-bottom' => '',
                    'margin-left' => ''
                )
            )
    )));

    /*************************************************
    ## BLOG PAGE SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Blog Page', 'quadron'),
        'id' => 'blogsection',
        'icon' => 'el el-home',
    ));
    // BLOG HERO SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Blog Hero', 'quadron'),
        'desc' => esc_html__('These are blog index page hero text settings!', 'quadron'),
        'id' => 'blogherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Blog Hero Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page hero section with switch option.', 'quadron'),
                'id' => 'blog_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Blog Hero Background', 'quadron'),
                'id' => 'blog_hero_bg',
                'type' => 'background',
                'preview' => true,
                'preview_media' => true,
                'output' => array( '#nt-index .subpage-header__bg' ),
                'default' => array(
                    'background-position' => '50% 50%'
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Blog Title', 'quadron'),
                'subtitle' => esc_html__('Add your blog index page title here.', 'quadron'),
                'id' => 'blog_title',
                'type' => 'text',
                'default' => 'BLOG',
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Blog Title Typography', 'quadron'),
                'id' => 'blog_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-index .nt-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Blog Site Title', 'quadron'),
                'subtitle' => esc_html__('Add your blog index page site title here.', 'quadron'),
                'id' => 'blog_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name'),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Blog Site Title Typography', 'quadron'),
                'id' => 'blog_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-index .nt-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'blog_hero_visibility', '=', '1' )
            )
    )));
    // BLOG LAYOUT AND POST COLUMN STYLE
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Blog Content', 'quadron'),
        'id' => 'blogcontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Blog Page Layout', 'quadron'),
                'subtitle' => esc_html__('Choose the blog index page layout.', 'quadron'),
                'id' => 'index_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__('Blog page container type', 'quadron'),
                'subtitle' => esc_html__('Select blog page container type.', 'quadron'),
                'id' => 'index_container_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'container' => esc_html__('default ( container )', 'quadron'),
                    'container-fluid' => esc_html__('container-fluid', 'quadron'),
                    'container-off' => esc_html__('container-off ( no-paddings )', 'quadron')
                ),
                'default' => 'container'
            ),
            array(
                'title' => esc_html__('Blog page index type', 'quadron'),
                'subtitle' => esc_html__('Select blog page index type.', 'quadron'),
                'id' => 'index_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__('default ( List )', 'quadron'),
                    'masonry' => esc_html__('masonry', 'quadron'),
                    'grid' => esc_html__('grid', 'quadron')
                ),
                'default' => 'grid'
            ),
            array(
                'title' => esc_html__('Post bordered?', 'quadron'),
                'subtitle' => esc_html__('Select box style.', 'quadron'),
                'id' => 'format_box_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'nt-default-format-box' => esc_html__('default bordered', 'quadron'),
                    'nt-simple-format-box' => esc_html__('simple', 'quadron')
                ),
                'default' => 'nt-default-format-box',
                'required' => array( 'index_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__('Post box style', 'quadron'),
                'subtitle' => esc_html__('Select box style.', 'quadron'),
                'id' => 'grid_style',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    '1' => esc_html__('Style 1', 'quadron'),
                    '2' => esc_html__('Style 2', 'quadron'),
                    '3' => esc_html__('Style 3', 'quadron'),
                ),
                'default' => '1',
                'required' => array( 'index_type', '=', 'default' )
            ),
            array(
                'title' => esc_html__('Blog page post column width', 'quadron'),
                'subtitle' => esc_html__('Select a column number.', 'quadron'),
                'id' => 'grid_column',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'col-lg-6' => esc_html__('2 column', 'quadron'),
                    'col-lg-4' => esc_html__('3 column', 'quadron'),
                    'col-lg-3' => esc_html__('4 column', 'quadron')
                ),
                'default' => 'col-lg-6',
                'required' => array(
                    array( 'index_type', '!=', '' ),
                    array( 'index_type', '!=', 'default' )
                )
            ),
            array(
                'title' => esc_html__('Blog Post Title Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post title with switch option.', 'quadron'),
                'id' => 'post_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Blog Post Meta Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post meta with switch option.', 'quadron'),
                'id' => 'post_meta_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Blog Post Category Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post category with switch option.', 'quadron'),
                'id' => 'post_category_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Blog Post Author Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post author with switch option.', 'quadron'),
                'id' => 'post_author_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Blog Post Date Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post date with switch option.', 'quadron'),
                'id' => 'post_date_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'post_meta', '=', '1' )
            ),
            array(
                'title' => esc_html__('Blog Post Comments Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post comments with switch option.', 'quadron'),
                'id' => 'post_comments_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'post_meta', '=', '1' )
            ),
            array(
                'title' => esc_html__('Blog Post Excerpt Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post meta with switch option.', 'quadron'),
                'id' => 'post_excerpt_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Post Excerpt Size (max word count)', 'quadron'),
                'subtitle' => esc_html__('You can control blog post excerpt size with this option.', 'quadron'),
                'id' => 'excerptsz',
                'type' => 'slider',
                'default' => 30,
                'min' => 0,
                'step' => 1,
                'max' => 100,
                'display_value' => 'text',
                'required' => array( 'post_excerpt_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Blog Post Button Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site blog index page post read more button wityh switch option.', 'quadron'),
                'id' => 'post_button_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Blog Post Button Title', 'quadron'),
                'subtitle' => esc_html__('Add your blog post read more button title here.', 'quadron'),
                'id' => 'read_more',
                'type' => 'text',
                'default' => esc_html__('Read More', 'quadron'),
                'required' => array( 'post_button_visibility', '=', '1' )
            )
    )));

    /*************************************************
    ## SINGLE PAGE SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Single Page', 'quadron'),
        'id' => 'singlesection',
        'icon' => 'el el-home-alt',
    ));
    // SINGLE HERO SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Single Hero', 'quadron'),
        'desc' => esc_html__('These are single page hero section settings!', 'quadron'),
        'id' => 'singleherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Single Hero display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site single page hero section with switch option.', 'quadron'),
                'id' => 'single_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__('Single Hero Background', 'quadron'),
                'id' => 'single_hero_bg',
                'type' => 'background',
                'output' => array( '#nt-single .subpage-header__bg' ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Single Title Typography', 'quadron'),
                'id' => 'single_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-single .nt-hero-title' ),
                'units' => 'px',
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Single Site Title', 'quadron'),
                'subtitle' => esc_html__('Add your single page site title here.', 'quadron'),
                'id' => 'single_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name'),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Single Site Title Typography', 'quadron'),
                'id' => 'single_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-single .nt-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'single_hero_visibility', '=', '1' ),
            )
    )));
    // SINGLE CONTENT SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Single Content', 'quadron'),
        'id' => 'singlecontentsubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Single Page Layout', 'quadron'),
                'subtitle' => esc_html__('Choose the single post page layout.', 'quadron'),
                'id' => 'single_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__('Single Post Tags Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site single page post meta tags with switch option.', 'quadron'),
                'id' => 'single_postmeta_tags_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Single Post Authorbox', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site single page post authorbox with switch option.', 'quadron'),
                'id' => 'single_post_author_box_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Single Post Pagination Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site single page post next and prev pagination with switch option.', 'quadron'),
                'id' => 'single_navigation_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Single Related Post Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site single page related post with switch option.', 'quadron'),
                'id' => 'single_related_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Single Related Post Count', 'quadron'),
                'subtitle' => esc_html__('You can control related post count with this option.', 'quadron'),
                'id' => 'related_perpage',
                'type' => 'slider',
                'default' => 3,
                'min' => 1,
                'step' => 1,
                'max' => 24,
                'display_value' => 'text',
                'required' => array( 'single_related_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Related Section Title', 'quadron'),
                'subtitle' => esc_html__('Add your single page related post section title here.', 'quadron'),
                'id' => 'related_title',
                'type' => 'text',
                'default' => esc_html__('You May Also Like', 'quadron'),
                'required' => array( 'single_related_visibility', '=', '1' )
            )
    )));
    /*************************************************
    ## ARCHIVE PAGE SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Archive Page', 'quadron'),
        'id' => 'archivesection',
        'icon' => 'el el-folder-open',
    ));
    // ARCHIVE PAGE SECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Archive Hero', 'quadron'),
        'desc' => esc_html__('These are archive page hero settings!', 'quadron'),
        'id' => 'archiveherosubsection',
        'subsection' => true,
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Archive Page Layout', 'quadron'),
                'subtitle' => esc_html__('Choose the archive page layout.', 'quadron'),
                'id' => 'archive_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__('Archive Hero display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site archive page hero section with switch option.', 'quadron'),
                'id' => 'archive_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__('Archive Hero Background', 'quadron'),
                'id' => 'archive_hero_bg',
                'type' => 'background',
                'output' => array( '#nt-archive .subpage-header__bg' ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Custom Archive Title', 'quadron'),
                'subtitle' => esc_html__('Add your custom archive page title here.', 'quadron'),
                'id' => 'archive_title',
                'type' => 'text',
                'default' => esc_html__('ARCHIVE', 'quadron'),
                'required' => array( 'archive_hero', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Archive Title Typography', 'quadron'),
                'id' => 'archive_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-archive .nt-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Archive Site Title', 'quadron'),
                'subtitle' => esc_html__('Add your archive page site title here.', 'quadron'),
                'id' => 'archive_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name'),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            ),
            array(
                'title' => esc_html__('Archive Site Title Typography', 'quadron'),
                'id' => 'archive_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-archive .nt-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'archive_hero_visibility', '=', '1' ),
            )
    )));
    /*************************************************
    ## 404 PAGE SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('404 Page', 'quadron'),
        'id' => 'errorsection',
        'icon' => 'el el-error',
        'fields' => array(
            array(
                'title' => esc_html__('404 Page Layout', 'quadron'),
                'subtitle' => esc_html__('Choose the 404 page layout.', 'quadron'),
                'id' => 'error_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__('404 Background', 'quadron'),
                'id' => 'error_content_bg_img',
                'type' => 'background',
                'output' => array( '#nt-404 .layout404' ),
            ),
            array(
                'title' => esc_html__('Content Image Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site 404 page content search form with switch option.', 'quadron'),
                'id' => 'error_content_logo_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__('Content Image Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site 404 page content search form with switch option.', 'quadron'),
                'id' => 'error_content_img_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__('Content Image', 'quadron'),
                'subtitle' => esc_html__('Upload your image. If left blank theme will use site default image.', 'quadron'),
                'id' => 'error_content_img',
                'type' => 'media',
                'url' => true,
                'customizer' => true,
                'required' => array( 'error_content_img_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Content Subtitle Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site 404 page content subtitle with switch option.', 'quadron'),
                'id' => 'error_content_subtitle_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__('Content Subtitle', 'quadron'),
                'subtitle' => esc_html__('Add your 404 page content subtitle here.', 'quadron'),
                'id' => 'error_content_subtitle',
                'type' => 'text',
                'default' => '404',
                'required' => array( 'error_content_subtitle_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Subtitle Typography', 'quadron'),
                'id' => 'error_content_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-404 .layout404__text-bg' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'error_content_title_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Content Title Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site 404 page content title with switch option.', 'quadron'),
                'id' => 'error_content_title_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'title' => esc_html__('Content Title', 'quadron'),
                'subtitle' => esc_html__('Add your 404 page content title here.', 'quadron'),
                'id' => 'error_content_title',
                'type' => 'text',
                'default' => 'ERROR',
                'required' => array( 'error_content_title_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Title Typography', 'quadron'),
                'id' => 'error_content_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-404 .layout404__title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'error_content_title_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Content Description Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site 404 page content description with switch option.', 'quadron'),
                'id' => 'error_content_desc_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Content Description', 'quadron'),
                'subtitle' => esc_html__('Add your 404 page content description here.', 'quadron'),
                'id' => 'error_content_desc',
                'type' => 'textarea',
                'default' => 'Page you are looking can’t be found',
                'required' => array( 'error_content_desc_visibility', '=', '1' )
            ),
            array(
                'title' =>esc_html__('Description Typography', 'quadron'),
                'id' => 'error_page_content_desc_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-404 .layout404__description' ),
                'default' => array(
                    'color' =>'',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'error_content_desc_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Button Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site 404 page content back to home button with switch option.', 'quadron'),
                'id' => 'error_content_btn_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Button Title', 'quadron'),
                'subtitle' => esc_html__('Add your 404 page content back to home button title here.', 'quadron'),
                'id' => 'error_content_btn_title',
                'type' => 'text',
                'default' => 'GO BACK HOME',
                'required' => array( 'error_content_btn_visibility', '=', '1' )
            ),
    )));
    /*************************************************
    ## SEARCH PAGE SECTION
    *************************************************/
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Search Page', 'quadron'),
        'id' => 'searchsection',
        'icon' => 'el el-search',
    ));
    //SEARCH PAGE SECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Search Hero', 'quadron'),
        'id' => 'searchherosubsection',
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'icon' => 'el el-search',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => esc_html__('Search Page Layout', 'quadron'),
                'subtitle' => esc_html__('Choose the search page layout.', 'quadron'),
                'id' => 'search_layout',
                'type' => 'image_select',
                'options' => array(
                    'left-sidebar' => array(
                        'alt' => 'Left Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cl.png'
                    ),
                    'full-width' => array(
                        'alt' => 'Full Width',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/1col.png'
                    ),
                    'right-sidebar' => array(
                        'alt' => 'Right Sidebar',
                        'img' => get_template_directory_uri() . '/inc/theme-options/img/2cr.png'
                    )
                ),
                'default' => 'full-width'
            ),
            array(
                'title' => esc_html__('Search Hero display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site search page hero section with switch option.', 'quadron'),
                'id' => 'search_hero_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__('Search Hero Background', 'quadron'),
                'id' =>'search_hero_bg',
                'type' => 'background',
                'output' => array( '#nt-archive .subpage-header__bg' ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Search Title', 'quadron'),
                'subtitle' => esc_html__('Add your search page title here.', 'quadron'),
                'id' => 'search_title',
                'type' => 'text',
                'default' => esc_html__('Search results for :', 'quadron'),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Search Title Typography', 'quadron'),
                'id' => 'search_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-search .nt-hero-title' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Search Site Title', 'quadron'),
                'subtitle' => esc_html__('Add your search page site title here.', 'quadron'),
                'id' => 'search_site_title',
                'type' => 'textarea',
                'default' => get_bloginfo('name'),
                'required' => array( 'search_hero_visibility', '=', '1' )
            ),
            array(
                'title' => esc_html__('Search Site Title Typography', 'quadron'),
                'id' => 'search_site_title_typo',
                'type' => 'typography',
                'font-backup' => false,
                'letter-spacing' => true,
                'text-transform' => true,
                'all_styles' => true,
                'output' => array( '#nt-search .nt-hero-subtitle' ),
                'default' => array(
                    'color' => '',
                    'font-style' => '',
                    'font-family' => '',
                    'google' => true,
                    'font-size' => '',
                    'line-height' => ''
                ),
                'required' => array( 'search_hero_visibility', '=', '1' )
            )
    )));
    //FOOTER SECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Footer Elementor Template', 'quadron'),
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'id' => 'footerelementortempaltesection',
        'icon' => 'el el-photo',
        'fields' => array(
            array(
                'title' => esc_html__('Use Elementor Template?', 'quadron'),
                'subtitle' => esc_html__('If you want to use elementor template instead of site footer and footer widget area, please turn on this option.', 'quadron'),
                'id' => 'use_elementor_template_for_footer',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off'
            ),
            array(
                'title' => esc_html__( 'Elementor Templates', 'quadron' ),
                'subtitle' => esc_html__( 'Select a template from elementor templates for footer.', 'quadron' ),
                'id' => 'footer_elementor_templates',
                'type' => 'select',
                'customizer' => true,
                'options' => quadron_get_elementorTemplates(),
                'required' => array( 'use_elementor_template_for_footer', '=', '1' )
            ),
    )));
    //FOOTER SECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Footer Copyright', 'quadron'),
        'desc' => esc_html__('These are main settings for general theme!', 'quadron'),
        'id' => 'footersection',
        'icon' => 'el el-photo',
        'fields' => array(
            array(
                'title' => esc_html__('Footer Copyright Section Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the site footer section on the site with switch option.', 'quadron'),
                'id' => 'footer_copyright_visibility',
                'type' => 'switch',
                'default' => 1,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'use_elementor_template_for_footer', '=', '0' )
            ),
            array(
                'title' => esc_html__('Footer Copyright Type', 'quadron'),
                'subtitle' => esc_html__('Select your footer type.', 'quadron'),
                'id' => 'footer_type',
                'type' => 'select',
                'customizer' => true,
                'options' => array(
                    'default' => esc_html__('Deafult Site Copyright', 'quadron'),
                    'custom' => esc_html__('Custom Copyright', 'quadron')
                ),
                'default' => 'default',
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                ),
            ),
            array(
                'title' => esc_html__('Create your custom footer', 'quadron'),
                'subtitle' => esc_html__('HTML allowed (wp_kses)', 'quadron'),
                'id' => 'custom_footer',
                'type' => 'textarea',
                'validate' => 'html',
                'default' => esc_html__('Enter your custom footer here. Html can be entered in this field.', 'quadron'),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'custom' )
                ),
            ),
            array(
                'title' => esc_html__('Copyright Text', 'quadron'),
                'subtitle' => esc_html__('HTML allowed (wp_kses)', 'quadron'),
                'desc' => esc_html__('Enter your site copyright here.', 'quadron'),
                'id' => 'footer_copyright',
                'type' => 'textarea',
                'validate' => 'html',
                'default' => 'Copyrights 2019 <i class="fa fa-copyright"></i> <a class="__dev" href="https://ninetheme.com/contact/" target="_blank">Ninetheme</a>',
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                ),
            ),
            array(
                'title' => esc_html__('Copyright Text Color', 'quadron'),
                'desc' => esc_html__('Set your own colors for the copyright.', 'quadron'),
                'id' => 'footer_copy_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#footer .copyright, #footer .copyright p' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                    array( 'footer_type', '=', 'default' )
                )
            ),
            array(
                'title' => esc_html__('Copyright Padding', 'quadron'),
                'subtitle' => esc_html__('You can set the top spacing of the site main footer.', 'quadron'),
                'id' => 'footer_pad',
                'type' => 'spacing',
                'mode' => 'padding',
                'units' => array('em', 'px'),
                'units_extended' => 'false',
                'output' => array( '#footer .footer-custom' ),
                'default' => array(
                    'padding-top' => '',
                    'padding-right' => '',
                    'padding-bottom' => '',
                    'padding-left' => '',
                    'units' => 'px'
                ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Copyright Background Color', 'quadron'),
                'desc' => esc_html__('Set your own colors for the footer.', 'quadron'),
                'id' => 'footer_bg_clr',
                'type' => 'color',
                'transparent' => false,
                'output' => array( '#footer .footer-custom' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '1' ),
                )
            ),
            //information on-off
            array(
                'id' =>'info_f0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Success!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('%s section is disabled on the site.', 'quadron'), '<b>Site Main Footer Copyright</b>'),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_copyright_visibility', '=', '0' ),
                )
            ),
            //information on-off
            array(
                'id' =>'info_f2',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Information!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('If you want to see the options, please turn off the %s options.', 'quadron'), '<b>Footer Elementor Template</b>'),
                'required' => array( 'use_elementor_template_for_footer', '=', '1' ),
            )
    )));

    //FOOTER WIDGETIZE SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Footer Widget Area', 'quadron'),
        'id' => 'footerwidgetizesection',
        'icon' => 'el el-th-large',
        'fields' => array(
            array(
                'title' => esc_html__('Footer Widget Area Section Display', 'quadron'),
                'subtitle' => esc_html__('You can enable or disable the footer widget area with one option.', 'quadron'),
                'id' => 'footer_widgetize_visibility',
                'type' => 'switch',
                'default' => 0,
                'on' => 'On',
                'off' => 'Off',
                'required' => array( 'use_elementor_template_for_footer', '=', '0' ),
            ),
            //information on-off
            array(
                'id' =>'info_fw0',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Success!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('%s section is disabled on the site. Please activate to view subsection options.', 'quadron'), '<b>Footer Widget Area</b>'),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '0' ),
                )
            ),
            //information on-off
            array(
                'id' =>'info_fw4',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Information!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('If you want to see the options, please turn off the  %s options.', 'quadron'), '<b>Footer Elementor Template</b>'),
                'required' => array( 'use_elementor_template_for_footer', '=', '1' ),
            )
    )));

    //FOOTER WIDGETIZE COLOR SUBSECTION
    Redux::setSection($quadron_pre, array(
        'title' => esc_html__('Widget Area Customize', 'quadron'),
        'id' => 'widgetcustomizesubsection',
        'subsection' => true,
        'customizer_width' => '400px',
        'icon' => 'el el-brush',
        'fields' => array(
            array(
                'title' => esc_html__('Footer Widget Area Background', 'quadron'),
                'id' => 'fw_bg',
                'type' => 'background',
                'output' => array( '.nt-footer-sidebar' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Widget Title Colors', 'quadron'),
                'desc' => esc_html__('Set your own color for the widgets title.', 'quadron'),
                'id' => 'fw_w',
                'type' => 'color',
                'output' => array( '.nt-footer-sidebar .nt-footer-widget-title' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Widget Link Color', 'quadron'),
                'desc' => esc_html__('Set your own color for the widgets link.', 'quadron'),
                'id' => 'fw_wa',
                'type' => 'color',
                'output' => array( '.#footer.nt-footer-sidebar ul li a' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Widget Hover Link Color', 'quadron'),
                'desc' => esc_html__('Set your own hover colors for the widgets link.', 'quadron'),
                'id' => 'fw_wa',
                'type' => 'color',
                'output' => array( '.#footer.nt-footer-sidebar ul li a:hover' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Widget Text Color', 'quadron'),
                'desc' => esc_html__('Set your own colors for the widgets.', 'quadron'),
                'id' => 'fw_wp',
                'type' => 'color',
                'output' => array( '.nt-footer-sidebar, .nt-footer-sidebar p' ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '1' ),
                )
            ),
            array(
                'title' => esc_html__('Widget Area Padding', 'quadron'),
                'subtitle' => esc_html__('You can set the top spacing of the widget area.', 'quadron'),
                'id' => 'fw_pad',
                'type' => 'spacing',
                'output' => array('.nt-footer-sidebar.footer-widget-area'),
                'mode' => 'padding',
                'units' => array('em', 'px'),
                'units_extended' => 'false',
                'default' => array(
                    'padding-top' => '',
                    'padding-right' => '',
                    'padding-bottom' => '',
                    'padding-left' => '',
                    'units' => 'px'
                ),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '1' ),
                )
            ),
            //information on-off
            array(
                'id' =>'info_fw2',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Information!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('This section options are disabled by the %s Section. Please activate to view options.', 'quadron'), '<b>Footer Widget Area</b>'),
                'required' => array(
                    array( 'use_elementor_template_for_footer', '=', '0' ),
                    array( 'footer_widgetize_visibility', '=', '0' ),
                )
            ),
            //information on-off
            array(
                'id' =>'info_fw5',
                'type' => 'info',
                'style' => 'success',
                'title' => esc_html__('Information!', 'quadron'),
                'icon' => 'el el-info-circle',
                'customizer' => false,
                'desc' => sprintf(esc_html__('If you want to see the options, please turn off the  %s options.', 'quadron'), '<b>Footer Elementor Template</b>'),
                'required' => array( 'use_elementor_template_for_footer', '=', '1' ),
            )
    )));
    Redux::setSection($quadron_pre, array(
        'id' => 'inportexport_settings',
        'title' => esc_html__('Import / Export', 'quadron'),
        'desc' => esc_html__('Import and Export your Theme Options from text or URL.', 'quadron'),
        'icon' => 'icon-large icon-hdd',
        'fields' => array(
            array(
                'id' => 'opt-import-export',
                'type' => 'import_export',
                'title' => '',
                'customizer' => false,
                'subtitle' => '',
                'full_width' => true
            )
    )));
    Redux::setSection($quadron_pre, array(
    'id' => 'nt_support_settings',
    'title' => esc_html__('Support', 'quadron'),
    'icon' => 'el el-idea',
    'fields' => array(
        array(
            'id' => 'doc',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__('WE RECOMMEND YOU READ IT BEFORE YOU START', 'quadron').'</h5>
            <h2><i class="el el-website"></i> '.esc_html__('DOCUMENTATION', 'quadron').'</h2>
            <a target="_blank" class="button" href="https://ninetheme.com/documentations/">'.esc_html__('READ MORE', 'quadron').'</a>
            </div>'
        ),
        array(
            'id' => 'support',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__('DO YOU NEED HELP?', 'quadron').'</h5>
            <h2><i class="el el-adult"></i> '.esc_html__('SUPPORT CENTER', 'quadron').'</h2>
            <a target="_blank" class="button" href="https://ninetheme.com/contact/">'.esc_html__('GET SUPPORT', 'quadron').'</a>
            </div>'
        ),
        array(
            'id' => 'portfolio',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__('SEE MORE THE NINETHEME WORDPRESS THEMES', 'quadron').'</h5>
            <h2><i class="el el-picture"></i> '.esc_html__('NINETHEME PORTFOLIO', 'quadron').'</h2>
            <a target="_blank" class="button" href="https://ninetheme.com/wordpress-themes/">'.esc_html__('SEE MORE', 'quadron').'</a>
            </div>'
        ),
        array(
            'id' => 'like',
            'type' => 'raw',
            'markdown' => true,
            'class' => 'theme_support',
            'content' => '<div class="support-section">
            <h5>'.esc_html__('WOULD YOU LIKE TO REWARD OUR EFFORT?', 'quadron').'</h5>
            <h2><i class="el el-thumbs-up"></i> '.esc_html__('PLEASE RATE US!', 'quadron').'</h2>
            <a target="_blank" class="button" href="https://themeforest.net/downloads/">'.esc_html__('GET STARS', 'quadron').'</a>
            </div>'
        )
    )));
    /*
     * <--- END SECTIONS
     */


    /** Action hook examples **/

    function quadron_remove_demo()
    {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin')) {
            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ));
        }
    }
    include get_template_directory() . '/inc/theme-options/redux-extensions/loader.php';
