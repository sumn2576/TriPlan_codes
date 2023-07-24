<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usermessage $usermessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usermessage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usermessage->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Usermessages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usermessages form content">
            <?= $this->Form->create($usermessage) ?>
            <fieldset>
                <legend><?= __('Edit Usermessage') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('contact');
                    echo $this->Form->control('day');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
