var gulp = require('gulp');
var sass = require('gulp-sass');

// Styles
gulp.task('styles', function() {
    return gulp.src('assets/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/build/css'));
});

// Scripts
gulp.task('scripts', function() {
    return gulp.src('assets/js/functions.js')
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