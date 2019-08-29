<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contrato $contrato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contrato->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contrato->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contratos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['controller' => 'Orcamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orcamento'), ['controller' => 'Orcamentos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contratos form large-9 medium-8 columns content">
    <?= $this->Form->create($contrato) ?>
    <fieldset>
        <legend><?= __('Edit Contrato') ?></legend>
        <?php
            echo $this->Form->control('projeto_id');
            echo $this->Form->control('orcamento_id', ['options' => $orcamentos]);
            echo $this->Form->control('data_assinatura');
            echo $this->Form->control('data_inicial');
            echo $this->Form->control('data_final');
            echo $this->Form->control('empresa_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
