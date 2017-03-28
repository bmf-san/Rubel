const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir((mix) => {
  mix
  //-------------------------------
  // CSS
  //-------------------------------
    .styles('./node_modules/highlight.js/styles/atom-one-dark.css', 'public/css/admin/atom-one-dark.min.css')

  //-------------------------------
  // JavaScript
  //-------------------------------
    .webpack('./client_app/index.js', 'public/js/admin/index.js')
});
