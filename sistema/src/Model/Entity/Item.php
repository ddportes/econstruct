<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $nota_id
 * @property int|null $fornecedor_id
 * @property int|null $produto_id
 * @property string|null $observacao
 * @property float $valor
 * @property float|null $desconto_valor
 * @property float|null $desconto_percentual
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Nota $nota
 * @property \App\Model\Entity\Fornecedor $fornecedor
 * @property \App\Model\Entity\Produto $produto
 */
class Item extends Entity
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
        'nota_id' => true,
        'fornecedor_id' => true,
        'produto_id' => true,
        'observacao' => true,
        'valor' => true,
        'desconto_valor' => true,
        'desconto_percentual' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'nota' => true,
        'fornecedor' => true,
        'produto' => true
    ];
}
