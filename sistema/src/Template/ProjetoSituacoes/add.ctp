<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjetoSituacao $projetoSituacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projeto Situacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projetoSituacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($projetoSituacao) ?>
    <fieldset>
        <legend><?= __('Add Projeto Situacao') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
