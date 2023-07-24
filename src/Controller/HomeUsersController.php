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
class HomeUsersController extends AppController
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
        $news = $this->Plans->find('all', ['contain' => ['Users']])->limit(10)->order(['day' => 'DESC']);
        $role = $this->Auth->user('role');
        $this->set('news', $news);
        $this->set('role',$role);
    }

    public function ascfavorite()
    {
        $auth_id = $this->Auth->user('id');
        $this->set('auth_id', $auth_id);
        $favorites = $this->FavoriteItems->find('all', ['contain' => ['Plans' => ['Users']]])->order(['day' => 'ASC']);
        $this->set('favorites', $favorites);
    }

    public function descfavorite()
    {
        $auth_id = $this->Auth->user('id');
        $this->set('auth_id', $auth_id);
        $favorites = $this->FavoriteItems->find('all', ['contain' => ['Plans' => ['Users']]])->order(['day' => 'DESC']);
        $this->set('favorites', $favorites);
    }

    public function ascmyself()
    {
        $auth_id = $this->Auth->user('id');
        $myselfs = $this->Plans->find('all', ['contain' => ['Users']])->where(['user_id' => $auth_id])->order(['day' => 'ASC']);
        $this->set('myselfs', $myselfs);
    }

    public function descmyself()
    {
        $auth_id = $this->Auth->user('id');
        $myselfs = $this->Plans->find('all', ['contain' => ['Users']])->where(['user_id' => $auth_id])->order(['day' => 'DESC']);
        $this->set('myselfs', $myselfs);
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

    // public function login()
    // {
    //     if (isset($this->request->data['login'])) {

    //         $user = $this->Auth->identify();  //←①

    //         if ($user) {
    //             $this->Auth->setUser($user);  //←②
    //             return $this->redirect($this->Auth->redirectUrl());  //←③
    //         } else {
    //             //エラー時の処理
    //         }
    //     } 

    // }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function view($id = null)
    {
        $this->loadModel("Plans");
        $plan = $this->Plans->get($id);
        $this->set(compact('plan'));
    }

    public function makeplan() //空のプランを作成
    {
        // $fakePlan =  $this->FakePlans->newEntity();
        // $fakePlan -> $plan_name ='a';
        // $fakePlan -> $rural = 'a';
        // $fakePlan -> $image_pass = 'a';
        // if ($FakePlans->save($fakePlans)) {
        //     // $article エンティティーは今や id を持っています
        //     $id = $fakePlan->id;
        // }
        $fakePlan =  $this->FakePlans->newEmptyEntity();
        $fakePlan->plan_name = '';
        $fakePlan->rural = '';
        $fakePlan->image_pass = '';
        $this->FakePlans->save($fakePlan);
        $id = $fakePlan->id;
        return $this->redirect(['action' => 'makeplanedit', $id]);
    }

    public function makeplanedit($id = null) //プランの内容を作成
    {
        $fakePlan = $this->FakePlans->get($id, [
            'contain' => [],
        ]);
        // $img = $this->Image->findByFilename('not.jpg');
        // $path = WWW_ROOT . 'img' . DS . $name;
        // $fakePlan->image_pass=$img;
        $fakeplan_id = $id;
        // 一度編集画面を離れたとしても画像を覚えているように
        $image = $fakePlan->image_pass;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $myFile = $this->request->getData('image_pass');
            if ($myFile->getError() != UPLOAD_ERR_NO_FILE) {

                $fakePlan = $this->FakePlans->patchEntity($fakePlan, $this->request->getData());
                // $file=$fakePlan ->image_pass;
                // $this->request->getData('name')
                // Log::debug($this->request->getData('filename'));


                $name = $myFile->getClientFilename();
                $path = WWW_ROOT . 'img' . DS . $name;
                $myFile->moveTo($path);
                $fakePlan->image_pass = $name;

                if ($this->FakePlans->save($fakePlan)) {
                    // $this->Flash->success(__($file('name')));
                    return $this->redirect(['action' => 'faketravelspot', $fakeplan_id]);
                }
                $this->Flash->error(__('The fake plan could not be saved. Please, try again.'));
            } else {
                // $this->Flash->error(__('ファイルが保存されていません'));
                $fakePlan->plan_name = $this->request->getData('plan_name');
                $fakePlan->rural = $this->request->getData('rural');
                if($image==''){
                $fakePlan->image_pass = 'not.jpg';
                }else{
                $fakePlan->image_pass =  $image;  
                }
                if ($this->FakePlans->save($fakePlan)) {
                    // $this->Flash->success(__($file('name')));
                    return $this->redirect(['action' => 'faketravelspot', $fakeplan_id]);
                }
                $this->Flash->error(__('The fake plan could not be saved. Please, try again.'));



            }
        }
        $this->set(compact('fakePlan'));
        // $fakePlan = $this->FakePlans->get($id, [
        //     'contain' => [],
        // ]);
        // $fakeTravelSpot = $this->FakeTravelSpots->newEmptyEntity();
        // $fakeTravelTag = $this->FakeTravelTags->newEmptyEntity();
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $fakePlan = $this->FakePlans->patchEntity($fakePlan, $this->request->getData());
        //     $fakeTravelSpot = $this->FakeTravelSpots->patchEntity($fakeTravelSpot, $this->request->getData());
        //     $fakeTravelTag = $this->FakeTravelSpots->patchEntity($fakeTravelTag, $this->request->getData());
        //     $fakeTravelSpot ->fake_plan_id = $fakeplanid;
        //     $fakeTravelTag ->fake_plan_id = $fakeplanid;
        //     if ($this->FakePlans->save($fakePlan)) {
        //         $fakeplanid = $fakePlan ->id;
        //         $this->Flash->success(__('The fake plan has been saved.'));
        //     //     $fakeTravelSpot ->fake_plan_id = $fakeplanid;
        //     //     if($fakeTravelTag->name!=''){
        //     //     $this->FakeTravelSpots->save($fakeTravelSpot);
        //     // }
        //     // if($fakeTravelSpot->name!=''){
        //     //     $this->FakeTravelSpots->save($fakeTravelTag);
        //     // }
        //         return $this->redirect(['action' => 'index']);
        //     }

        //     $this->Flash->error(__('The fake plan could not be saved. Please, try again.'));
        // }
        //  $this->set(compact('fakePlan'));
        // // $this->set('fakeTravelSpot');
        // // $this->set('fakeTravelTag');
    }


    public function faketraveltag($id = null)
    {
        $fakeTravelTag = $this->FakeTravelTags->newEmptyEntity();
        $fakeTravelTag->fake_plan_id = $id;
        if ($this->request->is('post')) {
            $fakeTravelTag = $this->FakeTravelTags->patchEntity($fakeTravelTag, $this->request->getData());
            $fakeTravelTag->fake_plan_id = $id;
            if ($fakeTravelTag->travel_tagname != '') {
                if ($this->FakeTravelTags->save($fakeTravelTag)) {
                    $this->Flash->success(__('The fake travel tag has been saved.'));

                    return $this->redirect(['action' => 'faketraveltag', $id]);
                }
                $this->Flash->error(__('The fake travel tag could not be saved. Please, try again.'));
            } else {
                $this->Flash->success(__('タグが入力されていません'));

                return $this->redirect(['action' => 'faketraveltag', $id]);
            }
        }

        //すでに足されたタグをデータベースより受け取る
        $receivedTags = $this->paginate($this->FakeTravelTags->find()->where(['fake_plan_id' => $id]));

        $receivedTags = $this->FakeTravelTags->find()->where(['fake_plan_id' => $id]);
        $number = $receivedTags->count();
        $this->set('number',$number);
        $this->set(compact('fakeTravelTag'));
        $this->set(compact('receivedTags'));
    }
    public function faketraveltagdelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faketraveltag = $this->FakeTravelTags->get($id);
        $id = $faketraveltag->fake_plan_id;
        if ($this->FakeTravelTags->delete($faketraveltag)) {
        } else {
            $this->Flash->error(__('タグの消去に失敗しましたもう一度お願いします'));
        }

        return $this->redirect(['action' => 'faketraveltag', $id]);
    }


    public function faketravelspot($id = null)
    {
        $fakeTravelSpot = $this->FakeTravelSpots->newEmptyEntity();
        $fakeTravelSpot->fake_plan_id = $id;
        if ($this->request->is('post')) {
            


            $image = $this->request->getData('image');
            if ($image->getError() != UPLOAD_ERR_NO_FILE) {

                $fakeTravelSpot = $this->FakeTravelSpots->patchEntity($fakeTravelSpot, $this->request->getData());
                // $file=$fakePlan ->image_pass;
                // $this->request->getData('name')
                // Log::debug($this->request->getData('filename'));


                $name = $image->getClientFilename();
                $path = WWW_ROOT . 'img' . DS . $name;
                $image->moveTo($path);
                $fakeTravelSpot->image = $name;
                if ($fakeTravelSpot->spot_name != '') {
                    if ($this->FakeTravelSpots->save($fakeTravelSpot)) {
                        $this->Flash->success(__('The fake travel tag has been saved.'));
    
                        return $this->redirect(['action' => 'faketravelspot', $id]);
                    }
                    $this->Flash->error(__('The fake travel Spot could not be saved. Please, try again.'));
                } else {
                    $this->Flash->success(__('タグが入力されていません'));
    
                    return $this->redirect(['action' => 'faketravelspot', $id]);
                }
            } else {
                // $this->Flash->error(__('ファイルが保存されていません'));
                $fakeTravelSpot->spot_name = $this->request->getData('spot_name');
                $fakeTravelSpot->image = 'not.jpg';
                if ($fakeTravelSpot->spot_name != '') {
                    if ($this->FakeTravelSpots->save($fakeTravelSpot)) {
                        $this->Flash->success(__('The fake travel tag has been saved.'));
    
                        return $this->redirect(['action' => 'faketravelspot', $id]);
                    }
                    $this->Flash->error(__('The fake travel Spot could not be saved. Please, try again.'));
                } else {
                    $this->Flash->success(__('タグが入力されていません'));
    
                    return $this->redirect(['action' => 'faketravelspot', $id]);
                }



            }



            
        }

        //すでに足されたタグをデータベースより受け取る
        $receivedSpots = $this->paginate($this->FakeTravelSpots->find()->where(['fake_plan_id' => $id]));

        $receivedSpots = $this->FakeTravelSpots->find()->where(['fake_plan_id' => $id]);
        $number = $receivedSpots->count();
        $this->set('number',$number);

        $this->set(compact('fakeTravelSpot'));
        $this->set(compact('receivedSpots'));
    }
    public function faketravelspotdelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fakeTravelSpot = $this->FakeTravelSpots->get($id);
        $id = $fakeTravelSpot->fake_plan_id;
        if ($this->FakeTravelSpots->delete($fakeTravelSpot)) {
        } else {
            $this->Flash->error(__('タグの消去に失敗しましたもう一度お願いします'));
        }

        return $this->redirect(['action' => 'faketravelspot', $id]);
    }

    public function makeplansubmit($id = null)
    {
        $fakeplan = $this->FakePlans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is('post')) {
            if ($fakeplan->rural == '') {
                $this->Flash->error(__('都道府県が選択されていません'));
            } else if ($fakeplan->plan_name == '') {
                $this->Flash->error(__('プラン名が入力されていません'));
            } else {
                return $this->redirect(['action' => 'makeplanend', $id]);
            }
        }
        // 詳細

        $plan_id = $id;
        // $plan = $this->Plans->find('all', ['contain' => ['Users'], 'conditions' => ['Plans.id' => $plan_id]]);
        $tag = $this->FakeTravelTags->find()->where(['fake_plan_id' => $plan_id])->first();
        $spot = $this->FakeTravelSpots->find()->where(['fake_plan_id' => $plan_id])->first();
        $user_id = $this->Auth->user('id');

        $this->set('spot', $spot);
        $this->set('tag', $tag);
        $this->set('fakePlans', $fakeplan);
        $this->set('user_id', $user_id);
        // 詳細

        $this->set('submit', null);
        $this->set('query', $id);
    }
    public function makeplanend($id = null)
    {
        $user = $this->Auth->user('id');
        $plan = $this->Plans->newEmptyEntity();
        $fakePlan = $this->FakePlans->get($id, [
            'contain' => [],
        ]);
        $plan->plan_name = $fakePlan->plan_name;
        $plan->rural = $fakePlan->rural;
        $plan->image_pass = $fakePlan->image_pass;
        $plan->user_id = $user;
        date_default_timezone_set('Asia/Tokyo');
        $plan->day = date("Y-m-d H:i:s");
        $this->Plans->save($plan);
        return $this->redirect(['action' => 'makeplanendtag', $plan->id, $id]);
    }
    public function makeplanendtag($plan_id = null, $fake_paln_id = null)
    {
        $receivedTags = $this->FakeTravelTags->find()->where(['fake_plan_id' => $fake_paln_id]);
        $number = $receivedTags->count();
        if ($number == 0) {
            return $this->redirect(['action' => 'makeplanendspot', $plan_id, $fake_paln_id]);
        }
        $row = $receivedTags->first();
        $travelTag = $this->TravelTags->newEmptyEntity();
        $travelTag->plan_id = $plan_id;
        $travelTag->travel_tagname = $row->travel_tagname;
        $this->TravelTags->save($travelTag);
        $this->FakeTravelTags->delete($row);
        return $this->redirect(['action' => 'makeplanendtag', $plan_id, $fake_paln_id]);
    }

    public function makeplanendspot($plan_id = null, $fake_paln_id = null)
    {
        $receivedSpots = $this->FakeTravelSpots->find()->where(['fake_plan_id' => $fake_paln_id]);
        $number = $receivedSpots->count();
        if ($number == 0) {
            $receivedfakes = $this->FakePlans->find()->where(['id' => $fake_paln_id]);
            $fake = $receivedfakes->first();
            $this->FakePlans->delete($fake);
            return $this->redirect(['action' => 'index']);
        }
        $row = $receivedSpots->first();
        $travelSpot = $this->TravelSpots->newEmptyEntity();
        $travelSpot->plan_id = $plan_id;
        $travelSpot->spot_name = $row->spot_name;
        $travelSpot->image = $row->image;
        $this->TravelSpots->save($travelSpot);
        $this->FakeTravelSpots->delete($row);
        return $this->redirect(['action' => 'makeplanendspot', $plan_id, $fake_paln_id]);
    }

    public function valucomment($id = null)
    {

        $valuComment = $this->ValuComments->newEmptyEntity();
        // 今の自分のID
        $userid = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $valuComment = $this->ValuComments->patchEntity($valuComment, $this->request->getData());
            $valuComment->user_id = $userid;
            $valuComment->plan_id = $id;
            $check = $this->ValuComments->find()->where(['plan_id' => $id, 'user_id' => $userid]);  //同じ作品にコメントしてないかの確認
            $number = $check->count();
            if ($number == 0) {
                if ($this->ValuComments->save($valuComment)) {
                    $this->Flash->success(__('The valu comment has been saved.'));

                    return $this->redirect(['action' => 'valucomment', $id]);
                }
                $this->Flash->error(__('保存に失敗しました。もう一度保存してください'));
            } else {
                $this->Flash->error(__('すでに感想を上げています'));
            }
        }
        // $users = $this->ValuComments->Users->find('list', ['limit' => 200]);
        // $plans = $this->ValuComments->Plans->find('list', ['limit' => 200]);
        // $this->set(compact('valuComment', 'users', 'plans'));

        // $this->set(compact('valuComments'));
        // $this->set(compact('valuComment'));

        $this->set('valuComment');
        $this->set('id', $id);

        // $query = $this->ValuComments->find('all')->contain(['Users']);
        // $this->set('valuCommentlist',$query);

        // $this->paginate->contain('Users', 'Plans')->where(['plan.id',$planid]);
        $this->paginate = [
            'contain' => ['Users']
        ];
        // $valuCommentlist = $this->paginate($this->ValuComments->find()->contain('Users')->where(['plan.id',$planid]));
        $valuCommentlists = $this->paginate($this->ValuComments->find()->where(['plan_id' => $id]));
        $this->set(compact('valuCommentlists'));
    }





    public function mypage()
    {
        $auth_id = $this->Auth->user('id');

        $user = $this->Users->get($auth_id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            // $myFile = $this->request->getData('icon');
            // $name = $myFile->getClientFilename();
            // $path = WWW_ROOT . 'img' . DS . $name;
            // $myFile->moveTo($path);
            // $user->icon=$name;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'mypage']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function plandetail($id = null)
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

    //暗証番号入力画面
    public function inputpin($pas = null)
    {
        //受け取った乱数と入力された乱数を比較する
        if ($this->request->is('post')) {
            $input = $this->request->getData('inputdata');
            if ($pas == $input) {
                $this->Flash->success(__('登録が完了しました'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('暗証番号が異なります'));
            }
        }
    }

    //設定画面
    public function setting()
    {
        //$auth_idがログインしている人のid(この一文で取得)
        $auth_id = $this->Auth->user('id');

        $user = $this->Users->get($auth_id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }
    //アカウント情報詳細画面
    public function akaunto()
    {
        //$auth_idがログインしている人のid(この一文で取得)
        $auth_id = $this->Auth->user('id');

        $user = $this->Users->get($auth_id, [
            'contain' => [],
        ]);
        $this->set(compact('user'));
    }

    //他ユーザ画面
    public function other($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));

        $plans = $this->paginate($this->Plans->find('all', ['conditions' => ['user_id' => $user->id]]));

        $this->set(compact('plans'));
    }

    // プラン検索画面
    public function planSearch()
    {
        $stay = [0 => '---', 1 => '1泊2日', 2 => '2泊3日', 3 => '3泊4日', 4 => '4泊5日', 5 => '日帰り'];
        $this->set('stay', $stay);
    }

    //登録完了画面
    public function regiComp()
    {
    }

    // 検索結果
    public function searchResult()
    {
        $prefe = $this->request->getData('prefecture');
        $tagname = $this->request->getData('key');
        $pre = $this->Plans->find()->contain('Users')->where(['Plans.rural' => $prefe]);
        $tag = $this->TravelTags->find()->where(['travel_tagname' => $tagname]);

        $this->set(compact('pre', 'tag'));
    }

    // お気に入り登録ボタン
    public function favorite($plan_id = null, $user_id = null)
    {
        // データベースに保存する処理
        $this->Fav = TableRegistry::get('favoriteitems');
        $fav = $this->Fav->newEmptyEntity();
        $fav = $this->Fav->find()->where(['plan_id' => $plan_id])->andwhere(['user_id' => $user_id]);
        // $favid = $fav->id;
        $count = $fav->count();

        // $count_all = $this->Fav->find('all');

        if ($count == 0) {
            $fav = $this->Fav->newEmptyEntity();
            $fav->plan_id = $plan_id;
            $fav->user_id = $user_id;
            // $this->Fav->save($fav);

            if ($this->Fav->save($fav)) {
                $this->Flash->success(__('お気に入り登録されました'));
            } else {
                // $this->Flash->error(__('登録処理ミス'));
            }
        }
        return $this->redirect(['action' => 'plandetail', $plan_id]);
    }

    // お気に入り解除処理
    public function favdelete($plan_id = null, $user_id = null)
    {
        $this->request->allowMethod(['post', 'favdelete']);
        $this->Fav = TableRegistry::get('Favoriteitems');

        $fav = $this->Fav->find()->where(['plan_id' => $plan_id])->andwhere(['user_id', $user_id]);
        $fav = $fav->all();
        $fav = $fav->toArray();
        $fav = $fav[0];
        $fav = $this->Fav->get($fav->id);

        if ($this->Fav->delete($fav)) {
            $this->Flash->success(__('登録を解除しました'));
        } else {
            $this->Flash->error(__('削除ミス'));
        }
        return $this->redirect(['action' => 'plandetail', $plan_id]);
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

    // お問い合わせ画面
    public function messageadd()
    {
        $userMessage = $this->UserMessages->newEmptyEntity();
        if ($this->request->is('post')) {
            $userMessage = $this->UserMessages->patchEntity($userMessage, $this->request->getData());
            $userMessage->user_id = 1;
            return $this->redirect(['action' => 'messagecheck', $userMessage->contact]);
        }
        //$users = $this->UserMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userMessage'));
    }

    // お問い合わせ内容確認画面
    public function messagecheck($text = null)
    {
        $userMessage = $this->UserMessages->newEmptyEntity();
        $userMessage->user_id = $this->Auth->user('id');
        $userMessage->contact = $text;
        $userMessage->day = date("Y-m-d H:i:s", strtotime('+9hour'));
        if ($this->request->is('post')) {
            if ($this->UserMessages->save($userMessage)) {
                $this->Flash->success(__('お問い合わせが完了しました。'));

                return $this->redirect(['action' => 'messageok']);
            }
            $this->Flash->error(__('The user message could not be saved. Please, try again.'));
        }
        $this->set(compact('userMessage'));
    }

    // お問い合わせ完了画面
    public function messageok()
    {
    }

    // メッセージボックス画面
    public function messagebox()
    {
        $this->paginate = [
            'contain' => ['MasterUsers'],
        ];
        $masterMessages = $this->paginate($this->MasterMessages);

        $this->set(compact('masterMessages'));
    }

    // メッセージ詳細画面
    public function messageview($id = null)
    {
        $masterMessage = $this->MasterMessages->get($id, [
            'contain' => ['MasterUsers'],
        ]);

        $this->set(compact('masterMessage'));
    }

    // メッセージ削除
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masterMessage = $this->MasterMessages->get($id);
        if ($this->MasterMessages->delete($masterMessage)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('The master message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'messagebox']);
    }

    //新規登録画面
    public function registration(){
        $this->Users = TableRegistry::get('users');
        $user = $this->Users->newEmptyEntity();
        
        if($this->request->is('post')){
            $pass_ori = $this->request->getData('password_code');
            $user = $this->Users->patchEntity($user, $this->request->getData());    //入力データを捕獲
            $name = $user->user_name;       //入力されたユーザ名            
            $mail = $user->mail;            //入力されたメールアドレス
            $pass = $user->password_code;   //入力されたパスワード
            $pass_re = $this->request->getData('password');

            
            //ユーザネームの一致チェック
            $count_name = $this->Users->find('all', ['conditions' => [
                 'user_name'=>$name
            ]]);

            $count_name = $count_name->count();
            if($count_name != 0){
                $this->Flash->error(__('このユーザ名はすでに使われています'));
                 $this->set('user', $user);
                return;
            }
            
            //パスワードの一致チェック
            $count_pass = $this->Users->find('all', ['conditions' => [
                'password_code' => $pass
            ]]);
            $count_pass = $count_pass->count();
            if($count_pass != 0){
                $this->Flash->error(__('このパスワードはすでに使われています'));
                $this->set('user', $user);
                return;
            }
            
            //パスワードの再入力の一致チェック

            if($pass_ori == $pass_re){
                $user->role = 'Author';  //ユーザ権限を付与
                
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    
                    $rand = mt_rand(0, 9999);   //乱数生成
                    $email = new Email('default');
                    $email->setFrom(['triplan850@gmail.com' => 'Triplan'])
                  ->setTo($mail)
            	  ->setSubject('テスト')
                  ->send('暗証番号'.' '."$rand");
                  //上記で送信を確認
                  //本文の暗証番号をランダム生成
                  //データベースに暗証番号を保存して次の暗証番号入力で比較
                    
                    return $this->redirect(['action' => 'inputpin', $rand]);
                }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));

            } else {
                $this->Flash->error(__('パスワード不一致'));
            }
        }
        $this->set('user', $user);
    }
}