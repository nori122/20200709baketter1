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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// webpack.mix.js (新しく作った jQuery, vanilla のソースコードのパスを追加)
mix.js([
        'resources/js/app.js',
        'resources/js/assets/test02_jquery.js',
    ], 'public/js/app.js')
    .js('resources/js/assets/test02_vanilla.js', 'public/js/')
    .sass('resources/sass/app.scss', 'public/css');