<? $this->magic_include(array('file' => "admin_head.html.php", 'vars' => array()));?>

<!--ģ���б� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;if (  $this->magic_vars['_A']['query_class'] == "list"): ?>
<table border="0" cellspacing="1" bgcolor="#CCCCCC" width="100%">
    <tr>
        <td width="" class="main_td">���</td>
        <td width="*" class="main_td">����</td>
        <th width="" class="main_td">����</th>
        <th width="" class="main_td">�汾</th>
        <th width="" class="main_td">����</th>
        <th width="" class="main_td">����ʱ��</th>
    </tr>
    <?  if(!isset($this->magic_vars['_A']['module_list']) || $this->magic_vars['_A']['module_list']=='') $this->magic_vars['_A']['module_list'] = array();  $_from = $this->magic_vars['_A']['module_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
    <? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type']!='admin'): ?>
    <tr <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?> >
    <td align="center"><? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?></td>
    <td align="center"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
    <td align="center"><? if (!isset($this->magic_vars['item']['description'])) $this->magic_vars['item']['description'] = ''; echo $this->magic_vars['item']['description']; ?></td>
    <td align="center"><? if (!isset($this->magic_vars['item']['version'])) $this->magic_vars['item']['version'] = '';$_tmp = $this->magic_vars['item']['version'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
    <td align="center"><? if (!isset($this->magic_vars['item']['author'])) $this->magic_vars['item']['author'] = '';$_tmp = $this->magic_vars['item']['author'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
    <td align="center"><? if (!isset($this->magic_vars['item']['date'])) $this->magic_vars['item']['date'] = '';$_tmp = $this->magic_vars['item']['date'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>

    </tr>
    <? endif; ?>
    <? endforeach; endif; unset($_from); ?>
</table>
<!--ģ���б� ����-->

<!--ģ����� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class']=="channel"): ?>

    <!--�Ѱ�װģ���б� ��ʼ-->
    <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type']== "install"): ?>
        <table border="0" cellspacing="1" bgcolor="#CCCCCC" width="100%">
            <tr>
                <td width="" class="main_td">���</td>
                <td width="*" class="main_td">����</td>
                <th width="" class="main_td">����</th>
                <th width="" class="main_td">�汾</th>
                <th width="" class="main_td">����</th>
                <td width="" class="main_td">����</td>
            </tr>
            <form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/order" method="post">
                <?  if(!isset($this->magic_vars['_A']['module_list']) || $this->magic_vars['_A']['module_list']=='') $this->magic_vars['_A']['module_list'] = array();  $_from = $this->magic_vars['_A']['module_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
                <? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type']=''; ;if (  $this->magic_vars['item']['type']!='admin'): ?>
                <tr
                <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
                <td align="center"><? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?></td>
                <td align="center"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
                <td align="center"><? if (!isset($this->magic_vars['item']['description'])) $this->magic_vars['item']['description'] = ''; echo $this->magic_vars['item']['description']; ?></td>
                <td align="center"><? if (!isset($this->magic_vars['item']['version'])) $this->magic_vars['item']['version'] = '';$_tmp = $this->magic_vars['item']['version'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
                <td align="center"><input name="order[]" type="text" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?>" size="6"/><input name="module_id[]"
                                                                                                             type="hidden"
                                                                                                             value="<? if (!isset($this->magic_vars['item']['module_id'])) $this->magic_vars['item']['module_id'] = ''; echo $this->magic_vars['item']['module_id']; ?>"
                                                                                                             size="6"/></td>
                <td align="center"><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/fields&code=<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>">�ֶ�</a> | <a
                        href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&code=<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>">�༭</a> | <a href="#"
                                                                                   onClick="javascript:if(confirm('��ȷ���Ƿ�Ҫж�ش�ģ�飬��ģ��ж�غ����е����ݶ�����գ������ش���')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&code=<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>'">ж��</a>
                    | <a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>">���ݹ���</a></td>
                </tr>
                <? endif; ?>
                <? endforeach; endif; unset($_from); ?>
                <tr>
                    <td colspan="6" class="submit"><input type="submit" value="�޸�����"/>
                        <input value="�����ģ��" type="button" onclick="javascript:location='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/new';"/> </div>
                    </td>
                </tr>
            </form>
        </table>
    <!--�Ѱ�װģ���б� ����-->

    <!--δ��װģ���б� ��ʼ-->
    <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']== "unstall"): ?>
        <table width="100%" border="0" cellpadding="5" cellspacing="1">
            <tr>
                <td class="main_td">ʶ��ID</td>
                <td width="*" class="main_td">ģ������</td>
                <td width="*" class="main_td">ģ����</td>
                <td width="*" class="main_td">�汾��</td>
                <td class="main_td">����</td>
                <th class="main_td">״̬</th>
            </tr>
            <?  if(!isset($this->magic_vars['_A']['module_list']) || $this->magic_vars['_A']['module_list']=='') $this->magic_vars['_A']['module_list'] = array();  $_from = $this->magic_vars['_A']['module_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
            <tr
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
            <td><? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['description'])) $this->magic_vars['item']['description'] = ''; echo $this->magic_vars['item']['description']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['version'])) $this->magic_vars['item']['version'] = ''; echo $this->magic_vars['item']['version']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = ''; echo $this->magic_vars['item']['type']; ?></td>
            <td><a href="<? if (!isset($this->magic_vars['_A']['admin_url'])) $this->magic_vars['_A']['admin_url'] = ''; echo $this->magic_vars['_A']['admin_url']; ?>&q=module/channel/new&code=<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>">��װ</a></td>
            </tr>
            <? endforeach; endif; unset($_from); ?>
        </table>
    <!--δ��װģ���б� ����-->

    <!--ģ��༭ ��ʼ-->
    <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']== "edit" ||  $this->magic_vars['_A']['query_type']== "new"): ?>
        <div class="module_add">
            <form action="" method="post" name="form1" onsubmit="return check_form();">
                <div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>ģ��</strong></div>

                <div class="module_border">
                    <div class="l">ģ�����ƣ�</div>
                    <div class="c">
                        <input type="text" class="input_border" align="absmiddle" name="name" value="<? if (!isset($this->magic_vars['_A']['module_result']['name'])) $this->magic_vars['_A']['module_result']['name'] = ''; echo $this->magic_vars['_A']['module_result']['name']; ?>"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">ʶ��ID��code����</div>
                    <div class="c">
                        <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['module_result']['code'])) $this->magic_vars['_A']['module_result']['code']=''; ;if (  $this->magic_vars['_A']['query_type']=="edit" || ( $this->magic_vars['_A']['query_type']=="new" &&                         $this->magic_vars['_A']['module_result']['code']!="")): ?><? if (!isset($this->magic_vars['_A']['module_result']['code'])) $this->magic_vars['_A']['module_result']['code'] = ''; echo $this->magic_vars['_A']['module_result']['code']; ?><input type="hidden" name="code"
                                                                                   value="<? if (!isset($this->magic_vars['_A']['module_result']['code'])) $this->magic_vars['_A']['module_result']['code'] = ''; echo $this->magic_vars['_A']['module_result']['code']; ?>"/><? else: ?>
                        <input type="text" align="absmiddle" name="code" value="" class="input_border"
                               onkeyup="value=value.replace(/[^a-z_]/g,'')"/><? endif; ?>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">���ͣ�</div>
                    <div class="c">
                        <? if (!isset($this->magic_vars['_A']['module_result']['type'])) $this->magic_vars['_A']['module_result']['type'] = '';$_tmp = $this->magic_vars['_A']['module_result']['type'];$_tmp = $this->magic_modifier("default",$_tmp,"cms");echo $_tmp;unset($_tmp); ?><input type="hidden" name="type"
                                                                     value="<? if (!isset($this->magic_vars['_A']['module_result']['type'])) $this->magic_vars['_A']['module_result']['type'] = '';$_tmp = $this->magic_vars['_A']['module_result']['type'];$_tmp = $this->magic_modifier("default",$_tmp,"cms");echo $_tmp;unset($_tmp); ?>"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">����</div>
                    <div class="c">
                        <input type="text" class="input_border" align="absmiddle" name="order"
                               value="<? if (!isset($this->magic_vars['_A']['module_result']['order'])) $this->magic_vars['_A']['module_result']['order'] = '';$_tmp = $this->magic_vars['_A']['module_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>" size="4"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">״̬��</div>
                    <div class="c">
                        <select name="status" class="input_border">
                            <option value="1"
                            <? if (!isset($this->magic_vars['_A']['module_result']['status'])) $this->magic_vars['_A']['module_result']['status']='';if (!isset($this->magic_vars['_A']['module_result']['status'])) $this->magic_vars['_A']['module_result']['status']=''; ;if (  $this->magic_vars['_A']['module_result']['status']=='1' ||  $this->magic_vars['_A']['module_result']['status']==""): ?> selected="selected"<? endif; ?>>����</option>
                            <option value="0"
                            <? if (!isset($this->magic_vars['_A']['module_result']['status'])) $this->magic_vars['_A']['module_result']['status']=''; ;if (  $this->magic_vars['_A']['module_result']['status']=='0'): ?> selected="selected"<? endif; ?>>�ر�</option>
                        </select>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">ģ���ѡ�</div>
                    <div class="c">
                        <label><input type="checkbox" name="default_field[]" value="title" checked="checked"
                                      disabled="disabled"/>����</label> <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "new"): ?><? if (!isset($this->magic_vars['_A']['article_fields'])) $this->magic_vars['_A']['article_fields'] = array();
 $_from =$this->magic_vars['_A']['article_fields'];
 $checked=array("all");$kname="";
 if (!is_array($checked)) $checked = explode(',',$checked);
 foreach ($_from as $key => $value):echo "<input type=checkbox value='$key' name='default_field[]' ";  echo ' checked '; echo " >$value "; endforeach; ?><? else: ?><? if (!isset($this->magic_vars['_A']['article_fields'])) $this->magic_vars['_A']['article_fields'] = array();
 $_from =$this->magic_vars['_A']['article_fields'];
 $checked=isset($this->magic_vars['_A']['module_result']['default_field'])?$this->magic_vars['_A']['module_result']['default_field']:'';$kname="";
 if (!is_array($checked)) $checked = explode(',',$checked);
 foreach ($_from as $key => $value):echo "<input type=checkbox value='$key' name='default_field[]' "; if(isset($checked) && isset($checked) && in_array($key,$checked)){ echo ' checked '; };echo " >$value "; endforeach; ?><? endif; ?>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�������ƣ�</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="title_name" value="<? if (!isset($this->magic_vars['_A']['module_result']['title_name'])) $this->magic_vars['_A']['module_result']['title_name'] = '';$_tmp = $this->magic_vars['_A']['module_result']['title_name'];$_tmp = $this->magic_modifier("default",$_tmp," ����");echo $_tmp;unset($_tmp); ?>"
                        class="input_border" />
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�����Զ����ֶΣ�</div>
                    <div class="c">
                        <input type="radio" name="fields" value="1" <? if (!isset($this->magic_vars['_A']['module_result']['fields'])) $this->magic_vars['_A']['module_result']['fields']=''; ;if (  $this->magic_vars['_A']['module_result']['fields']==1): ?> checked="checked"<? endif; ?>/> ��
                        <input type="radio" name="fields" value="0" <? if (!isset($this->magic_vars['_A']['module_result']['fields'])) $this->magic_vars['_A']['module_result']['fields']='';if (!isset($this->magic_vars['_A']['module_result']['fields'])) $this->magic_vars['_A']['module_result']['fields']=''; ;if (  $this->magic_vars['_A']['module_result']['fields']==0 ||                         $this->magic_vars['_A']['module_result']['fields']==""): ?> checked="checked"<? endif; ?> /> ��
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�Ƿ�֧�ֻ�ԱͶ�壺</div>
                    <div class="c">
                        <input type="radio" name="issent" value="1" <? if (!isset($this->magic_vars['_A']['module_result']['issent'])) $this->magic_vars['_A']['module_result']['issent']=''; ;if (  $this->magic_vars['_A']['module_result']['issent']==1): ?> checked="checked"<? endif; ?>/> ��
                        <input type="radio" name="issent" value="0" <? if (!isset($this->magic_vars['_A']['module_result']['issent'])) $this->magic_vars['_A']['module_result']['issent']='';if (!isset($this->magic_vars['_A']['module_result']['issent'])) $this->magic_vars['_A']['module_result']['issent']=''; ;if (  $this->magic_vars['_A']['module_result']['issent']==0 ||                         $this->magic_vars['_A']['module_result']['issent']==""): ?> checked="checked"<? endif; ?> /> ��
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ͷ���Ƿ�Ψһ��</div>
                    <div class="c">
                        <input type="radio" name="onlyone" value="1" <? if (!isset($this->magic_vars['_A']['module_result']['onlyone'])) $this->magic_vars['_A']['module_result']['onlyone']=''; ;if (  $this->magic_vars['_A']['module_result']['onlyone']==1): ?> checked="checked"<? endif; ?>/>
                        �� <input type="radio" name="onlyone" value="0" <? if (!isset($this->magic_vars['_A']['module_result']['onlyone'])) $this->magic_vars['_A']['module_result']['onlyone']='';if (!isset($this->magic_vars['_A']['module_result']['onlyone'])) $this->magic_vars['_A']['module_result']['onlyone']=''; ;if (  $this->magic_vars['_A']['module_result']['onlyone']==0 ||                         $this->magic_vars['_A']['module_result']['onlyone']==""): ?> checked="checked"<? endif; ?> /> ��
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ͷ���������ͣ�</div>
                    <div class="c">
                        <input type="radio" name="article_status" value="1" <? if (!isset($this->magic_vars['_A']['module_result']['article_status'])) $this->magic_vars['_A']['module_result']['article_status']=''; ;if (  $this->magic_vars['_A']['module_result']['article_status']==1): ?>
                        checked="checked"<? endif; ?>/> ����� <input type="radio" name="article_status" value="0" <? if (!isset($this->magic_vars['_A']['module_result']['article_status'])) $this->magic_vars['_A']['module_result']['article_status']='';if (!isset($this->magic_vars['_A']['module_result']['article_status'])) $this->magic_vars['_A']['module_result']['article_status']=''; ;if (                         $this->magic_vars['_A']['module_result']['article_status']==0 ||  $this->magic_vars['_A']['module_result']['article_status']==""): ?> checked="checked"<? endif; ?> />
                        δ���
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ĭ�Ϸ������ͣ�</div>
                    <div class="c">
                        <input type="radio" name="visit_type" value="0" <? if (!isset($this->magic_vars['_A']['module_result']['visit_type'])) $this->magic_vars['_A']['module_result']['visit_type']='';if (!isset($this->magic_vars['_A']['module_result']['visit_type'])) $this->magic_vars['_A']['module_result']['visit_type']=''; ;if (  $this->magic_vars['_A']['module_result']['visit_type']==0 ||                         $this->magic_vars['_A']['module_result']['visit_type']==""): ?> checked="checked"<? endif; ?> title="�磺?3/1"/> ��̬���� <input type="radio"
                                                                                                              name="visit_type"
                                                                                                              value="1" <? if (!isset($this->magic_vars['_A']['module_result']['visit_type'])) $this->magic_vars['_A']['module_result']['visit_type']=''; ;if (                         $this->magic_vars['_A']['module_result']['visit_type']==1): ?> checked="checked"<? endif; ?> title="�磺?article/dongtai/1.html"/> α��̬ <input
                            type="radio" name="visit_type" value="2" <? if (!isset($this->magic_vars['_A']['module_result']['visit_type'])) $this->magic_vars['_A']['module_result']['visit_type']=''; ;if (  $this->magic_vars['_A']['module_result']['visit_type']==2): ?>
                        checked="checked"<? endif; ?>/ title="�磺/article/dongtai/1.html"> ����html
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ĭ�Ϸ���ģ�壺</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="index_tpl" value="<? if (!isset($this->magic_vars['_A']['module_result']['index_tpl'])) $this->magic_vars['_A']['module_result']['index_tpl'] = '';$_tmp = $this->magic_vars['_A']['module_result']['index_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code].html");echo $_tmp;unset($_tmp); ?>"
                        class="input_border" />[code]��ʾ��ģ���ʶ��id����������
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ĭ���б�ģ�壺</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="list_tpl" value="<? if (!isset($this->magic_vars['_A']['module_result']['list_tpl'])) $this->magic_vars['_A']['module_result']['list_tpl'] = '';$_tmp = $this->magic_vars['_A']['module_result']['list_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code]_list.html");echo $_tmp;unset($_tmp); ?>"
                        class="input_border" />
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ĭ������ģ�壺</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="content_tpl" value="<? if (!isset($this->magic_vars['_A']['module_result']['content_tpl'])) $this->magic_vars['_A']['module_result']['content_tpl'] = '';$_tmp = $this->magic_vars['_A']['module_result']['content_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code]_content.html");echo $_tmp;unset($_tmp); ?>"
                        class="input_border" />
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">����ģ�壺</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="search_tpl" value="<? if (!isset($this->magic_vars['_A']['module_result']['search_tpl'])) $this->magic_vars['_A']['module_result']['search_tpl'] = '';$_tmp = $this->magic_vars['_A']['module_result']['search_tpl'];$_tmp = $this->magic_modifier("default",$_tmp,"[code]_search.html");echo $_tmp;unset($_tmp); ?>"
                        class="input_border" />
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">��飺</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="description" value="<? if (!isset($this->magic_vars['_A']['module_result']['description'])) $this->magic_vars['_A']['module_result']['description'] = ''; echo $this->magic_vars['_A']['module_result']['description']; ?>"
                               class="input_border"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�汾��</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="version" value="<? if (!isset($this->magic_vars['_A']['module_result']['version'])) $this->magic_vars['_A']['module_result']['version'] = '';$_tmp = $this->magic_vars['_A']['module_result']['version'];$_tmp = $this->magic_modifier("default",$_tmp,"1.0");echo $_tmp;unset($_tmp); ?>"
                               class="input_border"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">���ߣ�</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="author" value="<? if (!isset($this->magic_vars['_A']['module_result']['author'])) $this->magic_vars['_A']['module_result']['author'] = '';$_tmp = $this->magic_vars['_A']['module_result']['author'];$_tmp = $this->magic_modifier("default",$_tmp,"hycms");echo $_tmp;unset($_tmp); ?>"
                               class="input_border"/>
                    </div>
                </div>

                <div class="module_submit border_b">
                    <input type="submit" value=" �� �� " class="submitstyle" name="submit_ok"/>&nbsp;&nbsp;
                    <input name="reset" type="reset" class="submitstyle" value=" �� �� "/>
                </div>
            </form>
        </div>
        
        <script>
            function check_form() {
                var frm = document.forms['form1'];
                var title = frm.elements['name'].value;
                var code = frm.elements['code'].value;
                var errorMsg = '';
                if (title.length == 0) {
                    errorMsg += 'ģ�����Ʊ�����д' + '\n';
                }
                if (code.length == 0) {
                    errorMsg += 'ʶ��id������д' + '\n';
                }
                if (errorMsg.length > 0) {
                    alert(errorMsg);
                    return false;
                } else {
                    return true;
                }
            }
        </script>
        
    <!--ģ��༭ ����-->

    <!--����ģ���б� ��ʼ-->
    <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']== "list"): ?>
        <table width="100%" border="0" cellpadding="5" cellspacing="1">
            <tr>
                <td width="11%" class="main_td">ʶ��ID</td>
                <td width="*" class="main_td">ģ������</td>
                <td width="*" class="main_td">ģ����</td>
                <td width="*" class="main_td">�汾��</td>
                <td width="18%" class="main_td">����</td>
                <th width="22%" class="main_td">״̬</th>
            </tr>
            <?  if(!isset($this->magic_vars['_A']['module_list']) || $this->magic_vars['_A']['module_list']=='') $this->magic_vars['_A']['module_list'] = array();  $_from = $this->magic_vars['_A']['module_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
            <tr
            <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?>class="tr2"<? endif; ?>>
            <td><? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['description'])) $this->magic_vars['item']['description'] = ''; echo $this->magic_vars['item']['description']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['version'])) $this->magic_vars['item']['version'] = ''; echo $this->magic_vars['item']['version']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = ''; echo $this->magic_vars['item']['type']; ?></td>
            <td><? if (!isset($this->magic_vars['item']['status'])) $this->magic_vars['item']['status']=''; ;if (  $this->magic_vars['item']['status'] == 1): ?><font color="#009900">�Ѱ�װ</font><? else: ?><font color="#FF0000">δ��װ</font><? endif; ?></td>
            </tr>
            <? endforeach; endif; unset($_from); ?>
        </table>
<!--����ģ���б� ����-->
    <? endif; ?>
<!--ģ����� ����-->


<!--�ֶι��� ��ʼ-->
<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class']=="fields"): ?>

    <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type']== "list"): ?>
        <!--�ֶ��б� ��ʼ-->
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr class="tr">
                <td class="main_td">�ֶ�����</td>
                <td class="main_td">��ʶ��</td>
                <td class="main_td">�ֶ�����</td>
                <td class="main_td">����</td>
                <td class="main_td">��������</td>
                <td class="main_td">����</td>
                <th class="main_td">����</th>
            </tr>
            <form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/order" method="post">
                <?  if(!isset($this->magic_vars['_A']['fields_list']) || $this->magic_vars['_A']['fields_list']=='') $this->magic_vars['_A']['fields_list'] = array();  $_from = $this->magic_vars['_A']['fields_list']; 
 if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); } 
if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] =>  $this->magic_vars['item']):
?>
                <tr
                <? if (!isset($this->magic_vars['key'])) $this->magic_vars['key']=''; ;if (  $this->magic_vars['key']%2==1): ?> class="tr2"<? endif; ?>>
                <td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['name'])) $this->magic_vars['item']['name'] = ''; echo $this->magic_vars['item']['name']; ?></td>
                <td class="main_td1" align="center"><? if (!isset($this->magic_vars['item']['nid'])) $this->magic_vars['item']['nid'] = ''; echo $this->magic_vars['item']['nid']; ?></td>
                <td class="main_td1"><? if (!isset($this->magic_vars['item']['type'])) $this->magic_vars['item']['type'] = ''; echo $this->magic_vars['item']['type']; ?></td>
                <td class="main_td1"><? if (!isset($this->magic_vars['item']['size'])) $this->magic_vars['item']['size'] = '';$_tmp = $this->magic_vars['item']['size'];$_tmp = $this->magic_modifier("default",$_tmp,"-");echo $_tmp;unset($_tmp); ?></td>
                <td class="main_td1"><? if (!isset($this->magic_vars['item']['input'])) $this->magic_vars['item']['input'] = ''; echo $this->magic_vars['item']['input']; ?></td>
                <td class="main_td1"><input name="order[]" type="text" value="<? if (!isset($this->magic_vars['item']['order'])) $this->magic_vars['item']['order'] = ''; echo $this->magic_vars['item']['order']; ?>" size="6"/>
                    <input name="fields_id[]" type="hidden" value="<? if (!isset($this->magic_vars['item']['fields_id'])) $this->magic_vars['item']['fields_id'] = ''; echo $this->magic_vars['item']['fields_id']; ?>"/></td>
                <td class="main_td1"><a href="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/edit&code=<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>&fields_id=<? if (!isset($this->magic_vars['item']['fields_id'])) $this->magic_vars['item']['fields_id'] = ''; echo $this->magic_vars['item']['fields_id']; ?>">�޸�</a> | <a
                        href="#"
                        onClick="javascript:if(confirm('ȷ��Ҫɾ����?ɾ���󽫲��ɻָ�')) location.href='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/del&code=<? if (!isset($this->magic_vars['item']['code'])) $this->magic_vars['item']['code'] = ''; echo $this->magic_vars['item']['code']; ?>&fields_id=<? if (!isset($this->magic_vars['item']['fields_id'])) $this->magic_vars['item']['fields_id'] = ''; echo $this->magic_vars['item']['fields_id']; ?>'">ɾ��</a>
                </td>
                </tr>
                <? endforeach; endif; unset($_from); ?>
                <tr>
                    <td colspan="7" class="submit">
                        <input type="submit" value="�޸�����"/>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input value="������ֶ�" type="button"
                               onclick="javascript:location='<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/new&code=<? if (!isset($_REQUEST['code'])) $_REQUEST['code'] = ''; echo $_REQUEST['code']; ?>';"/>
                    </td>
                </tr>
            </form>
        </table>
        <!--�ֶ��б� ����-->

    <!--����ֶ� ��ʼ-->
    <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']='';if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;elseif (  $this->magic_vars['_A']['query_type']== "new" ||  $this->magic_vars['_A']['query_type']== "edit"): ?>
        <div class="module_add">
            <form action="" method="post" name="form1" onsubmit="return check_form()">

                <div class="module_title"><strong><? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type'] == "edit"): ?>�༭<? else: ?>���<? endif; ?>�ֶ�</strong></div>

                <div class="module_border">
                    <div class="l">�ֶ����ƣ�</div>
                    <div class="c">
                        <input type="text" class="input_border" align="absmiddle" name="name" value="<? if (!isset($this->magic_vars['_A']['fields_result']['name'])) $this->magic_vars['_A']['fields_result']['name'] = ''; echo $this->magic_vars['_A']['fields_result']['name']; ?>"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">��ʾ����</div>
                    <div class="c">
                        <? if (!isset($this->magic_vars['_A']['query_type'])) $this->magic_vars['_A']['query_type']=''; ;if (  $this->magic_vars['_A']['query_type']=='new'): ?>
                        <input type="text" align="absmiddle" name="nid" class="input_border"
                               onkeyup="value=value.replace(/[^a-z_]/g,'')"/>ֻ��Ϊ��ĸ���»���<? else: ?><? if (!isset($this->magic_vars['_A']['fields_result']['nid'])) $this->magic_vars['_A']['fields_result']['nid'] = ''; echo $this->magic_vars['_A']['fields_result']['nid']; ?><input
                            type="hidden" align="absmiddle" name="nid" value="<? if (!isset($this->magic_vars['_A']['fields_result']['nid'])) $this->magic_vars['_A']['fields_result']['nid'] = ''; echo $this->magic_vars['_A']['fields_result']['nid']; ?>"/><? endif; ?>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">����</div>
                    <div class="c">
                        <input type="text" align="absmiddle" name="order" value="<? if (!isset($this->magic_vars['_A']['fields_result']['order'])) $this->magic_vars['_A']['fields_result']['order'] = '';$_tmp = $this->magic_vars['_A']['fields_result']['order'];$_tmp = $this->magic_modifier("default",$_tmp,"10");echo $_tmp;unset($_tmp); ?>"/>
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�������ͣ�</div>
                    <div class="c">
                        <select name="input">
<? if (!isset($this->magic_vars['_A']['fields_input'])) $this->magic_vars['_A']['fields_input'] = array(); $_from =$this->magic_vars['_A']['fields_input'];$_selected='';  foreach ($_from as $key => $value):echo "<option value='$key'"; if(isset($this->magic_vars['_A']['fields_result']['input']) && $key == $this->magic_vars['_A']['fields_result']['input']){ echo ' selected '; };echo " >$value</option>"; endforeach; ?></select>

                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�ֶ����ͣ�</div>
                    <div class="c">
                        <select name="type">
<? if (!isset($this->magic_vars['_A']['fields_type'])) $this->magic_vars['_A']['fields_type'] = array(); $_from =$this->magic_vars['_A']['fields_type'];$_selected='';  foreach ($_from as $key => $value):echo "<option value='$key'"; if(isset($this->magic_vars['_A']['fields_result']['type']) && $key == $this->magic_vars['_A']['fields_result']['type']){ echo ' selected '; };echo " >$value</option>"; endforeach; ?></select>

                    </div>
                </div>

                <div class="module_border">
                    <div class="l">Ĭ��ֵ��</div>
                    <div class="c">
                        <input name="default" id="default" type="text" value="<? if (!isset($this->magic_vars['_A']['fields_result']['default'])) $this->magic_vars['_A']['fields_result']['default'] = ''; echo $this->magic_vars['_A']['fields_result']['default']; ?>"/>
                    </div>
                </div>
                <div class="module_border">
                    <div class="l">�ֶο�ѡ��</div>
                    <div class="c">
                        <input name="select" type="text" value="<? if (!isset($this->magic_vars['_A']['fields_result']['select'])) $this->magic_vars['_A']['fields_result']['select'] = ''; echo $this->magic_vars['_A']['fields_result']['select']; ?>"/> �����ѡֵ����,�Ÿ���
                    </div>
                </div>

                <div class="module_border">
                    <div class="l">�ֶ�������</div>
                    <div class="c">
                        <textarea name="description" cols="50" rows="7"><? if (!isset($this->magic_vars['_A']['fields_result']['description'])) $this->magic_vars['_A']['fields_result']['description'] = ''; echo $this->magic_vars['_A']['fields_result']['description']; ?></textarea>
                    </div>
                </div>

                <div class="module_submit">
                    <input name="code" type="hidden" value="<? if (!isset($_REQUEST['code'])) $_REQUEST['code'] = ''; echo $_REQUEST['code']; ?>"/>
                    <input name="fields_id" type="hidden" value="<? if (!isset($_REQUEST['fields_id'])) $_REQUEST['fields_id'] = ''; echo $_REQUEST['fields_id']; ?>"/>
                    <input type="submit" value=" �� �� " class="submitstyle" name="submit_ok"/>
                    <input name="reset" type="reset" class="submitstyle" value=" �� �� "/></td>
                </div>
            </form>
        </div>

        
        <script>
            function check_form() {
                var frm = document.forms['form1'];
                var title = frm.elements['name'].value;
                var nid = frm.elements['nid'].value;
                var input = frm.elements['input'].value;
                var selecte = frm.elements['select'].value;
                var errorMsg = '';
                if (title.length == 0) {
                    errorMsg += '�ֶ����Ʊ�����д' + '\n';
                }
                if (nid.length == 0) {
                    errorMsg += '��ʾ��������д' + '\n';
                }
                if ((input == "select" || input == "checkbox" || input == "radio") && selecte == "") {
                    errorMsg += '��ѡ����������ͱ���Ҫ��д�ֶεĿ�ѡֵ����Ӣ�ĵ�","����' + '\n';
                }
                if (errorMsg.length > 0) {
                    alert(errorMsg);
                    return false;
                } else {
                    return true;
                }

            }

        </script>
        
        <!--����ֶ� ����-->
    <? endif; ?>
<!--�ֶι��� ����-->


<? if (!isset($this->magic_vars['_A']['query_class'])) $this->magic_vars['_A']['query_class']=''; ;elseif (  $this->magic_vars['_A']['query_class']=="update"): ?>
    <table border="0" cellspacing="1" bgcolor="#CCCCCC" width="100%">

        <form action="<? if (!isset($this->magic_vars['_A']['query_url'])) $this->magic_vars['_A']['query_url'] = ''; echo $this->magic_vars['_A']['query_url']; ?>/<? if (!isset($this->magic_vars['result']['type'])) $this->magic_vars['result']['type'] = ''; echo $this->magic_vars['result']['type']; ?>&code=<? if (!isset($_REQUEST['code'])) $_REQUEST['code'] = ''; echo $_REQUEST['code']; ?>" method="post" name="form1">

            <tr>
                <td align="right" width="15%">ģ�����ƣ�</td>
                <td align="left"><? if (!isset($this->magic_vars['result']['name'])) $this->magic_vars['result']['name'] = ''; echo $this->magic_vars['result']['name']; ?>
                </td>
            </tr>
            <tr>
                <td align="right" width="15%">ģ���ʶ��</td>
                <td align="left"><? if (!isset($this->magic_vars['result']['code'])) $this->magic_vars['result']['code'] = ''; echo $this->magic_vars['result']['code']; ?>
                </td>
            </tr>
            <tr>
                <td align="right" width="15%">���½��ܣ�</td>
                <td align="left"><? if (!isset($this->magic_vars['result']['description'])) $this->magic_vars['result']['description'] = ''; echo $this->magic_vars['result']['description']; ?>
                </td>
            </tr>
            <tr>
                <td align="right" width="15%">���°汾��</td>
                <td align="left"><? if (!isset($this->magic_vars['result']['version'])) $this->magic_vars['result']['version'] = ''; echo $this->magic_vars['result']['version']; ?>
                </td>
            </tr>
            <tr>
                <td align="right" width="15%">���ͣ�</td>
                <td align="left"><? if (!isset($this->magic_vars['result']['type'])) $this->magic_vars['result']['type'] = ''; echo $this->magic_vars['result']['type']; ?>
                </td>
            </tr>
            <tr>
                <td align="right" width="15%">����ʱ�䣺</td>
                <td align="left"><? if (!isset($this->magic_vars['result']['date'])) $this->magic_vars['result']['date'] = ''; echo $this->magic_vars['result']['date']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="list_code" value="<? if (!isset($this->magic_vars['result']['code'])) $this->magic_vars['result']['code'] = ''; echo $this->magic_vars['result']['code']; ?>"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value=" ȷ�ϸ��� " name="submit_ok"/>
                </td>
            </tr>
        </form>
    </table>
<? else: ?>
<? if (!isset($this->magic_vars['module_tpl'])) $this->magic_vars['module_tpl']='';if (!isset($this->magic_vars['template_dir'])) $this->magic_vars['template_dir']=''; ; $_from = $this->magic_vars['module_tpl'];  $this->magic_include(array('file' => $_from, 'vars' => array('template_dir' => $this->magic_vars['template_dir']))); unset($_from);?>
<? endif; ?>

<? $this->magic_include(array('file' => "admin_foot.html", 'vars' => array()));?>

