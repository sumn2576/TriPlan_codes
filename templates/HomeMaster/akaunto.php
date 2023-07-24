<?php
// CakePHP
//フォームの作成
echo $this->Form->create();

// ここ
echo $this->Html->link(
    '戻る',             //ボタンの中の文
    ['action' => 'index'], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 100%; top: 0px'],
    ['confirm' => 'よろしいですか?']
);
echo $this->Html->link(
    'メッセージ',             //ボタンの中の文
    ['action' => 'messageadd', $user->id], //ボタンのリンク先
    ['class' => 'button', 'style' => 'position: absolute; left: 100%; top: 50px']
);

?>
<?= $this->Form->create($user) ?>
<?= $this->Form->end() ?>
<?= $this->Form->postLink(
    __('削除'),
    ['action' => 'deleteaka', $user->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'button', 'style' => 'position: absolute; left: 100%; top: 100px']
) ?>

<div class="column-responsive column-80">
    <div class="users view content">
        <h3><?= 'プロフィール' ?></h3>
        <table>
            <tr>
                <th><?= __('ユーザ名') ?></th>
                <td><?= h($user->user_name) ?></td>
            </tr>
            <tr>
                <th><?= __('一言コメント') ?></th>
                <td><?= h($user->comment) ?></td>
            </tr>
        </table>
    </div>
</div>
<div style="position:absolute; top:0px; left:250px">
    <?= $this->Html->image(
        $user->icon,
        ['width' => '100', 'height' => '100', 'alt' => 'sample image']
    ); ?>
</div>

</div>

<div class="plans index content">
    <h3><?= __('Plans') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id', ['label' => 'ユーザID']) ?></th>
                    <th><?= $this->Paginator->sort('id', ['label' => 'プランID']) ?></th>
                    <th><?= $this->Paginator->sort('plan_name', ['label' => 'プラン名']) ?></th>
                    <th><?= $this->Paginator->sort('rural', ['label' => '県名']) ?></th>
                    <th><?= $this->Paginator->sort('image_pass', ['label' => '画像']) ?></th>
                    <th><?= $this->Paginator->sort('day', ['label' => '日付']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($plans as $plan) : ?>

                    <tr>
                        <td><?= $this->Number->format($plan->user_id) ?></td>
                        <td><?= $this->Number->format($plan->id) ?></td>
                        <td><?= h($plan->plan_name) ?></td>
                        <td><?= h($plan->rural) ?></td>
                        <td><?= h($plan->image_pass) ?></td>
                        <td><?= h($plan->day) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('詳細'), ['action' => 'plandetail', $plan->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>