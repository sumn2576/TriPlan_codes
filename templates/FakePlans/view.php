<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fakeplan $fakeplan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fakeplan'), ['action' => 'edit', $fakeplan->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fakeplan'), ['action' => 'delete', $fakeplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fakeplan->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fakeplans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fakeplan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fakeplans view content">
            <h3><?= h($fakeplan->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Plan Name') ?></th>
                    <td><?= h($fakeplan->plan_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rural') ?></th>
                    <td><?= h($fakeplan->rural) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fakeplan->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Image Pass') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($fakeplan->image_pass)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Fake Travel Spots') ?></h4>
                <?php if (!empty($fakeplan->fake_travel_spots)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fake Plan Id') ?></th>
                            <th><?= __('Spot Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fakeplan->fake_travel_spots as $fakeTravelSpots) : ?>
                        <tr>
                            <td><?= h($fakeTravelSpots->id) ?></td>
                            <td><?= h($fakeTravelSpots->fake_plan_id) ?></td>
                            <td><?= h($fakeTravelSpots->spot_name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FakeTravelSpots', 'action' => 'view', $fakeTravelSpots->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FakeTravelSpots', 'action' => 'edit', $fakeTravelSpots->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FakeTravelSpots', 'action' => 'delete', $fakeTravelSpots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fakeTravelSpots->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Fake Travel Tags') ?></h4>
                <?php if (!empty($fakeplan->fake_travel_tags)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fake Plan Id') ?></th>
                            <th><?= __('Travel Tagname') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fakeplan->fake_travel_tags as $fakeTravelTags) : ?>
                        <tr>
                            <td><?= h($fakeTravelTags->id) ?></td>
                            <td><?= h($fakeTravelTags->fake_plan_id) ?></td>
                            <td><?= h($fakeTravelTags->travel_tagname) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FakeTravelTags', 'action' => 'view', $fakeTravelTags->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FakeTravelTags', 'action' => 'edit', $fakeTravelTags->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FakeTravelTags', 'action' => 'delete', $fakeTravelTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fakeTravelTags->id)]) ?>
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
