const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.setPublicPath('public_html/');
mix.js('resources/js/chatApp.js', 'js')
    .vue()
    .sass('resources/sass/chatApp.scss', 'css');
