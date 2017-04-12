<?php 
	namespace Content\Controller;
	use Common\Controller\AdminbaseController;
	class AdminVideoManageController extends AdminbaseController{

		protected $videoModel;
		protected $userModel;
		protected $videoCategoryModel;
		protected $videoGatherModel;


		function _initialize(){
			parent::_initialize();
			$this->videoModel =D("Common/Video");
			$this->userModel = M("Users");
			$this->videoCategoryModel = D("Common/VideoCategory");
			$this->videoGatherModel = M("videoGather");
		}


		public function index(){
			$p =1;
			// var_dump(I('param.p'));
			!empty(I('param.p'))&& $p=I('param.p');
			// var_dump($p);

			if(!empty(I('param.'))){
				/*
					如果是post数据，执行添加筛选数据
				*/
				// var_dump(I('param.'));
				//筛选条件
				$selectData =[];
				$selectData['category_id'] = !empty(I('post.category_id'))?I('post.category_id'):false;
				$selectData['gather_id']  = !empty(I('post.gather_id'))?I('post.gather_id'):false;
				$selectData['start_time'] =!empty(I('post.start_time'))?I('post.start_time'):false;
				$selectData['endTime'] =!empty(I('post.end_time'))?I('post.end_time'):false;
				$selectData['keywords'] =!empty(I('post.keywords'))?I('post.keywords'):false;
				$selectData['p'] =$p;
				// var_dump($selectData);

				if($selectData['gather_id']!=false){
					//如果专辑值不为空，则将当前专辑数组传回去
					$Selectedgather = $this->_getGather($selectData['gather_id'])[0];
					$this->assign('Selectedgather',$Selectedgather);
				}
				if($selectData['category_id']!=false){
					//当类型不为空，专辑为当前类型专辑
					//获取对应的类型的专辑
					$this->assign('gatherData',$this->_getGather(false,$selectData['category_id']));
					// var_dump($this->_getGather(false,$selectData['category_id']));

				}else{
					//如果类型值为空时，则将所有的类型以及专辑传过去
					$AllGatherData = $this->_getGather();
					$this->assign('gatherData',$AllGatherData);

				}
				//获取筛选后的数据
				$this->assign('VideoData',$this->_getData($selectData)['result']);
				$page = $this->page($this->_getData($selectData)['count'],20);
				$this->assign('Page',$page->show('Admin'));
				//将前台之前传输过来的数据传输回去
				$this->assign('selectData',$selectData);
				// var_dump($selectData);
				
			}else{
				//视频管理页面初始化，将所有的视频信息展示出来
				$this->assign('VideoData',$this->_getData()['result']);
				$page = $this->page($this->_getData($selectData)['count'],20);
				$this->assign('Page',$page->show('Admin'));
				$this->assign('gatherData',$this->_getGather());
				// var_dump($this->_getData());
			}
			$this->assign('VideoCategory',$this->_getCategory());
			$this->display();

		}

		public function add(){
			// print_r($this->_getCategory());
			$this->assign('videoGather',$this->_getGather());
			// print_r($this->_getGather());
			$this->assign('VideoCategory',$this->_getCategory());
			$this->display();

		}

		public function add_post(){
			// var_dump($_FILES['file']);
			$url =false;
			if($_FILES['file']){
				$upload = new \Think\Upload();//实例化上传类
				$upload->maxSize =0;
				$upload->exts = ['mp4','flv','rmvb','3gp','wmv','avi'];
				$upload->rootPath = './VideoUpload/';
				$upload->savePath = '';//设置附件上传目录
				//上传文件
				$info = $upload->upload();
				if(!info){//上传错误显示信息
					$this->error($upload->getError());
				}else{//上传成功
					
					$url = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
				}
			}
			// print_r(I('param.'));
			if(IS_POST){
				// print_r(I('param.'));
				empty(I('post.category_id'))&& $this->error("请选择一个视频类型");
				empty(I('post.gather_id'))&& $this->error("请现在一个视频专辑");
				empty(I('post.name'))&& $this->error('视频名称不能为空');
				empty(I('post.url'))&& $url==false && $this->error('视频地址不能为空');
				empty(I('post.url'))&& $url!==false&&$_POST['url'] = $url;
				empty(I('post.keywords'))&& $this->error('关键字不能为空');
				$video =I('post.');
				$video['smeta']['thumb'] =sp_asset_relative_url($_POST['smeta']['thumb']);
				$video['smeta'] =json_encode($video['smeta']);
				$_POST = $video;
				$create = $this->videoModel->create();
				if($create){
					$result = $this->videoModel->add();
					if($result){
						$this->success('添加成功');
					}else{
						$this->error('添加失败');
					}
				}else{
					$this->error($this->videoModel->getError());
				}
			 }
		}

		public function edit(){
			$id =I('param.id');
			// echo $id;
			$result = $this->videoModel->where(['Id'=>$id])->select()[0];
			// var_dump($result);
			$this->assign('editVideoData',$result);
			// var_dump($result);
			$this->assign('videoGather',$this->_getGather());
			// var_dump($this->_getGather());
			$this->assign('VideoCategory',$this->_getCategory());
			$this->display();
		}

		public function edit_post(){
			if(IS_POST){
				empty(I('post.category_id'))&& $this->error("请选择一个视频类型");
				empty(I('post.gather_id'))&& $this->error("请现在一个视频专辑");
				empty(I('post.name'))&& $this->error('视频名称不能为空');
				empty(I('post.url'))&& $this->error('视频地址不能为空');
				empty(I('post.keywords'))&& $this->error('关键字不能为空');
				empty(I('post.detail'))&& $this->error('关键字不能为空');
				$video =I('post.');
				$video['smeta']['thumb'] =sp_asset_relative_url($_POST['smeta']['thumb']);
				$video['smeta'] =json_encode($video['smeta']);
				$_POST = $video;
				$create = $this->videoModel->create();
				if($create){
					$result = $this->videoModel->save();
					if($result){
						$this->success('编辑成功');
					}else{
						$this->error('编辑失败');
					}
				}else{
					$this->error($this->videoModel->getError());
				}
			}
			return false;

		}

		public function delete(){
			$id = I('param.id');
			$result = $this->videoModel->where(['Id'=>$id])->save(['status'=>-1]);
			if($result){
				$this->success('已删除');
			}else{
				$this->error('删除失败');
			}

		}

		//获取每个分类对应的专辑
		public function getGatherJoinCategory(){
			if(IS_POST){
				$category_id = I('post.id');
				$GatherData = $this->videoGatherModel->where(['category_id'=>$category_id])->select();
				$this->ajaxReturn([
					'status'=>1,
					'Content'=>$GatherData
					]);
			}
		}


		/*
			动态获取视频数据
		*/
		private function _getData($selectData=['category_id'=>false,'gather_id'=>false,'start_time'=>false,'endTime'=>false,'keywords'=>false,'p'=>false]){
			 $where = [];
			 $where['status'] = 1;	
			 if(isset($selectData)){
			 	 if($selectData['category_id']!==false)$where['v.category_id'] = intval($selectData['category_id']);
				 if($selectData['gather_id']!==false)$where['v.gather_id'] = intval($selectData['gather_id']);
				
				 if($selectData['start_time']!==false)$where['v.create_time'][0] = ['egt',$selectData['start_time']];
				 if($selectData['endTime']!==false)$where['v.create_time'][1] =['elt',$selectData['endTime']];
				  if($selectData['keywords']!==false)$where['keywords'] = ['like','%'.$selectData['keywords'].'%'];
			 }
			$join =C('DB_PREFIX').'video_category as vc on vc.category_id = v.category_id';
			$join2 =C('DB_PREFIX').'video_gather as vg on vg.gather_id = v.gather_id';
			$count =  $this->videoModel->alias('v')->join($join)->join($join2)->where($where)->count();

			$result = $this->videoModel->alias('v')->join($join)->join($join2)->where($where)->order('v.last_update_time desc')->page($selectData['p'].',20')->select();
			return ['result'=>$result,'count'=>$count];
		}

		/*
			获取所有视频分类
		*/
		private function _getCategory(){
			return $this->videoCategoryModel->select();
		}

		//获取专辑
		//有传参获取对应id的专辑信息，无传参则获取所有的专辑
		private function _getGather($id=false,$category_id=false){
			$where = [];
			if ($id!==false)$where['gather_id'] =$id;
			if ($category_id!==false)$where['category_id'] =$category_id;

			return $this->videoGatherModel->where($where)->order('create_time desc')->select();
		}


		
		private function _getVideoJoinData(){
			$join =C('DB_PREFIX').'video_category as vc on vc.category_id = v.category_id';
			$join2 =C('DB_PREFIX').'video_gather as vg on vg.gather_id = v.gather_id';
			$result = $this->videoModel->alias('v')->join($join)->join($join2)->select();
			return $result;
		}

	}

 ?>