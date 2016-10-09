<?php
namespace Brief\Model;
use Common\Model\HyAllModel;
/**
 *
 * @author DOC稻壳
 */
class BriefEModel extends HyAllModel {
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
            'title' => '基本内容',
            'subtitle' => '编辑基本内容'
		);
	}
// 	/**
// 	 * @overrides
// 	 */
	protected function initSqlOptions() {
        return array (
            'where' => array (
                    'status'=>array('eq',1),
                    'type_id'=>array('eq',4)
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
                'detailTpl' =>'/Brief@Brief/detail_f',
                'formSize'=>'large',
            );
	}
// 	/**
// 	 * @overrides
// 	 */
	protected function initFieldsOptions(){
		return array(
		  'title'=>array(
                'title'=>"基本内容摘要",
                'list'=>array(
                        'search' => array (
                                'query' => 'like',
                                'sql'=>'brief.title LIKE "%{:title}%"'
                        )
                ),
                'form'=>array(
                    'type'=>'textarea',
                    'attr'=>'style="height:80px;"',
                    'style'=>'make-ueditor',
                    'validate' => array (
                        'required' => true,
                        'minlength'=>2,
                        'maxlength'=>200
                    )
                ),
            ),
            'content'=>array(
                'title'=>'基本内容',
                'list'=>array(
                    'width'=>'10px',
                    'callback'=>array('tplReplace','{callback}'=>array('get_name'),C('TPL_DETAIL_BTN'),'{#}'),
                ),
                'form'=>array(
                    'type'=>'textarea',
                    'attr'=>'style="height:200px;"',
                    'style'=>'make-ueditor',
                    'validate' => array (
                        'required' => true,
                        'minlength'=>2,
                        'maxlength'=>1000
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
                            'both'=>array('value',4)
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
    public function callback_get_name($id) {
        return '查看详情';
    }
    public function detail($pk){
        $arr=$this->where(array('id'=>array('eq', $pk),'status'=>array('eq',1)))->find();
        $result['content']=$arr['content'];
        $result['title']=$arr['title'];
        $result['head']='基本内容';
        return $result;
     }
}