<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usermessage $usermessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('マイページ'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('メッセージボックス'), ['action' => 'messagebox'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="usermessages view content">
            <h3>お問い合わせ内容</h3>
            <table>
                <tr>
                    <th><?= __('受信日') ?></th>
                    <td><?= h($userMessage->day) ?></td>
                </tr>
                <tr>
                    <th><?= __('メッセージ') ?></th>
                    <td><?= h($userMessage->contact) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>