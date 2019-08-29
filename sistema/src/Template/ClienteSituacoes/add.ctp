<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClienteSituacao $clienteSituacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cliente Situacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clienteSituacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($clienteSituacao) ?>
    <fieldset>
        <legend><?= __('Add Cliente Situacao') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
