<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermissaoPapel Entity
 *
 * @property int $id
 * @property int $permissao_id
 * @property int $papel_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Permissao $permissao
 * @property \App\Model\Entity\Papel $papel
 */
class PermissaoPapel extends Entity
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
        'permissao_id' => true,
        'papel_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'permissao' => true,
        'papel' => true
    ];
}
