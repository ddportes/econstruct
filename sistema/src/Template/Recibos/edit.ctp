<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recibo $recibo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recibo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recibo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recibos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recibos form large-9 medium-8 columns content">
    <?= $this->Form->create($recibo) ?>
    <fieldset>
        <legend><?= __('Edit Recibo') ?></legend>
        <?php
            echo $this->Form->control('equipe_id', ['options' => $equipes, 'empty' => true]);
            echo $this->Form->control('projeto_id', ['options' => $projetos, 'empty' => true]);
            echo $this->Form->control('valor');
            echo $this->Form->control('data', ['empty' => true]);
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
