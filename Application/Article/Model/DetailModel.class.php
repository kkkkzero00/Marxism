<?php
namespace Article\Model;
use Common\Model\HyAllModel;

/**
 * 文章分类管理模型
 *
 * @author
 */
class DetailModel extends HyAllModel {

    /**
     * @overrides
     */
    protected function initTableName(){
        return 'detail';
    }

    /**
     * @overrides
     */
    protected function initInfoOptions() {
        return array (
            'title' => '文章内容分类',
            'subtitle' => '管理所有内容信息',
            'pagetitle' => '文章内容信息'
        );
    }
    /**
     * @overrides
     */
    protected function initSqlOptions() {

        return array (
            'associate' => array (
           
                 'category|category_id|id|name AS category_name||left',
           
             ),
            'where' => array (
                'status'=>array('eq',1),
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
                    'title'=>'发布栏目文章',
                    'icon'=>'fa-plus'
                )
            ),
            'tips'=>array(
                'add'=>'温馨提示：发布栏目文章内容框的左上角可以放大编辑器',
                'edit'=>'温馨提示：发布栏目文章内容框的左上角可以放大编辑器'
            ),
            'initJS' => array(
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

            ),
            'formSize'=>'full',
        );
    }
    /**
     * @overrides
     */
    protected function initFieldsOptions() {
        return array (
            'title' => array(
                'title' => '标题',
                'list' => array (
                    'callback'=>array('tplReplace','{callback}'=>array('val_decrypt'),C('TPL_DETAIL_BTN'),'{#}'),
                    'search' => array (
                        'query' => 'like'
                    )
                ),
                'form' => array (
                    'type' => 'text',
                    'validate'=>array(
                        'required'=>true
                    )
                )
            ),
            'category_id' => array (
                'title' => '栏目',
                'list'=>array(
                    'callback'=>array('value','{:category_name}'),
                    'search' => array (
                        'type' => 'select',
                        'select'=>array(
                            'optgroup'=>true
                        )
                    )
                ),
                'form' => array (
                    'type' => 'select',
                    'validate'=>array(
                        'required'=>true
                    ),
                    'select' => array(
                        'optgroup'	=>	true
                    )

                )
            ),

            'create_time' => array (
                'list'=>array(
                    'title'=>'发布时间',
                    'callback'=>array('to_time')
                ),
                'form' => array (
                    'title'=>'发布时间',
                    'type' => 'text',
                    'fill' => array(
                        'both' => array('dateToTime')
                    ),
                    'validate'=>array(
//						'required'=>true,
                        'regex'=>'^((^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(10|12|0?[13578])([-\/\._])(3[01]|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(11|0?[469])([-\/\._])(30|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(0?2)([-\/\._])(2[0-8]|1[0-9]|0?[1-9])$)|(^([2468][048]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([3579][26]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][13579][26])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][13579][26])([-\/\._])(0?2)([-\/\._])(29)$))$'
                        //'date'=>true
                    ),
                    'callback' =>array('to_time'),
                    'tip' => '时间格式为:2015-8-5，如果默认是当前时间，可以不填此项'
                )
            ),
            'content' => array (
                'form'=>array(
                    'title'=>'内容',
                    'type'=>'textarea',
                    'attr'=>'style="height:500px;width:140%;"',
                    'style'=>'make-ueditor',
                    'fill'=>array(
                        'both'=>array('content')
                    ),
                    'validate' => array(
                        'required' =>true
                    ),
                ),
            ),

           
           
            'status' => array (
                'title' => '状态',
                'list' => array (
                    'width' => '30',
                    'callback' => array('status')
                ),
                'form' => array (
                    'type' => 'select',
                )
            )
        );
    }


    protected function callback_content(){
        return I('content','','');
    }

    protected function callback_downfile($file_id,$file_name){
        if(!$file_id) return '无';
        return '<a href="'.file_down_url($file_id).'" title="'.$file_name.'" class="btn btn-xs green"><i class="fa fa-download"></i> 下载附件</a>';
    }
    protected function getOptions_title(){
        return $this->where(array(
            'status'=>1,

        ))->getField('id,title');
    }
    
    protected function getOptions_category_id(){
        $arr = M('category')->where(array(
            'id'=>array('gt',11),

        ))->getField('id,pid,name');
        foreach($arr as $k => $v){
            if(!$v['pid']) {
                $arr1[$v['name']][$v['id']]=$v['name'];

                foreach($arr as $k1 => $v1){
                    if($v1['pid'] == $v['id']){
                        unset($arr1[$v['name']][$v['id']]);
                        $arr1[$v['name']][$v1['id']] = $v1['name'];
                    }

                }
            } 
            
        }
        return $arr1;
    }

    protected function callback_dateToTime($time){
        if(!$time){
            return time();
        }
        else{
            return strtotime($time);
        }
    }

    protected function detail($pk){
        $associate=array(

            'category|category_id|id|name AS category_name||left',
            
        );
        $arr=$this->associate($associate)->where(array('id'=>$pk))->find();
        return array('table'=>array(

            'base'=>array(
                'title'=>'内容信息',
                'icon'=>'fa-list-alt',

                'style'=>'green',
                'cols'=>'0,12',
                'value'=>array(
                    ''=>val_decrypt($arr['content']),

                )
            ),


        ),

        );

    }

}