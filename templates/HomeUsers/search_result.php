<h1>プラン検索結果</h1>
<div class="sortable-table">

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
        <div class="column-responsive column-90">
            <div class="userMessages form content">
                <table>
                    <tr>
                        <th>RURAL</th>
                        <th>PLAN</th>
                        <th>DAY</th>
                        <th>USER</th>
                        <th>PICTURE</th>
                    </tr>
                    <?php
                    foreach ($pre as $pres) {
                        if ($tag->count() != 0) {
                            foreach ($tag as $tags) {
                                if ($pres->id != $tags->plan_id) {
                                    continue 1;
                                }
                    ?>
                                <tr>
                                    <td><?= h($pres->rural) ?></td>
                                    <td><?= $this->Html->link($pres->plan_name, ['action' => 'plandetail', $pres->id]) ?></td>
                                    <td><?= h($pres->day) ?></td>
                                    <td><?= h($pres->user->user_name) ?></td>
                                    <td><?php echo $this->Html->image($pres->image_pass, array('width' => '300', 'height' => '200')) ?></td>
                                </tr>

                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td><?= h($pres->rural) ?></td>
                                <td><?= $this->Html->link($pres->plan_name, ['action' => 'plandetail', $pres->id]) ?></td>
                                <td><?= h($pres->day) ?></td>
                                <td><?= h($pres->user->user_name) ?></td>
                                <td><?php echo $this->Html->image($pres->image_pass, array('width' => '300', 'height' => '200')) ?></td>
                            </tr>

                    <?php
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>