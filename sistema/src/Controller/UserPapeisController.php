<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserPapeis Controller
 *
 * @property \App\Model\Table\UserPapeisTable $UserPapeis
 *
 * @method \App\Model\Entity\UserPapel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserPapeisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Papeis']
        ];
        $userPapeis = $this->paginate($this->UserPapeis);

        $this->set(compact('userPapeis'));
    }

    /**
     * View method
     *
     * @param string|null $id User Papel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userPapel = $this->UserPapeis->get($id, [
            'contain' => ['Users', 'Papeis']
        ]);

        $this->set('userPapel', $userPapel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userPapel = $this->UserPapeis->newEntity();
        if ($this->request->is('post')) {
            $userPapel = $this->UserPapeis->patchEntity($userPapel, $this->request->getData());
            if ($this->UserPapeis->save($userPapel)) {
                $this->Flash->success(__('The user papel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user papel could not be saved. Please, try again.'));
        }
        $users = $this->UserPapeis->Users->find('list', ['limit' => 200]);
        $papeis = $this->UserPapeis->Papeis->find('list', ['limit' => 200]);
        $this->set(compact('userPapel', 'users', 'papeis'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Papel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userPapel = $this->UserPapeis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userPapel = $this->UserPapeis->patchEntity($userPapel, $this->request->getData());
            if ($this->UserPapeis->save($userPapel)) {
                $this->Flash->success(__('The user papel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user papel could not be saved. Please, try again.'));
        }
        $users = $this->UserPapeis->Users->find('list', ['limit' => 200]);
        $papeis = $this->UserPapeis->Papeis->find('list', ['limit' => 200]);
        $this->set(compact('userPapel', 'users', 'papeis'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Papel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userPapel = $this->UserPapeis->get($id);
        if ($this->UserPapeis->delete($userPapel)) {
            $this->Flash->success(__('The user papel has been deleted.'));
        } else {
            $this->Flash->error(__('The user papel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
