<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Adicionar Usuário.
                <div class="page-title-subheading">
                    <p>O usuário deve ser um e-mail válido. </br>
                    Será gerada senha aleatória que deverá ser trocada no primeiro uso.</p>
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
                            <?= $this->Form->control('username',['autocomplete'=>false,'label'=>'Usuário','class'=>'form-control']); ?>
                            <?= $this->Form->control('email',['autocomplete'=>false,'label'=>'Email','class'=>'form-control required']); ?>
                            <?= $this->Form->control('papel_id',['autocomplete'=>false,'type'=>'select','label'=>'Papel','options'=>$papeis,'class'=>'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="text-align: right">
                        <?= $this->Form->button(__("Adicionar"),['type'=>'submit','class'=>'mt-2 btn btn-primary']); ?>
                    </div>
                    <div class="col-md-3"></div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
