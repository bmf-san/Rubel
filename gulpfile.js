const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir((mix) => {
    mix
       .webpack('admin/dashboard.js', 'public/js/admin/dashboard.js');
});
