import * as Sentry from '@sentry/browser'

document.addEventListener('DOMContentLoaded', () => {
    if (import.meta.env.VITE_APP_ENV !== 'production') return

    if (~location.protocol.indexOf('https:') && ~location.host.indexOf('qingningzi.com')) {} else {
        location.href = 'https://www.qingningzi.com';
    }

    Sentry.init({
        dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
    })
})
