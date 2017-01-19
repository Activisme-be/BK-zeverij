// DEPENDENCIES
// -----------------------------------------
var gulp        = require('gulp');
var sass        = require('gulp-sass');

/**
 * COMMAND: scripts
 */
gulp.task('scripts', function () {
    gulp.src('./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js').pipe(gulp.dest('./assets/js'));
    gulp.src('./resources/js/ie10-viewport-bug-workaround.js').pipe(gulp.dest('./assets/js'));
});

/**
 * COMMAND: sass-watch
 */
gulp.task('sass-watch', function () {
    gulp.watch('./resources/sass/*.scss', ['sass']);
});

/**
 * COMMAND: copy-fonts
 */
gulp.task('copy-fonts', function () {
    gulp.src('./node_modules/bootstrap-sass/assets/fonts/bootstrap/*.{ttf,woff,woff2,eot,svg}').pipe(gulp.dest('./assets/fonts/bootstrap'));
});

/**
 * COMMAND: sass
 */
gulp.task('sass', function () {
    return gulp.src('./resources/sass/*.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./assets/css'));
});
