<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/hiphoplife/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/hiphoplife/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/hiphoplife/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/hiphoplife/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/hiphoplife/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/hiphoplife/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/hiphoplife/statics/js/jquery.js"></script>
    <script src="/hiphoplife/statics/js/wind.js"></script>
    <script src="/hiphoplife/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<script type="text/javascript">
    var catid = "12";
</script>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
select {
    background-color: #fff;
    border:2px solid #dce4ec;
}
input[type='text']{
	width: 400px;
}

</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li><a href="<?php echo U('AdminMusicManage/index');?>">所有音乐</a></li>
     <li><a href="<?php echo U('AdminMusicManage/add');?>">添加音乐</a></li>
     <li class="active"><a href="javascript:void(0)">编辑音乐</a></li>
  </ul>
  <form name="myform" id="myform"  action="<?php echo U('AdminMusicManage/edit_post');?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">
  <div class="col-auto">
    <div class="table_full">
      <table width="100%" cellpadding="2" cellspacing="2">
      		<tr>
      			<th>音乐类型</th>
      			<td width="150px">
      				<select name="category_id">
      					<option value="">请选择音乐类型</option>
							<?php if(is_array($MusicCategory)): foreach($MusicCategory as $key=>$vo): $cSelected =$vo['category_id']==$editMusicData['category_id']?"selected":''; ?>
								<option value="<?php echo ($vo['category_id']); ?>" <?php echo ($cSelected); ?>><?php echo ($vo['category_name']); ?></option><?php endforeach; endif; ?>
      				</select>*不能为空
      			</td>
      		</tr>
      		<tr>
      			<th>音乐专辑</th>
      			<td width="150px">
      				<select name="gather_id">
      					<option value="0">请选择音乐专辑</option>
						<?php if(is_array($musicGather)): foreach($musicGather as $key=>$go): $gSelected =$go['gather_id']==$editMusicData['gather_id']?"selected":''; ?>
							<option value="<?php echo ($go['gather_id']); ?>" <?php echo ($gSelected); ?>><?php echo ($go['gather_name']); ?></option><?php endforeach; endif; ?>
      				</select>*不能为空
      			</td>
      		</tr>
            <tr>
              <th width="80">音乐名称</th>
              <td>
              	<input type="text"  name="name" id="name" value="<?php echo ($editMusicData['name']); ?>" style="color:" class="input input_hd J_title_color" placeholder="请输入音乐名称" onkeyup="strlen_verify(this, 'title_len', 160)" />
              	<span class="must_red">*</span>
              </td>
            </tr>
            <tr>
              <th width="80">关键词</th>
              <td><input type='text' name='keywords' id='keywords' value='<?php echo ($editMusicData['keywords']); ?>'    class='input' placeholder='请输入关键字'> 多关键词之间用空格隔开</td>
            </tr>
            <tr>
            	<th>url</th>
            	<td><input type="text" name="url" id="url" placeholder='请输入url' value="<?php echo ($editMusicData['url']); ?>">*不能为空</td>
            </tr>
            <tr>
            	<th>来源</th>
            	<td><input type="text" name="source" id="source" placeholder='请输入来源' value="<?php echo ($editMusicData['source']); ?>" ></td>
            </tr>
            <tr>
              <th width="80">详细介绍</th>
              <td><textarea name='detail' id='detail' value="<?php echo ($editMusicData['detail']); ?>" style='width:50%;height:200px;'  ><?php echo ($editMusicData['detail']); ?></textarea> </td>
            </tr>
	        <tr>
	        	<th width="80">缩略图</th>
	          <td>
	          	<div  style="float: left;"><input type='hidden' name='smeta[thumb]' id='thumb' value=''>
						<a href='javascript:void(0);' onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
						<img src='/hiphoplife/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
						<!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片">  -->
			            <input type="button"  class="btn" onclick="$('#thumb_preview').attr('src','/hiphoplife/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
	            </div>
				</td>
	        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="form-actions">
  		<input type="hidden" name="Id" value="<?php echo ($editMusicData['id']); ?>">
        <button class="btn btn-primary btn_submit J_ajax_submit_btn" type="submit">提交</button>
        <a class="btn" href="<?php echo U('AdminMusicManage/index');?>">返回</a>
  </div>
 </form>
</div>
<script type="text/javascript" src="/hiphoplife/statics/js/common.js"></script>
<script type="text/javascript" src="/hiphoplife/statics/js/content_addtop.js"></script>
<script type="text/javascript"> 
$(function () {
	 Wind.use('validate', 'ajaxForm', 'artDialog', function () {
			//javascript
	            var form = $('form.J_ajaxForms');
	        //ie处理placeholder提交问题
	        if ($.browser.msie) {
	            form.find('[placeholder]').each(function () {
	                var input = $(this);
	                if (input.val() == input.attr('placeholder')) {
	                    input.val('');
	                }
	            });
	        }
	        //表单验证开始
	        form.validate({
				//是否在获取焦点时验证
				onfocusout:false,
				//是否在敲击键盘时验证
				onkeyup:false,
				//当鼠标掉级时验证
				onclick: false,
	            //验证错误
	            showErrors:function(errorMap,errorArr){
	            	// console.log(errorMap);
	            	// console.log(errorArr);
	            	$errorinfo = '出现以下错误：';
	            	for(var i =0;i<errorArr.length;i++){
	            		$errorinfo=$errorinfo+' '+(i+1)+':'+errorArr[i].message+';';
	            	}
	            	if(errorArr.length>0){
	            		isalert($errorinfo);
	            	}else{
	            		return false;
	            	}
	            },
	            //验证规则
	            rules: {'name':{required:1},'category_id':{required:1},'gather_id':{required:1},'url':{required:1},'url':{required:1},'keywords':{required:1}},
	            //验证未通过提示消息
	            messages: {'name':{required:'音乐名称不能为空'},'category_id':{required:'音乐类型不能为空'},'gather_id':{required:'音乐专辑不能为空'},'url':{required:'音乐url不能为空'},'keywords':{required:'关键字不能为空'}},
	            //给未通过验证的元素加效果,闪烁等
	            highlight: false,
	            //是否在获取焦点时验证
	            onfocusout: false,
	            //验证通过，提交表单
	            submitHandler: function (forms) {
	                $(forms).ajaxSubmit({
	                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
	                    dataType: 'json',
	                    beforeSubmit: function (arr, $form, options) {
	                        
	                    },
	                    success: function (data, statusText, xhr, $form) {
	                    	console.log(data);
	                        if(data.status==1){
								setCookie("refersh_time",1);
								//添加成功
								Wind.use("artDialog", function () {
								    art.dialog({
								        id: "succeed",
								        icon: "succeed",
								        fixed: true,
								        lock: true,
								        background: "#CCCCCC",
								        opacity: 0,
								        content: data.info,
										button:[
											{
												name: '继续编辑？',
												callback:function(){
													reloadPage(window);
													return true;
												},
												focus: true
											},{
												name: '返回列表',
												callback:function(){
													location.href="<?php echo U('AdminMusicManage/index');?>";
													return true;
												}
											}
										]
								    });
								});
							}else{
								isalert(data.info);
							}
	                    }
	                });
	            }
	        });
	    });
	////-------------------------
});
</script>
</body>
</html>