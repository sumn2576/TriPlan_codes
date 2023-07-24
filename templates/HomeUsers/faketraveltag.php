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
            <?= $this->Form->create($fakeTravelTag) ?>
            <fieldset>
                <legend><?= __('タグの追加') ?></legend>
                <?php
                echo $this->Form->control('fake_plan_id', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->control('travel_tagname');
                echo $this->Form->button(__('タグ追加'));
                if ($number != 0) {
                    echo $this->Html->link(
                        '確認画面へ',             //ボタンの中の文
                        ['action' => 'makeplansubmit', $fakeTravelTag->fake_plan_id], //ボタンのリンク先
                        ['class' => 'button']
                    );
                } else {
                    echo $this->Form->label('最低一つのタグの追加が必要です');
                }
                ?>
            </fieldset>
            <!-- タグ一覧開始 -->
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('タグ名') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($receivedTags as $traveltag) : ?>
                            <tr>
                                <td><?= h($traveltag->travel_tagname) ?></td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__('削除'), ['action' => 'faketraveltagdelete', $traveltag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traveltag->id)]) ?>
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