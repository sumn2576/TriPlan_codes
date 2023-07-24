<!--descfavorite.php-->

<h3>プラン詳細</h3>
<br>

<?php

//フォームの作成
echo $this->Form->create();

//戻るボタン
// echo $this->Html->link('戻る', ['action' => 'mypage'], ['class' => 'button', 'style']);

//改行
echo ('<br>');
echo ('<br>');

//フォームの終了
echo $this->Form->end();

?>

<!--プラン-->

<br>



<div>
    <?php foreach ($plans as $plan) { ?>
            <table frame="hsides">
                <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>地域</th>
                        <th>画像</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= h($plan->plan_name) ?></td>
                        <td><?= h($plan->rural) ?></td>
                        <td><?php echo $this->Html->image($plan->image_pass, array('width' => '300', 'height' => '200')) ?></td>
                    </tr>
                </tbody>

                <table frame="hsides">
                <thead>
                    <tr>
                        <th>タグ :</th>
                        <?php foreach ($tag as $tag) { ?>
                            <th><?= h($tag->travel_tagname) ?></th>
                        <?php } ?>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>観光地</th>
                        <th>画像</th>
                        <?php foreach ($spot as $spot) { ?>    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= h($spot->spot_name) ?></td>
                        <td><?php echo $this->Html->image($spot->image, array('width' => '100', 'height' => '100')) ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
                
                <table frame="hsides">
                <thead>
                        

                        <tr>
                            <th><?= $this->Html->link(__('ユーザ画面'), ['action' => 'other', $plan->user->id], ['class' => ['user_pos', 'button']])?></th>
                        </tr>

                        <tr>
                            <th><?= $this->Html->link(__('コメント'), ['action' => 'valucomment', $plan->id], ['class' => ['comment', 'button']])?>
                        </tr>
                </thead>
            </table>
    <?php }
    
    ?>
    <br>
    <br>
</div>