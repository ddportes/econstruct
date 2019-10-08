<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>

<?php //echo $this->Html->script('renda.js') ?>

<script>
    var lista_campos_dinamicos = [];

    <?php foreach($tags as $key=>$tag): ?>
    lista_campos_dinamicos.push(["<?= $tag ?>","<?= $key ?>","<?= $key ?>"]);
    <?php endforeach; ?>
</script>

<script src="<?= $this->Url->build('/ckeditor/ckeditor.js') ?>"></script>

<div id="addContrato" >
    <div class="modal-header">
        <h5 class="modal-title">Configurações Padrão</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
            <span aria-hidden="true">×</span>
        </button>
    </div>

        <?= $this->Form->create($configuracao,['method'=>'post']) ?>
        <div class="modal-body">
            <h5 class="card-title">Preencha as informações abaixo</h5>
            <div class="position-relative row form-group">
                <label for="minuta_default" class="col-sm-2 col-form-label">Minuta Default:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('minuta_default',['label'=>false,'type'=>'textarea','name'=>'minuta_default','id'=>'minuta_default','class'=>'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="minuta_equipe_default" class="col-sm-2 col-form-label">Minuta Equipe Default:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('minuta_equipe_default',['label'=>false,'type'=>'textarea','name'=>'minuta_equipe_default','id'=>'minuta_equipe_default','class'=>'form-control']); ?>
                </div>
            </div>
            <div class="position-relative row form-group">
                <label for="recibo_default" class="col-sm-2 col-form-label">Recibo Default:</label>
                <div class="col-sm-10">
                    <?= $this->Form->control('recibo_default',['label'=>false,'type'=>'textarea','name'=>'recibo_default','id'=>'recibo_default','class'=>'form-control']); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?= $this->Form->button(__('Salvar'),['type'=>'submit','id'=>'salvarConfig','class'=>'btn btn-secondary']) ?>
            <button id="fechaModal" type="button" class="btn btn-secondary close-popdown" data-dismiss="modal">fechar</button>
        </div>
        <?= $this->Form->end() ?>
</div>
<script>
    CKEDITOR.replace( 'minuta_default' );
    CKEDITOR.replace( 'minuta_equipe_default' );
    CKEDITOR.replace( 'recibo_default' );
</script>
