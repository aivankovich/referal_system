const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const fs = require('fs')
const autoprefixer = require('autoprefixer');
const webpack = require('webpack');


function generateHtmlPlugins(templateDir) {
    const templateFiles = fs.readdirSync(path.resolve(__dirname, templateDir));
    return templateFiles.map(item => {
        const parts = item.split('.');
    const name = parts[0];
    const extension = parts[1];
    return new HtmlWebpackPlugin({
        filename: `${name}.html`,
        template: path.resolve(__dirname, `${templateDir}/${name}.${extension}`),
        inject: false,
    })
})
}

const htmlPlugins = generateHtmlPlugins('./src/html/views');

module.exports = {
    entry: [
        './src/js/index.js',
        './src/scss/style.scss'
    ],
    output: {
        filename: './js/script.js'
    },
    devServer: {
        overlay: true,
    },
    devtool: "source-map",
    module: {
        rules: [{
            test: /\.js$/,
            include: path.resolve(__dirname, 'src/js'),
            use: {
                loader: 'babel-loader',
                options: {
                    presets: [
                        ['@babel/preset-env', {
                            modules: false
                        }],
                    ],
                    plugins: ['@babel/plugin-proposal-class-properties'],
                }
            }
        },
            {
                test: /\.(sass|scss)$/,
                include: path.resolve(__dirname, 'src/scss'),
                use: [{
                    loader: MiniCssExtractPlugin.loader,
                    options: {}
                },
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: true,
                            url: false
                        }
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            ident: 'postcss',
                            sourceMap: true,
                            plugins: () => [
                            autoprefixer({
                                browsers: ['ie >= 9', 'last 4 version']
                            }),
                            require('cssnano')({
                                preset: ['default', {
                                    discardComments: {
                                        removeAll: true,
                                    },
                                }]
                            })
                        ]
                    }
            },
            {
                loader: "sass-loader",
                options: {
                    sourceMap: true
                }
            }
        ]
    },
{
    test: /\.html$/,
        include: path.resolve(__dirname, 'src/html/includes'),
    use: ['raw-loader']
},
]
},
resolve: {
    alias: {
        "./dependencyLibs/inputmask.dependencyLib": "./dependencyLibs/inputmask.dependencyLib.jquery"    }
},
plugins: [
    new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery",
        'window.jQuery': 'jquery',
    }),
    new MiniCssExtractPlugin({
        filename: "./css/style.css"
    }),
    new CopyWebpackPlugin([{
        from: './src/fonts',
        to: './fonts'
    },
        {
            from: './src/favicon',
            to: './favicon'
        },
        {
            from: './src/img',
            to: './img'
        },
        {
            from: './src/uploads',
            to: './uploads'
        }
    ]),
].concat(htmlPlugins)
};