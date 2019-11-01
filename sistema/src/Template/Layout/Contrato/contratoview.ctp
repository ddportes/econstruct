<?php
$this->response->type('html');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="margin: 0px;">

<?= $this->element('Contrato/css'); ?>
<div style="width: 100vw;
         background: #6C7A89;
         display: flex;
         flex-direction: row;
         justify-content: center;
         padding-top: 10px;
         padding-bottom: 10px">
    <div style="width: 794px;
         background: #fff;
         padding: 20px 20px 20px 20px">
        <?= $this->fetch('content'); ?>
    </div>
</div>


<footer class="main-footer">
    <?= $this->element('Contrato/footer'); ?>
</footer>


</body>
</html>