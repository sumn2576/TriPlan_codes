<h1>プロフィール</h1>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('ホーム'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('マイページ'), ['action' => 'mypage'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('プラン検索'), ['action' => 'plan_search'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('プラン作成'), ['action' => 'makeplan'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages form content">

            <table>
                <?php echo $this->Html->image(
                    $user->icon,
                    ['width' => '100', 'height' => '100', 'alt' => 'sample image']
                ); ?>
                <tr>
                    <th><?= __('ユーザ名') ?></th>
                    <td><?= h($user->user_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('一言コメント') ?></th>
                    <td><?= h($user->comment) ?></td>
                </tr>
            </table>
            <br>



            <div class="plans index content">
                <h3><?= __('作成プラン') ?></h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('plan_name', ['label' => 'PLAN']) ?></th>
                                <th><?= $this->Paginator->sort('rural', ['label' => 'RURAL']) ?></th>
                                <th><?= $this->Paginator->sort('day', ['label' => 'DAY']) ?></th>
                                <th><?= $this->Paginator->sort('image_pass', ['label' => 'PICTURE']) ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($plans as $plan) : ?>

                                <tr>
                                    <td><?= $this->Html->link($plan->plan_name, ['action' => 'plandetail', $plan->id]) ?></td>
                                    <td><?= h($plan->rural) ?></td>
                                    <td><?= h($plan->day) ?></td>
                                    <td><?php echo $this->Html->image($plan->image_pass, array('width' => '300', 'height' => '200')) ?></td>
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
        </div>
    </div>
</div>