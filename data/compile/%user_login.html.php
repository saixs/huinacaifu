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
<h1>���ɲƸ�ͨ��֤</h1>
</div>



<div class="dl-nr">
<div class="dl-left">
<form action="/index.php?user&q=action/login" method="post" class="login_form">
      <div class="login_form_tit">��Ա��¼</div>
      <p>
          
        <input name="keywords" type="text" class="input1" value="�����������û���" onFocus="if(value==defaultValue){value='';this.style.color='#333'}" onBlur="if(!value){value=defaultValue;this.style.color='#bbb'}"  />
        
      </p>
      <p>
        <input name="password" type="password" class="input2" value=""  />
      </p>
     <p>
         
        <input name="valicode" type="text" class="input3" value="��֤��" onFocus="if(value==defaultValue){value='';this.style.color='#333'}" onBlur="if(!value){value=defaultValue;this.style.color='#bbb'}"  />
        
        <span class="ico"><a href="#"><img id='valimg'src="/plugins/index.php?q=imgcode" alt="���ˢ��" onClick="this.src='/plugins/index.php?q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer;height:26px;width:66px;"  /></a></span>
        <span class="sp1"><a href="#"   onClick="document.getElementById('valimg').src='/plugins/index.php?q=imgcode&t=' + Math.random();">�������������ͼƬ</a></span>
      </p>
      <p class="p2">����дͼƬ�е��ַ�,�����ִ�Сд</p>
    
      <p>
        <input name="" type="submit" class="input4" value="������¼" /> &nbsp; <a href="/user/getpwd.html">�������룿</a></p>
      	��û�л��ɲƸ��ʺţ�<a style="color: yellowgreen; font-weight: bold;" href="/user/reg.html">���ע��</a>
    </form>
</div>
<div class="dl-right">
<h1>��û�л���ͨ��֤</h1>
<input type="button" class="anniu" value="����ע��" onclick="window.location.href='/user/reg.html';return false;" style="cursor:pointer;"/>
</div>
</div>



</div>
</div>
</div>

<? $this->magic_include(array('file' => "../default/new_footer.html", 'vars' => array()));?>