<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan $plan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Plan'), ['action' => 'edit', $plan->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Plan'), ['action' => 'delete', $plan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $plan->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Plans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Plan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="plans view content">
            <h3><?= h($plan->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $plan->has('user') ? $this->Html->link($plan->user->id, ['controller' => 'Users', 'action' => 'view', $plan->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Plan Name') ?></th>
                    <td><?= h($plan->plan_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rural') ?></th>
                    <td><?= h($plan->rural) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($plan->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day') ?></th>
                    <td><?= h($plan->day) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Image Pass') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($plan->image_pass)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Favoriteitems') ?></h4>
                <?php if (!empty($plan->favorite_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Plan Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($plan->favorite_items as $favoriteItems) : ?>
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
                <h4><?= __('Related Travel Spots') ?></h4>
                <?php if (!empty($plan->travel_spots)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Plan Id') ?></th>
                            <th><?= __('Spot Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($plan->travel_spots as $travelSpots) : ?>
                        <tr>
                            <td><?= h($travelSpots->id) ?></td>
                            <td><?= h($travelSpots->plan_id) ?></td>
                            <td><?= h($travelSpots->spot_name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TravelSpots', 'action' => 'view', $travelSpots->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TravelSpots', 'action' => 'edit', $travelSpots->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TravelSpots', 'action' => 'delete', $travelSpots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelSpots->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Travel Tags') ?></h4>
                <?php if (!empty($plan->travel_tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Plan Id') ?></th>
                            <th><?= __('Travel Tagname') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($plan->travel_tags as $travelTags) : ?>
                        <tr>
                            <td><?= h($travelTags->id) ?></td>
                            <td><?= h($travelTags->plan_id) ?></td>
                            <td><?= h($travelTags->travel_tagname) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TravelTags', 'action' => 'view', $travelTags->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TravelTags', 'action' => 'edit', $travelTags->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TravelTags', 'action' => 'delete', $travelTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelTags->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Valu Comments') ?></h4>
                <?php if (!empty($plan->valu_comments)) : ?>
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
                        <?php foreach ($plan->valu_comments as $valuComments) : ?>
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
