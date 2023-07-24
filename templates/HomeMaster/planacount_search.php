<h1>プラン・アカウント検索</h1>
<!-- タブメニュー A（プラン） -->
<input type="radio" name="tab_item" id="tab_radio_A" class="tab_radio" checked>
<label for="tab_radio_A" class="tab_menu">プラン</label>
<!-- タブA 表示内容 -->
<div id="tab_contains_A" class="tab_contains">
    <p>
    <form method="POST" name="search" action="search_result">
        <!-- 県名 -->
        <label>県名（※必須）</label>
        <select name="prefecture" style="width:200px;" required>
            <option value="">未選択</option>
            <option value="北海道">北海道</option>
            <option value="青森">青森</option>
            <option value="岩手">岩手</option>
            <option value="宮城">宮城</option>
            <option value="秋田">秋田</option>
            <option value="山形">山形</option>
            <option value="福島">福島</option>
            <option value="茨城">茨城</option>
            <option value="栃木">栃木</option>
            <option value="群馬">群馬</option>
            <option value="埼玉">埼玉</option>
            <option value="千葉">千葉</option>
            <option value="東京">東京</option>
            <option value="神奈川">神奈川</option>
            <option value="新潟">新潟</option>
            <option value="富山">富山</option>
            <option value="石川">石川</option>
            <option value="福井">福井</option>
            <option value="山梨">山梨</option>
            <option value="長野">長野</option>
            <option value="岐阜">岐阜</option>
            <option value="静岡">静岡</option>
            <option value="愛知">愛知</option>
            <option value="三重">三重</option>
            <option value="滋賀">滋賀</option>
            <option value="京都">京都</option>
            <option value="大阪">大阪</option>
            <option value="兵庫">兵庫</option>
            <option value="奈良">奈良</option>
            <option value="和歌山">和歌山</option>
            <option value="鳥取">鳥取</option>
            <option value="島根">島根</option>
            <option value="岡山">岡山</option>
            <option value="広島">広島</option>
            <option value="山口">山口</option>
            <option value="徳島">徳島</option>
            <option value="香川">香川</option>
            <option value="愛媛">愛媛</option>
            <option value="高知">高知</option>
            <option value="福岡">福岡</option>
            <option value="佐賀">佐賀</option>
            <option value="長崎">長崎</option>
            <option value="熊本">熊本</option>
            <option value="大分">大分</option>
            <option value="宮崎">宮崎</option>
            <option value="鹿児島">鹿児島</option>
            <option value="沖縄">沖縄</option>
        </select>

        <!-- キーワード -->
        <label for="key">キーワード</label>
        <input type="text" name="key" id="key" placeholder="キーワードを入力してください(10文字まで)" maxlength="10" style="width:400px;"><br />


        <!-- 送信 -->
        <input type="submit" value="検索" />

        <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
    </form>
    </p>
</div>

<!-- タブメニュー B -->
<input type="radio" name="tab_item" id="tab_radio_B" class="tab_radio">
<label for="tab_radio_B" class="tab_menu">アカウント</label>
<!-- タブB 表示内容 -->
<div id="tab_contains_B" class="tab_contains">
    <p>
    <form method="POST" name="acountsearch" action="acountsearch_result">
        <label for="key"></label>
        ユーザ名<input type="text" name="acount_name" id="key" placeholder="ユーザ名を入力" style="width:400px;" required><br />
        <!-- 送信 -->
        <input type="submit" value="検索" />
        </p>
</div>
<?php
//フォームの作成
echo $this->Form->create();

// 戻るボタン
echo $this->Html->link('戻る', ['action' => 'index'], ['class' => 'button', 'style' => 'position: absolute; left: 70%; top: 100px']);

echo $this->Html->css('tab');
//フォームの終了
echo $this->Form->end();
?>