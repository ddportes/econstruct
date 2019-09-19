<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?= $this->Html->script('https://code.jquery.com/jquery-3.4.1.min.js',['block'=>true]) ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css',['block'=>true]) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js',['block'=>true]) ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js',['block'=>true]) ?>

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-key icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div><?= __('Editar ').$ocorrencia->ocorrencia_tipo->descricao ?>
                <div class="page-title-subheading">Edite a <?= $ocorrencia->ocorrencia_tipo->descricao ?> conforme a necessidade.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?= $this->Form->create($ocorrencia); ?>
                <div class="form-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Projeto </label><strong style="font-size: 1.5em"> <?= $ocorrencia->projeto->descricao ?></strong>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Cliente </label><strong style="font-size: 1.5em"> <?= $ocorrencia->projeto->cliente->pessoa->nome ?></strong>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>Telefones </label><br/><strong style="font-size: 1.5em"> <?= $ocorrencia->projeto->cliente->pessoa->allTelefones() ?></strong>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label>E-mails </label><br/><strong style="font-size: 1.5em"> <?= $ocorrencia->projeto->cliente->pessoa->allEmails() ?></strong>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('observacao',['label'=>'Observação','class'=>'form-control','type'=>'textarea','placeholder'=>'Edite a Observação']) ?>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('data',['id'=>'data','type'=>'text','label'=>'Data da Visita','class'=>'form-control','value'=>($ocorrencia->data <> ''?date('d/m/Y',strtotime($ocorrencia->data)):'')]) ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('data_pendencia',['id'=>'data_pendencia','type'=>'text','class'=>'form-control','label'=>'Data da Pendência','value'=>($ocorrencia->data_pendencia <> ''?date('d/m/Y',strtotime($ocorrencia->data_pendencia)):'')]) ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-11" style="text-align: right">
                        <?= $this->Form->button(__("Salvar"),['type'=>'submit','class'=>'mt-2 btn btn-primary']); ?>
                    </div>
                    <div class="col-md-1"></div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $( function() {
        $( "#data" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
    $( function() {
        $( "#data_pendencia" ).datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: false,
            language: "pt-BR"
        });
    } );
</script>
