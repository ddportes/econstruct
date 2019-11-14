<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Dashboard do Cliente <?= $cliente->pessoa->nome ?>.
                <div class="page-title-subheading">
                    <p>Informações Gerais do Cliente.</p>
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
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Cliente').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Cliente','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Editar Cliente').'</span>', ['action' => 'edit',$cliente->id],['role'=>'button','title'=>'Editar Cliente','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Projeto').'</span>', ['controller'=>'Projetos','action' => 'add'],['role'=>'button','title'=>'Novo Projeto','class'=>'nav-link','escape'=>false]) ?>
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
            <div class="card-body"><h5 class="card-title">Cliente <?= h($cliente->id) ?></h5>
                <div class="table-responsive">
                    <table class="mb-0 table table-striped">
                        <tr>
                            <th scope="row" style="width: 25%"><?= __('Nome') ?></th>
                            <td><?= h($cliente->pessoa->nome) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Situação') ?></th>
                            <td><?= $cliente->cliente_situacao->descricao ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Endereço') ?></th>
                            <td><?= (!empty($cliente->pessoa->enderecos[0]->logradouro)?$cliente->pessoa->enderecos[0]->enderecoCompleto():'<span class="text-danger">Endereço não cadastrado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Telefones') ?></th>
                            <td><?= (!empty($cliente->pessoa->allTelefones())?$cliente->pessoa->allTelefones():'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('E-mails') ?></th>
                            <td><?= (!empty($cliente->pessoa->allEmails())?$cliente->pessoa->allEmails():'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" ><?= __('Profissão') ?></th>
                            <td><?= (!empty($cliente->pessoa->profissao)?h($cliente->pessoa->profissao):'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" ><?= __('Nacionalidade') ?></th>
                            <td><?= (!empty($cliente->pessoa->nacionalidade)?h($cliente->pessoa->nacionalidade):'<span class="text-danger">Não Informado</span>') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" ><?= __('Naturalidade') ?></th>
                            <td><?= (!empty($cliente->pessoa->naturalidade)?h($cliente->pessoa->naturalidade):'<span class="text-danger">Não Informado</span>') ?></td>
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
                    <?= $this->Text->autoParagraph(h($cliente->observacao)); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Projetos Cadastrados') ?></h5>
                    <?php if (!empty($cliente->projetos)): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('ID') ?></th>
                                    <th scope="col"><?= __('Descrição') ?></th>
                                    <th scope="col"><?= __('Situação') ?></th>
                                    <th scope="col"><?= __('Custo Estimanto') ?></th>
                                    <th scope="col"><?= __('Endereço') ?></th>
                                </tr>
                                <?php foreach ($cliente->projetos as $projetos): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($projetos->id), ['controller'=>'Projetos','action' => 'edit', $projetos->id],['Title'=>'Editar Projeto '.$projetos->id,'escape'=>false]) ?>   </td>
                                        <td><?= h($projetos->descricao) ?></td>
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
                    <h5 class="card-title"><?= __('Ocorrências do Cliente') ?></h5>
                    <?php if (!empty($cliente->allOcorrencias())): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('ID') ?></th>
                                    <th scope="col"><?= __('Tipo de Ocorrência') ?></th>
                                    <th scope="col"><?= __('Projeto') ?></th>
                                    <th scope="col"><?= __('Observacao') ?></th>
                                    <th scope="col"><?= __('Data') ?></th>
                                    <th scope="col"><?= __('Data de Pendência') ?></th>
                                </tr>
                                <?php foreach ($cliente->allOcorrencias() as $ocorrencias): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($ocorrencias->id), ['controller'=>'Ocorrencias','action' => 'edit', $ocorrencias->id,$ocorrencias->ocorrencia_tipo_id],['Title'=>'Alterar Visita '.$ocorrencias->id,'escape'=>false]) ?>   </td>
                                        <td><?= h($ocorrencias->ocorrencia_tipo->descricao) ?></td>
                                        <td><?= h($ocorrencias->projeto_desc) ?></td>
                                        <td><?= h($ocorrencias->observacao) ?></td>
                                        <td><?= !is_null($ocorrencias->data)?date('d/m/Y',strtotime($ocorrencias->data)):'' ?></td>
                                        <td><?= !is_null($ocorrencias->data_pendencia)?date('d/m/Y',strtotime($ocorrencias->data_pendencia)):'' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhuma Ocorrência Cadastrada</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Orçamentos Cadastrados') ?></h5>
                    <?php if (!empty($cliente->allOrcamentos())): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Projeto') ?></th>
                                    <th scope="col"><?= __('Custo') ?></th>
                                    <th scope="col"><?= __('Total') ?></th>
                                    <th scope="col"><?= __('Data Inicial') ?></th>
                                    <th scope="col"><?= __('Data Entrega') ?></th>
                                    <th scope="col"><?= __('Observacao') ?></th>
                                    <th scope="col"><?= __('Tem Contrato?') ?></th>
                                </tr>
                                <?php foreach ($cliente->allOrcamentos() as $orcamentos): ?>
                                    <tr>
                                        <td><?= h($orcamentos->id) ?></td>
                                        <td><?= h($orcamentos->projeto_desc) ?></td>
                                        <td><?= h($orcamentos->custo(true)) ?></td>
                                        <td><?= h($orcamentos->total(true)) ?></td>
                                        <td><?= !is_null($orcamentos->data_inicial)?date('d/m/Y',strtotime($orcamentos->data_inicial)):'' ?></td>
                                        <td><?= !is_null($orcamentos->data_entrega)?date('d/m/Y',strtotime($orcamentos->data_entrega)):'' ?></td>
                                        <td><?= h($orcamentos->observacao) ?></td>
                                        <td><?= ($orcamentos->hasContrato()?$this->Html->link('<i class="fas fa-search text-success"></i>', ['controller' => 'Contratos', 'action' => 'view', $orcamentos->projeto->contrato_id,$orcamentos->projeto->id],['target'=>'_blank','title'=>'Visualizar Contrato','escape'=>false]).'&nbsp'.$this->Html->link('<i class="fas fa-file-pdf text-success"></i>', ['controller' => 'Contratos', 'action' => 'exportarPdf', $orcamentos->projeto->contrato_id],['target'=>'_blank','title'=>'Exportar Contrato para Excel','escape'=>false]):'<span class="text-secondary">Não</span>') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhum Orçamento Cadastrado</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Recebimentos Cadastrados') ?></h5>
                    <?php if (!empty($cliente->allRecebimentos())): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Projeto') ?></th>
                                    <th scope="col"><?= __('Valor') ?></th>
                                    <th scope="col"><?= __('Data') ?></th>
                                    <th scope="col"><?= __('Observacao') ?></th>
                                </tr>
                                <?php foreach ($cliente->allRecebimentos() as $recebimentos): ?>
                                    <tr>
                                        <td><?= h($recebimentos->id) ?></td>
                                        <td><?= h($recebimentos->projeto_desc) ?></td>
                                        <td><?= h($recebimentos->valor(true)) ?></td>
                                        <td><?= !is_null($recebimentos->data)?date('d/m/Y',strtotime($recebimentos->data)):'' ?></td>
                                        <td><?= h($recebimentos->observacao) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhum Recebimentos Cadastrado</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>