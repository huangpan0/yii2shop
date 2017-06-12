<?php
namespace backend\models;
use yii\db\ActiveRecord;

class Detail extends ActiveRecord{
    public function rules(){
        return [

            ['content','article_id','required']
        ];
    }
    public function getArticles(){
        return $this->hasOne(Articles::className(),['id'=>'article_id']);
    }

}
