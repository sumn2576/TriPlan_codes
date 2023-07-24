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
            <?= $this->Html->link(__('List Favoriteitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="favoriteitems form content">
            <?= $this->Form->create($favoriteitem) ?>
            <fieldset>
                <legend><?= __('Add Favoriteitem') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('plan_id', ['options' => $plans]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
