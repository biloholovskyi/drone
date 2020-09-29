<?php

/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package quadron
*/


/*************************************************
##  LOGO
*************************************************/

if (! function_exists('quadron_logo')) {
    function quadron_logo()
    {
        if ('0' != quadron_settings('logo_visibility', '1')) {
            $has_sticky_logo = '1' == quadron_settings('sticky_logo_visibility')  && '' != quadron_settings('sticky_logo') ? ' has-sticky-logo' : '';
            echo '<a href="' . esc_url(home_url('/')) . '" id="nt-logo" class="top-bar__logo site-logo logo-type-'.quadron_settings('logo_type', 'sitename').$has_sticky_logo.'">';

            if ('img' == quadron_settings('logo_type') && '' != quadron_settings('img_logo')) {
                // image logo
                echo '<img src="'.esc_url(quadron_settings('img_logo')['url']).'" alt="'.esc_attr(get_bloginfo('name')).'" class="img-fluid main-logo" />';
                if ('1' == quadron_settings('sticky_logo_visibility')  && '' != quadron_settings('sticky_logo')) {
                    echo '<img src="'.esc_url(quadron_settings('sticky_logo')['url']).'" alt="'.esc_attr(get_bloginfo('name')).'" class="img-fluid sticky-logo" />';
                }
            } elseif ('sitename' == quadron_settings('logo_type')) {
                // get bloginfo name
                echo esc_html(get_bloginfo('name'));
            } elseif ('customtext' == quadron_settings('logo_type')) {
                // custom text logo
                echo esc_html(quadron_settings('text_logo'));
            } else {
                // default image logo
                echo 'Quadron.';
            }
            echo '</a>';
        }
    }
}


/*************************************************
##  HEADER NAVIGATION
*************************************************/

if (! function_exists('quadron_main_header')) {
    add_action('quadron_header_action', 'quadron_main_header', 10);
    function quadron_main_header()
    {
        if ('0' != quadron_settings('nav_visibility', '1')) {
        $hide_toggler  = '0' == quadron_settings('sidebar_menu_visibility', '0') ? ' class="lg-hide-toggler"' : '';
        $header_string = '';
        $header_string = apply_filters( 'quadron_header_filter', $header_string );
        $header_class  = [
            '0' == quadron_settings('nav_sticky_visibility', '1') ? 'no-stuck' : 'sticky-menu',
            $header_string
        ];
        echo'<div class="pr-svg-sprite">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><symbol viewBox="0 0 254.8 478.5" id="arrow_back" xmlns="http://www.w3.org/2000/svg"><path d="M145.188 238.575l215.5-215.5c5.3-5.3 5.3-13.8 0-19.1s-13.8-5.3-19.1 0l-225.1 225.1c-5.3 5.3-5.3 13.8 0 19.1l225.1 225c2.6 2.6 6.1 4 9.5 4s6.9-1.3 9.5-4c5.3-5.3 5.3-13.8 0-19.1l-215.4-215.5z"/></symbol><symbol viewBox="0 0 291.49 492" id="arrow_left" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M198.608 246.104L382.664 62.04c5.068-5.056 7.856-11.816 7.856-19.024 0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12C361.476 2.792 354.712 0 347.504 0s-13.964 2.792-19.028 7.864L109.328 227.008c-5.084 5.08-7.868 11.868-7.848 19.084-.02 7.248 2.76 14.028 7.848 19.112l218.944 218.932c5.064 5.072 11.82 7.864 19.032 7.864 7.208 0 13.964-2.792 19.032-7.864l16.124-16.12c10.492-10.492 10.492-27.572 0-38.06L198.608 246.104z"/></symbol><symbol viewBox="0 0 254.7 478.5" id="arrow_next" xmlns="http://www.w3.org/2000/svg"><path d="M360.731 229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1 0s-5.3 13.8 0 19.1l215.5 215.5-215.5 215.5c-5.3 5.3-5.3 13.8 0 19.1 2.6 2.6 6.1 4 9.5 4 3.4 0 6.9-1.3 9.5-4l225.1-225.1c5.3-5.2 5.3-13.8.1-19z"/></symbol><symbol viewBox="0 0 291.49 492" id="arrow_right" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"/></symbol><symbol viewBox="0 0 24 24" id="list_marker_02" xmlns="http://www.w3.org/2000/svg"><path d="M19.281 5.281L9 15.563 4.719 11.28 3.28 12.72l5 5 .719.687.719-.687 11-11z"/></symbol><symbol viewBox="0 0 24 24" id="list_marker_02_color02" xmlns="http://www.w3.org/2000/svg"><path d="M20.293 5.293L9 16.586l-4.293-4.293-1.414 1.414L9 19.414 21.707 6.707l-1.414-1.414z"/></symbol><symbol viewBox="0 0 17.437 14.12" id="quotes" xmlns="http://www.w3.org/2000/svg"><path data-name="“" d="M1.419 4.82a13.418 13.418 0 0 0-1.421 5.92v3.39h5.391v-3.98a13.832 13.832 0 0 1 2.812-8.03L5.101.01a14.236 14.236 0 0 0-3.682 4.81zm9.229 0a13.4 13.4 0 0 0-1.421 5.92v3.39h5.39v-3.98a13.833 13.833 0 0 1 2.813-8.03L14.324.01a14.233 14.233 0 0 0-3.676 4.81z" fill="#2e3192" fill-rule="evenodd"/></symbol><symbol viewBox="0 0 16 16" id="noun_comment" xmlns="http://www.w3.org/2000/svg"><path d="M0 0v11h3v5l5-5h8V0H0z"/></symbol><symbol viewBox="0 0 15.56 15.562" id="remove" xmlns="http://www.w3.org/2000/svg"><path data-name="Rectangle 17 copy" d="M14.85.003l.71.707L.71 15.559 0 14.852zM.71.003l14.85 14.849-.71.707L0 .71z" fill="currentColor"/></symbol><symbol viewBox="0 0 512 512" id="refresh" xmlns="http://www.w3.org/2000/svg"><path d="M255.656 40.156a216.069 216.069 0 0 0-43.437 4.5C95.676 68.791 20.52 183.24 44.656 299.781 68.791 416.324 183.207 491.48 299.75 467.344l-6.094-29.375C192.99 458.816 94.878 394.354 74.031 293.688 53.184 193.02 117.646 94.877 218.312 74.03c100.667-20.847 198.779 43.615 219.625 144.281a185.84 185.84 0 0 1-17.312 123.844l-20.531-11.875-10.188 98.688 80.375-58.156-23.656-13.657a215.744 215.744 0 0 0 20.688-144.906C446.195 110.275 355.962 39.967 255.655 40.156z" fill="currentColor"/></symbol><symbol viewBox="0 0 524 524" id="filter" xmlns="http://www.w3.org/2000/svg"><path d="M368.313 0H17.05A16.5 16.5 0 0 0 2.344 8.96a16.732 16.732 0 0 0 1.3 17.415l128.688 181.281c.043.063.09.121.133.184a36.769 36.769 0 0 1 7.219 21.816v147.797a16.429 16.429 0 0 0 16.433 16.535c2.227 0 4.426-.445 6.48-1.297l72.313-27.574c6.48-1.976 10.781-8.09 10.781-15.453V229.656a36.774 36.774 0 0 1 7.215-21.816c.043-.063.09-.121.133-.184L381.723 26.367a16.717 16.717 0 0 0 1.3-17.406A16.502 16.502 0 0 0 368.313 0zM236.78 195.992a56.931 56.931 0 0 0-11.097 33.664v117.578l-66 25.164V229.656a56.909 56.909 0 0 0-11.102-33.664L23.648 20h338.07zm0 0"/></symbol><symbol viewBox="0 0 391.4 489" id="shopping-bag01" xmlns="http://www.w3.org/2000/svg"><path d="M440.1 422.7l-28-315.3c-.6-7-6.5-12.3-13.4-12.3h-57.6C340.3 42.5 297.3 0 244.5 0s-95.8 42.5-96.6 95.1H90.3c-7 0-12.8 5.3-13.4 12.3l-28 315.3c0 .4-.1.8-.1 1.2 0 35.9 32.9 65.1 73.4 65.1h244.6c40.5 0 73.4-29.2 73.4-65.1 0-.4 0-.8-.1-1.2zM244.5 27c37.9 0 68.8 30.4 69.6 68.1H174.9c.8-37.7 31.7-68.1 69.6-68.1zm122.3 435H122.2c-25.4 0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0 7.5 6 13.5 13.5 13.5s13.5-6 13.5-13.5v-41h139.3v41c0 7.5 6 13.5 13.5 13.5s13.5-6 13.5-13.5v-41h45.2l26.9 302.3c-.4 20.7-21.1 37.5-46.4 37.5z"/></symbol></svg>
        </div>';
        echo'<header id="top-bar" class="'.esc_attr(implode(' ',$header_class)).'">
            <div class="container-fluid">
                <div class="row justify-content-between no-gutters">
                    <div class="col-auto side-col d-flex align-items-center text-nowrap">
                        <a href="#" id="top-bar__navigation-toggler"'.$hide_toggler.'>
                            <span></span>
                        </a>';
                        // theme logo
                        quadron_logo();
                    echo'</div>

                    <div class="col-auto">
                        <nav id="top-bar__navigation">
                            <ul>';
                            // default wp menu
                            wp_nav_menu(
                                array(
                                    'menu' => '',
                                    'theme_location' => 'header_menu_1',
                                    'container' => '', // menu wrapper element
                                    'container_class' => '',
                                    'container_id' => '', // default: none
                                    'menu_class' => '', // ul class
                                    'menu_id' => '', // ul id
                                    'items_wrap' => '%3$s',
                                    'before' => '', // before <a>
                                    'after' => '', // after <a>
                                    'link_before' => '', // inside <a>, before text
                                    'link_after' => '', // inside <a>, after text
                                    'depth' => 3, // '0' to display all depths
                                    'echo' => true,
                                    'fallback_cb' => 'Quadron_Wp_Bootstrap_Navwalker::fallback',
                                    'walker' => new Quadron_Wp_Bootstrap_Navwalker()
                                )
                            );
                            echo'</ul>
                        </nav>
                    </div>';

                    if (class_exists('woocommerce') || '0' != quadron_settings('nav_btn_visibility', '1')) {
                        echo'<div class="col-auto side-col">';
                            if (class_exists('woocommerce') && '1' == quadron_settings('header_shop_cart_display', '0') && function_exists('quadron_woo_header_cart_button') ) {
                                echo quadron_woo_header_cart_button();
                            }

                            if ('0' != quadron_settings('nav_btn_visibility', '0')) {
								if ( has_nav_menu( 'header_button' ) ) {
									quadron_header_right_button();
								} else {
									if ('' != quadron_settings('nav_btn_title')) {

										echo'<a href="'.quadron_settings('nav_btn_url').'" class="top-bar__custom-btn"><span>'.quadron_settings('nav_btn_title').'</span></a>';
									} else {
										echo'<a href="'.esc_url(home_url('/')).'" class="top-bar__custom-btn"><span>'.esc_html__('MAKE ORDER', 'quadron').'</span></a>';
									}
								}
                            }
                        echo'</div>';
                    }

                echo'</div>
            </div>
        </header>';
        }
    }
}



/*************************************************
##  HEADER NAVIGATION ASIDE
*************************************************/

if (! function_exists('quadron_side_menu')) {
    add_action('quadron_side_menu_action', 'quadron_side_menu', 10);
    function quadron_side_menu()
    {
            echo'<div id="nav-aside">';
                echo'<a href="#" class="nav-aside__close">
                    <i class="icon"><svg><use xlink:href="#remove"></use></svg></i>';
                    if ('0' != quadron_settings('logo_visibility', '1')) {
                        if ('img' == quadron_settings('logo_type')  && '' != quadron_settings('img_logo')) {
                            echo '<img src="'.esc_url(quadron_settings('img_logo')['url']).'" alt="'.esc_attr(get_bloginfo('name')).'" class="img-fluid" />';
                        } elseif ('sitename' == quadron_settings('logo_type')) {
                            echo esc_html(get_bloginfo('name'));
                        } elseif ('customtext' == quadron_settings('logo_type')) {
                            echo esc_html(quadron_settings('text_logo'));
                        } else {
                            echo 'Quadron.';
                        }
                    }
                echo'</a>';

                echo'<div class="nav-aside__content">
                    <div id="nav-aside_menu"></div>';
                    if ('0' != quadron_settings('sidebar_menu_visibility', '0')) {
                        if ( has_nav_menu('sidebar_menu_1') ) {
                            echo'<ul class="nav-asid__list">';
                                // default wp menu
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'sidebar_menu_1',
                                        'container' => '', // menu wrapper element
                                        'container_class' => '',
                                        'container_id' => '', // default: none
                                        'menu_class' => '', // ul class
                                        'menu_id' => '', // ul id
                                        'items_wrap' => '%3$s',
                                        'before' => '', // before <a>
                                        'after' => '', // after <a>
                                        'link_before' => '', // inside <a>, before text
                                        'link_after' => '', // inside <a>, after text
                                        'depth' => 1, // '0' to display all depths
                                        'echo' => true,
                                        'fallback_cb' => 'Quadron_Wp_Bootstrap_Navwalker::fallback',
                                        'walker' => new Quadron_Wp_Bootstrap_Navwalker()
                                    )
                                );
                            echo'</ul>';
                        }

                        if(is_active_sidebar('side-menu')){
                            dynamic_sidebar('side-menu');
                        }
                    }
                echo'</div>
            </div>';
    }
}


/*************************************************
## HEADER MENU EXTRA BUTTON
*************************************************/
if (! function_exists('quadron_header_btn')) {
    function quadron_header_btn()
    {

        $target_btn = quadron_settings('nav_btn_target');
        $target_btn = $target_btn ? ' target="'.esc_attr($target_btn).'"' : '';

        if ( '' != quadron_settings('nav_btn1_title') || '' != quadron_settings('nav_btn1_title') ) {
            echo'<div class="top-bar__auth-btns">';

                if ( '' != quadron_settings('nav_btn1_title') ) {
                    echo'<a class="btn-first" href="'.quadron_settings('nav_btn1_url', esc_url(home_url('/'))).'"'.$target_btn .'>'.quadron_settings('nav_btn1_title').'</a>';
                }

                if ( '' != quadron_settings('nav_btn2_title') ) {
                    echo'<a class="btn-second custom-btn custom-btn--medium custom-btn--style-'.quadron_settings('nav_btn2_style', '3').'" href="'.quadron_settings('nav_btn2_url', esc_url(home_url('/'))).'"'.$target_btn .'>'.quadron_settings('nav_btn2_title').'</a>';
                }

            echo'</div>';
        }
    }
}


/*************************************************
## HEADER LANGUAGES
*************************************************/
if (! function_exists('quadron_header_lang')) {
    function quadron_header_lang()
    {

        if ( '0' != quadron_settings('lang_visibility') ) {

            $langs = quadron_settings('header_lang');

            if ($langs) {

                echo'<div class="top-bar__choose-lang js-choose-lang">
                    <div class="current-lang">
                        <i><img class="circled" width="25" height="25" src="'.esc_attr($langs[2]).'" alt="demo" /></i>
                        <span>'.esc_attr($langs[0]).'</span>
                    </div>

                    <div class="list-wrap">
                        <ul class="list">';

                        for ($i=0; $i < (count($langs)); $i++) {

                            $code = $langs[$i] ? $langs[$i] : '';
                            $name = $langs[$i+1] ? $langs[$i+1] : '';
                            $flag = $langs[$i+2] ? $langs[$i+2] : '#';
                            $url = $langs[$i+3] ? $langs[$i+3] : '#';

                            if($name){
                                $active = $i == 0 ? ' class="is-active"' : '';
                                echo '<li data-short-name="'.esc_attr($code).'" data-img="'.esc_attr($flag).'"'.$active.'><a href="'.esc_url($url).'"><span>'.esc_html($name).'</span></a></li>';
                            }
                            $i = $i+3;
                        }

                        echo'</ul>
                    </div>
                </div>';
            }
        }

    }
}

/*************************************************
##  HEADER NAVIGATION
*************************************************/

if (! function_exists('quadron_sidemenu')) {
    function quadron_sidemenu()
    {
        if ( is_active_sidebar('side-menu') ) {

        echo'<div id="side-menu" class="side-menu d-none">
                <span class="side-menu__button-close js-side-menu-close"></span>

                <div class="side-menu__inner">';

                    dynamic_sidebar('side-menu');

            echo'</div>
            </div>';
        }
    }
}
add_action('quadron_sidemenu_action', 'quadron_sidemenu', 10);

if (! function_exists('quadron_header_right_button')) {
    function quadron_header_right_button()
    {

        $menu_name = 'header_button';

        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

            $menu_items = wp_get_nav_menu_items($menu->term_id);

            foreach ( (array) $menu_items as $key => $menu_item ) {
                $title = $menu_item->title;
                $url = $menu_item->url;
                echo'<a href="' . $url . '" class="top-bar__custom-btn menu-item-button"><span>'.$title.'</span></a>';
                break;
            }
        } else {
            echo'<a href="'.quadron_settings('nav_btn_url').'" class="top-bar__custom-btn"><span>'.quadron_settings('nav_btn_title').'</span></a>';
        }
    }
}
