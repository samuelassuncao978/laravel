const mix = require('laravel-mix');
// require("laravel-mix-clean");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.ts('resources/js/app.js', 'public/js')
    .react()
    .postCss('resources/css/app.css', 'public/css', [require('tailwindcss')]);

mix.version();

// mix.js("resources/js/app.js", "public/js")
//     .react()
//     .postCss("resources/css/app.css", "public/css", [require("tailwindcss"), require("autoprefixer")])
//     .copy("resources/favicons", "public/favicons")
//     .copy("resources/audio", "public/audio")
//     .copy("resources/images", "public/images")
//     .copy("resources/schemas", "public/schemas")
//     .clean({
//         cleanOnceBeforeBuildPatterns: ["**/*", "!index.php", "!robots.txt", "!web.config", "!.htaccess"],
//     });
