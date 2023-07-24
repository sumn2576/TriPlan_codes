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
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('お気に入りプラン'), ['action' => 'descfavorite'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('自身の投稿プラン'), ['action' => 'descmyself'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('メッセージボックス'), ['action' => 'messagebox'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('設定'), ['action' => 'setting'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('ホーム'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages form content">
            <?= $this->Form->create($userMessage) ?>
            <fieldset>
                <h1><?= __('お問い合わせフォーム') ?></h1>
                <?php
                    
                    echo $this->Form->control('contact',['label'=>'お問い合わせ内容']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('確認')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>