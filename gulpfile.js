const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir((mix) => {
  mix
    .webpack('./resources/assets/js/admin/index.js', 'public/js/admin/index.js')
});
