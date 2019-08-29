<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modificacao $modificacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Modificacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modificacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($modificacao) ?>
    <fieldset>
        <legend><?= __('Add Modificacao') ?></legend>
        <?php
            echo $this->Form->control('datahora');
            echo $this->Form->control('user_id');
            echo $this->Form->control('empresa_id', ['options' => $empresas]);
            echo $this->Form->control('controller');
            echo $this->Form->control('action');
            echo $this->Form->control('dados_originais');
            echo $this->Form->control('dados_novos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
