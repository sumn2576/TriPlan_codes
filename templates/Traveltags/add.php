<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelTag $travelTag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Travel Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="travelTags form content">
            <?= $this->Form->create($travelTag) ?>
            <fieldset>
                <legend><?= __('Add Travel Tag') ?></legend>
                <?php
                    echo $this->Form->control('plan_id', ['options' => $plans]);
                    echo $this->Form->control('travel_tagname');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
