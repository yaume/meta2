"use strict";

var gulp = require('gulp'),
    $ = require('gulp-load-plugins')();
var    sassdoc = require('sassdoc');
    var sassOptions = {
        errLogToConsole: true,
        outputStyle: 'expanded'
      };
    var sassdocOptions = {
        dest: 'css/sassdoc'
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
        .pipe(sassdoc(sassdocOptions))
        .resume()
    });
    gulp.task('watch', function(){
        gulp.watch('scss/**/*.scss',gulp.series('css'))
    });