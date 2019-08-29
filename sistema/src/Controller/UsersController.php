<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use App\Utility\Apoio;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Modificacoes');
    }


    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login', 'logout','valida']);
        parent::beforeFilter($event);
    }

     public function login()
    {

        $this->viewBuilder()->setLayout('externo');

        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {

            try {
                $user = $this->Auth->identify();

                if (!$user) {
                    throw new \Exception('Usuário e/ou senha incorreta.');
                }

                $papeis = $this->Users->UserPapeis->find('all')->contain(['Papeis','Papeis.PermissaoPapeis','Papeis.PermissaoPapeis.Permissoes'])->where(['user_id'=>$user['id']])->toArray();

                $user['papeis'] = [];
                foreach($papeis as $key=>$val){
                    $user['papeis'] += [$val->papel->descricao=>[]];
                    foreach($val->papel->permissao_papeis as $key_p => $val_p){
                        $user['papeis'][$val->papel->descricao] += [$val_p->permissao->id => $val_p->permissao->descricao];
                    }
                }

                $this->Auth->setUser($user);
                $this->request->getSession()->delete('UserLogin');

                if($user['status'] == 'Pendente'){
                    $this->Flash->warning(__('Antes de acessar o sistema, você deve validar seu usuário no email que foi enviado.'));
                    $this->redirect(['action'=>'logout']);
                }

                if($user['modified'] == $user['created']){
                    $this->Flash->warning(__('Você deve alterar a senha no primeiro acesso.'));
                    return $this->redirect(['controller'=>'Users','action'=>'edit',$user['id']]);
                }

                return $this->redirect($this->Auth->redirectUrl());


            } catch (\Exception $e) {

                $this->Flash->auth($e->getMessage());
            }

        } else {
            $this->render('home', 'login');
        }
    }

    public function loginAdmin(){

        $user = $this->Auth->user();

        if ($this->request->is('post')) {
            $dados = $this->request->getData();

            if(isset($dados['selectEmpresa'])) {

                $user['empresa_id'] = $dados['empresa_id'];

                $this->Auth->setUser($user);

                $this->viewBuilder()->setLayout('default');

                $empresa = $this->Users->Empresas->get($user['empresa_id']);

                $this->loadModel('Modificacoes');
                $log = $this->Modificacoes->newEntity();
                $log->datahora = date('Y-m-d H:i');
                $log->user_id = $user['id'];
                $log->empresa_id = $user['empresa_id'];
                $log->controller = 'Users';
                $log->action = 'login';
                $log->dados_originais = json_encode([$user['id'],$user['username'],'Logou']);
                $log->dados_novos = json_encode([$user['id'],$user['username'],'Logou']);

                if (!$this->Modificacoes->save($log)) {
                    $this->Flash->error(__('Erro de Log. Por favor, tente novamente.'));
                }

                $this->Flash->default(__('Você está visualizando a empresa '.$empresa->nome_fantasia.'.'));

                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'display','home'
                ]);
            }
        }

        if($user['empresa_id'] !== 0){

            $dados_originais = json_encode([$user['id'],$user['username'],'Logou']);
            $dados_novos = json_encode([$user['id'],$user['username'],'Logou']);

            if(!$this->Modificacoes->emiteLog('Users','login',$dados_originais,$dados_novos)) {
                $this->Flash->error(__('Erro ao gravar log.'));
            }

            return $this->redirect([
                'controller' => 'Pages',
                'action' => 'display','home'
            ]);
        }


        $this->viewBuilder()->setLayout('externo');

        $empresas = $this->Users->Empresas->find('list')->select(['id','nome_fantasia'])->toArray();

        $this->set(compact('empresas'));
    }

    public function trocarEmpresa(){
        $user = $this->Auth->user();
        $userBd = $this->Users->get($user['id']);

        if($userBd->empresa_id === 0) {
            $user['empresa_id'] = 0;
            $this->Auth->setUser($user);
            $this->redirect(['controller' => 'Users', 'action' => 'loginAdmin']);
        }else{
            $this->redirect(['controller' => 'Pages', 'action' => 'display','home']);
        }
    }
/*
    public function emiteLog($controller,$action,$originais,$novos){
        if(!empty($this->Auth->user())) {
            $user = $this->Auth->user();
        }else{
            $o = json_decode($originais,true);
            $user['id'] = $o[0];
            $user['username'] = $o[1];
            $user['empresa_id'] = $o[2];
        }

        $this->loadModel('Modificacoes');
        $log = $this->Modificacoes->newEntity();
        $log->datahora = date('Y-m-d H:i');
        $log->user_id = $user['id'];
        $log->empresa_id = $user['empresa_id'];
        $log->controller = $controller;
        $log->action = $action;
        $log->dados_originais = $originais;
        $log->dados_novos = $novos;

        if (!$this->Modificacoes->save($log)) {
            $this->Flash->error(__('Erro de Log. Por favor, tente novamente.'));
        }
    }
*/

    public function logout()
    {
        $user = $this->Auth->user();
        $dados_originais = json_encode([$user['id'],$user['username'],'Saiu do Sistema']);
        $dados_novos = json_encode([$user['id'],$user['username'],'Saiu do Sistema']);
        if($this->Modificacoes->emiteLog('Users','logout',$dados_originais,$dados_novos)) {
            $this->Flash->success('Logout efetuado.');
        }else{
            $this->Flash->error(__('Erro ao gravar log.'));
        }

        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $user = $this->Auth->user();
        $users = $this->paginate($this->Users,['contain'=>
                                                   ['UserPapeis','UserPapeis.Papeis'],
                                               'conditions'=>
                                                   ['empresa_id'=>$user['empresa_id']],
                                               'limit'=>1
                                              ]
                                );

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        try {
            $user = $this->Users->get($id, [
                'contain' => ['UserPapeis','UserPapeis.Papeis','UserPapeis.Papeis','UserPapeis.Papeis.PermissaoPapeis','UserPapeis.Papeis.PermissaoPapeis.Permissoes']
            ]);
        }catch(\Exception $e) {
            $this->Flash->error(__('Usuário não encontrado.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        $userS = $this->Auth->user();
        if($user->empresa_id <> 0 && $user->empresa_id <> $userS['empresa_id']){
            $this->Flash->error(__('Você não tem permissão para essa operação.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        $this->set('user', $user);
    }

    /**
     * @param $hash
     */
    public function valida($h){
        $user = $this->Users->find()->where(['hash'=>$h])->first();

        if($user) {
            if ($user->status == 'Pendente') {
                $user->status = 'Ativo';
                $user->modified = $user->created;

                $this->viewBuilder()->setLayout('externo');
                try {
                    if ($this->Users->save($user)) {
                        $dados_originais = json_encode([$user->id,$user->username,$user->empresa_id,'usuário pendente']);
                        $dados_novos = json_encode([$user->id,$user->username,$user->empresa_id,'usuário ativado']);

                        if($this->Modificacoes->emiteLog('Users','valida',$dados_originais,$dados_novos)) {
                            $this->Flash->success(__('O usuário ' . $user->username . ' validado com sucesso. Acesse o sistema.'));
                        }else{
                            $this->Flash->error(__('Erro ao gravar log.'));
                        }
                    }
                }catch(\Exception $e){
                    $this->Flash->error(__('O usuário ' . $user->username . ' não foi validado corretamente. Entre em contato com o administrador do sistema.'));
                }
            } else {
                $this->Flash->success(__('O usuário ' . $user->username . ' já validado anteriormente. Acesse o sistema.'));
            }
        }
        else{
            $this->Flash->error(__('O usuário não encontrado.'));
        }
        //$this->render('login','externo');

        $this->viewBuilder()->setLayout('externo');
        $this->redirect(['controller'=>'Users','action'=>'login']);


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $dados = $this->request->getData();
            $dados['empresa_id'] = $this->user['empresa_id'];
            $dados['u_id'] = $this->user['id'];
            $dados['password'] = Apoio::generatePassword(6);
            $dados['status'] = 'Pendente';
            $dados['hash'] = hash('md5','e-construct usuario '.$dados['username'].'- email '.$dados['email'].' - '.date('Y-m-d H:i:s'));

            //envia email
            $corpo = '<h3>Novo Usuário:</h3>
                    <p>Usuário <b>'.$dados['username'].'</b> criado com sucesso</p>
                    <p>Gerada a senha temporária <b>'.$dados['password'].'</b></p>
                    <p>Para utilizar esse usuário, favor confirmar clicando neste link: <a href="http://localhost/econstruct/sistema/valida/'.$dados['hash'].'">http://localhost/econstruct/sistema/valida/'.$dados['hash'].'</a></p>';
            Apoio::enviaEmail('new_user',$corpo,['email_admin'=>'ddppandego@hotmail.com','email'=>$dados['email']]);

            $user = $this->Users->patchEntity($user, $dados);
            if ($this->Users->save($user)) {
                $dados_papel['user_id'] = $user->id;
                $dados_papel['papel_id'] = $dados['papel_id'];
                $dados_papel['u_id'] = $this->user['id'];
                $dados_papel['empresa_id'] = $this->user['empresa_id'];

                $userPapel = $this->Users->UserPapeis->newEntity();
                $userPapel = $this->Users->UserPapeis->patchEntity($userPapel, $dados_papel);

                if($this->Users->UserPapeis->save($userPapel)) {

                    $dados_originais = json_encode([$user['id'], $user['username'], 'Novo Usuário',$dados['papel_id']]);
                    $dados_novos = json_encode([$user['id'], $user['username'], 'Novo Usuário',$dados['papel_id']]);
                    if($this->Modificacoes->emiteLog('Users', 'add', $dados_originais, $dados_novos)) {
                        $this->Flash->auth(__('O usuário ' . $dados['username'] . ' foi criado com sucesso. Foi enviado email com a senha temporária e para confirmação de email.'));
                    }else{
                        $this->Flash->error(__('Erro ao gravar log.'));
                    }

                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('O usuário não foi salvo. Por favor, tente novamente.'));
        }

        $empresas = $this->Users->Empresas->find('list')->select(['id','nome_fantasia'])->toArray();
        $papeis = $this->Users->UserPapeis->Papeis->find('list')->select(['id','descricao'])->toArray();

        $this->set(compact('user','empresas','papeis'));
    }

    public function resetarSenha(){
        $sessao = $this->Auth->user();

        $testUser = $this->Users->get($sessao['id']);

        if($testUser->empresa_id != 0){
            $this->Flash->error(__('Você não tem permissão para essa operação.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        if ($this->request->is('post')) {
            $form = $this->request->getData();

            $user = $this->Users->find('all')->where(['id' => $form['id']]);
            $dados = $user->first()->toArray();
            $user = $this->Users->get($form['id']);

            $dados['password'] = Apoio::generatePassword(6);
            $dados['modified'] = $dados['created'];

            try {
                $user = $this->Users->patchEntity($user, $dados);
                if ($this->Users->save($user)) {

                    $corpo = '<h3>Senha Resetada:</h3>
                    <p>Usuário '.$dados['username'].' teve a senha resetada.</p>
                    <p>A nova senha é <b>'.$dados['password'].'</b></p>
                    <p>Em seu primeiro login, será solicitada a troca da senha.</p>';

                    Apoio::enviaEmail('reset_password',$corpo,['email_admin'=>'ddppandego@hotmail.com','email'=>$dados['email']]);

                    $dados_originais = json_encode([$user->id, $user->username, 'Resetou senha']);
                    $dados_novos = json_encode([$user->id, $user->username, 'Resetou senha']);
                    if($this->Modificacoes->emiteLog('Users', 'resetarSenha', $dados_originais, $dados_novos)) {
                        $this->Flash->auth(__('Senha resetada com sucesso.'));
                    }else{
                        $this->Flash->error(__('Erro ao gravar log.'));
                    }

                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('Senha não foi alterada. Por favor, tente novamente.'));
            }catch(\Exception $e){
                $this->Flash->error(__('Senha não foi alterada. Por favor, tente novamente.'));
            }
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }

        $users = $this->Users->find('list')->where(['empresa_id'=>$sessao['empresa_id']])->toArray();
        $this->set(compact('users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sessao = $this->Auth->user();

        try {
            $user = $this->Users->get($id);
        }catch(\Exception $e){
            $this->Flash->error(__('Usuário não Encontrado.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        if((int) $id <> (int) $sessao['id']){
            $this->Flash->error(__('Você não tem permissão para essa operação.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados = $this->request->getData();

            $pass = $user->password;

            if(!(new DefaultPasswordHasher)->check($dados['current-password'],$pass)){
                $this->Flash->error(__('Senha atual não confere.'));
                return $this->redirect(['action' => 'edit',$id]);
            }

            if($dados['new-password'] <> $dados['repeat-password']){
                $this->Flash->error(__('Senha nova não confere.'));
                return $this->redirect(['action' => 'edit',$id]);
            }

            $dados['u_id'] = $this->user['id'];
            $dados['password'] = $dados['new-password'];

            $user = $this->Users->patchEntity($user, $dados);
            if ($this->Users->save($user)) {

                $dados_originais = json_encode([$user->id,$user->username,'trocou senha']);
                $dados_novos = json_encode([$user->id,$user->username,'trocou senha']);
                if($this->Modificacoes->emiteLog('Users','edit',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('Senha alterada com sucesso.'));
                }else{
                    $this->Flash->error(__('Erro ao gravar log.'));
                }

                return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
            }
            $this->Flash->error(__('Senha não foi alterada. Por favor, tente novamente.'));
        }

        $this->set(compact('user'));
    }

    public function editPerfil($id = null)
    {
        $sessao = $this->Auth->user();

        try {
            $user = $this->Users->get($id);
            $papel = $this->Users->UserPapeis->find()->where(['user_id'=>$id])->first();
        }catch(\Exception $e){
            $this->Flash->error(__('Usuário não Encontrado.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        if(!array_key_exists('administrador',$sessao['papeis'])){
            $this->Flash->error(__('Você não tem permissão para essa operação.'));
            return $this->redirect(['controller'=>'Pages','action' => 'display','home']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados = $this->request->getData();

            $papel_old = $papel;
            $dados_papel['u_id'] = $this->user['id'];
            $dados_papel['papel_id'] = $dados['papel_id'];

            $papel = $this->Users->UserPapeis->patchEntity($papel, $dados_papel);
            if ($this->Users->UserPapeis->save($papel)) {

                $dados_originais = json_encode([$user->id,$user->username,'Papel antigo',$papel_old->papel_id]);
                $dados_novos = json_encode([$user->id,$user->username,'Papel novo',$dados['papel_id']]);
                if($this->Modificacoes->emiteLog('Users','editPapel',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('Papel alterado com sucesso.'));
                }else{
                    $this->Flash->error(__('Erro ao gravar log.'));
                }
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            $this->Flash->error(__('Papel não foi alterado. Por favor, tente novamente.'));
        }

        $papeis = $this->Users->UserPapeis->Papeis->find('list')->toArray();

        $this->set(compact('user','papeis','papel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        $userPapeis = $this->Users->UserPapeis->find()->where(['user_id'=>$user->id])->first();
        if ($this->Users->UserPapeis->delete($userPapeis)) {
            if ($this->Users->delete($user)) {

                $dados_originais = json_encode([$user->id,$user->username,'Excluiu Usuário']);
                $dados_novos = json_encode(['Excluiu Usuário']);
                if($this->Modificacoes->emiteLog('Users','delete',$dados_originais,$dados_novos)) {
                    $this->Flash->success(__('Exclusão realizada com sucesso.'));
                }else{
                    $this->Flash->error(__('Erro ao gravar log.'));
                }

            } else {
                $this->Flash->error(__('O usuário não foi excluído. Por favor, tente novamente.'));
            }
        }else{
            $this->Flash->error(__('A associação do usuário com o papel não foi excluída. Por favor, tente novamente.'));
        }


        return $this->redirect(['action' => 'index']);
    }

}
