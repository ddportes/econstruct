<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Itens Controller
 *
 * @property \App\Model\Table\ItensTable $Itens
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Notas', 'Fornecedores', 'Produtos']
        ];
        $itens = $this->paginate($this->Itens);

        $this->set(compact('itens'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Itens->get($id, [
            'contain' => ['Notas', 'Fornecedores', 'Produtos']
        ]);

        $this->set('item', $item);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Itens->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Itens->patchEntity($item, $this->request->getData());
            if ($this->Itens->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $notas = $this->Itens->Notas->find('list', ['limit' => 200]);
        $fornecedores = $this->Itens->Fornecedores->find('list', ['limit' => 200]);
        $produtos = $this->Itens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('item', 'notas', 'fornecedores', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Itens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Itens->patchEntity($item, $this->request->getData());
            if ($this->Itens->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $notas = $this->Itens->Notas->find('list', ['limit' => 200]);
        $fornecedores = $this->Itens->Fornecedores->find('list', ['limit' => 200]);
        $produtos = $this->Itens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('item', 'notas', 'fornecedores', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Itens->get($id);
        if ($this->Itens->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
