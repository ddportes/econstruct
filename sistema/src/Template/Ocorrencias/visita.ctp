<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?= $this->Html->scriptStart(['block' => true]); ?>
    var hashVisit = '<?= $this->request->getParam("_csrfToken") ?>';
    var urlVisit = "<?= $this->Url->build(['controller'=>'Clientes','action'=>'retornaCliente']) ?>/";
    var imgLoad = '<?= $this->Url->build('/img/ajax-loader.gif') ?>';

$(document).ready(function(){
    $('#tab-c1-1').attr('style','display:none');
    $('#tab-c1-2').attr('style','display:none');
    $('#salvar').prop('disabled',true);
    $('#tab-c1-0').click();
});
<?= $this->Html->scriptEnd(); ?>

<?= $this->Html->script('visita.js',['block'=>true]) ?>

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
                        <a role="tab" class="nav-link show" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1" aria-selected="false" style="display:none">
                            <span class="nav-text">Detalhar Cliente (Opcional)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link show" id="tab-c1-2" data-toggle="tab" href="#tab-animated1-2" aria-selected="false" style="display:none">
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
                                        <?= $this->Form->control('telefoneCliente', ['id'=>'telefoneCliente','label'=>'Telefone','placeholder'=>'(99) 99999-9999','class' => 'form-control telefone']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('emailCliente', ['id'=>'emailCliente','label'=>'Email','placeholder'=>'Email de contato','class' => 'form-control email']); ?>
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
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('profissaoPessoa', ['id'=>'profissaoPessoa','label'=>'Profissão','placeholder'=>'Digite a profissão do Cliente','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('nacionalidadePessoa', ['id'=>'nacionalidadePessoa','label'=>'Nacionalidade','placeholder'=>'Digite a nacionalidade do Cliente','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('naturalidadePessoa', ['id'=>'naturalidadePessoa','label'=>'Naturalidade','placeholder'=>'Digite a naturalidade do Cliente','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('dataNascimentoPessoa',['label'=>'Data de Nascimento','type'=>'text','name'=>'dataNascimentoPessoa','id'=>'dataNascimentoPessoa','class'=>'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('filhosPessoa', ['id'=>'filhosPessoa','type'=>'number','label'=>'Filhos (Qtd)','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
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
                                        <?= $this->Html->link(__('Cadastrar Dependentes'),
                                            ['controller' => 'Dependentes', 'action' => 'add'], [
                                                'id' => 'dependenteCliente',
                                                'class' => 'btn btn-primary modal_xl_link',
                                                'style'=>'top:2.5em',
                                                'role' => 'button',
                                                'data-toggle'=>"modal",
                                                'data-target'=>".modal_econstruct",
                                                'escape' => false
                                            ]) ?>
                                        <?= $this->Html->link(__('Cadastrar Renda'),
                                            ['controller' => 'Rendas', 'action' => 'add'], [
                                                'id' => 'rendaCliente',
                                                'class' => 'btn btn-primary modal_xl_link',
                                                'style'=>'top:2.5em',
                                                'role' => 'button',
                                                'data-toggle'=>"modal",
                                                'data-target'=>".modal_econstruct",
                                                'escape' => false
                                            ]) ?>

                                        <span id="linkRenda" style="display:none"><?= $this->Url->build(['controller' => 'Rendas', 'action' => 'add']) ?></span>
                                        <span id="linkDependente" style="display:none"><?= $this->Url->build(['controller' => 'Dependentes', 'action' => 'add']) ?></span>
                                        <span id="linkConjuge" style="display:none"><?= $this->Url->build(['controller' => 'Pessoas', 'action' => 'addConjuge']) ?></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('cepCliente', ['id'=>'cepCliente','label'=>'CEP','placeholder'=>'Somente Números','class' => 'form-control cep']); ?>
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
                            <div class="form-row">
                                <div class="col-md-10">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('projetoId', ['type'=>'select','id'=>'projetoId','label'=>'Selecione o Projeto','class' => 'form-control']); ?>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="position-relative form-check" style='top:2.5em'>
                                        <?= $this->Form->control('checkNovoProjeto', ['type'=>'checkbox','id'=>'checkNovoProjeto','label'=>'É um novo Projeto?','class' => 'form-check-input']); ?>
                                    </div>
                                </div>
                            </div>
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
                                <?= $this->Form->control('enderecoProj_id', ['id'=>'enderecoProj_id','type'=>'hidden']); ?>
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
                                        <?= $this->Form->control('custoEstimadoProjeto', ['id'=>'custoEstimadoProjeto','label'=>'Custo Estimado','placeholder'=>'R$','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('terrenoProjeto', ['id'=>'terrenoProjeto','label'=>'Área do Terreno','placeholder'=>'m²','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('frenteProjeto', ['id'=>'frenteProjeto','label'=>'Frente do Terreno','placeholder'=>'m','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('fundoProjeto', ['id'=>'fundoProjeto','label'=>'Profundidade do Terreno','placeholder'=>'m','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('areaCobertaProjeto', ['id'=>'areaCobertaProjeto','label'=>'Área Coberta Construída','placeholder'=>'m²','class' => 'form-control']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <?= $this->Form->control('areaAbertaProjeto', ['id'=>'areaAbertaProjeto','label'=>'Área Aberta Construída','placeholder'=>'m²','class' => 'form-control']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="text-align: right;">
                <?= $this->Form->button(__('Salvar Informações'),['id'=>'salvar','title'=>'Para habilitar, selecione um cliente','type'=>'submit','class'=>'btn btn-success']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>