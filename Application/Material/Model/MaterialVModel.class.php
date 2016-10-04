<?php
namespace Material\Model;
use Common\Model\HyAllModel;

/**
 * 班级管理模型
 *
 * @author Homkai QQ:345887894
 */
class MaterialVModel extends HyAllModel {

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
				'title' => '材料视频',
				'subtitle' => '管理材料视频' 
		);
	}
	
	/**
	 * @overrides
	 */
	protected function initSqlOptions() {
		return array (
				'where' => array (
						'status'=>array('eq',1),
						'type_id'=>array('eq',3)
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
						/*'chart' =>array(
								'title'=>'汇总',
								'icon'=>'fa-bar-chart',
								'detail'=>true
						),*/
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
						'title' => '视频名称',
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
				'file_id'=>array(
					
					'form'=>array(
						'title'=>'上传视频',
						'type'=>'file'
					)
				),
				'type_id'=>array(
					'form'=>array(
						'fill'=>array(
							'both'=>array('value',3)
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
		$arr = $this->associate(array('frame_file|file_id|id|savepath,savename,id||left'))->where($where)->find();
		return array(
			'table'=>array(
				'title'=>array(
					'title'=>'视频名称',
					'icon' => 'fa-list-alt',
                    'style' => 'green',
                    'cols'=>'0,12',
                    'value' => array (
                        '' => $arr['title'] ? ('<pre>'.$arr['title'].'</pre>') : '无'
                    )
				),
				'file_id'=>array(
					'title'=>'查看视频',
					'icon'=> 'fa-list-alt',
					'style'=>'green',

					'value'=>array(
						''=>$arr['id']?(
							"<pre>
								<video controls autoplay>
									<source src='".$arr['savepath'].$arr['savename']."' type='video/mp4'>
								</video>
							</pre>"
						) : '无'
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
}
