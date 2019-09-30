<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Gerenciar Usuários.
                <div class="page-title-subheading">
                    <p>Adicione, edite, resete senha dos usuários.</p>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true" onclick="$('#menu-acoes').toggle()" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Ações
                </button>
                <div id="menu-acoes" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Usuário').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Adicionar novo usuário','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Visitas Cadastradas</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('username','Usuário') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email','Email') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('papel_id','Papel') ?></th>
                            <th scope="col" class="actions"><?= __('Actions','Ações') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($users->count() > 0): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($user->id) ?></th>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td><?= h($user->user_papeis[0]->papel->descricao) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('<i class="fas fa-search"></i>', ['action' => 'view', $user->id],['Title'=>'Visualizar detalhes do usuário','escape'=>false]) ?>
                                        <?php if($isAdmin): ?>
                                            <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'editPerfil', $user->id],['Title'=>'Alterar Perfil do usuário','escape'=>false]) ?>
                                            <?= $this->Form->postLink('<i class="fas fa-key"></i>', ['action' => 'resetarSenha', $user->id],['data'=>['id'=>$user->id],'confirm'=>__('Deseja realmente resetar a senha do usuário {0}?',$user->username),'Title'=>'Resetar senha do usuário','escape'=>false]) ?>
                                        <?php endif; ?>
                                        <?= $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $user->id],['data'=>['id'=>$user->id],'confirm' => __('Deseja realmente excluir o usuário {0}?', $user->username),'Title'=>'Excluir usuário','escape'=>false]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="5" scope="row"><?= __('Não há usuários cadastrados.') ?></th>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <nav class="" aria-label="Paginacao">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('Inícial')) ?>
                        <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Próxima') . ' >') ?>
                        <?= $this->Paginator->last(__('Final') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} usuário(s) de {{count}} no total')]) ?></p>
                </nav>
            </div>
        </div>
    </div>
</div>
