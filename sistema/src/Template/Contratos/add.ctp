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

<div class="app-page-title">
<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Gerar Contrato.
            <div class="page-title-subheading">
                <p>Gera um novo contrato.</p>
            </div>
        </div>
    </div>
</div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <?php if(!empty($projeto_id)): ?>
                <?= $this->Form->create($contrato,['id'=>'formContrato','method'=>'post']) ?>
                    <div class="card-body">
                        <h5 class="card-title">Preencha as informações abaixo</h5>
                        <?php if(empty($orcamento_id)): ?>
                            <div class="position-relative row form-group">
                                <label for="orcamento_id" class="col-sm-2 col-form-label">Orçamento:</label>
                                <div class="col-sm-10">
                                    <?= $this->Form->control('orcamento_id',['label'=>false,'options'=>$orcamentos,'name'=>'orcamento_id','id'=>'orcamento_id','class'=>'form-control']); ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="position-relative row form-group">
                                <label class="col-sm-2 col-form-label">Orçamento:</label>
                                <div class="col-sm-10" style="margin-top: 0.5em">
                                    <b><?= $orcamento->id.' - '.$orcamento->total(true) ?></b>
                                </div>
                            </div>
                            <?= $this->Form->control('orcamento_id',['label'=>false,'type'=>'hidden','value'=>$orcamento_id,'name'=>'orcamento_id','id'=>'orcamento_id']); ?>
                        <?php endif; ?>
                        <?= $this->Form->control('projeto_id',['label'=>false,'type'=>'hidden','value'=>$projeto_id,'name'=>'projeto_id','id'=>'projeto_id']); ?>
                        <div class="position-relative row form-group">
                            <label for="minuta" class="col-sm-2 col-form-label">Minuta:</label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('minuta',['label'=>false,'type'=>'textarea','name'=>'minuta','id'=>'minuta','class'=>'form-control']); ?>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="data_assinatura" class="col-sm-2 col-form-label">Data Assinatura:</label>
                            <div class="col-sm-10">
                                <?= $this->Form->control('data_assinatura',['label'=>false,'type'=>'text','name'=>'data_assinatura','id'=>'data_assinatura','class'=>'form-control']); ?>
                            </div>
                        </div>
                    </div>
                <div class="card-body" style="text-align: right;">
                        <?= $this->Form->button(__('Salvar'),['id'=>'salvarContrato','class'=>'btn btn-success']) ?>
                    </div>
                <?= $this->Form->end() ?>
            <?php else: ?>
                <div class="card-body">
                    <h5 class="card-title">Selecione um cliente</h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'minuta' );
</script>



