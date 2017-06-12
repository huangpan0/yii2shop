<?php
use yii\web\JsExpression;
$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($Bank,'name')->textInput();
echo $form->field($Bank,'intro')->textarea();
echo \yii\bootstrap\Html::fileInput('test',null,['id'=>'test']);
echo \xj\uploadify\Uploadify::widget([
    'url' => yii\helpers\Url::to(['s-upload']),
    'id' => 'test',
    'csrf' => true,
    'renderTag' => false,
    'jsOptions' => [
        'width' => 120,
        'height' => 40,
        'onUploadError' => new JsExpression(<<<EOF
function(file, errorCode, errorMsg, errorString) {
    console.log('The file ' + file.name + ' could not be uploaded: ' + errorString + errorCode + errorMsg);
}
EOF
        ),
        'onUploadSuccess' => new JsExpression(<<<EOF
function(file, data, response) {
    data = JSON.parse(data);
    if (data.error) {
        console.log(data.msg);
    } else {
        console.log(data.fileUrl);
        $("#img_logo").attr("src","date.fileUrl").show();
        $("#img_logo").val("data.filUrl");
    }
}
EOF
        ),
    ]
]);
if($Bank->logo){
    echo \yii\helpers\Html::img('@web/'.$Bank->logo);
}else{
    echo yii\helpers\Html::img('',['style'=>'display:none','id'=>'img_logo',['width'=>100]]);
}

echo $form->field($Bank,'sort')->textInput();
echo    $form->field($Bank,'status')->radioList([1=>'上线',2=>'下线']);
echo \yii\bootstrap\Html::submitButton('上线',['class'=>'btn btn-info']);
$form=\yii\bootstrap\ActiveForm::end();
