const webpack = require('webpack');

module.exports = {
    module: {
        loaders: [
            {
                test: /\.vue$/, loader: 'vue'
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                loader: 'babel'
            }
        ]
    },
    babel: {
        presets: ['es2015'],
        plugins: ['transform-runtime']
    }
};
