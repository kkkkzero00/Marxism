<?php
namespace Material\Model;
use Common\Model\HyAllModel;

/**
 * 班级管理模型
 *
 * @author Homkai QQ:345887894
 */
class MaterialAModel extends HyAllModel {

	/**
	 * @overrides
	 */
	protected function initTableName(){
		return 'material';
	}
	
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '材料文本',
				'subtitle' => '管理材料文本' 
		);
	}
	
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'where' => array (
						'status'=>array('eq',1),
						'type_id'=>array('eq',1)
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
				/*'initJS'	=> 'ClassInfo',*/
		);
	}
	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
				'title' => array (
						'title' => '名称',
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
				'content'=>array(
						'title' => '文章内容',
						'list'	=> array(
								'callback' => array('cutLength')
						),
						'form'	=> array(
								'type'	=>	'textarea',
								'validate' => array (
										'required' => true,
										/*'minlength' => 2*/
								)
						)
				),

				'type_id'=>array(
					'form'	=>	array(
						'fill'=>array(
							'both'=>array('value',1)
						)
					)
				)
				
				
		);
	}
	/**
	 * 用于支持fieldsOptions
	 */

	public function detail($pk){
		$where = array('id'=>$pk);
		$arr = $this->where($where)->find();
	
		return array(
			'table'=>array(
				'title'=>array(
					'title'=>'标题',
					'icon'	=>	'fa-list-alt',
					'style'	=>	'green',
					'value'	=>	array(
						''=> $arr['title']?('<pre>'.$arr['title'].'</pre>'):'无'
					)
				),
				'content'=>array(
					'title'=>'内容',
					'icon'	=> 'fa-list-alt',
					'style'	=>	'green',
					'cols'=>'0,12',
					'value'	=>	array(
						''=> $arr['content']?('<pre>'.$arr['content'].'</pre>'):'无'
					)
				)
			
			)
		);
	}
	/**
	 * 图表汇总
	 * @return json
	 */
	/*protected function detail_chart(){
		$grades=$this->associate(array('student|id|class_id'))
			->where(array('student.status'=>1,'status'=>1,'college_id'=>ss_clgid()))
			->field(array('grade'=>'name','count(grade)'=>'value'))->group('grade')->order('grade asc')->select();
		$classes=$this->associate(array('student|id|class_id'))
			->where(array('student.status'=>1,'status'=>1,'college_id'=>ss_clgid()))
			->field(array('name','count(hy.id)'=>'value'))->group('hy.id')->order('grade asc')->select();
		return array('json'=>json_encode(array('grades'=>$grades,'classes'=>$classes)));
	}*/

	protected function callback_cutLength($content){

		if(mb_strlen($content)>50){
			$arr = mb_substr($content,0,40).'...';
		}else{
			$arr = $content;
		}
		
		return $arr;
	}

	
}