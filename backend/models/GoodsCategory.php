<?php
namespace backend\models;
use creocoder\nestedsets\NestedSetsBehavior;
use yii\db\ActiveRecord;


class GoodsCategory extends ActiveRecord
{
    public function rules(){
        return [
            [['name','into','parent_id'],'required'],
             [['tree','lft','rgt','depth'],'integer'],
            ['name','unique']
        ];
    }
    public function attributeLabels(){
        return [
            'tree'=>'',
            'lft'=>'',
            'rgt'=>'',
            'depth'=>'',
            'parent_id'=>'',
            'name'=>'名称',
            'intro'=>'简介',

        ];
    }



    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                //
                 'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new GoodsCategoryQuery(get_called_class());
    }
}