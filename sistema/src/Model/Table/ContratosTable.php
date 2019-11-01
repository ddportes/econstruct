<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Utility\Apoio;

/**
 * Contratos Model
 *
 * @property \App\Model\Table\ProjetosTable&\Cake\ORM\Association\BelongsTo $Projetos
 * @property \App\Model\Table\OrcamentosTable&\Cake\ORM\Association\BelongsTo $Orcamentos
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property &\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Contrato get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contrato newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contrato[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contrato|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contrato saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contrato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contrato[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contrato findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContratosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contratos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Orcamentos', [
            'foreignKey' => 'orcamento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'u_id'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('data_assinatura')
            ->allowEmptyDate('data_assinatura');

        $validator
            ->scalar('minuta')
            ->allowEmptyString('minuta');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        $rules->add($rules->existsIn(['orcamento_id'], 'Orcamentos'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }

    public function tags($id_orcamento = null){
        $retorno = Apoio::tags();
        if(!is_null($id_orcamento)) {
            $dados = $this->Orcamentos->get($id_orcamento, ['contain' => ['Empresas','Contratos','Empresas.Enderecos','Empresas.Pessoas', 'Projetos', 'Projetos.Clientes.Pessoas', 'Projetos.Clientes.Pessoas', 'Projetos', 'Projetos.Clientes', 'Projetos.Clientes.Pessoas.Enderecos', 'Projetos.Clientes.Pessoas.Contatos']]);

            if(isset($dados->projeto->cliente->pessoa->conjuge_id)){
                $conjuge = $this->Orcamentos->Projetos->Clientes->Pessoas->get($dados->projeto->cliente->pessoa->conjuge_id,['contains'=>['Enderecos']]);
            }else{
                $conjuge = null;
            }

            if(isset($dados->empresa->representante_id)){
                $representante = $this->Orcamentos->Projetos->Clientes->Pessoas->get($dados->empresa->representante_id,['contains'=>['Enderecos']]);
                if(!is_null($representante->conjuge_id)){
                    $conjuge_rep = $this->Orcamentos->Projetos->Clientes->Pessoas->get($representante->conjuge_id,['contains'=>['Enderecos']]);
                }else{
                    $conjuge_rep = null;
                }
            }else{
                $representante = null;
            }


            $minuta =  $dados->contratos[0]->minuta();



            //nome do representante
            if(strpos($minuta,'representante_nome')) {
                if (!empty($representante->nome)) {
                    $retorno['representante_nome'] = $representante->nome;
                } else {
                    $retorno['error'] .= '<br/>Preencha o nome do(a) representante.';
                }
            }

            //cpf do representante
            if(strpos($minuta,'representante_cpf')) {
                if (!empty($representante->cpf_cnpj)) {
                    $retorno['representante_cpf'] = $representante->cpf_cnpj;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CPF do(a) representante.';
                }
            }

            //rg do representante
            if(strpos($minuta,'representante_rg')) {
                if (!empty($representante->rg)) {
                    $retorno['representante_rg'] = $representante->rg;
                } else {
                    $retorno['error'] .= '<br/>Preencha o RG do(a) representante.';
                }
            }

            //sexo do representante
            if(strpos($minuta,'representante_sexo')) {
                if (!empty($representante->sexo)) {
                    $retorno['representante_sexo'] = $representante->sexo();
                } else {
                    $retorno['error'] .= '<br/>Preencha o Sexo do representante.';
                }
            }

            //profissao do representante
            if(strpos($minuta,'representante_profissao')) {
                if (!empty($representante->profissao)) {
                    $retorno['representante_profissao'] = $representante->profissao;
                } else {
                    $retorno['error'] .= '<br/>Preencha a profissão do(a) representante.';
                }
            }

            //nacionalidade do representante
            if(strpos($minuta,'representante_nacionalidade')) {
                if (!empty($representante->nacionalidade)) {
                    $retorno['representante_nacionalidade'] = $representante->nacionalidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a nacionalidade do(a) representante.';
                }
            }

            //naturalidade do representante
            if(strpos($minuta,'representante_naturalidade')) {
                if (!empty($representante->naturalidade)) {
                    $retorno['representante_naturalidade'] = $representante->naturalidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a naturalidade do(a) representante.';
                }
            }

            //estado civil do representante
            if(strpos($minuta,'representante_estcivil')) {
                if (!empty($representante->estado_civil)) {
                    $retorno['representante_estcivil'] = $representante->estadoCivil($representante->sexo);
                } else {
                    $retorno['error'] .= '<br/>Preencha o estado civil do(a) representante.';
                }
            }

            //nome do conjuge do representante
            if(strpos($minuta,'representante_conjuge_nome')) {
                if (!empty($conjuge_rep->nome)) {
                    $retorno['representante_conjuge_nome'] = $conjuge_rep->nome;
                } else {
                    $retorno['error'] .= '<br/>Preencha o nome do(a) cônjuge do(a) representante.';
                }
            }

            //cpf do conjuge do representante
            if(strpos($minuta,'representante_conjuge_cpf')) {
                if (!empty($conjuge_rep->cpf_cnpj)) {
                    $retorno['representante_conjuge_cpf'] = $conjuge_rep->cpf_cnpj;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CPF do(a) cônjuge do(a) representante.';
                }
            }

            //rg do conjuge do representante
            if(strpos($minuta,'representante_conjuge_rg')) {
                if (!empty($conjuge_rep->rg)) {
                    $retorno['representante_conjuge_rg'] = $conjuge_rep->rg;
                } else {
                    $retorno['error'] .= '<br/>Preencha o RG do(a) cônjuge do(a) representante.';
                }
            }

            //sexo do conjuge do representante
            if(strpos($minuta,'representante_conjuge_sexo')) {
                if (!empty($conjuge_rep->sexo)) {
                    $retorno['representante_conjuge_sexo'] = $conjuge_rep->sexo();
                } else {
                    $retorno['error'] .= '<br/>Preencha o sexo do(a) cônjuge do(a) representante.';
                }
            }

            //profissão do conjuge do representante
            if(strpos($minuta,'representante_conjuge_profissao')) {
                if (!empty($conjuge_rep->profissao)) {
                    $retorno['representante_conjuge_profissao'] = $conjuge_rep->profissao;
                } else {
                    $retorno['error'] .= '<br/>Preencha a profissão do(a) cônjuge do(a) representante.';
                }
            }

            //nacionalidade do conjuge do representante
            if(strpos($minuta,'representante_conjuge_nacionalidade')) {
                if (!empty($conjuge_rep->nacionalidade)) {
                    $retorno['representante_conjuge_nacionalidade'] = $conjuge_rep->nacionalidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a nacionalidade do(a) cônjuge do(a) representante.';
                }
            }

            //naturalidade do conjuge do representante
            if(strpos($minuta,'representante_conjuge_naturalidade')) {
                if (!empty($conjuge_rep->naturalidade)) {
                    $retorno['representante_conjuge_naturalidade'] = $conjuge_rep->naturalidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a naturalidade do(a) cônjuge do(a) representante.';
                }
            }



            //endereço do representante
            if(strpos($minuta,'representante_endereco')) {
                if (isset($representante->enderecos[0]) && $representante->enderecos[0]->validaEnderecoCompleto() === true) {
                    $retorno['representante_endereco'] = $representante->enderecos[0]->enderecoCompleto();
                } else {
                    $erros_endereco = '';
                    $valida = (isset($representante->enderecos[0]) ? $representante->enderecos[0]->validaEnderecoCompleto() : '12345');

                    if (strpos($valida, '1'))
                        $erros_endereco .= '<br/>Preencha o logradouro do representante';
                    if (strpos($valida, '2'))
                        $erros_endereco .= '<br/>Preencha o bairro do representante.';
                    if (strpos($valida, '3'))
                        $erros_endereco .= '<br/>Preencha o cep do representante.';
                    if (strpos($valida, '4'))
                        $erros_endereco .= '<br/>Preencha a cidade do representante.';
                    if (strpos($valida, '5'))
                        $erros_endereco .= '<br/>Preencha o estado do representante.';

                    $retorno['error'] .= $erros_endereco;
                }
            }

            //logradouro do representante
            if(strpos($minuta,'representante_logradouro')) {
                if (isset($representante->enderecos[0]) && !empty($representante->enderecos[0]->logradouro)) {
                    $retorno['representante_logradouro'] = $representante->enderecos[0]->logradouro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o logradouro do representante.';
                }
            }

            //bairro do representante
            if(strpos($minuta,'representante_bairro')) {
                if (isset($representante->enderecos[0]) && !empty($representante->enderecos[0]->bairro)) {
                    $retorno['representante_bairro'] = $representante->enderecos[0]->bairro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o bairro do representante.';
                }
            }

            //numero do representante
            if(strpos($minuta,'representante_numero')) {
                if (isset($representante->enderecos[0]) && !empty($representante->enderecos[0]->numero)) {
                    $retorno['representante_numero'] = $representante->enderecos[0]->numero;
                } else {
                    $retorno['representante_numero'] = 's/n';
                }
            }

            //complemento do representante
            if(strpos($minuta,'representante_complemento')) {
                if (isset($$representante->enderecos[0]) && !empty($representante->enderecos[0]->complemento)) {
                    $retorno['representante_complemento'] = $representante->enderecos[0]->complemento;
                } else {
                    $retorno['representante_complemento'] = '';
                }
            }

            //cep do representante
            if(strpos($minuta,'representante_cep')) {
                if (isset($representante->enderecos[0]) && !empty($representante->enderecos[0]->cep)) {
                    $retorno['representante_cep'] = $representante->enderecos[0]->cep;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CEP do representante.';
                }
            }

            //cidade do representante
            if(strpos($minuta,'representante_cidade')) {
                if (isset($representante->enderecos[0]) && !empty($representante->enderecos[0]->cidade)) {
                    $retorno['representante_cidade'] = $representante->enderecos[0]->cidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a cidade do representante.';
                }
            }

            //estado do representante
            if(strpos($minuta,'representante_estado')) {
                if (isset($representante->enderecos[0]) && !empty($representante->enderecos[0]->estado)) {
                    $retorno['representante_estado'] = $representante->enderecos[0]->estado;
                } else {
                    $retorno['error'] .= '<br/>Preencha o estado do representante.';
                }
            }











            //nome do cliente
            if(strpos($minuta,'cliente_nome')) {
                if (!empty($dados->projeto->cliente->pessoa->nome)) {
                    $retorno['cliente_nome'] = $dados->projeto->cliente->pessoa->nome;
                } else {
                    $retorno['error'] .= '<br/>Preencha o nome do cliente.';
                }
            }

            //cpf do cliente
            if(strpos($minuta,'cliente_cpf')) {
                if (!empty($dados->projeto->cliente->pessoa->cpf_cnpj)) {
                    $retorno['cliente_cpf'] = $dados->projeto->cliente->pessoa->cpf_cnpj;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CPF do cliente.';
                }
            }

            //rg do cliente
            if(strpos($minuta,'cliente_rg')) {
                if (!empty($dados->projeto->cliente->pessoa->rg)) {
                    $retorno['cliente_rg'] = $dados->projeto->cliente->pessoa->rg;
                } else {
                    $retorno['error'] .= '<br/>Preencha o RG do cliente.';
                }
            }

            //sexo do cliente
            if(strpos($minuta,'cliente_sexo')) {
                if (!empty($dados->projeto->cliente->pessoa->sexo)) {
                    $retorno['cliente_sexo'] = $dados->projeto->cliente->pessoa->sexo();
                } else {
                    $retorno['error'] .= '<br/>Preencha o Sexo do cliente.';
                }
            }

            //estado civil do cliente
            if(strpos($minuta,'cliente_estcivil')) {
                if (!empty($dados->projeto->cliente->pessoa->estado_civil)) {
                    $retorno['cliente_estcivil'] = $dados->projeto->cliente->pessoa->estadoCivil($dados->projeto->cliente->pessoa->sexo);
                } else {
                    $retorno['error'] .= '<br/>Preencha o estado civil do(a) cliente.';
                }
            }

            //endereço do cliente
            if(strpos($minuta,'cliente_endereco')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && $dados->projeto->cliente->pessoa->enderecos[0]->validaEnderecoCompleto() === true) {
                    $retorno['cliente_endereco'] = $dados->projeto->cliente->pessoa->enderecos[0]->enderecoCompleto();
                } else {
                    $erros_endereco = '';
                    $valida = (isset($dados->projeto->cliente->pessoa->enderecos[0]) ? $dados->projeto->cliente->pessoa->enderecos[0]->validaEnderecoCompleto() : '12345');

                    if (strpos($valida, '1'))
                        $erros_endereco .= '<br/>Preencha o logradouro do cliente';
                    if (strpos($valida, '2'))
                        $erros_endereco .= '<br/>Preencha o bairro do cliente.';
                    if (strpos($valida, '3'))
                        $erros_endereco .= '<br/>Preencha o cep do cliente.';
                    if (strpos($valida, '4'))
                        $erros_endereco .= '<br/>Preencha a cidade do cliente.';
                    if (strpos($valida, '5'))
                        $erros_endereco .= '<br/>Preencha o estado do cliente.';

                    $retorno['error'] .= $erros_endereco;
                }
            }

            //logradouro do cliente
            if(strpos($minuta,'cliente_logradouro')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->logradouro)) {
                    $retorno['cliente_logradouro'] = $dados->projeto->cliente->pessoa->enderecos[0]->logradouro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o logradouro do cliente.';
                }
            }

            //bairro do cliente
            if(strpos($minuta,'cliente_bairro')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->bairro)) {
                    $retorno['cliente_bairro'] = $dados->projeto->cliente->pessoa->enderecos[0]->bairro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o bairro do cliente.';
                }
            }

            //numero do cliente
            if(strpos($minuta,'cliente_numero')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->numero)) {
                    $retorno['cliente_numero'] = $dados->projeto->cliente->pessoa->enderecos[0]->numero;
                } else {
                    $retorno['cliente_numero'] = 's/n';
                }
            }

            //complemento do cliente
            if(strpos($minuta,'cliente_complemento')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->complemento)) {
                    $retorno['cliente_complemento'] = $dados->projeto->cliente->pessoa->enderecos[0]->complemento;
                } else {
                    $retorno['cliente_complemento'] = '';
                }
            }

            //cep do cliente
            if(strpos($minuta,'cliente_cep')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->cep)) {
                    $retorno['cliente_cep'] = $dados->projeto->cliente->pessoa->enderecos[0]->cep;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CEP do cliente.';
                }
            }

            //cidade do cliente
            if(strpos($minuta,'cliente_cidade')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->cidade)) {
                    $retorno['cliente_cidade'] = $dados->projeto->cliente->pessoa->enderecos[0]->cidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a cidade do cliente.';
                }
            }

            //estado do cliente
            if(strpos($minuta,'cliente_estado')) {
                if (isset($dados->projeto->cliente->pessoa->enderecos[0]) && !empty($dados->projeto->cliente->pessoa->enderecos[0]->estado)) {
                    $retorno['cliente_estado'] = $dados->projeto->cliente->pessoa->enderecos[0]->estado;
                } else {
                    $retorno['error'] .= '<br/>Preencha o estado do cliente.';
                }
            }

            //profissao do cliente
            if(strpos($minuta,'cliente_profissao')) {
                if (!empty($dados->projeto->cliente->pessoa->profissao)) {
                    $retorno['cliente_profissao'] = $dados->projeto->cliente->pessoa->profissao;
                } else {
                    $retorno['error'] .= '<br/>Preencha a profissão do cliente.';
                }
            }

            //nacionalidade do cliente
            if(strpos($minuta,'cliente_nacionalidade')) {
                if (!empty($dados->projeto->cliente->pessoa->nacionalidade)) {
                    $retorno['cliente_nacionalidade'] = $dados->projeto->cliente->pessoa->nacionalidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a nacionalidade do cliente.';
                }
            }

            //naturalidade do cliente
            if(strpos($minuta,'cliente_naturalidade')) {
                if (!empty($dados->projeto->cliente->pessoa->naturalidade)) {
                    $retorno['cliente_naturalidade'] = $dados->projeto->cliente->pessoa->naturalidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a naturalidade do cliente.';
                }
            }




            //razao social da empresa
            if(strpos($minuta,'empresa_razaosocial')) {
                if (strpos($minuta, 'empresa_razaosocial')) {
                    if (!empty($dados->empresa->razao_social)) {
                        $retorno['empresa_razaosocial'] = $dados->empresa->razao_social;
                    } else {
                        $retorno['error'] .= '<br/>Preencha o Razão Social da empresa.';
                    }
                }
            }

            //cpf cnpj da empresa
            if(strpos($minuta,'empresa_cpfcnpj')) {
                if (!empty($dados->empresa->cpf_cnpj)) {
                    $retorno['empresa_cpfcnpj'] = $dados->empresa->cpf_cnpj;
                } else {
                    $retorno['error'] .= '<br/>Preencha CPF/CNPJ da empresa.';
                }
            }

            //inscrição da empresa
            if(strpos($minuta,'empresa_inscricao')) {
                if (!empty($dados->empresa->inscricao)) {
                    $retorno['empresa_inscricao'] = $dados->empresa->inscricao;
                } else {
                    $retorno['error'] .= '<br/>Preencha RG/Inscrição da empresa.';
                }
            }

            //endereço da empresa
            if(strpos($minuta,'empresa_endereco')) {
                if (isset($dados->empresa->endereco) && $dados->empresa->endereco->validaEnderecoCompleto() === true) {
                    $retorno['empresa_endereco'] = $dados->empresa->endereco->enderecoCompleto();
                } else {
                    $erros_endereco = '';
                    $valida = (isset($dados->empresa->endereco) ? $dados->empresa->endereco->validaEnderecoCompleto() : '12345');

                    if (strpos($valida, '1'))
                        $erros_endereco .= '<br/>Preencha o logradouro da empresa.';
                    if (strpos($valida, '2'))
                        $erros_endereco .= '<br/>Preencha o bairro da empresa.';
                    if (strpos($valida, '3'))
                        $erros_endereco .= '<br/>Preencha o cep da empresa.';
                    if (strpos($valida, '4'))
                        $erros_endereco .= '<br/>Preencha a cidade da empresa.';
                    if (strpos($valida, '5'))
                        $erros_endereco .= '<br/>Preencha o estado da empresa.';

                    $retorno['error'] .= $erros_endereco;
                }
            }

            //logradouro do empresa
            if(strpos($minuta,'empresa_logradouro')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->logradouro)) {
                    $retorno['empresa_logradouro'] = $dados->empresa->endereco->logradouro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o logradouro da empresa.';
                }
            }

            //bairro do empresa
            if(strpos($minuta,'empresa_bairro')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->bairro)) {
                    $retorno['empresa_bairro'] = $dados->empresa->endereco->bairro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o bairro da empresa.';
                }
            }

            //numero do empresa
            if(strpos($minuta,'empresa_numero')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->numero)) {
                    $retorno['empresa_numero'] = $dados->empresa->endereco->numero;
                } else {
                    $retorno['empresa_numero'] = 's/n';
                }
            }

            //complemento do empresa
            if(strpos($minuta,'empresa_complemento')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->complemento)) {
                    $retorno['empresa_complemento'] = $dados->empresa->endereco->complemento;
                } else {
                    $retorno['empresa_complemento'] = '';
                }
            }

            //cep do empresa
            if(strpos($minuta,'empresa_cep')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->cep)) {
                    $retorno['empresa_cep'] = $dados->empresa->endereco->cep;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CEP do empresa.';
                }
            }

            //cidade do empresa
            if(strpos($minuta,'empresa_cidade')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->cidade)) {
                    $retorno['empresa_cidade'] = $dados->empresa->endereco->cidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a cidade da empresa.';
                }
            }

            //estado do empresa
            if(strpos($minuta,'empresa_estado')) {
                if (isset($dados->empresa->endereco) && !empty($dados->empresa->endereco->estado)) {
                    $retorno['empresa_estado'] = $dados->empresa->endereco->estado;
                } else {
                    $retorno['error'] .= '<br/>Preencha o estado da empresa.';
                }
            }






            //conjuge
            if($conjuge) {
                //nome do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_nome')) {
                    if (!empty($conjuge->nome)) {
                        $retorno['cliente_conjuge_nome'] = $conjuge->nome;
                    } else {
                        $retorno['error'] .= '<br/>Preencha o nome do(a) Cônjuge.';
                    }
                }

                //cpf do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_cpf')) {
                    if (!empty($conjuge->cpf_cnpj)) {
                        $retorno['cliente_conjuge_cpf'] = $conjuge->cpf_cnpj;
                    } else {
                        $retorno['error'] .= '<br/>Preencha o CPF do(a) Cônjuge.';
                    }
                }

                //rg do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_rg')) {
                    if (!empty($conjuge->rg)) {
                        $retorno['cliente_conjuge_rg'] = $conjuge->rg;
                    } else {
                        $retorno['error'] .= '<br/>Preencha o RG do(a) Cônjuge.';
                    }
                }

                //sexo do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_sexo')) {
                    if (!empty($conjuge->sexo)) {
                        $retorno['cliente_conjuge_sexo'] = $conjuge->sexo();
                    } else {
                        $retorno['error'] .= '<br/>Preencha o sexo do(a) Cônjuge.';
                    }
                }
                //profissao do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_profissao')) {
                    if (!empty($conjuge->profissao)) {
                        $retorno['cliente_conjuge_profissao'] = $conjuge->profissao;
                    } else {
                        $retorno['error'] .= '<br/>Preencha a profissão do(a) Cônjuge.';
                    }
                }
                //nacionalidade do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_nacionalidade')) {
                    if (!empty($conjuge->nacionalidade)) {
                        $retorno['cliente_conjuge_nacionalidade'] = $conjuge->nacionalidade;
                    } else {
                        $retorno['error'] .= '<br/>Preencha a nacionalidade do(a) Cônjuge.';
                    }
                }
                //naturalidade do(a) conjuge
                if(strpos($minuta,'cliente_conjuge_naturalidade')) {
                    if (!empty($conjuge->naturalidade)) {
                        $retorno['cliente_conjuge_naturalidade'] = $conjuge->naturalidade;
                    } else {
                        $retorno['error'] .= '<br/>Preencha a naturalidade do(a) Cônjuge.';
                    }
                }
            }


            if(strpos($minuta,'projeto_descricao')) {
                $retorno['projeto_descricao'] = (!empty($dados->projeto->descricao) ? $dados->projeto->descricao : '');
            }
            if(strpos($minuta,'projeto_custoestimado')) {
                $retorno['projeto_custoestimado'] = (!empty($dados->projeto->custoEstimado(true)) ? $dados->projeto->custoEstimado(true) : '');
            }
            if(strpos($minuta,'projeto_datainicio')) {
                $retorno['projeto_datainicio'] = (!empty($dados->projeto->data_inicio) ? $dados->projeto->data_inicio : '');
            }
            if(strpos($minuta,'projeto_dataentrega')) {
                $retorno['projeto_dataentrega'] = (!empty($dados->projeto->data_entrega) ? $dados->projeto->data_entrega : '');
            }

            //terreno projeto
            if(strpos($minuta,'projeto_terreno')) {
                if (!empty($dados->projeto->terreno)) {
                    $retorno['projeto_terreno'] = $dados->projeto->terreno;
                } else {
                    $retorno['error'] .= '<br/>Preencha a metragem do terreno do projeto';
                }
            }

            //area construida coberta projeto
            if(strpos($minuta,'projeto_areacobertaconstruida')) {
                if (!empty($dados->projeto->area_construida_coberta)) {
                    $retorno['projeto_areacobertaconstruida'] = $dados->projeto->area_construida_coberta;
                } else {
                    $retorno['error'] .= '<br/>Preencha a metragem da área construída coberta do projeto';
                }
            }

            //area construida aberta  frente projeto
            if(strpos($minuta,'projeto_areacobertaconstruida')) {
                if (!empty($dados->projeto->area_construida_coberta)) {
                    $retorno['projeto_areacobertaconstruida'] = $dados->projeto->area_construida_coberta;
                } else {
                    $retorno['error'] .= '<br/>Preencha a metragem da área construída coberta do projeto';
                }
            }

            if(strpos($minuta,'projeto_areatotalconstruida')) {
                $retorno['projeto_areatotalconstruida'] = $dados->projeto->areaTotalConstruida(true);
            }
            if(strpos($minuta,'projeto_ocupacao')) {
                $retorno['projeto_ocupacao'] = $dados->projeto->taxaOcupacao(true);
            }

            //frente projeto
            if(strpos($minuta,'projeto_frente')) {
                if (!empty($dados->projeto->frente)) {
                    $retorno['projeto_frente'] = $dados->projeto->frente;
                } else {
                    $retorno['error'] .= '<br/>Preencha a frente do projeto';
                }
            }

            //fundo projeto
            if(strpos($minuta,'projeto_fundo')) {
                if (!empty($dados->projeto->fundo)) {
                    $retorno['projeto_fundo'] = $dados->projeto->fundo;
                } else {
                    $retorno['error'] .= '<br/>Preencha a profundidade do projeto';
                }
            }

            //valor orçamento
            if(strpos($minuta,'orcamento_valor')) {
                if (!empty($dados->total(true))) {
                    $retorno['orcamento_valor'] = $dados->total(true);
                } else {
                    $retorno['error'] .= '<br/>Preencha o valor total do orçamento';
                }
            }

            //detalhes orçamento
            if(strpos($minuta,'orcamento_detalhes')) {
                if (!empty($dados->observacao)) {
                    $retorno['orcamento_detalhes'] = $dados->observacao;
                } else {
                    $retorno['error'] .= '<br/>Preencha os detalhes do orçamento';
                }
            }

            //data assinatura e extenso contrato

            if(strpos($minuta,'contrato_dataassinatura') || strpos($minuta,'contrato_dataassinaturaextenso')) {
                if (!empty($dados->contratos[0]->data_assinatura)) {
                    $retorno['contrato_dataassinatura'] = $dados->contratos[0]->dataAssinatura(true);
                    $retorno['contrato_dataassinaturaextenso'] = $dados->contratos[0]->dataAssinaturaExtenso();
                } else {
                    $retorno['error'] .= '<br/>Preencha a data de assinatura do contrato';
                }
            }




            //endereço do projeto
            if(strpos($minuta,'projeto_endereco')) {
                if (isset($dados->projeto->endereco) && $dados->projeto->endereco->validaEnderecoCompleto() === true) {
                    $retorno['projeto_endereco'] = $dados->projeto->endereco->enderecoCompleto();
                } else {
                    $erros_endereco = '';
                    $valida = (isset($dados->projeto->endereco) ? $dados->projeto->endereco->validaEnderecoCompleto() : '12345');

                    if (strpos($valida, '1'))
                        $erros_endereco .= '<br/>Preencha o logradouro do projeto.';
                    if (strpos($valida, '2'))
                        $erros_endereco .= '<br/>Preencha o bairro do projeto.';
                    if (strpos($valida, '3'))
                        $erros_endereco .= '<br/>Preencha o cep do projeto.';
                    if (strpos($valida, '4'))
                        $erros_endereco .= '<br/>Preencha a cidade do projeto.';
                    if (strpos($valida, '5'))
                        $erros_endereco .= '<br/>Preencha o estado do projeto.';

                    $retorno['error'] .= $erros_endereco;
                }
            }

            //logradouro do cliente
            if(strpos($minuta,'projeto_logradouro')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->logradouro)) {
                    $retorno['projeto_logradouro'] = $dados->projeto->endereco->logradouro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o logradouro do projeto.';
                }
            }

            //bairro do projeto
            if(strpos($minuta,'projeto_bairro')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->bairro)) {
                    $retorno['projeto_bairro'] = $dados->projeto->endereco->bairro;
                } else {
                    $retorno['error'] .= '<br/>Preencha o bairro do projeto.';
                }
            }

            //numero do projeto
            if(strpos($minuta,'projeto_numero')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->numero)) {
                    $retorno['projeto_numero'] = $dados->projeto->endereco->numero;
                } else {
                    $retorno['projeto_numero'] = 's/n';
                }
            }

            //complemento do projeto
            if(strpos($minuta,'projeto_complemento')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->complemento)) {
                    $retorno['projeto_complemento'] = $dados->projeto->endereco->complemento;
                } else {
                    $retorno['projeto_complemento'] = '';
                }
            }

            //cep do projeto
            if(strpos($minuta,'projeto_cep')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->cep)) {
                    $retorno['projeto_cep'] = $dados->projeto->endereco->cep;
                } else {
                    $retorno['error'] .= '<br/>Preencha o CEP do projeto.';
                }
            }

            //cidade do projeto
            if(strpos($minuta,'projeto_cidade')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->cidade)) {
                    $retorno['projeto_cidade'] = $dados->projeto->endereco->cidade;
                } else {
                    $retorno['error'] .= '<br/>Preencha a cidade do projeto.';
                }
            }

            //estado do projeto
            if(strpos($minuta,'projeto_estado')) {
                if (isset($dados->projeto->endereco) && !empty($dados->projeto->endereco->estado)) {
                    $retorno['projeto_estado'] = $dados->projeto->endereco->estado;
                } else {
                    $retorno['error'] .= '<br/>Preencha o estado do projeto.';
                }
            }

        }

        return $retorno;
    }
}
