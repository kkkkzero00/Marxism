<?php
namespace Achieve\Model;
use Common\Model\HyAllModel;
//use System\Model\HomkaiServiceModel;

/**
 * 班级管理模型
 *
 * @author Homkai QQ:345887894
 */
class AchieverModel extends HyAllModel {

	/**
	 * @overrides
	 */
	protected function initTableName(){
		return 'achiever';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '成果完成人',
				'subtitle' => '管理成果完成人的信息' 
		);
	}
	
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'where' => array (
						'status'=>array('eq',1),
						'id'=>array('gt',0)
				) 
		);
	}
	/**
	 * @overrides
	 */
	protected function initPageOptions() {
		return array (
				'checkbox'	=> true,
				'deleteType'=> 'status|9',
				'okRefresh'	=>	true,
				'actions' 	=> array (
						'edit' => array (
								'title' => '编辑',
								'max' => 1 
						),
						'delete' => array (
								'title' => '删除',								
								// 是否需要确认
								'confirm' => true 
						) 
				),
				'buttons'	=> array(
						'add'=>array(
								'title'=>'新增',
								'icon'=>'fa-plus'
						)
				),
				// 'initJS'	=> 'ClassInfo',
		);
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
				'name' => array (
						'title' => '完成人',
						'list' => array (
								'order' => 'CONVERT(`name` USING gbk)',
								'callback'=>array('tplReplace', C('TPL_DETAIL_BTN')),
								'search' => array (
										'query' => 'like' 
								) 
						),
						'form' => array (
								'validate' => array (
										'required' => true,
										'minlength' => 2
								)
						) 
				),
				'awards' => array (
						'title' => '获得荣誉',
						'list' => array (
								'search' => array (
										'type' => 'text' 
								)
						),
						'form' => array (
								'type' => 'text',
								'validate' => array (
										'required' => true,
										
								) 
						) 
				),
				'message' => array (
						'title' => '个人简介',
						'form' => array (
								'type' => 'text',
								'validate' => array (
										'required' => true ,
										
								) 
						) 
				),
				'photo_id'=>array(
						'title'=>'上传照片',
						'form'=> array(
							'type'=>'file'
						)
				)
				
		);
	}
	/**
	 * 用于支持fieldsOptions
	 */

	
	public function detail($pk){
		$where = array('id'=>$pk);
		
		$arr = $this->associate(array('frame_file|photo_id|id|savepath,savename,id'))->where(array('id'=>$pk))->find();
		/*dump($arr);
		dump($arr['savepath'].$arr['savename']);*/
		return array(
			'table'=>array(
				'name'=>array(
					'title'=>'姓名',
					'icon'=>'fa-list-alt',
					'style'=>'blue',
					'value'=>array(
						''=>$arr['name']?('<pre>'.$arr['name'].'</pre>') : '无'
					)
				),
				'awards'=>array(
					'title'=>'获得荣誉',
					'icon'=> 'fa-list-alt',
					'style'=>'red',
					'value'=>array(
						''=>$arr['awards']?('<pre>'.$arr['awards'].'</pre>') : '无'
					)
				),
				'message'=>array(
					'title'=>'个人简介',
					'icon'=> 'fa-list-alt',
					'style'=>'green',

					'value'=>array(
						''=>$arr['message']?('<pre>'.$arr['message'].'</pre>') : '无'
					)
				),
				'photo_id'=>array(
					'title'=>'照片',
					'icon'=> 'fa-list-alt',
					'style'=>'green',

					'value'=>array(
						''=>$arr['id']?("<pre><img src='Marxism/Public/uploads/".$arr['savepath'].$arr['savename']."'></pre>") : '无'
					)
				)
			)
			
		
		);
	}
	/**
	 * 图表汇总
	 * @return json
	 */
/*	protected function detail_chart(){
		$grades=$this->associate(array('student|id|class_id'))
			->where(array('student.status'=>1,'status'=>1,'college_id'=>ss_clgid()))
			->field(array('grade'=>'name','count(grade)'=>'value'))->group('grade')->order('grade asc')->select();
		$classes=$this->associate(array('student|id|class_id'))
			->where(array('student.status'=>1,'status'=>1,'college_id'=>ss_clgid()))
			->field(array('name','count(hy.id)'=>'value'))->group('hy.id')->order('grade asc')->select();
		return array('json'=>json_encode(array('grades'=>$grades,'classes'=>$classes)));
	}*/
}
