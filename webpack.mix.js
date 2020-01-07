const mix = require('laravel-mix');

mix
    .js("node_modules/jquery/dist/jquery.js", 'public/js/jquery.js')
    .js('node_modules/materialize-css/dist/js/materialize.js', 'public/js/materialize.js')
    .js('node_modules/exif-js/exif.js', 'public/js/exif.js')
    .js("resources/js/zoomOnHover.js", 'public/js/zoomOnHover.js')
    .js("resources/js/slick.min.js", 'public/js/app.js')
    .js("resources/js/ImageUploader.js", 'public/js/ImageUploader.js')
    .js("resources/js/app.js", 'public/js/app.js')
    .styles([
        "node_modules/materialize-css/dist/css/materialize.css",
        "node_modules/animate.css/animate.min.css",
        "resources/css/zoomOnHover.css",
        "resources/css/colours.css",
        "resources/css/text.css",
        "resources/css/tooltip.css",
        "resources/css/gradients.css",
        "resources/css/buttons.css",
        "resources/css/slick-theme.css",
        "resources/css/styles.css",
    ], "public/css/app.css")
    .styles(["node_modules/materialize-css/dist/css/materialize.css"],
        "public/css/materialize.css")
    .version();

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
