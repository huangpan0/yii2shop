<?php
namespace backend\controllers;

use backend\models\Bank;
use crazyfd\qiniu\Qiniu;
use xj\uploadify\UploadAction;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\Request;



class BankController extends Controller{
    public function actionIndex(){
        $Bank=Bank::find()->all();
//        $page=new Pagination([
//            'totalCount'=>'',
//            'defaultPageSize'=>2
//
//        ]);

       return $this->render('index',['Bank'=>$Bank]);
    }
    //���
    public function actionAdd(){
        $Bank=new Bank();
        $request=new Request();
        if($request->isPost){
            $Bank->load($request->post());
//            $Bank->imgfile=UploadedFile::getInstance($Bank,'imgfile');
            if($Bank->validate()){
//                $file='/image/'.uniqid().'.'.$Bank->imgfile->extension;
//                $Bank->imgfile->saveAs(\yii::getAlias('@webroot').$file,false);
//             $Bank->logo=$file;
                $Bank->save();
                //\yii::$app->session->getFlash('seccess','��ӳɹ�');

              return  $this->redirect(['bank/index']);
            }
        }
        return $this->render('add',['Bank'=>$Bank]);
    }
    //�޸�
    public function actionEdit($id){
        $Bank=Bank::findOne(['id'=>$id]);
        $request=new Request();
        if($request->isPost){
            $Bank->load($request->post());
            if($Bank->validate()){
                $Bank->save();
                return  $this->redirect(['bank/index']);
            }
        }
        return $this->render('add',['Bank'=>$Bank]);
    }
    //ɾ��
    public function actionDelete($id){
        $Bank=Bank::findOne(['id'=>$id]);
        $Bank->delete();
        $this->redirect('bank/index');
    }
    public function actions()
    {
        return [
            's-upload' => [
                'class' => UploadAction::className(),
                'basePath' => '@webroot/upload',
                'baseUrl' => '@web/upload',
                'enableCsrf' => true, // default
                'postFieldName' => 'Filedata', // default
                //BEGIN METHOD
                //'format' => [$this, 'methodName'],
                //END METHOD
                //BEGIN CLOSURE BY-HASH
                'overwriteIfExist' => true,
                'format' => function (UploadAction $action) {

                    $fileext = $action->uploadfile->getExtension();

                    $filename = sha1_file($action->uploadfile->tempName);
                    return "{$filename}.{$fileext}";
                },
                //END CLOSURE BY-HASH
                //BEGIN CLOSURE BY TIME
                'format' => function (UploadAction $action) {
                    $fileext = $action->uploadfile->getExtension();
                    $filehash = sha1(uniqid() . time());
                    $p1 = substr($filehash, 0, 2);
                    $p2 = substr($filehash, 2, 2);
                    return "{$p1}/{$p2}/{$filehash}.{$fileext}";
                },
                //END CLOSURE BY TIME
                'validateOptions' => [
                    'extensions' => ['jpg', 'png'],
                    'maxSize' => 1 * 1024 * 1024, //file size
                ],
                'beforeValidate' => function (UploadAction $action) {
                    //throw new Exception('test error');
                },
                'afterValidate' => function (UploadAction $action) {
                },
                'beforeSave' => function (UploadAction $action) {
                },
                'afterSave' => function (UploadAction $action) {
                    $img=$action->getWebUrl();
                    $qiniu=\yii::$app->qiniu;
                    $qiniu->uploalAlias(\yii::getAlias('@webroot').$img,$img);
                    $url=$qiniu->getLink($img);
                    $action->output['fileUrl']=$url;
                   $action->getFilename(); // "image/yyyymmddtimerand.jpg"
                    $action->getWebUrl(); //  "baseUrl + filename, /upload/image/yyyymmddtimerand.jpg"
                    $action->getSavePath(); // "/var/www/htdocs/upload/image/yyyymmddtimerand.jpg"
                },
            ],
        ];

    }

    public function actionTest(){
        $ak = 'SRgwVkKEXjr_dcxY6go4bHGU2oOPnphQiUWOljnw';
        $sk = '8B6wMJZ9MPF-znTJKgLMNNkKVJkmlyfSDGPbNhK6';
        $domain = 'or9z61g1v.bkt.clouddn.com';
        $bucket = 'php2017';
        $qiniu = new Qiniu($ak, $sk,$domain, $bucket);
        $key ='timg.jpg';
        $filename=\yii::getAlias('@webroot').'/image/timg.jpg';
        $re=$qiniu->uploadFile($filename,$key);
        var_dump($re);
        $url = $qiniu->getLink($filename);
    }

}
