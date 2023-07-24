<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FakePlan $fakePlan
 */

use Cake\Core\Configure;
?>
<h1>プラン作成</h1>

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
            <?= $this->Form->create($fakePlan, ['type' => 'file']) ?>
            <fieldset>
                <?php
                echo $this->Form->control('plan_name', ['label' => 'プラン名']);
                echo $this->Form->label('都道府県');
                echo $this->Form->select(
                    'rural',
                    array(
                        'null' => '都道府県を選択してください',
                        '北海道' => '北海道',
                        '青森' => '青森',
                        '岩手' => '岩手',
                        '宮城' => '宮城',
                        '秋田' => '秋田',
                        '山形' => '山形',
                        '福島' => '福島',
                        '茨城' => '茨城',
                        '栃木' => '栃木',
                        '群馬' => '群馬',
                        '埼玉' => '埼玉',
                        '千葉' => '千葉',
                        '東京' => '東京',
                        '神奈川' => '神奈川',
                        '新潟' => '新潟',
                        '富山' => '富山',
                        '石川' => '石川',
                        '福井' => '福井',
                        '山梨' => '山梨',
                        '長野' => '長野',
                        '岐阜' => '岐阜',
                        '静岡' => '静岡',
                        '愛知' => '愛知',
                        '三重' => '三重',
                        '滋賀' => '滋賀',
                        '京都' => '京都',
                        '大阪' => '大阪',
                        '兵庫' => '兵庫',
                        '奈良' => '奈良',
                        '和歌山' => '和歌山',
                        '鳥取' => '鳥取',
                        '島根' => '島根',
                        '岡山' => '岡山',
                        '広島' => '広島',
                        '山口' => '山口',
                        '徳島' => '徳島',
                        'うどん' => 'うどん',
                        '愛媛' => '愛媛',
                        '高知' => '高知',
                        '福岡' => '福岡',
                        '佐賀' => '佐賀',
                        '長崎' => '長崎',
                        '熊本' => '熊本',
                        '大分' => '大分',
                        '宮崎' => '宮崎',
                        '鹿児島' => '鹿児島',
                        '沖縄' => '沖縄'
                    )
                );
                echo $this->Form->label('画像');
                echo $this->Form->file('image_pass');
                ?>
            </fieldset>
            <?= $this->Form->button(__('スポットの追加へ')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>