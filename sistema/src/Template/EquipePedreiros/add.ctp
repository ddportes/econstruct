<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EquipePedreiro $equipePedreiro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipePedreiros form large-9 medium-8 columns content">
    <?= $this->Form->create($equipePedreiro) ?>
    <fieldset>
        <legend><?= __('Add Equipe Pedreiro') ?></legend>
        <?php
            echo $this->Form->control('equipe_id', ['options' => $equipes, 'empty' => true]);
            echo $this->Form->control('pedreiro_id', ['options' => $pedreiros, 'empty' => true]);
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
