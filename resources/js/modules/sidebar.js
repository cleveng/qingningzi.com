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
            sidebarElement.classList.add('ease-in-out')
            if (Cookies.get('hideSidebar') === undefined) {
                Cookies.set('hideSidebar', 'true')
                sidebarSwitchElement.classList.add('active')
            } else {
                Cookies.remove('hideSidebar')
                sidebarSwitchElement.classList.remove('active')
                // sidebarElement.classList.add('ease-in-out')
            }

            sidebarElement.classList.toggle('collapsed')
            sidebarElement.addEventListener('transitionend', () => {
                window.dispatchEvent(new Event('resize'))
            })
        })
    }
})
