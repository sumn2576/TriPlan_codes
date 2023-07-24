<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fakeplan $fakeplan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fakeplan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fakeplan->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fakeplans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fakeplans form content">
            <?= $this->Form->create($fakeplan) ?>
            <fieldset>
                <legend><?= __('Edit Fakeplan') ?></legend>
                <?php
                    echo $this->Form->control('plan_name');
                    echo $this->Form->control('rural');
                    echo $this->Form->control('image_pass');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
