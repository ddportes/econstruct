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
            <div>Alterar Papel.
                <div class="page-title-subheading">Selecione o novo papel do usuário
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
                            <?= $this->Form->control('papel_id',['options'=>$papeis,'label'=>'Papel','class'=>'form-control','value' => $papel->papel_id]) ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
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