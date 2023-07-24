<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FakePlan $fakePlan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Fake Plans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fakePlans form content">
            <?= $this->Form->create($fakePlan) ?>
            <fieldset>
                <legend><?= __('Add Fake Plan') ?></legend>
                <?php
                echo $this->Form->control('plan_name');
                echo $this->Form->control('rural');
                echo $this->Form->control('image_pass');
                echo $this->Form->control('day', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->create($fakeTravelTags) ?>
            <fieldset>
                <?php
                echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>