<?php
    // データベース接続
    $server = "localhost";
    $userName = "root";
    $password = "sumn2576";
    $dbName = "triplan_db";
    
    $mysqli = new mysqli($server, $userName, $password, $dbName);

    if ($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
    }

    $sql = "SELECT COUNT(A.plan_id), B.plan_name, B.rural, CAST(B.day AS DATE), B.id, B.image_pass
            FROM favorite_items A 
            INNER JOIN plans B ON A.plan_id = B.id
            GROUP BY A.plan_id
            HAVING COUNT(A.plan_id) > 0
            ORDER BY COUNT(A.plan_id) DESC ";

    $result = $mysqli -> query($sql);

    // クエリー失敗
    if(!$result) {
        echo $mysqli->error;
        exit();
    }

    // レコード件数
    $row_count = $result->num_rows;

    // 連想配列で取得
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $rows[] = $row;
    }

    // 結果セットを解放
    $result->free();

    // データベース切断
    $mysqli->close();

?>

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
            <h3>ランキング</h3>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th class="actions"><?= __('順位') ?></th>
                        <th class="actions"><?= __('プラン名') ?></th>
                        <th class="actions"><?= __('') ?></th>
                        <th class="actions"><?= __('場所') ?></th>
                        <th class="actions"><?= __('投稿日') ?></th>
                        <th class="actions"><?= __('評価数') ?></th>
                    </tr>

                    <?php
                        $rank = 0;
                        foreach($rows as $row){
                        $rank ++;
                    ?>

                    <tr>
                        <td><?php if($rank == 1){
                                    echo $this->Html->image('1_number.png', array('width' => '50', 'height' => '50'));
                                } else if ($rank == 2){
                                    echo $this->Html->image('2_number.png', array('width' => '50', 'height' => '50'));
                                } else if ($rank == 3){
                                    echo $this->Html->image('3_number.png', array('width' => '50', 'height' => '50'));
                                } else {
                                    echo $rank;
                        } ?></td>
                        <td><?= $this->Html->link($row['plan_name'], ['action' => 'plandetail', $row['id']]) ?></td>
                        <td><?php echo $this->Html->image($row['image_pass'], array('width' => '300', 'height' => '200')) ?></td>
                        <td><?php echo $row['rural']; ?></td>
                        <td><?php echo $row['CAST(B.day AS DATE)']; ?></td>
                        <td><?php echo $row['COUNT(A.plan_id)']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('')) ?>
                    <?= $this->Paginator->prev('< ' . __('')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('') . ' >') ?>
                    <?= $this->Paginator->last(__('') . ' >>') ?>
                </ul>
            </div>
        </div>   
    </div>
</div>