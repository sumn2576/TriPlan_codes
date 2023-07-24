<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserMessages Controller
 *
 * @property \App\Model\Table\UserMessagesTable $UserMessages
 * @method \App\Model\Entity\UserMessage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserMessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userMessages = $this->paginate($this->UserMessages);

        $this->set(compact('userMessages'));
    }

    /**
     * View method
     *
     * @param string|null $id User Message id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userMessage = $this->UserMessages->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userMessage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userMessage = $this->UserMessages->newEmptyEntity();
        if ($this->request->is('post')) {
            $userMessage = $this->UserMessages->patchEntity($userMessage, $this->request->getData());
            if ($this->UserMessages->save($userMessage)) {
                $this->Flash->success(__('The user message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user message could not be saved. Please, try again.'));
        }
        $users = $this->UserMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userMessage', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Message id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userMessage = $this->UserMessages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userMessage = $this->UserMessages->patchEntity($userMessage, $this->request->getData());
            if ($this->UserMessages->save($userMessage)) {
                $this->Flash->success(__('The user message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user message could not be saved. Please, try again.'));
        }
        $users = $this->UserMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userMessage', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Message id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMessage = $this->UserMessages->get($id);
        if ($this->UserMessages->delete($userMessage)) {
            $this->Flash->success(__('The user message has been deleted.'));
        } else {
            $this->Flash->error(__('The user message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
