<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FakeTravelTags Controller
 *
 * @property \App\Model\Table\FakeTravelTagsTable $FakeTravelTags
 * @method \App\Model\Entity\FakeTravelTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FakeTravelTagsController extends AppController
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
        $fakeTravelTags = $this->paginate($this->FakeTravelTags);

        $this->set(compact('fakeTravelTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Fake Travel Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fakeTravelTag = $this->FakeTravelTags->get($id, [
            'contain' => ['FakePlans'],
        ]);

        $this->set(compact('fakeTravelTag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fakeTravelTag = $this->FakeTravelTags->newEmptyEntity();
        if ($this->request->is('post')) {
            $fakeTravelTag = $this->FakeTravelTags->patchEntity($fakeTravelTag, $this->request->getData());
            if ($this->FakeTravelTags->save($fakeTravelTag)) {
                $this->Flash->success(__('The fake travel tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fake travel tag could not be saved. Please, try again.'));
        }
        $fakePlans = $this->FakeTravelTags->FakePlans->find('list', ['limit' => 200]);
        $this->set(compact('fakeTravelTag', 'fakePlans'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fake Travel Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fakeTravelTag = $this->FakeTravelTags->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fakeTravelTag = $this->FakeTravelTags->patchEntity($fakeTravelTag, $this->request->getData());
            if ($this->FakeTravelTags->save($fakeTravelTag)) {
                $this->Flash->success(__('The fake travel tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fake travel tag could not be saved. Please, try again.'));
        }
        $fakePlans = $this->FakeTravelTags->FakePlans->find('list', ['limit' => 200]);
        $this->set(compact('fakeTravelTag', 'fakePlans'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fake Travel Tag id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fakeTravelTag = $this->FakeTravelTags->get($id);
        if ($this->FakeTravelTags->delete($fakeTravelTag)) {
            $this->Flash->success(__('The fake travel tag has been deleted.'));
        } else {
            $this->Flash->error(__('The fake travel tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
