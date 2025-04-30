const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',  // Ensures Blade files are processed
        './resources/js/**/*.js',            // Ensures JS files are processed
        './resources/css/**/*.css'           // Ensures CSS files are processed
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],  // Custom font for sans-serif
            },
            // Add any other customizations you want, such as colors, spacing, etc.
            // For example:
            // colors: {
            //   primary: '#ff6347',  // Custom primary color
            // },
            // spacing: {
            //   128: '32rem',  // Custom spacing (if needed)
            // },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),  // Tailwind Forms plugin for better styling of form controls
    ],
};
