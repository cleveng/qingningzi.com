import Swiper from 'swiper/bundle'

document.addEventListener('DOMContentLoaded', () => {
    const element = document.querySelector('.swiper')
    if (element == null) return

    const _ = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    })
})
