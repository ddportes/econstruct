<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>
<?= $this->Html->script('renda.js') ?>
<div id="addRenda" >
    <div class="modal-header">
        <h5 class="modal-title">Cadastro de Dependentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php if(!empty($pessoa_id)): ?>
        <div class="modal-body">
            <h5 class="card-title">Dependentes Cadastrados</h5>
            <div class="table-responsive">
                <table class="mb-0 table">
                    <thead>
                    <tr>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('id','ID') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('nome','Nome') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('sexo','Sexo') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('cpf_cnpj','CPF') ?></th>
                        <th scope="col" style="vertical-align: top"><?= $this->Paginator->sort('data_nascimento','Data de Nascimento') ?></th>
                        <th scope="col" class="actions" style="vertical-align: top"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($rendas->count() > 0): ?>
                        <?php foreach ($rendas as $r): ?>
                            <tr>
                                <td scope="row" style="vertical-align: top"><?= $this->Number->format($r->id) ?></td>
                                <td style="vertical-align: top"><?= $r->pessoa->nome ?></td>
                                <td style="vertical-align: top"><?= h($r->fonte_pagadora) ?></td>
                                <td style="vertical-align: top"><?= $r->tipo() ?></td>
                                <td style="vertical-align: top"><?= $r->cpfCnpj(true) ?></td>
                                <td style="vertical-align: top"><?= $r->rendaBruta(true) ?></td>
                                <td style="vertical-align: top"><?= $r->rendaLiquida(true) ?></td>
                                <td class="actions" style="vertical-align: top">
                                    <?= $this->Form->postButton('<i class="fas fa-trash-alt"></i>', [
                                        'action' => 'delete',
                                        $r->id,$pessoa_id
                                    ],
                                        [
                                            'data'=>['id'=>$r->id,'pessoa_id'=>$pessoa_id],
                                            'form' => [
                                                'id' => 'form-delete-renda-' . $r->id,
                                                'class' => 'form-delete-renda'
                                            ],
                                            'block' => true,
                                            'id' => 'botaoExcluirRenda',
                                            'class' => 'btn btn-xs',
                                            'confirm' => __('Deseja realmente excluir a renda {0}?', $r->fonte_pagadora),
                                            'title' => __('Excluir Renda'),
                                            'escape' => false
                                        ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <th colspan="4" scope="row"><?= __('Não há renda cadastrada.') ?></th>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="mb-0 table">
                    <tr>
                        <th scope="row"><?= __('Total Renda Bruta') ?></th>

                        <?php ?>

                        <td><?= $pessoa->totalRendaBruta(true,$todas_rendas_bruta) ?></td>
                        <th scope="row"><?= __('Total Renda Líquida') ?></th>
                        <td><?= $pessoa->totalRendaLiquida(true,$todas_rendas_liquida) ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <?= $this->Form->create($renda,['id'=>'formRenda']) ?>
        <div class="modal-body">
            <h5 class="card-title">Preencha as informações abaixo</h5>
            <div class="position-relative row form-group">
                <label for="pessoa_id" class="col-sm-2 col-form-label">Pessoa:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('pessoa_id',['label'=>false,'options'=>$pessoas,'value' => $pessoa_id,'name'=>'pessoa_id','id'=>'pessoa_id','class'=>'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="fonte_pagadora" class="col-sm-2 col-form-label">Fonte Pagadora:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('fonte_pagadora',['label'=>false,'type'=>'text','name'=>'fonte_pagadora','id'=>'fonte_pagadora','class'=>'form-control','placeholder'=>'Digite a razão social da Fonte Pagadora']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="tipo" class="col-sm-2 col-form-label">Tipo de Pessoa:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('tipo', ['label'=>false,'options'=>['J'=>'Jurídica','F'=>'Física'],'id'=>'tipo','class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="cpf_cnpj" class="col-sm-2 col-form-label">CPF/CNPJ:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('cpf_cnpj', ['id'=>'cpf_cnpj','label'=>false,'placeholder'=>'Somente números','class' => 'form-control cpf']); ?>
                    <div id="erro_cpf_cnpj" role="alert" style="margin-top:4px;"></div>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="renda_bruta" class="col-sm-2 col-form-label">Renda Bruta:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('renda_bruta', ['id'=>'renda_bruta','type'=>'text','label'=>false,'placeholder'=>'R$','class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="renda_liquida" class="col-sm-2 col-form-label">Renda Líquida:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('renda_liquida', ['id'=>'renda_liquida','type'=>'text','label'=>false,'placeholder'=>'R$','class' => 'form-control']); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Salvar'),['id'=>'salvarRenda','class'=>'btn btn-secondary']) ?>
            <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" data-dismiss="modal">fechar</button>
        </div>
        <?= $this->Form->end() ?>

    <?php else: ?>
        <div class="modal-body"><h5 class="card-title">Selecione um cliente</h5>
        </div>
    <?php endif; ?>
</div>





<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependente $dependente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dependentes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dependentes form large-9 medium-8 columns content">
    <?= $this->Form->create($dependente) ?>
    <fieldset>
        <legend><?= __('Add Dependente') ?></legend>
        <?php
            echo $this->Form->control('pessoa_id', ['options' => $pessoas, 'empty' => true]);
        ?>
        <label>Pai/Mãe: </label> <?= $paiMae->nome ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
