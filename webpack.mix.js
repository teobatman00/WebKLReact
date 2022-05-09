const loader = require('css-loader');
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

mix.ts("resources/js/app.tsx","public/js").react()
    .disableNotifications()
    .browserSync({
      proxy: "localhost:8000",
      browser: "chrome.exe"
    });

mix.webpackConfig({
  mode: "development",
  resolve: {
    extensions: [".ts", ".tsx", ".js", ".css", ".scss"]
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        exclude: /node_modules/,
        use: [
          {loader: 'typings-for-css-modules-loader'},
          {
            loader: 'css-loader', 
            options: {
              modules: {
                localIdentName: "[name]_[hash:base64]",
                auto: true
              },
              importLoaders: 1
            }
          },
          {loader: 'style-loader'}
        ]
      }
    ]
  }
});
