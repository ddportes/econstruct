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
    <?= $this->Html->css('perfect-scrollbar.min.css') ?>
    <?= $this->Html->css('icon-font.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('bootstrap-datepicker3.min.css') ?>

    <?= $this->fetch('css') ?>
    <?= $this->Html->css('jquery.popdown.css') ?>

    <?= $this->Html->script('main.js') ?>

    <?= $this->Html->script('jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('sizzle.min.js') ?>
    <?= $this->Html->script('perfect-scrollbar.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap4.2.1.min.js') ?>
    <?= $this->Html->script('metisMenu.min.js') ?>
    <?= $this->Html->script('notify.min.js') ?>
    <?= $this->Html->script('bootstrap-datepicker.min.js') ?>
    <?= $this->Html->script('bootstrap-datepicker.pt-BR.min.js') ?>
    <?= $this->Html->script('jquery.mask.min.js') ?>
    <?= $this->Html->script('jquery.maskMoney.min.js') ?>

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
