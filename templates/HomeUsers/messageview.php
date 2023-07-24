<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mastermessage $mastermessage
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('メッセージボックス'), ['action' => 'messagebox'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastermessages view content">
            <h3>メッセージ内容</h3>
            <table>
                <tr>
                    <th><?= __('受信日') ?></th>
                    <td><?= h($masterMessage->day) ?></td>
                </tr>
                <tr>
                    <th><?= __('メッセージ') ?></th>
                    <td><?= h($masterMessage->contact) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>