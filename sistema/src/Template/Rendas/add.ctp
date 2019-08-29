<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Renda $renda
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rendas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rendas form large-9 medium-8 columns content">
    <?= $this->Form->create($renda) ?>
    <fieldset>
        <legend><?= __('Add Renda') ?></legend>
        <?php
            echo $this->Form->control('fonte_pagadora');
            echo $this->Form->control('tipo');
            echo $this->Form->control('cpf_cnpj');
            echo $this->Form->control('renda_bruta');
            echo $this->Form->control('renda_liquida');
            echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
