<table class="table table-striped table-hover" style="" border="1px">
    <?=\yii\bootstrap\Html::a('添加',['bank/add'])?>
    <tr>

        <td>id</td>
        <td>名称</td>
        <td>简介</td>
        <td>排序</td>
        <td>状态</td>
        <td>LOGO图片</td>
        <td>操作</td>

    </tr>
    <?php
    foreach ($Bank as $Banks) : ?>
        <tr>
            <td><?=$Banks->id?></td>
            <td><?=$Banks->name?></td>
            <td><?=$Banks->intro?></td>
            <td><?=$Banks->sort?></td>
            <td><?=\backend\models\Bank::$stance[$Banks->status]?></td>
            <td><?=\yii\bootstrap\Html::img('@web'.$Banks->logo,['width'=>40])?></td>
            <td><?=\yii\bootstrap\Html::a('修改',['bank/edit','id'=>$Banks->id],['class'=>'btn btn-info'])?>
            <?=\yii\bootstrap\Html::a('删除',['bank/delete','id'=>$Banks->id],['class'=>'btn btn-danger'])?></td>
        </tr>
    <?php endforeach ;?>
</table>