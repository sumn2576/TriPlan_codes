<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favoriteitem[]|\Cake\Collection\CollectionInterface $favoriteitems
 */
?>
<div class="favoriteitems index content">
    <?= $this->Html->link(__('New Favoriteitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Favoriteitems') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('plan_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favoriteitems as $favoriteitem): ?>
                <tr>
                    <td><?= $this->Number->format($favoriteitem->id) ?></td>
                    <td><?= $favoriteitem->has('user') ? $this->Html->link($favoriteitem->user->id, ['controller' => 'Users', 'action' => 'view', $favoriteitem->user->id]) : '' ?></td>
                    <td><?= $favoriteitem->has('plan') ? $this->Html->link($favoriteitem->plan->id, ['controller' => 'Plans', 'action' => 'view', $favoriteitem->plan->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $favoriteitem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $favoriteitem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favoriteitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favoriteitem->id)]) ?>
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
