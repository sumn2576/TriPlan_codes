<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Masterusers Controller
 *
 * @property \App\Model\Table\MasterusersTable $Masterusers
 * @method \App\Model\Entity\Masteruser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MasterusersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $masterusers = $this->paginate($this->Masterusers);

        $this->set(compact('masterusers'));
    }

    /**
     * View method
     *
     * @param string|null $id Masteruser id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $masteruser = $this->Masterusers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('masteruser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $masteruser = $this->Masterusers->newEmptyEntity();
        if ($this->request->is('post')) {
            $masteruser = $this->Masterusers->patchEntity($masteruser, $this->request->getData());
            if ($this->Masterusers->save($masteruser)) {
                $this->Flash->success(__('The masteruser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The masteruser could not be saved. Please, try again.'));
        }
        $this->set(compact('masteruser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Masteruser id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $masteruser = $this->Masterusers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $masteruser = $this->Masterusers->patchEntity($masteruser, $this->request->getData());
            if ($this->Masterusers->save($masteruser)) {
                $this->Flash->success(__('The masteruser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The masteruser could not be saved. Please, try again.'));
        }
        $this->set(compact('masteruser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Masteruser id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $masteruser = $this->Masterusers->get($id);
        if ($this->Masterusers->delete($masteruser)) {
            $this->Flash->success(__('The masteruser has been deleted.'));
        } else {
            $this->Flash->error(__('The masteruser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
