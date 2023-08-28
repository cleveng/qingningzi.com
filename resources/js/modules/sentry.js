import * as Sentry from '@sentry/browser'

document.addEventListener('DOMContentLoaded', () => {
    if (import.meta.env.VITE_APP_ENV !== 'production') return

    Sentry.init({
        dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
    })
})
