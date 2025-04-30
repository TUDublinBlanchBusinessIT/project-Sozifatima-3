// vite.config.js
const { defineConfig } = require('vite');

module.exports = defineConfig(async () => {
  // Dynamically import the ESM-only plugin
  const { default: laravel } = await import('laravel-vite-plugin');

  return {
    plugins: [
      laravel({
        input: [
          'resources/css/app.css',
          'resources/js/app.js',
        ],
        refresh: true,
      }),
    ],
  };
});
