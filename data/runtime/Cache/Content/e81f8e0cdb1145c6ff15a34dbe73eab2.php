<?php if (!defined('THINK_PATH')) exit();?><style>
.comment-postbox-wraper textarea{
	max-width: 99%;
	min-width: 99%;
	min-height: 90px;
    max-height: 100px;
    border: 1px solid #ddd;
    padding: 5px;
    resize: none;
}
.J_ajax_submit_btn{
	padding: 0px 20px;
	height: 30px;
	line-height: 30px;
	background-color: #111;
	color: #eaeaea;
	border: none;
	border-radius: 3px;

}
.comment-form{
	padding-bottom: 10px;
}
.comments {
	background-color: #f0f0f0;
}
.comment{
	/*border-top: 1px solid #ddd;*/
	border-bottom: 1px solid #ddd;
	margin-top: 5px;
}
.comment-content{
	padding:5px;
	background-color: #fff;
    border-radius: 3px;
}
.comment-content span{
	font-size: 0.8em;
}
.comment a{
	display: inline-block;
}
.comment img{
	width: 40px;
	height: 40px;
	vertical-align: bottom;
}
/*.comment-body{
	display: inline-block;
}*/
span.time{
	font-size: 0.8em;
	color: #555;
}

.CommentReturnInfoBox{
	position: relative;
}
.CommentContent{
	position: fixed;
    line-height: 35px;
    text-align: center;
    /*width: 250px;*/
    padding: 0px 70px;
    height: 35px;
    font-size: 1.1em;
    top: 40%;
    left: 45%;
    background: rgba(0,0,0,0.6);
    color: #fff;
    display: none;
    border-radius: 4px;
}
</style>


<br>
<h3>评论</h3>
<div class="comment-area" id="comments">

	
	<form class="form-horizontal comment-form" action="javascript:void(0);" method="post" id="CommentForm">
	  <div class="control-group">
		  <div class="comment-postbox-wraper">
		  	<textarea id="CommentTextarea" class="form-control comment-postbox" placeholder="你可以发表评论了" style="min-height:90px;"  name="content"></textarea>
		  </div>
	  </div>
	  
	  <div class="control-group">
	   		<button type="submit" class="btn pull-right btn-primary J_ajax_submit_btn"><i class="fa fa-comment-o"></i> 发表评论</button>
	  </div>
	  
	  <input type="hidden" name="post_table" value="<?php echo ($post_table); ?>"/>
	  <input type="hidden" name="post_id" value="<?php echo ($post_id); ?>"/>
	  <input type="hidden" name="to_uid" value="0"/>
	  <input type="hidden" name="parentid" value="0"/>
	</form>
	
	<!-- <script class="comment-tpl" type="text/html">
		<div class="comment" data-username="<?php echo ($user["user_nicename"]); ?>" data-uid="<?php echo ($user["id"]); ?>">
		 
		  <div class="comment-body">
		    <div class="comment-content"> <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$user['id']));?>">
		    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$user['id']));?>" class="headicon"/>
		  </a><a href="<?php echo U('user/index/index',array('id'=>$user['id']));?>"><?php echo ($user["user_nicename"]); ?></a>:<span class="content"></span></div>
		    <div><span class="time">刚刚</span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
		  </div>
		  <div class="clearfix"></div>
		</div>
	</script>
	
	<script class="comment-reply-box-tpl" type="text/html">
		<div class="comment-reply-submit">
                    <div class="comment-reply-box">
                        <input type="text" class="textbox" placeholder="回复">
                    </div>
                    <button class="btn pull-right" onclick="comment_submit(this);">回复</button>
                </div>
	</script> -->
	
	
	
	<div class="comments">
	<?php if(is_array($comments)): foreach($comments as $key=>$vo): ?><div class="comment" data-id="<?php echo ($vo["id"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-username="<?php echo ($vo["full_name"]); ?>"  id="comment<?php echo ($vo["id"]); ?>">
		 
		  <div class="comment-body">
		    <div class="comment-content"> <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>">
		    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$vo['uid']));?>" class="headicon"/>
		  </a><a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?></a>:<span><?php echo ($vo["content"]); ?></span></div>
		    <div><span class="time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
		    
		    <?php if(!empty($vo['children'])): if(is_array($vo["children"])): foreach($vo["children"] as $key=>$voo): ?><div class="comment" data-id="<?php echo ($voo["id"]); ?>" data-uid="<?php echo ($voo["uid"]); ?>" data-username="<?php echo ($voo["full_name"]); ?>" id="comment<?php echo ($voo["id"]); ?>">
					  
					  <div class="comment-body">
					    <div class="comment-content"><a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$voo['uid']));?>">
					    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$voo['uid']));?>" class="headicon"/>
					  </a><a href="<?php echo U('user/index/index',array('id'=>$voo['uid']));?>"><?php echo ($voo["full_name"]); ?></a>:<span>回复 <a href="<?php echo U('user/index/index',array('id'=>$voo['to_uid']));?>"><?php echo ($parent_comments[$voo['parentid']]['full_name']); ?></a> <?php echo ($voo["content"]); ?></span></div>
					    <div><span class="time"><?php echo date('m月d日  H:i',strtotime($voo['createtime']));?></span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
					  </div>
					  <div class="clearfix"></div>
					</div><?php endforeach; endif; endif; ?>

		  </div>
		  <div class="clearfix"></div>
		</div><?php endforeach; endif; ?>
	</div>
	
</div>
<div class="CommentReturnInfoBox">
	<div class="CommentContent">
	</div>
</div>

 <script src="/hiphoplife/tpl/simplebootx/Public/js/jquery.form.js"></script>
 <script>
 	$(function(){
 		var options={
 			url:"<?php echo u('comment/comment/post');?>",
 			type:"post",
 			success:function(data){
 				$("#CommentTextarea").val('');
 				// console.log(data);
 				if(data.status==1){
 					$(".CommentContent").html(data.content).show().addClass("animated bounce");
 					setTimeout(function(){
 						$(".CommentContent").hide();
 					},1000);

 					var NewOneData = data.data;
 					var ThisUserData = data.userData;
 					//如果开启了审核功能则不需动态添加，没有开启则可以动态添加数据
 					if(NewOneData.status==1){
 						// return false;
 						var NewAddComment ='<div class="comment newComment"  data-id="'+NewOneData.id+'" data-uid="'+NewOneData.uid+'"  id="'+NewOneData.id+'"><div class="comment-body"><div class="comment-content"> <a class="pull-left" href="'+ThisUserData.url+'"><img class="media-object avatar" src="'+ThisUserData
 						.avatar+'" class="headicon"/></a><a href="'+ThisUserData.url+'"><?php echo ($vo["full_name"]); ?></a>:<span>'+NewOneData.content+'</span></div><div><span class="time">'+NewOneData.createtime+'</span> <a href="javascript:;"><i class="fa fa-comment"></i></a></div></div><div class="clearfix"></div></div>';
 						// console.log(NewAddComment);
 						$(".comments").prepend(NewAddComment);
 						$(".newComment").addClass("animated bounce");

 					}else{
 						return false;
 					}

 				}else if(data.status==0){
 					$(".CommentContent").html(data.info).show().addClass("animated bounce");
 					setTimeout(function(){
 						$(".CommentContent").hide();
 					},1000);
 				}else{
 					$(".CommentContent").html(data.content).show().addClass("animated bounce");
 					setTimeout(function(){
 						$(".CommentContent").hide();
 					},1000);
 				}
 			}

 		};

 		$('#CommentForm').submit(function(){
 			 $(this).ajaxSubmit(options); 
 		});
 	});
 </script>