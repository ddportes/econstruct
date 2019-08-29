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
            <div>Alterar Senha.
                <div class="page-title-subheading">Digite a senha antiga, a senha nova e a repita
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
                <?= $this->Form->create($user); ?>
                <div class="form-row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Usuário </label><strong style="font-size: 1.5em"> <?= $user->username ?></strong>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('current-password',['label'=>'Senha Atual','class'=>'form-control','type'=>'password','placeholder'=>'Digite sua Senha Atual']) ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('new-password',['label'=>'Senha Nova','class'=>'form-control','type'=>'password','value'=>'','placeholder'=>'Digite sua Senha Nova']) ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <?= $this->Form->control('repeat-password',['label'=>'Repita a Senha Nova','class'=>'form-control','type'=>'password','placeholder'=>'Digite novamente sua Senha Nova']) ?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: right">
                        <?= $this->Form->button(__("Salvar"),['type'=>'submit','class'=>'mt-2 btn btn-primary']); ?>
                    </div>
                    <div class="col-md-3"></div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>