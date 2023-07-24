<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * MoreSanples Controller
 *
 * @property \App\Model\Table\MoreSanplesTable $MoreSanples
 * @method \App\Model\Entity\MoreSanple[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoreSanplesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $moreSanples = $this->paginate($this->MoreSanples);

        $this->set(compact('moreSanples'));
    }

    /**
     * View method
     *
     * @param string|null $id More Sanple id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moreSanple = $this->MoreSanples->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('moreSanple'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moreSanple = $this->MoreSanples->newEmptyEntity();
        if ($this->request->is('post')) {
            $moreSanple = $this->MoreSanples->patchEntity($moreSanple, $this->request->getData());
            if ($this->MoreSanples->save($moreSanple)) {
                $this->Flash->success(__('The more sanple has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The more sanple could not be saved. Please, try again.'));
        }
        $this->set(compact('moreSanple'));
    }

    /**
     * Edit method
     *
     * @param string|null $id More Sanple id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moreSanple = $this->MoreSanples->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moreSanple = $this->MoreSanples->patchEntity($moreSanple, $this->request->getData());
            if ($this->MoreSanples->save($moreSanple)) {
                $this->Flash->success(__('The more sanple has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The more sanple could not be saved. Please, try again.'));
        }
        $this->set(compact('moreSanple'));
    }

    /**
     * Delete method
     *
     * @param string|null $id More Sanple id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moreSanple = $this->MoreSanples->get($id);
        if ($this->MoreSanples->delete($moreSanple)) {
            $this->Flash->success(__('The more sanple has been deleted.'));
        } else {
            $this->Flash->error(__('The more sanple could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
