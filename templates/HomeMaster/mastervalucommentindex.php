<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ValuComment[]|\Cake\Collection\CollectionInterface $valuComments
 */
?>
<div class="valuComments index content">


    <?= $msg ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->input('find'); ?>
        <?= $this->Form->button('Submit') ?>
        <?= $this->Form->end() ?>
    </fieldset>




    <h3><?= __('Valu Comments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('plan_id') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('valu') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('impression') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($valuComments as $valuComment) : ?>
                    <tr>
                        <td><?= $valuComment->has('user') ? $this->Html->link($valuComment->user->id, ['controller' => 'Users', 'action' => 'view', $valuComment->user->id]) : '' ?></td>
                        <td><?= $valuComment->has('plan') ? $this->Html->link($valuComment->plan->id, ['controller' => 'Plans', 'action' => 'view', $valuComment->plan->id]) : '' ?></td>
                        <td><?= $this->Number->format($valuComment->id) ?></td>
                        <td><?= $this->Number->format($valuComment->valu) ?></td>
                        <td><?= h($valuComment->created) ?></td>
                        <td><?= h($valuComment->impression) ?></td>
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $valuComment->id]) ?> -->
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'mastervalucommentindexdelete', $valuComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuComment->id)]) ?>
                        </td>
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
    <?php
    echo $this->Html->link(
        'ホーム画面へ',             //ボタンの中の文
        ['action' => 'index'], //ボタンのリンク先
        ['class' => 'button']
    );
    ?>
</div>