<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sanple $sanple
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sanple->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sanple->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sanples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sanples form content">
            <?= $this->Form->create($sanple) ?>
            <fieldset>
                <legend><?= __('Edit Sanple') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
