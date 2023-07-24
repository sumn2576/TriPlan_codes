<!--descmyself.php-->
<h1>自身のプラン</h1>
<!--プラン-->
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('お気に入りプラン'), ['action' => 'descfavorite'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('メッセージボックス'), ['action' => 'messagebox'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('お問い合わせ'), ['action' => 'messageadd'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('設定'), ['action' => 'setting'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('ホーム'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages form content">
            <div>
                <?php

                //フォームの作成
                echo $this->Form->create();

                //並び替えボタン
                echo $this->Html->link('日付昇順', ['action' => 'ascmyself'], ['class' => 'button', 'style']);
                echo ('　');
                echo $this->Html->link('日付降順', ['action' => 'descmyself'], ['class' => 'button', 'style']);

                //フォームの終了
                echo $this->Form->end();

                ?>
                <?php foreach ($myselfs as $myself) : ?>
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
                                <td><?= h($myself->user->user_name) ?></td>
                                <td><?= $this->Html->link($myself->plan_name, ['action' => 'plandetail', $myself->id]) ?></td>
                                <td><?= h($myself->rural) ?></td>
                                <td><?= h($myself->day) ?></td>
                                <td><?php echo $this->Html->image($myself->image_pass, array('width' => '300', 'height' => '200')) ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>