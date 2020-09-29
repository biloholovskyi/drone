/* NT Addons for Elementor v1.0 */

!(function ($) {
    
    function setOwlCarousel($scope, $) {
        var owl_objects = $scope.find('.owl-carousel');
        if ( owl_objects.length ) {
            owl_objects.each( function () {
                var owl_object = $( this );
                if ( owl_object.hasClass( "-js-carousel" ) ) {
                    var owl_options = owl_object.data();
                    owl_object.owlCarousel( {
                        items: owl_options.owlItems, // Default: 3
                        loop: owl_options.owlLoop,  // Default: false
                        center: owl_options.owlCenter,  // Default: false
                        rewind: owl_options.owlRewind,  // Default: false
                        mouseDrag: owl_options.owlMousedrag,  // Default: tru
                        touchDrag: owl_options.owlTouchdrag,  // Default: tru
                        pullDrag: owl_options.owlPulldrag,  // Default: tru
                        freeDrag: owl_options.owlFreedrag,  // Default: fals
                        margin: owl_options.owlMargin,  // Default: 
                        stagePadding: owl_options.owlStagepadding,  // Default: 
                        merge: owl_options.owlMerge,  // Default: fals
                        mergeFit: owl_options.owlMergefit,  // Default: tru
                        autoWidth: owl_options.owlAutowidth,  // Default: fals
                        startPosition: owl_options.owlStartposition,  // Default: 
                        rtl: owl_options.owlRtl,  // Default: false
                        smartSpeed: owl_options.owlSmartspeed,  // Default: 250
                        fluidSpeed: owl_options.owlFluidspeed,  // Default: false
                        dragEndSpeed: owl_options.owlDragendspeed,  // Default: false
                        responsive: owl_options.owlResponsive,  // Default: {}
                        responsiveRefreshRate: owl_options.owlResponsiverefreshrate,  // Default: 200
                        responsiveBaseElement: owl_options.owlResponsivebaseelement,  // Default: window
                        fallbackEasing: owl_options.owlFallbackeasing,  // Default: "swing"
                        info: owl_options.owlInfo,  // Default: false
                        nestedItemSelector: owl_options.owlNesteditemselector,  // Default: false
                        itemElement: owl_options.owlItemelement,  // Default: "div"
                        stageElement: owl_options.owlStageelement,  // Default: "div"
                        refreshClass: owl_options.owlRefreshclass,  // Default: "owl-refresh"
                        loadedClass: owl_options.owlLoadedclass,  // Default: "owl-loaded"
                        loadingClass: owl_options.owlLoadingclass,  // Default: "owl-loading"
                        rtlClass: owl_options.owlRtlclass,  // Default: "owl-rtl"
                        responsiveClass: owl_options.owlResponsiveclass,  // Default: "owl-responsive"
                        dragClass: owl_options.owlDragclass,  // Default: "owl-drag"
                        itemClass: owl_options.owlItemclass,  // Default: "owl-item"
                        stageClass: owl_options.owlStageclass,  // Default: "owl-stage"
                        stageOuterClass: owl_options.owlStageouterclass,  // Default: "owl-stage-outer"
                        grabClass: owl_options.owlGrabclass,  // Default: "owl-grab"
                        autoRefresh: owl_options.owlAutorefresh, // Default: true
                        autoRefreshInterval: owl_options.owlAutorefreshinterval, // Default: 500
                        lazyLoad: owl_options.owlLazyload, // Default: false
                        autoHeight: owl_options.owlAutoheight, // Default: false
                        autoHeightClass: owl_options.owlAutoheightclass, // Default: "owl-height"
                        video: owl_options.owlVideo, // Default: false
                        videoHeight: owl_options.owlVideoheight, // Default: false
                        videoWidth: owl_options.owlVideowidth, // Default: false
                        animateOut: owl_options.owlAnimateout, // Default: false
                        animateIn: owl_options.owlAnimatein, // Default: false
                        autoplay: owl_options.owlAutoplay, // Default: false
                        autoplayTimeout: owl_options.owlAutoplaytimeout, // Default: 5000
                        autoplayHoverPause: owl_options.owlAutoplayhoverpause, // Default: false
                        autoplaySpeed: owl_options.owlAutoplayspeed, // Default: false
                        nav: owl_options.owlNav, // Default: false
                        navText: owl_options.owlNavtext, // Default: ["prev","next"]
                        navSpeed: owl_options.owlNavspeed, // Default: false
                        navElement: owl_options.owlNavelement, // Default: "div"
                        navContainer: owl_options.owlNavcontainer, // Default: false
                        navContainerClass: owl_options.owlNavcontainerclass, // Default: "owl-nav"
                        navClass: owl_options.owlNavclass, // Default: [ 'owl-prev', 'owl-next' ]
                        slideBy: owl_options.owlSlideby, // Default: 1
                        dotClass: owl_options.owlDotclass, // Default: "owl-dot"
                        dotsClass: owl_options.owlDotsclass, // Default: "owl-dots"
                        dots: owl_options.owlDots, // Default: true
                        dotsEach: owl_options.owlDotseach, // Default: false
                        dotsData: owl_options.owlDotsdata, // Default: false
                        dotsSpeed: owl_options.owlDotsspeed, // Default: false
                        dotsContainer: owl_options.owlDotscontainer, // Default: false
                        URLhashListener: owl_options.owlUrlhashlistener, // Default: false
                    });
                }
            });
        }
    }
    
    function responsiveJarallax(android, ios) {
        switch (true || 1) {
            case android && ios:
                return /iPad|iPhone|iPod|Android/;
                break;
            case android && !ios:
                return /Android/;
                break;
            case !android && ios:
                return /iPad|iPhone|iPod/;
                break;
            case !android && !ios:
                return null;
        }
    }
    
    function jarallaxElement($scope, $) {
        $scope.find('.jarallax').each(function () {
            var $this = $( this ),
                j_type = $this.data('type'),
                j_speed = $this.data('speed'),
                j_imgsize = $this.data('img-size'),
                j_android = $this.data('android'),
                j_ios = $this.data('ios');
                
            $this.jarallax({
                type: j_type,
                speed: parseInt(j_speed),
                imgSize: j_imgsize,
                //keepImg: true,
                disableParallax: responsiveJarallax(
                    1 == j_android,
                    1 == j_ios
                )
            });
        });
    }
    // teamFilterable
    function teamFilterable($scope, $) {
        $scope.find('#team_grid').each(function () {
            var $this      = $( this ),
                $teamClone = $this.clone();
                
            $(".filter a").click(function(e){
                $(".filter li").removeClass("current");
                var $filterClass = $(this).parent().attr("class");
                if ($filterClass == "all") {
                    var $filteredTeam = $teamClone.find("li");
                } else {
                    var $filteredTeam = $teamClone.find("li[data-type~="+$filterClass+"]");
                }
                $this.quicksand( $filteredTeam, {
                    easing: "easeOutSine",
                    adjustHeight: "dynamic",
                    duration: 500,
                    useScaling: true
                });
                $(this).parent().addClass("current");
                e.preventDefault();
            });
        });
    }
    // Home Slider
    function slickCarousel($scope, $) {
        $scope.find('.mainSlider').each(function () {
            var mainslider = $( this );
            dataBg('[data-bg]');
            function dataBg(el){
                $(el).each(function(){
                    var $this = $(this),
                    bg = $this.attr('data-bg');
                    $this.css({
                        'background-image': 'url(' + bg + ')'
                    });
                });
            };
            var $obj = mainslider;
            $obj.find('.slide').first().imagesLoaded({
                background: true
            }, function(){
                setTimeout(function(){
                    $obj.parent().find('.loading-content').addClass('disable');
            }, 100);
            });
            $obj.on('init', function (e, slick){
                var $firstAnimatingElements = $('div.slide:first-child').find('[data-animation]');
                runAnimation($firstAnimatingElements);
            });
            $obj.on('beforeChange', function (e, slick, currentSlide, nextSlide){
                var $currentSlide = $('div.slide[data-slick-index="' + nextSlide + '"]');
                var $animatingElements = $currentSlide.find('[data-animation]');
                runAnimation($animatingElements);
            });
            var dataArrow = $obj.data('arrow'),
            dataDots = $obj.data('dots');
            
            $obj.not('.slick-initialized').slick({
                arrows: dataArrow || false,
                dots: dataDots || false,
                autoplay: false,
                autoplaySpeed: 5500,
                fade: true,
                speed: 1000,
                pauseOnHover: false,
                pauseOnDotsHover: true,
                customPaging: function (slider, i) {
                    return '<span>' + '0' + (i + 1) + '</span>';
                }
            });
            function runAnimation(elements){
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function(){
                    var $this = $(this),
                    $animationType = 'animated ' + $this.data('animation'),
                    $animationDelay = $this.data('animation-delay');
                    $this.css({
                        'animation-delay': $animationDelay,
                        '-webkit-animation-delay': $animationDelay
                    });
                    $this.addClass($animationType).one(animationEndEvents, function(){
                    $this.removeClass($animationType);
                    });
                    if ($this.hasClass('animate')){
                        $this.removeClass('animation');
                    }
                });
            };
            var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], object, embed"),
            $fluidEl = $("figure");
            $allVideos.each(function() {
                $(this)
                // jQuery .data does not work on object/embed elements
                .attr('data-aspectRatio', this.height / this.width)
                .removeAttr('height')
                .removeAttr('width');
            });
            $(window).resize(function() {
                var newWidth = $fluidEl.width();
                $allVideos.each(function() {
                var $el = $(this);
                $el
                .width(newWidth)
                .height(newWidth * $el.attr('data-aspectRatio'));
                });
            }).resize();
        });
    }
    // Video 1 Carousel
    function slickVideoCarousel($scope, $) {
        $scope.find('.js-carusel-external-box').each(function () {
            var $sliderInit = $( this ),
                $sliderArrow = $('.layout-external-box .col-nav-slider');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            });
            if ($sliderArrow.length){
                $sliderArrow.on('click', function(){
                    $sliderInit.slick('slickNext');
                });
            }
        });
    }
    // Video 2 Carousel
    function slickVideoCarousel2($scope, $) {
        $scope.find('.video-slider-two .js-presentation-projects').each(function () {
            var $sliderInit = $( this ),
                $slickArrowExtraLeft = $('.video-slider-two .presentation-projects .slick-slick-arrow'),
                $sliderArrowLeft = $slickArrowExtraLeft.find('.slick-prev'),
                $sliderArrowRight = $slickArrowExtraLeft.find('.slick-next');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true
            });
            function contentСentering(){
                setTimeout(function(){
                    var $imgHeight = $sliderInit.find('picture img').height();
                    $('.col-link-wrapper').height($imgHeight);
                }, 310);
            };
            contentСentering();
            $(window).resize(function(e){
                contentСentering();
            });
            if ($sliderArrowRight.length && $sliderArrowLeft.length){
                $sliderArrowRight.on('click', function(){
                    $sliderInit.slick('slickNext');
                });
                $sliderArrowLeft.on('click', function(){
                    $sliderInit.slick('slickPrev');
                });
            }
        });
    }
    // Video 3 Carousel
    function slickVideoCarousel3($scope, $) {
        $scope.find('.video-slider-three .js-caruser-custom').each(function () {
            var $sliderInit = $( this );
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: true,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 2,
                slidesToScroll: 1,
                adaptiveHeight: true,
                customPaging: function (slider, i) {
                    return '<span>' + '0' + (i + 1) + '</span>';
                },
                responsive: [
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });
    }
    // Blog Post Carousel
    function slickBlogCarousel($scope, $) {
        $scope.find('.js-carusel-news').each(function () {
            var $sliderInit = $( this ),
                $slickArrow = $sliderInit.closest('.section-blog').find('.slick-arrow-extraright'),
                $sliderArrowLeft = $slickArrow.find('.slick-prev'),
                $sliderArrowRight = $slickArrow.find('.slick-next');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 790,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
            if ($sliderArrowRight.length && $sliderArrowLeft.length){
                $sliderArrowRight.on('click', function(e){
                    $sliderInit.slick('slickNext');
                    return false;
                });
                $sliderArrowLeft.on('click', function(e){
                    $sliderInit.slick('slickPrev');
                    return false;
                });
            }
        });
    }
    // Partners Carousel
    function slickPartnersCarousel($scope, $) {
        $scope.find('.wrapper-carusel-two-col .js-carusel-two-col').each(function () {
            var $sliderInit = $( this ),
                $slickArrowExtraLeft = $('.wrapper-carusel-two-col .slick-arrow-extraleft'),
                $sliderArrowLeft = $slickArrowExtraLeft.find('.slick-prev'),
                $sliderArrowRight = $slickArrowExtraLeft.find('.slick-next');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 791,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
            if ($sliderArrowRight.length && $sliderArrowLeft.length){
                $sliderArrowRight.on('click', function(){
                    $sliderInit.slick('slickNext');
                });
                $sliderArrowLeft.on('click', function(){
                    $sliderInit.slick('slickPrev');
                });
            }
        });
    }
    // Partners 2 Carousel
    function slickPartnersCarousel2($scope, $) {
        $scope.find('.partners-type2 .js-carusel-partners').each(function () {
            var $sliderInit = $( this ),
                $slickArrowExtraLeft = $('.partners-type2 .wrapper-carusel-partners .slick-slick-arrow'),
                $sliderArrowLeft = $slickArrowExtraLeft.find('.slick-prev'),
                $sliderArrowRight = $slickArrowExtraLeft.find('.slick-next');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 791,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
            if ($sliderArrowRight.length && $sliderArrowLeft.length){
                $sliderArrowRight.on('click', function(){
                    $sliderInit.slick('slickNext');
                });
                $sliderArrowLeft.on('click', function(){
                    $sliderInit.slick('slickPrev');
                });
            }
        });
    }
    // Partners 3 Carousel
    function slickPartnersCarousel3($scope, $) {
        $scope.find('.partners-type3 .js-carusel-twocol-fullwidth').each(function () {
            var $sliderInit = $( this ),
                $slickArrowExtraLeft = $(' #mainContent .wrapper-carusel-partners .slick-slick-arrow'),
                $sliderArrowLeft = $slickArrowExtraLeft.find('.slick-prev'),
                $sliderArrowRight = $slickArrowExtraLeft.find('.slick-next');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
            if ($sliderArrowRight.length && $sliderArrowLeft.length){
                $sliderArrowRight.on('click', function(){
                    $sliderInit.slick('slickNext');
                });
                $sliderArrowLeft.on('click', function(){
                    $sliderInit.slick('slickPrev');
                });
            }
        });
    }
    // Awards Carousel
    function slickAwardsCarousel($scope, $) {
        $scope.find('.nt-awards .js-award-carusel').each(function () {
            var $sliderInit = $( this );
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 790,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });
    }
    // Testimonials Carousel
    function slickTestimonialsCarousel($scope, $) {
        $scope.find('.nt-testimonials .js-carusel-blockquote').each(function () {
            var $sliderInit = $( this ),
                $slickArrow = $sliderInit.closest('section').find('.slick-arrow-external'),
                $sliderArrowLeft = $slickArrow.find('.slick-prev'),
                $sliderArrowRight = $slickArrow.find('.slick-next');
            if(!$sliderInit.length) return;
            $sliderInit.not('.slick-initialized').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true
            });
            if ($sliderArrowRight.length){
                $sliderArrowRight.on('click', function(e){
                    $sliderInit.slick('slickNext');
                    return false;
                });
            };
            if ($sliderArrowLeft.length){
                $sliderArrowLeft.on('click', function(e){
                    $sliderInit.slick('slickPrev');
                    return false;
                });
            }
        });
    }
    // Testimonials Carousel
    function slickProductCarousel($scope, $) {
        $scope.find('.nt-carousel-products .js-carousel-products').each(function () {
            var $jsCarouselProducts = $( this );
            if(!$jsCarouselProducts.length) return;
            $jsCarouselProducts.not('.slick-initialized').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        });
    }
    // Promobox Mobile Carousel
    function slickPromoboxMobileCarousel($scope, $) {
        $scope.find('.nt-mobile-slider .js-mobile-slider').each(function () {
            dataBg2('[data-bg]');
            function dataBg2(el){
                $(el).each(function(){
                    var $this = $(this),
                    bg = $this.attr('data-bg');
                    $this.css({
                        'background-image': 'url(' + bg + ')'
                    });
                });
            }
            const init = {
                autoplay: false,
                infinite: false,
                arrows:false,
                cssEase: "linear",
                slidesToShow: 1,
                slidesToScroll: 1
            };
            $(() => {
                const win = $(window);
                const slider = $( this );
                win.on("load resize", () => {
                    if (win.width() < 790) {
                        slider.not(".slick-initialized").slick(init);
                    } else if (slider.hasClass("slick-initialized")) {
                        slider.slick("unslick");
                    }
                });
            });
        });
    }
    // niceSelect
    function niceSelectElement($scope, $) {
        $scope.find('.section-form').each(function () {
            var $this = $( this ),
                formselect = $this.find('select');
            if(!formselect.length) return;
            formselect.niceSelect();
            var $formDefault = $this.find('.form-control:not(select)');
            if($formDefault.length){
                $formDefault.focus(function(){
                    $(this).parents('.form-group').addClass('focused');
                });
                $formDefault.blur(function(){
                    var inputValue = $(this).val();
                    if (inputValue == ""){
                        $(this).removeClass('filled');
                        $(this).parents('.form-group').removeClass('focused');
                    } else {
                        $(this).addClass('filled');
                    };
                });
            }
        });
    }
    // niceSelect
    function formFocusCorrection($scope, $) {
        $scope.find('#mainContent .form-default').each(function () {
            var $this = $( this );
            var $formDefault = $this.find('.form-control:not(select)');
        	if($formDefault.length){
        		$formDefault.each(function (index, value) {
        			if($(this).val()) { // zero-length string AFTER a trim
        				$(this).parents('.form-group').addClass('focused');
        			}
        		});
        
        		$formDefault.focus(function(){
        			$(this).parents('.form-group').addClass('focused');
        		});
        
        		$formDefault.blur(function(){
        			var inputValue = $(this).val();
        			if (inputValue == ""){
        				$(this).removeClass('filled');
        				$(this).parents('.form-group').removeClass('focused');
        			} else {
        				$(this).addClass('filled');
        			};
        		});
        	};

        });
    }
    // Accordion Tabs
    function accordeonTabs($scope, $) {
        $scope.find('.nt-accordeon .js-accordeon').each(function () {
            var jsAccordeon = $( this );
            var methods = {
                init: function(options){
                    return this.each(function(){
                        var object = $(this),
                        objectOpen = object.find('.accordeon__item.is-open'),
                        objectItemTitle = object.find('.accordeon__item .accordeon__title');
                        objectOpen.find('.accordeon__content').slideToggle(100);
                        objectItemTitle.on('click', function(){
                            $(this).next().slideToggle(200).parent().toggleClass('is-open');
                        });
                    });
                }
            };
            $.fn.accordeon = function(action){
                if(methods[action]){
                    return methods[action].apply(this, Array.prototype.slice.call(arguments, 1));
                } else if(typeof action === 'object' || !action){
                    return methods.init.apply(this, arguments);
                } else {
                    console.info('Action ' +action+ 'not found this plugin');
                    return this;
                }
            };
            if(!jsAccordeon.length) return;
            jsAccordeon.accordeon();
        });
    }
    // Features Masonry
    function featuresMasonry($scope, $) {
        $scope.find('.features-masonry').each(function () {
            var $this = $( this ),
                masonryLayout01 = $this.find('.masonry-layout-01'),
                $window = $(window),
                $body = $('body'),
                $html = $('html');
            //$window.on('load', function(){
                var ptwindowWidth = window.innerWidth || $window.width();
                if (masonryLayout01.length){
                    masonry();
                };
            //});
            function masonry(){
                var $grid = masonryLayout01.find('.masonry-layout-01-init').isotope({
                    itemSelector: '.element-item',
                    layoutMode: 'masonry',
                });
                $grid.imagesLoaded().progress(function(){
                    $grid.isotope('layout').addClass('pt-show');
                });
            }
        });
    }
    // Gallery Masonry
    function galleryMasonry($scope, $) {
        $scope.find('.nt-gallery .galley-masonry').each(function () {
            var $window = $(window),
                $ttPageContent = $('.nt-gallery'),
                gallery = $( this );
            //$window.on('load', function(){
                var ttwindowWidth = window.innerWidth || $window.width();
                if (gallery.length){
                    initGallery();
                    initGalleyPopup();
                };
            //});
            function initGallery(){
                var $grid = gallery.find('.tt-portfolio-content').isotope({
                    itemSelector: '.element-item',
                    layoutMode: 'masonry',
                });
                $grid.imagesLoaded().progress( function() {
                    $grid.isotope('layout').addClass('tt-show');
                });
                var ttFilterNav =  gallery.find('.filter-nav');
                if (ttFilterNav.length) {
                    var filterFns = {
                        ium: function() {
                            var name = $(this).find('.name').text();
                            return name.match(/ium$/);
                        }
                    };
                    ttFilterNav.on('click', '.button', function() {
                        var filterValue = $(this).attr('data-filter');
                        filterValue = filterFns[filterValue] || filterValue;
                        $grid.isotope({
                            filter: filterValue
                        });
                        $(this).addClass('active').siblings().removeClass('active');
                    });
                };
            };
            function initGalleyPopup() {
                var objZoom = $ttPageContent.find('.galley-masonry .btn-zomm');
                objZoom.magnificPopup({
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            };
        });
    }
    // counterUp
    function counterUpElement($scope, $) {
        $scope.find('.box-counter').each(function () {
            var $this = $( this );
                time = 1,
                cc = 1,
                $mainContent = $this,
                $section = $mainContent.find('.section');
            
            $(window).on('scroll', function(){
                $section.each(function(){
                    var cPos = $(this).offset().top,
                    topWindow = $(window).scrollTop();
                    if(cPos < topWindow + 300){
                        if(cc < 2){
                            $('.animate-number').addClass("viz").each(function(){
                                var
                                i = 1,
                                num = $(this).data('num'),
                                step = 500 * time / num,
                                that = $(this),
                                int = setInterval(function(){
                                    if (i <= num) {
                                        that.html(i);
                                    }
                                    else {
                                        cc= cc+2;
                                        clearInterval(int);
                                    }
                                    i++;
                                },step);
                            });
                        }
                    }
                });
            });
        });
    }

    var parentBody = window.parent.document.getElementsByClassName("elementor-editor-wp-page");
    var parentBod = $(parentBody);
    
    function updatePageSettings(newValue) {
        elementor.saver.update({
            onSuccess: function() {
                elementor.reloadPreview();
                elementor.once( 'preview:loaded', function() {
                    elementor.getPanelView().setPage('page_settings').activateTab('settings');
                    //jQuery(parentBod).find('.elementor-tab-control-settings').addClass('elementor-active');
                    //jQuery(parentBod).find('#elementor-panel-footer-settings').trigger('click');
                } );
            }
        });
    }
    
    function updatePageHeroSettings(newValue)
    {
    }
    
    jQuery(window).on('elementor/frontend/init', function () {
        if ( typeof elementor != "undefined" && typeof elementor.settings.page != "undefined") {
            elementor.settings.page.addChangeCallback( 'quadron_hide_page_header', updatePageSettings );
            elementor.settings.page.addChangeCallback( 'quadron_hide_page_footer_widgetize', updatePageSettings );
            elementor.settings.page.addChangeCallback( 'quadron_hide_page_footer', updatePageSettings );
            elementor.settings.page.addChangeCallback( 'quadron_page_header_type', updatePageSettings );
            elementor.settings.page.addChangeCallback( 'quadron_add_page_footer_margin', updatePageSettings );
        }
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-home-slider-one.default', slickCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-home-slider-two.default', slickCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-home-slider-three.default', slickCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-video-slider-section.default', slickVideoCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-video-slider-two-section.default', slickVideoCarousel2);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-video-slider-three-section.default', slickVideoCarousel3);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-blog-slider-section.default', slickBlogCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-courses-slider-section.default', slickBlogCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-partners-slider-section.default', slickPartnersCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-partners-slider-section.default', slickPartnersCarousel2);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-partners-slider-section.default', slickPartnersCarousel3);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-awards-slider-section.default', slickAwardsCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-testimonials-one-section.default', slickTestimonialsCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-woo-product-slider-section.default', slickProductCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-promobox-mobile-slider-section.default', slickPromoboxMobileCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-contact-form-section.default', niceSelectElement);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-contact-form-7.default', niceSelectElement);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-features-masonry-section.default', featuresMasonry);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-gallery-grid-section.default', galleryMasonry);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-accordion-tabs-section.default', accordeonTabs);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-counter-up.default', counterUpElement);
        elementorFrontend.hooks.addAction('frontend/element_ready/quadron-woo-checkout-form-section.default', formFocusCorrection);
    });
})(jQuery);

