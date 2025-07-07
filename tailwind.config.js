import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'rgba(99, 102, 241, 0.8)',  // indigo-500 with opacity
                secondary: 'rgba(236, 72, 153, 0.8)', // pink-500 with opacity
                glass: {
                    DEFAULT: 'rgba(255, 255, 255, 0.1)',
                    dark: 'rgba(0, 0, 0, 0.1)'
                }
            },
            backdropBlur: {
                xs: '2px',
                sm: '4px',
                md: '8px',
                lg: '12px'
            },
            boxShadow: {
                'glass': '0 4px 30px rgba(0, 0, 0, 0.1)',
            },
            borderColor: {
                'glass': 'rgba(255, 255, 255, 0.3)'
            }
        },
    },

    plugins: [
        forms,
        require('tailwindcss-filters'), // For better backdrop-filter support
    ],
};