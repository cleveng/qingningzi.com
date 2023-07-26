import * as Sentry from '@sentry/browser'

document.addEventListener('DOMContentLoaded', () => {
    Sentry.init({
        dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
    })
})
