// Usage: https://github.com/Grsmto/simplebar
import SimpleBar from 'simplebar'
import Cookies from 'js-cookie'

document.addEventListener('DOMContentLoaded', () => {
    const simpleBarElement = document.getElementsByClassName('js-simplebar')[0]

    if (simpleBarElement) {
        /* Initialize simplebar */
        new SimpleBar(document.getElementsByClassName('js-simplebar')[0])

        const sidebarElement = document.getElementsByClassName('sidebar')[0]
        const sidebarSwitchElement = document.getElementsByClassName('sidebar-switch')[0]

        sidebarSwitchElement.addEventListener('click', () => {
            Cookies.get('hideSidebar') === undefined ? Cookies.set('hideSidebar', 'true') : Cookies.remove('hideSidebar')

            // 过度效果??? 局部渲染
            sidebarElement.classList.add('animation')
            sidebarElement.classList.toggle('collapsed')
            sidebarSwitchElement.classList.toggle('active')
            sidebarElement.addEventListener('transitionend', () => {
                window.dispatchEvent(new Event('resize'))
            })
        })
    }
})
