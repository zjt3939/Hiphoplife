<?php
namespace Common\Model;
use Common\Model\CommonModel;
class VideoGatherModel extends CommonModel{

	//自定验证
	protected $_validate=[
		['gather_name','require','专辑名称不能为空',1,'regex',3],
		['category_id','require','视频类型不能为空',1,'regex',3],
		['keywords','require','搜索关键字不能为空',1,'regex',3],
		['smeta','require','专辑封面图片不能为空',2,'regex',3],
		['detail','require','专辑详细介绍不能为空',1,'regex',3],
	];

	//自动完成
		protected $_auto = [
	// array(完成字段1,完成规则,[完成条件,附加规则]),
		['status',1],
		['create_time','mGetDate',1,'callback'],
		['create_user_id','getUserId',1,'callback'],
	];


	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}

	function getUserId(){
		return sp_get_current_admin_id();
	}


}