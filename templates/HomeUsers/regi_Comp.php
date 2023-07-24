<h1>登録完了画面</h1>
<?php

//フォームの作成
echo $this->Form->create();

// OKボタン
echo $this->Html->link(
    'OK',             //ボタンの中の文
    ['action' => 'login'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 50%; top: 100%']     
);


//フォームの終了
echo $this->Form->end();

?>