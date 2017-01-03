const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir.config.sourcemaps = false;

elixir((mix) => {
    mix
        .webpack('admin/main.js', 'public/js/admin/main.js')
});
