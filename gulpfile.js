var gulp = require('gulp');
var browserSync = require('browser-sync');
gulp.task('reload', function () {
    browserSync.reload();
});

gulp.task('serve', function () {
    browserSync({
        server: 'app'
    });
    gulp.watch('app*.html', ['reload']);
});

gulp.task('default',['serve']);