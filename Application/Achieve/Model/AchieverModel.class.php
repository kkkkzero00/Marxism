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
	protected function initInfoOptions(){
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
				'initJS'	=> array(
					'UEditor'=>json_encode(
                            array(
                                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                                'directionalityltr', 'directionalityrtl', 'indent', '|',
                                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                                'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                                'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                                'print', 'preview', 'searchreplace', 'help', 'drafts'
                            )
                	),
                	'fullScreen',	
            	),
            	'formSize'=>'full',
				
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
				'boss_id' => array(
						'title'	=>	'主要负责人',
						'list'	=>	array(
							'callback'=>array('checkChief')
						),
						'form'	=>	array(
							'title'	=>	'是否设为主要负责人',
							'type'=>'select',	
										
							'callback'	=>	array('check_boss_exist'),
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
						
						'form' => array (
								'title' => '个人简介',
								'type' => 'textarea',
								'attr'=>'style="height:800px;width:115%;"',
								'style'=>'make-ueditor',
								'fill'=>array(
			                        'both'=>array('content')
			                    ),
								'validate' => array (
										'required' => true ,
										
								) 
						) 
				),
				'photo_id'=>array(
						
						'form'=> array(
							'title'=>'上传照片',
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
					'cols'=>'0,12',
					'value'=>array(
						''=>$arr['message']?("<p style='text-indent:30px'>".$arr['message']."</p>") : '无'
					)
				),
				'photo_id'=>array(
					'title'=>'照片',
					'icon'=> 'fa-list-alt',
					'style'=>'green',
					'cols'=>'0,12',
					'value'=>array(
						''=>$arr['id']?("<img width='400' height='300' src='".__ROOT__."/Public/uploads/".$arr['savepath'].$arr['savename']."'>") : '无'
					)
				)
			)
			
		
		);
	}

	protected function getOptions_boss_id(){
		$boss = $this->where(array('boss_id'=>array('eq',1)))->find();
		
		if($boss){
			return array(
				'2' => '否'
			);;
		}else{
			return array(
	            '1' => '是',
	            '2' => '否'
	        );
		}
         
    }

	public function callback_checkChief($id){
		if($id==1){
			return '是';
		}else{
			return '否';
		}
	}

	

}
