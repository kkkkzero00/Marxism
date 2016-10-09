<?php
namespace Brief\Model;
use Common\Model\HyAllModel;
/**
 *
 * @author DOC稻壳
 */
class BriefVModel extends HyAllModel {
	/**
	 * @overrides
	 */
	protected function initTableName(){
		return 'brief';
	}
// 	/**
// 	 * @overrides
// 	 */
	protected function initInfoOptions(){
		return array (
            'title' => '成果视频',
            'subtitle' => '成果视频为上传至优酷后的网址'
		);
	}
// 	/**
// 	 * @overrides
// 	 */
	protected function initSqlOptions() {
        return array (
            'where' => array (
                        'status'=>array('eq',1),
                        'type_id'=>array('eq',3)
                ) 
		);
	}
// 	/**
// 	 * @overrides
// 	 */
	protected function initPageOptions() {
            return array(
                'actions'=>array(
                    'edit'=>array(
                        'title'=>'编辑',
                        'max'=>1
                    ),
                     'delete'=>array(
                        'title'=>'删除',
                        'confirm'=>true
                    ) 
                ),
                'buttons'=>array(
                    'add'=>array(
                        'title'=>'添加',
                        'icon'=>'fa-plus'
                    )
                ),
                'detailTpl' =>'/Brief@Brief/detail_g',
                'formSize'=>'large',
            );
	}
// 	/**
// 	 * @overrides
// 	 */
	protected function initFieldsOptions(){
        return array (
            'title'=>array(
                'title'=>"成果视频名称",
                'list'=>array(
                        'callback'=>array('tplReplace',C('TPL_DETAIL_BTN')),
                        'search' => array (
                                'query' => 'like',
                                'sql'=>'brief.title LIKE "%{:title}%"'
                        )
                ),
                'form'=>array(
                        'type'=>'text',
                        'validate'=>array(
                                'required'=>true
                        )
                ),
            ),
            'content'=>array(
                'title'=>'成果视频网址',
                'list'=>array(
                    'width'=>'1000px'
                ),
                'form'=>array(
                    'type'=>'text',
                    'validate' => array (
                        'required' => true
                    )
                )
            ),
            'type_id'=>array(
                    'list'  =>  [
                        'hidden'=>true
                    ],
                    'form'=>array(
                        'attr'     =>  'style="display:none"',
                        'fill'=>array(
                            'both'=>array('value',3)
                        )
                    )
            ),
            'create_time' => array (
                    'list'=>array(
                            'title'=>'上传时间',
                            'width' => '30',
                            'callback'=>array('to_time')
                    ),
                    'form' => array (
                            'fill' => array(
                                'add' => array('value',time())
                            )
                    )
            ),
        );
    }
    public function detail($pk){
        $result['video']=$this->where(array('id'=>array('eq', $pk)))->getField('content');
        return $result;
    }
}