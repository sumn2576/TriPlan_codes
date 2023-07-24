<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mastermessage $mastermessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mastermessage'), ['action' => 'edit', $mastermessage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mastermessage'), ['action' => 'delete', $mastermessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mastermessage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mastermessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mastermessage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastermessages view content">
            <h3><?= h($mastermessage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Master User') ?></th>
                    <td><?= $mastermessage->has('master_user') ? $this->Html->link($mastermessage->master_user->id, ['controller' => 'MasterUsers', 'action' => 'view', $mastermessage->master_user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($mastermessage->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($mastermessage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day') ?></th>
                    <td><?= h($mastermessage->day) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
