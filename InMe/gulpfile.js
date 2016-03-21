/**
 * gulp
 */
var gulp        = require('gulp'),
    watch       = require('gulp-watch'),
    imagemin    = require('gulp-imagemin'),
    minifycss   = require('gulp-minify-css'),
    uglify      = require('gulp-uglify'),
    rename      = require('gulp-rename'),
    concat      = require('gulp-concat'),
    clean       = require('gulp-clean'),
    cache       = require('gulp-cache'),
    fileinclude = require('gulp-file-include'),
    browserSync = require('browser-sync').create(),
    reload      = browserSync.reload;

// 路径的定义
var path = {
    'html'  : {
        'src'   : 'src/**/*.html',
        'dest'  : 'public/'
    },
    'css'   : {
        'src'   : 'src/css/*.css',
        'dest'  : 'public/css'
    },
    'js'    : {
        'src'   : 'src/js/*.js',
        'dest'  : 'public/js'
    },
    'image' : {
        'src'   : 'src/img/**/*',
        'dest'  : 'public/img'
    },
    'lib'   : {
        'src'   : 'src/lib/**/*',
        'dest'  : 'public/lib',
    }
}

// 启动browser-sync服务器
gulp.task('browser-sync', function() {
    browserSync.init({
        // proxy: "http://inme.lc.te168.cn"
        server : {
            baseDir : './'
        }
    });
});

// HTML处理
gulp.task('html', function() {
    gulp.src(path.html.src)
        .pipe(fileinclude())
        .pipe(cache(gulp.dest(path.html.dest)))
        .pipe(reload({stream : true}));
});

// CSS处理
gulp.task('css', function() {
    gulp.src(path.css.src)
        .pipe(concat('all.css'))
        .pipe(rename({suffix : '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest(path.css.dest))
        .pipe(reload({stream : true}));
});

// JS处理
gulp.task('js', function() {
    gulp.src(path.js.src)
        .pipe(rename({suffix : '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(path.js.dest))
        .pipe(reload({stream : true}));
});

// 图片处理
gulp.task('image', function() {
    gulp.src(path.image.src)
        .pipe(cache(imagemin()))
        .pipe(gulp.dest(path.image.dest));
});

// 库的处理
gulp.task('lib', function() {
    gulp.src(path.lib.src)
        .pipe(gulp.dest(path.lib.dest));
});

// 清理任务
gulp.task('clean', function() {
    var dest = 'public/*';
    gulp.src(dest)
        .pipe(clean());
    cache.clearAll();
});

// 默认启动的
gulp.task('default', function() {
    gulp.start('html', 'css', 'js', 'image', 'lib');
});

// 监控任务
gulp.task('watch', ['browser-sync'], function() {
    watch(path.css.src, function() {
        gulp.start('css');
    });

    watch(path.js.src, function() {
        gulp.start('js');
    });

    watch(path.image.src, function() {
        gulp.start('image');
    });

    watch(path.html.src, function() {
        gulp.start('html');
    });

    // watch(path.html.watch, reload);
});
