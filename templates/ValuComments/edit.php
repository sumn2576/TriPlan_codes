<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Valucomment $valucomment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $valucomment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $valucomment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Valucomments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="valucomments form content">
            <?= $this->Form->create($valucomment) ?>
            <fieldset>
                <legend><?= __('Edit Valucomment') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('plan_id', ['options' => $plans]);
                    echo $this->Form->control('valu');
                    echo $this->Form->control('impression');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
