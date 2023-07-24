<h3>送信完了</h3>
<table>
        <?php echo $this->Html->link(
        'マイページ',             //ボタンの中の文
        ['action' => 'index'], //ボタンのリンク先
        ['class' => 'button', 'style' => 'position: absolute; left: 10%; top: 100%']
    );  ?>
</table>