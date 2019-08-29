<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FornecedorSituacao $fornecedorSituacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fornecedorSituacao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedorSituacao->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fornecedor Situacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fornecedorSituacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($fornecedorSituacao) ?>
    <fieldset>
        <legend><?= __('Edit Fornecedor Situacao') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
