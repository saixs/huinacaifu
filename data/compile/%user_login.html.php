<? $this->magic_include(array('file' => "../default/header.html", 'vars' => array()));?>
<link type="text/css" rel="stylesheet" href="/public/css/css.css" />
<script type="text/javascript">
    
    function fleshVerify(){
        var timenow = new Date().getTime();
        document.getElementById('valimg').src= '/plugins/index.php?q=imgcode&t='+timenow;
    }

    function changeVerifyCode(){

        window.clearInterval(intv);
        fleshVerify();
    }
    var intv = window.setInterval("changeVerifyCode()",1000);
    
</script>



<div class="main1">
<div class="main3">
<div class="hyzc">
<div class="dl-bt">
<h1>汇纳财富通行证</h1>
</div>



<div class="dl-nr">
<div class="dl-left">
<form action="/index.php?user&q=action/login" method="post" class="login_form">
      <div class="login_form_tit">会员登录</div>
      <p>
          
        <input name="keywords" type="text" class="input1" value="请输入您的用户名" onFocus="if(value==defaultValue){value='';this.style.color='#333'}" onBlur="if(!value){value=defaultValue;this.style.color='#bbb'}"  />
        
      </p>
      <p>
        <input name="password" type="password" class="input2" value=""  />
      </p>
     <p>
         
        <input name="valicode" type="text" class="input3" value="验证码" onFocus="if(value==defaultValue){value='';this.style.color='#333'}" onBlur="if(!value){value=defaultValue;this.style.color='#bbb'}"  />
        
        <span class="ico"><a href="#"><img id='valimg'src="/plugins/index.php?q=imgcode" alt="点击刷新" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer;height:26px;width:66px;"  /></a></span>
        <span class="sp1"><a href="#"   onClick="document.getElementById('valimg').src='/plugins/index.php?q=imgcode&t=' + Math.random();">看不清楚？换张图片</a></span>
      </p>
      <p class="p2">请填写图片中的字符,不区分大小写</p>
    
      <p>
        <input name="" type="submit" class="input4" value="立即登录" /> &nbsp; <a href="/user/getpwd.html">忘记密码？</a></p>
      	还没有汇纳财富帐号？<a style="color: yellowgreen; font-weight: bold;" href="/user/reg.html">免费注册</a>
    </form>
</div>
<div class="dl-right">
<h1>还没有汇纳通行证</h1>
<input type="button" class="anniu" value="立即注册" onclick="window.location.href='/user/reg.html';return false;" style="cursor:pointer;"/>
</div>
</div>



</div>
</div>
</div>

<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>