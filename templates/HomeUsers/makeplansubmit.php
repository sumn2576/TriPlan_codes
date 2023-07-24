<?php

/**
 * @var \App\View\AppView $this
 */
?>
<!-- 詳細 -->
<style>
    .comment {
        position: absolute;
        top: 260px;
        left: 5%;
        transform: translateY(-50%) translateX(-50%);
        -webkit- transform: translateY(-50%) translateX(-50%);
        margin: auto;
    }

    .icon {
        position: absolute;
        top: 500px;
        left: 5%;
        transform: translateY(-50%) translateX(-50%);
        -webkit- transform: translateY(-50%) translateX(-50%);
        margin: auto;
    }

    .user_pos {
        position: absolute;
        top: 260px;
        left: 15%;
        transform: translateY(-50%) translateX(-50%);
        -webkit- transform: translateY(-50%) translateX(-50%);
        margin: auto;
    }

    .img {
        position: absolute;
        top: 1000px;
        left: 40%;
    }
</style>


<div class="row">
    <div class="column-responsive column-100">
        <div class="userMessages form content">
            <div>
                <table frame='hside'>
                    <thead>
                        <tr>
                            <th>地域：<?= h($fakePlans->rural) ?></th>
                        </tr>
                        <tr>
                            <th>タグ：<?= h($tag->travel_tagname) ?></th>
                        </tr>
                        <tr>
                            <th>観光地：<?= h($spot->spot_name) ?></th>
                        </tr>
                        <tr>
                            <th>タイトル：<?= h($fakePlans->plan_name) ?></th>
                        </tr>
                        <tr>
                            <th>
                                <!-- 画像表示 -->
                                <?php echo $this->Html->image(
                                    $fakePlans->image_pass,
                                    ['width' => '400', 'height' => '400', 'alt' => 'sample image']
                                ); ?>
                            </th>
                        </tr>
            </div>


            <!-- 詳細 -->


            <?php

            echo $this->Html->link(
                '内容の編集へ',             //ボタンの中の文
                ['action' => 'makeplanedit', $query], //ボタンのリンク先
                ['class' => 'button']
            );
            ?>
            <?php
            echo $this->Html->link(
                'スポットの追加へ',             //ボタンの中の文
                ['action' => 'faketravelspot', $query], //ボタンのリンク先
                ['class' => 'button']
            );
            ?>
            <?php
            echo $this->Html->link(
                'タグの追加へ',             //ボタンの中の文
                ['action' => 'faketraveltag', $query], //ボタンのリンク先
                ['class' => 'button']
            );
            ?>
            <?= $this->Form->create($submit) ?>
            <?= $this->Form->button(__('完了する')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>