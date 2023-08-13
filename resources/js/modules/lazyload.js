import LazyLoad from 'vanilla-lazyload'

document.addEventListener('DOMContentLoaded', () => {
    const elem = new LazyLoad({})
    elem.update()
})
