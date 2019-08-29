<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedreiro $pedreiro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedreiro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiro->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedreiro Situacoes'), ['controller' => 'PedreiroSituacoes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedreiro Situacao'), ['controller' => 'PedreiroSituacoes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedreiros form large-9 medium-8 columns content">
    <?= $this->Form->create($pedreiro) ?>
    <fieldset>
        <legend><?= __('Edit Pedreiro') ?></legend>
        <?php
            echo $this->Form->control('pessoa_id', ['options' => $pessoas]);
            echo $this->Form->control('pedreiro_situacao_id', ['options' => $pedreiroSituacoes, 'empty' => true]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
