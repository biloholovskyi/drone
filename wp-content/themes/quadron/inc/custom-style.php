<?php

/*
** theme options panel and metabox settings
** will change some parts of theme via custom style
*/

function quadron_custom_css()
{

  // stop on admin pages
    if (is_admin()) {
        return false;
    }

    // Redux global
    global $quadron;

    /* CSS to output */
    $theCSS = '';

    /*************************************************
    ## PRELOADER SETTINGS
    *************************************************/

    if ('0' != quadron_settings('preloader_visibility')) {
        $pretype = quadron_settings('pre_type', '1');
        $prebg = quadron_settings('pre_bg', '#fff');
        $prebg = $prebg ? $prebg : '#fff';
        $spinclr = quadron_settings('pre_spin', '#292940');
        $spinclr = $spinclr ? $spinclr : '#292940';

        $theCSS .= 'div#nt-preloader {background-color: '. esc_attr($prebg) .';overflow: hidden;background-repeat: no-repeat;background-position: center center;height: 100%;left: 0;position: fixed;top: 0;width: 100%;z-index: 10000;}';
        $spinrgb = quadron_hex2rgb($spinclr);
        $spin_rgb = implode(", ", $spinrgb);
        if ('01' == $pretype) {
            $theCSS .= '.loader01 {width: 56px;height: 56px;border: 8px solid '. $spinclr .';border-right-color: transparent;border-radius: 50%;position: relative;animation: loader-rotate 1s linear infinite;top: 50%;margin: -28px auto 0; }.loader01::after {content: "";width: 8px;height: 8px;background: '. $spinclr .';border-radius: 50%;position: absolute;top: -1px;left: 33px; }@keyframes loader-rotate {0% {transform: rotate(0); }100% {transform: rotate(360deg); } }';
        }
        if ('02' == $pretype) {
            $theCSS .= '.loader02 {width: 56px;height: 56px;border: 8px solid rgba('. $spin_rgb .', 0.25);border-top-color: '. $spinclr .';border-radius: 50%;position: relative;animation: loader-rotate 1s linear infinite;top: 50%;margin: -28px auto 0; }@keyframes loader-rotate {0% {transform: rotate(0); }100% {transform: rotate(360deg); } }';
        }
        if ('03' == $pretype) {
            $theCSS .= '.loader03 {width: 56px;height: 56px;border: 8px solid transparent;border-top-color: '. $spinclr .';border-bottom-color: '. $spinclr .';border-radius: 50%;position: relative;animation: loader-rotate 1s linear infinite;top: 50%;margin: -28px auto 0; }@keyframes loader-rotate {0% {transform: rotate(0); }100% {transform: rotate(360deg); } }';
        }
        if ('04' == $pretype) {
            $theCSS .= '.loader04 {width: 56px;height: 56px;border: 2px solid rgba('. $spin_rgb .', 0.5);border-radius: 50%;position: relative;animation: loader-rotate 1s ease-in-out infinite;top: 50%;margin: -28px auto 0; }.loader04::after {content: "";width: 10px;height: 10px;border-radius: 50%;background: '. $spinclr .';position: absolute;top: -6px;left: 50%;margin-left: -5px; }@keyframes loader-rotate {0% {transform: rotate(0); }100% {transform: rotate(360deg); } }';
        }
        if ('05' == $pretype) {
            $theCSS .= '.loader05 {width: 56px;height: 56px;border: 4px solid '. $spinclr .';border-radius: 50%;position: relative;animation: loader-scale 1s ease-out infinite;top: 50%;margin: -28px auto 0; }@keyframes loader-scale {0% {transform: scale(0);opacity: 0; }50% {opacity: 1; }100% {transform: scale(1);opacity: 0; } }';
        }
        if ('06' == $pretype) {
            $theCSS .= '.loader06 {width: 56px;height: 56px;border: 4px solid transparent;border-radius: 50%;position: relative;top: 50%;margin: -28px auto 0; }.loader06::before {content: "";border: 4px solid rgba('. $spin_rgb .', 0.5);border-radius: 50%;width: 67.2px;height: 67.2px;position: absolute;top: -9.6px;left: -9.6px;animation: loader-scale 1s ease-out infinite;animation-delay: 1s;opacity: 0; }.loader06::after {content: "";border: 4px solid '. $spinclr .';border-radius: 50%;width: 56px;height: 56px;position: absolute;top: -4px;left: -4px;animation: loader-scale 1s ease-out infinite;animation-delay: 0.5s; }@keyframes loader-scale {0% {transform: scale(0);opacity: 0; }50% {opacity: 1; }100% {transform: scale(1);opacity: 0; } }';
        }
        if ('07' == $pretype) {
            $theCSS .= '.loader07 {width: 16px;height: 16px;border-radius: 50%;position: relative;animation: loader-circles 1s linear infinite;top: 50%;margin: -8px auto 0; }@keyframes loader-circles {0% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.05), 19px -19px 0 0 rgba('. $spin_rgb .', 0.1), 27px 0 0 0 rgba('. $spin_rgb .', 0.2), 19px 19px 0 0 rgba('. $spin_rgb .', 0.3), 0 27px 0 0 rgba('. $spin_rgb .', 0.4), -19px 19px 0 0 rgba('. $spin_rgb .', 0.6), -27px 0 0 0 rgba('. $spin_rgb .', 0.8), -19px -19px 0 0 '. $spinclr .'; }12.5% {box-shadow: 0 -27px 0 0 '. $spinclr .', 19px -19px 0 0 rgba('. $spin_rgb .', 0.05), 27px 0 0 0 rgba('. $spin_rgb .', 0.1), 19px 19px 0 0 rgba('. $spin_rgb .', 0.2), 0 27px 0 0 rgba('. $spin_rgb .', 0.3), -19px 19px 0 0 rgba('. $spin_rgb .', 0.4), -27px 0 0 0 rgba('. $spin_rgb .', 0.6), -19px -19px 0 0 rgba('. $spin_rgb .', 0.8); }25% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.8), 19px -19px 0 0 '. $spinclr .', 27px 0 0 0 rgba('. $spin_rgb .', 0.05), 19px 19px 0 0 rgba('. $spin_rgb .', 0.1), 0 27px 0 0 rgba('. $spin_rgb .', 0.2), -19px 19px 0 0 rgba('. $spin_rgb .', 0.3), -27px 0 0 0 rgba('. $spin_rgb .', 0.4), -19px -19px 0 0 rgba('. $spin_rgb .', 0.6); }37.5% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.6), 19px -19px 0 0 rgba('. $spin_rgb .', 0.8), 27px 0 0 0 '. $spinclr .', 19px 19px 0 0 rgba('. $spin_rgb .', 0.05), 0 27px 0 0 rgba('. $spin_rgb .', 0.1), -19px 19px 0 0 rgba('. $spin_rgb .', 0.2), -27px 0 0 0 rgba('. $spin_rgb .', 0.3), -19px -19px 0 0 rgba('. $spin_rgb .', 0.4); }50% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.4), 19px -19px 0 0 rgba('. $spin_rgb .', 0.6), 27px 0 0 0 rgba('. $spin_rgb .', 0.8), 19px 19px 0 0 '. $spinclr .', 0 27px 0 0 rgba('. $spin_rgb .', 0.05), -19px 19px 0 0 rgba('. $spin_rgb .', 0.1), -27px 0 0 0 rgba('. $spin_rgb .', 0.2), -19px -19px 0 0 rgba('. $spin_rgb .', 0.3); }62.5% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.3), 19px -19px 0 0 rgba('. $spin_rgb .', 0.4), 27px 0 0 0 rgba('. $spin_rgb .', 0.6), 19px 19px 0 0 rgba('. $spin_rgb .', 0.8), 0 27px 0 0 '. $spinclr .', -19px 19px 0 0 rgba('. $spin_rgb .', 0.05), -27px 0 0 0 rgba('. $spin_rgb .', 0.1), -19px -19px 0 0 rgba('. $spin_rgb .', 0.2); }75% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.2), 19px -19px 0 0 rgba('. $spin_rgb .', 0.3), 27px 0 0 0 rgba('. $spin_rgb .', 0.4), 19px 19px 0 0 rgba('. $spin_rgb .', 0.6), 0 27px 0 0 rgba('. $spin_rgb .', 0.8), -19px 19px 0 0 '. $spinclr .', -27px 0 0 0 rgba('. $spin_rgb .', 0.05), -19px -19px 0 0 rgba('. $spin_rgb .', 0.1); }87.5% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.1), 19px -19px 0 0 rgba('. $spin_rgb .', 0.2), 27px 0 0 0 rgba('. $spin_rgb .', 0.3), 19px 19px 0 0 rgba('. $spin_rgb .', 0.4), 0 27px 0 0 rgba('. $spin_rgb .', 0.6), -19px 19px 0 0 rgba('. $spin_rgb .', 0.8), -27px 0 0 0 '. $spinclr .', -19px -19px 0 0 rgba('. $spin_rgb .', 0.05); }100% {box-shadow: 0 -27px 0 0 rgba('. $spin_rgb .', 0.05), 19px -19px 0 0 rgba('. $spin_rgb .', 0.1), 27px 0 0 0 rgba('. $spin_rgb .', 0.2), 19px 19px 0 0 rgba('. $spin_rgb .', 0.3), 0 27px 0 0 rgba('. $spin_rgb .', 0.4), -19px 19px 0 0 rgba('. $spin_rgb .', 0.6), -27px 0 0 0 rgba('. $spin_rgb .', 0.8), -19px -19px 0 0 '. $spinclr .'; } }';
        }
        if ('08' == $pretype) {
            $theCSS .= '.loader08 {width: 20px;height: 20px;position: relative;animation: loader08 1s ease infinite;top: 50%;margin: -46px auto 0; }@keyframes loader08 {0%, 100% {box-shadow: -13px 20px 0 '. $spinclr .', 13px 20px 0 rgba('. $spin_rgb .', 0.2), 13px 46px 0 rgba('. $spin_rgb .', 0.2), -13px 46px 0 rgba('. $spin_rgb .', 0.2); }25% {box-shadow: -13px 20px 0 rgba('. $spin_rgb .', 0.2), 13px 20px 0 '. $spinclr .', 13px 46px 0 rgba('. $spin_rgb .', 0.2), -13px 46px 0 rgba('. $spin_rgb .', 0.2); }50% {box-shadow: -13px 20px 0 rgba('. $spin_rgb .', 0.2), 13px 20px 0 rgba('. $spin_rgb .', 0.2), 13px 46px 0 '. $spinclr .', -13px 46px 0 rgba('. $spin_rgb .', 0.2); }75% {box-shadow: -13px 20px 0 rgba('. $spin_rgb .', 0.2), 13px 20px 0 rgba('. $spin_rgb .', 0.2), 13px 46px 0 rgba('. $spin_rgb .', 0.2), -13px 46px 0 '. $spinclr .'; } }';
        }
        if ('09' == $pretype) {
            $theCSS .= '.loader09 {width: 10px;height: 48px;background: '. $spinclr .';position: relative;animation: loader09 1s ease-in-out infinite;animation-delay: 0.4s;top: 50%;margin: -28px auto 0; }.loader09::after, .loader09::before {content:  "";position: absolute;width: 10px;height: 48px;background: '. $spinclr .';animation: loader09 1s ease-in-out infinite; }.loader09::before {right: 18px;animation-delay: 0.2s; }.loader09::after {left: 18px;animation-delay: 0.6s; }@keyframes loader09 {0%, 100% {box-shadow: 0 0 0 '. $spinclr .', 0 0 0 '. $spinclr .'; }50% {box-shadow: 0 -8px 0 '. $spinclr .', 0 8px 0 '. $spinclr .'; } }';
        }
        if ('10' == $pretype) {
            $theCSS .= '.loader10 {width: 28px;height: 28px;border-radius: 50%;position: relative;animation: loader10 0.9s ease alternate infinite;animation-delay: 0.36s;top: 50%;margin: -42px auto 0; }.loader10::after, .loader10::before {content: "";position: absolute;width: 28px;height: 28px;border-radius: 50%;animation: loader10 0.9s ease alternate infinite; }.loader10::before {left: -40px;animation-delay: 0.18s; }.loader10::after {right: -40px;animation-delay: 0.54s; }@keyframes loader10 {0% {box-shadow: 0 28px 0 -28px '. $spinclr .'; }100% {box-shadow: 0 28px 0 '. $spinclr .'; } }';
        }
        if ('11' == $pretype) {
            $theCSS .= '.loader11 {width: 20px;height: 20px;border-radius: 50%;box-shadow: 0 40px 0 '. $spinclr .';position: relative;animation: loader11 0.8s ease-in-out alternate infinite;animation-delay: 0.32s;top: 50%;margin: -50px auto 0; }.loader11::after, .loader11::before {content:  "";position: absolute;width: 20px;height: 20px;border-radius: 50%;box-shadow: 0 40px 0 '. $spinclr .';animation: loader11 0.8s ease-in-out alternate infinite; }.loader11::before {left: -30px;animation-delay: 0.48s;}.loader11::after {right: -30px;animation-delay: 0.16s; }@keyframes loader11 {0% {box-shadow: 0 40px 0 '. $spinclr .'; }100% {box-shadow: 0 20px 0 '. $spinclr .'; } }';
        }
        if ('12' == $pretype) {
            $theCSS .= '.loader12 {width: 20px;height: 20px;border-radius: 50%;position: relative;animation: loader12 1s linear alternate infinite;top: 50%;margin: -50px auto 0; }@keyframes loader12 {0% {box-shadow: -60px 40px 0 2px '. $spinclr .', -30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 0 40px 0 0 rgba('. $spin_rgb .', 0.2), 30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 60px 40px 0 0 rgba('. $spin_rgb .', 0.2); }25% {box-shadow: -60px 40px 0 0 rgba('. $spin_rgb .', 0.2), -30px 40px 0 2px '. $spinclr .', 0 40px 0 0 rgba('. $spin_rgb .', 0.2), 30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 60px 40px 0 0 rgba('. $spin_rgb .', 0.2); }50% {box-shadow: -60px 40px 0 0 rgba('. $spin_rgb .', 0.2), -30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 0 40px 0 2px '. $spinclr .', 30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 60px 40px 0 0 rgba('. $spin_rgb .', 0.2); }75% {box-shadow: -60px 40px 0 0 rgba('. $spin_rgb .', 0.2), -30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 0 40px 0 0 rgba('. $spin_rgb .', 0.2), 30px 40px 0 2px '. $spinclr .', 60px 40px 0 0 rgba('. $spin_rgb .', 0.2); }100% {box-shadow: -60px 40px 0 0 rgba('. $spin_rgb .', 0.2), -30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 0 40px 0 0 rgba('. $spin_rgb .', 0.2), 30px 40px 0 0 rgba('. $spin_rgb .', 0.2), 60px 40px 0 2px '. $spinclr .'; } }';
        }
    }

    /*************************************************
    ## THEME COLORS
    *************************************************/
    $tmclr = quadron_settings('theme_main_color');
    if( $tmclr ) {
        $tm_rgb = quadron_hex2rgb($tmclr);
        $tm_rgb = implode(", ", $tm_rgb);
        if( $tmclr != '#ffffff' ) {
            $theCSS .= '.product-categories li.current-cat a,
            .product-categories li:not(.current-cat):first-child a,
            .product-categories li.current-cat span,
            .product-categories li:not(.current-cat):first-child span,
            body.woocommerce .carousel-products .product__btn a.add_to_cart_button.button:hover
            {
                color:#fff!important;
            }
            .subpage-header__caption
            {
                color: #fdfdfd;
            }';
        }
        $theCSS .= '
        .nt-breadcrumbs .nt-breadcrumbs-list li,
        a,
        .nt-sidebar-inner-widget a,
        .first-letter,
        .extra-large-text,
        .section-heading .description,
        .btn:hover,
        .btn-link-icon,
        .btn-link-icon:hover,
        .btn-link-icon.btn-color-01:hover .btn__icon,
        .btn-link-icon.btn-color-02:hover .btn__icon,
        .btn.btn-color-01,
        .btn-border,
        .btn-border.btn-color-01:hover:not(.no-hover),
        .link-default,
        .list-icon__title,
        .list-number li:before,
        .list-01 li a,
        .table-description .item .col-img a:hover,
        .table-description .item .col-img a:hover .table-description__title,
        .element-list .btn-link-icon.hover.btn-color-02 .btn__icon,
        .element-list .btn.hover,
        .base-color-01,
        .layout-color-01 .btn-link-icon:hover .btn__icon,
        #top-bar__navigation-toggler:hover,
        #nav-aside .btn-custom,
        #top-bar__navigation>ul>li>a:hover,
        #top-bar__navigation>ul>li .is-hover,
        #top-bar__navigation>ul>li.active>a,
        #footer .newsletter-01 .form-group button,
        .list-menu_item a .list-menu__icon,
        .list-menu_item a .list-menu__value,
        .list-menu_item a:hover .list-menu__title,
        .promo-cart__icon svg,
        .promo-cart__list li .icon,
        .promo-cart__price,
        .box-counter__title,
        .infobox01__value,
        .page-nav__btn,
        .page-nav__list li a:hover,
        .page-nav__list li.active a,
        .page-nav-img__btn:hover .btn__icon,
        .videoblock:hover .videoblock__title,
        .team-item:hover .team-item__title,
        .blockquote-box__description,
        .layout-external-box .col-nav-slider:hover .btn__icon,
        .social-icon-wrapper .social-icon li a,
        .box01:hover .box01__title,
        .accordeon__title:hover,
        .contact-info__description address strong,
        .social-icon-wrapper .social-icon li a,
        .list-newitem .newitem-item__data,
        .list-newitem .newitem-item__title a:hover,
        .box02__data,
        .box02__title a:hover,
        .box02__link,
        .masonry-layout-01 .item:hover .item__title,
        .mainSlider .slide .slide-content .slide-price,
        .mainSlider .slide .slide-content .slide-layout-01 .slide-subtitle,
        .mainSlider.slick-nav-03 .slick-dots li.slick-active span,
        .mainSlider-box03 .list-icon li .list-icon__icon,
        .slick-arrow-extraleft .slick-arrow,
        .slick-arrow-extraright .slick-arrow,
        .slick-arrow-external .slick-arrow,
        .wrapper-arrow-center .slick-slick-arrow .slick-arrow:hover,
        .wrapper-arrow-left .slick-slick-arrow .slick-arrow:hover,
        .wrapper-arrow-right .slick-slick-arrow .slick-arrow:hover,
        .slick-arrow-position-left .slick-slick-arrow .slick-arrow,
        .checkbox-group02 label,
        .checkbox-group02:hover label,
        .select-custom-01.nice-select .list:hover .option:hover,
        .post .post-col-date .post__date .number,
        .post .post-col-description .post__description .post__title a:hover,
        .posts-feedback .comments__item .custom-btn,
        .boxrecent__title a:hover,
        .boxrecent__data,
        .collapse-aside__title:hover,
        .product-single__price ,
        .product-single .product-single__info span,
        .rating.rating__color02 .star,
        .rating .total,
        .counter-item .counter-btn:hover,
        .counter-item02 .counter-btn:hover,
        .shopcart__table .shopcart__item .item_title a:hover,
        .shopcart__table .shopcart__item .item_price,
        .shopcart__table .shopcart__item .custom-btn,
        .shopcart-cupon .custom-btn,
        .shopcart__total .item table td:last-child,
        .shopcheckout-product .item .item-col-description .item-description .shopcheckout-product__title a:hover,
        .shopcheckout__total table tr td:last-child,
        .product__price span,
        .product__title a:hover,
        .nav-tabs-dafault .nav-tabs .nav-item a:hover,
        .nav-tabs-dafault .nav-tabs .nav-item a:hover,
        .nav-tabs-dafault .nav-tabs .nav-item a.active,
        .btn-scroll-top:hover,
        .galley-masonry .filter-nav .button.active,
        .galley-masonry .filter-nav .button:hover,
        #nt-sidebar .product-categories li a,
        #nt-sidebar .product-categories li span,
        body.woocommerce span.woocommerce-Price-amount.amount,
        body.woocommerce a.button.product_type_variable,
        body.woocommerce a.button.product_type_external,
        body.woocommerce .catalog-listing .product__btn a.add_to_cart_button.button,
        body.woocommerce .carousel-products .product__btn a.add_to_cart_button.button,
        body.woocommerce .catalog-listing .product__btn .button.product_type_external,
        body.woocommerce #respond input#submit.btn:hover,
        body.woocommerce .widget_price_filter .price_slider_amount .button:hover,
        body.woocommerce .widget_product_search .btn:hover,
        body .nt-sidebar-inner-widget .wpfFilterButton.wpfButton:hover,
        .related-section.wrapper-arrow-center .slick-slick-arrow .slick-arrow
        {
            color: '. esc_attr($tmclr) .';
        }
        #price-slider .nstSlider .rightGrip,
        #price-slider .nstSlider .leftGrip,
        .btn,
        .btn-link-icon:hover .btn__icon,
        .btn-link-icon.btn-color-02 .btn__icon,
        .btn-border:hover,
        .link-icon-video:hover .icon-video:before,
        .link-icon-video.color-reverse .icon-video:before,
        .list-border li a:hover,
        .element-list .input-active .form-control,
        .page-nav__btn:hover .btn__icon,
        .videoblock__icon:after,
        .award .award__img img,
        .blockquote-box,
        .social-icon-wrapper .social-icon li a:hover,
        .videolink__icon:after,
        .contact-info__item:nth-child(odd),
        .contact-info__item:nth-child(even),
        .social-icon-wrapper .social-icon li a:hover,
        .presentation-projects .col-link .link-video:hover .btn__icon,
        .mainSlider .slide .slide-content .slide-layout-01 .slide-subtitle,
        .slick-arrow-center .slick-arrow:hover,
        .slick-arrow-external .slick-arrow:hover,
        .slick-arrow-position-left .slick-slick-arrow .slick-arrow:hover,
        .form-default .form-control:focus,
        .checkbox-group label .box,
        .checkbox-group02 label .box,
        .select-custom-01.nice-select:after,
        .select-custom-02.nice-select:after,
        .collapse-aside__title:after,
        .list-color-switcher li a:hover,
        body.woocommerce .catalog-listing .product__btn a.add_to_cart_button.button:hover,
        body.woocommerce .carousel-products .product__btn a.add_to_cart_button.button:hover,
        body.woocommerce .woocommerce-message .button.wc-forward:hover,
        body.woocommerce .catalog-listing .product__btn a.button.product_type_external:hover,
        body.woocommerce a.button.product_type_variable:hover,
        body.woocommerce a.button.product_type_external:hover,
        body.woocommerce #respond input#submit.btn:hover,
        .nt-pagination.-style-outline .nt-pagination-item.active .nt-pagination-link,
        body.woocommerce .filters-options__sort .nice-select:after,
        .related-section.wrapper-arrow-center .slick-slick-arrow .slick-arrow
        {
            border-color: '. esc_attr($tmclr) .';
        }
		.videolink .videolink__icon:after
		{
			border-left-color: '. esc_attr($tmclr) .';
		}
        #top-bar__navigation>ul>li.is-submenu>a span:after
        {
            border-top-color: '. esc_attr($tmclr) .';
        }
        body.woocommerce a.button.product_type_variable,
        body.woocommerce a.button.product_type_external,
        body.woocommerce .catalog-listing .product__btn a.add_to_cart_button.button,
        body.woocommerce .carousel-products .product__btn a.add_to_cart_button.button,
        body.woocommerce .catalog-listing .product__btn .button.product_type_external
        body.woocommerce a.button.product_type_variable:hover,
        body.woocommerce a.button.product_type_external:hover,
        body.woocommerce .catalog-listing .product__btn a.add_to_cart_button.button:hover,
        body.woocommerce .carousel-products .product__btn a.add_to_cart_button.button:hover,
        body.woocommerce .catalog-listing .product__btn .button.product_type_external:hover
        {
            border-color: rgba('. esc_attr($tm_rgb) .', 0.5);
        }
        #price-slider .nstSlider .bar,
        mark,
        .section-heading .description i,
        .section-heading.size-md .description i,
        .section-heading.size-sm .description i,
        .btn,
        .btn-link-icon:hover .btn__icon,
        .btn-link-icon.btn-color-02 .btn__icon,
        .btn-border:hover,
        .link-default:before,
        .link-icon-video:hover .icon-video:before,
        .link-icon-video.color-reverse .icon-video:before,
        .link-icon-video02 .icon-video i,
        .list-marker li:before,
        .list-01 li a span:before,
        .list-border li a:hover,
        .wrapper-box01,
        .extra-block01:before,
        .extra-block02:before,
        .element-list .btn-link-icon.hover .btn__icon,
        #nav-aside,
        #top-bar__navigation>ul>li>a span:before,
        #top-bar__navigation>ul>li ul li a:before,
        .top-bar__custom-btn:before,
        .btn-cart__badge,
        #footer .newsletter-01 .form-group button:hover,
        .section--bg-wrapper-04,
        .section--bg-03,
        .bg-base,
        .list-menu_item a .list-menu__icon:before,
        .promobox-slider,
        .promobox02:before,
        .promobox02 figcaption:before,
        .promo-cart:hover,
        .promobox03:hover .promobox03__description .promobox03__layout,
        .subpage-header__block:before,
        .page-nav__btn:hover .btn__icon,
        .award .award__title:before,
        .layout-external-box .col-nav-slider,
        .social-icon-wrapper .social-icon li a:hover,
        .box-table-01,
        .accordeon__title:before,
        .accordeon__title:after,
        .layout404,
        .social-icon-wrapper .social-icon li a:hover,
        .box02__link:before,
        .custom-layout04:before,
        .masonry-layout-01 .item:before,
        .masonry-layout-01 .item__title:before,
        .presentation-projects .col-link .link-video:hover .btn__icon,
        .mainSlider.slick-dots-01 .slick-dots li.slick-active span,
        .mainSlider.slick-nav-03 .slick-dots li span:before,
        .slick-arrow-extraleft .slick-arrow:hover,
        .slick-arrow-extraright .slick-arrow:hover,
        .slick-arrow-center .slick-arrow:hover,
        .slick-arrow-external .slick-arrow:hover,
        .slick-arrow-position-left .slick-slick-arrow .slick-arrow:hover,
        .checkbox-group label .check,
        .checkbox-group02 label .check,
        .posts-feedback .comments__item .custom-btn span:before,
        .menu-aside li.active a,
        .list-color-switcher li.active a.color-bg-01:before,
        .color-bg-04,
        .slider-product .img-small .item a:before,
        .shopcart__table .shopcart__item .custom-btn:hover,
        .shopcart-cupon .shopcart-cupon__col-form .btn-custom,
        .shopcart-cupon .custom-btn:hover,
        .nav-tabs-dafault .nav-tabs .nav-item a.active:before,
        .btn-scroll-down i,
        #nt-sidebar .product-categories li.current-cat,
        #nt-sidebar .product-categories li:not(.current-cat):first-child,
        body.woocommerce .catalog-listing .product__btn a.add_to_cart_button.button:hover,
        body.woocommerce .carousel-products .product__btn a.add_to_cart_button.button:hover,
        body.woocommerce .woocommerce-message .button.wc-forward:hover,
        body.woocommerce .catalog-listing .product__btn a.button.product_type_external:hover,
        body.woocommerce a.button.product_type_variable:hover,
        body.woocommerce a.button.product_type_external:hover,
        body.woocommerce #respond input#submit.btn,
        .nt-pagination.-style-outline .nt-pagination-item.active .nt-pagination-link,
        .nt-sidebar-inner-widget:not(.nt-shop-widget) ul:not(.children) li a:before,
        .related-section.wrapper-arrow-center .slick-slick-arrow .slick-arrow:hover,
        .btn.btn-color-01:hover
        {
            background-color: '. esc_attr($tmclr) .';
        }
        @media (min-width: 1025px) {
            .custom-layout04 .caruser-custom-wrapper .slick-dots li span:before {
                background-color: '. esc_attr($tmclr) .';
            }
            .custom-layout04 .caruser-custom-wrapper .slick-dots li.slick-active span {
                color: '. esc_attr($tmclr) .';
            }
        }
        .carusel-external-box:before
        {
            background-color: rgba('. esc_attr($tm_rgb) .', 0.9);
        }
        .promobox02:before,
        .videoblock__img:before,
        .team-item__img:before,
        .tt-portfolio-content figure figcaption
        {
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(46, 49, 146, 0)), color-stop(90%, '. esc_attr($tmclr) .'));
            background: linear-gradient(to bottom, rgba(46, 49, 146, 0), '. esc_attr($tmclr) .' 90%);
        }
        .section-heading .icon svg,
        .btn-cart:hover .btn-cart__icon,
        .list-menu_item a .list-menu__icon svg,
        .listicon-col__icon,
        .promo-cart__icon svg,
        .promo-cart__list li .icon,
        .box01__icon
         {
            fill: '. esc_attr($tmclr) .';
        }';
    }

    // use page/post ID for page settings
    $page_id = get_the_ID();

    /*************************************************
    ## THEME PAGINATION
    *************************************************/
    // pagination color
    $pag_clr = quadron_settings('pag_clr');
    // pagination active and hover color
    $pag_hvrclr = quadron_settings('pag_hvrclr');
    // pagination number color
    $pag_nclr = quadron_settings('pag_nclr');
    // pagination active and hover color
    $pag_hvrnclr = quadron_settings('pag_hvrnclr');
    $nav_brd_btm = quadron_settings('nav_brd_btm');

    // pagination color
    if ($pag_clr) {
        $theCSS .= '
        .nt-pagination.-style-outline .nt-pagination-item .nt-pagination-link { border-color: '. esc_attr($pag_clr) .'; }
        .nt-pagination.-style-default .nt-pagination-link { background-color: '. esc_attr($pag_clr) .';
        }';
    }

    // pagination active and hover color
    if ($pag_hvrclr) {
        $theCSS .= '
        .nt-pagination.-style-outline .nt-pagination-item.active .nt-pagination-link,
        .nt-pagination.-style-outline .nt-pagination-item .nt-pagination-link:hover { border-color: '. esc_attr($pag_hvrclr) .'; }
        .nt-pagination.-style-default .nt-pagination-item.active .nt-pagination-link,
        .nt-pagination.-style-default .nt-pagination-item .nt-pagination-link:hover { background-color: '. esc_attr($pag_hvrclr) .';
        }';
    }

    // pagination number color
    if ($pag_nclr) {
        $theCSS .= '
        .nt-pagination.-style-outline .nt-pagination-item .nt-pagination-link,
        .nt-pagination.-style-default .nt-pagination-link { color: '. esc_attr($pag_nclr) .';
        }';
    }

    // pagination active and hover color
    if ($pag_hvrnclr) {
        $theCSS .= '
        .nt-pagination.-style-outline .nt-pagination-item.active .nt-pagination-link,
        .nt-pagination.-style-outline .nt-pagination-item .nt-pagination-link:hover,
        .nt-pagination.-style-default .nt-pagination-item.active .nt-pagination-link,
        .nt-pagination.-style-default .nt-pagination-item .nt-pagination-link:hover { color: '. esc_attr($pag_hvrnclr) .';
        }';
    }
    // pagination active and hover color
    if ($nav_brd_btm) {
        $theCSS .= '#top-bar {
            border-bottom-color: '.esc_attr($nav_brd_btm).';
        }';
    }

    $quadron_error_bg = quadron_settings('error_content_bg_img');
    $quadron_error_bg = '' != isset( $quadron_error_bg['background-image']) ? isset( $quadron_error_bg['background-image'] ) : get_template_directory_uri(). '/images/layout404_bg.jpg';
    $theCSS .= '.layout404 { background-image: url('.$quadron_error_bg.'); }';


    /*************************************************
    ## PAGE METABOX SETTINGS
    *************************************************/

    if (is_page() && class_exists('ACF')) {

        $h_all = get_field('quadron_page_hero_customize');
        if (!empty( $h_all ) ) {
            $h_t_clr   = $h_all["quadron_page_hero_text_customize"]["quadron_page_title_color"];
            $h_st_clr  = $h_all["quadron_page_hero_text_customize"]["quadron_page_subtitle_color"];
            $h_t_bgclr = $h_all["quadron_page_hero_text_customize"]["quadron_page_title_bg_color"];
            if ($h_t_clr)   { $theCSS .= '.page-id-'.$page_id.' .subpage-header__caption { color: '.$h_t_clr.'; }'; }
            if ($h_st_clr)  { $theCSS .= '.page-id-'.$page_id.' .subpage-header__caption { color: '.$h_st_clr.'; }'; }
            if ($h_t_bgclr) { $theCSS .= '.page-id-'.$page_id.' .subpage-header__block:before { background-color: '.$h_t_bgclr.'; }'; }

            $h_h     = $h_all["quadron_page_hero_background_customize"]["quadron_page_hero_height"];
            $h_sm_h  = $h_all["quadron_page_hero_background_customize"]["quadron_page_hero_sm_height"];
            $h_xs_h  = $h_all["quadron_page_hero_background_customize"]["quadron_page_hero_xs_height"];
            $h_bgclr = $h_all["quadron_page_hero_background_customize"]["quadron_page_hero_bg_color"];
            if ($h_bgclr) { $theCSS .= '#nt-hero.subpage-header__bg, .subpage-header__bg { background-color: '.$h_bgclr.'; }'; }
            if ($h_xs_h)  { $theCSS .= '{.page-'.$page_id.', .page-'.$page_id.' .subpage-header__bg { height: '.$h_xs_h.'px; }'; }
            if ($h_sm_h)  { $theCSS .= '@media (min-width: 576px) { .page-'.$page_id.', .page-'.$page_id.' .subpage-header__bg { height: '.$h_sm_h.'px; } }'; }
            if ($h_h)     { $theCSS .= '@media (min-width: 1025px) { .page-'.$page_id.', .page-'.$page_id.' .subpage-header__bg { height: '.$h_h.'px; } }'; }
        }
    } // end if is_page

    /* Add CSS to style.css */
    wp_register_style('quadron-custom-style', false);
    wp_enqueue_style('quadron-custom-style');
    wp_add_inline_style('quadron-custom-style', $theCSS);
}

add_action('wp_enqueue_scripts', 'quadron_custom_css');


// customization on admin pages
function quadron_admin_custom_css()
{
    if (! is_admin()) {
        return false;
    }

    /* CSS to output */
    $theCSS = '';

    $theCSS .= '
    #setting-error-tgmpa, #setting-error-quadron {
        display: block !important;
    }
    .updated.vc_license-activation-notice {
        display:none;
    }
    .redux_field_th {
        color: #191919;
        font-weight: 700;
    }
    .redux-main .description {
        display: block;
        font-weight: normal;
    }
    #redux-header .rAds {
        opacity: 0 !important;
        display: none !important;
        visibility : hidden;
    }
	#customize-controls img {
		max-width: 75%;
	}
  '; // end $theCSS

    /* Add CSS to style.css */
    wp_register_style('quadron-admin-custom-style', false);
    wp_enqueue_style('quadron-admin-custom-style');
    wp_add_inline_style('quadron-admin-custom-style', $theCSS);
}
add_action('admin_enqueue_scripts', 'quadron_admin_custom_css');
