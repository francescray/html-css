/**
 * 微信相关的封装
 */

// 微信分享
var path_url = window.location.href.split('#')[0];
$.ajax({
    type: "GET",
    url: "http://wechat.inmeapp.com/InMeH5Promotion/injectWechatJsApiConfig",
    data: {'url':path_url},
    async: true,
    dataType: "json",
    success: function(wechatData){
        // initWechat(wechatData.config, 'http://wechat.inmeapp.com/', '我是InMe咨询师', '内容介绍', 'http://inme.com/aa.png');
        eval(wechatData.config);
    }
});

function initWechat(share) {
    var title = typeof(share.title) != 'undefined' ? share.title : document.title;
    var desc = typeof(share.desc) != 'undefined' ? share.desc : '';
    var img = typeof(share.img) != 'undefined' ? share.img : 'http://picproc.inmeapp.com/wechatshare/inme_512.png';
    var link = typeof(share.link) != 'undefined' ? share.link : path_url;

    wx.ready(function() { //成功
        wx.onMenuShareAppMessage({//分享给朋友
            title : title, // 分享标题
            desc : desc, // 分享描述
            link : link, // 分享链接
            imgUrl : img,// 分享图标
            type : 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl : '', // 如果type是music或video，则要提供数据链接，默认为空
            success : function() {
                // 用户确认分享后执行的回调函数
            },
            cancel : function() {
                // 用户取消分享后执行的回调函数
            }
        });

        wx.onMenuShareTimeline({//分享到朋友圈
            title : title, // 分享标题
            desc : desc, // 分享描述
            link : link, // 分享链接
            imgUrl : img,// 分享图标
            type : 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl : '', // 如果type是music或video，则要提供数据链接，默认为空
            success : function() {
                // 用户确认分享后执行的回调函数
            },
            cancel : function() {
                // 用户取消分享后执行的回调函数
            }
        });
    });

    wx.error(function(res) {//失败
        // alert(JSON.stringify(res));
    });
}

//initWechat({
//    title : '标题',
//    desc : '内容',
//    img : 'http://inmeapp.com/logo.png'
//});
