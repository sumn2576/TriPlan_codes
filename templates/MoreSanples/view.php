<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoreSanple $moreSanple
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit More Sanple'), ['action' => 'edit', $moreSanple->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete More Sanple'), ['action' => 'delete', $moreSanple->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moreSanple->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List More Sanples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New More Sanple'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moreSanples view content">
            <h3><?= h($moreSanple->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($moreSanple->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($moreSanple->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
