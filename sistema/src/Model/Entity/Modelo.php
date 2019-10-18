<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modelo Entity
 *
 * @property int $id
 * @property int|null $modelo_tipo_id
 * @property string|null $modelo
 * @property string|null $descricao
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\ModeloTipo $modelo_tipo
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\User $user
 */
class Modelo extends Entity
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
        'modelo_tipo_id' => true,
        'modelo' => true,
        'descricao' => true,
        'modified' => true,
        'created' => true,
        'empresa_id' => true,
        'u_id' => true,
        'modelo_tipo' => true,
        'empresa' => true,
        'user' => true
    ];

    public function modelo(){
        return str_replace(array("\r\n","\0","\n","\r","\t"),"",$this->modelo);
    }
}
