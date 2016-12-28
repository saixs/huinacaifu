<? $this->magic_include(array('file' => "header.html", 'vars' => array()));?>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/css_n.css" rel="stylesheet" type="text/css"/>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/style_n.css" rel="stylesheet" type="text/css"/>
<link href="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/css/tipswindown.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/js/tipswindown.js"></script>

<style>
    .sub_menu {
        MARGIN: 0px;
        WIDTH: 950px;
        FLOAT: left;
        HEIGHT: 25px;
        CLEAR: both;
        OVERFLOW: hidden
    }
</style>

<? $data = array('article_id'=>'0','id'=>$this->magic_vars['_G']['article_id']);  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['var'] = borrowClass::GetU($data);if(!is_array($this->magic_vars['var'])){ $this->magic_vars['var']=array();}?>
<div class="con_box t10">
    <div class="user_choic">
        <div class="user_choic1">
            <ul>
                <li
                <? if (!isset($this->magic_vars['U_gid'])) $this->magic_vars['U_gid']=''; ;if (  $this->magic_vars['U_gid'] == ''): ?>class="a1"<? endif; ?>><a href="/u/<? if (!isset($this->magic_vars['GU_uid'])) $this->magic_vars['GU_uid'] = ''; echo $this->magic_vars['GU_uid']; ?>">个人信息</a></li>
                <li
                <? if (!isset($this->magic_vars['U_gid'])) $this->magic_vars['U_gid']=''; ;if (  $this->magic_vars['U_gid'] == 'borrowlist'): ?>class="a1"<? endif; ?>><a href="/u/<? if (!isset($this->magic_vars['GU_uid'])) $this->magic_vars['GU_uid'] = ''; echo $this->magic_vars['GU_uid']; ?>/borrowlist">借款列表</a></li>
                <li
                <? if (!isset($this->magic_vars['U_gid'])) $this->magic_vars['U_gid']=''; ;if (  $this->magic_vars['U_gid'] == 'borrowinvest'): ?>class="a1"<? endif; ?>><a href="/u/<? if (!isset($this->magic_vars['GU_uid'])) $this->magic_vars['GU_uid'] = ''; echo $this->magic_vars['GU_uid']; ?>/borrowinvest">投资记录</a></li>
                <li><A
                        onclick='tipsWindown("加为好友","url:get?/index.php?user&amp;q=code/user/addfriend&amp;username=<? if (!isset($this->magic_vars['var']['user']['username'])) $this->magic_vars['var']['user']['username'] = ''; echo $this->magic_vars['var']['user']['username']; ?>",400,230,"true","","true","text");'
                        href="javascript:void(0)">加为好友</A></li>
                <li><a href="/index.php?user&q=code/message/sent&receive=<? if (!isset($this->magic_vars['GU_uid'])) $this->magic_vars['GU_uid'] = ''; echo $this->magic_vars['GU_uid']; ?>" target="_blank">发送消息</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="con_box" style="margin-top:20px">
    <div class="left" style="width:222px">
        <div class="Borrower_people_left" style="height: auto;">
            <div class="Borrower_people_leftbox">
                <dl style="height: auto;">
                    <dd style="margin-left: 55px; _margin-left: 30px; margin-top: 0px;">
                        <img src="../../data/images/avatar/noavatar_middle.gif" width="100" height="100" class="ShowPicZoom" style="height:119px;width:111px;border-width:0px;"
                             title="6688"/></dd>
                    <dt>
                    <ul>
                        <li style="margin-bottom: 0px;"><span style="float: left; width: 60px; text-align: right; ">
                    会员等级：</span>
                            <img src="<? if (!isset($this->magic_vars['_G']['system']['con_credit_picurl'])) $this->magic_vars['_G']['system']['con_credit_picurl'] = ''; echo $this->magic_vars['_G']['system']['con_credit_picurl']; ?><? if (!isset($this->magic_vars['var']['user']['credit_pic'])) $this->magic_vars['var']['user']['credit_pic'] = ''; echo $this->magic_vars['var']['user']['credit_pic']; ?>" title="<? if (!isset($this->magic_vars['var']['user']['credit_jifen'])) $this->magic_vars['var']['user']['credit_jifen'] = ''; echo $this->magic_vars['var']['user']['credit_jifen']; ?>"/></li>
                        <li><span style="float: left; width: 60px; text-align: right;">用&nbsp;户&nbsp;名：</span>
                    <span style="float: left;">
                        <a href="/u/<? if (!isset($this->magic_vars['var']['user']['user_id'])) $this->magic_vars['var']['user']['user_id'] = ''; echo $this->magic_vars['var']['user']['user_id']; ?>" target="_blank"><? if (!isset($this->magic_vars['var']['user']['username'])) $this->magic_vars['var']['user']['username'] = ''; echo $this->magic_vars['var']['user']['username']; ?></a>
                    </span></li>
                        <li><span style="float: left; width: 60px; text-align: right;">籍&nbsp;&nbsp;&nbsp;&nbsp;贯：</span>

                            <span id=""><? if (!isset($this->magic_vars['var']['user']['area'])) $this->magic_vars['var']['user']['area'] = '';$_tmp = $this->magic_vars['var']['user']['area'];$_tmp = $this->magic_modifier("area",$_tmp,"p,c");echo $_tmp;unset($_tmp); ?></span>
                        </li>
                        <li id=""><span style="float: left; width: 60px;
                    text-align: right;">注册时间：</span>
                            <span id=""><? if (!isset($this->magic_vars['var']['user']['addtime'])) $this->magic_vars['var']['user']['addtime'] = '';$_tmp = $this->magic_vars['var']['user']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></span>
                        </li>
                        <li id=""><span style="float: left; width: 60px;
                    text-align: right;">最后登录：</span>
                            <span id=""><? if (!isset($this->magic_vars['var']['user']['lasttime'])) $this->magic_vars['var']['user']['lasttime'] = '';$_tmp = $this->magic_vars['var']['user']['lasttime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></span>
                        </li>
                        <li><span style="float: left; width: 60px; text-align: right;">信用积分：</span>
                            <span id=""><? if (!isset($this->magic_vars['var']['user']['credit_jifen'])) $this->magic_vars['var']['user']['credit_jifen'] = ''; echo $this->magic_vars['var']['user']['credit_jifen']; ?></span>分
                        </li>
                        <li style="height: 30px;">
                            <div class="credit_pic_card_<? if (!isset($this->magic_vars['var']['user']['real_status'])) $this->magic_vars['var']['user']['real_status'] = '';$_tmp = $this->magic_vars['var']['user']['real_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" title="<? if (!isset($this->magic_vars['var']['user']['real_status'])) $this->magic_vars['var']['user']['real_status']=''; ;if (  $this->magic_vars['var']['user']['real_status']==1): ?>实名已认证<? else: ?>未实名认证<? endif; ?>"></div>
                            <div class="credit_pic_phone_<? if (!isset($this->magic_vars['var']['user']['phone_status'])) $this->magic_vars['var']['user']['phone_status']=''; ;if (  $this->magic_vars['var']['user']['phone_status']>=1): ?>1<? else: ?>0<? endif; ?>" title="<? if (!isset($this->magic_vars['var']['user']['phone_status'])) $this->magic_vars['var']['user']['phone_status']=''; ;if (  $this->magic_vars['var']['user']['phone_status']==1): ?>手机已认证<? else: ?>手机未认证<? endif; ?>"></div>
                            <div class="credit_pic_email_<? if (!isset($this->magic_vars['var']['user']['email_status'])) $this->magic_vars['var']['user']['email_status'] = '';$_tmp = $this->magic_vars['var']['user']['email_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" title="<? if (!isset($this->magic_vars['var']['user']['email_status'])) $this->magic_vars['var']['user']['email_status']=''; ;if (  $this->magic_vars['var']['user']['email_status']==1): ?>邮箱已认证<? else: ?>邮箱未认证<? endif; ?>"></div>
                            <div class="credit_pic_video_<? if (!isset($this->magic_vars['var']['user']['video_status'])) $this->magic_vars['var']['user']['video_status'] = '';$_tmp = $this->magic_vars['var']['user']['video_status'];$_tmp = $this->magic_modifier("default",$_tmp,"0");echo $_tmp;unset($_tmp); ?>" title="<? if (!isset($this->magic_vars['var']['user']['video_status'])) $this->magic_vars['var']['user']['video_status']=''; ;if (  $this->magic_vars['var']['user']['video_status']==1): ?>视频已认证<? else: ?>视频未认证<? endif; ?>"></div>
                            <div class="credit_pic_vip_<? if (!isset($this->magic_vars['var']['user_cache']['vip_status'])) $this->magic_vars['var']['user_cache']['vip_status']=''; ;if (  $this->magic_vars['var']['user_cache']['vip_status']==1): ?>1<? else: ?>0<? endif; ?>" title="<? if (!isset($this->magic_vars['var']['user_cache']['vip_status'])) $this->magic_vars['var']['user_cache']['vip_status']=''; ;if (  $this->magic_vars['var']['user_cache']['vip_status']==1): ?>VIP<? else: ?>普通会员<? endif; ?>"></div>
                            <div class="credit_pic_scene_<? if (!isset($this->magic_vars['var']['user']['scene_status'])) $this->magic_vars['var']['user']['scene_status']=''; ;if (  $this->magic_vars['var']['user']['scene_status']==1): ?>1<? else: ?>0<? endif; ?>" title="<? if (!isset($this->magic_vars['var']['user']['scene_status'])) $this->magic_vars['var']['user']['scene_status']=''; ;if (  $this->magic_vars['var']['user']['scene_status']==1): ?>已通过现场认证<? else: ?>未通过现场认证<? endif; ?>"></div>
                        </li>
                    </ul>
                    </dt>
                    <dd style="margin-left: 55px; _margin-left: 30px; height: auto;">
                        <ul>

                            <li style="height: 29px; display:none">
                                <a href="#" onclick="javascript:if(confirm('你确定要将此标加入我关注的标？')) location.href='/?user&q=code/borrow/add_care&code=borrow&article_id='"><input
                                        type="button" name="button2" id="button2" class="buttomAttention2" style="cursor:pointer"/></a>
                            </li>

                        </ul>
                    </dd>
                </dl>
            </div>

        </div>

        <div style="clear:both"></div>


        <div class="t10">
            <div class="title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="12" align="left"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_left.gif" width="12" height="30"/></td>
                        <td align="left" background="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_bg.gif"><h1 class="dd">个人说明</h1></td>
                        <td width="12" align="right"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_right.gif" width="12" height="30"/></td>
                    </tr>
                </table>
            </div>
            <div class="m_l_bor" style="padding:10px">
                <div class="man_say"><? if (!isset($this->magic_vars['var']['userinfo']['others'])) $this->magic_vars['var']['userinfo']['others'] = ''; echo $this->magic_vars['var']['userinfo']['others']; ?>
                </div>
            </div>
        </div>

        <div class="t10">
            <div class="title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="12" align="left"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_left.gif" width="12" height="30"/></td>
                        <td align="left" background="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_bg.gif"><h1 class="dd">我的好友</h1></td>
                        <td width="12" align="right"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_right.gif" width="12" height="30"/></td>
                    </tr>
                </table>
            </div>
            <div class="m_l_bor">
                <div class="man_friend1">
                    <ul>
                        <? $this->magic_vars['query_type']='GetFriendsList';$data = array('limit'=>'6','user_id'=>$this->magic_vars['GU_uid']);$default = '';  include_once(ROOT_PATH.'core/user.class.php');$this->magic_vars['magic_result'] = userClass::GetFriendsList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
                        <li><img src="<? if (!isset($this->magic_vars['var']['friends_userid'])) $this->magic_vars['var']['friends_userid'] = '';$_tmp = $this->magic_vars['var']['friends_userid'];$_tmp = $this->magic_modifier("avatar",$_tmp,"");$_tmp = $this->magic_modifier("litpic",$_tmp,"75,75");echo $_tmp;unset($_tmp); ?>" class="picborder" /><br/><a href="/u/<? if (!isset($this->magic_vars['var']['friends_userid'])) $this->magic_vars['var']['friends_userid'] = ''; echo $this->magic_vars['var']['friends_userid']; ?>"><? if (!isset($this->magic_vars['var']['friend_username'])) $this->magic_vars['var']['friend_username'] = ''; echo $this->magic_vars['var']['friend_username']; ?></a></li>
                        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
                    </ul>
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>

    </div>


    <div class="right" style="width:745px">
        <div>
            <div class="title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="12" align="left"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_left.gif" width="12" height="30"/></td>
                        <td align="left" background="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_bg.gif"><h1 class="dd">贷款列表</h1></td>
                        <td width="12" align="right"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_right.gif" width="12" height="30"/></td>
                    </tr>
                </table>
            </div>
            <div class="m_l_bor" style="padding:10px">
                <div class="user_b_list">
                    <ul>
                        <? $this->magic_vars['query_type']='GetList';$data = array('limit'=>'6','user_id'=>$this->magic_vars['GU_uid']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['var']):
?>
                        <li><span><? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;if (  $this->magic_vars['var']['status']==1): ?>招标中<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==2): ?>借款失败<? if (!isset($this->magic_vars['var']['status'])) $this->magic_vars['var']['status']=''; ;elseif (  $this->magic_vars['var']['status']==3): ?>借款成功<? else: ?>申请中<? endif; ?></span><a href="/invest/a<? if (!isset($this->magic_vars['var']['id'])) $this->magic_vars['var']['id'] = ''; echo $this->magic_vars['var']['id']; ?>.html"><? if (!isset($this->magic_vars['var']['name'])) $this->magic_vars['var']['name'] = ''; echo $this->magic_vars['var']['name']; ?></a>
                        </li>
                        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="t10">
            <div class="title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="12" align="left"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_left.gif" width="12" height="30"/></td>
                        <td align="left" background="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_bg.gif"><h1 class="dd">投标记录</h1></td>
                        <td width="12" align="right"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_right.gif" width="12" height="30"/></td>
                    </tr>
                </table>
            </div>
            <div class="m_l_bor" style="padding:10px">
                <div class="line111">
                    <table width="100%" border="0" cellpadding="2" cellspacing="1">
                        <tr>
                            <th width="347" height="24"><strong>标题</strong></th>
                            <th width="61" align="center"><strong>投标资金</strong></th>
                            <th width="104" align="center"><strong>有效资金</strong></th>
                            <th width="80" align="center"><strong>投标时间</strong></th>
                            <th width="107" align="center"><strong>状态</strong></th>
                        </tr>
                        <? $this->magic_vars['query_type']='GetTenderList';$data = array('var'=>'_var','limit'=>'0,6','user_id'=>$this->magic_vars['GU_uid']);$default = '';  include_once(ROOT_PATH.'modules/borrow/borrow.class.php');$this->magic_vars['magic_result'] = borrowClass::GetTenderList($data);if(!isset($this->magic_vars['magic_result'])) $this->magic_vars['magic_result']= array(); $_from = $this->magic_vars['magic_result']; if (!is_array($_from) && !is_object($_from)) {$_from =array(); } if (count($_from)>0):
;    foreach ($_from as $this->magic_vars['key'] => $this->magic_vars['_var']):
?>
                        <tr>
                            <td><a href="/invest/a<? if (!isset($this->magic_vars['_var']['borrow_id'])) $this->magic_vars['_var']['borrow_id'] = ''; echo $this->magic_vars['_var']['borrow_id']; ?>.html" title="<? if (!isset($this->magic_vars['_var']['borrow_name'])) $this->magic_vars['_var']['borrow_name'] = ''; echo $this->magic_vars['_var']['borrow_name']; ?>" target="_blank"><? if (!isset($this->magic_vars['_var']['borrow_name'])) $this->magic_vars['_var']['borrow_name'] = '';$_tmp = $this->magic_vars['_var']['borrow_name'];$_tmp = $this->magic_modifier("truncate",$_tmp,"10");echo $_tmp;unset($_tmp); ?></a></td>
                            <td><? if (!isset($this->magic_vars['_var']['tender_money'])) $this->magic_vars['_var']['tender_money'] = ''; echo $this->magic_vars['_var']['tender_money']; ?>元</td>
                            <td><? if (!isset($this->magic_vars['_var']['tender_account'])) $this->magic_vars['_var']['tender_account'] = ''; echo $this->magic_vars['_var']['tender_account']; ?>元</td>
                            <td><? if (!isset($this->magic_vars['_var']['addtime'])) $this->magic_vars['_var']['addtime'] = '';$_tmp = $this->magic_vars['_var']['addtime'];$_tmp = $this->magic_modifier("date_format",$_tmp,"Y-m-d");echo $_tmp;unset($_tmp); ?></td>
                            <td><? if (!isset($this->magic_vars['_var']['status'])) $this->magic_vars['_var']['status']=''; ;if (  $this->magic_vars['_var']['status']==1): ?>成功<? else: ?>失败<? endif; ?></td>
                        </tr>
                        <? endforeach;else:echo $default; endif; unset($_from);unset($_magic_vars); ?>

                    </table>
                    <div class="page" style="display:none"><? if (!isset($this->magic_vars['loop']['showpage'])) $this->magic_vars['loop']['showpage'] = ''; echo $this->magic_vars['loop']['showpage']; ?></div>
                </div>

            </div>
        </div>

        <div class="t10">
            <div class="title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="12" align="left"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_left.gif" width="12" height="30"/></td>
                        <td align="left" background="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_bg.gif"><h1 class="dd">好友评价</h1></td>
                        <td width="12" align="right"><img src="<? if (!isset($this->magic_vars['tempdir'])) $this->magic_vars['tempdir'] = ''; echo $this->magic_vars['tempdir']; ?>/images/t_right.gif" width="12" height="30"/></td>
                    </tr>
                </table>
            </div>
            <div class="m_l_bor" style="padding:10px">
                <div style="padding:10px"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<? unset($_magic_vars);unset($data); ?>
<div style="clear: both;">
    <? $this->magic_include(array('file' => "footer.html", 'vars' => array()));?>
</div>
</body>
</html>