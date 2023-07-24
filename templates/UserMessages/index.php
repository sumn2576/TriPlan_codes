<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usermessage[]|\Cake\Collection\CollectionInterface $usermessages
 */
?>
<div class="usermessages index content">
    <?= $this->Html->link(__('New Usermessage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usermessages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('day') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usermessages as $usermessage): ?>
                <tr>
                    <td><?= $this->Number->format($usermessage->id) ?></td>
                    <td><?= $usermessage->has('user') ? $this->Html->link($usermessage->user->id, ['controller' => 'Users', 'action' => 'view', $usermessage->user->id]) : '' ?></td>
                    <td><?= h($usermessage->title) ?></td>
                    <td><?= h($usermessage->contact) ?></td>
                    <td><?= h($usermessage->day) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usermessage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usermessage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usermessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usermessage->id)]) ?>
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
