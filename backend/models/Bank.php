<?php
namespace backend\models;
//use yii\base\Model;
use yii\db\ActiveRecord;
class Bank extends ActiveRecord{
    //public $imgfile;

    static public $stance=[-1=>'删除',0=>'隐藏',1=>'上线'];
    public function rules(){
        return [
            [['name','intro','sort','status'],'required'],
            ['sort','integer'],

           // [['imgfile'],'file','extensions'=>['jpg','png','gif'],'skipOnEmpty'=>false]
        ];
    }
    public function attributeLabels(){
        return [
            'name'=>'品牌名称',
            'intro'=>'简介',
            'logo'=>'LOGO图片',
            'sort'=>'排序',
            'status'=>'状态'
        ];
    }

}