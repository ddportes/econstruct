<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>
<?php echo $this->Html->script('empresa.js') ?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-config icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Empresa
                <div class="page-title-subheading">
                    <p>Preencha os campos abaixo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

    <?= $this->Form->create($empresa,['id'=>'formEmpresa']) ?>
        <div class="mb-3 card">
            <div class="card-body">
                <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active show" id="tab-c1-0" data-toggle="tab" href="#tab-empresa-0" aria-selected="true">
                            <span class="nav-text">Dados da Empresa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link show" id="tab-c1-1" data-toggle="tab" href="#tab-empresa-1" aria-selected="false" >
                            <span class="nav-text">Endereço da Empresa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link show" id="tab-c1-2" data-toggle="tab" href="#tab-empresa-2" aria-selected="false" >
                            <span class="nav-text">Dados do Representante</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link show" id="tab-c1-3" data-toggle="tab" href="#tab-empresa-3" aria-selected="false" >
                            <span class="nav-text">Endereço do Representante</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-empresa-0" role="tabpanel">
                        <div class="modal-body">
                            <h5 class="card-title">Dados da Empresa</h5>
                            <div class="form-row">
                                <div class="col-sm-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('tipo',['label'=>'Tipo de Pessoa','options'=>['J'=>'Jurídica','F'=>'Física'],'id'=>'tipo','class'=>'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cpf_cnpj',['label'=>'CNPJ','type'=>'text','id'=>'cpf_cnpj','class'=>'form-control cpf','placeholder'=>'Somente Números']); ?>
                                        <div id="erro_cpf_cnpj" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('inscricao', ['label'=>'RG / Inscrição','type'=>'text','id'=>'inscricao','class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('razao_social', ['id'=>'razao_social','label'=>'Razão Social','class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('nome_fantasia', ['id'=>'nome_fantasia','type'=>'text','label'=>'Nome Fantasia','class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('telefone', ['id'=>'telefone','type'=>'text','label'=>'Telefone','class' => 'form-control telefone']); ?>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <div class="position-relative row form-group">
                                        <?= $this->Form->control('email', ['id'=>'email','type'=>'text','label'=>'E-mail','class' => 'form-control email']); ?>
                                        <div id="erro_email" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label  class="col-sm-2 col-form-label">Data de Início:</label>
                                <div class="col-sm-10" style="margin-top: 0.5em">
                                    <h5><?= (is_null($empresa->data_inicio)?'':h(date_format($empresa->data_inicio,'d/m/Y')))  ?> </h5>
                                </div>
                            </div>
                            <?php if($isManager): ?>
                                <div class="position-relative row form-group" style="background-color: rgba(0, 0, 0, 0.1)">
                                    <label  class="col-sm-2 col-form-label">Data de Fim:</label>
                                    <div class="col-sm-10" style="margin-top: 0.5em">
                                        <h5><?= (is_null($empresa->data_fim)?'':h(date_format($empresa->data_fim,'d/m/Y')))  ?> </h5>
                                    </div>
                                </div>
                                <div class="position-relative row form-group" style="background-color: rgba(0, 0, 0, 0.1)">
                                    <label  class="col-sm-2 col-form-label">Mensalidade:</label>
                                    <div class="col-sm-10" style="margin-top: 0.5em">
                                        <h5><?= $empresa->mensal(true) ?></h5>
                                    </div>
                                </div>

                                <div class="position-relative row form-group" style="background-color: rgba(0, 0, 0, 0.1)">
                                    <label  class="col-sm-2 col-form-label">observação:</label>
                                    <div class="col-sm-10" style="margin-top: 0.5em">
                                        <h5><?= $empresa->observacao ?></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="tab-pane show" id="tab-empresa-1" role="tabpanel">
                        <div class="modal-body">
                            <?= $this->Form->control('endereco_id', ['id'=>'endereco_id','label'=>false,'type'=>'hidden']); ?>
                            <h5 class="card-title">Endereço da Empresa</h5>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cepEmpresa', ['id'=>'cepEmpresa','label'=>'CEP','value'=>$endereco->cep,'placeholder'=>'Somente Números','class' => 'form-control cep']); ?>
                                        <div id="erro_cep" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('logradouroEmpresa', ['id'=>'logradouroEmpresa','value'=>$endereco->logradouro,'label'=>'Logradouro','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('numeroEmpresa', ['id'=>'numeroEmpresa','value'=>$endereco->numero,'label'=>'Número','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('bairroEmpresa', ['id'=>'bairroEmpresa','value'=>$endereco->bairro,'label'=>'Bairro','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('complementoEmpresa', ['id'=>'complementoEmpresa','value'=>$endereco->complemento,'label'=>'Complemento','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cidadeEmpresa', ['id'=>'cidadeEmpresa','value'=>$endereco->cidade,'label'=>'Cidade','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('estadoEmpresa', ['id'=>'estadoEmpresa','value'=>$endereco->estado,'label'=>'Estado','class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane show" id="tab-empresa-2" role="tabpanel">
                        <div class="modal-body">
                            <?= $this->Form->control('representante_id', ['id'=>'representante_id','label'=>false,'type'=>'hidden']); ?>
                            <h5 class="card-title">Dados do Representante</h5>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('nomeRep', ['id'=>'nomeRep','value'=>$representante->nome,'label'=>'Nome do Representante','placeholder'=>'Digite o nome do cliente','class' => 'form-control']); ?>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('nomeSocialRep', ['id'=>'nomeSocialRep','value'=>$representante->nome_social,'label'=>'Nome Social','placeholder'=>'Digite o nome social, se houver','class' => 'form-control']); ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cpfRep', ['id'=>'cpfRep','value'=>$representante->cpf_cnpj,'label'=>'CPF','placeholder'=>'Somente números','class' => 'form-control']); ?>
                                        <div id="erro_cpf_rep" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('sexoRep', ['value'=>$representante->sexo,'options'=>['M'=>'Masculino','F'=>'Feminino'],'id'=>'sexoRep','label'=>'Sexo','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('rgRep', ['id'=>'rgRep','value'=>$representante->rg,'label'=>'RG','class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('profissaoRep', ['id'=>'profissaoRep','value'=>$representante->profissao,'label'=>'Profissão','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('nacionalidadeRep', ['id'=>'nacionalidadeRep','value'=>$representante->nacionalidade,'label'=>'Nacionalidade','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('naturalidadeRep', ['id'=>'naturalidadeRep','value'=>$representante->naturalidade,'label'=>'Naturalidade','class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('estadoCivilRep', ['value'=>$representante->estado_civil,'options'=>[''=>'','1'=>'Solteiro(a)','2'=>'Casado(a)','3'=>'Separado(a)','4'=>'Viúvo(a)','5'=>'União Estável(a)'],'id'=>'estadoCivilRep','label'=>'Estado Civil','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('dataNascimentoRep',['value'=>($representante->data_nascimento <> ''?date('d/m/Y',strtotime($representante->data_nascimento)):''),'label'=>'Nascimento','type'=>'text','name'=>'dataNascimentoRep','id'=>'dataNascimentoRep','class'=>'form-control']); ?>
                                    </div>
                                </div>
                                <?php if(empty($representante->conjuge_id)): ?>
                                <div class="col-md-2">
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
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                    <?= $this->Html->link(__('Editar Cônjuge'),
                                        ['controller' => 'Pessoas', 'action' => 'editConjuge',$representante->conjuge_id], [
                                            'id' => 'conjugeCliente',
                                            'class' => 'btn btn-primary modal_lg_link',
                                            'style'=>'top:2.5em',
                                            'role' => 'button',
                                            'data-toggle'=>"modal",
                                            'data-target'=>".modal_econstruct",
                                            'escape' => false
                                        ]) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                    <?= $this->Form->postLink('Excluir Cônjuge', [
                                        'controller'=>'Pessoas','action' => 'deleteConjuge',
                                        $representante->id,2
                                    ],
                                        [
                                            'block' => true,
                                            'id' => 'botaoExcluirConjuge',
                                            'class' => 'btn btn-primary',
                                            'style'=>'top:2.5em',
                                            'confirm' => __('Deseja realmente excluir o cônjuge?'),
                                            'title' => __('Excluir Cônjuge'),
                                            'escape' => false
                                        ]) ?>
                                    </div>
                                </div>

                                <?php endif; ?>
                                <?= $this->Form->control('conjugeHiddenPessoa', ['id'=>'conjugeHiddenPessoa','type'=>'hidden','value'=>(!empty($representante->conjuge_id)?$representante->conjuge_id:'')]); ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show" id="tab-empresa-3" role="tabpanel">
                        <div class="modal-body">
                            <?= $this->Form->control('enderecoRep_id', ['id'=>'enderecoRep_id','label'=>false,'value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->id:''),'type'=>'hidden']); ?>
                            <h5 class="card-title">Endereço da Empresa</h5>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cepRep', ['id'=>'cepRep','type'=>'text','label'=>'CEP','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->cep:''),'placeholder'=>'Somente Números','class' => 'form-control cep']); ?>
                                        <div id="erro_cep_rep" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('logradouroRep', ['id'=>'logradouroRep','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->logradouro:''),'label'=>'Logradouro','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('numeroRep', ['id'=>'numeroRep','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->numero:''),'label'=>'Número','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('bairroRep', ['id'=>'bairroRep','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->bairro:''),'label'=>'Bairro','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('complementoRep', ['id'=>'complementoRep','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->complemento:''),'label'=>'Complemento','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cidadeRep', ['id'=>'cidadeRep','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->cidade:''),'label'=>'Cidade','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('estadoRep', ['id'=>'estadoRep','value'=>(!empty($representante->enderecos)?$representante->enderecos[0]->estado:''),'label'=>'Estado','class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body" style="text-align: right;">
                <?= $this->Form->button(__('Salvar'),['id'=>'salvarEmpresa','class'=>'btn btn-success']) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
        <?= $this->Fetch('postLink'); ?>
    </div>
</div>

