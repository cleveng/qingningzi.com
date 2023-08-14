document.addEventListener('DOMContentLoaded', () => {
    let navbar = document.querySelector('.navbar-sticky')
    if (navbar == null) return

    let navbarH = navbar.offsetHeight,
        scrollOffset = 500

    window.addEventListener('scroll', (e) => {
        if (navbar.classList.contains('position-absolute')) {
            if (e.currentTarget.pageYOffset > scrollOffset) {
                navbar.classList.add('navbar-stuck')
            } else {
                navbar.classList.remove('navbar-stuck')
            }
        } else {
            if (e.currentTarget.pageYOffset > scrollOffset) {
                document.body.style.paddingTop = navbarH + 'px'
                navbar.classList.add('navbar-stuck')
            } else {
                document.body.style.paddingTop = ''
                navbar.classList.remove('navbar-stuck')
            }
        }
    })
})

document.addEventListener('DOMContentLoaded', () => {
    var toggler = document.querySelector('.navbar-stuck-toggler'),
        stuckMenu = document.querySelector('.navbar-stuck-menu')

    if (toggler == null) return
    toggler.addEventListener('click', function (e) {
        stuckMenu.classList.toggle('show')
        e.preventDefault()
    })
})
