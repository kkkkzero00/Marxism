<?php
namespace Brief\Model;
use Common\Model\HyAllModel;
/**
 *
 * @author DOC稻壳
 */
class BriefHModel extends HyAllModel {
    /**
     * @overrides
     */
    protected function initTableName(){
        return 'brief';
    }
//  /**
//   * @overrides
//   */
    protected function initInfoOptions(){
        return array (
            'title' => '获奖荣誉',
            'subtitle' => '编辑获奖荣誉'
        );
    }
//  /**
//   * @overrides
//   */
    protected function initSqlOptions() {
        return array (
            'where' => array (
                    'status'=>array('eq',1),
                    'type_id'=>array('eq',2)
            ) 
        );
    }
//  /**
//   * @overrides
//   */
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
                    )

                ),
                'detailTpl' =>'/Brief@Brief/detail',
                'formSize'=>'full',
            );
    }
//  /**
//   * @overrides
//   */
    protected function initFieldsOptions(){
        return array (
            'title'=>array(
                'title'=>"荣誉名称",
                'list'=>array(
                        'callback'=>array('tplReplace',C('TPL_DETAIL_BTN')),
                        'search' => array (
                                'query' => 'like',
                                'sql'=>'brief.title LIKE "%{:title}%"'
                        )
                ),
                'form'=>array(
                        'type'=>'text',
                        'attr'=>'style="width:112%;"',
                        'validate'=>array(
                                'required'=>true
                        )
                ),
            ),
            'content' => array (
                'form'=>array(
                    'title'=>'获奖荣誉内容',
                    'type'=>'textarea',
                    'attr'=>'style="height:500px;width:100%;"',
                    'style'=>'make-ueditor',
                    'fill'=>array(
                        'both'=>array('content')
                    ),
                    'validate' => array(
                        'required' =>true
                    ),
                )
            ),
            'type_id'=>array(
                    'list'  =>  [
                        'hidden'=>true
                    ],
                    'form'=>array(
                        'attr'     =>  'style="display:none"',
                        'fill'=>array(
                            'both'=>array('value',2)
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
         $arr = $this->where(array('id'=>array('eq', $pk)))->field('content')->find();
        return array (
             'table'=>array(
                 'ilnfo'=>array(
                     'tite' => '荣誉内容',
                     'icon' => 'fa-list-alt',
                     'style' => 'green',
                     'value' => array (
                         '详细信息：' => $arr['content'] ? $arr['content']: '-'
                     )
                 )
             )
         );
     }
}