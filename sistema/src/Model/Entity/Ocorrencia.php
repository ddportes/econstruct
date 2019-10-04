<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ocorrencia Entity
 *
 * @property int $id
 * @property int $ocorrencia_tipo_id
 * @property int|null $projeto_id
 * @property string|null $observacao
 * @property \Cake\I18n\FrozenDate|null $data
 * @property \Cake\I18n\FrozenDate|null $data_pendencia
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\OcorrenciaTipo $ocorrencia_tipo
 * @property \App\Model\Entity\Projeto $projeto
 */
class Ocorrencia extends Entity
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
        'ocorrencia_tipo_id' => true,
        'projeto_id' => true,
        'observacao' => true,
        'data' => true,
        'data_pendencia' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'ocorrencia_tipo' => true,
        'projeto' => true
    ];

    public function data($string = null){
        if(!empty($this->data)) {
            $dt = explode('/', $this->data);
            if($string) {
                return $dt[2] . '/' . $dt[1] . '/' . $dt[0];
            }
            return date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0]));
        }
        return null;
    }

    public function dataPendencia($string = null){
        if(!empty($this->data_pendencia)) {
            $dt = explode('/', $this->data_pendencia);
            if($string) {
                return $dt[2] . '/' . $dt[1] . '/' . $dt[0];
            }
            return date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0]));
        }
        return null;
    }
}
