const path = require('path');
const webpack = require('webpack');

module.exports = {
  entry: './assets/js/index.js',
  output: {
    path: path.resolve(__dirname, 'lib/js'),
    filename: 'index.js'
  },
  plugins: [
    new webpack.ProvidePlugin({
      jQuery: "jquery",
      $: "jquery",
      'window.jQuery': 'jquery',
      Popper: ['popper.js', 'default'],
    })
  ],
};