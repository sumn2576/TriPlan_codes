<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMessage $userMessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('マイページ'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages form content">
            <?= $this->Form->create($masterMessage) ?>
            <fieldset>
                <h3><?= __('メッセージ送信フォーム') ?></h3>
                <?php
                    
                    echo $this->Form->control('contact',['label'=>'メッセージ内容']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('確認')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>