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
mix.options({
    processCssUrls: false
});

mix.js(['resources/js/jquery-3.3.1.slim.min.js',
        'resources/js/popper_1_14_0.min.js',
        'resources/js/bootstrap_4_1_0.min.js',
        'resources/js/jquery_3_2_1.min.js',
        'resources/js/mdb_4_5_4.min.js'
        ], 'public/js/app.js');

mix.styles(['resources/css/bootstrap_4_1_0.min.css',

        'resources/css/mdb_4_5_4.min.css',
        'resources/css/mycss.css'
        ], 'public/css/styles.css');

mix.styles('resources/css/font-awesome_4_7_0.min.css','public/css/styles2.css');
