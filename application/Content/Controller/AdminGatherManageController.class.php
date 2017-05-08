<?php
namespace Content\Controller;
use Common\Controller\AdminbaseController;
class AdminGatherManageController extends AdminbaseController{

	protected $gatherModel;
	protected $VideoCateGory;

	function _initialize(){
		parent::_initialize();
		$this->gatherModel = D("Common/VideoGather");
		$this->VideoCateGory =M("VideoCategory");
	}

	function index(){
		$p= 1;
		!empty(I("param.p"))&&$p = I("param.p");
		$gatherData = $this->gatherModel->where(['gather_id'=>['neq',1],'gather_status'=>1])->order("create_time desc")->page($p.",20")->select();
		$count =  $this->gatherModel->count()-1;
		$page = $this->page($count,20);
		$this->assign('Page',$page->show('Admin'));
		$this->assign("gatherData",$gatherData);
		$this->display();

	}

	function add(){
		$this->getVideoCategoryData();
		// var_dump($VideoCateGoryData);
		$this->display();
	}

	function add_post(){
		if(IS_POST){
			$gatherData =I("post.");
			$gatherData['smeta'] =sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST = $gatherData;
			$create =$this->gatherModel->create();
			if($create){
				$result =$this->gatherModel->add();
				if($result){
					$this->success("添加成功");
				}else{
					$this->error("添加失败");
				}
			}else{	
				$this->error($this->gatherModel->getError());
			}

		}

	}


	function edit(){
		$this->getVideoCategoryData();
		$id =I("param.gather_id");
		$data = $this->gatherModel->where(['gather_id'=>$id])->select()[0];
		// var_dump($data);
		$this->assign("gatherOneData",$data);
		$this->display();
	}

	function edit_post(){
		$data = I('param.');
		if(!empty($data['smeta']['thumb'])){
			$data['smeta'] =sp_asset_relative_url($_POST['smeta']['thumb']);
		}
		$_POST =$data;
		$create = $this->gatherModel->create();
		if($create){
			$result = $this->gatherModel->save();
			if($result){
				$this->success("编辑成功");
			}else{
				$this->error("编辑失败");
			}
		}else{
			$this->error($this->gatherModel->getError());
		}
	}

	function delete(){
		$id =intval(I("param.gather_id"));
		$result= $this->gatherModel->where(['gather_id'=>$id])->save(['gather_status'=>-1]);
		if($result){
				$this->success('已删除');
			}else{
				$this->error('删除失败');
			}

	}

	private function getVideoCategoryData(){
		$VideoCateGoryData = $this->VideoCateGory->where(['type'=>'str'])->select();
		$this->assign("VideoCateGoryData",$VideoCateGoryData);
	}

}