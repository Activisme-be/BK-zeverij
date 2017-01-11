// DEPENDENCIES
// -----------------------------------------
var gulp        = require('gulp');
var sass        = require('gulp-sass');

/**
 *
 */
gulp.task('default', function () {

});

/**
 *
 */
gulp.task('clean', function () {

});

/**
 *
 */
gulp.task('scripts', function () {
    return gulp.src('./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js')
        .pipe(gulp.dest('./assets/js'));
});

/**
 *
 */
gulp.task('scss:watch', function () {

});

/**
 *
 */
gulp.task('copy-fonts', function () {
    
});

/**
 * COMMAND:
 */
gulp.task('sass', function () {
    return gulp.src('./resources/sass/master.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./assets/css'));
});
