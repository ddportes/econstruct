<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property string $tipo
 * @property string $cpf_cnpj
 * @property string|null $inscricao
 * @property string|null $razao_social
 * @property string $nome_fantasia
 * @property \Cake\I18n\FrozenDate|null $data_inicio
 * @property \Cake\I18n\FrozenDate|null $data_fim
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property float|null $mensal
 * @property string|null $observacao
 * @property int|null $u_id
 * @property int|null $endereco_id
 * @property int|null $representante_id
 * @property string|null $telefone
 * @property string|null $email
 *
 * @property \App\Model\Entity\ClienteSituacao[] $cliente_situacoes
 * @property \App\Model\Entity\Cliente[] $clientes
 * @property \App\Model\Entity\Contrato[] $contratos
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\EquipePedreiro[] $equipe_pedreiros
 * @property \App\Model\Entity\Equipe[] $equipes
 * @property \App\Model\Entity\FornecedorSituacao[] $fornecedor_situacoes
 * @property \App\Model\Entity\Fornecedor[] $fornecedores
 * @property \App\Model\Entity\Item[] $itens
 * @property \App\Model\Entity\Nota[] $notas
 * @property \App\Model\Entity\OcorrenciaTipo[] $ocorrencia_tipos
 * @property \App\Model\Entity\Ocorrencia[] $ocorrencias
 * @property \App\Model\Entity\Orcamento[] $orcamentos
 * @property \App\Model\Entity\Papel[] $papeis
 * @property \App\Model\Entity\PedreiroSituacao[] $pedreiro_situacoes
 * @property \App\Model\Entity\Pedreiro[] $pedreiros
 * @property \App\Model\Entity\PermissaoPapel[] $permissao_papeis
 * @property \App\Model\Entity\Permissao[] $permissoes
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\ProdutoTipo[] $produto_tipos
 * @property \App\Model\Entity\Produto[] $produtos
 * @property \App\Model\Entity\ProjetoSituacao[] $projeto_situacoes
 * @property \App\Model\Entity\Projeto[] $projetos
 * @property \App\Model\Entity\Recebimento[] $recebimentos
 * @property \App\Model\Entity\Recibo[] $recibos
 * @property \App\Model\Entity\Renda[] $rendas
 * @property \App\Model\Entity\UserPapel[] $user_papeis
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contato $contato
 */
class Empresa extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tipo' => true,
        'cpf_cnpj' => true,
        'inscricao' => true,
        'razao_social' => true,
        'nome_fantasia' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'created' => true,
        'modified' => true,
        'mensal' => true,
        'observacao' => true,
        'u_id' => true,
        'endereco_id' => true,
        'representante_id' => true,
        'telefone' => true,
        'email' => true,
        'cliente_situacoes' => true,
        'clientes' => true,
        'contratos' => true,
        'endereco' => true,
        'equipe_pedreiros' => true,
        'equipes' => true,
        'fornecedor_situacoes' => true,
        'fornecedores' => true,
        'itens' => true,
        'notas' => true,
        'ocorrencia_tipos' => true,
        'ocorrencias' => true,
        'orcamentos' => true,
        'papeis' => true,
        'pedreiro_situacoes' => true,
        'pedreiros' => true,
        'permissao_papeis' => true,
        'permissoes' => true,
        'pessoa' => true,
        'produto_tipos' => true,
        'produtos' => true,
        'projeto_situacoes' => true,
        'projetos' => true,
        'recebimentos' => true,
        'recibos' => true,
        'rendas' => true,
        'user_papeis' => true,
        'user' => true,
        'contato' => true
    ];
}
