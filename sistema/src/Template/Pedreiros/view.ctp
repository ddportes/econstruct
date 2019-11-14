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
            <div>Dashboard do Pedreiro <?= $pedreiro->pessoa->nome ?>.
                <div class="page-title-subheading">
                    <p>Informações Gerais do Pedreiro.</p>
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
                <div id="menu-acoes" tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Pedreiro').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Pedreiro','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Editar Pedreiro').'</span>', ['action' => 'edit',$pedreiro->id],['role'=>'button','title'=>'Editar Pedreiro','class'=>'nav-link','escape'=>false]) ?>
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
            <div class="card-body"><h5 class="card-title">Pedreiro <?= h($pedreiro->id) ?></h5>
                <div class="table-responsive">
                    <table class="mb-0 table table-striped">
                        <tr>
                            <th scope="row" style="width: 25%"><?= __('Nome') ?></th>
                            <td><?= h($pedreiro->pessoa->nome) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Situação') ?></th>
                            <td><?= $pedreiro->pedreiro_situacao->descricao ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Endereço') ?></th>
                            <td><?= (!empty($pedreiro->pessoa->enderecos[0]->logradouro)?$pedreiro->pessoa->enderecos[0]->enderecoCompleto():'<span class="text-danger">Endereço não cadastrado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Telefones') ?></th>
                            <td><?= (!empty($pedreiro->pessoa->allTelefones())?$pedreiro->pessoa->allTelefones():'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('E-mails') ?></th>
                            <td><?= (!empty($pedreiro->pessoa->allEmails())?$pedreiro->pessoa->allEmails():'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" ><?= __('Profissão') ?></th>
                            <td><?= (!empty($pedreiro->pessoa->profissao)?h($pedreiro->pessoa->profissao):'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" ><?= __('Nacionalidade') ?></th>
                            <td><?= (!empty($pedreiro->pessoa->nacionalidade)?h($pedreiro->pessoa->nacionalidade):'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" ><?= __('Naturalidade') ?></th>
                            <td><?= (!empty($pedreiro->pessoa->naturalidade)?h($pedreiro->pessoa->naturalidade):'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="main-card mb-3 card" style="height: 92%">
            <div class="card-body">
                <h5 class="card-title"><?= __('Observação') ?></h5>
                <div class="row">
                    <?= $this->Text->autoParagraph(h($pedreiro->observacao)); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Equipes do Pedreiro') ?></h5>
                    <?php if (!empty($pedreiro->equipe_pedreiros)): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('ID') ?></th>
                                    <th scope="col"><?= __('Projeto') ?></th>
                                    <th scope="col"><?= __('Equipe') ?></th>
                                </tr>
                                <?php foreach ($pedreiro->equipe_pedreiros as $equipe): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($equipe->equipe_id), ['controller'=>'Equipes','action' => 'edit', $equipe->equipe_id],['Title'=>'Alterar Equipe '.$equipe->equipe_id,'escape'=>false]) ?>   </td>
                                        <td><?= h($equipe->equipe->projeto->descricao) ?></td>
                                        <td><?= h($equipe->equipe->descricao) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhuma Equipe Cadastrada</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Projetos Envolvidos') ?></h5>
                    <?php if (!empty($pedreiro->projetos())): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('ID') ?></th>
                                    <th scope="col"><?= __('Descrição') ?></th>
                                    <th scope="col"><?= __('Equipe') ?></th>
                                    <th scope="col"><?= __('Situação') ?></th>
                                    <th scope="col"><?= __('Custo Estimanto') ?></th>
                                    <th scope="col"><?= __('Endereço') ?></th>
                                </tr>
                                <?php foreach ($pedreiro->projetos() as $projetos): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($projetos->id), ['controller'=>'Projetos','action' => 'edit', $projetos->id],['Title'=>'Editar Projeto '.$projetos->id,'escape'=>false]) ?>   </td>
                                        <td><?= h($projetos->descricao) ?></td>
                                        <td><?= h($projetos->equipe->descricao) ?></td>
                                        <td><?= h($projetos->projeto_situacao->descricao) ?></td>
                                        <td><?= h($projetos->custoEstimado(true)) ?></td>
                                        <td><?= (!empty($projetos->endereco->logradouro)?h($projetos->endereco->enderecoCompleto()):'<span class="text-danger">Não Informado</span>') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhum Projeto Cadastrado</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Recibos Cadastrados') ?></h5>
                    <?php if (!empty($pedreiro->recibos())): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Projeto') ?></th>
                                    <th scope="col"><?= __('Equipe') ?></th>
                                    <th scope="col"><?= __('Valor') ?></th>
                                    <th scope="col"><?= __('Data') ?></th>
                                </tr>
                                <?php foreach ($pedreiro->recibos() as $recibos): ?>
                                    <tr>
                                        <td><?= h($recibos->id) ?></td>
                                        <td><?= h($recibos->projeto->descricao) ?></td>
                                        <td><?= h($recibos->equipe->descricao) ?></td>
                                        <td><?= h($recibos->valor(true)) ?></td>
                                        <td><?= !is_null($recibos->data)?date('d/m/Y',strtotime($recibos->data)):'' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhum Recibo Cadastrado</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>