<h1>暗証番号入力</h1> 
<p>
    <p>入力されたメールアドレスに暗証番号を送りましたので確認をお願いいたします。<br>
    確認後、以下の入力欄に暗証番号の入力をお願いいたします。<br>
    <br>
    </p> 
    <?php
        //フォーム生成
        echo $this->Form->create();

        //入力欄作成
        echo $this->Form->input('inputdata');

        //確認ボタン 
        echo $this->Form->button('OK');

        //フォーム終了
        echo $this->Form->end();
    ?>
</p> 