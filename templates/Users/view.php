<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User Name') ?></th>
                    <td><?= h($user->user_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Comment') ?></th>
                    <td><?= h($user->comment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rural') ?></th>
                    <td><?= h($user->rural) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail') ?></th>
                    <td><?= h($user->mail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password Code') ?></th>
                    <td><?= h($user->password_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Icon') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->icon)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Favoriteitems') ?></h4>
                <?php if (!empty($user->favorite_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Plan Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->favorite_items as $favoriteItems) : ?>
                        <tr>
                            <td><?= h($favoriteItems->id) ?></td>
                            <td><?= h($favoriteItems->user_id) ?></td>
                            <td><?= h($favoriteItems->plan_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Favoriteitems', 'action' => 'view', $favoriteItems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Favoriteitems', 'action' => 'edit', $favoriteItems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favoriteitems', 'action' => 'delete', $favoriteItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favoriteItems->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Plans') ?></h4>
                <?php if (!empty($user->plans)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Plan Name') ?></th>
                            <th><?= __('Rural') ?></th>
                            <th><?= __('Image Pass') ?></th>
                            <th><?= __('Day') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->plans as $plans) : ?>
                        <tr>
                            <td><?= h($plans->user_id) ?></td>
                            <td><?= h($plans->id) ?></td>
                            <td><?= h($plans->plan_name) ?></td>
                            <td><?= h($plans->rural) ?></td>
                            <td><?= h($plans->image_pass) ?></td>
                            <td><?= h($plans->day) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Plans', 'action' => 'view', $plans->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Plans', 'action' => 'edit', $plans->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Plans', 'action' => 'delete', $plans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plans->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reports') ?></h4>
                <?php if (!empty($user->reports)) : ?>
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
                        <?php foreach ($user->reports as $reports) : ?>
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
            <div class="related">
                <h4><?= __('Related User Messages') ?></h4>
                <?php if (!empty($user->user_messages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Contact') ?></th>
                            <th><?= __('Day') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->user_messages as $userMessages) : ?>
                        <tr>
                            <td><?= h($userMessages->id) ?></td>
                            <td><?= h($userMessages->user_id) ?></td>
                            <td><?= h($userMessages->title) ?></td>
                            <td><?= h($userMessages->contact) ?></td>
                            <td><?= h($userMessages->day) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'UserMessages', 'action' => 'view', $userMessages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'UserMessages', 'action' => 'edit', $userMessages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserMessages', 'action' => 'delete', $userMessages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMessages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Valu Comments') ?></h4>
                <?php if (!empty($user->valu_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Plan Id') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Valu') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Impression') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->valu_comments as $valuComments) : ?>
                        <tr>
                            <td><?= h($valuComments->user_id) ?></td>
                            <td><?= h($valuComments->plan_id) ?></td>
                            <td><?= h($valuComments->id) ?></td>
                            <td><?= h($valuComments->valu) ?></td>
                            <td><?= h($valuComments->created) ?></td>
                            <td><?= h($valuComments->impression) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ValuComments', 'action' => 'view', $valuComments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ValuComments', 'action' => 'edit', $valuComments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ValuComments', 'action' => 'delete', $valuComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuComments->id)]) ?>
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
