<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faketravelspot[]|\Cake\Collection\CollectionInterface $faketravelspots
 */
?>
<div class="faketravelspots index content">
    <?= $this->Html->link(__('New Faketravelspot'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Faketravelspots') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fake_plan_id') ?></th>
                    <th><?= $this->Paginator->sort('spot_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faketravelspots as $faketravelspot): ?>
                <tr>
                    <td><?= $this->Number->format($faketravelspot->id) ?></td>
                    <td><?= $faketravelspot->has('fake_plan') ? $this->Html->link($faketravelspot->fake_plan->id, ['controller' => 'Fakeplans', 'action' => 'view', $faketravelspot->fake_plan->id]) : '' ?></td>
                    <td><?= h($faketravelspot->spot_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $faketravelspot->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $faketravelspot->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $faketravelspot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faketravelspot->id)]) ?>
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
