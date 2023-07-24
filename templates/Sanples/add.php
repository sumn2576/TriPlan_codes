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
            <?= $this->Html->link(__('List Sanples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sanples form content">
            <?= $this->Form->create($sanple) ?>
            <fieldset>
                <legend><?= __('Add Sanple') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button('承認', ['type' => 'submit', 'name' => 'sanpleadd', 'value' => 'ok']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
