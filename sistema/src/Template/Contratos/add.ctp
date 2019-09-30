<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>

<?php //echo $this->Html->script('renda.js') ?>
<div id="addContrato" >
    <div class="modal-header">
        <h5 class="modal-title">Contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php if(!empty($pessoa_id)): ?>
        <?= $this->Form->create($renda,['id'=>'formContrato']) ?>
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
 * @var \App\Model\Entity\Contrato $contrato
 */
?>
<div class="contratos form large-9 medium-8 columns content">
    <?= $this->Form->create($contrato) ?>
    <fieldset>
        <legend><?= __('Add Contrato') ?></legend>
        <?php
            echo $this->Form->control('projeto_id', ['options' => $projetos]);
            echo $this->Form->control('orcamento_id', ['options' => $orcamentos]);
            echo $this->Form->control('data_assinatura');
            echo $this->Form->control('data_inicial');
            echo $this->Form->control('data_final');
            echo $this->Form->control('minuta');
            echo $this->Form->control('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->control('u_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
