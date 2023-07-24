<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterMessage[]|\Cake\Collection\CollectionInterface $masterMessages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mastermessages view content">
            <h3><?= __('メールボックス') ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <?php //$this->Form->create() 
                            //$this->Html->link(__('新しい順'), ['action' => 'messagedesc'], ['class' => 'button', 'style'])
                         //$this->Html->link(__('古い順'), ['action' => 'messageasc'], ['class' => 'button', 'style']) 
                         //$this->Form->end() ?>
                        <tr>
                            <th><?= $this->Paginator->sort('日付') ?></th>
                            <th class="actions"><?= __('内容') ?></th>
                            <th class="actions"><?= __('管理') ?></th>
                        </tr>
                    </thead>
                <tbody>
                    <?php foreach ($masterMessages as $masterMessage): ?>
                        <tr>
                            <td><?= h($masterMessage->day) ?></td>
                            <td><?= h($masterMessage->contact) ?></td>
                            <td class="actions">
                            <?= $this->Html->link(__('詳細'), ['action' => 'messageview', $masterMessage->id]) ?>
                            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $masterMessage->id], ['confirm' => __('本当に削除してよろしいですか？', $masterMessage->id)]) ?>
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
