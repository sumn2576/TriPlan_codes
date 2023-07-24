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

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('ホーム'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('プラン検索'), ['action' => 'plan_search'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('プラン作成'), ['action' => 'makeplan'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-90">
        <div class="userMessages form content">

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

                            <table frame="hside">
                                <!-- <table border="1"> -->
                                <thead>
                                    <tr>
                                        <th>観光地</th>
                                        <th>画像</th>
                                        <th>観光地</th>
                                        <th>画像</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0 ?>
                                    <tr>
                                        <?php foreach ($spot as $spot) { ?>
                                            <td><?= h($spot->spot_name) ?></td>
                                            <td><?php echo $this->Html->image($spot->image, array('width' => '180', 'height' => '150')) ?></td>
                                            <?php if ($i % 2 == 1) {
                                                echo "</tr>";
                                            } ?>
                                            <?php $i++ ?>
                                        <?php } ?>


                                </tbody>

                                <table frame="hsides">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Form->postlink(
                                                    'お気に入り登録',             //ボタンの中の文
                                                    ['action' => 'favorite', $plan->id, $plan->user->id], //ボタンのリンク先   いろんな戻り先があるがとりあえずホーム画面に遷移
                                                    ['confirm' => __('お気に入り登録をしますか'), $plan->id, $plan->user->id],
                                                    ['class' => ['button']]
                                                );     ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th><?= $this->Form->postlink(
                                                    'お気に入り解除',
                                                    ['action' => 'favdelete', $plan->id, $plan->user->id], //ボタンのリンク先   いろんな戻り先があるがとりあえずホーム画面に遷移
                                                    ['confirm' => __('お気に入り登録を解除しますか'), $plan->id, $plan->user->id],
                                                    ['class' => ['button']]
                                                );
                                                ?>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th><?= $this->Html->link(__('ユーザ画面'), ['action' => 'other', $plan->user->id], ['class' => ['user_pos', 'button']]) ?></th>
                                        </tr>

                                        <tr>
                                            <th><?= $this->Html->link(__('コメント'), ['action' => 'valucomment', $plan->id], ['class' => ['comment', 'button']]) ?>
                                        </tr>
                                    </thead>
                                </table>
                            <?php }

                            ?>
                            <br>
                            <br>
            </div>