<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuracao $configuracao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Configuracoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="configuracoes form large-9 medium-8 columns content">
    <?= $this->Form->create($configuracao) ?>
    <fieldset>
        <legend><?= __('Add Configuracao') ?></legend>
        <?php
            echo $this->Form->control('minuta_default');
            echo $this->Form->control('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->control('u_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
