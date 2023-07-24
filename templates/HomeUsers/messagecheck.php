<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMessage $userMessage
 */
?>
<div class="column-responsive column-100">
    <div class="userMessages view content">
        <?= $this->Form->create($userMessage) ?>
        <h3>入力内容確認</h3>
        こちらの内容で送信してもよろしいですか？
        <table>
            <tr>
                <th><?= __('お問い合わせ内容') ?></th>
                <td><?= h($userMessage->contact) ?></td>
            </tr>
            <tr>
                <th><?= __('日付') ?></th>
                <td><?= h($userMessage->day) ?></td>
            </tr>
        </table>
        <?= $this->Form->button(__('送信')) ?>
        <?= $this->Form->end() ?>
        <?= $this->Form->button('修正', ['onclick' => 'history.back()', 'type' => 'button']) ?>
    </div>
</div>