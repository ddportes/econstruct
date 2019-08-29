<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedor Situacoes'), ['controller' => 'FornecedorSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor Situacao'), ['controller' => 'FornecedorSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedores form large-9 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Add Fornecedor') ?></legend>
        <?php
            echo $this->Form->control('fornecedor_situacao_id', ['options' => $fornecedorSituacoes]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
