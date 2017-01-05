const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir((mix) => {
  mix
    .webpack('./resources/assets/js/admin/app.js', 'public/js/admin/app.js')
});
