<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-key icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Resetar Senha.
                <div class="page-title-subheading">
                    <p>Escolha qual usuário terá a senha resetada.</br>
                    Será gerada uma senha aleatória.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?= $this->Form->create(); ?>
                <div class="form-row">

                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('selectUser',['type'=>'hidden','value'=>1]); ?>
                            <?= $this->Form->control('id',['options'=>$users,'label'=>'Usuário','class'=>'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: right">
                        <?= $this->Form->button(__("Resetar Senha"),['type'=>'submit','class'=>'mt-2 btn btn-primary']); ?>
                    </div>
                    <div class="col-md-3"></div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
