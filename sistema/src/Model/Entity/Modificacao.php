<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modificacao Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $datahora
 * @property int $user_id
 * @property int $empresa_id
 * @property string $controller
 * @property string $action
 * @property string $dados_originais
 * @property string $dados_novos
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Empresa $empresa
 */
class Modificacao extends Entity
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
        'datahora' => true,
        'user_id' => true,
        'empresa_id' => true,
        'controller' => true,
        'action' => true,
        'dados_originais' => true,
        'dados_novos' => true,
        'user' => true,
        'empresa' => true
    ];
}
