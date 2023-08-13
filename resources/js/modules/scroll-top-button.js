import SmoothScroll from 'smooth-scroll'

document.addEventListener('DOMContentLoaded', () => {
    const ele = document.querySelector('.btn-scroll-top'),
        scrollOffset = 600,
        selector = '[data-scroll]',
        fixedHeader = '[data-scroll-header]'

    const _ = new SmoothScroll(selector, {
        speed: 800,
        speedAsDuration: true,
        offset: 40,
        header: fixedHeader,
        updateURL: false
    })

    if (ele == null) return
    window.addEventListener('scroll', function (e) {
        if (e.currentTarget.pageYOffset > scrollOffset) {
            ele.classList.add('show')
        } else {
            ele.classList.remove('show')
        }
    })
})
