/**
 * 通用的JS处理文件
 *
 * @author 风格独特
 */


// 配置API的base_url
var base_url = 'http://test.inmeapp.com:40100';


/**
 * 获取完整API的URL
 */
function url(uri) {
    return base_url + '/app/' + uri;
}

/**
 * 根据usertype转换为用户typename
 */
function userTypename(usertype) {
    var user = {
        '0' : '普通用户',
        '1' : 'InMe咨询师',
        '2' : 'InMe达人',
        '3' : 'InMe心迹官方'
    }
    if (typeof(user[usertype]) == "undefined") {
        return '';
    } else {
        return user[usertype];
    }
}

/**
 * 根据usertype转换为用户typeclass
 */
function userTypeclass(usertype) {
    return 'usertype-' + usertype;
}

/*
 * 获取get参数
 */
function getUrlParam(name){
    var regexS = "[\\?&]"+name+"=([^&#]*)" ;
    var regex = new RegExp( regexS ) ;
    var tmpURL = window.location.href ;
    var results = regex.exec( tmpURL ) ;
    if( results == null ) {
        return "" ;
    }
    else {
        return results[1] ;
    }
}


/**
 * 时间戳的处理
 */
Date.prototype.format = function(format) {
    var o = {
        'M+': this.getMonth() + 1,
        // month
        'd+': this.getDate(),
        // day
        'h+': this.getHours(),
        // hour
        'm+': this.getMinutes(),
        // minute
        's+': this.getSeconds(),
        // second
        'q+': Math.floor((this.getMonth() + 3) / 3),
        // quarter
        'S': this.getMilliseconds()
        // millisecond
    };
    if (/(y+)/.test(format) || /(Y+)/.test(format)) {
        format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
    }
    for (var k in o) {
        if (new RegExp('(' + k + ')').test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ('00' + o[k]).substr(('' + o[k]).length));
        }
    }
    return format;
};

function timestampformat(timestamp, format) {
    return (new Date(timestamp * 1000)).format(format);
}

function toFixed(num, fix) {
    var temp = new Number(num);
    return temp.toFixed(fix);
}

Vue.filter('timestampformat', timestampformat);
Vue.filter('userTypename', userTypename);
Vue.filter('userTypeclass', userTypeclass);
Vue.filter('toFixed', toFixed);

// 处理title
var vm_title = new Vue({
    el : '#title',
    data : {
        title : ''
    }
});

// 处理微信ios下无法动态修改title的BUG
vm_title.$watch('title', function() {
    var $iframe = $('<iframe width="0" height="0" src="img/static/logo.png"></iframe>').on('load', function() {
        setTimeout(function() {
            $iframe.off('load').remove()
        }, 0)
    }).appendTo($('body'));
});

// 增加FastClick
$(function() {
   FastClick.attach(document.body);
});
