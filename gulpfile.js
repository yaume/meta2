"use strict";

var gulp = require('gulp'),
    $ = require('gulp-load-plugins')();
    var sassOptions = {
        errLogToConsole: true,
        outputStyle: 'expanded'
      };

    gulp.task('fonts', function(){
        return gulp.src('./node_modules/font-awesome/fonts/**.*')
        .pipe(gulp.dest('fonts'));
    });
    gulp.task('css', function() {
        return gulp.src('scss/meta.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass(sassOptions).on('error', $.sass.logError))
        .pipe($.autoprefixer({
            grid : true
        }))
        .pipe($.sourcemaps.write('css/maps'))
        .pipe(gulp.dest('css'))
    });
    gulp.task('watch', function(){
        gulp.watch('scss/**/*.scss',gulp.series('css'))
    });