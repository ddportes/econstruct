<?php
$cakeDescription = 'e-Construct';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title').' - '.$empresa->nome_fantasia ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Gestão de obras.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.min.css" integrity="sha256-Eff0vTAskMNGMXDva8NMruf8ex6k9EuZ4QXf09lxwaQ=" crossorigin="anonymous" />


    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('main.js') ?>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php echo $this->Flash->render() ?>
        <div class="app-header header-shadow">
            <?= $this->element('Layout/header'); ?>
        </div>
        <div class="app-main">
        
                <div class="app-sidebar sidebar-shadow">
                    <?= $this->element('Layout/menu'); ?>
                </div>    
                <div class="app-main__outer">
                    
                    <div class="app-main__inner">

                        <?= $this->fetch('content') ?>
                    </div>
                    <div class="app-wrapper-footer">
                        <?= $this->element('Layout/rodape'); ?>
                    </div>
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <div style="display:none;">
        <button id="show-toastr-erro-econstruct" role="button" class="show-toastr-erro-econstruct"></button>
        <button id="show-toastr-info-econstruct" role="button" class="show-toastr-info-econstruct"></button>
        <button id="show-toastr-auth-econstruct" role="button" class="show-toastr-auth-econstruct"></button>
        <button id="show-toastr-success-econstruct" role="button" class="show-toastr-success-econstruct"></button>
        <button id="show-toastr-warning-econstruct" role="button" class="show-toastr-warning-econstruct"></button>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Html->script('main.js') ?>
</body>
</html>
