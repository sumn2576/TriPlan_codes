<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faketraveltag $faketraveltag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Faketraveltags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="faketraveltags form content">
            <?= $this->Form->create($faketraveltag) ?>
            <fieldset>
                <legend><?= __('Add Faketraveltag') ?></legend>
                <?php
                    echo $this->Form->control('fake_plan_id', ['options' => $fakePlans]);
                    echo $this->Form->control('travel_tagname');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
