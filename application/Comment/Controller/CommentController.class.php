<?php
namespace Comment\Controller;
use Common\Controller\MemberbaseController;
class CommentController extends MemberbaseController{
	
	protected $commentsModel;
	protected $usersModel;
	
	function _initialize() {
		parent::_initialize();
		$this->commentsModel=D("Common/Comments");
		$this->usersModel =D("Users");
	}
	
	function index(){
		$uid=sp_get_current_userid();
		$where=array("uid"=>$uid);
		
		$count=$this->commentsModel->where($where)->count();
		
		$page=$this->page($count,20);
		$page->setLinkWraper("li");
		
		$comments=$this->commentsModel->where($where)
		->order("createtime desc")
		->limit($page->firstRow . ',' . $page->listRows)
		->select();
		
		// echo $uid;
		$this->assign("userNavtype",5);
		$this->assign("pager",$page->show("default"));
		$this->assign("comments",$comments);
		$this->display(":index");
	}
	
	function post(){
		// $this->display(":index");
		/* if($_SESSION['_verify_']['verify']!=I("post.verify")){
			$this->error("验证码错误！");
		} */
		
		if (IS_POST){
			
			// print_r($_POST);
			$post_table=sp_authcode($_POST['post_table']);

			
			$_POST['post_table']=$post_table;
			
			$url=parse_url(urldecode($_POST['url']));
			// var_dump($url);
			$query=empty($url['query'])?"":"?{$url['query']}";
			$url="{$url['scheme']}://{$url['host']}{$url['path']}$query";

			$_POST['url']=sp_get_relative_url($url);
			
			if(isset($_SESSION["user"])){//用户已登陆,且是本站会员
				$uid=$_SESSION["user"]['id'];
				$_POST['uid']=$uid;
				$user=$this->usersModel->field("user_login,user_email,user_nicename")->where("id=$uid")->find();
				$username=$user['user_login'];
				$user_nicename=$user['user_nicename'];
				$email=$user['user_email'];
				$_POST['full_name']=empty($user_nicename)?$username:$user_nicename;
				$_POST['email']=$email;
			}
			
			if(C("COMMENT_NEED_CHECK")){
				$_POST['status']=0;//评论审核功能开启
			}else{
				$_POST['status']=1;
			}
			
			if ($this->commentsModel->create()){
				$this->check_last_action(intval(C("COMMENT_TIME_INTERVAL")));
				$result=$this->commentsModel->add();
				if ($result!==false){
					
					//评论计数
					$post_table=ucwords(str_replace("_", " ", $post_table));
					$post_table=str_replace(" ","",$post_table);
					$post_table_model=M($post_table);
					$pk=$post_table_model->getPk();
					
					$post_table_model->create(array("comment_count"=>array("exp","comment_count+1")));
					$post_table_model->where(array($pk=>intval($_POST['post_id'])))->save();
					
					$post_table_model->create(array("last_comment"=>time()));
					$post_table_model->where(array($pk=>intval($_POST['post_id'])))->save();
					
					$newCommentData = $this->commentsModel->where(['id'=>$result])->select()[0];
					$thisUserData = $this->usersModel->field("id,user_login,user_nicename,avatar")->where(['id'=>$newCommentData['uid']])->select()[0];
					$thisUserData['avatar'] = sp_get_user_avatar_url($thisUserData['avatar']);
					if(empty($thisUserData['avatar'])){
						$thisUserData['avatar'] ='/hiphoplife/tpl/simplebootx/Public/images/headicon.png';
					}
					$thisUserData['url'] =U('user/index/index',['id'=>$thisUserData['id']]);
					// var_dump(expression)
					// $this->ajaxReturn(sp_ajax_return(array("id"=>$result),"content"=>"评论成功！",1));
					$this->ajaxReturn([
						'status'=>1,
						'content'=>'评论成功',
						'data'=>$newCommentData,
						'userData'=>$thisUserData
						]);
				} else {
					// $this->error("评论失败！");

					$this->ajaxReturn([
						'status'=>-1,
						'content'=>'评论失败'
						]);

				}
			} else {
				// $this->error($this->commentsModel->getError());
				$this->ajaxReturn([
					'status'=>-2,
					'content'=>$this->commentsModel->getError()
					]);
			}
		}
		
	}
}