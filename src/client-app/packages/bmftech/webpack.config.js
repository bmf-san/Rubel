const ExtractTextPlugin = require("extract-text-webpack-plugin")

module.exports = [
  {
    "entry": {
      "home": ["./resources/assets/js/home/index.js"],
      "post": ["./resources/assets/js/post/show.js"],
      "app": ["./resources/assets/js/app.js"]
    },
    "output": {
      path: __dirname + "/public/dist/js",
      filename: "[name].bundle.js"
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
          loader: "html-loader"
        }, {
          test: /\.css$/,
          loaders: ["style-loader", "css-loader"]
        }, {
          test: /\.scss$/,
          loader: ["style-loader", "css-loader", "sass-loader"]
        }, {
          test: /\.sass$/,
          loader: ["style-loader", "css-loader", "sass-loader"]
        }, {
          test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
          loader: "url-loader?mimetype=image/svg+xml"
        }, {
          test: /\.woff(\d+)?(\?v=\d+\.\d+\.\d+)?$/,
          loader: "url-loader?mimetype=application/font-woff"
        }, {
          test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
          loader: "url-loader?mimetype=application/font-woff"
        }, {
          test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
          loader: "url-loader?mimetype=application/font-woff"
        }, {
          test: /\.js$/,
          exclude: /node_modules/,
          loader: "eslint-loader",
          options: {
            configFile: "./.eslintrc.js"
          }
        }
      ]
    }
  }, {
    entry: {
      category: ["./resources/assets/scss/category/index.scss"],
      home: ["./resources/assets/scss/home/index.scss"],
      post: [
        "./resources/assets/scss/post/index.scss", "./resources/assets/scss/post/show.scss"
      ],
      profile: ["./resources/assets/scss/profile/index.scss"],
      tag: ["./resources/assets/scss/tag/index.scss"],
      app: ["./resources/assets/scss/app.scss"]
    },
    output: {
      path: __dirname + "/public/dist/css",
      filename: "[name].min.css"
    },
    module: {
      rules: [
        {
          test: /\.scss$/,
          use: ExtractTextPlugin.extract({
            fallback: "style-loader",
            use: ["css-loader", "sass-loader"]
          })
        }
      ]
    },
    plugins: [new ExtractTextPlugin("[name].min.css")]
  }
]
