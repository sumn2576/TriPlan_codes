<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelTag $travelTag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Travel Tag'), ['action' => 'edit', $travelTag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Travel Tag'), ['action' => 'delete', $travelTag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelTag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Travel Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Travel Tag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="travelTags view content">
            <h3><?= h($travelTag->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Plan') ?></th>
                    <td><?= $travelTag->has('plan') ? $this->Html->link($travelTag->plan->id, ['controller' => 'Plans', 'action' => 'view', $travelTag->plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Travel Tagname') ?></th>
                    <td><?= h($travelTag->travel_tagname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($travelTag->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
