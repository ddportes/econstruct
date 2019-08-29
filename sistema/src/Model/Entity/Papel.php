<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Papel Entity
 *
 * @property int $id
 * @property string $descricao
 * @property int|null $papel_pai_id
 * @property int $empresa_id
 * @property int $u_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\PapelPal $papel_pal
 * @property \App\Model\Entity\PermissaoPapel[] $permissao_papeis
 * @property \App\Model\Entity\UserPapel[] $user_papeis
 */
class Papel extends Entity
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
        'papel_pai_id' => true,
        'empresa_id' => true,
        'u_id' => true,
        'created' => true,
        'modified' => true,
        'papel_pal' => true,
        'permissao_papeis' => true,
        'user_papeis' => true
    ];
}
