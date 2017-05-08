<?php
namespace Content\Controller;
use Common\Controller\AdminbaseController;
class AdminImageManageController extends AdminbaseController{

	private $imageModel;
	private $userModel;

	function _initialize(){
		$this->imageModel = D("Common/Image");
		$this->User = M('Users');
	}

	public function index(){
		$p =1;
		!empty(I('param.p'))&& $p=I('param.p');
		$Imagedata = $this->imageModel->where(['status'=>1])->order('create_time desc')->page($selectData['p'].',20')->select();
		$this->assign('ImageData',$Imagedata);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function add_post(){
		$data = I('param.');
		if(IS_POST){
			$data['smeta'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST = $data;
			$create = $this->imageModel->create();
			if($create){
				$result = $this->imageModel->add();
				if($result){
					$this->success('添加成功');
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error($this->imageModel->getError());
			}
		}
	}

	public function edit(){
		$id =intval(I("param.id"));
		$editData = $this->imageModel->where(['id'=>$id])->select()[0];
		// var_dump($editData);
		$this->assign("editData",$editData);
		$this->display();
	}

	public function edit_post(){
		$data = I('param.');
		if(!empty($data['smeta']['thumb'])){
			$data['smeta'] =sp_asset_relative_url($_POST['smeta']['thumb']);
		}
		$_POST =$data;
		$create = $this->imageModel->create();
		if($create){
			$result = $this->imageModel->save();
			if($result){
				$this->success("编辑成功");
			}else{
				$this->error("编辑失败");
			}
		}else{
			$this->error($this->imageModel->getError());
		}
	}

	public function delete(){
		$id = intval(I("param.id"));
		$result= $this->imageModel->where(['id'=>$id])->save(['status'=>-1]);
		if($result){
				$this->success('已删除');
			}else{
				$this->error('删除失败');
			}

	}
}