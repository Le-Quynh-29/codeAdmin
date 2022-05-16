const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

//************** SCRIPTS ******************
mix.copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'public/js');
mix.copy('node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.vi.min.js', 'public/js');
mix.copy('node_modules/jquery-validation/dist/jquery.validate.min.js', 'public/js');

//************** CSS/SCSS ******************
mix.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css', 'public/css');
mix.copy('node_modules/jquery-datetimepicker/build/jquery.datetimepicker.min.css', 'public/css');

//*************** BACKEND ******************

//*************** CSS ******************
mix.js('resources/css/animate.css', 'public/css');
mix.js('resources/css/bootstrap.css', 'public/css');
mix.js('resources/css/custom.css', 'public/css');
mix.js('resources/css/export.css', 'public/css');
mix.js('resources/css/font-awesome.css', 'public/css');
mix.js('resources/css/graph.css', 'public/css');
mix.js('resources/css/jqcandlestick.css', 'public/css');
mix.js('resources/css/monthly.css', 'public/css');
mix.js('resources/css/owl.carousel.css', 'public/css');
mix.js('resources/css/SidebarNav.min.css', 'public/css');
mix.js('resources/css/style.css', 'public/css');

//*************** JS ******************
mix.js('resources/js/amcharts.js', 'public/js');
mix.js('resources/js/bootstrap.js', 'public/js');
mix.js('resources/js/Chart.bundle.js', 'public/js');
mix.js('resources/js/Chart.js', 'public/js');
mix.js('resources/js/chartinator.js', 'public/js');
mix.js('resources/js/classie.js', 'public/js');
mix.js('resources/js/custom.js', 'public/js');
mix.js('resources/js/export.min.js', 'public/js');
mix.js('resources/js/index.js', 'public/js');
mix.js('resources/js/index1.js', 'public/js');
mix.js('resources/js/index2.js', 'public/js');
mix.js('resources/js/jquery.flot.js', 'public/js');
mix.js('resources/js/jquery.jqcandlestick.min.js', 'public/js');
mix.js('resources/js/jquery.nicescroll.js', 'public/js');
mix.js('resources/js/jquery-1.11.1.min.js', 'public/js');
mix.js('resources/js/light.js', 'public/js');
mix.js('resources/js/metisMenu.min.js', 'public/js');
mix.js('resources/js/modernizr.custom.js', 'public/js');
mix.js('resources/js/monthly.js', 'public/js');
mix.js('resources/js/owl.carousel.js', 'public/js');
mix.js('resources/js/pie-chart.js', 'public/js');
mix.js('resources/js/scripts.js', 'public/js');
mix.js('resources/js/serial.js', 'public/js');
mix.js('resources/js/SidebarNav.min.js', 'public/js');
mix.js('resources/js/SimpleChart.js', 'public/js');
mix.js('resources/js/utils.js', 'public/js');
mix.js('resources/js/validator.min.js', 'public/js');

//*************** OTHER ******************
mix.copy('resources/images', 'public/images');
mix.copy('resources/fonts', 'public/fonts');
