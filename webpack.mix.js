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

mix.webpackConfig({
    output: {
        filename: '[name].js',
        chunkFilename: '[id].js',
        publicPath: 'js/',
        path: path.resolve(__dirname, 'public/js/')
    }
});

/*
Mix.listen('configReady', webpackConfig => {
    // Exclude vuetify folder from default sass/scss rules
    const sassConfig = webpackConfig.module.rules.find(
        rule =>
        String(rule.test) ===
        String(/\.sass$/)
    );

    const scssConfig = webpackConfig.module.rules.find(
        rule =>
        String(rule.test) ===
        String(/\.scss$/)
    );

    sassConfig.exclude.push(path.resolve(__dirname, 'node_modules/vuetify'))
    scssConfig.exclude.push(path.resolve(__dirname, 'node_modules/vuetify'))
});*/

module.exports = {
    rules: [{
        test: /\.s(c|a)ss$/,
        use: [
            'vue-style-loader',
            'css-loader',
            {
                loader: 'sass-loader',
                // Requires sass-loader@^7.0.0
                options: {
                    implementation: require('sass'),
                    fiber: require('fibers'),
                    indentedSyntax: true // optional
                },
                // Requires sass-loader@^8.0.0
                options: {
                    implementation: require('sass'),
                    sassOptions: {
                        fiber: require('fibers'),
                        indentedSyntax: true // optional
                    },
                },
            },
        ],
    }, ],
}

mix.js('resources/js/app.js', 'public/js');
/*.webpackConfig({
    plugins: [
        new VuetifyLoaderPlugin({
            options: {}
        }),
    ]
})
.version()
.sourceMaps()*/
//  .sass('resources/sass/app.scss', 'public/css');