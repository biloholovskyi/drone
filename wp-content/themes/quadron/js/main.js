(function($){

    "use strict";

	var methods = {
		init: function(options){
			return this.each(function(){
				var $this = $(this);
				methods.alignmen(options, $this);
			});
		},
		alignmen: function(options, $this){
			var arrow = $this.find('.slick-arrow'),
				arrowHeight = arrow.findHeight(),
				obj = $this.find('.' + options.centeringObject),
				objHeight = obj.findHeight();

			arrow.css({
				'top' : objHeight - arrowHeight,
				'margin-top': '0px'
			}).animate({opacity: 1});
		}
	};
	$.fn.alignment = function(action){
		if(methods[action]){
			return methods[action].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if(typeof action === 'object' || !action){
			return methods.init.apply(this, arguments);
		} else {
			console.info('Action ' +action+ 'not found this plugin');
			return this;
		}
	};
	$.fn.findHeight = function(){
		var $box = $(this),
			maxH = $box.eq(0).innerHeight();

		$box.each(function(){
			maxH = ( $(this).innerHeight() > maxH ) ? $(this).innerHeight() : maxH;
		});

		return maxH/2;
	};
	$(window).resize((function(e){
		setTimeout(function(){
			$('#mainContent .js-align-arrow-award').imagesLoaded().alignment({
				centeringObject: 'award__img'
			});
		}, 500);
	})).resize();
	function debouncer(func, timeout) {
		var timeoutID, timeout = timeout || 500;
		return function() {
			var scope = this,
				args = arguments;
			clearTimeout(timeoutID);
			timeoutID = setTimeout(function(){
				func.apply(scope, Array.prototype.slice.call(args));
			}, timeout);
		}
	};
})(jQuery);

/*
	Debouncer
*/
function debouncer(func, timeout) {
	var timeoutID, timeout = timeout || 300;
	return function() {
		var scope = this,
			args = arguments;
		clearTimeout(timeoutID);
		timeoutID = setTimeout(function() {
			func.apply(scope, Array.prototype.slice.call(args));
		}, timeout);
	}
};
/*
	Definition of touch devices
*/
(function($){
	function isTouchDevice(){
		return typeof window.ontouchstart !== 'undefined';
	};
	if(isTouchDevice()){
		$('body').addClass('touch').one('click', '#mainContent .block-once', function(event){
			event.preventDefault();
		});
	};
})(jQuery);

/*
	Footer mobile collapse
*/
(function($){
	'use strict'

	var footerMobileCollapse = $('#footer .collapse-title:not(.no-collapse)'),
		$window = $(window);
	if (footerMobileCollapse.length){
		ptFooterCollapse();
	};
	function ptFooterCollapse() {
		footerMobileCollapse.on('click',function(e){
			e.preventDefault;
			var ptlayout = $(this).next(),
				ptwindowWidth = window.innerWidth || $window.width();

			$(this).toggleClass('is-open');
			if(ptlayout.css('display') == 'none' && ptwindowWidth <= 790){
			ptlayout.animate({height: 'show'}, 300);
			}else if(ptlayout.css('display') == 'block' && ptwindowWidth <= 790){
			ptlayout.animate({height: 'hide'}, 300);
			}
		});
	};
	$window.resize(debouncer(function(e){
		if(footerMobileCollapse.length && window.innerWidth || $window.width() <= 790){
			footerMobileCollapse.removeClass('is-open').next().removeAttr('style');
		}
	}));
})(jQuery);

/*
	Slick init
*/

(function($){
	var $formDefault = $('.form-default .form-control:not(select)');
	if($formDefault.length){
	    var order_comments = $('textarea#order_comments');
		if(order_comments) {
		  order_comments.removeAttr('placeholder');
		}
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
})(jQuery);

(function($){
	'use strict'
	var objSelect = $('#mainContent .js-init-select:not(.no-nice)');
	if(!objSelect.length) return;
	objSelect.niceSelect();
})(jQuery);



/*
	Header Stuck
*/
(function($){
	var $topBar = $('#top-bar'),
		$window = $(window);

	var scroll = $window.scrollTop();
	if (scroll > 20){
		$topBar.addClass("stuck");
	};

	$window.on('scroll', function(){
		var scroll = $window.scrollTop();
		if (scroll > 20){
			$topBar.addClass("stuck");
		} else {
			$topBar.removeClass("stuck");
		};
	});
})(jQuery);

/*
	Header Stuck
*/
(function($){
	var subpageHeaderBg = $(".subpage-header__bg");

	if(!subpageHeaderBg.length) return;

	scrollSubpage();
	$(window).resize(function(){
		scrollSubpage();
	});

	function scrollSubpage(){
		if (window.innerWidth > 791) {
			$(window).on('scroll', function(){
				var	yPos = +($(window).scrollTop() / 4),
					coords = 'center '+ yPos + 'px';
				subpageHeaderBg.css({ backgroundPosition: coords });
			});
		};
	};

})(jQuery);

/*
	AOS init
*/
AOS.init({
	offset: 100,
	duration: 900,
	easing: 'ease-out',
	delay: 100,
	once: true,
	disable: 'mobile'
});


(function ($){
	var maps = $('#mainContent .googlemap');
	_g_map();
	function _g_map(){
		if( maps.length > 0){
			var apiKey = maps.attr('data-api-key'),
				apiURL;

			if(apiKey){
				apiURL = 'http://maps.google.com/maps/api/js?key='+ apiKey +' &sensor=false';
			}else{
				apiURL = 'http://maps.google.com/maps/api/js?sensor=false';
			};

			$.getScript( apiURL , function(data, textStatus, jqxhr){
				maps.each(function(){
					var current_map = $(this),
						latlng = new google.maps.LatLng(current_map.attr('data-longitude'),
						current_map.attr('data-latitude')),
						point = current_map.attr('data-marker'),

						myOptions = {
							zoom: 14,
							center: latlng,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							mapTypeControl: false,
							scrollwheel: false,
							draggable: true,
							panControl: false,
							zoomControl: false,
							disableDefaultUI: true
						},

						stylez = [
							{
								featureType: "all",
								elementType: "all",
								stylers: [
									{ saturation: -100 } // <-- THIS
								]
							}
						];

					var map = new google.maps.Map(current_map[0], myOptions);

					var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });
					map.mapTypes.set('Grayscale', mapType);
					map.setMapTypeId('Grayscale');

					var marker = new google.maps.Marker({
						map: map,
						icon: {
							size: new google.maps.Size(59,69),
							origin: new google.maps.Point(0,0),
							anchor: new google.maps.Point(0,69),
							url: point
						},
						position: latlng
					});

					google.maps.event.addDomListener(window, "resize", function(){
						var center = map.getCenter();
						google.maps.event.trigger(map, "resize");
						map.setCenter(center);
					});
				});
			});
		};
	};
})(jQuery);


/*
	Slick init
*/
(function($){
	var videoPopup = $('.video-popup');
	if(!videoPopup.length) return;
	videoPopup.each(function(){
		$(this).magnificPopup({
			type: 'iframe',
			iframe: {
			patterns: {
				dailymotion: {
				index: 'dailymotion.com',
				id: function(url) {
					var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
					if (m !== null) {
						if(m[4] !== undefined){
							return m[4];
						}
						return m[2];
					}
					return null;
				},
				src: 'https://www.dailymotion.com/embed/video/%id%'
				}
			}
			}
		});
	});
})(jQuery);

(function($){
	$.fn.instafeed = function(new_object){
		var $this = $(this),
			$accessToken = $(this).attr('data-accessToken'),
			$clientId = $(this).attr('data-clientId'),
			$userId = $(this).attr('data-userId'),
			$limitImg = $(this).attr('data-limitImg');

		if(!$this.length) return;
		var new_object = new_object || {},
			set_object = {
			get: 'user',
			userId: $userId,
			clientId: $clientId,
			limit: $limitImg,
			sortBy: 'most-liked',
			resolution: "standard_resolution",
			accessToken: $accessToken,
			template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
		};
		$.extend(set_object, new_object);
		var feed = new Instafeed(set_object);
		feed.run();
	};
	$('#instafeed').each(function(){
		$(this).instafeed();
	});
})(jQuery);

(function($){
	var jsScrollDown =  $('#js-scroll-down'),
		$window = $(window);

	if (jsScrollDown.length){
		initbacktotop();
	};
	function initbacktotop(){
		$window.scroll(function(){
			$window.scrollTop() > 500 ? jsScrollDown.stop(true.false).addClass('show') : jsScrollDown.stop(true.false).removeClass('show');
		});
	};
})(jQuery);

(function($){
	var ptBackToTop = $('#js-back-to-top'),
		$window = $(window);

	if (ptBackToTop.length){
		ptBackToTop.on('click', function(e){
			$('html, body').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		$window.scroll(function(){
			$window.scrollTop() > 750 ? ptBackToTop.stop(true.false).addClass('show') : ptBackToTop.stop(true.false).removeClass('show');
		});
	};
})(jQuery);


/*
	Desktop Menu
*/
(function($){
	var location = window.location.href,
		$desctopMenu = $('#top-bar__navigation');

	if(!$desctopMenu) return;

	$desctopMenu.find('li').each(function(){
		var link = $(this).find('a').attr('href');

		if(location.indexOf(link) !== -1){
			//$(this).addClass('active').closest('.is-submenu').addClass('active');
		}
		if($(this).is(':has(ul)')){
			$(this).addClass('is-submenu');
		}
	});

	$desctopMenu.find('ul li').on("mouseenter", function(){
		var $ul = $(this).find('ul:first');
		$(this).find('a:first').addClass('is-hover');
		if ($ul.length){
			var windW = window.innerWidth,
				ulW = parseInt($ul.css('width'), 10) + 20,
				thisR = this.getBoundingClientRect().right,
				thisL = this.getBoundingClientRect().left;

			if (windW - thisR < ulW){
				$ul.addClass('right-popup');
			} else if (thisL < ulW){
				$ul.removeClass('right-popup');
			};
		}
	}).on('mouseleave', function(){
		$(this).find('a:first').removeClass('is-hover');
	});
})(jQuery);

/*
	Mobile Menu
*/
(function($){
	var $mobileMenu = $('#nav-aside_menu'),
		$topBarNavigation = $('#top-bar__navigation > ul');

	if(!$mobileMenu && !$topBarNavigation) return;

	var $objBarNavigation = $topBarNavigation.clone();
	$mobileMenu.append($objBarNavigation);
	$mobileMenu.find('li').each(function(){
		if($(this).is(':has(ul)')){
			$(this).addClass('is-submenu');
		}
	});
	$(document).on('click', '#nav-aside_menu li.is-submenu', function(e){
		$(this).siblings().removeClass('is-open');
		$(this).toggleClass('is-open');
	});
})(jQuery);

/*
	Navigation Toggler
*/
(function($){
	var btnToggle = $('#top-bar__navigation-toggler');
	if(btnToggle.length){
		var $html = $('html'),
			$body = $('body'),
			$navigationAside = $('#nav-aside'),
			$btnClose = $navigationAside.find('.nav-aside__close');

		btnToggle.on('click', function(e){
			e.preventDefault();
			var ttScrollValue = $body.scrollTop() || $html.scrollTop();
			$navigationAside.toggleClass('aside-open').perfectScrollbar();
			$body.css("top", - ttScrollValue).addClass("no-scroll").append('<div class="nav-aside-background"></div>');
			var modalFilter = $('.nav-aside-background').fadeTo('fast',1);
			if (modalFilter.length){
				modalFilter.on('click', function(){
					$btnClose.trigger('click');
				})
			}
			return false;
		});
		$btnClose.on('click', function(e){
			e.preventDefault();
			$navigationAside.removeClass('aside-open').perfectScrollbar('destroy');
			var top = parseInt($body.css("top").replace("px", ""), 10) * -1;
			$body.removeAttr("style").removeClass("no-scroll").scrollTop(top);
			$html.removeAttr("style").scrollTop(top);
			$(".nav-aside-background").off().remove();
		});
	}
})(jQuery);

/*
	Promobox03 Hover
*/
(function($){
	var $object = $('#mainContent .promobox03');
	if ($object.length){
		$object.find('.promobox03__show').slideUp('0');
		$('body .promobox03').hover(
			function(){
				$(this).find('.promobox03__show').stop().delay(100).slideDown('200');
			},
			function(){
				$(this).find('.promobox03__show').stop().delay(100).slideUp().removeAttr("style");
			}
		);
	};
})(jQuery);

(function($){
	'use strict'

	var	$colAside = $('#js-aside-col'),
		$collapseAside = $colAside.find('.collapse-aside .collapse-aside__title');

	if(!$colAside && !$collapseAside) return;

	(function toggleColAside(){
		$collapseAside.on('click', this, function(e){
			var ptlayout = $(this).next();

			$(this).toggleClass('is-open');
			if(ptlayout.css('display') == 'none'){
				ptlayout.slideToggle(200);
			} else if(ptlayout.css('display') == 'block'){
				ptlayout.slideToggle(200);
			};
		});
	})();
})(jQuery);

(function($){
	'use strict'

	var	$colorSwitcher = $('#mainContent .menu-aside li');

	if(!$colorSwitcher) return;

	(function asideMenu(){
		$colorSwitcher.on('click', this, function(e){
			$(this).addClass('active').siblings().removeClass('active');
			//return false;
		});
	})();
})(jQuery);

/*
	Slider Price (shop aside)
*/
(function($){
	var $priceSlider = $('#price-slider');
	if ($priceSlider.length){
		$priceSlider.find('.nstSlider').nstSlider({
			"left_grip_selector": ".leftGrip",
			"right_grip_selector": ".rightGrip",
			"value_bar_selector": ".bar",
			"value_changed_callback": function(cause, leftValue, rightValue) {
				$(this).parent().find('.leftLabel').text(leftValue);
				$(this).parent().find('.rightLabel').text(rightValue);
			}
		});
	};
})(jQuery);

(function($){
	'use strict'

	var	$colorSwitcher = $('#mainContent .js-color-switcher');

	if(!$colorSwitcher) return;

	(function switcherList(){
		$colorSwitcher.find('li').on('click', this, function(e){
			$(this).addClass('active').siblings().removeClass('active');
			return false;
		});
	})();
})(jQuery);

(function($){
	var	$body = $('body'),
		$html = $('html'),
		$colAside = $('#js-aside-col'),
		$btnToggleAside = $('#js-toggle-aside');

	if(!$colAside && !$btnToggleAside) return;

	(function toggleColAside(){
		var $btnCloseAside = $colAside.find('.btn-asidecol-close');
		$btnToggleAside.on('click', function(e){
			e.preventDefault();
			var ptScrollValue = $body.scrollTop() || $html.scrollTop();
			$colAside.toggleClass('is-open').perfectScrollbar();
			$body.css("top", - ptScrollValue).addClass("no-scroll").append('<div class="filter-bg"></div>');
			var modalFilter = $('.filter-bg').fadeTo('fast',1);
			if (modalFilter.length){
				modalFilter.on('click', function(){
					$btnCloseAside.trigger('click');
				})
			}
			return false;
		});
		$btnCloseAside.on('click', function(e){
			e.preventDefault();
			$colAside.removeClass('is-open').perfectScrollbar('destroy');
			var top = parseInt($body.css("top").replace("px", ""), 10) * -1;
			$body.removeAttr("style").removeClass("no-scroll").scrollTop(top);
			$html.removeAttr("style").scrollTop(top);
			$(".filter-bg").off().remove();
		});
	})();
})(jQuery);

(function($){
	'use strict'

	var	$counterItem = $('#mainContent .js-counter-item');

	if(!$counterItem.length) return;

	$counterItem.on('click', '.minus-btn, .plus-btn', function(){
		var $this = $(this),
			$count = $this.siblings(".count"),
			delta = $this.hasClass('plus-btn') ? 1 : -1;
		$count.val(Math.max(0, parseInt($count.val()) + delta));
	});
})(jQuery);

/*
	Tabs Default
*/
(function($){
	var $navTabs = $('#mainContent .nav-tabs');
	if ($navTabs.length){
		$('body').on('click', '#mainContent .nav-tabs', function(e){
			e.preventDefault();
			$(this).tab('show');
		});
	};
})(jQuery);

/*
	Shop Slider Product
*/
(function($){
	var	sliderProduct = $('#mainContent .slider-product');
	if(sliderProduct.length){
		$('body').on('click', '.slider-product .img-small a', function(e){
			e.preventDefault();
			var imgLarge = $(this).closest('.slider-product').find('.img-large img');
			$(this).closest('.item').addClass('active').siblings().removeClass('active');
			imgLarge.hide().attr('src', $(this).attr('href'));
			imgLarge.fadeIn(300);
		});
	};
})(jQuery);

/*
	Slick init
*/
(function($){
	$('#mainContent [data-slick]').each(function(index, element){
		if($(element).hasClass('slick-initialized')) return;
		$(element).slick();
	});
	var $jsCaruselTwoCol = $('#mainContent .js-carusel-two-col');
	if($jsCaruselTwoCol.length) return;
	$jsCaruselTwoCol.slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		adaptiveHeight: true
	});
})(jQuery);

/*
	Carusel News
*/
(function($){
	var $sliderInit =  $('#mainContent .related-section .js-carusel-news'),
		$slickArrow = $sliderInit.closest('.section').find('.slick-slick-arrow'),
		$sliderArrowLeft = $slickArrow.find('.slick-prev'),
		$sliderArrowRight = $slickArrow.find('.slick-next');

	if(!$sliderInit.length) return;

	$sliderInit.slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 300,
		slidesToShow: 2,
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
	};
})(jQuery);


/*
	Carusel News
*/
(function($){
	var $reviewsLink =  $('.box-info .woocommerce-review-link'),
		$navtabs = $('.nav.nav-tabs'),
		$reviewstabs = $('.nav-tabs-dafault .nav-link'),
		$reviewstab = $('.nav-tabs-dafault .nav-link[href="#tab-title-reviews"]');
		$reviewstab2 = $('.nav-tabs-dafault .nav-link:not([href="#tab-title-reviews"])');
		$reviewsContent = $('#tab-title-reviews'),
		$window = $(window);

	if(!$reviewstabs.length) return;

	//if ($reviewsLink.length && $reviewstabs.length){
		$reviewsLink.on('click', function(e){
		    $navtabs.addClass('active');
			$reviewstabs.removeClass('active');
			$reviewstab.addClass('active');
			$reviewsContent.addClass('active');
			scrollToReview();
			//return false;
		});
		$reviewstab2.on('click', function(e){
			$reviewsContent.removeClass('active');
		});
		$window = $(window);

	function scrollToReview(){
        $("html, body").animate({
            scrollTop: $('.nav-link[href="#tab-title-reviews"]').offset().top -221
        }, 1000);
		return false;
	};
	//};
})(jQuery);

/*
	Main Slider
*/
(function($){
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
})(jQuery);

/*
	Slick init
*/
(function($){
	/*
	$('#footer .nt-footer-sidebar .nt-col').each(function(index, element){
		$(element).removeClass('widget_text');
		var wrapper = $(element).find('.mobile-collapse');
		var title = $(element).find('.footer-title');
		if(title){
			$(element).find($(title)).prependTo(wrapper);
		}
	});
	**/
	$('#footer a i').each(function(index, element){
		var has_icon = $(element).parent();
		if(element){
			has_icon.addClass('has-icon');
		}
	});
})(jQuery);
