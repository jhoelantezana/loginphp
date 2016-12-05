var     gulp    =  require('gulp'),
        sass    = require('gulp-sass'),
        ts      = require('gulp-typescript'),
        cssnano = require('gulp-cssnano');


gulp.task('sass',()=>{
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cssnano({
            autoprefixer:{
                add: true,
                browsers: 'last 2 versions'
            }
        }))
        .pipe(gulp.dest('./assets/css'));
});


gulp.task('script',()=>{
    return gulp.src('./assets/ts/**/*.ts')
        .pipe(ts({
            noImplicitAny: true,
            // out: 'output.js'
        }))
        .pipe(gulp.dest('./assets/script'));
});


gulp.task('watchs',()=>{
    gulp.watch('./assets/scss/**/*.scss',['sass']);
    gulp.watch('./assets/ts/**/*.ts',['script']);
});


gulp.task('default',()=>{
    gulp.start('watchs');
});