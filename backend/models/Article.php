<?php
namespace backend\models;
use yii\db\ActiveRecord;

class Article extends ActiveRecord{

    public $imgfile;
    static public $stance=[-1=>'删除',0=>'下线',1=>'上线'];
    public function rules(){
        return [
            [['name','intro','sort','status'],'required'],
            [['sort','status'],'integer']

        ];
    }
    public function attributeLabels(){
        return [
            'name'=>'品牌名称',
            'intro'=>'简介',
            'logo'=>'LOGO图片',
            'sort'=>'排序',
            'status'=>'状态',
            'is_help'=>'类型'
        ];
    }


}
