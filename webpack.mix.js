const mix = require('laravel-mix');
const config = require('./webpack.config');

mix
    .js('resources/js/app.js', 'public/js/app.js')
    .sass('resources/sass/app.sass', 'public/css')
    .version()
    .vue()
    .webpackConfig({
        resolve: config.resolve,
    })
;
