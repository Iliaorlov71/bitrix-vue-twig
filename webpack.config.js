// webpack.config.js
let Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
// directory where all compiled assets will be stored
    .setOutputPath('./local/build/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/local/build/')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // copy images from assets to build
    .addPlugin(new CopyWebpackPlugin([
        { from: './local/assets/images', to: 'images' }
    ]))

    // Adds a JavaScript file that should be webpacked: will output as local/build/main.js
    .addEntry('main', './local/assets/scripts/main.js')

    .enableVueLoader()

    // Adds a CSS/SASS/LESS file that should be webpacked: will output as local/build/global.css
    .addStyleEntry('global', './local/assets/styles/global.scss')

    // allow sass/scss files to be processed
    .enableSassLoader(() => {}, {resolveUrlLoader: false})
    .enablePostCssLoader()


  // allow legacy applications to use $/jQuery as a global variable
    //.autoProvidejQuery()

    // you can use this method to provide other common global variables,
    // such as '_' for the 'underscore' library
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
        BX: 'BX',
        'window.BX': 'BX'
    })

    .enableSourceMaps(!Encore.isProduction())

    // https://webpack.js.org/plugins/define-plugin/
    .configureDefinePlugin((options) => {
        options.DEBUG = !Encore.isProduction();
    })

    // create hashed filenames (e.g. main.abc123.css)

    .configureFilenames({
        js: '[name].[hash:8].js',
    })

    .enableVersioning()

    // show local build notifications
    .enableBuildNotifications()
;

var config = Encore.getWebpackConfig();
config.externals = {
    jquery: 'jQuery',
    BX: 'BX'
};


// export the final configuration
module.exports = config;
