<?php
namespace Common\Model;
use Common\Model\CommonModel;
/**
* 
*/
class MusicModel extends CommonModel{

	/*
		自动验证
	*/
	protected $_validate =[
		['name','require','音乐名称不能为空',1,'regex',3],
		['category_id','require','音乐类型不能为空',1,'regex',3],
		['gather_id','require','音乐专辑不能为空',1,'regex',3],
		['url','require','音乐地址不能为空',1,'regex',3]
	];


	/*
		自动完成
	*/
	protected $_auto = [
	// array(完成字段1,完成规则,[完成条件,附加规则]),
		['status',1],
		['create_time','mGetDate',1,'callback'],
		['create_user','getUserId',1,'callback'],
		['last_update_time','mGetDate',3,'callback'],
		['last_update_user','getUserId',3,'callback']
	];

	/*
		关联模型
	*/

	function mGetDate() {
		return date ( 'Y-m-d H:i:s' );
	}

	function getUserId(){
		return sp_get_current_admin_id();
	}


}