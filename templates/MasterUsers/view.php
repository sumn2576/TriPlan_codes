<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Masteruser $masteruser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Masteruser'), ['action' => 'edit', $masteruser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Masteruser'), ['action' => 'delete', $masteruser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masteruser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Masterusers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Masteruser'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="masterusers view content">
            <h3><?= h($masteruser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Mail') ?></th>
                    <td><?= h($masteruser->mail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password Code') ?></th>
                    <td><?= h($masteruser->password_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($masteruser->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
