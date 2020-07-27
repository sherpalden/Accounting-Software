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
   .sass('resources/sass/app.scss', 'public/css');




// bootstrap css
// mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'resources/assets/css/bootstrap.min.css');




// jquery
// mix.copy('node_modules/jquery/dist/jquery.min.js', 'resources/assets/js/jquery.min.js');




// css mix
// mix.styles(['resources/assets/bootstrap/css/bootstrap.css', 'resources/assets/node-waves/waves.css', 
// 	'resources/assets/animate-css/animate.css', 'resources/assets/morrisjs/morris.css', 
// 	'resources/assets/css/style.css', 'resources/assets/css/themes/all-themes.css'], 
// 	'public/css/all.css');


// // js mix
// mix.scripts(['resources/assets/jquery/jquery.js', 'resources/assets/bootstrap/js/bootstrap.js', 
// 	'resources/assets/bootstrap-select/js/bootstrap-select.js', 
// 	'resources/assets/jquery-slimscroll/jquery.slimscroll.js', 'resources/assets/node-waves/waves.js', 
// 	'resources/assets/jquery-countto/jquery.countTo.js', 'resources/assets/raphael/raphael.js', 
// 	'resources/assets/morrisjs/morris.js', 'resources/assets/chartjs/Chart.bundle.js', 
// 	'resources/assets/flot-charts/jquery.flot.js', 'resources/assets/flot-charts/jquery.flot.resize.js', 
// 	'resources/assets/flot-charts/jquery.flot.pie.js', 'resources/assets/flot-charts/jquery.flot.categories.js', 
// 	'resources/assets/flot-charts/jquery.flot.time.js', 'resources/assets/jquery-sparkline/jquery.sparkline.js', 
// 	'resources/assets/js/admin.js', 'resources/assets/js/pages/index.js', 'resources/assets/js/demo.js'], 
// 	'public/js/all.js');