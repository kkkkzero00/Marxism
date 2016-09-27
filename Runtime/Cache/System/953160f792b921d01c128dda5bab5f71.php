<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php if(empty($pageTitle)): echo S('SITE_ADMIN_TITLE'); else: echo ($_pageTitle); ?> - <?php echo S('SITE_ADMIN_TITLE'); endif; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="<?php echo S('SITE_ADMIN_DESCRIPTION');?>" name="description"/>
<meta content="homyit.cn" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/HyAdmin-master/Public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->

<?php if(is_array($_assets["GLOBAL"]["CSS"])): foreach($_assets["GLOBAL"]["CSS"] as $key=>$item): ?><link href="_PUBLIC__/assets/global/styles/<?php echo ($item); ?>" rel="stylesheet" type="text/css"/><?php endforeach; endif; ?>
<?php if(is_array($_assets["PLUGINS"]["CSS"])): foreach($_assets["PLUGINS"]["CSS"] as $key=>$item): ?><link href="/HyAdmin-master/Public/assets/global/plugins/<?php echo ($item); ?>" rel="stylesheet" type="text/css"/><?php endforeach; endif; ?>
<?php if(is_array($_assets["PAGES"]["CSS"])): foreach($_assets["PAGES"]["CSS"] as $key=>$item): ?><link href="/HyAdmin-master/Public/assets/pages/styles/<?php echo ($item); ?>" rel="stylesheet" type="text/css"/><?php endforeach; endif; ?>

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/HyAdmin-master/Public/assets/global/styles/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/global/styles/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/layout/styles/layout.css" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/layout/styles/themes/blue.css" rel="stylesheet" type="text/css"/>
<link href="/HyAdmin-master/Public/assets/global/styles/hyframe.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
            <img src="/HyAdmin-master/Public/assets/layout/img/logo-default.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <form class="hy-search-form search-form search-form-expanded" action="extra_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                    </span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default">
                        <?php echo count($hyAlerts);?> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><span class="bold"><?php echo count($hyAlerts);?></span> 条待处理的信息</h3>
                                <a href="<?php echo U('System/HyAlert/all');?>">查看全部</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <?php if(empty($hyAlerts)): ?><li style="padding:10px;">暂无未读消息！</li><?php endif; ?>
                                    <?php if(is_array($hyAlerts)): $i = 0; $__LIST__ = $hyAlerts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                        <?php if(!empty($v['url'])): ?><a href="<?php echo U($v['url']);?>"><?php else: ?><a href="javascript:;"><?php endif; ?>
                                            <span class="time">
                                                <?php echo (to_time($v["create_time"],5)); ?>
                                            </span>
                                            <span class="details">
                                                <?php $arr=explode(',',$v['icon']); $icon=$arr[1]; $label=$arr[0]?:'label-success'; ?>
                                                <span class="label label-sm label-icon <?php echo ($label); ?>">
                                                <i class="fa <?php echo ($icon); ?> fa-fw"></i>
                                                </span>
                                                                                                                            【<?php echo ($v["category"]); ?>】<?php echo ($v["message"]); ?>                                                                         
                                            </span>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default">
                        1 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>你有 <span class="bold">1</span> 封未读邮件！</h3>
                                <a href="page_inbox.html">查看全部</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                            <img src="/HyAdmin-master/Public/assets/layout/img/avatar2.jpg" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
	                                        <span class="from">宏奕</span>
	                                        <span class="time">刚刚</span>
                                        </span>
                                        <span class="message">TODO...  TODO...  TODO...  </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->                    
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle hide1" src="<?php echo session('avatarFile');?>"/>
                            <span class="username username-hide-on-mobile">
                            <?php echo session('userName');?>（<?php echo session('roleTitle');?>）</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo U('System/User/profile');?>">
                                <i class="icon-user"></i> 个人信息</a>
                            </li>
                            <?php $roleSwitch=session('roleSwitch'); ?>
                            <?php if(is_array($roleSwitch)): $i = 0; $__LIST__ = array_slice($roleSwitch,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('System/HyStart/switchs',array('role'=>$key));?>">
                                <i class="icon-settings"></i> 切换到 - <?php echo ($v); ?></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo U('System/HyStart/logout');?>">
                                <i class="icon-logout"></i> 退出系统 </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container hy-page-<?php echo strtolower(CONTROLLER_NAME);?>">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="hy-sidebar-menu" class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                HyFrame数据管理框架&nbsp;<small>简洁、流畅、安全、自适应移动设备</small>
            </h3>
            <div class="page-bar">
                
<ul class="page-breadcrumb">
	<li><i class="fa fa-home"></i> <a href="/HyAdmin-master">首页</a> <i class="fa fa-angle-right"></i></li>
	<li><a href="javascript:;">欢迎中心</a></li>
</ul>

                
            </div>
            <div id="hy-alert-wrapper"></div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
        <div class="visual">
            <i class="fa fa-comments"></i>
        </div>
        <div class="details">
            <div class="number">
                 1349
            </div>
            <div class="desc">
                 新的留言
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
        <div class="visual">
            <i class="fa fa-trophy"></i>
        </div>
        <div class="details">
            <div class="number">
                 12.5w
            </div>
            <div class="desc">
                 总利润
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
        <div class="visual">
            <i class="fa fa-shopping-cart"></i>
        </div>
        <div class="details">
            <div class="number">
                 549
            </div>
            <div class="desc">
                 新的订单
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
        <div class="visual">
            <i class="fa fa-globe"></i>
        </div>
        <div class="details">
            <div class="number">
                 +89%
            </div>
            <div class="desc">
                 销售增长率
            </div>
        </div>
        </a>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green-sharp"></i> <span  class="caption-subject font-green-sharp bold">欢迎中心</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="收缩/展开">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <p class="pull-left time-now"></p>
                <div class="pull-right hidden-480">
                <iframe name="weather_inc" src="http://tianqi.xixik.com/cframe/10" width="300" height="25" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" ></iframe>
                </div>
                <div class="clearfix"></div>
                <br>
                <p>上次登录时间：<?php echo ($lastLogin); ?><i class="pull-right"><a href="<?php echo U('User/profile/#tab-2-3');?>">账号异常？立刻修改密码</a></i></p>
                <br>
                <p>您当前有<a href="<?php echo U('HyAlert/all');?>"> <?php echo count($hyAlerts);?> 条新的提醒</a> ， <a href="<?php echo U('Inbox/all');?>">0 封未读邮件</a>，请注意查收！</p>
                <br>
                <p>当前默认角色：<?php echo ($role); ?></p>
                <?php if(!empty($roles)): ?><p> 我可以切换的角色有：<b>
                    <?php if(is_array($roles)): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(($v) == $role): else: ?>&nbsp;<?php echo ($v); ?>&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?></b>
                                                    。请单击右上角头像，切换其他角色。
                    </p><?php endif; ?>
                <br>
            </div>
        </div>
        <!-- END PORTLET-->
</div>
<div class="col-md-6 col-sm-6">
       <!-- BEGIN PORTLET-->
       <div class="portlet light notice">
           <div class="portlet-title">
               <div class="caption">
                   <i class="icon-pin font-red-sunglo"></i>
                   <span class="caption-subject font-red-sunglo bold">系统公告</span>
               </div>
               <div class="tools">
                   <a href="javascript:;" class="collapse" data-original-title="收缩" title="收缩/展开">
                   </a>
                   <a href="javascript:;" class="reload" data-original-title="" title="刷新">
                   </a>
                   <a href="javascript:;" class="fullscreen" data-original-title="" title="全屏">
                   </a>
               </div>
               <div class="actions margin-right-10">
                   <a href="<?php echo U('HyNotice/all');?>" class="btn btn-circle btn-default btn-sm">
                       <i class="fa fa-list-alt"></i> 全部
                   </a>
               </div>
           </div>
           <div class="portlet-body">
               <div class="panel-group accordion" id="accordion1">
                   <?php if(is_array($notice)): $k = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; $isOpen=(1===$k)?'in':'collapse';$isOpen0=(1===$k)?'':'collapsed'; ?>
                       <div class="panel panel-default">
                           <div class="panel-heading">
                               <h4 class="panel-title">
                                   <a class="row accordion-toggle accordion-toggle-styled notice-title <?php echo ($isOpen0); ?>" title="<?php echo ($v['title']); ?>" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1_<?php echo ($k); ?>">
                                       <div class="col-xs-10">
                                           <?php echo ($v['title']); ?>
                                       </div>
                                       <div class="col-xs-2">
                                           <?php if(!empty($v['file_id'])): ?><button class="btn btn-circle btn-default btn-xs pull-right-xs notice-file-down" data-url="<?php echo (file_down_url($v['file_id']));?>" title="下载附件"><i class="fa fa-paperclip fa-fw"></i></button><?php endif; ?>
                                       </div>
                                   </a>
                               </h4>
                           </div>
                           <div id="collapse_1_<?php echo ($k); ?>" class="panel-collapse <?php echo ($isOpen); ?>">
                               <div class="panel-body">
                                   <div class="scroller" style="height:100px">
                                       <?php echo ($v['content']); ?>
                                       <?php if(empty($v['content'])): ?><div class="empty">无</div><?php endif; ?>
                                   </div>  
                               </div>
                           </div>
                       </div><?php endforeach; endif; else: echo "" ;endif; ?>
               </div>
           </div>
       </div>
       <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light chats">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubbles font-blue-steel"></i> <span
                        class="caption-subject font-blue-steel bold uppercase">交流天地</span>
                        <span class="caption-helper">系统内的用户可在此交流发言...</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="收缩" title="收缩/展开">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="刷新">
                    </a>
                    <a href="javascript:;" class="fullscreen" data-original-title="" title="全屏">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="chat-scroller-wrapper">
                    <div class="chat-scroller">
                        <ul class="chat-list">
                        <!-- 聊天列表 -->
                        </ul>
                    </div>
                </div>
                <div class="chat-form">
                    <div class="input-cont">
                        <input class="form-control" type="text"
                            placeholder="写点什么..." name="input-chat" />
                    </div>
                    <div class="btn-cont">
                        <span class="arrow"></span>
                        <button type="submit" class="btn blue icn-only btn-chat"> <i
                            class="fa fa-check icon-white"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
</div>
<div class="col-md-6 col-sm-6">
    <div class="portlet light tasks-widget">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-share font-green-haze"></i>
                <span class="caption-subject font-green-haze bold uppercase">其他版块</span>
                <span class="caption-helper">根据自己的业务需要...</span>
            </div>
        </div>
        <div class="portlet-body">
        </div>
    </div>
</div>

            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
         2014-2015 &copy; 宏奕工作室 Homyit Studio
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS -->
<script type="text/javascript">
/* GLOBAL URL */
var _ROOT_ = '/HyAdmin-master',
    _PUBLIC_ = '/HyAdmin-master/Public',
    _INDEX_ = '/HyAdmin-master/index.php',
    _ACTION_ = '/HyAdmin-master/index.php/System/Index/index',
    _MODULE_ = '/HyAdmin-master/index.php/System',
    _CONTROLLER_ = '/HyAdmin-master/index.php/System/Index';
</script>
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/HyAdmin-master/Public/assets/global/plugins/respond.min.js"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/HyAdmin-master/Public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/jquery.blockui.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/store-json2.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/crypto.custom.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/bootbox.min.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/plugins/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<?php if(is_array($_assets["PLUGINS"]["JS"])): foreach($_assets["PLUGINS"]["JS"] as $key=>$item): ?><script src="/HyAdmin-master/Public/assets/global/plugins/<?php echo ($item); ?>" type="text/javascript"></script><?php endforeach; endif; ?>
<!-- BEGIN CORE SCRIPTS -->
<script src="/HyAdmin-master/Public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/HyAdmin-master/Public/assets/global/scripts/hyframe.js" type="text/javascript"></script>
<!-- END CORE SCRIPTS -->
<?php if(is_array($_assets["GLOBAL"]["JS"])): foreach($_assets["GLOBAL"]["JS"] as $key=>$item): ?><script src="/HyAdmin-master/Public/assets/global/scripts/<?php echo ($item); ?>" type="text/javascript"></script><?php endforeach; endif; ?>
<?php if(is_array($_assets["PAGES"]["JS"])): foreach($_assets["PAGES"]["JS"] as $key=>$item): ?><script src="/HyAdmin-master/Public/assets/pages/scripts/<?php echo ($item); ?>" type="text/javascript"></script><?php endforeach; endif; ?>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
jQuery(document).ready(function() {
    HyFrame.initMenu(<?php echo ($hyMenu); ?>);
    Metronic.init();
    Layout.init();
    HyFrame.init();
});
</script>

<script>
$(document).ready(function(){
	Index.init();
});
</script>

<!-- END JAVASCRIPTS -->
<!-- BEGIN ANALYTICS -->
<div class="hidden">
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?41c66ca2d9e89051b8f673b25979b6a0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</div>
<!-- END ANALYTICS -->
</body>
<!-- END BODY -->
</html>