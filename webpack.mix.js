let mix = require('laravel-mix');

mix.setPublicPath(path.resolve('./'))

mix.postCss("./source/css/style.css", "css/thelanding.css", [
    require("postcss-import"),
    require("postcss-nesting"),
    require("tailwindcss")
  ]
);

if (mix.inProduction()) {
    mix.version();
}





