$(function() {
	// 切换文章和问答
	$('.front-cover .container .search .search-option .select').ready(function() {
			var X = $('.front-cover .container .search .search-option .select').offset().left;
			var pianyi=$('.front-cover .container .search .search-option .select').css('width');
			var pp=parseInt(X)+parseInt(pianyi)/2-15;
			$('.front-cover .container .search .arrow .sbottom').css({left:pp});
	})
	$('.front-cover .container .search .search-option > div').click(function() {
		if (! $(this).hasClass('select')) {
			$('.front-cover .container .search .search-option > div').removeClass('select');
			$(this).addClass('select');
		}
		if ($(this).hasClass('select')) {
			var X = $(this).offset().left;
			var pianyi=$('.front-cover .container .search .search-option .select').css('width');
			var pp=parseInt(X)+parseInt(pianyi)/2-15;
			$('.front-cover .container .search .arrow .sbottom').css({left:pp});
		}
	})
	$('.front-cover  .container .search .center .search-botton').click(function() {
		window.location.href="http://www.baidu.com";
	})
});