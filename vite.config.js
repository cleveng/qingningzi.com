const {resolve} = require('path')
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    base: 'https://cdn.qingningzi.com/build/',
    build: {
        outDir: resolve(__dirname, 'public/build'),
        emptyOutDir: true,
        manifest: true,
        target: 'es2018',
    },
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/scss/dashboard.scss', 'resources/js/app.js', 'resources/js/dashboard.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources'),
        }
    },
    optimizeDeps: {
        include: [
            "axios",
        ]
    }
})
