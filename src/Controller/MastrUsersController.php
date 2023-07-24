<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MastrUsers Controller
 *
 * @property \App\Model\Table\MastrUsersTable $MastrUsers
 * @method \App\Model\Entity\MastrUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MastrUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $mastrUsers = $this->paginate($this->MastrUsers);

        $this->set(compact('mastrUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Mastr User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mastrUser = $this->MastrUsers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('mastrUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mastrUser = $this->MastrUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $mastrUser = $this->MastrUsers->patchEntity($mastrUser, $this->request->getData());
            if ($this->MastrUsers->save($mastrUser)) {
                $this->Flash->success(__('The mastr user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mastr user could not be saved. Please, try again.'));
        }
        $this->set(compact('mastrUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mastr User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mastrUser = $this->MastrUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mastrUser = $this->MastrUsers->patchEntity($mastrUser, $this->request->getData());
            if ($this->MastrUsers->save($mastrUser)) {
                $this->Flash->success(__('The mastr user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mastr user could not be saved. Please, try again.'));
        }
        $this->set(compact('mastrUser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mastr User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mastrUser = $this->MastrUsers->get($id);
        if ($this->MastrUsers->delete($mastrUser)) {
            $this->Flash->success(__('The mastr user has been deleted.'));
        } else {
            $this->Flash->error(__('The mastr user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
