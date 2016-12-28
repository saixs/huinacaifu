
/*
@description:广告图片交叉渐显渐隐
@parm="imgsArr":传入图片数组参数
@parm="Nums":传入小数字导航数组参数
@example：
var xsfade = XsFade(document.getElementById("SlidePlayer").getElementsByTagName("img"),Nums);
*/ 
var XsFade = function(imgsArr, Nums) {
    var imgs = null, current = 0, nIndex = 0;
    var pause = false;
    var stime = 6000; //图片间隔时间
    var _timer = null;
    var _timerFade = null;
 
    //fade init 
    this.init = function() {
        imgs = imgsArr;
        if (imgs == null || imgs.length == 0)
            return;
        if (imgs.length == 1 && Nums.length == 1) {
            Nums[0].style.display = "none";
            imgs[0].style.display = "block";
            imgs[0].xOpacity = 0.99;
            return;
        }
        for (i = 1; i < imgs.length; i++) {
            imgs[i].xOpacity = 0;
            //imgs[i].onmouseover = this.Stop;
            //imgs[i].onmouseout = play;
        }
        imgs[0].style.display = "block";
        imgs[0].xOpacity = 0.99;

        _timer = setTimeout(play, stime);
    }

    play = function() {

        cOpacity = imgs[current].xOpacity;

        nIndex = imgs[current + 1] ? current + 1 : 0;

        nOpacity = imgs[nIndex].xOpacity;

        cOpacity -= 0.05;
        nOpacity += 0.05;

        if (cOpacity < 0.7 && cOpacity > 0.6) {
            Each(Nums, function(o, i) {
                o.className = nIndex == i ? "current" : "";
            })

        }
        imgs[nIndex].style.display = "block";
        imgs[current].xOpacity = cOpacity;
        imgs[nIndex].xOpacity = nOpacity;

        setOpacity(imgs[current]);
        setOpacity(imgs[nIndex]);


        if (cOpacity <= 0) {
            if (pause) {
                clearTimeout(_timer);
                return;
            }
            imgs[current].style.display = "none";
            current = nIndex;

            _timer = setTimeout(play, stime);
        } else {
            _timerFade = setTimeout(play, 30);
        }
    }
    setOpacity = function(obj) {
        if (obj.xOpacity > 0.99) {
            obj.xOpacity = 0.99;
            return;
        }
        obj.style.opacity = obj.xOpacity;
        obj.style.MozOpacity = obj.xOpacity;
        obj.style.filter = "alpha(opacity=" + (obj.xOpacity * 100) + ")";
    }
    this.SetPlayIndex = function(index) {
        current = index - 1 < 0 ? imgs.length - 1 : index - 1;
        for (i = 1; i < imgs.length; i++) {
            imgs[i].xOpacity = 0;
            imgs[i].style.display = "none";
        }
        imgs[current].style.display = "block";
        imgs[current].xOpacity = 0.99;
        this.Stop();
        play();

    }
    this.Resume = function(index) {
        this.Stop();
        pause = false;
        play();
    }
    this.Stop = function() {
        pause = true;
        clearTimeout(_timer);
        clearTimeout(_timerFade);
    }
    this.GetIndex = function() {
        return current;
    }
    this.SetIndex = function(index) {
        current = index;
    }
}