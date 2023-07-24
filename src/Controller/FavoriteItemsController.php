<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FavoriteItems Controller
 *
 * @property \App\Model\Table\FavoriteItemsTable $FavoriteItems
 * @method \App\Model\Entity\FavoriteItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FavoriteItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Plans'],
        ];
        $favoriteItems = $this->paginate($this->FavoriteItems);

        $this->set(compact('favoriteItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Favorite Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favoriteItem = $this->FavoriteItems->get($id, [
            'contain' => ['Users', 'Plans'],
        ]);

        $this->set(compact('favoriteItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favoriteItem = $this->FavoriteItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $favoriteItem = $this->FavoriteItems->patchEntity($favoriteItem, $this->request->getData());
            if ($this->FavoriteItems->save($favoriteItem)) {
                $this->Flash->success(__('The favorite item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favorite item could not be saved. Please, try again.'));
        }
        $users = $this->FavoriteItems->Users->find('list', ['limit' => 200]);
        $plans = $this->FavoriteItems->Plans->find('list', ['limit' => 200]);
        $this->set(compact('favoriteItem', 'users', 'plans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Favorite Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favoriteItem = $this->FavoriteItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favoriteItem = $this->FavoriteItems->patchEntity($favoriteItem, $this->request->getData());
            if ($this->FavoriteItems->save($favoriteItem)) {
                $this->Flash->success(__('The favorite item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favorite item could not be saved. Please, try again.'));
        }
        $users = $this->FavoriteItems->Users->find('list', ['limit' => 200]);
        $plans = $this->FavoriteItems->Plans->find('list', ['limit' => 200]);
        $this->set(compact('favoriteItem', 'users', 'plans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Favorite Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favoriteItem = $this->FavoriteItems->get($id);
        if ($this->FavoriteItems->delete($favoriteItem)) {
            $this->Flash->success(__('The favorite item has been deleted.'));
        } else {
            $this->Flash->error(__('The favorite item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
