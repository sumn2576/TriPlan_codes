<?php
//フォームの作成
echo $this->Form->create();

//戻るボタン
echo $this->Form->button('戻る', ['onclick' => 'history.back()', 'type' => 'button']);

//改行
echo ('<br>');
echo ('<br>');

//並び替えボタン
// echo $this->Html->link('日付昇順', ['action' => 'ascfavorite'], ['class' => 'button', 'style']);
// echo ('　');
// echo $this->Html->link('日付降順', ['action' => 'descfavorite'], ['class' => 'button', 'style']);

//フォームの終了
echo $this->Form->end();

?>

<table>
    <thead>
        <tr>
            <th>記入者</th>
            <th>評価値</th>
            <th>感想</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($valuComments as $valuComment): ?>
        <tr>
            <td><?= $valuComment->user->user_name ?></td>
            <td><?= $valuComment->valu ?></td>
            <td><?= $valuComment->impression ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
