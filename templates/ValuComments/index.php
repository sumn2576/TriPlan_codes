<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Valucomment[]|\Cake\Collection\CollectionInterface $valucomments
 */
?>
<div class="valucomments index content">
    <?= $this->Html->link(__('New Valucomment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Valucomments') ?></h3>
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
                <?php foreach ($valucomments as $valucomment): ?>
                <tr>
                    <td><?= $valucomment->has('user') ? $this->Html->link($valucomment->user->id, ['controller' => 'Users', 'action' => 'view', $valucomment->user->id]) : '' ?></td>
                    <td><?= $valucomment->has('plan') ? $this->Html->link($valucomment->plan->id, ['controller' => 'Plans', 'action' => 'view', $valucomment->plan->id]) : '' ?></td>
                    <td><?= $this->Number->format($valucomment->id) ?></td>
                    <td><?= $this->Number->format($valucomment->valu) ?></td>
                    <td><?= h($valucomment->created) ?></td>
                    <td><?= h($valucomment->impression) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $valucomment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $valucomment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $valucomment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valucomment->id)]) ?>
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
</div>
