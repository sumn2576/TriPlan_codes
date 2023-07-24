<h1>マイページ</h1>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('メニュー') ?></h4>
            <?= $this->Html->link(__('ホーム'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('お気に入りプラン'), ['action' => 'descfavorite'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('自身の投稿プラン'), ['action' => 'descmyself'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('メッセージボックス'), ['action' => 'messagebox'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('お問い合わせ'), ['action' => 'messageadd'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('設定'), ['action' => 'setting'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userMessages form content">
            <?= $this->Form->create($user, ['type' => 'file']) ?>
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('プロフィール編集') ?></legend>
                <?php
                echo $this->Html->image(
                    $user->icon,
                    ['width' => '100', 'height' => '100', 'alt' => 'sample image']
                );
                echo $this->Form->control('user_name', ['label' => 'ユーザ名']);
                echo $this->Form->control('comment', ['label' => '一言コメント']);
                echo $this->Form->label('アイコン');
                //echo $this->Form->control('icon');
                echo $this->Form->select(
                    'icon',
                    [
                        'アザラシ.png' => 'アザラシ', 'はにわ.png' => 'はにわ',
                        'ペンギン.png' => 'ペンギン', 'えりち.png' => 'えりち'
                    ]
                );
                //  echo $this->Form->file('icon');
                // echo $this->From->select('icon',
                // ['イレイナ_1.jpg'=>'イレイナ_1.jpg', 'YRYR-2.jpg'=>'YRYR-2.jpg', 
                // 'kero'=>'kero']
                // );
                //echo $this->Form->control('rural');
                echo $this->Form->label('県名');
                echo $this->Form->select(
                    'rural',
                    [
                        '0' => '未選択', '1' => '東京',
                        '2' => '北海道', '3' => '青森', '4' => '岩手', '5' => '宮城',
                        '6' => '秋田', '7' => '山形', '8' => '福島', '9' => '茨城', '10' => '栃木',
                        '11' => '群馬', '12' => '埼玉', '13' => '千葉', '14' => '東京', '15' => '神奈川',
                        '16' => '新潟', '17' => '富山', '18' => '石川', '19' => '福井', '20' => '山梨',
                        '21' => '長野', '22' => '岐阜', '23' => '静岡', '24' => '愛知', '25' => '三重',
                        '26' => '滋賀', '27' => '京都', '28' => '大阪', '29' => '兵庫', '30' => '奈良',
                        '31' => '和歌山', '32' => '鳥取', '33' => '島根', '34' => '岡山', '35' => '広島',
                        '36' => '山口', '37' => '徳島', '38' => '香川', '39' => '愛媛', '40' => '高知',
                        '41' => '福岡', '42' => '佐賀', '43' => '長崎', '44' => '熊本', '45' => '大分',
                        '46' => '宮崎', '47' => '鹿児島', '48' => '沖縄'
                    ]
                );
                ?>
            </fieldset>
            <?= $this->Form->button(__('保存')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>