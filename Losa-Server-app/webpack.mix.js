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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/sb-admin-2.js', 'public/js')
   .js('resources/js/chartjs.js', 'public/js')
   .sass('resources/sass/login.scss', 'public/css')
   .sass('resources/sass/spinner.scss', 'public/css')
   .sass('resources/sass/sb-admin-2.scss', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');

mix.browserSync('http://losa.test')

if (mix.inProduction()) {
   mix.version();
}