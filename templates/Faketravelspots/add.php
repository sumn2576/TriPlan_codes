<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faketravelspot $faketravelspot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Faketravelspots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="faketravelspots form content">
            <?= $this->Form->create($faketravelspot) ?>
            <fieldset>
                <legend><?= __('Add Faketravelspot') ?></legend>
                <?php
                    echo $this->Form->control('fake_plan_id', ['options' => $fakePlans]);
                    echo $this->Form->control('spot_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
