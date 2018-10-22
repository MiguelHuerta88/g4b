var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('./resources/sass/app.scss');
    mix.scripts(['./resources/js/app.js'], 'public/js/all.js');
});