<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ValuComments Controller
 *
 * @property \App\Model\Table\ValuCommentsTable $ValuComments
 * @method \App\Model\Entity\ValuComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ValuCommentsController extends AppController
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
        $valuComments = $this->paginate($this->ValuComments);

        $this->set(compact('valuComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Valu Comment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $valuComment = $this->ValuComments->get($id, [
            'contain' => ['Users', 'Plans', 'Reports'],
        ]);

        $this->set(compact('valuComment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $valuComment = $this->ValuComments->newEmptyEntity();
        if ($this->request->is('post')) {
            $valuComment = $this->ValuComments->patchEntity($valuComment, $this->request->getData());
            if ($this->ValuComments->save($valuComment)) {
                $this->Flash->success(__('The valu comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The valu comment could not be saved. Please, try again.'));
        }
        $users = $this->ValuComments->Users->find('list', ['limit' => 200]);
        $plans = $this->ValuComments->Plans->find('list', ['limit' => 200]);
        $this->set(compact('valuComment', 'users', 'plans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Valu Comment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $valuComment = $this->ValuComments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $valuComment = $this->ValuComments->patchEntity($valuComment, $this->request->getData());
            if ($this->ValuComments->save($valuComment)) {
                $this->Flash->success(__('The valu comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The valu comment could not be saved. Please, try again.'));
        }
        $users = $this->ValuComments->Users->find('list', ['limit' => 200]);
        $plans = $this->ValuComments->Plans->find('list', ['limit' => 200]);
        $this->set(compact('valuComment', 'users', 'plans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Valu Comment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $valuComment = $this->ValuComments->get($id);
        if ($this->ValuComments->delete($valuComment)) {
            $this->Flash->success(__('The valu comment has been deleted.'));
        } else {
            $this->Flash->error(__('The valu comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
