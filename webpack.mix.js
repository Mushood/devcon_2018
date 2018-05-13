let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('resources/assets/css/bootstrap.min.css', 'public/css/bootstrap.min.css');
mix.copy('resources/assets/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

mix.copy('resources/assets/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js');
mix.copy('resources/assets/js/clean-blog.min.js', 'public/js/clean-blog.min.js');
mix.copy('resources/assets/js/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('resources/assets/js/jqBootstrapValidation.min.js', 'public/js/jqBootstrapValidation.min.js');