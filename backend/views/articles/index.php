<table class="table table-striped table-hover" style="" border="1px">
    <?=\yii\bootstrap\Html::a('添加',['articles/add'])?>
    <tr>

        <td>id</td>
        <td>名称</td>
        <td>简介</td>
        <td>排序</td>

        <td>文章详情id</td>
        <td>创建时间</td>
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
            <td><?=$articles->article_id?></td>
            <td><?=$articles->create_time?></td>

            <td><?=\backend\models\Bank::$stance[$articles->status]?></td>

            <td><?=\yii\bootstrap\Html::a('修改',['articles/edit','id'=>$articles->id],['class'=>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a('删除',['articles/delete','id'=>$articles->id],['class'=>'btn btn-danger'])?>
                <?=\yii\bootstrap\Html::a('详情',['detail/index','article_id'=>$articles->article_id],['class'=>'btn btn-danger'])?></td>
        </tr>
    <?php endforeach ;?>
</table>