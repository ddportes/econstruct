<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Empresa $empresa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Empresa'), ['action' => 'edit', $empresa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Empresa'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cliente Situacoes'), ['controller' => 'ClienteSituacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente Situacao'), ['controller' => 'ClienteSituacoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contratos'), ['controller' => 'Contratos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contrato'), ['controller' => 'Contratos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos'), ['controller' => 'Enderecos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Endereco'), ['controller' => 'Enderecos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipe Pedreiros'), ['controller' => 'EquipePedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe Pedreiro'), ['controller' => 'EquipePedreiros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipes'), ['controller' => 'Equipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipe'), ['controller' => 'Equipes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedor Situacoes'), ['controller' => 'FornecedorSituacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor Situacao'), ['controller' => 'FornecedorSituacoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['controller' => 'Fornecedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Itens'), ['controller' => 'Itens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Itens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notas'), ['controller' => 'Notas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota'), ['controller' => 'Notas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ocorrencia Tipos'), ['controller' => 'OcorrenciaTipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ocorrencia Tipo'), ['controller' => 'OcorrenciaTipos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ocorrencias'), ['controller' => 'Ocorrencias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ocorrencia'), ['controller' => 'Ocorrencias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orcamentos'), ['controller' => 'Orcamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orcamento'), ['controller' => 'Orcamentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Papeis'), ['controller' => 'Papeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Papel'), ['controller' => 'Papeis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiro Situacoes'), ['controller' => 'PedreiroSituacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro Situacao'), ['controller' => 'PedreiroSituacoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedreiros'), ['controller' => 'Pedreiros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedreiro'), ['controller' => 'Pedreiros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissao Papeis'), ['controller' => 'PermissaoPapeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao Papel'), ['controller' => 'PermissaoPapeis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissoes'), ['controller' => 'Permissoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissao'), ['controller' => 'Permissoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produto Tipos'), ['controller' => 'ProdutoTipos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto Tipo'), ['controller' => 'ProdutoTipos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projeto Situacoes'), ['controller' => 'ProjetoSituacoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto Situacao'), ['controller' => 'ProjetoSituacoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recebimentos'), ['controller' => 'Recebimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recebimento'), ['controller' => 'Recebimentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rendas'), ['controller' => 'Rendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renda'), ['controller' => 'Rendas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Papeis'), ['controller' => 'UserPapeis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Papel'), ['controller' => 'UserPapeis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empresas view large-9 medium-8 columns content">
    <h3><?= h($empresa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($empresa->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf Cnpj') ?></th>
            <td><?= h($empresa->cpf_cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Razao Social') ?></th>
            <td><?= h($empresa->razao_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome Fantasia') ?></th>
            <td><?= h($empresa->nome_fantasia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($empresa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mensal') ?></th>
            <td><?= $this->Number->format($empresa->mensal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Inicio') ?></th>
            <td><?= h($empresa->data_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Fim') ?></th>
            <td><?= h($empresa->data_fim) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($empresa->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($empresa->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($empresa->observacao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cliente Situacoes') ?></h4>
        <?php if (!empty($empresa->cliente_situacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->cliente_situacoes as $clienteSituacoes): ?>
            <tr>
                <td><?= h($clienteSituacoes->id) ?></td>
                <td><?= h($clienteSituacoes->descricao) ?></td>
                <td><?= h($clienteSituacoes->created) ?></td>
                <td><?= h($clienteSituacoes->modified) ?></td>
                <td><?= h($clienteSituacoes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ClienteSituacoes', 'action' => 'view', $clienteSituacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ClienteSituacoes', 'action' => 'edit', $clienteSituacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClienteSituacoes', 'action' => 'delete', $clienteSituacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clienteSituacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clientes') ?></h4>
        <?php if (!empty($empresa->clientes)): ?>
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
            <?php foreach ($empresa->clientes as $clientes): ?>
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
        <h4><?= __('Related Contratos') ?></h4>
        <?php if (!empty($empresa->contratos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Orcamento Id') ?></th>
                <th scope="col"><?= __('Data Assinatura') ?></th>
                <th scope="col"><?= __('Data Inicial') ?></th>
                <th scope="col"><?= __('Data Final') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->contratos as $contratos): ?>
            <tr>
                <td><?= h($contratos->id) ?></td>
                <td><?= h($contratos->projeto_id) ?></td>
                <td><?= h($contratos->orcamento_id) ?></td>
                <td><?= h($contratos->data_assinatura) ?></td>
                <td><?= h($contratos->data_inicial) ?></td>
                <td><?= h($contratos->data_final) ?></td>
                <td><?= h($contratos->created) ?></td>
                <td><?= h($contratos->modified) ?></td>
                <td><?= h($contratos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contratos', 'action' => 'view', $contratos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contratos', 'action' => 'edit', $contratos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contratos', 'action' => 'delete', $contratos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Enderecos') ?></h4>
        <?php if (!empty($empresa->enderecos)): ?>
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
            <?php foreach ($empresa->enderecos as $enderecos): ?>
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
        <h4><?= __('Related Equipe Pedreiros') ?></h4>
        <?php if (!empty($empresa->equipe_pedreiros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Equipe Id') ?></th>
                <th scope="col"><?= __('Pedreiro Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->equipe_pedreiros as $equipePedreiros): ?>
            <tr>
                <td><?= h($equipePedreiros->id) ?></td>
                <td><?= h($equipePedreiros->equipe_id) ?></td>
                <td><?= h($equipePedreiros->pedreiro_id) ?></td>
                <td><?= h($equipePedreiros->created) ?></td>
                <td><?= h($equipePedreiros->modified) ?></td>
                <td><?= h($equipePedreiros->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EquipePedreiros', 'action' => 'view', $equipePedreiros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EquipePedreiros', 'action' => 'edit', $equipePedreiros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquipePedreiros', 'action' => 'delete', $equipePedreiros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipePedreiros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipes') ?></h4>
        <?php if (!empty($empresa->equipes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->equipes as $equipes): ?>
            <tr>
                <td><?= h($equipes->id) ?></td>
                <td><?= h($equipes->projeto_id) ?></td>
                <td><?= h($equipes->descricao) ?></td>
                <td><?= h($equipes->created) ?></td>
                <td><?= h($equipes->modified) ?></td>
                <td><?= h($equipes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Equipes', 'action' => 'view', $equipes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Equipes', 'action' => 'edit', $equipes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Equipes', 'action' => 'delete', $equipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fornecedor Situacoes') ?></h4>
        <?php if (!empty($empresa->fornecedor_situacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->fornecedor_situacoes as $fornecedorSituacoes): ?>
            <tr>
                <td><?= h($fornecedorSituacoes->id) ?></td>
                <td><?= h($fornecedorSituacoes->descricao) ?></td>
                <td><?= h($fornecedorSituacoes->created) ?></td>
                <td><?= h($fornecedorSituacoes->modified) ?></td>
                <td><?= h($fornecedorSituacoes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FornecedorSituacoes', 'action' => 'view', $fornecedorSituacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FornecedorSituacoes', 'action' => 'edit', $fornecedorSituacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FornecedorSituacoes', 'action' => 'delete', $fornecedorSituacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedorSituacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fornecedores') ?></h4>
        <?php if (!empty($empresa->fornecedores)): ?>
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
            <?php foreach ($empresa->fornecedores as $fornecedores): ?>
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
        <h4><?= __('Related Itens') ?></h4>
        <?php if (!empty($empresa->itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nota Id') ?></th>
                <th scope="col"><?= __('Fornecedor Id') ?></th>
                <th scope="col"><?= __('Produto Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Desconto Valor') ?></th>
                <th scope="col"><?= __('Desconto Percentual') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->itens as $itens): ?>
            <tr>
                <td><?= h($itens->id) ?></td>
                <td><?= h($itens->nota_id) ?></td>
                <td><?= h($itens->fornecedor_id) ?></td>
                <td><?= h($itens->produto_id) ?></td>
                <td><?= h($itens->observacao) ?></td>
                <td><?= h($itens->valor) ?></td>
                <td><?= h($itens->desconto_valor) ?></td>
                <td><?= h($itens->desconto_percentual) ?></td>
                <td><?= h($itens->created) ?></td>
                <td><?= h($itens->modified) ?></td>
                <td><?= h($itens->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Itens', 'action' => 'view', $itens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Itens', 'action' => 'edit', $itens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Itens', 'action' => 'delete', $itens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notas') ?></h4>
        <?php if (!empty($empresa->notas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->notas as $notas): ?>
            <tr>
                <td><?= h($notas->id) ?></td>
                <td><?= h($notas->projeto_id) ?></td>
                <td><?= h($notas->data) ?></td>
                <td><?= h($notas->valor) ?></td>
                <td><?= h($notas->created) ?></td>
                <td><?= h($notas->modified) ?></td>
                <td><?= h($notas->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notas', 'action' => 'view', $notas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notas', 'action' => 'edit', $notas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notas', 'action' => 'delete', $notas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ocorrencia Tipos') ?></h4>
        <?php if (!empty($empresa->ocorrencia_tipos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->ocorrencia_tipos as $ocorrenciaTipos): ?>
            <tr>
                <td><?= h($ocorrenciaTipos->id) ?></td>
                <td><?= h($ocorrenciaTipos->descricao) ?></td>
                <td><?= h($ocorrenciaTipos->created) ?></td>
                <td><?= h($ocorrenciaTipos->modified) ?></td>
                <td><?= h($ocorrenciaTipos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OcorrenciaTipos', 'action' => 'view', $ocorrenciaTipos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OcorrenciaTipos', 'action' => 'edit', $ocorrenciaTipos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OcorrenciaTipos', 'action' => 'delete', $ocorrenciaTipos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrenciaTipos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ocorrencias') ?></h4>
        <?php if (!empty($empresa->ocorrencias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ocorrencia Tipo Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->ocorrencias as $ocorrencias): ?>
            <tr>
                <td><?= h($ocorrencias->id) ?></td>
                <td><?= h($ocorrencias->ocorrencia_tipo_id) ?></td>
                <td><?= h($ocorrencias->projeto_id) ?></td>
                <td><?= h($ocorrencias->observacao) ?></td>
                <td><?= h($ocorrencias->data) ?></td>
                <td><?= h($ocorrencias->created) ?></td>
                <td><?= h($ocorrencias->modified) ?></td>
                <td><?= h($ocorrencias->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ocorrencias', 'action' => 'view', $ocorrencias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ocorrencias', 'action' => 'edit', $ocorrencias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ocorrencias', 'action' => 'delete', $ocorrencias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ocorrencias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orcamentos') ?></h4>
        <?php if (!empty($empresa->orcamentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Custo') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Data Inicial') ?></th>
                <th scope="col"><?= __('Data Entrega') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->orcamentos as $orcamentos): ?>
            <tr>
                <td><?= h($orcamentos->id) ?></td>
                <td><?= h($orcamentos->projeto_id) ?></td>
                <td><?= h($orcamentos->custo) ?></td>
                <td><?= h($orcamentos->total) ?></td>
                <td><?= h($orcamentos->data_inicial) ?></td>
                <td><?= h($orcamentos->data_entrega) ?></td>
                <td><?= h($orcamentos->observacao) ?></td>
                <td><?= h($orcamentos->created) ?></td>
                <td><?= h($orcamentos->modified) ?></td>
                <td><?= h($orcamentos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orcamentos', 'action' => 'view', $orcamentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orcamentos', 'action' => 'edit', $orcamentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orcamentos', 'action' => 'delete', $orcamentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orcamentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Papeis') ?></h4>
        <?php if (!empty($empresa->papeis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Papel Pai Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->papeis as $papeis): ?>
            <tr>
                <td><?= h($papeis->id) ?></td>
                <td><?= h($papeis->descricao) ?></td>
                <td><?= h($papeis->papel_pai_id) ?></td>
                <td><?= h($papeis->empresa_id) ?></td>
                <td><?= h($papeis->created) ?></td>
                <td><?= h($papeis->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Papeis', 'action' => 'view', $papeis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Papeis', 'action' => 'edit', $papeis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Papeis', 'action' => 'delete', $papeis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $papeis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedreiro Situacoes') ?></h4>
        <?php if (!empty($empresa->pedreiro_situacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->pedreiro_situacoes as $pedreiroSituacoes): ?>
            <tr>
                <td><?= h($pedreiroSituacoes->id) ?></td>
                <td><?= h($pedreiroSituacoes->descricao) ?></td>
                <td><?= h($pedreiroSituacoes->created) ?></td>
                <td><?= h($pedreiroSituacoes->modified) ?></td>
                <td><?= h($pedreiroSituacoes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PedreiroSituacoes', 'action' => 'view', $pedreiroSituacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PedreiroSituacoes', 'action' => 'edit', $pedreiroSituacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedreiroSituacoes', 'action' => 'delete', $pedreiroSituacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedreiroSituacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedreiros') ?></h4>
        <?php if (!empty($empresa->pedreiros)): ?>
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
            <?php foreach ($empresa->pedreiros as $pedreiros): ?>
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
        <h4><?= __('Related Permissao Papeis') ?></h4>
        <?php if (!empty($empresa->permissao_papeis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Permissao Id') ?></th>
                <th scope="col"><?= __('Papel Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->permissao_papeis as $permissaoPapeis): ?>
            <tr>
                <td><?= h($permissaoPapeis->id) ?></td>
                <td><?= h($permissaoPapeis->permissao_id) ?></td>
                <td><?= h($permissaoPapeis->papel_id) ?></td>
                <td><?= h($permissaoPapeis->created) ?></td>
                <td><?= h($permissaoPapeis->modified) ?></td>
                <td><?= h($permissaoPapeis->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PermissaoPapeis', 'action' => 'view', $permissaoPapeis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PermissaoPapeis', 'action' => 'edit', $permissaoPapeis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PermissaoPapeis', 'action' => 'delete', $permissaoPapeis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissaoPapeis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Permissoes') ?></h4>
        <?php if (!empty($empresa->permissoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Permissao Pai Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->permissoes as $permissoes): ?>
            <tr>
                <td><?= h($permissoes->id) ?></td>
                <td><?= h($permissoes->descricao) ?></td>
                <td><?= h($permissoes->permissao_pai_id) ?></td>
                <td><?= h($permissoes->created) ?></td>
                <td><?= h($permissoes->modified) ?></td>
                <td><?= h($permissoes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permissoes', 'action' => 'view', $permissoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permissoes', 'action' => 'edit', $permissoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permissoes', 'action' => 'delete', $permissoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pessoas') ?></h4>
        <?php if (!empty($empresa->pessoas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Nome Social') ?></th>
                <th scope="col"><?= __('Estado Civil') ?></th>
                <th scope="col"><?= __('Conjuge Id') ?></th>
                <th scope="col"><?= __('Filhos') ?></th>
                <th scope="col"><?= __('Sexo') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Cpf Cnpj') ?></th>
                <th scope="col"><?= __('Rg') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->pessoas as $pessoas): ?>
            <tr>
                <td><?= h($pessoas->id) ?></td>
                <td><?= h($pessoas->nome) ?></td>
                <td><?= h($pessoas->nome_social) ?></td>
                <td><?= h($pessoas->estado_civil) ?></td>
                <td><?= h($pessoas->conjuge_id) ?></td>
                <td><?= h($pessoas->filhos) ?></td>
                <td><?= h($pessoas->sexo) ?></td>
                <td><?= h($pessoas->tipo) ?></td>
                <td><?= h($pessoas->cpf_cnpj) ?></td>
                <td><?= h($pessoas->rg) ?></td>
                <td><?= h($pessoas->created) ?></td>
                <td><?= h($pessoas->modified) ?></td>
                <td><?= h($pessoas->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pessoas', 'action' => 'view', $pessoas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pessoas', 'action' => 'edit', $pessoas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pessoas', 'action' => 'delete', $pessoas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Produto Tipos') ?></h4>
        <?php if (!empty($empresa->produto_tipos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->produto_tipos as $produtoTipos): ?>
            <tr>
                <td><?= h($produtoTipos->id) ?></td>
                <td><?= h($produtoTipos->descricao) ?></td>
                <td><?= h($produtoTipos->created) ?></td>
                <td><?= h($produtoTipos->modified) ?></td>
                <td><?= h($produtoTipos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProdutoTipos', 'action' => 'view', $produtoTipos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProdutoTipos', 'action' => 'edit', $produtoTipos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdutoTipos', 'action' => 'delete', $produtoTipos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtoTipos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($empresa->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Produto Tipo Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->id) ?></td>
                <td><?= h($produtos->descricao) ?></td>
                <td><?= h($produtos->produto_tipo_id) ?></td>
                <td><?= h($produtos->created) ?></td>
                <td><?= h($produtos->modified) ?></td>
                <td><?= h($produtos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produtos', 'action' => 'delete', $produtos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projeto Situacoes') ?></h4>
        <?php if (!empty($empresa->projeto_situacoes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->projeto_situacoes as $projetoSituacoes): ?>
            <tr>
                <td><?= h($projetoSituacoes->id) ?></td>
                <td><?= h($projetoSituacoes->descricao) ?></td>
                <td><?= h($projetoSituacoes->created) ?></td>
                <td><?= h($projetoSituacoes->modified) ?></td>
                <td><?= h($projetoSituacoes->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjetoSituacoes', 'action' => 'view', $projetoSituacoes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjetoSituacoes', 'action' => 'edit', $projetoSituacoes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjetoSituacoes', 'action' => 'delete', $projetoSituacoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetoSituacoes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($empresa->projetos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Detalhes') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Pasta Projeto') ?></th>
                <th scope="col"><?= __('Projeto Situacao Id') ?></th>
                <th scope="col"><?= __('Contrato Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Orcamento') ?></th>
                <th scope="col"><?= __('Custo Estimado') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->projetos as $projetos): ?>
            <tr>
                <td><?= h($projetos->id) ?></td>
                <td><?= h($projetos->descricao) ?></td>
                <td><?= h($projetos->detalhes) ?></td>
                <td><?= h($projetos->cliente_id) ?></td>
                <td><?= h($projetos->pasta_projeto) ?></td>
                <td><?= h($projetos->projeto_situacao_id) ?></td>
                <td><?= h($projetos->contrato_id) ?></td>
                <td><?= h($projetos->created) ?></td>
                <td><?= h($projetos->modified) ?></td>
                <td><?= h($projetos->orcamento) ?></td>
                <td><?= h($projetos->custo_estimado) ?></td>
                <td><?= h($projetos->observacao) ?></td>
                <td><?= h($projetos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projetos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projetos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recebimentos') ?></h4>
        <?php if (!empty($empresa->recebimentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->recebimentos as $recebimentos): ?>
            <tr>
                <td><?= h($recebimentos->id) ?></td>
                <td><?= h($recebimentos->projeto_id) ?></td>
                <td><?= h($recebimentos->valor) ?></td>
                <td><?= h($recebimentos->data) ?></td>
                <td><?= h($recebimentos->created) ?></td>
                <td><?= h($recebimentos->modified) ?></td>
                <td><?= h($recebimentos->observacao) ?></td>
                <td><?= h($recebimentos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recebimentos', 'action' => 'view', $recebimentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recebimentos', 'action' => 'edit', $recebimentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recebimentos', 'action' => 'delete', $recebimentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recebimentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recibos') ?></h4>
        <?php if (!empty($empresa->recibos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Equipe Id') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Valor') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->recibos as $recibos): ?>
            <tr>
                <td><?= h($recibos->id) ?></td>
                <td><?= h($recibos->equipe_id) ?></td>
                <td><?= h($recibos->projeto_id) ?></td>
                <td><?= h($recibos->valor) ?></td>
                <td><?= h($recibos->data) ?></td>
                <td><?= h($recibos->created) ?></td>
                <td><?= h($recibos->modified) ?></td>
                <td><?= h($recibos->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recibos', 'action' => 'view', $recibos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recibos', 'action' => 'edit', $recibos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recibos', 'action' => 'delete', $recibos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rendas') ?></h4>
        <?php if (!empty($empresa->rendas)): ?>
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
            <?php foreach ($empresa->rendas as $rendas): ?>
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
    <div class="related">
        <h4><?= __('Related User Papeis') ?></h4>
        <?php if (!empty($empresa->user_papeis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Papel Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->user_papeis as $userPapeis): ?>
            <tr>
                <td><?= h($userPapeis->id) ?></td>
                <td><?= h($userPapeis->user_id) ?></td>
                <td><?= h($userPapeis->papel_id) ?></td>
                <td><?= h($userPapeis->created) ?></td>
                <td><?= h($userPapeis->modified) ?></td>
                <td><?= h($userPapeis->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserPapeis', 'action' => 'view', $userPapeis->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserPapeis', 'action' => 'edit', $userPapeis->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserPapeis', 'action' => 'delete', $userPapeis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPapeis->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($empresa->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->empresa_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
