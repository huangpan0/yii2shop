<table class="table table-striped table-hover" style="" border="1px">
    <?=\yii\bootstrap\Html::a('添加',['article/add'])?>
    <tr>

        <td>id</td>
        <td>名称</td>
        <td>简介</td>
        <td>排序</td>
        <td>状态</td>
        <td>操作</td>

    </tr>
    <?php
    foreach ($article as $articles) : ?>


        <tr>
            <td><?=$articles->id?></td>
            <td><?=$articles->name?></td>
            <td><?=$articles->intro?></td>
            <td><?=$articles->sort?></td>
            <td><?=\backend\models\Bank::$stance[$articles->status]?></td>
            <td><?=\yii\bootstrap\Html::a('修改',['article/edit','id'=>$articles->id],['class'=>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a('删除',['article/delete','id'=>$articles->id],['class'=>'btn btn-danger'])?>
                </td>
        </tr>
    <?php endforeach ;?>
</table>