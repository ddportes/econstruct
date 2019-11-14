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
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Novo Cliente.
                    <div class="page-title-subheading">
                        <p>Preencha os campos abaixo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create($cliente) ?>
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="position-relative form-group">
                        <?= $this->Form->control('pessoa.nome', ['id'=>'nome','label'=>'Nome do Cliente','class' => 'form-control']); ?>
                    </div>
                    <div class="position-relative form-group">
                        <?= $this->Form->control('pessoa.nome_social', ['id'=>'nomeSocial','label'=>'Nome Social','class' => 'form-control']); ?>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.cpf_cnpj', ['id'=>'cpf','label'=>'CPF','placeholder'=>'Somente números','class' => 'form-control']); ?>
                                <div id="erro_cpf" role="alert" style="margin-top:4px;"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.rg', ['id'=>'rg','label'=>'RG','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.estado_civil', ['options'=>[''=>'','1'=>'Solteiro(a)','2'=>'Casado(a)','3'=>'Separado(a)','4'=>'Viúvo(a)','5'=>'União Estável(a)'],'id'=>'estadoCivil','label'=>'Estado Civil','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.sexo', ['options'=>['M'=>'Masculino','F'=>'Feminino'],'id'=>'sexo','label'=>'Sexo','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('cliente_situacao_id', ['id'=>'cliente_situacao_id','options' => $clienteSituacoes, 'empty' => true,'label'=>'Situação do Cliente','class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.profissao', ['id'=>'profissao','label'=>'Profissão','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.nacionalidade', ['id'=>'nacionalidade','label'=>'Nacionalidade','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.naturalidade', ['id'=>'naturalidade','label'=>'Naturalidade','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Html->link(__('Cadastrar Cônjuge'),
                                    ['controller' => 'Pessoas', 'action' => 'addConjuge'], [
                                        'id' => 'conjugeCliente',
                                        'class' => 'btn btn-primary modal_lg_link',
                                        'style'=>'top:2.5em',
                                        'role' => 'button',
                                        'data-toggle'=>"modal",
                                        'data-target'=>".modal_econstruct",
                                        'escape' => false
                                    ]) ?>
                                <?= $this->Form->control('conjugeHiddenPessoa', ['id'=>'conjugeHiddenPessoa','type'=>'hidden']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.telefone', ['id'=>'telefone','label'=>'Telefone','class' => 'form-control telefone']); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.email', ['id'=>'email','label'=>'E-mail','class' => 'form-control email']); ?>
                                <div id="erro_email" role="alert" style="margin-top:4px;"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.data_nascimento', ['type'=>'text','id'=>'data_nascimento','label'=>'Data de Nascimento','class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('observacao', ['type'=>'textarea','id'=>'observacao','label'=>'Observações sobre o Cliente','class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.cep', ['id'=>'cepProj','type'=>'text','label'=>'CEP','placeholder'=>'Somente Números','class' => 'form-control cep']); ?>
                                <div id="erro_cep_proj" role="alert" style="margin-top:4px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.logradouro', ['id'=>'logradouroProj','label'=>'Logradouro','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.numero', ['id'=>'numeroProj','label'=>'Número','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.bairro', ['id'=>'bairroProj','label'=>'Bairro','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.complemento', ['id'=>'complementoProj','label'=>'Complemento','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.cidade', ['id'=>'cidadeProj','label'=>'Cidade','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.estado', ['id'=>'estadoProj','label'=>'Estado','class' => 'form-control']); ?>
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
<?= $this->Html->script('cliente.js',['block'=>true]) ?>