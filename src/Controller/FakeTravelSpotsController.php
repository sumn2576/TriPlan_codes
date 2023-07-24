<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FakeTravelSpots Controller
 *
 * @property \App\Model\Table\FakeTravelSpotsTable $FakeTravelSpots
 * @method \App\Model\Entity\FakeTravelSpot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FakeTravelSpotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FakePlans'],
        ];
        $fakeTravelSpots = $this->paginate($this->FakeTravelSpots);

        $this->set(compact('fakeTravelSpots'));
    }

    /**
     * View method
     *
     * @param string|null $id Fake Travel Spot id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fakeTravelSpot = $this->FakeTravelSpots->get($id, [
            'contain' => ['FakePlans'],
        ]);

        $this->set(compact('fakeTravelSpot'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fakeTravelSpot = $this->FakeTravelSpots->newEmptyEntity();
        if ($this->request->is('post')) {
            $fakeTravelSpot = $this->FakeTravelSpots->patchEntity($fakeTravelSpot, $this->request->getData());
            if ($this->FakeTravelSpots->save($fakeTravelSpot)) {
                $this->Flash->success(__('The fake travel spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fake travel spot could not be saved. Please, try again.'));
        }
        $fakePlans = $this->FakeTravelSpots->FakePlans->find('list', ['limit' => 200]);
        $this->set(compact('fakeTravelSpot', 'fakePlans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fake Travel Spot id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fakeTravelSpot = $this->FakeTravelSpots->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fakeTravelSpot = $this->FakeTravelSpots->patchEntity($fakeTravelSpot, $this->request->getData());
            if ($this->FakeTravelSpots->save($fakeTravelSpot)) {
                $this->Flash->success(__('The fake travel spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fake travel spot could not be saved. Please, try again.'));
        }
        $fakePlans = $this->FakeTravelSpots->FakePlans->find('list', ['limit' => 200]);
        $this->set(compact('fakeTravelSpot', 'fakePlans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fake Travel Spot id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fakeTravelSpot = $this->FakeTravelSpots->get($id);
        if ($this->FakeTravelSpots->delete($fakeTravelSpot)) {
            $this->Flash->success(__('The fake travel spot has been deleted.'));
        } else {
            $this->Flash->error(__('The fake travel spot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
