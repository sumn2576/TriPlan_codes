<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelSpot $travelSpot
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $travelSpot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $travelSpot->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Travel Spots'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="travelSpots form content">
            <?= $this->Form->create($travelSpot) ?>
            <fieldset>
                <legend><?= __('Edit Travel Spot') ?></legend>
                <?php
                    echo $this->Form->control('plan_id', ['options' => $plans]);
                    echo $this->Form->control('spot_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
