<?php
namespace backend\controllers;


use backend\models\GoodsCategory;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\Request;

class GoodsCategoryController extends Controller{
    public function actionIndex(){
        //因为这里
        $all=GoodsCategory::find()->asArray()->all();
        return $this->renderPartial('ztree',['all'=>$all]);
    }
    public function actionAdd(){
            $category=new GoodsCategory();
        $request=new Request();
        if($request->isPost){
            $category->load($request->post());
            if($category->validate()){
                //如果是不是一级分类就执行这里
                if($category->parent_id){
                //寻找他的父级id;（如果他的parent_id==父id的id就找的了、
                   $parent=GoodsCategory::findOne(['id'=>$category->parent_id]);
                  //添加到上一级分类下面
                $category->perpendTo($parent);
                 //并且创建子目录
                }else{
                    //如果是一级分类就创建一个一级分类
                    $category->makeRoot();
                    //如果创建成功就保存到session中
                    \yii::$app->session->setFlash('success','添加成功');
                    return $this->redirect('goods-category/index');
                }
                $category->save();
            }
        }
        //获取所有分类选项
        $all=ArrayHelper::merge([['id'=>0,'name'=>'顶级分类','parent_id'=>0]],GoodsCategory::find()->asArray()->all());
        return $this->render('add',['category'=>$category,'option'=>$all]);
    }
    public function actionEdit($id){
        $category=GoodsCategory::findOne(['id'=>$id]);
        if($category==null){
            throw new NotFoundHttpException('分类不存在');
        }
        $request=new Request();
        if($request->isPost){
            $category->load($request->post());
            if($category->validate()){
                //如果是不是一级分类就执行这里
                if($category->parent_id){
                    //寻找他的父级id;（如果他的parent_id==父id的id就找的了、
                    $parent=GoodsCategory::findOne(['id'=>$category->parent_id]);
                    //添加到上一级分类下面
                    $category->perpendTo($parent);
                    //并且创建子目录
                }else{
                    //如果是一级分类就创建一个一级分类
                    $category->makeRoot();
                    //如果创建成功就保存到session中
                    \yii::$app->session->setFlash('success','添加成功');
                    return $this->redirect('goods-category/index');
                }
                $category->save();
            }
        }
        //获取所有分类选项
        $all=ArrayHelper::merge([['id'=>0,'name'=>'顶级分类','parent_id'=>0]],GoodsCategory::find()->asArray()->all());
        return $this->render('add',['category'=>$category,'option'=>$all]);
    }
}