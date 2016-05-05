<?php
namespace Admin\Model;
use Think\Model;
class SourceModel extends Model{
	/*
	 *字段映射
	 */
	protected $_map=array(
		'name'		=> 'sre_name',
		'sort'		=> 'sort_order',
		'display'	=> 'status',
	);

	/*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和数据库中的字段名一致
     */
	protected $insertFields=array('sre_name','sort_order','status');
	protected $updateFields=array('sre_name','sort_order','status');

	/*
	 * 自动验证
	 */
	protected $_validate=array(
		array('sre_name','require','出处名称不能为空!'),
		array('sre_name','0,20','出处名称应在20字以内！','0','length',3),
		/*array('sre_name','','出处名称已存在!',0,'unique',1),i*/
		array('sort_order','number','排序值应该为数字!'),
		array('status','array(0,1)',0,'请选择状态',3,'in'),
	);
}
