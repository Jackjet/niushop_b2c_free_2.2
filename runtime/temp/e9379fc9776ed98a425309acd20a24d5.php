<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:47:"template/adminblue\Goods\addGoodsAttribute.html";i:1531363025;s:28:"template/adminblue\base.html";i:1536464688;s:45:"template/adminblue\controlCommonVariable.html";i:1522486340;s:32:"template/adminblue\urlModel.html";i:1510819828;s:34:"template/adminblue\pageCommon.html";i:1531363025;s:34:"template/adminblue\openDialog.html";i:1522669943;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
	<?php if($frist_menu['module_name']=='首页'): ?>
	<title><?php echo $title_name; ?> - 商家管理</title>
	<?php else: ?>
		<title><?php echo $title_name; ?> - <?php echo $frist_menu['module_name']; ?>管理</title>
	<?php endif; ?>
	<link rel="shortcut icon" type="image/x-icon" href="ADMIN_IMG/admin_icon.ico" media="screen"/>
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/css/ns_blue_common.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/simple-switch/css/simple.switch.three.css" />
	<link rel="stylesheet" type="text/css" href="ADMIN_CSS/selectric.css" />
	<style>
	.Switch_FlatRadius.On span.switch-open{background-color: #126AE4;border-color: #126AE4;}
	#copyright_meta a{color:#333;}
	.fa-wechat-applet:before{content:'';display:inline-block;width:20px;height:20px;background:#FFF url(__STATIC__/images/wechat_applet.png) no-repeat;background-size: 100%;}
	</style>
	<script src="__STATIC__/js/jquery-1.8.1.min.js"></script>
	<script src="__STATIC__/blue/bootstrap/js/bootstrap.js"></script>
	<script src="__STATIC__/bootstrap/js/bootstrapSwitch.js"></script>
	<script src="__STATIC__/simple-switch/js/simple.switch.js"></script>
	<script src="__STATIC__/js/jquery.unobtrusive-ajax.min.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<script src="__STATIC__/js/seller.js"></script>
	<script src="__STATIC__/js/load_task.js"></script>
	<script src="__STATIC__/js/load_bottom.js" type="text/javascript"></script>
	<script src="ADMIN_JS/layer/layer.js"></script>
	<script src="ADMIN_JS/jquery-ui.min.js"></script>
	<script src="ADMIN_JS/ns_tool.js"></script>
	<script src="ADMIN_JS/jquery.selectric.js"></script>
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/css/ns_table_style.css">
	
	<script>
	/**
	 * Niushop商城系统 - 团队十年电商经验汇集巨献!
	 * ========================================================= Copy right
	 * 2015-2025 山西牛酷信息科技有限公司, 保留所有权利。
	 * ---------------------------------------------- 官方网址:
	 * http://www.niushop.com.cn 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
	 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
	 * =========================================================
	 * 
	 * @author : 小学生王永杰 
	 * @date : 2016年12月16日 16:17:13
	 * @version : v1.0.0.0 商品发布中的第二步，编辑商品信息
	 */
	var PLATFORM_NAME = "<?php echo $title_name; ?>";
	var ADMINIMG = "ADMIN_IMG";//后台图片请求路径
	var ADMINMAIN = "ADMIN_MAIN";//后台请求路径
	var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
	var APPMAIN = "APP_MAIN";//手机端请求路径
	var UPLOAD = "__UPLOAD__";//上传文件根目录
	var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
	var ROOT = "__ROOT__";//根目录
	var ADDONS = "__ADDONS__";
	var STATIC = "__STATIC__";
	
	//上传文件路径
	var UPLOADGOODS = 'UPLOAD_GOODS';//存放商品图片
	var UPLOADGOODSSKU = 'UPLOAD_GOODS_SKU';//存放商品SKU
	var UPLOADGOODSBRAND = 'UPLOAD_GOODS_BRAND';//存放商品品牌图
	var UPLOADGOODSGROUP = 'UPLOAD_GOODS_GROUP';////存放商品分组图片
	var UPLOADGOODSCATEGORY = 'UPLOAD_GOODS_CATEGORY';////存放商品分类图片
	var UPLOADCOMMON = 'UPLOAD_COMMON';//存放公共图片、网站logo、独立图片、没有任何关联的图片
	var UPLOADAVATOR = 'UPLOAD_AVATOR';//存放用户头像
	var UPLOADPAY = 'UPLOAD_PAY';//存放支付生成的二维码图片
	var UPLOADADV = 'UPLOAD_ADV';//存放广告位图片
	var UPLOADEXPRESS = 'UPLOAD_EXPRESS';//存放物流图片
	var UPLOADCMS = 'UPLOAD_CMS';//存放文章图片
	var UPLOADVIDEO = 'UPLOAD_VIDEO';//存放视频文件
	var UPLOADGOODSVIDEO = "<?php echo constant('GOODS_VIDEO_PATH'); ?>";//存放商品视频
	var UPLOADFILE = "<?php echo constant('UPLOAD_FILE'); ?>";//存放文件
	var UPLOADWATERMARK = "<?php echo constant('UPLOAD_WATERMARK'); ?>";//存放水印图片
</script>
	
<style type="text/css">
.error {padding-left: 5px !important;}
.table{width:100%;display:table;}
.inline-block{display:inline-block;}
.w1{width:1%;}
.w5{width:5%;}
.w75{width:15%;vertical-align: middle;}
.w19{width:10%;text-align:center;}
.w100{width:99.87% !important;min-height: 40px;line-height: 40px;border-bottom: 1px dotted #E1E6F0;border-left: 1px solid #E1E6F0;border-right: 1px solid #E1E6F0;}
.add-spec{height: 40px;line-height: 40px;border-bottom:1px dotted #E6E6E6;padding:0 10px;}
input{vertical-align: initial;}
.table input[type="text"], input[type="password"], input.text, input.password {font: 12px/20px Arial;color: #777;background-color: #FFF;vertical-align: baseline;margin-bottom:0;}
.set-style dl dt {width: 130px;text-align: right;}
.attr-choose-wrap label, .relate-norm label {cursor: pointer;float: left;margin: 0 15px 10px 0;padding: 0 10px;color: #636363;line-height: 28px;}
.attr-choose-wrap label.current, .relate-norm label.current {color: #636363;background: url(../images/icon_choose.gif) no-repeat right bottom;}
input{width:100px;}
.selectbox{width:130px;}
.text {color: #fb6b5b;}
.attr_table{position: fixed;top: 50%;left: 50%;z-index: 1050;width: 560px;margin-left: -281px;margin-top:-133.5px;background-color: #ffffff;border: 1px solid rgba(0, 0, 0, 0.3);outline: none;	box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);background-clip: padding-box;}
.edit_top{padding: 0 20px;line-height: 40px;background: #e5e5e5;}
.addSpec{height: 40px;line-height: 40px;padding: 0 10px;}
.modal-header {padding: 9px 15px;border-bottom: 1px solid #eee;margin-bottom:10px;}
.modal-footer {padding: 14px 15px 15px;margin-bottom: 0;text-align: right;background-color: #f5f5f5;border-top: 1px solid #ddd;border-radius: 0 0 6px 6px;box-shadow: inset 0 1px 0 #ffffff;margin-top:10px;}
.w140{width:140px;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;padding:0;height:23px;line-height:26px;}

/* 规格 */
.guige_p{background: #eeeeee;padding-left: 10px;}
.guige_list a,.brand_list a{display: block;float: left;margin: 2px 5px 10px 0;padding: 0 8px;border-radius: 2px;color: #333333;line-height: 29px;border: 1px solid rgb(210, 204, 204);position: relative;}
.guige_list a img,.brand_list a img{display: none;}
.guige_list a:hover,.brand_list a:hover{background: #126AE4;color: #126AE4;}
.guige_list a:hover img,.brand_list a:hover img{display: block;position: absolute;top: 9px;left: 42%;}

/* 规格表格设置 */
.attribute_table{width: 100%;}
.attribute_table thead{background: #eeeeee;}
.attribute_table th{padding: 7px 0 7px 10px;}
.attribute_table td{border:1px solid #eeeeee;padding: 7px 0 7px 10px;}
.attribute_table td input{margin-right: 5px;vertical-align: middle;}
#setGoodsBrand{width: 800px;left: 44%;}
.set-style dl dd input[type="text"], .set-style dl dd input[type="password"]{width: 100px;}
.attr_table .checkbox-common{vertical-align:1px;}

/* 关联品牌 */
.brand_content .brand_item{display: inline-block;border: 1px solid #eeeeee;text-align: center;cursor: pointer;border-radius: 5px;margin: 8.5px;width: 11.3%;height: 95px;overflow: hidden;}
.brand_content .brand_item .img_content{width: 100%;height: 70px;line-height: 70px;border-bottom: 1px solid #eeeeee;overflow: hidden;}
.brand_content .brand_item .img_content img{display: inline-block !important;vertical-align: middle !important;max-width: 100% !important;max-height: 100% !important;height: auto !important;}
.brand_content .brand_item.select p{background: #126AE4;color: #ffffff;}
.brand_content .brand_item p{margin-bottom: 0;line-height: 26px;}
.add_relation{display: block;background: #126AE4;float: left;padding: 0 12px;margin: 2px 5px 5px 0;line-height: 30px;}
.set-style dl dd textarea{height:100px;width:350px !important;}
</style>

	</head>
<body>
<input type="hidden" id="niushop_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="niushop_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="niushop_admin_model" value="<?php echo admin_model(); ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#niushop_admin_model"));
	if(url == ''|| url == null){
		return 'SHOP_MAIN';
	}else{
		var str=url.substring(0, 1);
		if(str=='/' || str=="\\"){
			url=url.substring(1, url.length);
		}
		if($("#niushop_rewrite_model").val()==1 || $("#niushop_rewrite_model").val()==true){
			return 'SHOP_MAIN/'+url;
		}
		var action_array = url.split('?');
		//检测是否是pathinfo模式
		url_model = $("#niushop_url_model").val();
		if(url_model==1 || url_model==true){
			var base_url = 'SHOP_MAIN/'+action_array[0];
			var tag = '?';
		}else{
			var base_url = 'SHOP_MAIN?s=/'+ action_array[0];
			var tag = '&';
		}
		if(action_array[1] != '' && action_array[1] != null){
			return base_url + tag + action_array[1];
		}else{
			return base_url;
		}
	}
}

//处理图片路径
function __IMG(img_path){
	var path = "";
	if(img_path != undefined && img_path != ""){
		if(img_path.indexOf("http://") == -1 && img_path.indexOf("https://") == -1){
			path = UPLOAD+"\/"+img_path;
		}else{
			path = img_path;
		}
	}
	return path;
}
</script>
<article class="ns-base-article">

	<header class="ns-base-header">
		<div class="ns-logo" onclick="location.href='<?php echo __URL('ADMIN_MAIN'); ?>';"></div>
		<div class="ns-search">
			<div class="nav-menu js-nav">
				<img src="__STATIC__/blue/img/nav_menu.png" title="导航管理" />
			</div>
			<div class="ns-navigation-management">
				<div class="ns-navigation-title">
					<h4>导航管理</h4>
					<span>x</span>
				</div>
				<div style="height:40px;"></div>
				<?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): if( count($nav_list)==0 ) : echo "" ;else: foreach($nav_list as $key=>$nav): ?>
				<dl>
					<dt><?php echo $nav['data']['module_name']; ?></dt>
					<?php if(is_array($nav['sub_menu']) || $nav['sub_menu'] instanceof \think\Collection || $nav['sub_menu'] instanceof \think\Paginator): if( count($nav['sub_menu'])==0 ) : echo "" ;else: foreach($nav['sub_menu'] as $key=>$nav_sub): ?>
					<dd>
						<a href="<?php echo __URL('ADMIN_MAIN/'.$nav_sub['url']); ?>"><?php echo $nav_sub['module_name']; ?></a>
					</dd>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</dl>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="ns-search-block">
				<i class="fa fa-search" title="搜索"></i>
				<span>搜索</span>
				<div class="mask-layer-search">
					<input type="text" id="search_goods" placeholder="搜索" />
					<a href="javascript:search();"><img src="__STATIC__/blue/img/enter.png"/></a>
				</div>
			</div>
		</div>
		<nav>
			<ul>
				<?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if(strtoupper($per['module_id']) == $headid): ?>
				<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>';">
					<span><?php echo $per['module_name']; ?></span>
					<?php if($per['module_id'] == 10000): ?>
						<span class="is-upgrade"></span>
					<?php endif; ?>
				</li>
				
				<?php else: ?>
				<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>';">
					<span><?php echo $per['module_name']; ?></span>
					<?php if($per['module_id'] == 10000): ?>
						<span class="is-upgrade"></span>
					<?php endif; ?>
				</li>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</nav>
		<div class="ns-base-tool">
			<i class="i-home"  title="前台首页"><a href="<?php echo __URL('SHOP_MAIN'); ?>" target="_blank"></a></i>
			<i class="i-close" title="退出登录"><a href="<?php echo __URL('ADMIN_MAIN/login/logout'); ?>"></a></i>
			<i class="ns-vertical-bar"></i>
			<div class="ns-help">
				<div class="logo">
				<?php if($user_headimg != ''): ?>
				<img src="<?php echo __IMG($user_headimg); ?>"/>
				<?php else: ?>
				<img src="__STATIC__/blue/img/user_admin_blue.png" width="30" >
				<?php endif; ?>
				</div>
				<span><?php echo $user_name; ?></span>
				<i class="fa fa-angle-down"></i>
				<ul>
					<li>
						<img src="__STATIC__/blue/img/add_favorites.png" />
						<a href="#edit-password" data-toggle="modal" title="修改密码">修改密码</a>
					</li>
					<li title="清理缓存" onclick="delcache()">
						<img src="__STATIC__/blue/img/clear_the_cache.png"/>
						<a href="javascript:;">清理缓存</a>
					</li>
					<li title="加入收藏" onclick="addFavorite()">
						<img src="__STATIC__/blue/img/add_favorites.png" />
						<a href="javascript:;">加入收藏</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	
	<aside class="ns-base-aside">
		<div class="ns-main-block">
			
			<h3 style="margin-top:50px;">
				<?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if(strtoupper($per['module_id']) == $headid): ?>
					<span class="<?php echo $per['module_name']; ?>"><?php echo $per['module_name']; ?></span>
					<i class="fa fa-caret-down"></i>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</h3>
			
			<nav>
				<ul>
					<?php if(is_array($leftlist) || $leftlist instanceof \think\Collection || $leftlist instanceof \think\Paginator): if( count($leftlist)==0 ) : echo "" ;else: foreach($leftlist as $key=>$leftitem): if(strtoupper($leftitem['module_id']) == $second_menu_id): ?>
					<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>';" title="<?php echo $leftitem['module_name']; ?>"><?php echo $leftitem['module_name']; ?></li>
					<?php else: ?>
					<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>';" title="<?php echo $leftitem['module_name']; ?>"><?php echo $leftitem['module_name']; ?></li>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					<!-- 快捷菜单列表 -->
					<?php if($is_show_shortcut_menu == 1): if(is_array($shortcut_menu_list) || $shortcut_menu_list instanceof \think\Collection || $shortcut_menu_list instanceof \think\Paginator): $i = 0; $__LIST__ = $shortcut_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
					<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$menu['url']); ?>';" title="<?php echo $menu['module_name']; ?>"><?php echo $menu['module_name']; ?></li>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</ul>
				<!-- 快捷菜单设置按钮 -->
				<?php if($is_show_shortcut_menu == 1): ?>
				<div class="shortcut-menu" onclick="show_shortcut_menu()">
					<span></span>
					常用功能
				</div>
				<?php endif; ?>
			</nav>
			
			<div style="height:50px;"></div>
			
<!--			<div id="bottom_copyright">
				<footer>
					<img id="copyright_logo"/>
&lt;!&ndash; 					<p> &ndash;&gt;
&lt;!&ndash; 						<span id="copyright_desc"></span> &ndash;&gt;
&lt;!&ndash; 						<br/> &ndash;&gt;
&lt;!&ndash; 						<a id="copyright_companyname" style="color: #333" target="_blank"></a> &ndash;&gt;
&lt;!&ndash; 						<br/> &ndash;&gt;
&lt;!&ndash; 						<span id="copyright_meta"></span> &ndash;&gt;
&lt;!&ndash; 					</p> &ndash;&gt;
				</footer>
			</div>-->
		</div>
	</aside>
	
	<section class="ns-base-section">
		
		
		
		<div style="position:relative;margin:0;">
			<!-- 面包屑导航 -->
			<?php if(!isset($is_index)): ?>
			<div class="breadcrumb-nav">
				<a href="<?php echo __URL('ADMIN_MAIN'); ?>"><?php echo $title_name; ?></a>
				<?php if($frist_menu['module_name'] != ''): ?>
					<i class="fa fa-angle-right"></i>
					<a href="<?php echo __URL('ADMIN_MAIN/'.$frist_menu['url']); ?>"><?php echo $frist_menu['module_name']; ?></a>
				<?php endif; if($secend_menu['module_name'] != ''): ?>
					<i class="fa fa-angle-right"></i>
					<!-- 需要加跳转链接用这个：ADMIN_MAIN/<?php echo $secend_menu['url']; ?> -->
					<a href="javascript:;" style="color:#999;"><?php echo $secend_menu['module_name']; ?></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<!-- 三级导航菜单 -->
			
				<?php if(count($child_menu_list) > 1): ?>
				<nav class="ns-third-menu">
					<ul>
					<?php if(is_array($child_menu_list) || $child_menu_list instanceof \think\Collection || $child_menu_list instanceof \think\Paginator): if( count($child_menu_list)==0 ) : echo "" ;else: foreach($child_menu_list as $k=>$child_menu): if($child_menu['active'] == '1'): ?>
							<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$child_menu['url']); ?>';"><?php echo $child_menu['menu_name']; ?></li>
						<?php else: ?>
							<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$child_menu['url']); ?>';"><?php echo $child_menu['menu_name']; ?></li>
						<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</nav>
				<?php endif; ?>
			
			<div class="right-side-operation">
				<ul>
					
					
<!-- 					<?php if($warm_prompt_is_show == 'show'): ?>style="display:none;"<?php endif; ?> style="display:block;" -->
					<li>
						<a class="js-open-warmp-prompt" href="javascript:;" data-menu-desc=''><i class="fa fa-question-circle"></i>&nbsp;提示</a>
						<div class="popover">
							<div class="arrow"></div>
							<div class="popover-content">
								<div>
									<?php if($secend_menu['desc']): ?>
									<h4>操作提示</h4>
									<p><?php echo $secend_menu['desc']; ?></p>
									<hr/>
									<?php endif; ?>
									<h4>功能提示</h4>
									<p class="function-prompts"></p>
								</div>
							</div>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
		
		<!-- 操作提示 -->
		
<!-- 		<?php if($warm_prompt_is_show == 'hidden'): ?>style="display:none;"<?php endif; ?> -->
		<div class="ns-warm-prompt" style="display:none;">
			<div class="alert alert-info">
				<button type="button" class="close">&times;</button>
				<h4>
<!-- 					{1block name="alert_info"} -->
<!-- 					<i class="fa fa-info-circle"></i> -->
<!-- 					<span class="operating-hints">操作提示</span> -->
<!-- 						<?php if($secend_menu['desc']): ?> -->
<!-- 						<span><?php echo $secend_menu['desc']; ?></span> -->
<!-- 						<?php endif; ?> -->
<!-- 					{1/block} -->
				</h4>
			</div>
		</div>
		
		
		<div class="ns-main">
			
<div class="space-10"></div>
<div class="set-style">
	<dl>
		<dt><span class="color-red">*</span>类型名称：</dt>
		<dd>
			<input id="attr_name" type="text" placeholder="请输入类型名称" class="input-common"/>
			<span class="error">请输入类型名称</span>
		</dd>
	</dl>
	<dl>
		<dt><span class="color-red">&nbsp;</span>属性排序：</dt>
		<dd>
			<input id="sort" type="number" class="input-common harf" placeholder="0" onkeyup='this.value=this.value.replace(/\D/gi,"")'/>
		</dd>
	</dl>
	<dl>
		<dt><span class="color-red">&nbsp;</span>是否启用：</dt>
		<dd>
			<input id="is_visible" type="checkbox" class="checkbox" checked="checked" />
		</dd>
	</dl>

	<dl>
		<dt><span class="color-red">&nbsp;</span>关联规格：</dt>
		<dd>
			<div class="guige_list">
			</div>
			<a href="javascript:;" class="add_relation" data-toggle="modal" data-target="#setGoodsAttribute"><img src="ADMIN_IMG/add_ico.png" alt="" /></a>
		</dd>
	</dl>
	
	<dl>
		<dt><span class="color-red">&nbsp;</span>关联品牌：</dt>
		<dd>
			<div class="brand_list">
			</div>
			<a href="javascript:;" class="add_relation" data-toggle="modal" data-target="#setGoodsBrand"><img src="ADMIN_IMG/add_ico.png" alt="" /></a>
		</dd>
	</dl>


	<div>
		<table class="table-class" id='attrList'>
			<colgroup>
				<col style="width: 2%;">
				<col style="width: 6%;">
				<col style="width: 15%;">
				<col style="width: 15%;">
				<col style="width: 13%;">
				<col style="width: 34%;">
				<col style="width: 15%;">
			</colgroup>
			<thead>
				<tr>
					<th></th>
					<th>排序</th>
					<th align="left">属性名称</th>
					<th align="left">所属类型</th>
					<th>是否筛选</th>
					<th align="left">属性值</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr class="value_data">
					<td></td>
					<td>
						<input type="number" name="value_sort_0" class="input-common short" placeholder="0" onkeyup='this.value=this.value.replace(/\D/gi,"")' />
					</td>
					<td>
						<input type="text" name="value_name_0" class="input-common middle"/>
					</td>
					<td>
						<select class="selectbox_0 select-common middle" id="type_0" onchange="updateAttrselectvalue(0,this);" style="width:110px;">
							<option value="1">输入框</option>
							<option value="2">单选框</option>
							<option value="3">复选框</option>
						</select>
					</td>
					<td style="text-align: center;">
						<a href="javascript:;" class="is_search is_search_0" is_search="1" onclick="tab_is_search(this)">
							<img src="ADMIN_IMG/checked.png" alt="" width="15"/>
						</a>
					</td>
					<td id="value_0" style="word-break:break-all;">
						
					</td>
					<input type="hidden" id="value_hidden_0">
					<td style="text-align: center;">
						<span class="spec_box_0"></span>
						<a href="javascript:;" onclick="delSpecValue(this)">删除</a>
					</td>
				</tr>
			</tbody>
		</table>
		<div style="padding:6px 0;">
			<a href="javascript:;" onclick="addSpecValue(this)" style="font-size: 12px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;添加一个属性</a>
		</div>
	</div>
		
	<!-- 点击编辑弹出框开始 -->
	<div class="attr_table" id="Attrbox" style="display:none;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">编辑属性值</h3>
		</div>
		<dl>
			<dt><span class="color-red">*</span>属性值：</dt>
			<dd>
				<textarea rows="" cols="" id="attr_value" class="textarea-common"></textarea>
				<p class="hint">一行为一个属性值，多个属性值用换行输入</p>
			</dd>
		</dl>
		<div class="modal-footer">
			<input type="hidden" id="click_order"/>
			<button class="btn-common btn-big" onclick="submitAttrValue();hide_modal();" style="display:inline-block;">保存</button>
			<button class="btn-common-cancle btn-big" data-dismiss="modal" aria-hidden="true" onclick="hide_modal();">关闭</button>
		</div>
	</div>
	
	<!-- 点击编辑弹出框结束 -->
	<dl>
		<dt></dt>
		<dd>
			<button class="btn-common btn-big" onclick="addGoodsAttribute();">保存</button>
			<button class="btn-common-cancle btn-big" onclick="javascript:history.back(-1);">返回</button>
		</dd>
	</dl>
</div>

<!--设置规格 -->
<div class="modal fade hide" id="setGoodsAttribute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>规格关联设置</h3>
			</div>
			<div class="modal-body">
				<table class="attribute_table">
					<thead>
						<tr>
							<th width="30%">规格</th>
							<th width="70%">描述</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($goodsguige['data']) || $goodsguige['data'] instanceof \think\Collection || $goodsguige['data'] instanceof \think\Paginator): $k = 0; $__LIST__ = $goodsguige['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
							<tr>
								<td>
									<label for="attribute_check<?php echo $k; ?>">
										<i class="checkbox-common">
											<input type="checkbox" id="attribute_check<?php echo $k; ?>" value="<?php echo $v['spec_id']; ?>" spec_name="<?php echo $v['spec_name']; ?>" <?php if(in_array(($v['spec_id']), is_array($info['spec_id_array'])?$info['spec_id_array']:explode(',',$info['spec_id_array']))): ?>checked<?php endif; ?> name="spec"/>
										</i>
										<?php echo $v['spec_name']; ?>
									</label>
								</td>
								<td><?php echo $v['spec_des']; ?></td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn-common btn-big" onclick="setSku();">确定</button>
				<button type="button" class="btn btn-big" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
</div>

<!--设置品牌 -->
<div class="modal fade hide" id="setGoodsBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>关联品牌设置</h3>
			</div>
			<div class="modal-body">
				<div class="brand_content">
					<?php if(is_array($brand_list) || $brand_list instanceof \think\Collection || $brand_list instanceof \think\Paginator): if( count($brand_list)==0 ) : echo "" ;else: foreach($brand_list as $key=>$v): ?>
					<div class="brand_item <?php if(in_array(($v['brand_id']), is_array($info['brand_id_array'])?$info['brand_id_array']:explode(',',$info['brand_id_array']))): ?>select<?php endif; ?>" brand_id = "<?php echo $v['brand_id']; ?>">
						<div class="img_content"><img src="<?php echo __IMG($v['brand_pic']); ?>" alt="" /></div>
						<p><?php echo $v['brand_name']; ?></p>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div class="modal-footer">
				<label class="radio inline normal all-select" style="float: left;">
					<i class="checkbox-common">
						<input type="checkbox" name="">
					</i>
					<span style="user-select: none">全选</span>
				</label>
				<button type="button" class="btn-common btn-big" onclick="setBrand();">确定</button>
				<button type="button" class="btn-common-cancle btn-big" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
</div>
<script src="ADMIN_JS/plugin/drag-arrange.js"></script>
<script>
//点击改变是否可以编辑属性值
function updateAttrselectvalue(order,e){
	$("#Attrbox").hide();
	if($(e).val()==1){
		$(e).parents(".value_data").find(".spec_box_"+order).html('<a href="javascript:;" style="color: #777;"></a>');
	}else{
		$(e).parents(".value_data").find(".spec_box_"+order).html('<a href="javascript:;" id="showAttrbox_'+order+'" onclick="showAttrbox('+order+',this);"> 编辑属性值</a>');
	}
	$(e).parents(".value_data").find("#value_"+order).html('');
	$("#Attrbox .Spec_data:gt(0)").remove();
	$("#Attrbox .Spec_data").eq(0).find("input[name='attr_value']").val('');
}

//点击编辑属性值弹出框事件
function showAttrbox(order,e){
	var click_order = $("#click_order").attr('click_order',order);
	var value_str = $(e).parents(".value_data").find("#value_"+order).text();
	var attr_value = "";
	if(value_str != undefined){
		var value_arr = value_str.split(',');
		for(var i=0; i<value_arr.length; i++){
			if(value_arr[i] != ""){
				if((i+1) == value_arr.length) attr_value += value_arr[i];
				else attr_value += value_arr[i]+"\n";
			}
		}
	}
	$("#attr_value").val($.trim(attr_value));
	$("#Attrbox").show();
}

$(".close").click(function(){
	$("#Attrbox").hide();
});

$(".btn").click(function(){
	$("#Attrbox").hide();
});

$('.brand_content>.brand_item').click(function(){

	if($(this).hasClass('select')){
		$(this).removeClass('select');
	}else{
		$(this).addClass('select');	
	}
});

function tab_is_search(e){
	var type = $(e).attr("is_search");
	if(type == 0){
		$(e).html('<img src="ADMIN_IMG/checked.png" alt="" width="15"/>');
		$(e).attr("is_search", 1);
	}else{
		$(e).html('<img src="ADMIN_IMG/un_checked.png" alt="" width="15"/>');
		$(e).attr("is_search", 0);
	}
}

function submitAttrValue(){
	var v = $("#attr_value").val().split("\n").toString();
	var click_order = $("#click_order").attr('click_order');
	$("#value_"+click_order).text(v);
	$("#value_hidden_"+click_order).val(v);
}

function addSpecValue(e){
	var data_obj_num = $(".value_data").length;
	var html = '<tr class="value_data new_data">';
			html += '<td></td>';
			html += '<td><input type="text" name="value_sort_'+data_obj_num+'" value="'+data_obj_num+'" class="input-common short"></td>';
			html += '<td><input type="text" name="value_name_'+data_obj_num+'" style="margin-right:5px;" class="input-common middle"></td>';
			html += '<td>';
				html += '<select class="selectbox selectbox_'+data_obj_num+' select-common middle" id="type_'+data_obj_num+'" onchange="updateAttrselectvalue('+data_obj_num+',this);">';
					html += '<option value="1">输入框</option>';
					html += '<option value="2">单选框</option>';
					html += '<option value="3">复选框</option>';
				html += '</select>';
			html += '</td>';
			html += '<td style="text-align:center;"><a href="javascript:;" class="is_search is_search_'+data_obj_num+'" is_search="1" onclick="tab_is_search(this)"><img src="ADMIN_IMG/checked.png" alt="" width="15"/></a></td>';
			html += '<td id="value_'+data_obj_num+'" style="word-break:break-all;"></td>';
			html += '<input type="hidden" id="value_hidden_'+data_obj_num+'" value="">';
			html += '<td style="text-align:center;"><span class="spec_box_'+data_obj_num+'"></span><a href="javascript:;" onclick="delSpecValue(this)">删除</a></td>'
		html += '</tr>';

	$("#attrList tbody tr:last-child").after(html);
	$('.select-common').selectric();
}

function delSpecValue(e){
	$( "#dialog" ).dialog({
		buttons: {
			"确定": function() {
				$(this).dialog('close');
				if($("#attrList tbody tr").length == 1){
					showMessage('error', '当前属性已经是最后一个，不能删除！'); 
					return;
				}
				$(e).parents('tr').remove();
			},"取消,#f5f5f5,#666" : function(){
				$(this).dialog('close');
			}
		},
		contentText:"你确定删除吗？",
		title:"消息提醒"
	});
}

var flag = false;//防止重复提交
function addGoodsAttribute() {
	var attr_name = trim($("#attr_name").val());
	if(attr_name == ''){
		$("#attr_name").focus();
		showTip("类型名称不能为空",'warning');
		return false;
	}
	var sort = $("#sort").val();
	if ($("#is_visible").prop("checked")) {
		var is_visible = 1;
	} else {
		var is_visible = 0;
	}
	
	var select_box = '';
	$("input[name='spec']:checked").each(function(){
		select_box = select_box+','+$(this).val();
	});
	select_box = select_box.substring(1);
	
	var select_brank = new Array();
	$(".brand_list a").each(function(){
		select_brank.push($(this).attr('value'));
	});
	var data_obj = $(".value_data");
	var data_obj_str = '';
	data_obj.each(function(i){
		if(data_obj.eq(i) != ''){
			var value_sort = $("input[name='value_sort_"+i+"']").val();
			var value_name = trim($("input[name='value_name_"+i+"']").val());
			var type = $("#type_"+i).val();
			var value = $("#value_hidden_"+i).val();
			if(type > 1){
				if(value == ''){
					$("#type_"+i).focus();
					showTip("类型为单选框或复选框时，属性值不能为空",'warning');
					flag = true;
					return false;
				}else{
					flag = false;
				}
			}
			var is_search = $(".is_search_"+i).attr("is_search");
			var new_str = '';
			new_str = value_name+ '|' +type+ '|' +value_sort+ '|' +is_search+ '|' +value;
			data_obj_str += ';' + new_str;
		}
	});
	data_obj_str = data_obj_str.substr(1);
	
	var data_obj_arr = data_obj_str.split('|');
	if(data_obj_arr[0] == ''){
		showTip("商品类型属性名称不能为空！",'warning');
		return false;
	}
	
	if(flag) return;
	flag = true;
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/addattributeservice'); ?>",
		data : {
			'attr_name' : attr_name,
			'sort' : sort,
			'is_visible' : is_visible,
			'select_box' :select_box,
			'data_obj_str' : data_obj_str,
			'select_brank' : select_brank.toString()
		},
		success : function(data) {
			if (data["code"] > 0) {
				showTip("添加成功","success");
				location.href = "<?php echo __URL('ADMIN_MAIN/goods/attributelist'); ?>";
			} else {
				showTip("添加失败","error");
				flag = false;
			}
		}
	});
}

//修改sku
function setSku(){
	
	var guige_list_html = '';
	$('#setGoodsAttribute input[name="spec"]').each(function(){
		if($(this).is(":checked")){
			
			guige_list_html += '<a href="javascript:;" value="'+ $(this).val() +'">'+ $(this).attr('spec_name') +'<img src="ADMIN_IMG/delete_ico.png" alt="" /></a>';
		}
	})
	$('.guige_list').html(guige_list_html);
	$("#setGoodsAttribute").modal('hide');
	load();
}

//修改关联品牌
function setBrand(){
	var brand_list_html = '';
	$('.brand_content>div.select').each(function(){
		brand_list_html += '<a href="javascript:;" value="'+ $(this).attr('brand_id') +'">'+ $(this).find('p').text() +'<img src="ADMIN_IMG/delete_ico.png" alt="" /></a>';
	})
	$('.brand_list').html(brand_list_html);
	$("#setGoodsBrand").modal('hide');
	load();
}

function load(){
	/* 删除自我选择， 规格、品牌 */
	$('.guige_list a, .brand_list a').click(function(){
		
		var value = $(this).attr('value');
		
		if($(this).parents().hasClass('guige_list')){
			$('#setGoodsAttribute input[value="'+value+'"]').prop("checked", false); 
		}else{
			$('#setGoodsBrand .brand_item[brand_id="'+value+'"]').removeClass("select");
		}
		$(this).remove();
	})

}

//隐藏修改属性弹框
function hide_modal(){
	$("#Attrbox").hide();
}

$("#setGoodsBrand label.all-select").click(function(){
	var checked = $(this).find("input").is(":checked");
	if(checked) $(".brand_content .brand_item").addClass("select");
	else $(".brand_content .brand_item").removeClass("select");
})
</script>

			<script type="text/javascript" src="__STATIC__/js/jquery.cookie.js"></script>
<script src="__STATIC__/js/page.js"></script>
<div class="page" id="turn-ul" style="display: none;">
	<div class="pagination">
		<ul>
			<li class="according-number">每页显示<input type="text" class="input-medium" id="showNumber" value="<?php echo $pagesize; ?>" data-default="<?php echo $pagesize; ?>" autocomplete="off"/>条</li>
			<li><a id="beginPage" class="page-disable" style="border: 1px solid #dddddd;">首页</a></li>
			<li><a id="prevPage" class="page-disable">上一页</a></li>
			<li id="pageNumber"></li>
			<li id="JslastPage">
				
			</li>
			<li><a id="nextPage">下一页</a></li>
			<li><a id="lastPage">末页</a></li>
			<li class="total-data">共0条</li>
			<!-- <li class="page-count">共0页</li> -->
			<li class="according-number">
				跳<input type="text" class="input-medium"  id="skipPage" data-curr-page="1"/>页
			</li>
		</ul>
	</div>
</div>
<input type="hidden" id="page_count" />
<input type="hidden" id="page_size" />
<script>
/**
 * 保存当前的页面
 * 创建时间：2017年8月30日 19:29:20
 */
function savePage(index){
	var json = { page_index : index, show_number : $("#showNumber").val(), url :  window.location.href };
	$.cookie('page_cookie',JSON.stringify(json),{ path: '/' });
 	//console.log(json);
}

$(function() {
	try{
		
		$("#turn-ul").show();//显示分页
		var history_url = "";
		var json = { page_index : 1, show_number : <?php echo $pagesize; ?>, url :  window.location.href };
		var history_json = "";//用于临时保存分页数据
		if($.cookie('page_cookie') != undefined && $.cookie('page_cookie') != "" && $.cookie('page_cookie') != '""'){
			
			var cookie = eval("(" + $.cookie('page_cookie') + ")");
			if(cookie !=undefined && cookie != ""){
				json.page_index = cookie.page_index;
				if(cookie.show_number != undefined && cookie.show_number != "") json.show_number = cookie.show_number;
				else json.show_number = <?php echo $pagesize; ?>;
				history_url = cookie.url;
				history_json = cookie;
			}
			
		}else{
			
			savePage(json.page_index);
			
		}
		if(history_url != undefined && history_url != "" && history_url != json.url && json.page_index != 1){
			
			//如果页面发生了跳转，还原操作
			json.page_index = 1;
			json.show_number = <?php echo $pagesize; ?>;
			json.url = history_url;
 			//console.log("如果页面发生了跳转，还原操作");
			$.cookie('page_cookie',JSON.stringify(json),{ path: '/' });
		}

 		//console.log($.cookie('page_cookie'));
		$("#showNumber").val(json.show_number);
		if(json.page_index != 1) jumpNumber = json.page_index;
		LoadingInfo(json.page_index);//通过此方法调用分页类
		
	}catch(e){
		
		$("#turn-ul").hide();
		//当前页面没有分页，进行还原操作
		$.cookie('page_cookie',JSON.stringify(history_json),{ path: '/' });
//		console.error(e);
 		//console.log("当前页面没有分页，进行还原操作");
 		//console.log($.cookie('page_cookie'));
	}
	
	//首页
	$("#beginPage").click(function() {
		if(jumpNumber!=1){
			jumpNumber = 1;
			LoadingInfo(1);
			savePage(1);
			changeClass("begin");
		}
		return false;
	});

	//上一页
	$("#prevPage").click(function() {
		var obj = $(".currentPage");
		var index = parseInt(obj.text()) - 1;
		if (index > 0) {
			obj.removeClass("currentPage");
			obj.prev().addClass("currentPage");
			jumpNumber = index;
			LoadingInfo(index);
			savePage(index);
			//判断是否是第一页
			if (index == 1) {
				changeClass("prev");
			} else {
				changeClass();
			}
		}
		return false;
	});

	//下一页
	$("#nextPage").click(function() {
		var obj = $(".currentPage");
		//当前页加一（下一页）
		var index = parseInt(obj.text()) + 1;
		if (index <= $("#page_count").val()) {
			jumpNumber = index;
			LoadingInfo(index);
			savePage(index);
			obj.removeClass("currentPage");
			obj.next().addClass("currentPage");
			//判断是否是最后一页
			if (index == $("#page_count").val()) {
				changeClass("next");
			} else {
				changeClass();
			}
		}
		return false;
	});

	//末页
	$("#lastPage").click(function() {
		jumpNumber = $("#page_count").val();
		if(jumpNumber>1){
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			$("#pageNumber a:eq("+ (parseInt($("#page_count").val()) - 1) + ")").text($("#page_count").val());
			changeClass("next");
		}
		return false;
	});

	//每页显示页数
	$("#showNumber").blur(function(){
		if(isNaN($(this).val())){
			$("#showNumber").val(20);
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if($(this).val().indexOf(".") != -1){
			var index = $(this).val().indexOf(".");
			$("#showNumber").val($(this).val().substr(0,index));
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if(parseInt($(this).val())<=0){
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		//页数没有变化的话，就不要再执行查询
		if(parseInt($(this).val()) != $(this).attr("data-default")){
// 			jumpNumber = 1;//设置每页显示的页数，并且设置到第一页
			$(this).attr("data-default",$(this).val());
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
		}
		return false;
	}).keyup(function(event){
		if(event.keyCode == 13){
			if(isNaN($(this).val())){
				$("#showNumber").val(20);
				jumpNumber = 1;
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
			//页数没有变化的话，就不要再执行查询
			if(parseInt($(this).val()) != $(this).attr("data-default")){
// 				jumpNumber = 1;//设置每页显示的页数，并且设置到第一页
				$(this).attr("data-default",$(this).val());
				//总数据数量
				var total_count = parseInt($(".total-data").attr("data-total-count"));
				//计算用户输入的页数是否超过当前页数
				var curr_count = Math.ceil(total_count/parseInt($(this).val()));
				if( curr_count !=0 && curr_count < jumpNumber){
					jumpNumber = curr_count;//输入的页数超过了，没有那么多
				}
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
		}
		return false;
	});

	// 跳转到某页
	$("#skipPage").blur(function(){
		if(isNaN($(this).val()) || $(this).val().length == 0){
			$("#showNumber").val(20);
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if(parseInt($(this).val())<=0){
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if(parseInt($(this).val()) > $("#page_count").val()){
			jumpNumber = $("#page_count").val();
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			$(this).val(jumpNumber);
			return;
		}
		if(parseInt($(this).val()) == parseInt($(this).attr("data-curr-page"))){
			return;
		}
		jumpNumber = $(this).val();
		LoadingInfo(jumpNumber);
		savePage(jumpNumber);		
	}).keyup(function(event){
		if(event.keyCode == 13){
			if(isNaN($(this).val())){
				$("#showNumber").val(20);
				jumpNumber = 1;
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
			if(parseInt($(this).val())<=0){
				jumpNumber = 1;
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
				return;
			}
			if(parseInt($(this).val()) > $("#page_count").val()){
				jumpNumber = $("#page_count").val();
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
				$(this).val(jumpNumber);
				return;
			}
			if(parseInt($(this).val()) == parseInt($(this).attr("data-curr-page"))){
				return;
			}
			jumpNumber = $(this).val();
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
		}
		return false;
	});
});

//跳转页面
function JumpForPage(obj) {
	jumpNumber = $(obj).text();
	LoadingInfo($(obj).text());
	savePage($(obj).text());
	$(".currentPage").removeClass("currentPage");
	$(obj).addClass("currentPage");
	if (jumpNumber == 1) {
		changeClass("prev");
	} else if (jumpNumber < parseInt($("#page_count").val())) {
		changeClass();
	} else if (jumpNumber == parseInt($("#page_count").val())) {
		changeClass("next");
	}
}
</script>
		</div>
		
	</section>
	
</article>

<!-- 公共的操作提示弹出框 common-success：成功，common-warning：警告，common-error：错误，-->
<div class="common-tip-message js-common-tip">
	<div class="tip-container">
		<span class="inner"></span>
	</div>
</div>

<!--修改密码弹出框 -->
<div id="edit-password" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="width:562px;top:50%;margin-top:-180.5px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>修改密码</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="pwd0" style="width: 160px;"><span class="color-red">*</span>原密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd0" placeholder="请输入原密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="pwd1" style="width: 160px;"><span class="color-red">*</span>新密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd1" placeholder="请输入新密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="pwd2" style="width: 160px;"><span class="color-red">*</span>再次输入密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd2" placeholder="请输入确认密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div style="text-align: center; height: 20px;" id="show"></div>
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn-common btn-big" onclick="submitPassword()" style="display:inline-block;">保存</button>
		<button class="btn-common-cancle btn-big" data-dismiss="modal" aria-hidden="true">关闭</button>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="ADMIN_CSS/jquery-ui-private.css">
<script>
var platform_shopname= '<?php echo $web_popup_title; ?>';
</script>
<script type="text/javascript" src="ADMIN_JS/jquery-ui-private.js" charset="utf-8"></script>
<script type="text/javascript" src="ADMIN_JS/jquery.timers.js"></script>
<div id="dialog"></div>
<script type="text/javascript">
function showMessage(type, message,url,time){
	if(url == undefined){
		url = '';
	}
	if(time == undefined){
		time = 2;
	}
	//成功之后的跳转
	if(type == 'success'){
		$( "#dialog").dialog({
			buttons: {
				"确定,#0059d6,#fff": function() {
					$(this).dialog('close');
				}
			},
			contentText:message,
			time:time,
			timeHref: url,
			msgType : type
		});
	}
	//失败之后的跳转
	if(type == 'error'){
		$( "#dialog").dialog({
			buttons: {
				"确定,#0059d6,#fff": function() {
					$(this).dialog('close');
				}
			},
			time:time,
			contentText:message,
			timeHref: url,
			msgType : type
		});
	}
}

function showConfirm(content){
	$( "#dialog").dialog({
		buttons: {
			"确定": function() {
				$(this).dialog('close');
				return 1;
			},
			"取消,#f5f5f5,#666": function() {
				$(this).dialog('close');
				return 0;
			}
		},
		contentText:content,
	});
}
</script>
<script src="ADMIN_JS/ns_common_base.js"></script>
<script src="__STATIC__/blue/js/ns_common_blue.js"></script>
<script>
	window.onload = function(){

	}
$(function(){
	
	$(".ns-third-menu ul .btn-more").toggle(
		function(){
			$(".ns-third-menu ul").animate({height:"84px"},300);
		},
		function(){
			$(".ns-third-menu ul").animate({height:"42px"},300);
		}
	);
	
	//公共下拉框
	$('.select-common').selectric();
	
	//公共复选框点击切换样式
	$(".checkbox-common").live("click",function(){
		var checkbox = $(this).children("input");
		if(checkbox.is(":checked")) $(this).addClass("selected");
		else $(this).removeClass("selected");
	});
	
	//鼠标浮上查看预览上传的图片
	$(".upload-btn-common>img,#preview_adv").live("mouseover",function(){
		var curr = $(this);
		var src = curr.attr("data-src");
		if(src){
			//alert(src);
			var contents = '<img src="'+src+'" style="width: 100px;height: auto;display:block;margin:0 auto;">';
			//鼠标每次浮上图片时，要销毁之前的事件绑定
			curr.popover("destroy");
			
			//重新配置弹出框内容
			curr.popover({ content : contents });

			//显示
			curr.popover("show");
		}
	});
	
	//鼠标离开隐藏预览上传的图片
	$(".upload-btn-common>img,#preview_adv").live("mouseout",function(){
		var curr = $(this);
		//隐藏
		if($(".popover.top").is(":visible") && curr.attr("data-src")) curr.popover("hide");
	});

	//公共单选框点击切换样式
	$(".radio-common").live("click",function(){
		var radio = $(this).children("input");
		var name = radio.attr("name");
		if(radio.is(":checked")){
			$(".radio-common>input[type='radio'][name='" + name + "']").parent().removeClass("selected");
			$(this).addClass("selected");
		}else{
			$(this).removeClass("selected");
		}
	});

	//顶部导航管理显示隐藏
	$(".ns-navigation-title>span").click(function(){
		$(".ns-navigation-management").slideUp(400);
	});
	
	$(".js-nav").toggle(function(){
		$(".ns-navigation-management").slideDown(400);
	},function(){
		$(".ns-navigation-management").slideUp(400);
	});
	
	//搜索展开
	$(".ns-search-block").hover(function(){
		if($(this).children(".mask-layer-search").is(":hidden")) $(this).children(".mask-layer-search").fadeIn(300);
	},function(){
		if($(this).children(".mask-layer-search").is(":visible")) $(this).children(".mask-layer-search").fadeOut(300);
	});
	
	$(".ns-base-tool .ns-help").hover(function(){
		if($(this).children("ul").is(":hidden")) $(this).children("ul").fadeIn(250);
	},function(){
		if($(this).children("ul").is(":visible")) $(this).children("ul").fadeOut(250);
	});
	
});

function addFavorite() {
	var url = window.location;
	var title = document.title;
	var ua = navigator.userAgent.toLowerCase();
	if (ua.indexOf("360se") > -1) {
		alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
	}else if (ua.indexOf("msie 8") > -1) {
		window.external.AddToFavoritesBar(url, title); //IE8
	}
	else if (document.all) {
		try{
			window.external.addFavorite(url, title);
		}catch(e){
			alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
		}
	}else if (window.sidebar) {
		window.sidebar.addPanel(title, url, "");
	}else {
		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	}
}

</script>

</body>
</html>