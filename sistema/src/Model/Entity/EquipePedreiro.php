<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EquipePedreiro Entity
 *
 * @property int $id
 * @property int|null $equipe_id
 * @property int|null $pedreiro_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Equipe $equipe
 * @property \App\Model\Entity\Pedreiro $pedreiro
 */
class EquipePedreiro extends Entity
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
        'equipe_id' => true,
        'pedreiro_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'equipe' => true,
        'pedreiro' => true
    ];
}
