<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permissao Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $descricao_amigavel
 * @property int|null $permissao_pai_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\PermissaoPal $permissao_pal
 * @property \App\Model\Entity\PermissaoPapel[] $permissao_papeis
 */
class Permissao extends Entity
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
        'descricao_amigavel' => true,
        'permissao_pai_id' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'permissao_pal' => true,
        'permissao_papeis' => true
    ];
}
