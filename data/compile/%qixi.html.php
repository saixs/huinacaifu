<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<div>
<div style="width: 960px; margin: 0px auto; margin-bottom: 20px;">
<img width="960px" src="/public/images/img1.png" />
<ul>
<? $this->magic_vars['query_type']='getQixiList';$data = array('var'=>'loop');$data['page'] = isset($_REQUEST['page'])?$_REQUEST['page']:'';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::getQixiList($data); $this->magic_vars['loop']['list'] =  $this->magic_vars['magic_result']['list']; $this->magic_vars['loop']['page'] =  $this->magic_vars['magic_result']['page']; $this->magic_vars['loop']['epage'] =  $this->magic_vars['magic_result']['epage']; $this->magic_vars['loop']['total'] =  $this->magic_vars['magic_result']['total']; $this->magic_vars['loop']['showpage'] =  show_pages($this->magic_vars['magic_result']);?>

<?  if(!isset($this->magic_vars['loop']['list']) || $this->magic_vars['loop']['list']=='') $this->magic_vars['loop']['list'] = array();  $_from = $this->magic_vars['loop']['list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<li style="margin-right:30px; float: left; margin-top: 30px;">
		<div style="border: 1px #ccc solid;width: 202px;  height: 202px; padding: 1px 1px;">
			<a target="_blank" href="/<? if (!isset($this->magic_vars['item']['litpic'])) $this->magic_vars['item']['litpic'] = ''; echo $this->magic_vars['item']['litpic']; ?>">
				<img width="202px" height="202px" src="/<? if (!isset($this->magic_vars['item']['litpic'])) $this->magic_vars['item']['litpic'] = ''; echo $this->magic_vars['item']['litpic']; ?>" />
			</a>
		</div>
		<div>
			<table>
				<tr>
					<td width="100px;"><input style="border: 0px; width: 30px;background-color:white" disabled id="id_<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>" value="<? if (!isset($this->magic_vars['item']['times'])) $this->magic_vars['item']['times']=''; ;if (  $this->magic_vars['item']['times'] > 0): ?><? if (!isset($this->magic_vars['item']['times'])) $this->magic_vars['item']['times'] = ''; echo $this->magic_vars['item']['times']; ?><? else: ?>0<? endif; ?>"/>票</td>
					<td style="width:100px;text-align: right"><span onclick="callAJAX(<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>)" style="cursor: pointer; color: blue">给他投票</span></td>
				</tr>
			</table>
		
		</div>
	</li>
<? endforeach; endif; unset($_from); ?>

<? unset($_magic_vars); ?>
<? if (!isset($this->magic_vars['loop']['count'])) $this->magic_vars['loop']['count'] = ''; echo $this->magic_vars['loop']['count']; ?>
</ul>
<div style='clear:both'></div>
</div>
</div>


<script>
function callAJAX(id) {
	htmlobj=$.ajax({url:"/qixi.php?id="+id,async:false});
	
	if (htmlobj.responseText == 1) {
		var id = $('#id_'+id);
		var ov = id.val();
		var num = parseInt(ov)+1;
		id.val(num);
		alert('投票成功');
	} else if (htmlobj.responseText == -1){
		alert('请先登录账号');
	} else if (htmlobj.responseText == -2){
		alert('投票失败,您已经参与过投票.');
	} else if (htmlobj.responseText == -3){
		alert('投票失败,不存在该照片.');
	} else {
		alert('投票失败,更新票数失败.');
	}
	
}


</script>

<? $this->magic_include(array('file' => "new_footer.html", 'vars' => array()));?>