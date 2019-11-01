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
            <div>Dashboard do Projeto <?= $projeto->id ?>.
                <div class="page-title-subheading">
                    <p>Visão geral do projeto e seus detalhes.</p>
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
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Projeto').'</span>', ['action' => 'add'],['role'=>'button','title'=>'Novo Projeto','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Editar Projeto').'</span>', ['controller'=>'Ocorrencias','action' => 'edit',$projeto->id],['role'=>'button','title'=>'Editar Projeto','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Nova Ocorrência').'</span>', ['controller'=>'Ocorrencias','action' => 'add'],['role'=>'button','title'=>'Nova Ocorrência','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Orçamento/Contrato').'</span>', ['controller'=>'Orcamentos','action' => 'add',$projeto->id],['role'=>'button','title'=>'Novo Orçamento/Contrato','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Recebimento').'</span>', ['controller'=>'Recebimentos','action' => 'add',$projeto->id],['role'=>'button','title'=>'Novo Recebimento','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Novo Recibo').'</span>', ['controller'=>'Recibos','action' => 'add',$projeto->id],['role'=>'button','title'=>'Novo Recibo','class'=>'nav-link','escape'=>false]) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-link-icon lnr lnr-plus-circle"></i><span>'.__('Lançar Nota').'</span>', ['controller'=>'Notas','action' => 'add',$projeto->id],['role'=>'button','title'=>'Lançar Nota','class'=>'nav-link','escape'=>false]) ?>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Custo Estimado') ?></div>
                            <div class="widget-subheading"><?= __('Custo Estimado durante o Planejado') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-primary"><span style="font-size: 0.55em"><?= $projeto->custoEstimado(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Total Recibos Emitidos') ?></div>
                            <div class="widget-subheading"><?= __('Total de Recibos Emitidos para Equipe') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span style="font-size: 0.55em"><?= $projeto->totalRecibos(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Total de Notas Pagas') ?></div>
                            <div class="widget-subheading"><?= __('Total de Notas pagas para Fornecedores') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><span style="font-size: 0.55em"><?= $projeto->totalNotas(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Estimado X Realizado') ?></div>
                            <div class="widget-subheading"><?= __('Custos') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <?php if($projeto->estimadoRealizadoCustos() < 80.0): ?>
                            <div class="widget-numbers text-success"><span style="font-size: 0.55em"><?= $projeto->estimadoRealizadoCustos(true) ?></span></div>
                            <?php elseif($projeto->estimadoRealizadoCustos() > 94.9): ?>
                            <div class="widget-numbers text-warning"><span style="font-size: 0.55em"><?= $projeto->estimadoRealizadoCustos(true) ?></span></div>
                            <?php else: ?>
                            <div class="widget-numbers text-danger"><span style="font-size: 0.55em"><?= $projeto->estimadoRealizadoCustos(true) ?></span></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Valor do Projeto') ?></div>
                            <div class="widget-subheading"><?= __('Valor a Receber Orçado e em Contrato') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-primary"><span style="font-size: 0.55em"><?= $projeto->valorProjeto(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Total Recebido') ?></div>
                            <div class="widget-subheading"><?= __('Total de Recebimentos do Projeto') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><span style="font-size: 0.55em"><?= $projeto->totalRecebimentos(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Estimado X Realizado') ?></div>
                            <div class="widget-subheading"><?= __('Recebimentos') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <?php if($projeto->estimadoRealizadoRecebimentos() < 80.0): ?>
                                <div class="widget-numbers text-danger"><span style="font-size: 0.55em"><?= $projeto->estimadoRealizadoRecebimentos(true) ?></span></div>
                            <?php elseif($projeto->estimadoRealizadoRecebimentos() > 94.9): ?>
                                <div class="widget-numbers text-warning"><span style="font-size: 0.55em"><?= $projeto->estimadoRealizadoRecebimentos(true) ?></span></div>
                            <?php else: ?>
                                <div class="widget-numbers text-success"><span style="font-size: 0.55em"><?= $projeto->estimadoRealizadoRecebimentos(true) ?></span></div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Projeto <?= h($projeto->descricao).' - '.h($projeto->cliente->pessoa->nome) ?></h5>
                <div class="table-responsive">
                    <table class="mb-0 table table-striped">
                        <tr>
                            <th scope="row" style="width: 25%"><?= __('Descrição') ?></th>
                            <td><?= h($projeto->descricao) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Cliente') ?></th>
                            <td><?= $projeto->has('cliente') ? $this->Html->link($projeto->cliente->pessoa->nome, ['controller' => 'Clientes', 'action' => 'view', $projeto->cliente->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Situação') ?></th>
                            <td><?= $projeto->has('projeto_situacao') ? $projeto->projeto_situacao->descricao : 'Visita' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Contrato') ?></th>
                            <td><?= !is_null($projeto->contrato_id)? $this->Html->link('<i class="fas fa-search"></i>', ['controller' => 'Contratos', 'action' => 'view', $projeto->contrato_id,$projeto->id],['target'=>'_blank','title'=>'Visualizar Contrato','escape'=>false]).'&nbsp'.$this->Html->link('<i class="fas fa-file-pdf"></i>', ['controller' => 'Contratos', 'action' => 'exportarPdf', $projeto->contrato_id],['target'=>'_blank','title'=>'Exportar Contrato para Excel','escape'=>false]) : 'Não Gerado' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Equipe Responsável') ?></th>
                            <td><?= $projeto->has('equipe')? $this->Html->link($projeto->equipe->descricao, ['controller' => 'Equipes', 'action' => 'view', $projeto->equipe->id]) : 'Sem Equipe' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Endereço') ?></th>
                            <td><?= $projeto->endereco->enderecoCompleto() ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="main-card mb-3 card" style="height: 92%">
            <div class="card-body">
                <h5 class="card-title"><?= __('Detalhes do Projeto') ?></h5>
                <div class="row">
                    <?= $this->Text->autoParagraph(h($projeto->detalhes)); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="main-card mb-3 card" style="height: 92%">
            <div class="card-body">
                <h5 class="card-title"><?= __('Observacão sobre o Projeto') ?></h5>
                <div class="row">
                    <?= $this->Text->autoParagraph(h($projeto->observacao)); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Área do Terreno') ?></div>
                            <div class="widget-subheading"><?= __('Área total do terreno em m²') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->areaTerreno(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Frente do Terreno') ?></div>
                            <div class="widget-subheading"><?= __('Espaço da Frente do Terreno em Metros') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->frente(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Profundidade do Terreno') ?></div>
                            <div class="widget-subheading"><?= __('Comprimento da frente ao fundo do terreno em Metros') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->fundo(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Área Construída Coberta') ?></div>
                            <div class="widget-subheading"><?= __('Total de Área Construída Coberta em m²') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->areaConstruidaCoberta(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Área Construída Coberta') ?></div>
                            <div class="widget-subheading"><?= __('Total de Área Construída em m²') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->areaConstruidaCoberta(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Total Área Construída') ?></div>
                            <div class="widget-subheading"><?= __('Total de Área Construída em m²') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->areaTotalConstruida(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading"><?= __('Taxa de Ocupação') ?></div>
                            <div class="widget-subheading"><?= __('Percentual de Ocupação do Terreno com Construção') ?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-info"><span style="font-size: 0.55em"><?= $projeto->taxaOcupacao(true) ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Ocorrências do Projeto') ?></h5>
                    <?php if (!empty($projeto->ocorrencias)): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('ID') ?></th>
                                    <th scope="col"><?= __('Tipo de Ocorrência') ?></th>
                                    <th scope="col"><?= __('Observacao') ?></th>
                                    <th scope="col"><?= __('Data') ?></th>
                                    <th scope="col"><?= __('Data de Pendência') ?></th>
                                </tr>
                                <?php foreach ($projeto->ocorrencias as $ocorrencias): ?>
                                    <tr>
                                        <td><?= $this->Html->link(h($ocorrencias->id), ['controller'=>'Ocorrencias','action' => 'edit', $ocorrencias->id,$ocorrencias->ocorrencia_tipo_id],['Title'=>'Alterar Visita '.$ocorrencias->id,'escape'=>false]) ?>   </td>
                                        <td><?= h($ocorrencias->ocorrencia_tipo->descricao) ?></td>
                                        <td><?= h($ocorrencias->observacao) ?></td>
                                        <td><?= !is_null($ocorrencias->data)?date('d/m/Y',strtotime($ocorrencias->data)):'' ?></td>
                                        <td><?= !is_null($ocorrencias->data_pendencia)?date('d/m/Y',strtotime($ocorrencias->data_pendencia)):'' ?></td>
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
                    <h5 class="card-title"><?= __('Orçamentos Cadastrados') ?></h5>
                    <?php if (!empty($projeto->orcamentos)): ?>
                    <div class="table-responsive">
                        <table class="mb-0 table table-striped">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Custo') ?></th>
                                <th scope="col"><?= __('Total') ?></th>
                                <th scope="col"><?= __('Data Inicial') ?></th>
                                <th scope="col"><?= __('Data Entrega') ?></th>
                                <th scope="col"><?= __('Observacao') ?></th>
                                <th scope="col"><?= __('Tem Contrato?') ?></th>
                            </tr>
                            <?php foreach ($projeto->orcamentos as $orcamentos): ?>
                                <tr>
                                    <td><?= h($orcamentos->id) ?></td>
                                    <td><?= h($orcamentos->custo(true)) ?></td>
                                    <td><?= h($orcamentos->total(true)) ?></td>
                                    <td><?= !is_null($orcamentos->data_inicial)?date('d/m/Y',strtotime($orcamentos->data_inicial)):'' ?></td>
                                    <td><?= !is_null($orcamentos->data_entrega)?date('d/m/Y',strtotime($orcamentos->data_entrega)):'' ?></td>
                                    <td><?= h($orcamentos->observacao) ?></td>
                                    <td><?= ($orcamentos->hasContrato()?$this->Html->link('<i class="fas fa-search text-success"></i>', ['controller' => 'Contratos', 'action' => 'view', $projeto->contrato_id,$projeto->id],['target'=>'_blank','title'=>'Visualizar Contrato','escape'=>false]).'&nbsp'.$this->Html->link('<i class="fas fa-file-pdf text-success"></i>', ['controller' => 'Contratos', 'action' => 'exportarPdf', $projeto->contrato_id],['target'=>'_blank','title'=>'Exportar Contrato para Excel','escape'=>false]):'<span class="text-secondary">Não</span>') ?></td>
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
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Recebimentos') ?></h5>
                    <?php if (!empty($projeto->recebimentos)): ?>
                    <div class="table-responsive">
                        <table class="mb-0 table table-striped">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Valor') ?></th>
                                <th scope="col"><?= __('Data') ?></th>
                                <th scope="col"><?= __('Observacao') ?></th>
                            </tr>
                            <?php foreach ($projeto->recebimentos as $recebimentos): ?>
                                <tr>
                                    <td><?= h($recebimentos->id) ?></td>
                                    <td><?= h($recebimentos->valor(true)) ?></td>
                                    <td><?= !is_null($recebimentos->data)?date('d/m/Y',strtotime($recebimentos->data)):'' ?></td>
                                    <td><?= h($recebimentos->observacao) ?></td>
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
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Recibos Emitidos') ?></h5>
                    <?php if (!empty($projeto->recibos)): ?>
                    <div class="table-responsive">
                        <table class="mb-0 table table-striped">
                            <tr>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Equipe Id') ?></th>
                                <th scope="col"><?= __('Projeto Id') ?></th>
                                <th scope="col"><?= __('Valor') ?></th>
                                <th scope="col"><?= __('Data') ?></th>
                            </tr>
                            <?php foreach ($projeto->recibos as $recibos): ?>
                                <tr>
                                    <td><?= h($recibos->id) ?></td>
                                    <td><?= h($recibos->equipe_id) ?></td>
                                    <td><?= h($recibos->projeto_id) ?></td>
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
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="related">
                    <h5 class="card-title"><?= __('Notas Cadastradas') ?></h5>
                    <?php if (!empty($projeto->notas)): ?>
                        <div class="table-responsive">
                            <table class="mb-0 table table-striped">
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Fornecedor') ?></th>
                                    <th scope="col"><?= __('Valor') ?></th>
                                    <th scope="col"><?= __('Data') ?></th>
                                </tr>
                                <?php foreach ($projeto->notas as $notas): ?>
                                    <tr>
                                        <td><?= h($notas->id) ?></td>
                                        <td><?= $notas->has('fornecedor')?$notas->fornecedor->pessoa->nome:'' ?></td>
                                        <td><?= h($notas->valor(true)) ?></td>
                                        <td><?= !is_null($notas->data)?date('d/m/Y',strtotime($notas->data)):'' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php else: ?>
                        <p>Nenhuma Nota Cadastrada</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
