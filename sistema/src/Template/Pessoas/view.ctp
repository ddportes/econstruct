<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pessoa $pessoa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoa'), ['action' => 'edit', $pessoa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoa'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contatos'), ['controller' => 'Contatos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contato'), ['controller' => 'Contatos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rendas'), ['controller' => 'Rendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renda'), ['controller' => 'Rendas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoas view large-9 medium-8 columns content">
    <h3><?= h($pessoa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($pessoa->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome Social') ?></th>
            <td><?= h($pessoa->nome_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($pessoa->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($pessoa->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf Cnpj') ?></th>
            <td><?= h($pessoa->cpf_cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rg') ?></th>
            <td><?= h($pessoa->rg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado Civil') ?></th>
            <td><?= $this->Number->format($pessoa->estado_civil) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conjuge Id') ?></th>
            <td><?= $this->Number->format($pessoa->conjuge_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filhos') ?></th>
            <td><?= $this->Number->format($pessoa->filhos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($pessoa->empresa_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pessoa->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pessoa->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clientes') ?></h4>
        <?php if (!empty($pessoa->clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Cliente Situacao Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->clientes as $clientes): ?>
            <tr>
                <td><?= h($clientes->id) ?></td>
                <td><?= h($clientes->pessoa_id) ?></td>
                <td><?= h($clientes->cliente_situacao_id) ?></td>
                <td><?= h($clientes->observacao) ?></td>
                <td><?= h($clientes->created) ?></td>
                <td><?= h($clientes->modified) ?></td>
                <td><?= h($clientes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clientes', 'action' => 'view', $clientes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clientes', 'action' => 'edit', $clientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientes', 'action' => 'delete', $clientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Contatos') ?></h4>
        <?php if (!empty($pessoa->contatos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Principal') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->contatos as $contatos): ?>
            <tr>
                <td><?= h($contatos->id) ?></td>
                <td><?= h($contatos->pessoa_id) ?></td>
                <td><?= h($contatos->tipo) ?></td>
                <td><?= h($contatos->valor) ?></td>
                <td><?= h($contatos->principal) ?></td>
                <td><?= h($contatos->created) ?></td>
                <td><?= h($contatos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contatos', 'action' => 'view', $contatos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contatos', 'action' => 'edit', $contatos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contatos', 'action' => 'delete', $contatos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contatos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Enderecos') ?></h4>
        <?php if (!empty($pessoa->enderecos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Logradouro') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Complemento') ?></th>
                <th scope="col"><?= __('Bairro') ?></th>
                <th scope="col"><?= __('Cep') ?></th>
                <th scope="col"><?= __('Cidade Id') ?></th>
                <th scope="col"><?= __('Principal') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->enderecos as $enderecos): ?>
            <tr>
                <td><?= h($enderecos->id) ?></td>
                <td><?= h($enderecos->pessoa_id) ?></td>
                <td><?= h($enderecos->logradouro) ?></td>
                <td><?= h($enderecos->numero) ?></td>
                <td><?= h($enderecos->complemento) ?></td>
                <td><?= h($enderecos->bairro) ?></td>
                <td><?= h($enderecos->cep) ?></td>
                <td><?= h($enderecos->cidade_id) ?></td>
                <td><?= h($enderecos->principal) ?></td>
                <td><?= h($enderecos->created) ?></td>
                <td><?= h($enderecos->modified) ?></td>
                <td><?= h($enderecos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Enderecos', 'action' => 'view', $enderecos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Enderecos', 'action' => 'edit', $enderecos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enderecos', 'action' => 'delete', $enderecos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enderecos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fornecedores') ?></h4>
        <?php if (!empty($pessoa->fornecedores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fornecedor Situacao Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->fornecedores as $fornecedores): ?>
            <tr>
                <td><?= h($fornecedores->id) ?></td>
                <td><?= h($fornecedores->fornecedor_situacao_id) ?></td>
                <td><?= h($fornecedores->observacao) ?></td>
                <td><?= h($fornecedores->pessoa_id) ?></td>
                <td><?= h($fornecedores->created) ?></td>
                <td><?= h($fornecedores->modified) ?></td>
                <td><?= h($fornecedores->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fornecedores', 'action' => 'view', $fornecedores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fornecedores', 'action' => 'edit', $fornecedores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fornecedores', 'action' => 'delete', $fornecedores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedreiros') ?></h4>
        <?php if (!empty($pessoa->pedreiros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Pedreiro Situacao Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->pedreiros as $pedreiros): ?>
            <tr>
                <td><?= h($pedreiros->id) ?></td>
                <td><?= h($pedreiros->pessoa_id) ?></td>
                <td><?= h($pedreiros->pedreiro_situacao_id) ?></td>
                <td><?= h($pedreiros->observacao) ?></td>
                <td><?= h($pedreiros->created) ?></td>
                <td><?= h($pedreiros->modified) ?></td>
                <td><?= h($pedreiros->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pedreiros', 'action' => 'view', $pedreiros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedreiros', 'action' => 'edit', $pedreiros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedreiros', 'action' => 'delete', $pedreiros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rendas') ?></h4>
        <?php if (!empty($pessoa->rendas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fonte Pagadora') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Cpf Cnpj') ?></th>
                <th scope="col"><?= __('Renda Bruta') ?></th>
                <th scope="col"><?= __('Renda Liquida') ?></th>
                <th scope="col"><?= __('Pessoa Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->rendas as $rendas): ?>
            <tr>
                <td><?= h($rendas->id) ?></td>
                <td><?= h($rendas->fonte_pagadora) ?></td>
                <td><?= h($rendas->tipo) ?></td>
                <td><?= h($rendas->cpf_cnpj) ?></td>
                <td><?= h($rendas->renda_bruta) ?></td>
                <td><?= h($rendas->renda_liquida) ?></td>
                <td><?= h($rendas->pessoa_id) ?></td>
                <td><?= h($rendas->created) ?></td>
                <td><?= h($rendas->modified) ?></td>
                <td><?= h($rendas->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rendas', 'action' => 'view', $rendas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rendas', 'action' => 'edit', $rendas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rendas', 'action' => 'delete', $rendas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rendas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
