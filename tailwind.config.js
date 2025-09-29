/** @type {import('tailwindcss').Config} */

module.exports = {
    prefix: 'astro-mark-',
    darkMode: 'selector', // or 'media' or 'class',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
}
