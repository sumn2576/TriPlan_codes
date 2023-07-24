<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $plan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $plan->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Plans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="plans form content">
            <?= $this->Form->create($plan) ?>
            <fieldset>
                <legend><?= __('Edit Plan') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('plan_name');
                    echo $this->Form->control('rural');
                    echo $this->Form->control('image_pass');
                    echo $this->Form->control('day');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
