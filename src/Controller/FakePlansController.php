<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fakeplans Controller
 *
 * @property \App\Model\Table\FakeplansTable $Fakeplans
 * @method \App\Model\Entity\Fakeplan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FakeplansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $fakeplans = $this->paginate($this->Fakeplans);

        $this->set(compact('fakeplans'));
    }

    /**
     * View method
     *
     * @param string|null $id Fakeplan id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fakeplan = $this->Fakeplans->get($id, [
            'contain' => ['FakeTravelSpots', 'FakeTravelTags'],
        ]);

        $this->set(compact('fakeplan'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fakeplan = $this->Fakeplans->newEmptyEntity();
        if ($this->request->is('post')) {
            $fakeplan = $this->Fakeplans->patchEntity($fakeplan, $this->request->getData());
            if ($this->Fakeplans->save($fakeplan)) {
                $this->Flash->success(__('The fakeplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fakeplan could not be saved. Please, try again.'));
        }
        $this->set(compact('fakeplan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fakeplan id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fakeplan = $this->Fakeplans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fakeplan = $this->Fakeplans->patchEntity($fakeplan, $this->request->getData());
            if ($this->Fakeplans->save($fakeplan)) {
                $this->Flash->success(__('The fakeplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fakeplan could not be saved. Please, try again.'));
        }
        $this->set(compact('fakeplan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fakeplan id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fakeplan = $this->Fakeplans->get($id);
        if ($this->Fakeplans->delete($fakeplan)) {
            $this->Flash->success(__('The fakeplan has been deleted.'));
        } else {
            $this->Flash->error(__('The fakeplan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
