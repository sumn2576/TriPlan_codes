<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValuComment $valuComment
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
            <?= $this->Html->link(__('作品ページへ戻る'), ['action' => 'plandetail',$id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

    <div class="column-responsive column-80">
        <div class="valuComments form content">
            <?= $this->Form->create($valuComment) ?>
            <fieldset>

                <legend><?= __('感想欄') ?></legend>
                <?php
                echo $this->Form->label('評価値');
                echo $this->Form->select(
                    'valu',
                    array(
                        '1' => '1(最低評価)',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5(最高評価)'
                    ),
                    array(
                        'empty' => "評価を選んでください",
                    )
                );
                echo $this->Form->control('impression', ['rows' => '2', 'label' => '感想']);
                ?>
                <?= $this->Form->button(__('投稿')) ?>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>

                                <th><?= $this->Paginator->sort('user_name', ['label' => '記入者']) ?></th>
                                <th><?= $this->Paginator->sort('valu', ['label' => '評価値']) ?></th>
                                <th><?= $this->Paginator->sort('impression', ['label' => '感想']) ?></th>
                                <!-- <th>記入者</th>
            <th>評価値</th>
            <th>感想</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($valuCommentlists as $valuCommentlist) : ?>
                                <tr>
                                    <td><?= h($valuCommentlist->user->user_name) ?></td>
                                    <td><?= h($valuCommentlist->valu) ?></td>
                                    <td><?= h($valuCommentlist->impression) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </div>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>

</div>