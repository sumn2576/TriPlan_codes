<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMessage $userMessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('メニュー'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages view content">
            <?= $this->Form->create($masterMessage) ?>
            <h3>入力内容確認</h3>
            こちらの内容で送信してもよろしいですか？
            <table>
                <tr>
                    <th><?= __('送信内容') ?></th>
                    <td><?= h($masterMessage->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('日付') ?></th>
                    <td><?= h($masterMessage->day) ?></td>
                </tr>
            </table>
            <?= $this->Form->button(__('送信')) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button('修正', ['onclick' => 'history.back()', 'type' => 'button']) ?>
        </div>
    </div>
</div>