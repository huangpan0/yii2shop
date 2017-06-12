<table class="table table-striped table-hover" style="" border="1px">

    <tr>

        <td>id</td>
        <td>名称</td>
        <td>简介</td>
        <td>父id</td>
        <td>操作</td>

    </tr>
    <?php
    foreach ($goodscategory as $goodscategorys) : ?>
        <tr>
            <td><?=$goods_categorys->id?></td>
            <td><?=$goods_categorys->name?></td>
            <td><?=$goods_categorys->intro?></td>
            <td><?=$goods_categorys->parent_id?></td>
            <td><?=\yii\bootstrap\Html::a('修改',['goodscategorys/edit','id'=>$goodscategorys->id],['class'=>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a('删除',['goodscategorys/delete','id'=>$goodscategorys->id],['class'=>'btn btn-danger'])?></td>
        </tr>
    <?php endforeach ;?>
</table>