<h1>アカウント検索結果</h1>
<div class="sortable-table">

<table>
    <tr>
        <th>ユーザ名</th>
        <th>詳細</th>
    </tr>
<?php
    foreach($acount as $acounts){
?>
<tr>
    <td><?=h($acounts->user_name)?></td>
    <td><?= $this->Html->link('詳細', ['action' => 'akaunto', $acounts->id]) ?></td>
</tr>
<?php
}
?>

</table>
</div>

<?php
// 戻るボタン
    echo $this->Html->link('戻る',['action' => 'planacount_search'],['class' => 'button', 'style' => 'position: absolute; left: 70%; top: 60px']);
?>
