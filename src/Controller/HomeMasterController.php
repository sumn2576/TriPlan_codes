<?php
// src/Controller/UserhomeController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

// ファイル読み込み
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;
use Cake\Log\Log;
use Cake\Mailer\Email;
// 

// use Cake\Event\Event;//からデータ作成（makeplan）でしよう
class HomeMasterController extends AppController
{

    public function initialize(): void
    {

        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->Users = TableRegistry::get('Users');
        $this->Plans = TableRegistry::get('Plans');
        $this->ValuComments = TableRegistry::get('valuComments');
        $this->FakePlans = TableRegistry::get('FakePlans');
        $this->FakeTravelSpots = TableRegistry::get('FakeTravelSpots');
        $this->FakeTravelTags = TableRegistry::get('FakeTravelTags');
        $this->TravelTags = TableRegistry::get('TravelTags');
        $this->TravelSpots = TableRegistry::get('TravelSpots');
        $this->FavoriteItems = TableRegistry::get('FavoriteItems');
        $this->UserMessages = TableRegistry::get('UserMessages');
        $this->MasterMessages = TableRegistry::get('MasterMessages');
        $this->MasterUsers = TableRegistry::get('MasterUsers');
    }

    public function index()
    {
    }

    public function mastervalucommentindex()
    {
        $this->paginate = [
            'contain' => ['Users', 'Plans'],
        ];
        $valuComments = $this->paginate($this->ValuComments);


        if ($this->request->is('post')) {
            $find = $this->request->getData('find');
            $this->Flash->success(__($find));
            $valuComments = $this->paginate($this->ValuComments->find('all')
                ->where(['impression like' => '%' . $find . '%']));
        }
        $this->set('msg', null);

        $this->set(compact('valuComments'));
    }

    public function mastervalucommentindexdelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $valuComment = $this->ValuComments->get($id);
        if ($this->ValuComments->delete($valuComment)) {
            $this->Flash->success(__('The valu comment has been deleted.'));
        } else {
            $this->Flash->error(__('The valu comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'mastervalucommentindex']);
    }

    public function plandetailm($id = null)
    {
        $this->Plans = TableRegistry::get('plans'); //データテーブル取得
        $this->Spots = TableRegistry::get('TravelSpots');
        $this->Users = TableRegistry::get('Users'); //ユーザテーブルを取得
        $this->Tags = TableRegistry::get('TravelTags');

        $plan_id = $id;
        $plan = $this->Plans->find('all', ['contain' => ['Users'], 'conditions' => ['Plans.id' => $plan_id]]);
        $tag = $this->Tags->find()->where(['plan_id' => $plan_id]);
        $spot = $this->Spots->find()->where(['plan_id' => $plan_id]);
        $user_id = $this->Auth->user('id');

        $this->set('spot', $spot);
        $this->set('tag', $tag);
        $this->set('plans', $plan);
        $this->set('user_id', $user_id);
    }

    //アカウント情報詳細画面
    public function akaunto($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));

        $plans = $this->paginate($this->Plans->find('all', ['conditions' => ['user_id' => $user->id]]));

        $this->set(compact('plans'));
    }
    public function deleteaka($id = null)
    {
        $this->request->allowMethod(['post', 'deleteaka']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    // プラン・アカンウト検索画面
    public function planacountSearch()
    {
        $stay = [0 => '---', 1 => '1泊2日', 2 => '2泊3日', 3 => '3泊4日', 4 => '4泊5日', 5 => '日帰り'];
        $this->set('stay', $stay);
    }

    //プラン検索結果画面
    public function searchResult()
    {
        $prefe = $this->request->getData('prefecture');
        $tagname = $this->request->getData('key');
        $pre = $this->Plans->find()->contain('Users')->where(['Plans.rural' => $prefe])->all();
        $tag = $this->TravelTags->find()->where(['travel_tagname' => $tagname]);
        $this->set(compact('pre', 'tag'));
    }

    //アカウント検索結果画面
    public function acountsearchResult()
    {
        $account = $this->request->getData('acount_name');
        $acount = $this->Users->find()->where(['user_name like' => '%' . $account . '%'])->all();
        $this->set('acount', $acount);
    }

    //登録完了画面
    public function regiComp()
    {
    }

    // ランキング画面
    public function ranking()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $plans = $this->paginate($this->Plans);

        $this->set(compact('plans'));
    }

    // メッセージ送信画面
    public function messageadd()
    {
        $masterMessage = $this->MasterMessages->newEmptyEntity();
        if ($this->request->is('post')) {
            $masterMessage = $this->MasterMessages->patchEntity($masterMessage, $this->request->getData());
            $masterMessage->user_id = 1;
            return $this->redirect(['action' => 'messagecheck', $masterMessage->contact]);
        }
        //$users = $this->MasterMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('masterMessage'));
    }

    // メッセージ送信内容確認画面
    public function messagecheck($text = null)
    {
        $masterMessage = $this->MasterMessages->newEmptyEntity();
        $masterMessage->master_id = $this->Auth->user('id');
        $masterMessage->contact = $text;
        $masterMessage->day = date("Y-m-d H:i:s", strtotime('+9hour'));
        if ($this->request->is('post')) {
            if ($this->MasterMessages->save($masterMessage)) {
                $this->Flash->success(__('お問い合わせが完了しました。'));

                return $this->redirect(['action' => 'messageok']);
            }
            $this->Flash->error(__('The master message could not be saved. Please, try again.'));
        }
        $this->set(compact('masterMessage'));
    }

    // メッセージ送信完了画面
    public function messageok()
    {
    }

    // お問い合わせ一覧画面
    public function messagebox()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userMessages = $this->paginate($this->UserMessages);

        $this->set(compact('userMessages'));
    }

    // お問い合わせ詳細画面
    public function messageview($id = null)
    {
        $userMessage = $this->UserMessages->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userMessage'));
    }

    // メッセージ削除
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMessage = $this->UserMessages->get($id);
        if ($this->UserMessages->delete($userMessage)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('The user message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'messagebox']);
    }


    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function add()
    {
        $user = $this->MasterUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->MasterUsers->patchEntity($user, $this->request->getData());
            if ($this->MasterUsers->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    //新規登録画面
    public function registrationm()
    {
        $this->Users = TableRegistry::get('Users');
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $pass_ori = $this->request->getData('password_code');
            $user = $this->Users->patchEntity($user, $this->request->getData());    //入力データを捕獲
            $mail = $user->mail;            //入力されたメールアドレス
            $pass = $user->password_code;   //入力されたパスワード
            $pass_re = $this->request->getData('password');


            //パスワードの一致チェック
            $count_pass = $this->Users->find('all', ['conditions' => [
                'password_code' => $pass
            ]]);
            $count_pass = $count_pass->count();
            if ($count_pass != 0) {
                $this->Flash->error(__('このパスワードはすでに使われています'));
                $this->set('user', $user);
                return;
            }

            //パスワードの再入力の一致チェック

            if ($pass_ori == $pass_re) {
                $user->role = 'Admin';  //管理者権限付与

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    $rand = mt_rand(0, 9999);   //乱数生成
                    $email = new Email('default');
                    $email->setFrom(['triplan850@gmail.com' => 'Triplan'])
                        ->setTo($mail)
                        ->setSubject('テスト')
                        ->send('暗証番号' . ' ' . "$rand");
                    //上記で送信を確認
                    //本文の暗証番号をランダム生成
                    //データベースに暗証番号を保存して次の暗証番号入力で比較

                    return $this->redirect(['action' => 'inputpinm', $rand]);
                }

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            } else {
                $this->Flash->error(__('パスワード不一致'));
            }
        }
        $this->set('user', $user);
    }

    //暗証番号入力画面
    public function inputpinm($pas = null)
    {
        //受け取った乱数と入力された乱数を比較する
        if ($this->request->is('post')) {
            $input = $this->request->getData('inputdata');
            if ($pas == $input) {
                $this->Flash->success(__('登録が完了しました'));
                return $this->redirect(['action' => 'regi_Comp']);
            } else {
                $this->Flash->error(__('暗証番号が異なります'));
            }
        }
    }
}
