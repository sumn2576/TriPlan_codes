<!--adminhome.php-->

<!--READ CSS-->

<!--HEADER-->
<div id="header" style="background-color: #D33C43; position: relative; top: 0; left:0px;">
    <h1>Home</h1>
</div>

<!--MENU-->
<div id="menu">
    <br>
    <br>
    <?php echo $this->Html->link('　ログアウト　', ['action' => 'logout'], ['class' => 'button', 'style']); ?>
    <?php echo $this->Html->link('　アカウント追加　', ['action' => 'registrationm'], ['class' => 'button', 'style']); ?>
    <?php echo $this->Html->link('　プラン・アカウント検索　', ['action' => 'planacount_search'], ['class' => 'button', 'style']); ?>
    <?php echo $this->Html->link('　ランキング　', ['action' => 'ranking'], ['class' => 'button', 'style']); ?>
    <?php echo $this->Html->link('　評価・コメント一覧　', ['action' => 'mastervalucommentindex'], ['class' => 'button', 'style']); ?>
    <?php echo $this->Html->link('　利用者画面へ　', ['controller' => 'HomeUsers', 'action' => 'index'], ['class' => 'button', 'style']); ?>
</div>