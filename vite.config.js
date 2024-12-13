import { resolve } from 'path'

import { defineConfig, loadEnv } from 'vite'
import laravel from 'laravel-vite-plugin'

export default ({ mode }) => {
  process.env = { ...process.env, ...loadEnv(mode, process.cwd()) }

  return defineConfig({
    base: './',
    build: {
      outDir: resolve(__dirname, 'public/build'),
      emptyOutDir: true,
      manifest: true,
      target: 'es2018',
      rollupOptions: {
        output: {
          // 入口文件名
          entryFileNames: 'assets/[name].js',
          // 块文件名
          chunkFileNames: 'assets/[name].js',
          // 资源文件名 css 图片等等
          assetFileNames: 'assets/[name].[ext]'
        }
      }
    },
    plugins: [
      laravel({
        input: ['resources/scss/app.scss', 'resources/js/main.js'],
        refresh: true
      })
    ],
    resolve: {
      alias: {
        '@': resolve(__dirname, 'resources')
      }
    },
    optimizeDeps: {
      include: ['bootstrap', 'feather-icons', 'smooth-scroll', 'axios', 'alpinejs', 'sentry']
    }
  })
}
