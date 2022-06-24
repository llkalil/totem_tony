const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    content: [
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        'sm:max-w-2xl',
        'border-red-300',
        'text-red-900',
        'placeholder-red-300',
        'focus:border-red-300',
        'focus:ring-red',
        'sm:max-w-md',
        'md:max-w-xl',
        'lg:max-w-3xl',
        'xl:max-w-5xl',
        '2xl:max-w-7xl',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
