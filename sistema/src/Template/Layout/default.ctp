<?php
$cakeDescription = 'e-Construct';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $this->Url->build('/favicon.ico') ?>">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title').' - '.$empresa->nome_fantasia ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Gestão de obras.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" integrity="sha256-Eff0vTAskMNGMXDva8NMruf8ex6k9EuZ4QXf09lxwaQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('css') ?>
    <?= $this->Html->css('jquery.popdown.css') ?>

    <?php echo $this->Html->script('main.js') ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sizzle/2.3.3/sizzle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.3/metisMenu.min.js" integrity="sha256-BNyjlkvjHfyJ3v5fTLcrkPCJlW0WxY/aa0c8XzIUVR8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha256-tSRROoGfGWTveRpDHFiWVz+UXt+xKNe90wwGn25lpw8=" crossorigin="anonymous"></script>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css',['block'=>true]) ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js',['block'=>true]) ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js',['block'=>true]) ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js',['block'=>true]) ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js',['block'=>true]) ?>
    <?= $this->Html->script('validacoes.js') ?>


    <?= $this->fetch('script') ?>


</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <?= $this->element('Layout/header'); ?>
        </div>
        <div class="app-main">

                <div class="app-sidebar sidebar-shadow">
                    <?= $this->element('Layout/menu'); ?>
                </div>    
                <div class="app-main__outer">
                    
                    <div class="app-main__inner">
                        <?php echo $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                    <div class="app-wrapper-footer">
                        <?= $this->element('Layout/rodape'); ?>
                    </div>
                </div>
        </div>
    </div>

    <?= $this->element('Layout/modals'); ?>
</body>
</html>
