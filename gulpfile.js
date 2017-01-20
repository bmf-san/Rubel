const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir((mix) => {
  mix
    //-------------------------------
    // CSS
    //-------------------------------
    .styles('./node_modules/highlight.js/styles/default.css', 'public/css/admin/monokai.min.css')

    //-------------------------------
    // JavaScript
    //-------------------------------
    .webpack('./resources/assets/js/admin/index.js', 'public/js/admin/index.js')
});
