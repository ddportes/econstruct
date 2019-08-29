<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fornecedor Entity
 *
 * @property int $id
 * @property int $fornecedor_situacao_id
 * @property string|null $observacao
 * @property int|null $pessoa_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\FornecedorSituacao $fornecedor_situacao
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Item[] $itens
 */
class Fornecedor extends Entity
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
        'fornecedor_situacao_id' => true,
        'observacao' => true,
        'pessoa_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'fornecedor_situacao' => true,
        'pessoa' => true,
        'itens' => true
    ];
}
