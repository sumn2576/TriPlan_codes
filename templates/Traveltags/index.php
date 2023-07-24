<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelTag[]|\Cake\Collection\CollectionInterface $travelTags
 */
?>
<div class="travelTags index content">
    <?= $this->Html->link(__('New Travel Tag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Travel Tags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('plan_id') ?></th>
                    <th><?= $this->Paginator->sort('travel_tagname') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($travelTags as $travelTag): ?>
                <tr>
                    <td><?= $this->Number->format($travelTag->id) ?></td>
                    <td><?= $travelTag->has('plan') ? $this->Html->link($travelTag->plan->id, ['controller' => 'Plans', 'action' => 'view', $travelTag->plan->id]) : '' ?></td>
                    <td><?= h($travelTag->travel_tagname) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $travelTag->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $travelTag->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelTag->id)]) ?>
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
