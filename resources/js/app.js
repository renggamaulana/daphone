import './bootstrap';

// Import Swiper and its styles
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Initialize Swiper
document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.swiper-container', {
        // Swiper options here
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
