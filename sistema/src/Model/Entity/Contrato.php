<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Utility\Apoio;

/**
 * Contrato Entity
 *
 * @property int $id
 * @property int $projeto_id
 * @property int $orcamento_id
 * @property \Cake\I18n\FrozenDate $data_assinatura
 * @property string|null $minuta
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 * @property \App\Model\Entity\Orcamento $orcamento
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\User $user
 */
class Contrato extends Entity
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
        'projeto_id' => true,
        'orcamento_id' => true,
        'data_assinatura' => true,
        'minuta' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'projeto' => true,
        'orcamento' => true,
        'empresa' => true,
        'user' => true
    ];

    public function dataAssinaturaExtenso(){
        if(!empty($this->data_assinatura)) {
            $meses = Apoio::meses();
            $dt = explode('/', $this->data_assinatura);


            return $dt[1].' de '.$meses[$dt[0]].' de 20'.$dt[2];
        }
        return null;
    }

    public function dataAssinatura($string = null){
        if(!empty($this->data_assinatura)) {
            $dt = explode('/', $this->data_assinatura);
            if($string) {
                return $dt[1] . '/' . $dt[0] . '/20' . $dt[2];
            }
            return date('Y-m-d',strtotime($dt[2].'-'.$dt[1].'-'.$dt[0]));
        }
        return null;
    }

    public function minuta(){
        return str_replace(array("\r\n","\0","\n","\r","\t"),"",$this->minuta);
    }
}
