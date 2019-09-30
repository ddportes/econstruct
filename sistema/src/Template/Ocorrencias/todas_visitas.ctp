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
            <div>Visitas.
                <div class="page-title-subheading">
                    <p>Listagem de todas as visitas já cadastradas.</p>
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" onclick="$('#menu-acoes').toggle()" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Ações
                </button>
                <div id="menu-acoes" tabindex="-1" role="menu" aria-hidden="true"  class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Visita de Novo Cliente').'</span>', ['action' => 'visitaNovoCliente'],['role'=>'button','title'=>'Visita de um Novo Cliente','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-file-add"></i><span>'.__('Visita Cliente Antigo').'</span>', ['action' => 'visita'],['role'=>'button','title'=>'Visita de Cliente já Cadastrado','class'=>'nav-link','escape'=>false]) ?>
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
                            <th scope="col" style="width:20%"><?= $this->Paginator->sort('observacao','Observação') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('projeto_id','Projeto') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('cliente_id','Cliente') ?></th>
                            <th scope="col"><?= __('Telefone') ?></th>
                            <th scope="col"><?= __('E-mail') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('data','Data da Visita') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('data_pendencia','Data de Pendência') ?></th>
                            <th scope="col" class="actions"><?= __('Actions','Ações') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($ocorrencias->count() > 0): ?>
                            <?php foreach ($ocorrencias as $ocorrencia): ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($ocorrencia->id) ?></th>
                                    <td><?= h(substr($ocorrencia->observacao,0,70)) ?>...</td>
                                    <td><?= $ocorrencia->has('projeto') ? $this->Html->link($ocorrencia->projeto->descricao, ['controller' => 'Projetos', 'action' => 'view', $ocorrencia->projeto->id]) : '' ?></td>
                                    <td><?= $ocorrencia->projeto->has('cliente') ? $this->Html->link($ocorrencia->projeto->cliente->pessoa->nome, ['controller' => 'Clientes', 'action' => 'view', $ocorrencia->projeto->cliente->id]) : '' ?></td>
                                    <td><?= $ocorrencia->projeto->cliente->pessoa->has('contatos') ? $ocorrencia->projeto->cliente->pessoa->allTelefones() : '' ?></td>
                                    <td><?= $ocorrencia->projeto->cliente->pessoa->has('contatos') ? $ocorrencia->projeto->cliente->pessoa->allEmails() : '' ?></td>
                                    <td><?= (is_null($ocorrencia->data)?'':h(date_format($ocorrencia->data,'d/m/Y'))) ?></td>
                                    <td><?= (is_null($ocorrencia->data_pendencia)?'':h(date_format($ocorrencia->data_pendencia,'d/m/Y'))) ?></td>

                                    <td class="actions">
                                        <?php //echo $this->Html->link('<i class="fas fa-search"></i>', ['action' => 'view', $ocorrencia->id],['Title'=>'Visualizar detalhes da Visita','escape'=>false]) ?>
                                        <?= $this->Html->link('<i class="fas fa-user-edit"></i>', ['action' => 'edit', $ocorrencia->id,$ocorrencia->ocorrencia_tipo_id],['Title'=>'Alterar Visita','escape'=>false]) ?>
                                        <?php //echo $this->Form->postLink('<i class="fas fa-trash-alt"></i>', ['action' => 'delete', $ocorrencia->id],['data'=>['id'=>$ocorrencia->id],'confirm' => __('Deseja realmente excluir a visita {0}?', $ocorrencia->id),'Title'=>'Excluir visita','escape'=>false]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <th colspan="4" scope="row"><?= __('Não há visitas cadastradas.') ?></th>
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
                    <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} visita(s) de {{count}} no total')]) ?></p>
                </nav>
            </div>
        </div>
    </div>
</div>
