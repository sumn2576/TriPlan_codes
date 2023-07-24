<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TravelSpots Controller
 *
 * @property \App\Model\Table\TravelSpotsTable $TravelSpots
 * @method \App\Model\Entity\TravelSpot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TravelSpotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Plans'],
        ];
        $travelSpots = $this->paginate($this->TravelSpots);

        $this->set(compact('travelSpots'));
    }

    /**
     * View method
     *
     * @param string|null $id Travel Spot id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travelSpot = $this->TravelSpots->get($id, [
            'contain' => ['Plans'],
        ]);

        $this->set(compact('travelSpot'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $travelSpot = $this->TravelSpots->newEmptyEntity();
        if ($this->request->is('post')) {
            $travelSpot = $this->TravelSpots->patchEntity($travelSpot, $this->request->getData());
            if ($this->TravelSpots->save($travelSpot)) {
                $this->Flash->success(__('The travel spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel spot could not be saved. Please, try again.'));
        }
        $plans = $this->TravelSpots->Plans->find('list', ['limit' => 200]);
        $this->set(compact('travelSpot', 'plans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Travel Spot id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travelSpot = $this->TravelSpots->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travelSpot = $this->TravelSpots->patchEntity($travelSpot, $this->request->getData());
            if ($this->TravelSpots->save($travelSpot)) {
                $this->Flash->success(__('The travel spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel spot could not be saved. Please, try again.'));
        }
        $plans = $this->TravelSpots->Plans->find('list', ['limit' => 200]);
        $this->set(compact('travelSpot', 'plans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel Spot id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travelSpot = $this->TravelSpots->get($id);
        if ($this->TravelSpots->delete($travelSpot)) {
            $this->Flash->success(__('The travel spot has been deleted.'));
        } else {
            $this->Flash->error(__('The travel spot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
