module.exports = {
  entry: './public/js/app.js',
  output: {
    path: __dirname + "/public/js/bundle",
    filename: "app.js"
  },
  mode: "development",
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      }
    ]
  },
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
    }
  },
  devtool: "source-map"
};
