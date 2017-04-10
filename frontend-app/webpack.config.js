module.exports = [
  {
    entry: ['./src/index.js'],
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
        }
      ]
    },
    resolve: {
      extensions: ['.js', '.jsx']
    },
    devtool: 'source-map'
  }
];
