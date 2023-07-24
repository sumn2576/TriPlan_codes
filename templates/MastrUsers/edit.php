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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mastrUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mastrUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Mastr Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastrUsers form content">
            <?= $this->Form->create($mastrUser) ?>
            <fieldset>
                <legend><?= __('Edit Mastr User') ?></legend>
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
