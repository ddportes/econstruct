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
                    <i class="pe-7s-tools icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Editar Pedreiro <?= $pedreiro->id ?>.
                    <div class="page-title-subheading">
                        <p>Preencha os campos abaixo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create($pedreiro) ?>
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="position-relative form-group">
                        <?= $this->Form->control('pessoa.nome', ['id'=>'nome','label'=>'Nome do pedreiro','class' => 'form-control']); ?>
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
                                <?= $this->Form->control('pedreiro_situacao_id', ['id'=>'pedreiro_situacao_id','options' => $pedreiroSituacoes, 'empty' => true,'label'=>'Situação do pedreiro','class' => 'form-control']); ?>
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
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="position-relative form-group">

                                <?= $this->Form->control('pessoa_id', ['id'=>'pessoa_id','value'=>$pedreiro->pessoa_id,'type'=>'hidden']); ?>
                                <?= $this->Form->control('telefone_id', ['id'=>'telefone_id','value'=>$pedreiro->pessoa->firstIdTelefone(),'type'=>'hidden']); ?>
                                <?= $this->Form->control('email_id', ['id'=>'email_id','value'=>$pedreiro->pessoa->firstIdEmail(),'type'=>'hidden']); ?>
                                <?= $this->Form->control('endereco.endereco_id', ['id'=>'endereco_id','value'=>$pedreiro->pessoa->enderecos[0]->id,'type'=>'hidden']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.telefone', ['id'=>'telefone','label'=>'Telefone','class' => 'form-control telefone','value'=>$pedreiro->pessoa->firstTelefone()]); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.email', ['id'=>'email','value'=>$pedreiro->pessoa->firstEmail(),'label'=>'E-mail','class' => 'form-control email']); ?>
                                <div id="erro_email" role="alert" style="margin-top:4px;"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('pessoa.data_nascimento', ['type'=>'text','id'=>'data_nascimento','label'=>'Data de Nascimento','class' => 'form-control','value'=> (is_null($pedreiro->pessoa->data_nascimento)?'':h(date_format($pedreiro->pessoa->data_nascimento,'d/m/Y'))) ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('observacao', ['type'=>'textarea','id'=>'observacao','label'=>'Observações sobre o pedreiro','class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.cep', ['id'=>'cepProj','type'=>'text','value'=>$pedreiro->pessoa->enderecos[0]->cep,'label'=>'CEP','placeholder'=>'Somente Números','class' => 'form-control cep']); ?>
                                <div id="erro_cep_proj" role="alert" style="margin-top:4px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.logradouro', ['id'=>'logradouroProj','value'=>$pedreiro->pessoa->enderecos[0]->logradouro,'label'=>'Logradouro','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.numero', ['id'=>'numeroProj','value'=>$pedreiro->pessoa->enderecos[0]->numero,'label'=>'Número','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.bairro', ['id'=>'bairroProj','value'=>$pedreiro->pessoa->enderecos[0]->bairro,'label'=>'Bairro','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.complemento', ['id'=>'complementoProj','value'=>$pedreiro->pessoa->enderecos[0]->complemento,'label'=>'Complemento','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.cidade', ['id'=>'cidadeProj','value'=>$pedreiro->pessoa->enderecos[0]->cidade,'label'=>'Cidade','class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <?= $this->Form->control('endereco.estado', ['id'=>'estadoProj','value'=>$pedreiro->pessoa->enderecos[0]->estado,'label'=>'Estado','class' => 'form-control']); ?>
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