<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipe $equipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equipes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipes form large-9 medium-8 columns content">
    <?= $this->Form->create($equipe) ?>
    <fieldset>
        <legend><?= __('Add Equipe') ?></legend>
        <?php
            echo $this->Form->control('projeto_id', ['options' => $projetos, 'empty' => true]);
            echo $this->Form->control('descricao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
