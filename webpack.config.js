const path = require('path');

module.exports = {
    mode: 'development',
    entry: './resources/assets/js/compiler.js',
    output: {
        filename: 'compiler.js',
        path: path.resolve(__dirname, './public/dist/js'),
    },
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: ['style-loader', 'css-loader', 'postcss-loader'],
            },
        ],
    },
};