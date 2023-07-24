<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MastrUser $mastrUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Mastr Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastrUsers form content">
            <?= $this->Form->create($mastrUser) ?>
            <fieldset>
                <legend><?= __('Add Mastr User') ?></legend>
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
