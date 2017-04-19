module.exports = [
  {
    "entry": {
      "app": "./resources/assets/js/app.js",
      "home": ["./resources/assets/js/home/index.js"],
      "post": ["./resources/assets/js/post/index.js", "./resources/assets/js/post/show.js"]
    },
    "output": {
      path: __dirname + '/public/dist',
      filename: '[name].bundle.js'
    },
    module: {
      loaders: [
        {
          test: /\.html$/,
          loader: 'html-loader'
        }, {
          test: /\.css$/,
          loaders: ['style-loader', 'css-loader']
        }, {
          test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
          loader: 'url-loader?mimetype=image/svg+xml'
        }, {
          test: /\.woff(\d+)?(\?v=\d+\.\d+\.\d+)?$/,
          loader: 'url-loader?mimetype=application/font-woff'
        }, {
          test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
          loader: 'url-loader?mimetype=application/font-woff'
        }, {
          test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
          loader: 'url-loader?mimetype=application/font-woff'
        }
      ]
    }
  }
];
