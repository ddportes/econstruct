<?php
$this->response->type('pdf');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>


<?= $this->element('Contrato/css'); ?>
<?= $this->fetch('content'); ?>


<footer class="main-footer">
    <?= $this->element('Contrato/footer'); ?>
</footer>


</body>
</html>