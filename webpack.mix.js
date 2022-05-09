const mix = require('laravel-mix');
const config = require('./webpack.config');

mix
    .js('resources/js/app.js', 'public/js/app.js')
    .sass('resources/sass/app.sass', 'public/css')
    .version()
    .vue()
    //.browserSync('http://127.0.0.1:8000')
    .webpackConfig({
        resolve: config.resolve,
    })
;
