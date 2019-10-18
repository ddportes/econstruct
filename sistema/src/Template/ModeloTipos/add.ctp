<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Novo Tipo de Modelo.
                <div class="page-title-subheading">
                    <p>Preencha o campo abaixo.</p>
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
                <div class="position-relative form-group">
                    <?= $this->Form->control('descricao', ['id'=>'descricao','label'=>'Descrição do Modelo','class' => 'form-control']); ?>
                </div>
            </div>
            <div class="card-body" style="text-align: right;">
                <?= $this->Form->button(__('Salvar'),['id'=>'salvar','type'=>'submit','class'=>'btn btn-success']) ?>
            </div>

        </div>
        <?= $this->Form->end() ?>
    </div>

</div>