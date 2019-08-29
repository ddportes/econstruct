<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserPapel Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $papel_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \App\Model\Entity\Empresa $empresa_id
 * @property \App\Model\Entity\User $u_id
 * @property \App\Model\Entity\Papel $papel
 */
class UserPapel extends Entity
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
        'user_id' => true,
        'papel_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'papel' => true
    ];
}
