<!--index.php-->

<!--READ CSS-->
<?php
echo $this->Html->css(['userhome']);
?>

<!--HEADER-->
<div id="header" style="background-color: #D33C43; position: relative; top: 0; left:0px;">
    <h1>HOME</h1>
</div>

<!--MENU-->
<div id="menu">
    <br>
    <br>
    <?php echo $this->Html->link('　マイページ　', ['action' => 'mypage'], ['class' => 'button', 'style']); ?>
    <br>
    <br>
    <?php echo $this->Html->link('　プラン検索　', ['action' => 'plan_search'], ['class' => 'button', 'style']); ?>
    <br>
    <br>
    <?php echo $this->Html->link('　プラン作成　', ['action' => 'makeplan'], ['class' => 'button', 'style']); ?>
    <br>
    <br>
    <?php echo $this->Html->link('　ランキング　', ['action' => 'ranking'], ['class' => 'button', 'style']); ?>
    <br>
    <br>
    <?php echo $this->Html->link('　ログアウト　', ['action' => 'logout'], ['class' => 'button', 'style']); ?>
    <br>
    <br>
    <?php 
    if($role=='admin'){
    echo $this->Html->link('　管理者用ホームへ　', ['controller' => 'HomeMaster', 'action' => 'index'], ['class' => 'button', 'style']); 
    }
    ?>
</div>

<!--NEW PLAN-->
<div id="new">
    <div id="new_header">NEW PLAN</div>
    <ul id="new_body">
        <li>
            <?php foreach ($news as $new) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>　　USER</th>
                            <th>　　PLAN</th>
                            <th>　　RURAL</th>
                            <th>　　DAY</th>
                            <th>　　PICTURE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= h($new->user->user_name) ?></td>
                            <td><?= h($new->plan_name) ?></td>
                            <td><?= h($new->rural) ?></td>
                            <td><?= h($new->day) ?></td>
                            <td><?php echo $this->Html->image($new->image_pass, array('width' => 140, 'height' => 100)) ?></td>
                            <!--編集-->
                            <td><?= $this->Html->link('詳細', ['action' => 'plandetail', $new->id]) ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            <?php endforeach; ?>
        </li>
    </ul>
</div>