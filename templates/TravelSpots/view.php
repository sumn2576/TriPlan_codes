<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelSpot $travelSpot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Travel Spot'), ['action' => 'edit', $travelSpot->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Travel Spot'), ['action' => 'delete', $travelSpot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelSpot->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Travel Spots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Travel Spot'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="travelSpots view content">
            <h3><?= h($travelSpot->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Plan') ?></th>
                    <td><?= $travelSpot->has('plan') ? $this->Html->link($travelSpot->plan->id, ['controller' => 'Plans', 'action' => 'view', $travelSpot->plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Spot Name') ?></th>
                    <td><?= h($travelSpot->spot_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($travelSpot->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
