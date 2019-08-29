<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nota Entity
 *
 * @property int $id
 * @property int|null $projeto_id
 * @property \Cake\I18n\FrozenDate $data
 * @property float $valor
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 * @property \App\Model\Entity\Item[] $itens
 */
class Nota extends Entity
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
        'projeto_id' => true,
        'data' => true,
        'valor' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'projeto' => true,
        'itens' => true
    ];
}
