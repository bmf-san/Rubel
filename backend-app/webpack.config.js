module.exports = [
  {
    "entry": {
      "app": ["./resources/assets/js/app.js"],
      "home": ["./resources/assets/js/home/index.js"],
      "post": [
        "./resources/assets/js/post/index.js", "./resources/assets/js/post/show.js"
      ],
      "category": ["./resources/assets/js/category/index.js"],
      "tag": ["./resources/assets/js/tag/index.js"],
      "profile": ["./resources/assets/js/profile/index.js"],
      "contact": ["./resources/assets/js/contact/index.js"]
    },
    "output": {
      path: __dirname + '/public/dist',
      filename: '[name].bundle.js'
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          loader: "eslint-loader",
          exclude: /(node_modules)/,
          options: {
            fix: true,
            failOnError: true
          }
        }, {
          test: /\.html$/,
          loader: 'html-loader'
        }, {
          test: /\.css$/,
          loaders: ['style-loader', 'css-loader']
        }, {
          test: /\.scss$/,
          loader: ['style-loader', 'css-loader', 'sass-loader']
        }, {
          test: /\.sass$/,
          loader: ['style-loader', 'css-loader', 'sass-loader']
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
