<?php
namespace backend\controllers;

use backend\models\Article;
use yii\web\Controller;
use yii\web\Request;
class ArticleController extends Controller{

    //首页
    public function actionIndex(){
        $article=Article::find()->all();
        return $this->render('index',['article'=>$article]);
    }
    //添加
    public function actionAdd(){
        $article=new Article();
        $request=new Request();
        if($request->isPost){
            $article->load($request->post());
            if($article->validate()){
                $article->save();
              return  $this->redirect(['article/index']);
            }
        }
        return $this->render('add',['article'=>$article]);
    }//修改
    public function actionEdit($id){
        $article=Article::findOne(['id'=>$id]);
        $request=new Request();
        if($request->isPost){
            $article->load($request->post());
            if($article->validate()){

                $article->save();
                return  $this->redirect(['article/index']);
            }
        }
        return $this->render('add',['article'=>$article]);
    }
    //删除
    public function actionDelete($id){
        $article=Article::findOne(['id'=>$id]);
        $article->delete();
        return $this->redirect(['article/index']);
    }


}