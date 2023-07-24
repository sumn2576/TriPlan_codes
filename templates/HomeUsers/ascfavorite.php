<!--ascfavorite.php-->
<h1>お気に入りプラン</h1>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('メッセージボックス'), ['action' => 'messagebox'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('お問い合わせ'), ['action' => 'messageadd'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('設定'), ['action' => 'setting'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('ホーム'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages form content">
            <?= $this->Form->create() ?>
            <fieldset>

                <?php

                //フォームの作成
                echo $this->Form->create();

                //戻るボタン
                //echo $this->Html->link('戻る', ['action' => 'mypage'], ['class' => 'button', 'style']);

                //改行
                //echo ('<br>');
                //echo ('<br>');

                //並び替えボタン
                echo $this->Html->link('日付昇順', ['action' => 'ascfavorite'], ['class' => 'button', 'style']);
                echo ('　');
                echo $this->Html->link('日付降順', ['action' => 'descfavorite'], ['class' => 'button', 'style']);

                //フォームの終了
                echo $this->Form->end();

                ?>

                <!--プラン-->

                <br>

                <div>
                    <?php foreach ($favorites as $favorite) {
                        if ($auth_id == $favorite->user_id) {
                    ?>
                            <table frame="hsides">
                                <thead>
                                    <tr>
                                        <th>USER</th>
                                        <th>PLAN</th>
                                        <th>RURAL</th>
                                        <th>DAY</th>
                                        <th>PICTURE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= h($favorite->plan->user->user_name) ?></td>
                                        <td><?= h($favorite->plan->plan_name) ?></td>
                                        <td><?= h($favorite->plan->rural) ?></td>
                                        <td><?= h($favorite->plan->day) ?></td>
                                        <td><?php echo $this->Html->image($favorite->plan->image_pass, array('width' => '300', 'height' => '200')) ?></td>
                                        <td><?= $this->Html->link('詳細', ['action' => 'plandetail', $favorite->plan->id]) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                    <?php }
                    }
                    ?>
                    <br>
                    <br>
                </div>
            </fieldset>
        </div>
    </div>
</div>