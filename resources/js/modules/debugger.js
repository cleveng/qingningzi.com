/**
 * https://juejin.cn/post/7000784414858805256
 */
(() => {
    if (import.meta.env.VITE_APP_ENV !== 'production') return
    
    function block() {
        setInterval(() => {
            (function () {
                return false
            }
                ['constructor']('debugger')
                ['call']())
        }, 50)
    }

    try {
        block()
    } catch (err) {
    }
})()
