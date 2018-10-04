"use strict";

var gulp = require('gulp'),
    $ = require('gulp-load-plugins')();

    var config ={
        
    };
    gulp.task('fonts', function(){
        return gulp.src('./node_modules/font-awesome/fonts/**.*')
        .pipe(gulp.dest('fonts'));
    });
    gulp.task('css', function() {
        return gulp.src('scss/meta.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            outputstyle: 'expanded',
        }).on('error', $.sass.logError))
        .pipe($.autoprefixer())
        .pipe($.sourcemaps.write())
        .pipe(gulp.dest('css'))
    });
    gulp.task('watch', function(){
        gulp.watch('scss/**/*.scss',gulp.series('css'))
    });