/**
 * 动画效果
 *
 * @风格独特
 */

/**
 * 旋转函数
 */
function mood_animation(point, vue_vm) {
    var $h_before = $('#mood-animation .round3 .before');
    var $h_after = $('#mood-animation .round3 .after');

    var deg = 0 - point / 100 * 360;
    if (point <= 50) {
        $h_before.transition({
            rotate: deg
        }, 1200, 'linear');
    } else {
        $h_before.transition({
            rotate: -180
        }, 800, 'linear', function(){
            $h_before.css('z-index', '3');
            $h_after.css('z-index', '1');
            $h_before.transition({
                rotate: deg
            }, 500, 'linear');
        });
    }

    // 数字变动部分
    var per_time = 1200 / point;
    var interval = setInterval(function() {
        ++vue_vm.percent_dym;
        if (vue_vm.percent_dym >= vue_vm.percent) {
            clearInterval(interval);
            vue_vm.percent_dym = vue_vm.percent;
        }
    }, per_time);
}
