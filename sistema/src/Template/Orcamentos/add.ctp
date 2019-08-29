<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Orcamento $orcamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contratos'), ['controller' => 'Contratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contrato'), ['controller' => 'Contratos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orcamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($orcamento) ?>
    <fieldset>
        <legend><?= __('Add Orcamento') ?></legend>
        <?php
            echo $this->Form->control('projeto_id', ['options' => $projetos]);
            echo $this->Form->control('custo');
            echo $this->Form->control('total');
            echo $this->Form->control('data_inicial', ['empty' => true]);
            echo $this->Form->control('data_entrega', ['empty' => true]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
