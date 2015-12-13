var mGulp = require('gulp');
 
// 引入gulp组件（插件）
var mUglify = require('gulp-uglify');
var mRename = require('gulp-rename');
 
// 定义gulp任务
mGulp.task('minjs', function() {
	// 源地址
	mGulp.src('./*.html')
	// 压缩
	.pipe(mUglify({
		// 保留部分注释
		preserveComments: 'some',
	}))
	// 重命名
	.pipe(mRename({
		// 文件后缀
		extname: '.min.html',
	}))
	// 目标地址
	.pipe(mGulp.dest('./'));
});