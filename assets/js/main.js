!function(t){"use strict";jQuery(document).ready((function(t){t(".dropdown-menu-betipsta").each((function(){t(this).find(".dropdown-item").on().click((function(e){var s=t(this).parents(),a=t(this).parents().siblings(".dropdown-toggle");e.preventDefault(),s.hasClass("bookmakers")?(a.html(t(this).find(".text").html()),a.addClass("focused")):s.hasClass("bkm-category")?(a.html(t(this).html()),a.addClass("focused")):s.hasClass("select-sports")?(a.html(t(this).find(".text").html()),a.addClass("focused")):(a.html(t(this).html()),a.addClass("focused"))}))})),t(".testimonial-slider").owlCarousel({loop:!0,margin:60,nav:!1,items:2,smartSpeed:1e3,animateOut:"slideOutDown",animateIn:"flipInX",autoplay:!0,navText:["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],responsive:{0:{items:1},320:{items:1},576:{items:1},768:{items:1},992:{items:1},1200:{items:1},1920:{items:1}}}),t(document).on("click",".back-to-top button",(function(){t("html,body").animate({scrollTop:0},3e3)}));(new Clock).start()})),t(window).on("scroll",(function(){var e=t(".header");t(window).scrollTop()>100?e.addClass("header-fixed fadeInDown animated"):e.removeClass("header-fixed fadeInDown animated")})),t(window).on("load",(function(){t(".preloader").fadeOut(1e3)}))}(jQuery);