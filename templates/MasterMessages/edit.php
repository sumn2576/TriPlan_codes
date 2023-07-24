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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mastermessage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mastermessage->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Mastermessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastermessages form content">
            <?= $this->Form->create($mastermessage) ?>
            <fieldset>
                <legend><?= __('Edit Mastermessage') ?></legend>
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
