<?php
// CakePHP
//フォームの作成
echo $this->Form->create($user);


echo $this->Html->link(
    'パスワード再設定',             //ボタンの中の文
    ['action' => 'repass'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 0%; top: 100px']
);
echo $this->Html->link(
    'メールアドレス再設定',             //ボタンの中の文
    ['action' => 'remail'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 0%; top: 150px']
);
echo $this->Html->link(
    'ログアウト',             //ボタンの中の文
    ['action' => 'logout'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 0%; top: 200px']
);
// echo $this->Html->link(
//     'アカウント削除',             //ボタンの中の文
//     ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class' => 'button', 'style' => 'position: absolute; left: 0%; top: 250px']
// );  
?>
<?= $this->Form->create($user) ?>
<?= $this->Form->end() ?>
<?= $this->Form->postLink(
    __('アカウント削除'),
    ['action' => 'delete', $user->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'button', 'style' => 'position: absolute; left: 0%; top: 250px']
)
?>
<?php
// ここ
echo $this->Html->link(
    'マイページ',             //ボタンの中の文
    ['action' => 'mypage'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 0%; top: 0%']
);
?>