<?php
/**
 * @var $this \yii\web\view
 */
$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($category,'name')->textInput();
echo $form->field($category,'intro')->textInput();
echo '<ul id="treeDemo" class="ztree"></ul>';
echo $form->field($category,'parent_id')->dropDownList($option);
//echo $form->field($article,'photo')->fileInput();
echo \yii\bootstrap\Html::submitButton('创建',['class'=>'btn btn-info']);
$form=\yii\bootstrap\ActiveForm::end();


//<link rel="stylesheet" href="zTree_v3-master/css/zTreeStyle/zTreeStyle.css" type="text/css">
//    <script type="text/javascript" src="zTree_v3-master/js/jquery-1.4.4.min.js"></script>
//    <script type="text/javascript" src="zTree_v3-master/js/jquery.ztree.core.js"></script>

$this->registerCssFile('@web/zTreeStyle/zTreeStyle.css');
$this->registerJsFile('@web/jquery.ztree.core.js',['depends'=>\yii\web\JqueryAsset::className()]);
$node=\yii\helpers\Json::encode($all);
$js=new \yii\web\JsExpression(
    <<<JS
     var zTreeObj;
        // zTree 的参数配置，深入使用请参考 API 文档（setting 配置详解）
        var setting = {
    data: {
        simpleData: {
            enable: true,
                    idKey: "id",
                    pIdKey: "parent_id",
                    rootPId: 0
                }
    },
        callback: {
		onClick: function(event, treeId, treeNode) {
    //alert(treeNode.id);
    $('#goodscategory-parent_id').val(treeNode.id);

}

};
        // zTree 的数据属性，深入使用请参考 API 文档（zTreeNode 节点数据详解）
        var nodes = {$node};
$(document).ready(function(){
zTreeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
var node=zTreeObj.getNodeByParam("id",$('#goodscategory-parent_id').val(),null);
zTreeObj.selectNode(node);
});
JS
);

$this->registerJs($js);
?>
<!--<SCRIPT LANGUAGE="JavaScript">-->
<!---->
<!---->
<!--</SCRIPT>-->
<!--</HEAD>-->
<!--<BODY>-->
<!--<div>-->
<!---->
<!--    </div>-->
<!--    </BODY>-->
<!--    </HTML>-->
