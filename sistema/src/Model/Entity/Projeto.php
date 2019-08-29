<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projeto Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string|null $detalhes
 * @property int $cliente_id
 * @property string|null $pasta_projeto
 * @property int $projeto_situacao_id
 * @property int|null $contrato_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property float|null $orcamento
 * @property float|null $custo_estimado
 * @property string|null $observacao
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\ProjetoSituacao $projeto_situacao
 * @property \App\Model\Entity\Contrato[] $contratos
 * @property \App\Model\Entity\Equipe[] $equipes
 * @property \App\Model\Entity\Nota[] $notas
 * @property \App\Model\Entity\Ocorrencia[] $ocorrencias
 * @property \App\Model\Entity\Orcamento[] $orcamentos
 * @property \App\Model\Entity\Recebimento[] $recebimentos
 * @property \App\Model\Entity\Recibo[] $recibos
 */
class Projeto extends Entity
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
        'descricao' => true,
        'detalhes' => true,
        'cliente_id' => true,
        'pasta_projeto' => true,
        'projeto_situacao_id' => true,
        'contrato_id' => true,
        'created' => true,
        'modified' => true,
        'orcamento' => true,
        'custo_estimado' => true,
        'observacao' => true,
        'empresa_id' => true,
        'u_id' => true,
        'cliente' => true,
        'projeto_situacao' => true,
        'contratos' => true,
        'equipes' => true,
        'notas' => true,
        'ocorrencias' => true,
        'orcamentos' => true,
        'recebimentos' => true,
        'recibos' => true
    ];
}
