<?php
namespace backend\controllers;
use backend\models\Detail;
use yii\web\Controller;
class DetailController extends Controller{
    public function actionIndex(){
        $Detail=Detail::find()->all();
        return $this->render('index',['detail'=>$Detail]);
    }
}