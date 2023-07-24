<div class="users form large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('user_name') ?>
        <?= $this->Form->control('password_code') ?>
    </fieldset>
    <?php echo $this->Html->link('新規アカウント作成', ['action' => 'registration'], ['class' => 'button', 'style']);?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>