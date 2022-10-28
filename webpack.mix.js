const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const path = require("path");
require("laravel-mix-purgecss");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/backend/backend.js", "public/backend")
    .options({
        processCssUrls: false,
        postCss: [tailwindcss("./tailwind.config.js")],
        use: {
            loader: "babel-loader",
            options: {
                presets: ["@babel/preset-env"],
            },
        },
    })
    .webpackConfig({
        stats: {
            children: true,
        },
    })
    .postCss("resources/css/backend.css", "public/backend")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .purgeCss()
    .alias({
        ziggy: path.resolve("vendor/tightenco/ziggy/dist"),
    });
