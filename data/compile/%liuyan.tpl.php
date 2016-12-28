<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new" ||  $this->magic_vars['_A']['query_type'] == "edit"): ?>
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	<div class="module_title"><strong>留言</strong></div>
	
	<div class="module_border">
		<div class="l">标题：</div>
		<div class="c">
			<input type="text" name="title"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['title'])) $this->magic_vars['_A']['liuyan_result']['title'] = ''; echo $this->magic_vars['_A']['liuyan_result']['title']; ?>" size="30" />  
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类别：</div>
		<div class="c">
			<select name="type">
			<?  if(!isset($this->magic_vars['_A']['liuyan_type_list']) || $this->magic_vars['_A']['liuyan_type_list']=='') $this->magic_vars['_A']['liuyan_type_list'] = array();  $_from = $this->magic_vars['_A']['liuyan_type_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
			<option value="<? if (!isset($this->magic_vars['item'])) $this->magic_vars['item'] = ''; echo $this->magic_vars['item']; ?>" <? if (!isset($this->magic_vars['item'])) $this->magic_vars['item']='';if (!isset($this->magic_vars['_A']['liuyan_result']['type'])) $this->magic_vars['_A']['liuyan_result']['type']=''; ;if (  $this->magic_vars['item']== $this->magic_vars['_A']['liuyan_result']['type']): ?> selected="selected"<? endif; ?>><? if (!isset($this->magic_vars['item'])) $this->magic_vars['item'] = ''; echo $this->magic_vars['item']; ?></option>
		
		<? endforeach; endif; unset($_from); ?>
		</select>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] == 0): ?>checked="checked"<? endif; ?>/>隐藏 <input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']='';if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] ==1 || $this->magic_vars['_A']['liuyan_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>显示 </div>
	</div>
	
	<div class="module_border">
		<div class="l">姓名：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['name'])) $this->magic_vars['_A']['liuyan_result']['name'] = ''; echo $this->magic_vars['_A']['liuyan_result']['name']; ?>" size="20" />
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">EMAIL:</div>
		<div class="c">
			<input type="text" name="email"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['email'])) $this->magic_vars['_A']['liuyan_result']['email'] = ''; echo $this->magic_vars['_A']['liuyan_result']['email']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">公司:</div>
		<div class="c">
			<input type="text" name="company"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['company'])) $this->magic_vars['_A']['liuyan_result']['company'] = ''; echo $this->magic_vars['_A']['liuyan_result']['company']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">电话:</div>
		<div class="c">
			<input type="text" name="tel"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['tel'])) $this->magic_vars['_A']['liuyan_result']['tel'] = ''; echo $this->magic_vars['_A']['liuyan_result']['tel']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">传真:</div>
		<div class="c">
			<input type="text" name="fax"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['fax'])) $this->magic_vars['_A']['liuyan_result']['fax'] = ''; echo $this->magic_vars['_A']['liuyan_result']['fax']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">地址:</div>
		<div class="c">
			<input type="text" name="address"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['address'])) $this->magic_vars['_A']['liuyan_result']['address'] = ''; echo $this->magic_vars['_A']['liuyan_result']['address']; ?>" size="20" /></div>
	</div>
	
	<div class="module_border">
		<div class="l">图片:</div>
		<div class="c">
			<input type="file" name="litpic"  class="input_border" size="20" /><? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic'] = ''; echo $this->magic_vars['_A']['liuyan_result']['litpic']; ?>" target="_blank" title="有图片"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><? endif; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">内容:</div>
		<div class="c">
			<textarea name="content" cols="45" rows="5"><? if (!isset($this->magic_vars['_A']['liuyan_result']['content'])) $this->magic_vars['_A']['liuyan_result']['content'] = ''; echo $this->magic_vars['_A']['liuyan_result']['content']; ?></textarea></div>
	</div>
	
	<div class="module_submit" >
		<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?><input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['id'])) $this->magic_vars['_A']['liuyan_result']['id'] = ''; echo $this->magic_vars['_A']['liuyan_result']['id']; ?>" /><? endif; ?>
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
</div>
</form>


<script>
function check_form(){
	 var frm = document.forms['form1'];
	 var title = frm.elements['title'].value;
	 var content = frm.elements['content'].value;
	 var errorMsg = '';
	  if (title.length == 0 ) {
		errorMsg += '标题必须填写' + '\n';
	  }
	  if (content.length == 0 ) {
		errorMsg += '内容必须填写' + '\n';
	  }
	  if (errorMsg.length > 0){
		alert(errorMsg); return false;
	  } else{  
		return true;
	  }
}
</script>

<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "set"): ?>
<div class="module_add">
	<form name="form1" method="post" action="" onsubmit="return check_form();" enctype="multipart/form-data" >
	
	<div class="module_title"><strong>留言设置</strong></div>
	
	<div class="module_border">
		<div class="l">留言标题：</div>
		<div class="c">
			<input type="text" name="name"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_set']['name'])) $this->magic_vars['_A']['liuyan_set']['name'] = ''; echo $this->magic_vars['_A']['liuyan_set']['name']; ?>" size="30" />  
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">留言类型：</div>
		<div class="c">
			<input type="text" name="type"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_set']['type'])) $this->magic_vars['_A']['liuyan_set']['type'] = ''; echo $this->magic_vars['_A']['liuyan_set']['type']; ?>" size="30" />  多个类型请用 | 隔开
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">显示页数：</div>
		<div class="c">
			<input type="text" name="page"  class="input_border" value="<? if (!isset($this->magic_vars['_A']['liuyan_set']['page'])) $this->magic_vars['_A']['liuyan_set']['page'] = ''; echo $this->magic_vars['_A']['liuyan_set']['page']; ?>" size="30" />  
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">留言状态：</div>
		<div class="c">
			<input type="radio" name="status" value="0"  <? if (!isset($this->magic_vars['_A']['liuyan_set']['status'])) $this->magic_vars['_A']['liuyan_set']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_set']['status'] == 0): ?>checked="checked"<? endif; ?>/>隐藏 <input type="radio" name="status" value="1"  <? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']='';if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] ==1 || $this->magic_vars['_A']['liuyan_result']['status'] ==""): ?>checked="checked"<? endif; ?>/>显示 </div>
	</div>
	
	<div class="module_submit">
		<input type="submit"  name="submit" value="确认提交" />
		<input type="reset"  name="reset" value="重置表单" />
	</div>
	</form>
	
</div>
<? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type'] == "view"): ?>
<form name="form1" method="post" action="" >
<div class="module_add">
	
	<div class="module_title"><strong>留言查看</strong></div>
	
	<div class="module_border">
		<div class="l">留言标题：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['name'])) $this->magic_vars['_A']['liuyan_result']['name'] = ''; echo $this->magic_vars['_A']['liuyan_result']['name']; ?>
		</div>
	</div>
	
	<div class="module_border">
		<div class="l">类别：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['type'])) $this->magic_vars['_A']['liuyan_result']['type'] = ''; echo $this->magic_vars['_A']['liuyan_result']['type']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">状态：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']='';if (!isset($this->magic_vars['_A']['liuyan_result']['status'])) $this->magic_vars['_A']['liuyan_result']['status']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['status'] ==1 || $this->magic_vars['_A']['liuyan_result']['status'] ==""): ?>隐藏<? else: ?>显示<? endif; ?> </div>
	</div>
	
	<div class="module_border">
		<div class="l">姓名：</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['name'])) $this->magic_vars['_A']['liuyan_result']['name'] = ''; echo $this->magic_vars['_A']['liuyan_result']['name']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">EMAIL:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['email'])) $this->magic_vars['_A']['liuyan_result']['email'] = ''; echo $this->magic_vars['_A']['liuyan_result']['email']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">公司:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['company'])) $this->magic_vars['_A']['liuyan_result']['company'] = ''; echo $this->magic_vars['_A']['liuyan_result']['company']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">电话:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['tel'])) $this->magic_vars['_A']['liuyan_result']['tel'] = ''; echo $this->magic_vars['_A']['liuyan_result']['tel']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">传真:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['fax'])) $this->magic_vars['_A']['liuyan_result']['fax'] = ''; echo $this->magic_vars['_A']['liuyan_result']['fax']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">地址:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['address'])) $this->magic_vars['_A']['liuyan_result']['address'] = ''; echo $this->magic_vars['_A']['liuyan_result']['address']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">图片:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic']=''; ;if (  $this->magic_vars['_A']['liuyan_result']['litpic']!=""): ?><a href="./<? if (!isset($this->magic_vars['_A']['liuyan_result']['litpic'])) $this->magic_vars['_A']['liuyan_result']['litpic'] = ''; echo $this->magic_vars['_A']['liuyan_result']['litpic']; ?>" target="_blank" title="有图片"><img src="<? if (!isset($this->magic_vars['tpldir'])) $this->magic_vars['tpldir'] = ''; echo $this->magic_vars['tpldir']; ?>/images/ico_1.jpg" border="0"  /></a><? endif; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">内容:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['content'])) $this->magic_vars['_A']['liuyan_result']['content'] = ''; echo $this->magic_vars['_A']['liuyan_result']['content']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">添加时间/IP:</div>
		<div class="c">
			<? if (!isset($this->magic_vars['_A']['liuyan_result']['addtime'])) $this->magic_vars['_A']['liuyan_result']['addtime'] = '';$_tmp = $this->magic_vars['_A']['liuyan_result']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?>/<? if (!isset($this->magic_vars['_A']['liuyan_result']['addip'])) $this->magic_vars['_A']['liuyan_result']['addip'] = ''; echo $this->magic_vars['_A']['liuyan_result']['addip']; ?></div>
	</div>
	
	<div class="module_border">
		<div class="l">回复:</div>
		<div class="c">
			<textarea name="reply" cols="40" rows="6"><? if (!isset($this->magic_vars['_A']['liuyan_result']['reply'])) $this->magic_vars['_A']['liuyan_result']['reply'] = ''; echo $this->magic_vars['_A']['liuyan_result']['reply']; ?></textarea></div>
	</div>
	
	<div class="module_submit" >
		<input type="hidden" name="id" value="<? if (!isset($this->magic_vars['_A']['liuyan_result']['id'])) $this->magic_vars['_A']['liuyan_result']['id'] = ''; echo $this->magic_vars['_A']['liuyan_result']['id']; ?>" />
		<input type="submit"   value="确认回复"/>
		<input type="button"  name="reset" value="修改留言" onclick="javascript:location.href('<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['_A']['liuyan_result']['id'])) $this->magic_vars['_A']['liuyan_result']['id'] = ''; echo $this->magic_vars['_A']['liuyan_result']['id']; ?>')"/>
		
	</div>
</div>
</form>
<? else: ?>
<table  border="0"  cellspacing="1" bgcolor="#CCCCCC" width="100%">
<form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/order" method="post">
	<tr >
		<td class="main_td">ID</td>
		<td class="main_td">标题</td>
		<td class="main_td">类型</td>
		<td class="main_td">状态</td>
		<td class="main_td">添加时间</td>
		<td class="main_td">是否回复</td>
		<td class="main_td">操作</td>
	</tr>
	<?  if(!isset($this->magic_vars['_A']['liuyan_list']) || $this->magic_vars['_A']['liuyan_list']=='') $this->magic_vars['_A']['liuyan_list'] = array();  $_from = $this->magic_vars['_A']['liuyan_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
	<tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
		<td><? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['title'])) $this->magic_vars['item']['title'] = ''; echo $this->magic_vars['item']['title']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = ''; echo $this->magic_vars['item']['type']; ?></td>
		<td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] ==1): ?>显示<? else: ?>隐藏<? endif; ?></td>
		<td><? if (!isset($this->magic_vars['item']['addtime'])) $this->magic_vars['item']['addtime'] = '';$_tmp = $this->magic_vars['item']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
		<td ><? if (!isset($this->magic_vars['item']['reply'])) $this->magic_vars['item']['reply']=''; ;if (  $this->magic_vars['item']['reply'] == ""): ?><font color="#FF0000">未回复</font><? else: ?>已回复<? endif; ?></td>
		<td><a href=" <? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/view&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">回复</a> / <a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>">修改</a> / <a href="#" onClick="javascript:if(confirm('确定要删除吗?删除后将不可恢复')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?> /del&id=<? if (!isset($this->magic_vars['item']['id'])) $this->magic_vars['item']['id'] = ''; echo $this->magic_vars['item']['id']; ?>'">删除</a></td>
	</tr>
	<? endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="8"  class="page">
		<? if (!isset($this->magic_vars['_A']['showpage'])) $this->magic_vars['_A']['showpage'] = ''; echo $this->magic_vars['_A']['showpage']; ?> 
		</td>
	</tr>
</form>	
</table>
<? endif; ?>