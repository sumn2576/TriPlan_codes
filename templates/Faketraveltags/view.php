<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faketraveltag $faketraveltag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Faketraveltag'), ['action' => 'edit', $faketraveltag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Faketraveltag'), ['action' => 'delete', $faketraveltag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faketraveltag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Faketraveltags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Faketraveltag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="faketraveltags view content">
            <h3><?= h($faketraveltag->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fake Plan') ?></th>
                    <td><?= $faketraveltag->has('fake_plan') ? $this->Html->link($faketraveltag->fake_plan->id, ['controller' => 'Fakeplans', 'action' => 'view', $faketraveltag->fake_plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Travel Tagname') ?></th>
                    <td><?= h($faketraveltag->travel_tagname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($faketraveltag->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
