const path = require('path');

module.exports = {
  entry: "./src/index.js",
  output: {
    path: path.join(__dirname, "dist"),
    filename: 'bundle.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "babel-loader",
        query: {
          presets: ['es2015', 'react', 'stage-2']
        }
      }
    ]
  }

  // MEMO: なぜか reduxモジュールがないというエラーがでる。調査する。

  // devServer: {
  //   contentBase: 'public'
  // }
}
