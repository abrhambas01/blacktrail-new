let mix = require('laravel-mix');
require('laravel-mix-tailwind');

/*
|--------------------------------------------------------------------------
| Mix Asset Management		
|-------------------------------------	-------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/

mix.minTemplate = require('laravel-mix-template-minifier');
// mix.js('resources/assets/js/scripts.js', 'public/js')
mix.js('resources/assets/js/app.js', 'public/js')
// .js('resources/assets/js/script.js','public/js')
.sass('resources/assets/sass/app.scss', 'public/css')
.tailwind()
// .browserSync("localhost:8004")


if (mix.inProduction()) {
	mix.minTemplate('storage/framework/views/*.php', 'storage/framework/views/')
}


/*
mix.options({
    hmrOptions: {
        host: 'localhost',  // site's host name
        port: 8004,
    }
});

// // fix css files 404 issue
mix.webpackConfig({
    // add any webpack dev server config here
    devServer: { 
        proxy: {
            host: '0.0.0.0',  // host machine ip 
            port: 8800,
        },
        watchOptions:{
            aggregateTimeout:200,
            poll:5000
        },

    }
});*/