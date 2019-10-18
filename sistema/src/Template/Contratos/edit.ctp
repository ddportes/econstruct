<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>
<?= $this->Html->script('contrato.js') ?>
<script>

    var lista_campos_dinamicos = [];
    var lista_modelos = [];

    var urlCampos = '<?= $this->Url->build(['controller'=>'Contratos','action'=>'tags']) ?>';
    var urlModelos = '<?= $this->Url->build(['controller'=>'Modelos','action'=>'modelos']) ?>';
    var hash = '<?= $this->request->getParam("_csrfToken") ?>';

</script>
<?= $this->Html->script('campos_modelos.js') ?>

<script src="<?= $this->Url->build('/ckeditor/ckeditor.js') ?>"></script>

<div id="cadContrato" >
    <?php echo $this->Flash->render() ?>
    <div class="modal-header">
        <h5 class="modal-title">Editar Contrato</h5>

        <button type="button" class="close" onclick="location.reload();" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <?php if(!empty($projeto_id)): ?>
        <?= $this->Form->create($contrato,['id'=>'formContrato']) ?>
        <div class="modal-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><?= $this->Html->link('Voltar para Orçamentos',
                                ['controller' => 'Orcamentos', 'action' => 'add', $projeto_id], [
                                    'id' => 'addOrcamento',
                                    'class' => 'modal_xl_link addOrcamento',
                                    'style'=>'top:2.5em',
                                    'title'=>'Voltar para Orçamentos',
                                    'escape' => false
                                ]) ?></li>
                        <li class="breadcrumb-item active" aria-current="page">Gerar Contrato</li>
                    </ol>
                </nav>
            <h5 class="card-title">Preencha as informações abaixo</h5>

                <div class="position-relative row form-group">
                    <label class="col-sm-2 col-form-label">Orçamento:</label>
                    <div class="col-sm-10" style="margin-top: 0.5em">
                        <b><?= $contrato->orcamento_id.' - '.$contrato->orcamento->total(true) ?></b>
                    </div>
                </div>
                <?= $this->Form->control('orcamento_id',['label'=>false,'type'=>'hidden','value'=>$contrato->orcamento_id,'name'=>'orcamento_id','id'=>'orcamento_id']); ?>

            <?= $this->Form->control('projeto_id',['label'=>false,'type'=>'hidden','value'=>$projeto_id,'name'=>'projeto_id','id'=>'projeto_id']); ?>
            <?= $this->Form->control('id',['label'=>false,'type'=>'hidden','name'=>'id','id'=>'id']); ?>
            <div class="position-relative row form-group">
                <label for="minutaEdit" class="col-sm-2 col-form-label">Minuta:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('minuta',['label'=>false,'type'=>'textarea','value'=>$contrato->minuta,'id'=>'minuta','class'=>'form-control']); ?>
                </div>
            </div>

            <div class="position-relative row form-group">
                <label for="data_assinatura" class="col-sm-2 col-form-label">Data Assinatura:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('data_assinatura',['label'=>false,'type'=>'text','name'=>'data_assinatura','id'=>'data_assinatura','value'=>($contrato->data_assinatura <> ''?date('d/m/Y',strtotime($contrato->data_assinatura)):''),'class'=>'form-control']); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Salvar'),['id'=>'salvarContrato','class'=>'btn btn-secondary']) ?>
            <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" onclick="location.reload();" data-dismiss="modal">fechar</button>
        </div>
        <?= $this->Form->end() ?>

    <?php else: ?>
        <div class="modal-body"><h5 class="card-title">Selecione um cliente</h5>
        </div>
    <?php endif; ?>
</div>
<script>


    CKEDITOR.replace( 'minuta' );


</script>
