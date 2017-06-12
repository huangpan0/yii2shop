<?php
namespace backend\models;
use yii\db\ActiveRecord;

class Articles extends ActiveRecord{

    public $imgfile;
    static public $stance=[0=>'上线',1=>'下线'];
    public function rules(){
        return [
            [['name','name','intro','article_id','sort','status'],'required'],
            [['article_id','sort'],'integer'],
           // [['imgfile'],'file','extensions'=>['jpg','png','gif']]
        ];
    }
    public function attributeLabels(){
        return [
            'name'=>'名称',
            'intro'=>'简介',
            'sort'=>'排序',
            'status'=>'状态',
            'create_time'=>'创建时间'
        ];
    }


}
