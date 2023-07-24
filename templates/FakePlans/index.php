<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fakeplan[]|\Cake\Collection\CollectionInterface $fakeplans
 */
?>
<div class="fakeplans index content">
    <?= $this->Html->link(__('New Fakeplan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fakeplans') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('plan_name') ?></th>
                    <th><?= $this->Paginator->sort('rural') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fakeplans as $fakeplan): ?>
                <tr>
                    <td><?= $this->Number->format($fakeplan->id) ?></td>
                    <td><?= h($fakeplan->plan_name) ?></td>
                    <td><?= h($fakeplan->rural) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fakeplan->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fakeplan->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fakeplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fakeplan->id)]) ?>
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
