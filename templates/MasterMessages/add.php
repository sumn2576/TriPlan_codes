<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mastermessage $mastermessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Mastermessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastermessages form content">
            <?= $this->Form->create($mastermessage) ?>
            <fieldset>
                <legend><?= __('Add Mastermessage') ?></legend>
                <?php
                    echo $this->Form->control('master_id', ['options' => $masterUsers]);
                    echo $this->Form->control('contact');
                    echo $this->Form->control('day');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
