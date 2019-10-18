<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
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
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Editar Modelo.
                <div class="page-title-subheading">
                    <p>Preencha os campos abaixo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create($modelo) ?>
        <div class="mb-3 card">
            <div class="card-body">
                <div class="position-relative form-group">
                    <?= $this->Form->control('modelo_tipo_id', ['id'=>'modelo_tipo_id','options' => $modeloTipos, 'empty' => true,'label'=>'Tipo de Modelo','class' => 'form-control']); ?>
                </div>
                <div class="position-relative form-group">
                    <?= $this->Form->control('descricao', ['id'=>'descricao','label'=>'Descrição do Modelo','class' => 'form-control']); ?>
                </div>
                <div class="position-relative form-group">
                    <?= $this->Form->control('modelo', ['type'=>'textarea','id'=>'modelo','label'=>'Conteúdo do Modelo','class' => 'form-control']); ?>
                </div>
            </div>
            <div class="card-body" style="text-align: right;">
                <?= $this->Form->button(__('Salvar'),['id'=>'salvar','type'=>'submit','class'=>'btn btn-success']) ?>
            </div>

        </div>
        <?= $this->Form->end() ?>
    </div>

</div>
<script>
    CKEDITOR.replace( 'modelo' );
</script>