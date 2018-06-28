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
  devtool: "source-map"
};
