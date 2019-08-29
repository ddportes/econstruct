<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProdutoTipo $produtoTipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produtoTipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produtoTipo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produto Tipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtoTipos form large-9 medium-8 columns content">
    <?= $this->Form->create($produtoTipo) ?>
    <fieldset>
        <legend><?= __('Edit Produto Tipo') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
