<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contato Entity
 *
 * @property int $id
 * @property int $pessoa_id
 * @property string $tipo
 * @property string|null $valor
 * @property string $principal
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 */
class Contato extends Entity
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
        'id' => true,
        'pessoa_id' => true,
        'tipo' => true,
        'valor' => true,
        'principal' => true,
        'created' => true,
        'modified' => true,
        'pessoa' => true,
        'empresa_id' => true,
        'u_id'=> true
    ];
}
