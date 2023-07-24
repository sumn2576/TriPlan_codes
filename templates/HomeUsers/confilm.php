<?php
use Cake\Core\Configure;
?>
<?= $this->Form->create($plan, ['type' => 'post', 'url' => ['controller' => 'homeusers', 'action' => 'makeplan']]) ?>

    プラン名
    <?= $this->Form->button('戻る', ['onclick' => 'history.back()', 'type' => 'button']) ?>
    <?= $this->Form->button('完成', ['type' => 'submit',Configure::write('MakePlanUser.turn',false)]) ?>

<?= $this->Form->end() ?>