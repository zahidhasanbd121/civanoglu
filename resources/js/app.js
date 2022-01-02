require('./bootstrap');

import feather from 'feather-icons/dist/feather.min';

feather.replace();

import Alpine from 'alpinejs';
//import jQuery from './jquery-3.6.0.slim.min';

//require('./stick-1.8.1.min');

window.Alpine = Alpine;

Alpine.start();

window.$ = window.jQuery = require('jquery');

require('./slick-1.8.1.min');

jQuery(window).scroll(function () {
    const scroll = jQuery(window).scrollTop();
    if (scroll >= 50) {
        jQuery('.sticky-header').addClass('sticky-header-active');
    } else {
        jQuery('.sticky-header').removeClass('sticky-header-active');
    }
});


jQuery(document).ready(function ($) {
    $('.slider-text').slick({
        asNavFor: '.thumbnail-slider'

    });
    $('.thumbnail-slider').slick({
        slidesToShow: 10,
        asNavFor: '.slider-text',
        centerMode: true,
        focusOnSelect: true
    });

    $(".civanoglu-menu, .civanoglu-menu-items a").on("click", function () {
        $(".civanoglu-menu-items").toggleClass('active');
    });
});





