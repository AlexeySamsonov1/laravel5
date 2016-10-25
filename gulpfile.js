const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ],  'resources/assets/css')
    .webpack('app.js');

    mix.styles([
        //'library/bootstrap.min.css',
        'app.css',
        'library/select2.min.css'
    ]);

    mix.scripts([
        'library/jquery.min.js',
        'library/bootstrap.min.js',
        'library/select2.min.js'
    ]);
});
