var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var merge = require('merge2');

var cssFiles = [
    'assets/vendor/fancybox/source/jquery.fancybox.css',
    'assets/vendor/bxslider-4/dist/jquery.bxslider.css',
];

var scssFiles = [
    'assets/scss/style.scss'
];

var jsFiles = [
    'assets/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    'assets/vendor/html5shiv/dist/html5shiv.min.js',
    'assets/vendor/modernizr/modernizr.js',
    'assets/vendor/respond/dest/respond.min.js',
    'assets/vendor/enquire/dist/enquire.min.js',
    'assets/vendor/bxslider-4/dist/jquery.bxslider.min.js',
    'assets/vendor/fancybox/source/jquery.fancybox.pack.js',
    'assets/vendor/fitvids/jquery.fitvids.js',
];

// Styles
gulp.task('styles', function() {
    var mergedFiles = merge(
        gulp.src(cssFiles),
        gulp.src(scssFiles).pipe(sass().on('error', sass.logError))
    );

    return mergedFiles
        .pipe(concat('style.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('assets/build/css'));
});

// Scripts
gulp.task('scripts', function() {
    return gulp.src(jsFiles)
        .pipe(concat('functions.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/build/js'));
});

// Watch
gulp.task('watch', function() {
    gulp.watch('assets/scss/**/*.scss', ['styles']);
    gulp.watch('assets/js/**/*.js', ['scripts']);
});

// Default
gulp.task('default', function() {
    gulp.start('styles', 'scripts');
});