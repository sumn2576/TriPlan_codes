<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Masteruser $masteruser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Masterusers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="masterusers form content">
            <?= $this->Form->create($masteruser) ?>
            <fieldset>
                <legend><?= __('Add Masteruser') ?></legend>
                <?php
                    echo $this->Form->control('mail');
                    echo $this->Form->control('password_code');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
