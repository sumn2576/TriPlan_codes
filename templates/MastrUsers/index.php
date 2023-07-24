<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MastrUser[]|\Cake\Collection\CollectionInterface $mastrUsers
 */
?>
<div class="mastrUsers index content">
    <?= $this->Html->link(__('New Mastr User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mastr Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('mail') ?></th>
                    <th><?= $this->Paginator->sort('password_code') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mastrUsers as $mastrUser): ?>
                <tr>
                    <td><?= $this->Number->format($mastrUser->id) ?></td>
                    <td><?= h($mastrUser->mail) ?></td>
                    <td><?= h($mastrUser->password_code) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $mastrUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mastrUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mastrUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mastrUser->id)]) ?>
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
