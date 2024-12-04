import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'body': [
                    'Nunito Sans', 
                    'ui-sans-serif', 
                    'system-ui', 
                    '-apple-system', 
                    'system-ui', 
                    'Segoe UI', 
                    'Roboto', 
                    'Helvetica Neue', 
                    'Arial', 
                    'Noto Sans', 
                    'sans-serif', 
                    'Apple Color Emoji', 
                    'Segoe UI Emoji', 
                    'Segoe UI Symbol', 
                    'Noto Color Emoji'
                ]
            },
            colors: {
                primary: {"50":"#f0fdfa","100":"#ccfbf1","200":"#99f6e4","300":"#5eead4","400":"#2dd4bf","500":"#14b8a6","600":"#0d9488","700":"#0f766e","800":"#115e59","900":"#134e4a","950":"#042f2e"}
            },
        },
    },
    plugins: [
        require('flowbite/plugin'), require('flowbite-typography'),
    ],
    safelist: ['bg-green-100', 'bg-red-100', 'bg-blue-100', 'bg-yellow-100'],
    
};
