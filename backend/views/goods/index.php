<table class="table table-striped table-hover" style="" border="1px">

    <tr>

        <td>id</td>
        <td>名称</td>
        <td>库存</td>
        <td>标志</td>
        <td>分类Id</td>
        <td>品牌分类ID</td>
        <td>市场价格</td>
        <td>库存</td>
        <td>商品价格</td>

    </tr>
    <?php
    foreach ($goods as $good) : ?>
        <tr>
            <td><?=$good->id?></td>
            <td><?=$good->name?></td>
            <td><?=$good->sn?></td>
            <td><?=$good->logo?></td>
            <td><?=$good->goods_category_id?></td>
            <td><?=$good->brank_id?></td>
            <td><?=$good->maket_price?></td>
            <td><?=$good->stock?></td>
            <td><?=$good->shop_price?></td>
            <td><?=\yii\bootstrap\Html::a('修改',['goodscategorys/edit','id'=>$good->id],['class'=>'btn btn-info'])?>
                <?=\yii\bootstrap\Html::a('删除',['goodscategorys/delete','id'=>$good->id],['class'=>'btn btn-danger'])?></td>
        </tr>
    <?php endforeach ;?>
</table>