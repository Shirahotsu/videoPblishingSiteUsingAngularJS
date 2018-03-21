
var gulp = require('gulp'),
    gpConcat = require('gulp-concat');

gulp.task('js', function () {
    return gulp.src(['app/**/routing.js', 'app/**/!(routing)*.js'])
        .pipe(gpConcat('script.js'))
        .pipe(gulp.dest('app/main'))
});

gulp.task('watchjs' , function () {
    gulp.watch(['app/**/routing.js', 'app/**/!(routing)*js'], ['js']);
});