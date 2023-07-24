<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelSpot[]|\Cake\Collection\CollectionInterface $travelSpots
 */
?>
<div class="travelSpots index content">
    <?= $this->Html->link(__('New Travel Spot'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Travel Spots') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('plan_id') ?></th>
                    <th><?= $this->Paginator->sort('spot_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($travelSpots as $travelSpot): ?>
                <tr>
                    <td><?= $this->Number->format($travelSpot->id) ?></td>
                    <td><?= $travelSpot->has('plan') ? $this->Html->link($travelSpot->plan->id, ['controller' => 'Plans', 'action' => 'view', $travelSpot->plan->id]) : '' ?></td>
                    <td><?= h($travelSpot->spot_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $travelSpot->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $travelSpot->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelSpot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelSpot->id)]) ?>
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
