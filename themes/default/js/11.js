function jisuan(aa,xx)
{
	var tt=aa*(100-xx)/100;
	document.write(tt);
}
function fene(aa,xx)
{
	var tt=aa/10;
	tt=xx/tt;
	document.write(tt);
}
function fenqian(aa)
{
	var tt=aa/10;
	document.write(tt);
}
function timezhuan(test)
{
	    var day = Math.floor(test / 3600 / 24);
        var hour = Math.floor(test % (3600 * 24) / 3600);
        var min = Math.floor(test % 3600 / 60);
        var second = test % 3600 % 60;
        var time_left = day + '天' + hour + '小时' + min + '分' + second + '秒';
		document.write(time_left);
}
