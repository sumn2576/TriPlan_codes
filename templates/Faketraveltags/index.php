<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faketraveltag[]|\Cake\Collection\CollectionInterface $faketraveltags
 */
?>
<div class="faketraveltags index content">
    <?= $this->Html->link(__('New Faketraveltag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Faketraveltags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fake_plan_id') ?></th>
                    <th><?= $this->Paginator->sort('travel_tagname') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faketraveltags as $faketraveltag): ?>
                <tr>
                    <td><?= $this->Number->format($faketraveltag->id) ?></td>
                    <td><?= $faketraveltag->has('fake_plan') ? $this->Html->link($faketraveltag->fake_plan->id, ['controller' => 'Fakeplans', 'action' => 'view', $faketraveltag->fake_plan->id]) : '' ?></td>
                    <td><?= h($faketraveltag->travel_tagname) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $faketraveltag->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $faketraveltag->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $faketraveltag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faketraveltag->id)]) ?>
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
