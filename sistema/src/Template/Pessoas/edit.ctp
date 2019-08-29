<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pessoa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contatos'), ['controller' => 'Contatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contato'), ['controller' => 'Contatos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rendas'), ['controller' => 'Rendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renda'), ['controller' => 'Rendas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoas form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoa) ?>
    <fieldset>
        <legend><?= __('Edit Pessoa') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('nome_social');
            echo $this->Form->control('estado_civil');
            echo $this->Form->control('conjuge_id');
            echo $this->Form->control('filhos');
            echo $this->Form->control('sexo');
            echo $this->Form->control('tipo');
            echo $this->Form->control('cpf_cnpj');
            echo $this->Form->control('rg');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
