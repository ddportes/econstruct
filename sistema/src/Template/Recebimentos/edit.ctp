<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recebimento $recebimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recebimento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recebimento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recebimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($recebimento) ?>
    <fieldset>
        <legend><?= __('Edit Recebimento') ?></legend>
        <?php
            echo $this->Form->control('projeto_id', ['options' => $projetos]);
            echo $this->Form->control('valor');
            echo $this->Form->control('data', ['empty' => true]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
