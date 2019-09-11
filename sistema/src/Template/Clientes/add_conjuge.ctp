<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<?= $this->Html->script('conjuge.js') ?>

<div id="addConjuge" >
    <div class="modal-header">
        <h5 class="modal-title">Cadastro de Cônjuge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?= $this->Form->create(null,['id'=>'formConjuge']) ?>
    <div class="modal-body">
        <h5 class="card-title">Preencha as informações abaixo</h5>
            <?= $this->Form->control('conjuge_id', ['id'=>'conjuge_id','type' => 'hidden','value'=>$conjuge_id]); ?>
        <div class="position-relative row form-group">
            <label for="nomePessoa" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
                <?= $this->Form->control('nomePessoa',['label'=>false,'type'=>'text','name'=>'nomePessoa','id'=>'nomePessoa','class'=>'form-control','placeholder'=>'Digite o nome da(o) Cônjuge']); ?>
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="sexoPessoa" class="col-sm-2 col-form-label">Sexo:</label>
            <div class="col-sm-10">
                <?= $this->Form->control('sexoPessoa', ['label'=>false,'options'=>['M'=>'Masculino','F'=>'Feminino'],'id'=>'sexoPessoa','class' => 'form-control']); ?>
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="cpfPessoaConjuge" class="col-sm-2 col-form-label">CPF:</label>
            <div class="col-sm-10">
                <?= $this->Form->control('cpfPessoaConjuge', ['id'=>'cpfPessoaConjuge','label'=>false,'placeholder'=>'Somente números','class' => 'form-control cpf']); ?>
                <div id="erro_cpf_conjuge" role="alert" style="margin-top:4px;"></div>
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="telefoneCliente" class="col-sm-2 col-form-label">Telefone:</label>
            <div class="col-sm-10">
                <?= $this->Form->control('telefoneCliente', ['id'=>'telefoneCliente','label'=>false,'placeholder'=>'(99) 99999-9999','class' => 'form-control telefone']); ?>
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="rgPessoa" class="col-sm-2 col-form-label">RG:</label>
            <div class="col-sm-10">
                <?= $this->Form->control('rgPessoa',['label'=>false,'type'=>'text','name'=>'rgPessoa','id'=>'rgPessoa','class'=>'form-control']); ?>
            </div>
        </div>

        <div class="position-relative row form-group">
            <label for="observacaoCliente" class="col-sm-2 col-form-label">Observação:</label>
            <div class="col-sm-10">
                <?= $this->Form->control('observacaoCliente',['label'=>false,'type'=>'textarea','name'=>'observacaoCliente','id'=>'observacaoCliente','class'=>'form-control','placeholder'=>'Digite uma observação sobre a(o) Cônjuge']); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?= $this->Form->button(__('Salvar'),['id'=>'salvarConjuge','class'=>'btn btn-secondary']) ?>
        <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" data-dismiss="modal">fechar</button>
    </div>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function(){
        $("#erro_cpf_conjuge").hide();
        $('.cpf').mask('000.000.000-00');
        $('.cpf').on('blur',function()
        {
            validaCpf($('.cpf'),$("#erro_cpf_conjuge"),$('#salvarConjuge'));
        });
    });
    $('.telefone').mask(SPMaskBehavior, spOptions);
</script>