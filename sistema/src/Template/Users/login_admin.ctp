<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="features" style="padding-top: 70px;margin-bottom: 30px;">
    <div class="text-center features-caption features">
        <h4>Selecione a Empresa</h4>
        <p style="margin-top: 30px;padding-bottom: 30px; margin-bottom:0">Escolha a empresa que irá acessar.</p>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <?= $this->Form->create(); ?>
            <div class="form-row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <?= $this->Form->control('selectEmpresa',['type'=>'hidden','value'=>1]); ?>
                        <?= $this->Form->control('empresa_id',['options'=>$empresas,'label'=>'Empresa','class'=>'form-control']) ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="text-align: right">
                    <?= $this->Form->button(__("Selecionar"),['type'=>'submit','class'=>'mt-2 btn btn-primary']); ?>
                </div>
                <div class="col-md-3"></div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
