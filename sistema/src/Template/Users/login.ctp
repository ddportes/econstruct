<div id="features" style="padding-top: 70px;margin-bottom: 30px;">
    <div class="text-center features-caption features">
        <h4>Acesse o e-Construct</h4>
        <p style="margin-top: 30px;padding-bottom: 30px; margin-bottom:0">Digite seu usuário e senha válidos para acessar o sistema.</p>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <?= $this->Form->create(); ?>
            <div class="form-row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <?= $this->Form->control('username',['label'=>'Usuário','class'=>'form-control','placeholder'=>'Digite seu Usuário']) ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <?= $this->Form->control('password',['label'=>'Senha','class'=>'form-control','type'=>'password','placeholder'=>'Digite sua Senha']) ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="text-align: right">
                    <?= $this->Form->button(__("Login"),['type'=>'submit','class'=>'mt-2 btn btn-primary']); ?>
                </div>
                <div class="col-md-3"></div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>