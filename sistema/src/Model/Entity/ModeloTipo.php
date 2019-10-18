<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ModeloTipo Entity
 *
 * @property int $id
 * @property string|null $descricao
 * @property int|null $empresa_id
 * @property int|null $u_id
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Modelo[] $modelos
 */
class ModeloTipo extends Entity
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
        'empresa_id' => true,
        'u_id' => true,
        'modified' => true,
        'created' => true,
        'empresa' => true,
        'user' => true,
        'modelos' => true
    ];
}
