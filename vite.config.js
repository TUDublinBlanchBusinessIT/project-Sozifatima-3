import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'),
    },
  },
  server: {
    proxy: {
      '/app': 'http://localhost', // Proxy requests to your Laravel backend
    },
  },
  build: {
    outDir: 'public/build',
    manifest: true, // This is important for Vite to generate the manifest file
  },
});
