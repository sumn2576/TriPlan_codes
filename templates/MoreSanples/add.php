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
            <?= $this->Html->link(__('List More Sanples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moreSanples form content">
            <?= $this->Form->create($moreSanple) ?>
            <fieldset>
                <legend><?= __('Add More Sanple') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
