<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Mastermessages Controller
 *
 * @property \App\Model\Table\MastermessagesTable $Mastermessages
 * @method \App\Model\Entity\Mastermessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MastermessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MasterUsers'],
        ];
        $mastermessages = $this->paginate($this->Mastermessages);

        $this->set(compact('mastermessages'));
    }

    /**
     * View method
     *
     * @param string|null $id Mastermessage id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mastermessage = $this->Mastermessages->get($id, [
            'contain' => ['MasterUsers'],
        ]);

        $this->set(compact('mastermessage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mastermessage = $this->Mastermessages->newEmptyEntity();
        if ($this->request->is('post')) {
            $mastermessage = $this->Mastermessages->patchEntity($mastermessage, $this->request->getData());
            if ($this->Mastermessages->save($mastermessage)) {
                $this->Flash->success(__('The mastermessage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mastermessage could not be saved. Please, try again.'));
        }
        $masterUsers = $this->Mastermessages->MasterUsers->find('list', ['limit' => 200]);
        $this->set(compact('mastermessage', 'masterUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mastermessage id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mastermessage = $this->Mastermessages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mastermessage = $this->Mastermessages->patchEntity($mastermessage, $this->request->getData());
            if ($this->Mastermessages->save($mastermessage)) {
                $this->Flash->success(__('The mastermessage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mastermessage could not be saved. Please, try again.'));
        }
        $masterUsers = $this->Mastermessages->MasterUsers->find('list', ['limit' => 200]);
        $this->set(compact('mastermessage', 'masterUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mastermessage id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mastermessage = $this->Mastermessages->get($id);
        if ($this->Mastermessages->delete($mastermessage)) {
            $this->Flash->success(__('The mastermessage has been deleted.'));
        } else {
            $this->Flash->error(__('The mastermessage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
