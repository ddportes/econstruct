<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Number;
use App\Utility\Apoio;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $nome_social
 * @property int|null $estado_civil
 * @property int|null $conjuge_id
 * @property int $filhos
 * @property string|null $sexo
 * @property string $tipo
 * @property string|null $cpf_cnpj
 * @property \Cake\I18n\FrozenDate|null $data_nascimento
 * @property string|null $rg
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $empresa_id
 * @property int|null $u_id
 * @property string $profissao
 * @property string $nacionalidade
 * @property string $naturalidade
 *
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Cliente[] $clientes
 * @property \App\Model\Entity\Contato[] $contatos
 * @property \App\Model\Entity\Endereco[] $enderecos
 * @property \App\Model\Entity\Fornecedor[] $fornecedores
 * @property \App\Model\Entity\Pedreiro[] $pedreiros
 * @property \App\Model\Entity\Renda[] $rendas
 * @property \App\Model\Entity\Dependente[] $dependentes
 */
class Pessoa extends Entity
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
        'nome' => true,
        'nome_social' => true,
        'estado_civil' => true,
        'conjuge_id' => true,
        'filhos' => true,
        'sexo' => true,
        'tipo' => true,
        'cpf_cnpj' => true,
        'rg' => true,
        'created' => true,
        'modified' => true,
        'empresa_id' => true,
        'u_id' => true,
        'data_nascimento' => true,
        'pessoa' => true,
        'clientes' => true,
        'contatos' => true,
        'enderecos' => true,
        'fornecedores' => true,
        'pedreiros' => true,
        'rendas' => true,
        'dependentes' => true,
        'profissao'=> true,
        'nacionalidade'=> true,
        'naturalidade' => true
    ];

    public function firstTelefone(){
        foreach($this->contatos as $val){
            if($val->tipo=='telefone'){
                return $val->valor;
            }
        }
        return null;
    }
    public function firstIdTelefone(){
        foreach($this->contatos as $val){
            if($val->tipo=='telefone'){
                return $val->id;
            }
        }
        return null;
    }

    public function allTelefones(){
        $telefones = '';
        foreach($this->contatos as $val){
            if($val->tipo=='telefone'){
                if($telefones == '')
                    $telefones = $val->valor;
                else
                    $telefones = $telefones . '/'.$val->valor;
            }
        }
        if($telefones == '')
            return null;
        else
            return $telefones;
    }

    public function firstEmail(){
        foreach($this->contatos as $val){
            if($val->tipo=='email'){
                return $val->valor;
            }
        }
        return null;
    }
    public function firstIdEmail(){
        foreach($this->contatos as $val){
            if($val->tipo=='email'){
                return $val->id;
            }
        }
        return null;
    }

    public function allEmails(){
        $emails = '';
        foreach($this->contatos as $val){
            if($val->tipo=='email'){
                if($emails == '')
                    $emails = $val->valor;
                else
                    $emails = $emails . '/'.$val->valor;
            }
        }
        if($emails == '')
            return null;
        else
            return $emails;
    }

    public function totalRendaBruta($moeda = null,Array $complemento = null){
        $sum = 0;

        //dd($this);
        foreach($this->rendas as $val){
            $sum = $sum + $val->renda_bruta;
        }

        if($complemento){
            foreach($complemento As $val2){
                $sum = $sum + $val2;
            }
        }

        if($moeda === true){
            return Number::format($sum,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $sum;
    }

    public function totalRendaLiquida($moeda = null,Array $complemento = null){
        $sum = 0;
        foreach($this->rendas as $val){
            $sum = $sum + $val->renda_liquida;
        }

        if($complemento){
            foreach($complemento As $val2){
                $sum = $sum + $val2;
            }
        }

        if($moeda === true){
            return Number::format($sum,['before' => 'R$ ', 'pattern' => '#.###.###,##', 'locale' => 'pt_BR', 'places'=>2]);
        }
        return $sum;
    }

    public function cpfCnpj($pontuacao = null){
        if($pontuacao === true) {
            if ($this->tipo == 'F') {
                return Apoio::mask($this->cpf_cnpj, '###.###.###-##');
            } else {
                return Apoio::mask($this->cpf_cnpj, '##.###.###/####-##');
            }
        }
        return $this->cpf_cnpj;
    }

    public function sexo(){
        return ($this->sexo == 'F')?'Feminino':'Masculino';
    }

    public function estadoCivil($sexo){
        switch ($this->estado_civil) {
            case 1:
                if($sexo == 'F'){
                    return 'Solteira';
                    break;
                }
                return 'Solteiro';
                break;
            case 2:
                if($sexo == 'F'){
                    return 'Casada';
                    break;
                }
                return 'Casado';
                break;
            case 3:
                if($sexo == 'F'){
                    return 'Separada';
                    break;
                }
                return 'Separado';
                break;
            case 4:
                if($sexo == 'F'){
                    return 'Viúva';
                    break;
                }
                return 'Viúvo';
                break;
            case 5:
                return 'União Estável';
                break;

            default:
                return null;
        }
    }
}
