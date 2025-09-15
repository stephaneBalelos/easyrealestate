import Swiper from 'swiper';
import { Navigation, Thumbs } from 'swiper/modules';

export default function initEasyRealEstateSliders() {
    // Initialize sliders here
    const sliders = document.querySelectorAll('.easyrealestate-slider-container');
    sliders.forEach((slider) => {
        // Slider initialization logic
        initSwiper(slider as HTMLElement);
    });
}

const initSwiper = async (el: HTMLElement) => {
    const sliderEl = el.querySelector('.easyrealestate-slider') as HTMLElement;
    if (!sliderEl) {
        console.warn('Swiper slider element not found.');
        return;
    }
    const thumbsEl = el.querySelector('.easyrealestate-slider-thumbnails') as HTMLElement;
    const nextEl = sliderEl.querySelector('.easyrealestate-slider-button-next') as HTMLElement;
    const prevEl = sliderEl.querySelector('.easyrealestate-slider-button-prev') as HTMLElement;

    if (!nextEl || !prevEl) {
        console.warn('Swiper navigation elements not found.');
        return;
    }

    const swiper = new Swiper(sliderEl, {
        modules: [Navigation, Thumbs],
        navigation: {
            enabled: true,
            nextEl: nextEl,
            prevEl: prevEl,
        },
    });
    if (thumbsEl) {
        const thumbsSwiper = new Swiper(thumbsEl, {
            slidesPerView: 3,
            spaceBetween: 8,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                768: {
                    slidesPerView: 4,
                    spaceBetween: 8,
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 12,
                },
            },
        });

        swiper.thumbs.swiper = thumbsSwiper;
        swiper.thumbs.init();
        swiper.thumbs.update(true);
    }

    return swiper;
}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateSliders();
});