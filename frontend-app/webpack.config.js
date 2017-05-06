const entries = ['./src/index.js', './src/styles/scss/app.scss']
const Dotenv = require('dotenv-webpack');

module.exports = [
  {
    entry: entries,
    output: {
      path: __dirname + '/dist',
      filename: 'bundle.js'
    },
    module: {
      loaders: [
        {
          test: /\.(js|jsx)$/,
          loader: 'babel-loader',
          exclude: /node_modules/,
          query: {
            presets: ['es2015', 'react', 'stage-0']
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
    },
    resolve: {
      extensions: ['.js', '.jsx']
    },
    plugins: [new Dotenv({
        path: '../backend-app/.env', // Path to .env file (this is the default)
        safe: false // load .env.example (defaults to "false" which does not use dotenv-safe)
      })],
    devtool: 'source-map'
  }
];
