<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>

<?php //echo $this->Html->script('empresa.js') ?>
<div id="editEmpresa" >
    <?php echo $this->Flash->render() ?>
    <div class="modal-header">
        <h5 class="modal-title">Configurações da Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>

        <?= $this->Form->create($empresa,['id'=>'formEmpresa']) ?>
        <div class="modal-body">
            <div class="position-relative row form-group">
                <label for="tipo" class="col-sm-2 col-form-label">Tipo de Pessoa:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('tipo',['label'=>false,'options'=>['F'=>'Física','J'=>'Jurídica'],'id'=>'tipo','class'=>'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="cpf_cnpj" class="col-sm-2 col-form-label">CPF / CNPJ:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('cpf_cnpj',['label'=>false,'type'=>'text','id'=>'cpf_cnpj','class'=>'form-control cpf','placeholder'=>'Somente Números']); ?>
                    <div id="erro_cpf_cnpj" role="alert" style="margin-top:4px;"></div>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="inscricao" class="col-sm-2 col-form-label">RG / Inscrição:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('inscricao', ['label'=>false,'type'=>'text','id'=>'inscricao','class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="razao_social" class="col-sm-2 col-form-label">Razão Social:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('razao_social', ['id'=>'razao_social','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="nome_fantasia" class="col-sm-2 col-form-label">Nome Fantasia:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('nome_fantasia', ['id'=>'nome_fantasia','type'=>'text','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="telefone" class="col-sm-2 col-form-label">Telefone:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('telefone', ['id'=>'telefone','type'=>'text','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('email', ['id'=>'email','type'=>'text','label'=>false,'class' => 'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label  class="col-sm-2 col-form-label">Data de Início no e-Construct:</label>
                <div class="col-sm-10" style="margin-top: 0.5em">
                    <h5><?= $empresa->data_inicio ?></h5>
                </div>
            </div>
            <?php if($isAdmin): ?>
                <div class="position-relative row form-group">
                    <label  class="col-sm-2 col-form-label">Data de Fim no e-Construct:</label>
                    <div class="col-sm-10" style="margin-top: 0.5em">
                        <h5><?= $empresa->data_fim ?></h5>
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label  class="col-sm-2 col-form-label">Mensalidade:</label>
                    <div class="col-sm-10" style="margin-top: 0.5em">
                        <h5><?= $empresa->mensal ?></h5>
                    </div>
                </div>

                <div class="position-relative row form-group">
                    <label  class="col-sm-2 col-form-label">observação:</label>
                    <div class="col-sm-10" style="margin-top: 0.5em">
                        <h5><?= $empresa->observacao ?></h5>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Salvar'),['id'=>'salvarRenda','class'=>'btn btn-secondary']) ?>
            <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" data-dismiss="modal">fechar</button>
        </div>
        <?= $this->Form->end() ?>

</div>







<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Edit Empresa') ?></legend>
        <?php
            echo $this->Form->control('endereco_id');
            echo $this->Form->control('representante_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
