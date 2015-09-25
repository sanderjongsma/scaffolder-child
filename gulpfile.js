var gulp = require('gulp');
var sass = require('gulp-sass');

// Styles
gulp.task('styles', function() {
    gulp.src('./style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('.'));
});

// Watch
gulp.task('watch', function() {
    gulp.watch('**/*.scss',['styles']);
});

// Default
gulp.task('default', function() {

});