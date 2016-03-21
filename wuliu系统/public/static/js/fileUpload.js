/**
 * 基于百度Web Uploader的封装
 *
 * @author 风格独特
 * @package http://fex.baidu.com/webuploader
 */

// 初始化Web Uploader
var uploader = WebUploader.create({
    // 选完文件后，是否自动上传。
    auto: true,
    // swf文件路径
    swf: 'http:///cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',
    // 文件接收服务端。
    server: '/user',
    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker',
    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    }
});
// 当有文件添加进来的时候
uploader.on( 'fileQueued', function( file ) {
    var $li = $(
        '<div id="' + file.id + '" class="file-item thumbnail">' +
        '<img>' +
        '<div class="del">删除</div>' +
        '</div>');
    var $img = $li.find('img');

    // $list为容器jQuery实例
    $('#fileList').append($li);

    // 创建缩略图
    // 如果为非图片文件，可以不用调用此方法。
    // thumbnailWidth x thumbnailHeight 为 100 x 100
    uploader.makeThumb( file, function( error, src ) {
        if ( error ) {
            $img.replaceWith('<span>浏览器版本过低，不能预览</span>');
            return;
        }
        $img.attr( 'src', src );
    }, 80, 80);
});