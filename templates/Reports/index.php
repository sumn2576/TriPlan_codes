<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report[]|\Cake\Collection\CollectionInterface $reports
 */
?>
<div class="reports index content">
    <?= $this->Html->link(__('New Report'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reports') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('valu_comment_id') ?></th>
                    <th><?= $this->Paginator->sort('repoter') ?></th>
                    <th><?= $this->Paginator->sort('day') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?= $this->Number->format($report->id) ?></td>
                    <td><?= $report->has('user') ? $this->Html->link($report->user->id, ['controller' => 'Users', 'action' => 'view', $report->user->id]) : '' ?></td>
                    <td><?= $report->has('valu_comment') ? $this->Html->link($report->valu_comment->id, ['controller' => 'ValuComments', 'action' => 'view', $report->valu_comment->id]) : '' ?></td>
                    <td><?= $this->Number->format($report->repoter) ?></td>
                    <td><?= h($report->day) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $report->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $report->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?>
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
