<?php
$cakeDescription = 'e-Construct';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $this->Url->build('/favicon.ico') ?>">
    <title>
        <?= $cakeDescription ?>:
        <?= __('Gestão de Obras') ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('fonts.google.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>

    <?= $this->Html->script('jquery-3.3.1.slim.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap4.2.1.min.js') ?>
    <?= $this->Html->script('notify.min.js') ?>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php echo $this->Flash->render() ?>
        <div class="app-header ">
            <?= $this->element('Layout/header_externo'); ?>
        </div>        
        <div class="app-main">

                <div class="app-main__outer_login">
                    
                    <div class="app-main__inner" style="margin-bottom: 250px; padding:0">
                        <?= $this->fetch('content') ?>
                    </div>
                    <div class="app-wrapper-footer">
                        <?= $this->element('Layout/rodape_externo'); ?>
                    </div>    
                </div>
        </div>
    </div>

    <?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('scrollreveal.min.js') ?>
    <?= $this->Html->script('scrollreveal.min.js') ?>
    <?= $this->Html->script('script_externo.js') ?>

    <?= $this->Html->script('notify.min.js') ?>
</body>
</html>
