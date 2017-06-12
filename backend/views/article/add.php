<?php
$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($article,'name')->textInput();
echo $form->field($article,'intro')->textInput();
echo $form->field($article,'sort')->textInput();
echo $form->field($article,'status')->textInput();

echo $form->field($article,'is_help')->textInput();
echo \yii\bootstrap\Html::submitButton('提交',['class'=>'btn btn-info']);
$form=\yii\bootstrap\ActiveForm::end();