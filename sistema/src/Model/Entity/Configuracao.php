<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Configuracao Entity
 *
 * @property int $id
 * @property string|null $minuta_default
 * @property string|null $minuta_equipe_default
 * @property string|null $recibo_default
 * @property int|null $empresa_id
 * @property int|null $u_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Users $user
 */
class Configuracao extends Entity
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
        'minuta_default' => true,
        'minuta_equipe_default' => true,
        'recibo_default' => true,
        'empresa_id' => true,
        'u_id' => true,
        'created' => true,
        'modified' => true,
        'empresa' => true,
        'user' => true
    ];
}
