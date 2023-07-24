<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usermessage $usermessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Usermessage'), ['action' => 'edit', $usermessage->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usermessage'), ['action' => 'delete', $usermessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usermessage->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usermessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usermessage'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usermessages view content">
            <h3><?= h($usermessage->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $usermessage->has('user') ? $this->Html->link($usermessage->user->id, ['controller' => 'Users', 'action' => 'view', $usermessage->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($usermessage->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($usermessage->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($usermessage->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day') ?></th>
                    <td><?= h($usermessage->day) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
