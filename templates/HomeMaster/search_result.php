<h1>プラン検索結果</h1>
<div class="sortable-table">

<table>
    <tr>
        <th>県名</th>
        <th>プラン名</th>
        <th>投稿日</th>
        <th>ユーザ名</th>
        <th>詳細</th>
    </tr>
<?php
    foreach($pre as $pres){
        if($tag->count()!=0){
            foreach($tag as $tags){
                if($pres->id != $tags->plan_id){
                    continue 1;
                }
?>
        <tr>
            <td><?=h($pres->rural)?></td>
            <td><?=h($pres->plan_name)?></td>
            <td><?=h($pres->day)?></td>
            <td><?=h($pres->user->user_name)?></td>
            <td><?= $this->Html->link('詳細', ['action' => 'plandetailm', $pres->id]) ?></td>
        </tr>

<?php
            }  
        }else{
?>
        <tr>
            <td><?=h($pres->rural)?></td>
            <td><?=h($pres->plan_name)?></td>
            <td><?=h($pres->day)?></td>
            <td><?=h($pres->user->user_name)?></td>
            <td><?= $this->Html->link('詳細', ['action' => 'plandetailm', $pres->id]) ?></td>
        </tr>

<?php   
        }
    }
?>

</table>
</div>


<?php
// 戻るボタン
echo $this->Html->link(
    '戻る',             //ボタンの中の文
    ['action' => 'planacount_search'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 90%; top: 60px']
);


/* 降順ボタン
echo $this->Html->link(
    '降順',             //ボタンの中の文
    ['action' => 'searchResultd'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 90%; top: 120px']
);
*/
?>