import defaultTheme from 'tailwindcss/defaultTheme';

export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.php",
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
            padding: '16px',

        },
        extend: {
            colors: {
                dark: '#0f172a',
            },
            screens: {
                '2xl': '1610px',
                'md': '768px',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require("daisyui"), require('@tailwindcss/forms')],
    daisyui: {
        themes: ["light", "dark" ], 
        darkTheme: 'light',
        base: true, 
        styled: true,
        utils: true,
        logs: true,
        themeRoot: ":root",
    },
};
