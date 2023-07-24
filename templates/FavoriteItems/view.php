<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Favoriteitem $favoriteitem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Favoriteitem'), ['action' => 'edit', $favoriteitem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Favoriteitem'), ['action' => 'delete', $favoriteitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favoriteitem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Favoriteitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Favoriteitem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="favoriteitems view content">
            <h3><?= h($favoriteitem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $favoriteitem->has('user') ? $this->Html->link($favoriteitem->user->id, ['controller' => 'Users', 'action' => 'view', $favoriteitem->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Plan') ?></th>
                    <td><?= $favoriteitem->has('plan') ? $this->Html->link($favoriteitem->plan->id, ['controller' => 'Plans', 'action' => 'view', $favoriteitem->plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($favoriteitem->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
