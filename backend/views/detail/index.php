
    <head>
        <title></title>
        <meta charset="UTF-8"
    </head>
    <body>
    <table>
    <tr>
        <td>id</td>
        <td>内容</td>
    </tr>
    <?php foreach ($detail as $datails):?>
    <tr>

        <td><?=$datails->content?></td>
    </tr>
        <?php endforeach ;?>
    </table>
     </body>
