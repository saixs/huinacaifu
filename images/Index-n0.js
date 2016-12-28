///首页Index JS代码
$(document).ready(function () {
   
    window.setInterval(SetRemainTime, 1000);
    $("#aFinishedLoans").click(function () {
        //        $("#divLoans").hide();
        //        $("#divFinishedLoans").show();
        //        $(this).removeClass("jiekuaning");
        //        $(this).addClass("jiekuaning2");
        //        $("#aLoans").removeClass("jiekuaning2");
        //        $("#aLoans").addClass("jiekuaning");
        //        $("#aLoan").attr("href", "/Loan/Finished?page=2");
        //        $("#moreLoans a").attr("href", "/Loan/Finished?page=2");
        //        $("#SortDiv").hide();
        setActiveTags("aFinishedLoans");
        SetUnactiveTags("aCrazy", "aLoans");
    });
    $("#aLoans").click(function () {
        //        $(this).removeClass("jiekuaning");
        //        $(this).addClass("jiekuaning2");
        //        $("#aFinishedLoans").removeClass("jiekuaning2");
        //        $("#aFinishedLoans").addClass("jiekuaning");
        //        $("#divFinishedLoans").hide();
        //        $("#divLoans").show();
        //        $("#aLoan").attr("href", "/Loan?page=2");
        //        $("#moreLoans a").attr("href", "/Loan?page=2");
        //        $("#SortDiv").show();

        setActiveTags("aLoans");
        SetUnactiveTags("aCrazy", "aFinishedLoans");
    });
    $("#aCrazy").click(function () {
        setActiveTags("aCrazy");
        SetUnactiveTags("aLoans", "aFinishedLoans");
        //        $(this).removeClass("jiekuaning");
        //        $(this).addClass("jiekuaning2");
        //        $("#aFinishedLoans").removeClass("jiekuaning2");
        //        $("#aFinishedLoans").addClass("jiekuaning");
        //        $("#divFinishedLoans").hide();
        //        $("#divLoans").show();
        //        $("#aLoan").attr("href", "/Loan?page=2");
        //        $("#moreLoans a").attr("href", "/Loan?page=2");
        //        $("#SortDiv").show();
    });

    function setActiveTags(tagName) {
        if (tagName.indexOf("#") < 0) {
            tagName = "#" + tagName;
        }
        $(tagName).removeClass("jiekuaning");
        $(tagName).addClass("jiekuaning2");
        var divName = tagName.replace("#a", "#div");
        $(divName).show();
        switch (tagName) {
            case "#aLoans":
                $("#aLoan").attr("href", "/Loan?page=2");
                $("#moreLoans a").attr("href", "/Loan?page=2");
                $("#SortDiv").show();
                break;
            case "#aCrazy":
                $("#aLoan").attr("href", "/Loan/CrazyProduct?page=2");
                $("#moreLoans a").attr("href", "/Loan/CrazyProduct?page=2");
                break;
            default:
                $("#aLoan").attr("href", "/Loan/Finished?page=2");
                $("#moreLoans a").attr("href", "/Loan/Finished?page=2");
                $("#SortDiv").hide();
                break;
        }
    }
    function SetUnactiveTags(tagName1, tagName2) {
        if (tagName1.indexOf("#") < 0) {
            tagName1 = "#" + tagName1;
        }
        if (tagName2.indexOf("#") < 0) {
            tagName2 = "#" + tagName2;
        }
        $(tagName1 + "," + tagName2).removeClass("jiekuaning2");
        $(tagName1 + "," + tagName2).addClass("jiekuaning");
        var divName1 = tagName1.replace("#a", "#div");
        var divName2 = tagName2.replace("#a", "#div");
        $(divName1 + "," + divName2).hide();
    }

    //点击排序
    //0/1(升序/降序)& //时间 = 1, 进度 = 2, 信用度 = 3, 利率 = 4, 金额 = 5, 期限 = 6
    $("#LiDefault,#LiDate,#LiProgress,#LiRate,#LiMoney,#LiTimeLimit,#LiCredit").click(function () {
        //var isDesc = $(this).find("img").attr("src") == "/Areas/Site/Content/Images2/selectTop.jpg" ? "1" : "0";
        var isDesc = $(this).attr("class") == "li-sc bg1" ? "1" : "0";
        var sortBit;
        switch ($(this).attr("id")) {
            case "LiDefault": sortBit = 0; break;
            case "LiDate": sortBit = 1; break;
            case "LiProgress": sortBit = "jindu_down"; break;
            case "LiCredit": sortBit = "credit_down"; break;
            case "LiRate": sortBit = "apr_down"; break;
            case "LiMoney": sortBit = "account_down"; break;
            case "LiTimeLimit": sortBit = 6; break;
            default: break;
        }
        location.href = "/invest/index.html?invest&order=" + sortBit;
    });

    //排序hover样式
    /*$("#LiDefault,#LiDate,#LiProgress,#LiRate,#LiMoney,#LiTimeLimit,#LiCredit").hover(
    function () {
    $(this).removeClass("defaultSort");
    $(this).addClass("selectedSort");
    $(this).find("img").attr("src", "/Areas/Site/Content/Images2/selectTop.jpg");
    },
    function () {
    $(this).removeClass("selectedSort");
    $(this).addClass("defaultSort");
    $(this).find("img").attr("src", "/Areas/Site/Content/Images2/Top.jpg");
    }
    );*/

    //给选中的排序方式 添加样式
    //0:默认排序,1:投标时间升序,2:投票时间降序
    var locationHref = location.href;
    var Start = location.href.indexOf("&");
    //如果不存在点击排序，提交地址中没有&符号 ，则不需要显示选中排序样式
    if (Start != "-1") {
        var IsDesc = locationHref.substr(Start - 1, 1); //0:升序,1:降序
        var SortType = locationHref.substr(Start + 1, 1); //排序类型
        var idName = "#LiDefault";
        var title = ""
        switch (SortType) {
            case "1": idName = "#LiDate"; title = "发布时间"; break;
            case "2": idName = "#LiProgress"; title = "投标进度"; break;
            case "3": idName = "#LiCredit"; title = "借款信用"; break;
            case "4": idName = "#LiRate"; title = "投标利率"; break;
            case "5": idName = "#LiMoney"; title = "投标金额"; break;
            case "6": idName = "#LiTimeLimit"; title = "投标期限"; break;
            default:
        }
        //$(idName).removeClass("defaultSort");
        //$(idName).addClass("selectedSort");

        $(idName).unbind("mouseenter mouseleave");
        if (idName == "#LiDefault") {
            $(idName).addClass("selectedSort").unbind("mouseenter mouseleave");
        } else {
            if (IsDesc == "0") {
                $(idName).removeClass("li-sc bg2");
                // $(idName).attr("title", title + "由高到低").find("img").attr("src", "/Areas/Site/Content/Images2/selectTop.jpg");         
                $(idName).attr("title", title + "由低到高").attr("class", "li-sc bg1");
            }
            else {
                // $(idName).attr("title", title + "由低到高").find("img").attr("src", "/Areas/Site/Content/Images2/selectBottom.jpg");
                $(idName).removeClass("li-sc bg1");
                $(idName).attr("title", title + "由高到低").attr("class", "li-sc bg2");
            }
            if (IsDesc)
                location.href = "#loan";
        }
    }
    else {
        $("#LiDefault").addClass("selectedSort").unbind("mouseenter mouseleave").unbind("click");
    }
});

function SetRemainTime() {
    $("span[id^=spanLoading_]").each(function () {
        var id = $(this).attr("id").split('_')[1];
        var test = parseInt($('#txtDiff_' + id).val());
        var day = Math.floor(test / 3600 / 24);
        var hour = Math.floor(test % (3600 * 24) / 3600);
        var min = Math.floor(test % 3600 / 60);
        var second = test % 3600 % 60;
        var time_left = day + '天' + hour + '小时' + min + '分' + second + '秒';
        $('#spanLoading_' + id).text(time_left);
        $('#txtDiff_' + id).val(test - 1);
    });
    $("span[id^=spanCrazyLoading_]").each(function () {
        var id = $(this).attr("id").split('_')[1];
        var test = parseInt($('#txtCrazyLoadDiff_' + id).val());
        var day = Math.floor(test / 3600 / 24);
        var hour = Math.floor(test % (3600 * 24) / 3600);
        var min = Math.floor(test % 3600 / 60);
        var second = test % 3600 % 60;
        var time_left = day + '天' + hour + '小时' + min + '分' + second + '秒';
        $('#spanCrazyLoading_' + id).text(time_left);
        $('#txtCrazyLoadDiff_' + id).val(test - 1);
    });
}

$(function () {//滚动
    var _wrap = $('ul.mulitline');
    var _interval = 3000;
    var _moving;
    _wrap.hover(function () {
        clearInterval(_moving);
    }, function () {
        _moving = setInterval(function () {
            var _field = _wrap.find('li:first');
            var _h = _field.height();
            _field.animate({ marginTop: -_h + 'px' }, 500, function () {
                _field.css('marginTop', 0).appendTo(_wrap);
            })
        }, _interval)
    }).trigger('mouseleave');
});

//change-links

function showOrder(type, thisC, thisList) {
    var allInputObject = document.getElementById("Title").getElementsByTagName("li");
    for (var i = 0; i < allInputObject.length; i++) {
        if (i == allInputObject.length - 1)
            allInputObject[i].className = "hilast";
        else if (i == 0)
            allInputObject[i].className = "hifirst";
        else
            allInputObject[i].className = "hi";
    }
    thisC.className = "cu";
    var alldiv = document.getElementById("List").getElementsByTagName("div");
    for (var i = 0; i < alldiv.length; i++) {
        alldiv[i].style.display = "none";
    }
    document.getElementById(thisList).style.display = ''; //兼容ie，Firefox
}



