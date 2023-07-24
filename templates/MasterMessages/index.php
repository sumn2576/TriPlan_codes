<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mastermessage[]|\Cake\Collection\CollectionInterface $mastermessages
 */
?>
<div class="mastermessages index content">
    <?= $this->Html->link(__('New Mastermessage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mastermessages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('master_id') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('day') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mastermessages as $mastermessage): ?>
                <tr>
                    <td><?= $this->Number->format($mastermessage->id) ?></td>
                    <td><?= $mastermessage->has('master_user') ? $this->Html->link($mastermessage->master_user->id, ['controller' => 'MasterUsers', 'action' => 'view', $mastermessage->master_user->id]) : '' ?></td>
                    <td><?= h($mastermessage->contact) ?></td>
                    <td><?= h($mastermessage->day) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $mastermessage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mastermessage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mastermessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mastermessage->id)]) ?>
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
