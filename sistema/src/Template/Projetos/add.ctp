<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Novo Projeto.
                <div class="page-title-subheading">
                    <p>Preencha os campos abaixo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create($projeto) ?>
        <div class="mb-3 card">
            <div class="card-body">
                <div class="position-relative form-group">
                    <?= $this->Form->control('descricao', ['id'=>'descricao','label'=>'Descrição do Projeto','class' => 'form-control']); ?>
                </div>
                <div class="position-relative form-group">
                    <?= $this->Form->control('detalhes', ['type'=>'textarea','id'=>'detalhes','label'=>'Detalhes do Projeto','class' => 'form-control']); ?>
                </div>

                <div class="form-row">
                    <div class="col-md-9">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('cliente_id', ['id'=>'cliente_id','options' => $clientes, 'empty' => true,'label'=>'Cliente','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('projeto_situacao_id', ['id'=>'projeto_situacao_id','options' => $projetoSituacoes, 'empty' => true,'label'=>'Situação do Projeto','class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <?= $this->Form->control('observacao', ['type'=>'textarea','id'=>'observacao','label'=>'Observações sobre do Projeto','class' => 'form-control']); ?>
                </div>
                <div class="form-row">
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('cepProj', ['id'=>'cepProj','label'=>'CEP','placeholder'=>'Somente Números','class' => 'form-control cep']); ?>
                            <div id="erro_cep_proj" role="alert" style="margin-top:4px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('logradouroProj', ['id'=>'logradouroProj','label'=>'Logradouro','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('numeroProj', ['id'=>'numeroProj','label'=>'Número','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('bairroProj', ['id'=>'bairroProj','label'=>'Bairro','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('complementoProj', ['id'=>'complementoProj','label'=>'Complemento','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('cidadeProj', ['id'=>'cidadeProj','label'=>'Cidade','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('estadoProj', ['id'=>'estadoProj','label'=>'Estado','class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('custo_estimado', ['type'=>'text','id'=>'custo_estimado','label'=>'Custo Estimado','placeholder'=>'R$','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('terreno', ['type'=>'text','id'=>'terreno','label'=>'Área do Terreno','placeholder'=>'m²','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('frente', ['type'=>'text','id'=>'frente','label'=>'Frente do Terreno','placeholder'=>'m','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('fundo', ['type'=>'text','id'=>'fundo','label'=>'Profundidade do Terreno','placeholder'=>'m','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('area_coberta', ['type'=>'text','id'=>'area_coberta','label'=>'Área Coberta Construída','placeholder'=>'m²','class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('area_aberta', ['type'=>'text','id'=>'area_aberta','label'=>'Área Aberta Construída','placeholder'=>'m²','class' => 'form-control']); ?>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body" style="text-align: right;">
                <?= $this->Form->button(__('Salvar'),['id'=>'salvar','type'=>'submit','class'=>'btn btn-success']) ?>
            </div>

        </div>
        <?= $this->Form->end() ?>
    </div>

</div>
<?= $this->Html->script('projeto.js',['block'=>true]) ?>