<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Valucomment $valucomment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Valucomment'), ['action' => 'edit', $valucomment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Valucomment'), ['action' => 'delete', $valucomment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valucomment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Valucomments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Valucomment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="valucomments view content">
            <h3><?= h($valucomment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $valucomment->has('user') ? $this->Html->link($valucomment->user->id, ['controller' => 'Users', 'action' => 'view', $valucomment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Plan') ?></th>
                    <td><?= $valucomment->has('plan') ? $this->Html->link($valucomment->plan->id, ['controller' => 'Plans', 'action' => 'view', $valucomment->plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Impression') ?></th>
                    <td><?= h($valucomment->impression) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($valucomment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valu') ?></th>
                    <td><?= $this->Number->format($valucomment->valu) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($valucomment->created) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reports') ?></h4>
                <?php if (!empty($valucomment->reports)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Valu Comment Id') ?></th>
                            <th><?= __('Repoter') ?></th>
                            <th><?= __('Day') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($valucomment->reports as $reports) : ?>
                        <tr>
                            <td><?= h($reports->id) ?></td>
                            <td><?= h($reports->user_id) ?></td>
                            <td><?= h($reports->valu_comment_id) ?></td>
                            <td><?= h($reports->repoter) ?></td>
                            <td><?= h($reports->day) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
