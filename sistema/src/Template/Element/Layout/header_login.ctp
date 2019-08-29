
<div class="app-header__logo">
    <div class="logo-src"></div>

</div>
<div class="app-header__content">
    <div class="app-header-left">

    </div>
    <div class="app-header-right">
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <span style="font-weight: bold">Login&nbsp</span>
                </div>
            </div>
        </div>
        <?php
            echo $this->Form->create('User',['class'=>'form-inline']);
        ?>
        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
            <?php

            echo $this->Form->control('username', [
                    'label' => false,
                    'placeholder' => 'Usuário',
                    'autofocus' => true,
                    'required' => true
                ]).'&nbsp';
            ?>
        </div>

        <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
            <?php
            echo $this->Form->control('password', [
                    'type' => 'password',
                    'label' => false,
                    'placeholder' => 'Senha',
                    'value' => '',
                    'required' => true
                ]).'&nbsp';
            ?>
        </div>
        <?php
        echo $this->Form->button(__('Entrar'), ['class' => "btn btn-info"]);
        ?>
        <?php

        echo $this->Form->end();
        ?>

    </div>
</div>
