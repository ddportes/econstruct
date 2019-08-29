<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ocorrencia $ocorrencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['controller' => 'OcorrenciaTipos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['controller' => 'OcorrenciaTipos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ocorrencias form large-9 medium-8 columns content">
    <?= $this->Form->create($ocorrencia) ?>
    <fieldset>
        <legend><?= __('Add Ocorrencia') ?></legend>
        <?php
            echo $this->Form->control('ocorrencia_tipo_id', ['options' => $ocorrenciaTipos]);
            echo $this->Form->control('projeto_id', ['options' => $projetos, 'empty' => true]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('data', ['empty' => true]);
            echo $this->Form->control('data_pendencia', ['empty' => true]);
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
