<?php
namespace \backend\controllers;


class GoodsController extends \yii\console\Controller{
    public function actionIndex(){
        $goods=\backend\models\Goods::find()->all();
        return $this->render('index',['goods'=>$goods]);

    }
    public function actionAdd(){
        $goods=new \backend\models\Goods();
        $request=new Request();
    }

}