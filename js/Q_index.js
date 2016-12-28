$(document).ready(function () {


    $("#myImgJsEffect_leftButtom").click(function () {


        $("#myImgJsEffect_show_pic").css("display", "none");
        $("#myImgJsEffect_show_pic_cancel").css("display", "none");

        var tempTop = $("#myImgJsEffect").offset().top;        //获得最大div 的坐标
        var tempLeft = $("#myImgJsEffect").offset().left;        //获得最大div 的坐标
        //alert(tempTop+"///"+tempLeft);


        if ($("#myImgJsEffect_center_b").is(":hidden")) {          //判断隐藏

            $("#myImgJsEffect_center_a").css("position", "relative");
            $("#myImgJsEffect_center_b").css("position", "absolute");

            $("#myImgJsEffect_center_b").css("left", tempLeft + 1000);
            $("#myImgJsEffect_center_b").css("top", "0");

            $("#myImgJsEffect_center_a").animate(
                {left: '-900px', opacity: '0.1'}, 1000, function () {

                    $("#myImgJsEffect_center_b").css("position", "relative");
                    $("#myImgJsEffect_center_a").css("display", "none");
                    $("#myImgJsEffect_center_b").css("display", "block");

                    $("#myImgJsEffect_center_b").animate({top: 0, left: 0, opacity: '1'}, 1000);


                });//animate end


        } else {


            $("#myImgJsEffect_center_b").css("position", "relative");
            $("#myImgJsEffect_center_a").css("position", "absolute");

            $("#myImgJsEffect_center_a").css("left", tempLeft + 1000);
            $("#myImgJsEffect_center_a").css("top", "0");

            $("#myImgJsEffect_center_b").animate(
                {left: '-900px', opacity: '0.1'}, 1000, function () {

                    $("#myImgJsEffect_center_a").css("position", "relative");
                    $("#myImgJsEffect_center_b").css("display", "none");
                    $("#myImgJsEffect_center_a").css("display", "block");

                    $("#myImgJsEffect_center_a").animate({top: 0, left: 0, opacity: '1'}, 1000);


                });//animate end


        } //if end

    });//click  end


    //////////////////////////////

    $("#myImgJsEffect_rightButtom").click(function () {


        $("#myImgJsEffect_show_pic").css("display", "none");
        $("#myImgJsEffect_show_pic_cancel").css("display", "none");

        var tempTop = $("#myImgJsEffect").offset().top;        //获得最大div 的坐标
        var tempLeft = $("#myImgJsEffect").offset().left;        //获得最大div 的坐标
        //alert(tempTop+"///"+tempLeft);


        if ($("#myImgJsEffect_center_b").is(":hidden")) {          //判断隐藏

            $("#myImgJsEffect_center_a").css("position", "relative");
            $("#myImgJsEffect_center_b").css("position", "absolute");

            $("#myImgJsEffect_center_b").css("left", tempLeft - 1000);
            $("#myImgJsEffect_center_b").css("top", "0");

            $("#myImgJsEffect_center_a").animate(
                {left: tempLeft + 1900, opacity: '0.1'}, 1000, function () {

                    $("#myImgJsEffect_center_b").css("position", "relative");
                    $("#myImgJsEffect_center_a").css("display", "none");
                    $("#myImgJsEffect_center_b").css("display", "block");

                    $("#myImgJsEffect_center_b").animate({top: 0, left: 0, opacity: '1'}, 1000);


                });//animate end


        } else {


            $("#myImgJsEffect_center_b").css("position", "relative");
            $("#myImgJsEffect_center_a").css("position", "absolute");

            $("#myImgJsEffect_center_a").css("left", tempLeft - 1000);
            $("#myImgJsEffect_center_a").css("top", "0");

            $("#myImgJsEffect_center_b").animate(
                {left: tempLeft + 1900, opacity: '0.1'}, 1000, function () {

                    $("#myImgJsEffect_center_a").css("position", "relative");
                    $("#myImgJsEffect_center_b").css("display", "none");
                    $("#myImgJsEffect_center_a").css("display", "block");

                    $("#myImgJsEffect_center_a").animate({top: 0, left: 0, opacity: '1'}, 1000);


                });//animate end


        } //if end

    });//click  end


    /////////////////////////////点击小图片查看


    /*function showPic(evement) {

        var bodyWidth = document.body.clientWidth;
        var bodyHeight = document.body.clientHeight;
        //$("#myImgJsEffect_background").css("width",bodyWidth);
        //$("#myImgJsEffect_background").css("height",bodyHeight);
        //$("#myImgJsEffect_background").css("width",bodyWidth);
        //$("#myImgJsEffect_background").css("height",bodyHeight);
        //var picArray=evement.toArray();
        //$("#myImgJsEffect_show_pic").animate({left:bodyWidth/2-200,top:bodyHeight/2-150});


        evement.click(function () {

            //$("#myImgJsEffect_background").css("display","block");                    //遮蔽层显示
            //$("#myImgJsEffect_background").css("width",bodyWidth);                    //遮蔽层的宽度
            //$("#myImgJsEffect_background").css("height",bodyHeight);                  //遮蔽层的高度

            $("#myImgJsEffect_show_pic").css("left", bodyWidth / 2 - 350);                  ////图片区的位置
            $("#myImgJsEffect_show_pic").css("top", bodyHeight / 2 - 850);

            var tempSrc = $(this).attr("src");                                      //获取当前图片的路劲大小 等会儿传给图片区
            var tempWidth = $(this).attr("width") * 8;
            var tempHeight = $(this).attr("height") * 8;
            $("#myImgJsEffect_show_pic").attr("width", tempWidth);
            $("#myImgJsEffect_show_pic").attr("height", tempHeight);
            $("#myImgJsEffect_show_pic img").attr("src", tempSrc);
            $("#myImgJsEffect_show_pic img").attr("width", tempWidth);
            $("#myImgJsEffect_show_pic img").attr("height", tempHeight);

            $("#myImgJsEffect_show_pic").css("z-index", "99");


            $("#myImgJsEffect_show_pic").fadeIn("slow", function () {


                $("#myImgJsEffect_show_pic_cancel").css("display", "block");
                $("#myImgJsEffect_show_pic_cancel").css("z-index", "101");
                $("#myImgJsEffect_show_pic_cancel").css("left", bodyWidth / 2 - 360);
                $("#myImgJsEffect_show_pic_cancel").css("top", bodyHeight / 2 - 860);
            });


        })//click end


    }


    showPic($("#myImgJsEffect_center_a img"));
    showPic($("#myImgJsEffect_center_b img"));

    $("#myImgJsEffect_show_pic_cancel").click(function () {

        $(this).css("display", "none");
        $("#myImgJsEffect_show_pic").css("display", "none");


    });*/


});



		
			  
