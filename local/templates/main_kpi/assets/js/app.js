$(document).foundation();

$(document).ready(function(){

	// var clock = new FlipClock($('.clock'), {
		
	// });
    
	var datepickerMonths = $('.datepicker-months'),
		datepickerYears = $('.datepicker-years');
	if (datepickerMonths.length > 0) {
		datepickerMonths.datepicker({
			view: 'months',
			minView: 'months',
			dateFormat: 'MM',
			autoClose: true
		});
    }
	if (datepickerYears.length > 0) {
		datepickerYears.datepicker({
			view: 'years',
			minView: 'years',
			dateFormat: 'yyyy',
			autoClose: true
		});
    }
    
    $('.vacancy-box').on ('click', function(){
        var $this = $(this);
		if($this.hasClass('active')){
			$('.vacancy-box').removeClass('active');
			$('.vacancy-box__body').slideUp();
		} else{
			$('.vacancy-box').removeClass('active');
			$('.vacancy-box__body').slideUp();
			$this.addClass('active');
			$this.children('.vacancy-box__body').slideDown();
		}
    });
    
    
    
	
	$('.search-call').on('click', function(){
		$('.search-fixed-wrapper').addClass('active');
		$('#title-search-input').focus();
	});
	$('.search-fixed__close').on('click', function(){
		$('.search-fixed-wrapper').removeClass('active')
	});
	
	
	var bitrixPanel = $('#bitrix-panel');
	if (bitrixPanel.length > 0) {
		$('.main-menu-wrapper').css({
			paddingTop: $('.header-wrapper__top').innerHeight() + $("#bitrix-panel").innerHeight(),
		});
		$('.header-wrapper--menu .header-wrapper__top').css({
			top: $("#bitrix-panel").innerHeight(),
		});
    }
	
	$('.menu-call').on('click', function(){
		$('html').css({
			overflow: "hidden",
		})
		$('.header-wrapper').addClass('header-wrapper--menu');
		if($('.page-wrapper').hasClass('from-bx-panel-top-margin')){
			$('.main-menu-wrapper').css({
				paddingTop: $('.header-wrapper__top').innerHeight() + $("#bitrix-panel").innerHeight(),
			});
			$('.header-wrapper__top').css({
				top: $("#bitrix-panel").innerHeight(),
			});
		} else{
			$('.main-menu-wrapper').css({
				paddingTop: $('.header-wrapper__top').innerHeight() + 30,
			});
		}
	});
	
	$('.menu-call--close').on('click', function(){
		$('html').css({
			overflow: "auto",
		})
		$('.header-wrapper').removeClass('header-wrapper--menu');
		$('.main-menu-wrapper').css({
			paddingTop: 0,
		});
		$('.header-wrapper__top').css({
			top: 0,
		});
	});
    
	$(".header-slider").owlCarousel({
		autoplay: true,
		autoplayTimeout: 8000,
		autoplayHoverPause: false,
		items: 1,
		loop: true,
		dots: false,
		nav: true,
		navContainer: '.customNav--header',
		dotsContainer: '.customDots--header',
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		responsive: {
			0 : {
				dots: true,
				nav: false,
    			autoHeight: false,
			},
			639 : {
				dots: false,
				nav: true,
    			autoHeight: false,
			},
			1023 : {
				dots: false,
				nav: true,
    			autoHeight: false,
			},
		}
	});
    
	$('.header-slider').on('changed.owl.carousel', function(e) {
		setTimeout(function(){
			HeaderSliderBG();
		}, 100);
        $('.header-slider').trigger('stop.owl.autoplay');
        $('.header-slider').trigger('play.owl.autoplay');
	});
	
	HeaderSliderBG();
	
	$(".staff-company-slider").owlCarousel({
		items: 4,
		dots: false,
		nav: false,
        margin: 30,
		dotsContainer: '.customDots--staff',
		responsive: {
			0 : {
                items: 1,
				dots: true,
			},
			640 : {
                items: 2,
				dots: true,
			},
			1023 : {
                items: 4,
				// dots: false,
				dots: true,
			}
		}
	});
    
	$(".participants-slider").owlCarousel({
		items: 5,
		dots: false,
		nav: true,
        margin: 30,
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		responsive: {
			0 : {
                items: 2,
				dots: true,
                nav: false,
			},
			640 : {
                items: 3,
				dots: true,
                nav: false,
			},
			1023 : {
                items: 5,
				dots: false,
                nav: true,
			}
		}
	});
    
	$(".about-slider").owlCarousel({
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: false,
		items: 2,
		dots: false,
		autoplayHoverPause: true,
		nav: true,
		margin: 30,
		loop: true,
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		responsive: {
			0 : {
                items: 1,
			},
			640 : {
                items: 2,
			},
			1023 : {
                items: 2,
			}
		}
	});
    
	$(".img-slider").owlCarousel({
		items: 1,
		dots: true,
		nav: true,
        margin: 30,
		navContainer: '.customNav--img',
		dotsContainer: '.customDots--img',
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		responsive: {
			0 : {
                items: 1,
                nav: false,
			},
			640 : {
                items: 1,
                nav: false,
			},
			1023 : {
                items: 1,
                nav: true,
			}
		}
	});
    
	$(".img-slider--two").owlCarousel({
		items: 1,
		dots: true,
		nav: true,
        margin: 30,
		navContainer: '.customNav--imgtwo',
		dotsContainer: '.customDots--imgtwo',
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		responsive: {
			0 : {
                items: 1,
                nav: false,
			},
			640 : {
                items: 1,
                nav: false,
			},
			1023 : {
                items: 1,
                nav: true,
			}
		}
	});
    
	$(".default-slider").owlCarousel({
		items: 4,
		dots: false,
		nav: false,
        margin: 30,
		dotsContainer: '.customDots--default',
		responsive: {
			0 : {
                items: 1,
				dots: true,
    			autoHeight: true,
			},
			640 : {
                items: 2,
				dots: true,
    			autoHeight: false,
			},
			1023 : {
                items: 4,
				dots: false,
    			autoHeight: false,
			}
		}
	});
    
	$(".media-box-slider").owlCarousel({
		items: 1,
		dots: false,
		nav: true,
        margin: 30,
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		responsive: {
			0 : {
				dots: true,
                nav: false,
    			autoHeight: true,
			},
			640 : {
				dots: false,
                nav: false,
    			autoHeight: false,
			},
			1023 : {
				dots: false,
                nav: true,
    			autoHeight: false,
			}
		}
	});
    
	$(".status-project").owlCarousel({
		items: 1,
		dots: true,
		nav: true,
		navText: ["<i class='icon-arrow-left'></i>","<i class='icon-arrow-right'></i>"],
		dotsContainer: '.customDots--status',
		responsive: {
			0 : {
				nav: false,
			},
			640 : {
				nav: false,
			},
			1023 : {
				nav: true,
			}
		}
	});
    
	$(".history-slider").owlCarousel({
		items: 4,
		dots: true,
		nav: false,
		dotsClass: 'owl-dots customDots',
        margin: 30,
		responsive: {
			0 : {
				items: 2,
			},
			640 : {
				items: 3,
			},
			1023 : {
				items: 4,
			}
		}
	});
	
	function inWindow(s){
		var scrollTop = $(window).scrollTop();
		var windowHeight = $(window).height();
		var currentEls = $(s);
		var result = [];
			currentEls.each(function(){
		var el = $(this);
		var offset = el.offset();
		if(scrollTop <= offset.top && (el.height() + offset.top) < (scrollTop + windowHeight))
		  result.push(this);
		});
		return $(result);
	}
	
	inWindow('.history-box');
	
	$('.shema-box__more-item').on('click', function() {
		var $this = $(this);
		$this.addClass('shema-box__item--zindex active');

		setTimeout(function(){
			$(".shema-box__item.active .mark-slider").owlCarousel({
				items: 4,
				dots: true,
				nav: false,
				dotsClass: 'owl-dots customDots',
				margin: 30,
				responsive: {
					0 : {
						items: 2,
					},
					640 : {
						items: 3,
					},
					1023 : {
						items: 4,
					}
				}
			});
		}, 100);
	});
	
	$('.block-project__item').on('click', function(){
		var $this = $(this);
		$this.addClass('active');
		$this.children('.mark-info').slideDown();
		setTimeout(function(){
			$(".shema-box__item.active .mark-slider").owlCarousel({
				items: 4,
				dots: true,
				nav: false,
				dotsClass: 'owl-dots customDots',
				margin: 30,
				responsive: {
					0 : {
						items: 2,
					},
					640 : {
						items: 3,
					},
					1023 : {
						items: 4,
					}
				}
			});
		}, 100);
	});
	
	$('.block-project__item').mouseleave(function() {
		var $this = $(this);
		$this.removeClass('active');
		$this.children('.mark-info').slideUp();
	});
	
	$('.shema-box__item').on('click', function() {
		var $this = $(this);
		$this.addClass('shema-box__item--zindex active');

		setTimeout(function(){
			$(".shema-box__item.active .mark-slider").owlCarousel({
				items: 4,
				dots: true,
				nav: false,
				dotsClass: 'owl-dots customDots',
				margin: 30,
				responsive: {
					0 : {
						items: 2,
					},
					640 : {
						items: 3,
					},
					1023 : {
						items: 4,
					}
				}
			});
		}, 100);
	});
	
	$('.shema-box__item, .shema-box__more-item').mouseleave(function() {
		var $this = $(this);
		$this.removeClass('shema-box__item--zindex active');
	});
	
	
	
	$('.mark-icon-close').on('click', function(){
		var $this = $(this);
		$('.mark-wrapper, .maps-box__point').removeClass('active');
		$this.removeClass('active');
		$('.mark-info').slideUp();
		$('.shema-box__item').css({
			zIndex: 'inherit',
		});
	});
	
    
    $('.header-scroll').on('click', function (e) {		
        var anchor = $(this);
        $('html, body').animate({
            scrollTop: $('.content-box').offset().top
        }, 500,function(){
        });
    });
	
    
    var header_fixed = $('.header-wrapper'),
        scrollIn = 0;
    
    function headerScroll() {
    var scrolled = $(this).scrollTop(),
        scrollOut = header_fixed.height() + 15,
        heightHeaderWrapper = $('.header-box').innerHeight();
        if (scrolled > scrollOut) {
            if (scrolled < scrollIn) {
				header_fixed.css({
					paddingTop: $('.header-wrapper__top').innerHeight(),
				})
                header_fixed.addClass('is-fixed is-scroll');
            } else if (scrolled > scrollIn) {
				header_fixed.css({
					paddingTop: 0,
				});
                header_fixed.removeClass('is-fixed');
            }
        } else {
			header_fixed.css({
				paddingTop: 0,
			});
            header_fixed.removeClass('is-fixed is-scroll');
        }
        scrollIn = scrolled;
    }

    $(window).on('resize scroll', function(){
        headerScroll();
    });
	
	new WOW().init({
		mobile: false,// default
	});
	
    
	var blockprojectstart = $('.block-project.start');
	if (blockprojectstart.length > 0) {
		var boxesInWindow = inWindow(".block-project.start");
		setTimeout(function(){
			// сделаем фон этих элементов красным
			boxesInWindow.removeClass('start');
		}, 5000);

		var $win = $(window);
		var $marker = $('.block-project.start');

		//отслеживаем событие прокрутки страницы
		$win.scroll(function() {
		  if($win.scrollTop() + $win.height() >= $marker.offset().top) {
			  setTimeout(function(){
				  $('.block-project').removeClass('start')
			  }, 10000);
		  }else{

		  }
		});
    }
});




function HeaderSliderBG(){
	//new WOW().init();
	wow = new WOW({
		boxClass:     'advantages-item',      // default
		animateClass: 'animated', // default
		offset:       0,          // default
		mobile:       false,       // default
		live:         true        // default
	});
	wow.init();
	
	$(".header-bg__item").removeClass('active');
	
	var activeSlide = $('.header-slider .owl-item.active').children('.header-slider__item').data('slidercount');
	var activeBg = $(".header-bg__item[data-bgcount=" + activeSlide + "]");
	var activeBgVideo = activeBg.find("video > source");
	var activeBgCanvas = activeBg.hasClass("header-bg__item--canvas");
	
	if (activeBgVideo.length) 
	{
		activeBgVideo.parent('video').get(0).pause();
		activeBg.addClass('active');
		activeBgVideo.parent('video').get(0).play();
	} 
	else 
	{
		activeBg.addClass('active');
	}
	if (activeBgCanvas){
		$('.header-canvas').css({
			opacity: .7,
		})
	} else {
		$('.header-canvas').css({
			opacity: 0,
		})
	}
}