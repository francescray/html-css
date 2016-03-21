

// 配置API的base_url
var base_url = '';

/**
 * 获取完整API的URL
 */
function url(uri) {
    return base_url + uri;
}


// 发送合作意向处理
$(function() {
    var dialog = '<div class="coop-dialog"> <table> <tr> <td width="80">联系人：</td> <td><input type="text" name="contacts" id="coop-contacts" /></td> </tr> <tr> <td>联系电话：</td> <td><input type="text" name="phone" id="coop-phone" /></td> </tr> <tr> <td>内容：</td> <td><textarea name="content" rows="7" id="coop-content"></textarea></td> </tr> <tr> <td></td> <td> <button id="coop-submit">发送合作意向</button></td> </tr> </table></div>';

    $('.cooperation-intention').click(function() {
        layer.open({
            title: '发送合作意向',
            type: 1,
            area: ['600px', '360px'],
            shadeClose: true, //点击遮罩关闭
            content: dialog
        });
    });

    $(document).on('click', '#coop-submit', cooperation_send);

    function cooperation_send() {
        var that = this;
        var id = $('.cooperation-intention').attr('data-id');
        var data = {
            phone       : $('#coop-phone').val(),
            contacts    : $('#coop-contacts').val(),
            content     : $('#coop-content').val()
        };

        if (data.contacts == '') {
            layer.msg('联系人不能为空');
            return ;
        } else if (data.phone == '') {
            layer.msg('电话号码不能为空');
            return ;
        } else if (data.content == '') {
            layer.msg('内容不能为空');
            return ;
        } else {}

        // 获取请求的URL
        var uri = url('/cooperation' + URI(location.href).path());

        // 按钮文本处理
        var old = $(this).text();
        $(this).text('发送中...');


        $(document).off('click', '#coop-submit');
        $.ajax({
            type        : 'post',
            url         :  uri,
            data        :  data,
            dataType    : 'json',
            success     : function(response) {
                if (response.code == 0) {
                    layer.closeAll();
                    layer.msg('发送成功');
                } else {
                    layer.msg(response.msg);
                }
            },
            complete    : function() {
                $(that).text(old);
                $(document).on('click', '#coop-submit', cooperation_send);
            }
        })
    }
});


//发送留言
$(function() {
    var lmessage ='<div class="lmessage-dialog"> <table> <tr> <td width="80"><a style="color : red;">*&nbsp;&nbsp;</a>标题：</td> <td><input type="text" name="title" id="lmessage-contacts" /></td> </tr><tr> <td>描述：</td> <td><textarea name="desc" rows="7" id="lmessage-content"></textarea></td> </tr> <tr> <td></td> <td> <button id="lmessage-submit">提交留言</button></td> </tr> </table></div>';
    $('.imessage').click(function(){
        layer.open({
            title : '<div style="text-align:center;  margin-left:10px;" >留言板</div>',
            type  :  1,
            area: ['600px', '360px'],
            shadeClose: true, 
            content: lmessage
        });
    });

    $(document).on('click', '#lmessage-submit', leavemessage_send);

    function leavemessage_send(){
        var that = this;
        var id = $('.imessage').attr('leavedata-id');
        var data = {
            title    : $('#lmessage-contacts').val(),
            desc     : $('#lmessage-content').val()
        };

        if (data.title == '') {
            layer.msg('标题不能为空');
            return ;
        } else {}

        var uri = url('/message/submit' + URI(location.href).path());
        // 按钮文本处理
        var old = $(this).text();
        $(this).text('发送中...');

        $(document).off('click','#lmessage-submit');
        $.ajax({
            type        :  'post',
            url         :   uri,
            data        :   data,
            dataType    :  'json',
            success     : function(response) {
                if (response.code == 0) {
                    layer.closeAll();
                    layer.msg('发送成功');
                } else {
                    layer.msg(response.msg);
                }
            },
            complete    : function() {
                $(that).text(old);
                $(document).on('click', '#lmessage-submit', leavemessage_send);
            }
        })

    }

});

