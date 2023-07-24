<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Masteruser[]|\Cake\Collection\CollectionInterface $masterusers
 */
?>
<div class="masterusers index content">
    <?= $this->Html->link(__('New Masteruser'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Masterusers') ?></h3>
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
                <?php foreach ($masterusers as $masteruser): ?>
                <tr>
                    <td><?= $this->Number->format($masteruser->id) ?></td>
                    <td><?= h($masteruser->mail) ?></td>
                    <td><?= h($masteruser->password_code) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $masteruser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masteruser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masteruser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masteruser->id)]) ?>
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
