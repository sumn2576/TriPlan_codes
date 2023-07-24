<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserMessage[]|\Cake\Collection\CollectionInterface $userMessages
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
        <div class="usermessages view content">
            <h3><?= __('お問い合わせ一覧') ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('日付') ?></th>
                            <th class="actions"><?= __('内容') ?></th>
                            <th class="actions"><?= __('管理') ?></th>
                        </tr>
                    </thead>
                <tbody>
                    <?php foreach ($userMessages as $userMessage): ?>
                        <tr>
                            <td><?= h($userMessage->day) ?></td>
                            <td><?= h($userMessage->contact) ?></td>
                            <td class="actions">
                            <?= $this->Html->link(__('詳細'), ['action' => 'messageview', $userMessage->id]) ?>
                            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $userMessage->id], ['confirm' => __('本当に削除してよろしいですか？', $userMessage->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('')) ?>
                    <?= $this->Paginator->prev('< ' . __('')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('') . ' >') ?>
                    <?= $this->Paginator->last(__('') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>
    </div>
</div>