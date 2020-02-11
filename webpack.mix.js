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
    .sass('resources/sass/app.scss', 'public/css')




    mix.styles([

        'resource/css/libs/blog-post.css',
        'resource/css/libs/bootstrap.css',
        'resource/css/libs/font-awesome.css',
        'resource/css/libs/metisMenu.css',
        'resource/css/libs/sb-admin-2.css',
        'resource/css/libs/styles.css'
    ],'.public/css/libs.css');

    mix.scripts([

        'resource/js/libs/bootstrap.js',
        'resource/js/libs/jquery.js',
        'resource/js/libs/metisMenu.js',
        'resource/js/libs/sb-admin-2.js',
        'resource/js/libs/scripts.js'

    ],'.public/js/libs.js');


