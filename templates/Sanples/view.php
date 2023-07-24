<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sanple $sanple
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sanple'), ['action' => 'edit', $sanple->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sanple'), ['action' => 'delete', $sanple->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sanple->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sanples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sanple'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sanples view content">
            <h3><?= h($sanple->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($sanple->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sanple->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
