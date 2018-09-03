var gulp        = require('gulp');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var connectPHP  = require('gulp-connect-php');

var paths = {
  php: ['config/**/*.php', 'app/**/*.php'],
  html: ['resources/views/**/*.html'],
  css: ['public/css/**/*.css'],
  js: ['public/js/**/*.js']
};

gulp.task('php', function(){
    gulp.src(paths.php)
        .pipe(reload({ stream:true }));
});

gulp.task('watcher',function(){
    gulp.watch(paths.css).on('change', function () {
      browserSync.reload();
    });
    gulp.watch(paths.php).on('change', function () {
      browserSync.reload();
    });
    gulp.watch(paths.js).on('change', function () {
      browserSync.reload();
    });
    gulp.watch(paths.html).on('change', function () {
      browserSync.reload();
    });
});

gulp.task('php', function() {
  connectPHP.server({ base: './', port: 8080, keepalive: true}, function (){
    browserSync({
      proxy: 'localhost:8080'
    });
  });
});

gulp.task('default', ['php', 'watcher']);