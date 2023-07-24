<h1>新規登録</h1>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <?= $this->Html->link(__('戻る'), ['action' => 'login'], ['class' => 'button float-left']) ?>
    <aside class="column">
        <div class="side-nav">
            <!-- <h4 class="heading"><?= __('Actions') ?></h4> -->
            <!-- <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('新規登録') ?></legend>
                <?php
                    echo $this->Form->control('user_name', ['ユーザネームを入力してください']);
                    echo $this->Form->control('mail', ['label' => 'メールアドレスを入力してください']); 
                    echo $this->Form->control('password_code', ['label' => 'パスワードを入力してください']);
                    echo $this->Form->input('password', array('label' => 'パスワードを再入力してください'));
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
