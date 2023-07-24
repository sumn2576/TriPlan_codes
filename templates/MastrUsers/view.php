<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MastrUser $mastrUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mastr User'), ['action' => 'edit', $mastrUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mastr User'), ['action' => 'delete', $mastrUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mastrUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mastr Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mastr User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastrUsers view content">
            <h3><?= h($mastrUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Mail') ?></th>
                    <td><?= h($mastrUser->mail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password Code') ?></th>
                    <td><?= h($mastrUser->password_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($mastrUser->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
