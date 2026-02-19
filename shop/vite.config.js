import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue(), vueDevTools()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
      'src': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
  server: {
    proxy: {
      '/api': {
        target: 'http://localhost:8000', // URL вашего бэкенд-сервера
        changeOrigin: true, // Рекомендуется включать для корректной работы CORS
        rewrite: (path) => path.replace(/^\/api/, '') // Опционально: удаляет /api из пути
      }
    }
  }
})