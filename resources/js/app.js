'use strict'

import './bootstrap' // axios

// [document](https://laravel.com/docs/10.x/vite#blade-processing-static-assets)
import.meta.glob(['../fonts/**',])

// Common (required)
import './modules/bootstrap'
import './modules/scroll-top-button'
import './modules/sticky-navbar'

// Common (optional)
import './modules/carousel'
import './modules/lazyload'
import './modules/debugger'

// Sentry
import './modules/sentry'

// alpinejs
import './modules/alpinejs'
