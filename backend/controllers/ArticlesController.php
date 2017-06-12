<?php
namespace backend\controllers;
//use backend\models\Article;
use backend\models\Articles;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;

class ArticlesController extends Controller
{
    public function actionIndex()
    {
        $article = Articles::find()->all();

        return $this->render('index', ['article' => $article]);
    }
    public function actionAdd()
    {
        $article = new Articles();
        $request = new Request();
        if ($request->isPost) {
            $article->load($request->post());
          // $article->imgfile=UploadedFile::getInstance($article->imgfile,false);
            if ($article->validate()) {
               // $file='/image/'.uniqid().'.'.$article->imgfile->extension;
               //$article->imgfile->saveAs(\yii::getAlias('@webroot').$file,false);
                //$article->photo=$file;

                $article->save();
                return $this->redirect(['articles/index']);
            }
        }
        return $this->render('add', ['article' => $article]);
    }
    public function actionEdit($id)
    {
        $article = Articles::findOne(['id' => $id]);
        $request = new Request();
        if ($request->isPost) {
            $article->load($request->post());
            if ($article->validate()) {
                $article->save();
                return $this->redirect(['articles/index']);
            }
        }
        return $this->render('add', ['article' => $article]);
    }
    public function actionDelete($id)
    {
        $article = Articles::findOne(['id' => $id]);
        $article->delete();
        return $this->redirect(['articles/index']);
    }
}

