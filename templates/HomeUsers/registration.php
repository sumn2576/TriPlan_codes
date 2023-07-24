<h1>新規登録</h1>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('新規登録') ?></legend>
                <?php
                    echo $this->Form->control('user_name', ['label' => 'ユーザ名を入力してください']);
                    echo $this->Form->control('rural', ['type' => 'hidden']); 
                    echo $this->Form->control('mail', ['label' => 'メールアドレスを入力してください']); 
                    echo $this->Form->control('password_code', ['label' => 'パスワードを入力してください']);
                    echo $this->Form->control('icon', ['label' => 'パスワードを再び入力してください']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>