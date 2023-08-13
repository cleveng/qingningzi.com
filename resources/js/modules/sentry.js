import * as Sentry from '@sentry/browser'

document.addEventListener('DOMContentLoaded', () => {
    if (import.meta.env.DEV) return

    Sentry.init({
        dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
    })
})
