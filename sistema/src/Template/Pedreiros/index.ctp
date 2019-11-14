<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-tools icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Pedreiros.
                <div class="page-title-subheading">
                    <p>Listagem de todos os pedreiros cadastrados.</p>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button"  onclick="$('#menu-acoes').toggle()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Ações
                </button>
                <div id="menu-acoes" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Pedreiro').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Pedreiro','class'=>'nav-link','escape'=>false]) ?>
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
            <div class="card-body"><h5 class="card-title">Pedreiros Cadastrados</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id','ID') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pessoa_id','Nome') ?></th>
                            <th scope="col"><?= __('Telefone') ?></th>
                            <th scope="col"><?= __('E-mail') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('pedreiro_situacao_id','Situação') ?></th>
                            <th scope="col"><?= __('Tem Equipe?') ?></th>
                            <th scope="col" style="width:20%"><?= $this->Paginator->sort('observacao','Observação') ?></th>
                            <th scope="col" class="actions"><?= __('Ações') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($pedreiros->count() > 0): ?>
                            <?php foreach ($pedreiros as $pedreiro): ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($pedreiro->id) ?></th>
                                    <td><?= $pedreiro->has('pessoa') ? $this->Html->link($pedreiro->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $pedreiro->pessoa->id]) : '' ?></td>
                                    <td><?= $pedreiro->pessoa->has('contatos') ? $pedreiro->pessoa->allTelefones() : '' ?></td>
                                    <td><?= $pedreiro->pessoa->has('contatos') ? $pedreiro->pessoa->allEmails() : '' ?></td>
                                    <td><?= $pedreiro->pedreiro_situacao->descricao ?></td>
                                    <td><?= ($pedreiro->hasEquipe()?'Sim':'Não') ?>
                                    <td><?= h(substr($pedreiro->observacao,0,70)) ?>...</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link('<i class="fas fa-search"></i>', ['action' => 'view', $pedreiro->id],['Title'=>'Visualizar detalhes do pedreiro','escape'=>false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'edit', $pedreiro->id],['Title'=>'Alterar pedreiro','escape'=>false]) ?>
                                        <?php echo $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $pedreiro->id],['data'=>['id'=>$pedreiro->id],'confirm' => __('Deseja realmente excluir o pedreiro {0}?', $pedreiro->id),'Title'=>'Excluir pedreiro','escape'=>false]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="4" scope="row"><?= __('Não há pedreiros cadastrados.') ?></th>
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
                    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} pedreiro(s) de {{count}} no total')]) ?></p>
                </nav>
            </div>
        </div>
    </div>
</div>
