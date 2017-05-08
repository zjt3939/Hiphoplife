<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hiphoplife</title>
	<script src="/hiphoplife/tpl/simplebootx/Public/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/use.css">
    <link rel="stylesheet" type="text/css" href="/hiphoplife/tpl/simplebootx/Public/css/nav.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/animate.min.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/footer.css">
    <link rel="stylesheet" href="/hiphoplife/tpl/simplebootx/Public/css/scrawl.css">
</head>
<body>
  <nav class="websiteNav">
        <div class="clearboth range navsubbox">
            <div class="navbox">
                <div class="logobox">
                    <img src="/hiphoplife/tpl/simplebootx/Public/images/logo1.png" alt="">
                </div>
                <ul class="navul">
                   <!--  <li>首页</li>
                    <li>街舞</li>
                    <li>涂鸦</li>
                    <li>MC</li>
                    <li>Beatbox</li> -->
                    <?php if(is_array($navData)): foreach($navData as $key=>$vo): ?><li><a href="<?php echo U($vo['href']);?>"><?php echo ($vo['label']); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="loginAndRebox">
                <form>
                     <input type="text" name="keywords" value="" class="keywords" placeholder='按enter搜索'>
                </form>
                <?php $userData = sp_get_current_user(); $imgurl = sp_get_user_avatar_url($userData['avatar']); ?>
                <?php if(empty($userData) == true): ?><div class="loginbox loginsubbox">
                             <img src="/hiphoplife/tpl/simplebootx/Public/images/login.png" height="32px" width="32px" style="  vertical-align:bottom;"  alt="">
                        <span>未登录</span>
                        <ul class="navlbox">
                            <li><a href="<?php echo u('user/login/index',array('type'=>1));?>">登录</a></li>
                            <li><a href="<?php echo u('user/Register/index',array('type'=>2));?>">注册</a></li>
                        </ul>
                    </div><?php endif; ?>
                <?php if(empty($userData) != true): ?><div class="registerbox loginsubbox loginbox">
                        <?php if( empty($imgurl) == true): ?><img src="/hiphoplife/tpl/simplebootx/Public/images/headicon.png" height="32px" width="32px" style="  vertical-align:bottom;"  alt=""><?php endif; ?>
                        <?php if( empty($imgurl) != true): ?><img src="<?php echo ($imgurl); ?>" height="32px" width="32px" style="  vertical-align:bottom;"  alt=""><?php endif; ?>
                        <?php $name = !empty($userData['user_nicename'])?$userData['user_nicename']:$userData['user_login']; ?>
                        <span><?php echo ($name); ?></span>
                        <ul class="navlbox">
                            <li><a href="<?php echo u('user/center/index');?>">个人中心</a></li>
                            <li><a href="<?php echo u('user/index/logout');?>">退出</a></li>
                        </ul>
                    </div><?php endif; ?>
            </div>
        </div>
    </nav>
    <script>
         $(window).on('scroll',function(){
             var WindowScrollTop = $(window).scrollTop();

            /*导航条的缩放*/
            if (WindowScrollTop > 50) {
                $('.websiteNav').css({ "height": "60px", "position": "fixed", "background-color": "rgba(0,0, 0,0.8)","z-index":"99999" });
                $('.navul').css("line-height", "52px");
                $('.loginsubbox').css({"top":"23px"});
                $('.keywords').css({"top":"28px"});
              
            } else {
                $('.websiteNav').css({ "height": "90px", "position": "ababsolute", "background-color": "rgba(0, 0, 0, 0.6)"});
                $('.navul').css("line-height", "80px");
                $('.loginsubbox,.keywords').css({"top":"50px"});
                $('.keywords').css({"top":"55px"});
            }
                    
                
           
        });
        /*登录注册滑动事件*/
         $('.loginsubbox').mouseover(function(){
                    $('.navlbox').slideDown();
                }).mouseleave(function(){
                    $('.navlbox').slideUp();
                });
            
              $('.navul li').on('mouseover', function () {
            $(this).addClass('animated tada');
        }).on('mouseout', function () {
            $(this).removeClass('animated tada');
        });
    </script>

<div class="OutsideBox">
	<div class="range clearboth scrawlRange" >
		<div class="fillempty"></div>
			

		<!-- 涂鸦首页 -->
		<?php if($scrawlType == 1): ?><div class="NewPostScrawlBox">
				<div class="boxTitle NewPostTitle"><span>文章报道</span><a href="<?php echo U('ScrawlPost');?>" class="mostPostA">更多</a></div>
				<ul class="ScrawlBoxUl clearboth">
					<?php if(is_array($NewScrawPostlData)): foreach($NewScrawPostlData as $key=>$no): ?><li>
							<a href="" class="ScrawlA">
								<div  class="scrawlImgbox">
									<img src="<?php echo ($no['smeta']); ?>">
								</div>
								
								
								<p class="scrawl tenpxtop" style="border-bottom: 1px solid #ccc;padding-bottom: 10px;"><?php echo ($no['post_title']); ?></p>
								<div class="showDetail ">
									<span class="doLike"><?php echo ($no['post_like']); ?></span>
									<span class="commentSum"><?php echo ($no['comment_count']); ?></span>
									<span class="hitSum"><?php echo ($no['post_hits']); ?></span>
			
								</div>
							</a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
				<div class="scrawlAd">
				<img src="/hiphoplife/tpl/simplebootx/Public/images/bk.jpg" alt="">
			</div>
			<div class="hitsScrawlBox">
				<div class="boxTitle hotTitle"><span>热门作品</span></div>
				<ul class="ScrawlBoxUl clearboth">
					<?php if(is_array($HitScrawlData)): foreach($HitScrawlData as $key=>$ho): ?><li>
							<a href="" class="ScrawlA">
								<div  class="scrawlImgbox">
									<img src="<?php echo ($ho['smeta']); ?>" alt="">
								</div>
								<p class="scrawl"><?php echo ($ho['name']); ?></p>
								<div class="showDetail">
									<span class="doLike"><?php echo ($ho['image_like']); ?></span>
									<span class="hitSum"><?php echo ($ho['hit']); ?></span>
			
								</div>
								<div class="scrawlAuthor">
									作者:<?php echo ($ho['author']); ?>
								</div>
							</a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="scrawlAd">
				<img src="/hiphoplife/tpl/simplebootx/Public/images/bk.jpg" alt="">
			</div>
			<div class="goodsScrawlBox ">
				<div class="boxTitle GoodTitle"><span>精选作品</span></div>
				<ul class="ScrawlBoxUl clearboth">
					<?php if(is_array($GoodScrawlData)): foreach($GoodScrawlData as $key=>$ho): ?><li>
							<a href="" class="ScrawlA">
								<div  class="scrawlImgbox">
									<img src="<?php echo ($ho['smeta']); ?>" alt="">
								</div>
								<p class="scrawl"><?php echo ($ho['name']); ?></p>
								<div class="showDetail">
									<span class="doLike"><?php echo ($ho['image_like']); ?></span>
									<span class="hitSum"><?php echo ($ho['hit']); ?></span>
			
								</div>
								<div class="scrawlAuthor">
									作者:<?php echo ($ho['author']); ?>
								</div>
							</a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="scrawlAd">
				<img src="/hiphoplife/tpl/simplebootx/Public/images/bk.jpg" alt="">
			</div>
			<div class="newScrawlBox ">
				<div class="boxTitle NewTitle"><span>最新作品</span></div>
				<div class="newScrawlInnerBox">
					<ul class="ScrawlBoxUl clearboth">
						<?php if(is_array($NewScrawlData)): foreach($NewScrawlData as $key=>$ho): ?><li>
								<a href="" class="ScrawlA">
									<div  class="scrawlImgbox">
										<img src="<?php echo ($ho['smeta']); ?>" alt="">
									</div>
									<p class="scrawl"><?php echo ($ho['name']); ?></p>
									<div class="showDetail">
										<span class="doLike"><?php echo ($ho['image_like']); ?></span>
										<span class="hitSum"><?php echo ($ho['hit']); ?></span>
				
									</div>
									<div class="scrawlAuthor">
										作者:<?php echo ($ho['author']); ?>
									</div>
								</a>
							</li><?php endforeach; endif; ?>
					</ul>

				</div>
				<div class="newScrawlbtnbox">
					<img src="/hiphoplife/tpl/simplebootx/Public/images/load.gif" class="loading" alt="">
					<input type="button" value="继续添加" class="keepAddBtn">
				</div>
			</div><?php endif; ?>
		<!-- 涂鸦首页结束 -->

		<?php if($scrawlType == 2): ?><div class="NewPostScrawlBox ">
				<div class="boxTitle NewPostTitle"><span>涂鸦文章</span></div>
				<div class="newScrawlInnerBox">
					<ul class="ScrawlBoxUl clearboth">
						<?php if(is_array($NewScrawPostlData)): foreach($NewScrawPostlData as $key=>$no): ?><li>
								<a href="" class="ScrawlA">
									<div  class="scrawlImgbox">
										<img src="<?php echo ($no['smeta']); ?>">
									</div>
									
								
									<p class="scrawl tenpxtop" style="border-bottom: 1px solid #ccc;padding-bottom: 10px;"><?php echo ($no['post_title']); ?></p>
										<div class="showDetail">
										<span class="doLike"><?php echo ($no['post_like']); ?></span>
										<span class="commentSum"><?php echo ($no['comment_count']); ?></span>
										<span class="hitSum"><?php echo ($no['post_hits']); ?></span>
				
									</div>
								</a>
							</li><?php endforeach; endif; ?>
					</ul>

				</div>
				<div class="newScrawlbtnbox">
					<img src="/hiphoplife/tpl/simplebootx/Public/images/load.gif" class="loading" alt="">
					<input type="button" value="继续添加" class="keepAddBtn">
				</div>
			</div><?php endif; ?>
		
	</div>
</div>
<?php if(!empty($scrawlType) == true): endif; ?>
	<script>
	var keepAddTime = true;
	var AddIndex =2;
	$(function(){
		// $(".scrawlRange").show();
		//页面初始化动画
		$(".ScrawlBoxUl li").show().addClass("animated bounceIn");

		//鼠标事件动画
		$(".ScrawlA").mouseover(function(){
			$(this).find('img').addClass("animated pulse");
		}).mouseleave(function(){
	         $(this).find('img').removeClass('animated pulse');
	    });


	    // 动态添加数据
	    $(".keepAddBtn").click(function(){
	    	$(".keepAddBtn").hide();
	    	$(".loading").show();
	    	//如果keepAddTime为true,则可以获取数据，不然就提示
	    	if(keepAddTime){
	    		//-------点击执行事件
	    		// console.log(11);
	    		<?php if($scrawlType == 1): ?>$.ajax({
		    			url:"<?php echo U('keepAdd');?>&scrawlType=1&p="+AddIndex,
		    			type:"get",
		    			success:function(data){
		    				// console.log(data.data.length);

		    				if(data.status==1){
		    					AddIndex++;
		    					$(".loading").hide();
		    					//整理获取到的数据，将数据分离出来使用
		    					var uldata = '<ul class="ScrawlBoxUl ScrawlBoxUl'+AddIndex+' clearboth"></ul>';
		    					var lidata ='';
		    					var ulobj=$(".newScrawlInnerBox").append(uldata).find('.ScrawlBoxUl'+AddIndex);
		    					for(var i = 0;i<data.data.length;i++){
		    						ulobj.append('<li><a href="" class="ScrawlA"><div  class="scrawlImgbox"><img src="'+data.data[i].smeta+'" alt=""></div><p class="scrawl">'+data.data[i].name+'</p><div class="showDetail"><span class="doLike">'+data.data[i].image_like+'</span><span class="hitSum">'+data.data[i].hit+'</span></div><div class="scrawlAuthor">作者:'+data.data[i].author+'</div></a></li>');
		    					}
		    					$(".ScrawlBoxUl"+AddIndex+" li").show().addClass("animated bounceIn");
		    					$(".ScrawlA").mouseover(function(){
								$(this).find('img').addClass("animated pulse");
								}).mouseleave(function(){
							         $(this).find('img').removeClass('animated pulse');
							    });
		    					if(data.data.length<10){
		    						$(".newScrawlbtnbox").html("已经到最后了");
		    					}else{
		    						$(".keepAddBtn").show();
		    					}
		    				}else if(data.status==0){
		    					$(".loading").hide();
		    					$(".newScrawlbtnbox").html(data.data);
		    				}else{
		    					$(".loading").hide();
		    					$(".newScrawlbtnbox").html("数据加载错误");
		    				}
		    			}
		    		});<?php endif; ?>
	    		<?php if($scrawlType == 2): ?>$.ajax({
		    			url:"<?php echo U('keepAdd');?>&scrawlType=2&p="+AddIndex,
		    			type:"get",
		    			success:function(data){
		    				// console.log(data.data.length);

		    				if(data.status==1){
		    					AddIndex++;
		    					$(".loading").hide();
		    					//整理获取到的数据，将数据分离出来使用
		    					var uldata = '<ul class="ScrawlBoxUl ScrawlBoxUl'+AddIndex+' clearboth"></ul>';
		    					var lidata ='';
		    					var ulobj=$(".newScrawlInnerBox").append(uldata).find('.ScrawlBoxUl'+AddIndex);
		    					for(var i = 0;i<data.data.length;i++){
		    						ulobj.append('<li><a href="" class="ScrawlA"><div  class="scrawlImgbox"><img src="'+data.data[i].smeta+'" alt=""></div><div class="showDetail"><span class="doLike">'+data.data[i].post_like+'</span><span class="hitSum">'+data.data[i].post_hits+'</span></div><p class="scrawl">'+data.data[i].post_title+'</p></a></li>');
		    					}
		    					$(".ScrawlBoxUl"+AddIndex+" li").show().addClass("animated bounceIn");
		    					$(".ScrawlA").mouseover(function(){
								$(this).find('img').addClass("animated pulse");
								}).mouseleave(function(){
							         $(this).find('img').removeClass('animated pulse');
							    });
		    					if(data.data.length<10){
		    						$(".newScrawlbtnbox").html("已经到最后了");
		    					}else{
		    						$(".keepAddBtn").show();
		    					}
		    				}else if(data.status==0){
		    					$(".loading").hide();
		    					$(".newScrawlbtnbox").html(data.data);
		    				}else{
		    					$(".loading").hide();
		    					$(".newScrawlbtnbox").html("数据加载错误");
		    				}
		    			}
		    		});<?php endif; ?>
	    		//
	    		
	    		keepAddTime = false;
	    		//限制每5秒钟只能点击一次
	    		setTimeout("keepAddTime=true",2000);

	    	}else{
	    		$(".loading").hide();
	    		$(".keepAddBtn").show();

	    		//如果点击频率过快则给予提示
	    		// alert("频率过快");
	    	}
	    });
	});

	</script>


 <footer>
		<div class="parting_line"></div>
		<div class="footer_box">
			<div class="range">
				<ul class="footer_contant clearboth">
					<li>
						<div class="erwei"><img src="/hiphoplife/tpl/simplebootx//Public/images/erwei.jpg" width="100" height="100" alt="">
						</div>
						<ul>
							<li>本站微信</li>
							<li>微信二维码扫描</li>
						</ul>
					</li>
					<li>
						<ul>
							<li>友情链接</li>
							<li><a href="">街舞酱</a></li>
							<li><a href="">街舞爱好者</a></li>
							<li><a href="">今日头条</a></li>
						</ul>
						<ul>
							<li>关于我们</li>
							<li><a href="">了解我们</a></li>
							<li><a href="">联系我们</a></li>
						</ul>
					</li>
					<li>
						<ul>
							<li>联系方式</li>
							<li class="phone_number">18814182530</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</footer>
</body>
</html>