<?php
$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($article,'name')->textInput();
echo $form->field($article,'intro')->textInput();
echo $form->field($article,'sort')->textInput();
echo $form->field($article,'article_id')->textInput();
echo $form->field($article,'status')->textInput();
//echo $form->field($article,'photo')->fileInput();
echo \yii\bootstrap\Html::submitButton('创建',['class'=>'btn btn-info']);
$form=\yii\bootstrap\ActiveForm::end();