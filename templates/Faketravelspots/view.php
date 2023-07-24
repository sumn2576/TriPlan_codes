<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faketravelspot $faketravelspot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Faketravelspot'), ['action' => 'edit', $faketravelspot->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Faketravelspot'), ['action' => 'delete', $faketravelspot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faketravelspot->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Faketravelspots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Faketravelspot'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="faketravelspots view content">
            <h3><?= h($faketravelspot->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fake Plan') ?></th>
                    <td><?= $faketravelspot->has('fake_plan') ? $this->Html->link($faketravelspot->fake_plan->id, ['controller' => 'Fakeplans', 'action' => 'view', $faketravelspot->fake_plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Spot Name') ?></th>
                    <td><?= h($faketravelspot->spot_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($faketravelspot->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
