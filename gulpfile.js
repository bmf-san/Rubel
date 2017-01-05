const elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir((mix) => {
    mix
        // .webpack('./resources/assets/js/admin/main.js', 'public/js/admin/main.js')
});
