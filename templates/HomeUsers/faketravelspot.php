<?php

/**
 * @var \App\View\AppView $this
 */
?>
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
    <div class="column-responsive column-80">
        <div class="traveltags form content">
            <?= $this->Form->create($fakeTravelSpot, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('スポットの追加') ?></legend>
                <?php
                echo $this->Form->control('fake_plan_id', ['type' => 'hidden', 'value' => $fakeTravelSpot->fake_plan_id]);
                echo $this->Form->control('spot_name');
                echo $this->Form->label('画像');
                echo $this->Form->file('image');
                echo '<br>';
                echo $this->Form->button(__('スポット追加'));
                if ($number != 0) {
                    echo $this->Html->link(
                        'タグの追加へ',             //ボタンの中の文
                        ['action' => 'faketraveltag', $fakeTravelSpot->fake_plan_id], //ボタンのリンク先
                        ['class' => 'button']
                    );
                } else {
                    echo $this->Form->label('最低一つのスポットの追加が必要です');
                }


                ?>
            </fieldset>
            <!-- タグ一覧開始 -->
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('スポット名') ?></th>
                            <th><?= $this->Paginator->sort('画像') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($receivedSpots as $traveltag) : ?>
                            <tr>
                                <td><?= h($traveltag->spot_name) ?></td>
                                <td><?php echo $this->Html->image($traveltag->image, array('width' => '100', 'height' => '100')) ?></td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__('削除'), ['action' => 'faketravelspotdelete', $traveltag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traveltag->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- タグ一覧終了 -->
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>