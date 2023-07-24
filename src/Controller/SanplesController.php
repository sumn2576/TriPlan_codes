<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
// use Cake\Core\Configure;

/**
 * Sanples Controller
 *
 * @property \App\Model\Table\SanplesTable $Sanples
 * @method \App\Model\Entity\Sanple[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SanplesController extends AppController
{



    public function initialize(): void
    {
        $this->loadComponent('Flash');
        $this->MoreSanples = TableRegistry::get('moreSanples');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sanples = $this->paginate($this->Sanples);


        $this->set(compact('sanples'));
    }


    /**
     * View method
     *
     * @param string|null $id Sanple id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sanple = $this->Sanples->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sanple'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sanple = $this->Sanples->newEmptyEntity();
        if (isset($_POST['approve'])) {
            if ($_POST['approve'] == 'ok') {
                // 承認

                // 承認
                $sanple = $this->Sanples->patchEntity($sanple, $this->request->getData());
                $sname = $sanple->name;
                if ($this->Sanples->save($sanple)) {
                    $this->Flash->success(__('The sanple has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The sanple could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sanple'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sanple id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sanple = $this->Sanples->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sanple = $this->Sanples->patchEntity($sanple, $this->request->getData());
            if ($this->Sanples->save($sanple)) {
                $this->Flash->success(__('The sanple has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanple could not be saved. Please, try again.'));
        }
        $this->set(compact('sanple'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sanple id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sanple = $this->Sanples->get($id);
        if ($this->Sanples->delete($sanple)) {
            $this->Flash->success(__('The sanple has been deleted.'));
        } else {
            $this->Flash->error(__('The sanple could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
