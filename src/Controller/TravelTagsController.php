<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TravelTags Controller
 *
 * @property \App\Model\Table\TravelTagsTable $TravelTags
 * @method \App\Model\Entity\TravelTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TravelTagsController extends AppController
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
        $travelTags = $this->paginate($this->TravelTags);

        $this->set(compact('travelTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Travel Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travelTag = $this->TravelTags->get($id, [
            'contain' => ['Plans'],
        ]);

        $this->set(compact('travelTag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $travelTag = $this->TravelTags->newEmptyEntity();
        if ($this->request->is('post')) {
            $travelTag = $this->TravelTags->patchEntity($travelTag, $this->request->getData());
            if ($this->TravelTags->save($travelTag)) {
                $this->Flash->success(__('The travel tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel tag could not be saved. Please, try again.'));
        }
        $plans = $this->TravelTags->Plans->find('list', ['limit' => 200]);
        $this->set(compact('travelTag', 'plans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Travel Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travelTag = $this->TravelTags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travelTag = $this->TravelTags->patchEntity($travelTag, $this->request->getData());
            if ($this->TravelTags->save($travelTag)) {
                $this->Flash->success(__('The travel tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel tag could not be saved. Please, try again.'));
        }
        $plans = $this->TravelTags->Plans->find('list', ['limit' => 200]);
        $this->set(compact('travelTag', 'plans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travelTag = $this->TravelTags->get($id);
        if ($this->TravelTags->delete($travelTag)) {
            $this->Flash->success(__('The travel tag has been deleted.'));
        } else {
            $this->Flash->error(__('The travel tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
