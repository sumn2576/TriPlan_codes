<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan[]|\Cake\Collection\CollectionInterface $plans
 */
?>
<div class="plans index content">
    <?= $this->Html->link(__('New Plan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Plans') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('plan_name') ?></th>
                    <th><?= $this->Paginator->sort('rural') ?></th>
                    <th><?= $this->Paginator->sort('day') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($plans as $plan): ?>
                <tr>
                    <td><?= $plan->has('user') ? $this->Html->link($plan->user->id, ['controller' => 'Users', 'action' => 'view', $plan->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($plan->id) ?></td>
                    <td><?= h($plan->plan_name) ?></td>
                    <td><?= h($plan->rural) ?></td>
                    <td><?= h($plan->day) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $plan->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $plan->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $plan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plan->id)]) ?>
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
