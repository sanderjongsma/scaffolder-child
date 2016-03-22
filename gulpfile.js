var gulp      = require('gulp');
var gutil     = require('gulp-util');
var gulpif    = require('gulp-if');
var sass      = require('gulp-sass');
var concat    = require('gulp-concat');
var minifyCss = require('gulp-minify-css');
var uglify    = require('gulp-uglify');
var merge     = require('merge2');

// Set some defaults
var isLocal = false;

// Check if local environment
if(gutil.env.local === true) {
    isLocal = true;
}

// Styles
gulp.task('styles', function() {
    var cssFiles = [
        'assets/vendor/fancybox/source/jquery.fancybox.css',
        'assets/vendor/bxslider-4/dist/jquery.bxslider.css',
    ];

    var scssFiles = [
        'assets/scss/style.scss'
    ];

    var file = isLocal
        ? gulp.src(['assets/scss/style.scss'])
        : merge( gulp.src(cssFiles), gulp.src(scssFiles) );

    return file
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('style.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('assets/build/css'));
});

// Scripts
gulp.task('scripts', function() {
    var jsFiles = [
        'assets/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        'assets/vendor/html5shiv/dist/html5shiv.min.js',
        'assets/vendor/modernizr/modernizr.js',
        'assets/vendor/respond/dest/respond.min.js',
        'assets/vendor/enquire/dist/enquire.min.js',
        'assets/vendor/bxslider-4/dist/jquery.bxslider.min.js',
        'assets/vendor/fancybox/source/jquery.fancybox.pack.js',
        'assets/vendor/fitvids/jquery.fitvids.js',
        'assets/js/functions.js',
    ];

    var file = isLocal
        ? ['assets/js/functions.js']
        : jsFiles;

    return gulp.src(file)
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