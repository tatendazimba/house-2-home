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

mix.scripts([
    "node_modules/jquery/dist/jquery.js",
    "node_modules/materialize-css/dist/js/materialize.js"
    ], 'public/js/app.js')
    .styles([
        "node_modules/materialize-css/dist/css/materialize.css",
        "node_modules/animate.css/animate.min.css",
        "resources/css/colours.css",
        "resources/css/text.css",
        "resources/css/tooltip.css",
        "resources/css/gradients.css",
        "resources/css/buttons.css",
        "resources/css/styles.css",
    ], "public/css/app.css")
   .sass('resources/sass/app.scss', 'public/css');
