<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?= $this->Html->scriptStart(['block' => true]); ?>
    var hashVisit = '<?= $this->request->getParam("_csrfToken") ?>';
    var urlVisit = "<?= $this->Url->build(['controller'=>'Clientes','action'=>'retornaCliente']) ?>/";
<?= $this->Html->scriptEnd(); ?>

<?= $this->Html->script('https://code.jquery.com/jquery-3.4.1.min.js',['block'=>true]) ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css',['block'=>true]) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js',['block'=>true]) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js',['block'=>true]) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js',['block'=>true]) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js',['block'=>true]) ?>
<?= $this->Html->script('visita-min.js',['block'=>true]) ?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Nova Visita.
                <div class="page-title-subheading">
                    <p>Selecione o Cliente.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create() ?>
        <div class="mb-3 card">
            <div class="card-body">
                <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active show" id="tab-c1-0" data-toggle="tab" href="#tab-animated1-0" aria-selected="true">
                            <span class="nav-text">Dados Principais da Visita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link show" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1" aria-selected="false">
                            <span class="nav-text">Detalhar Cliente (Opcional)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link show" id="tab-c1-2" data-toggle="tab" href="#tab-animated1-2" aria-selected="false">
                            <span class="nav-text">Detalhar Projeto (Opcional)</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-animated1-0" role="tabpanel">
                        <div class="card-body"><h5 class="card-title">Informações Rápidas da Visita</h5>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('clienteId', ['type'=>'select','id'=>'clienteId','label'=>'Selecione o Cliente','options'=>$listaClientes,'class' => 'form-control']); ?>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('anotacoesOcorrencia', ['type'=>'textarea','rows'=>6,'id'=>'anotacoesOcorrencia','label'=>'Anotações da Visita','placeholder'=>'Outras Anotações da Visita','class' => 'form-control']); ?>
                            </div>

                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('dataOcorrencia',['id'=>'dataOcorrencia','type'=>'text','class'=>'form-control','label'=>'Data da Visita','value'=>date('d/m/Y')]) ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('dataPendenciaOcorrencia',['id'=>'dataPendenciaOcorrencia','type'=>'text','class'=>'form-control','label'=>'Data da Pendência']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show" id="tab-animated1-1" role="tabpanel">
                        <div class="card-body"><h5 class="card-title">Detalhes do Cliente</h5>
                            <div style="display:none;">
                                <?= $this->Form->control('cliente_id', ['id'=>'cliente_id','type'=>'hidden']); ?>
                                <?= $this->Form->control('projeto_id', ['id'=>'projeto_id','type'=>'hidden']); ?>
                                <?= $this->Form->control('pessoa_id', ['id'=>'pessoa_id','type'=>'hidden']); ?>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('nomePessoa', ['id'=>'nomePessoa','label'=>'Nome do Cliente','placeholder'=>'Digite o nome do cliente','class' => 'form-control']); ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cpfPessoa', ['id'=>'cpfPessoa','label'=>'CPF','placeholder'=>'Somente números','class' => 'form-control']); ?>
                                        <div id="erro_cpf" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('sexoPessoa', ['options'=>['M'=>'Masculino','F'=>'Feminino'],'id'=>'sexoPessoa','label'=>'Sexo','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('telefoneCliente', ['id'=>'telefoneCliente','label'=>'Telefone','placeholder'=>'(99) 99999-9999','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('emailCliente', ['id'=>'emailCliente','label'=>'Email','placeholder'=>'Email de contato','class' => 'form-control']); ?>
                                        <div id="erro_email" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('rgPessoa', ['id'=>'rgPessoa','label'=>'RG','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('estadoCivilPessoa', ['options'=>[''=>'','1'=>'Solteiro(a)','2'=>'Casado(a)','3'=>'Separado(a)','4'=>'Viúvo(a)','5'=>'União Estável(a)'],'id'=>'estadoCivilPessoa','label'=>'Estado Civil','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('filhosPessoa', ['id'=>'filhosPessoa','type'=>'number','label'=>'Filhos (Qtd)','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->button(__('Cadastrar Cônjuge'),['style'=>'top:2.5em','data-toggle'=>'modal','data-target'=>'.bd-example-modal-lg','id'=>'conjugeCliente','type'=>'button','class'=>'btn btn-primary']) ?>
                                        <?= $this->Form->control('conjugeHiddenPessoa', ['id'=>'conjugeHiddenPessoa','type'=>'hidden']); ?>
                                        <?= $this->Form->button(__('Cadastrar Renda'),  ['style'=>'top:2.5em','data-toggle'=>'modal','data-target'=>'.bd-example-modal-lg','id'=>'rendaCliente'  ,'type'=>'button','class'=>'btn btn-primary']) ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cepCliente', ['id'=>'cepCliente','label'=>'CEP','placeholder'=>'Somente Números','class' => 'form-control']); ?>
                                        <div id="erro_cep" role="alert" style="margin-top:4px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('logradouroCliente', ['id'=>'logradouroCliente','label'=>'Logradouro','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('numeroCliente', ['id'=>'numeroCliente','label'=>'Número','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('bairroCliente', ['id'=>'bairroCliente','label'=>'Bairro','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('complementoCliente', ['id'=>'complementoCliente','label'=>'Complemento','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cidadeCliente', ['id'=>'cidadeCliente','label'=>'Cidade','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('estadoCliente', ['id'=>'estadoCliente','label'=>'Estado','class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('nomeSocialPessoa', ['id'=>'nomeSocialPessoa','label'=>'Nome Social','placeholder'=>'Digite o nome social, se houver','class' => 'form-control']); ?>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('observacaoCliente', ['type'=>'textarea','rows'=>6,'id'=>'observacaoCliente','label'=>'Observação sobre o Cliente','placeholder'=>'Observações ou anotações sobre o cliente','class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show" id="tab-animated1-2" role="tabpanel">
                        <div class="card-body"><h5 class="card-title">Detalhes do Projeto</h5>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('descricaoProjeto', ['id'=>'descricaoProjeto','label'=>'Descrição Rápida do Projeto','placeholder'=>'Escreve uma descrição rápida','class' => 'form-control']); ?>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('detalhesProjeto', ['type'=>'textarea','rows'=>6,'id'=>'detalhesProjeto','label'=>'Detalhes do Projeto','placeholder'=>'Detalhes do Projeto','class' => 'form-control']); ?>
                            </div>
                            <div class="position-relative form-group">
                                <?= $this->Form->control('observacaoProjeto', ['type'=>'textarea','rows'=>6,'id'=>'observacaoProjeto','label'=>'Observações sobre do Projeto','placeholder'=>'Observações sobre do Projeto','class' => 'form-control']); ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('custoEstimadoProjeto', ['id'=>'custoEstimadoProjeto','label'=>'Custo Estimado','placeholder'=>'R$','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->button(__('Novo Orçamento'),['style'=>'top:2.5em','data-toggle'=>'modal','data-target'=>'.bd-example-modal-lg','id'=>'orcamentoProjeto','type'=>'button','class'=>'btn btn-primary']) ?>
                                        <?= $this->Form->control('orcamentoHidden', ['id'=>'orcamentoHidden','type'=>'hidden']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="text-align: right;">
                <?= $this->Form->button(__('Salvar Informações'),['id'=>'salvar','type'=>'submit','class'=>'btn btn-success']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>


<script>
    $( function() {
        $( "#dataPendenciaOcorrencia" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: true,
            language: "pt-BR"
        });
    } );
</script>
