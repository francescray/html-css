/**
 * gulpfile
 *
 * @author 风格独特
 */

var gulp        = require('gulp'),
    imagemin    = require('gulp-imagemin'),
    uglify      = require('gulp-uglify'),
    cssnano     = require('gulp-cssnano'),
    rename      = require('gulp-rename'),
    concat      = require('gulp-concat'),
    clean       = require('gulp-clean'),
    cache       = require('gulp-cache'),
    browserSync = require('browser-sync').create(),
    reload      = browserSync.reload;

// 路径的定义
var path = {
    'html'  : {
        'src'   : '*.html',
        'dest'  : ''
    },
    'css'   : {
        'src'   : 'src/css/*.css',
        'dest'  : 'css'
    },
    'js'    : {
        'src'   : 'src/js/*.js',
        'dest'  : 'js'
    },
    'image' : {
        'src'   : 'src/img/**/*',
        'dest'  : 'public/static/img'
    }
}

// 启动browser-sync服务器
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});

gulp.task('default', function() {

});