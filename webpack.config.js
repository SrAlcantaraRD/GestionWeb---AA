var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('public/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // allow legacy applications to use $/jQuery as a global variable
    // .autoProvidejQuery()


    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    // .enableBuildNotifications()

    // enable source maps during development
    .enableSourceMaps(!Encore.isProduction())

    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // will create public/build/app.js and public/build/app.css
    .addEntry('app', ['./assets/js/app.js','./assets/sass/main.scss'])
    .addEntry('materialize', './assets/js/materialize.min.js')

    // allow sass/scss files to be processed
    .enableSassLoader()


    .enableReactPreset()
;

module.exports = Encore.getWebpackConfig();
