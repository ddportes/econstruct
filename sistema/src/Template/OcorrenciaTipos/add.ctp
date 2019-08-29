<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OcorrenciaTipo $ocorrenciaTipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['controller' => 'Ocorrencias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['controller' => 'Ocorrencias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ocorrenciaTipos form large-9 medium-8 columns content">
    <?= $this->Form->create($ocorrenciaTipo) ?>
    <fieldset>
        <legend><?= __('Add Ocorrencia Tipo') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
