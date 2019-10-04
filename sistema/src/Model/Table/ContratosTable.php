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
            $dados = $this->Orcamentos->get($id_orcamento, ['contain' => ['Empresas','Empresas.Enderecos','Empresas.Pessoas', 'Projetos', 'Projetos.Clientes.Pessoas', 'Projetos', 'Projetos.Clientes', 'Projetos.Clientes.Pessoas.Enderecos', 'Projetos.Clientes.Pessoas.Contatos']]);
            $conjuge = $this->Orcamentos->Projetos->Clientes->Pessoas->get($dados->projeto->cliente->pessoa->conjuge_id,['contains'=>['Enderecos']]);

            //nome do cliente
            if(!empty($dados->projeto->cliente->pessoa->nome)) {
                $retorno['nome_cliente'] = $dados->projeto->cliente->pessoa->nome;
            }else{
                $retorno['error'] .= '<br/>Preencha o nome do cliente.';
            }

            //cpf do cliente
            if(!empty($dados->projeto->cliente->pessoa->cpf_cnpj)) {
                $retorno['cpf_cliente'] = $dados->projeto->cliente->pessoa->cpf_cnpj;
            }else{
                $retorno['error'] .= '<br/>Preencha o CPF do cliente.';
            }

            //rg do cliente
            if(!empty($dados->projeto->cliente->pessoa->rg)) {
                $retorno['rg_cliente'] = $dados->projeto->cliente->pessoa->rg;
            }else{
                $retorno['error'] .= '<br/>Preencha o RG do cliente.';
            }

            //endereço do cliente
            if($dados->projeto->cliente->pessoa->enderecos[0]->validaEnderecoCompleto() === true) {
                $retorno['endereco_cliente'] = $dados->projeto->cliente->pessoa->enderecos[0]->enderecoCompleto();
            }else{
                $erros_endereco = '';
                $valida = $dados->projeto->cliente->pessoa->enderecos[0]->validaEnderecoCompleto();

                if(strpos($valida,'1'))
                    $erros_endereco.='<br/> Preencha o logradouro do cliente';
                if(strpos($valida,'2'))
                    $erros_endereco.='<br/> Preencha o bairro do cliente.';
                if(strpos($valida,'3'))
                    $erros_endereco.='<br/> Preencha o cep do cliente.';
                if(strpos($valida,'4'))
                    $erros_endereco.='<br/> Preencha a cidade do cliente.';
                if(strpos($valida,'5'))
                    $erros_endereco.='<br/> Preencha o estado do cliente.';

                $retorno['error'] .= '<br/>'.$erros_endereco;
            }

            //razao social da empresa
            if(!empty($dados->empresa->razao_social)) {
                $retorno['razaosocial_empresa'] = $dados->empresa->razao_social;
            }else{
                $retorno['error'] .= '<br/>Preencha o Razão Social da empresa.';
            }

            //cpf cnpj da empresa
            if(!empty($dados->empresa->cpf_cnpj)) {
                $retorno['cpfcnpj_empresa'] = $dados->empresa->cpf_cnpj;
            }else{
                $retorno['error'] .= '<br/>Preencha CPF/CNPJ da empresa.';
            }

            //inscrição da empresa
            if(!empty($dados->empresa->inscricao)) {
                $retorno['inscricao_empresa'] = $dados->empresa->inscricao;
            }else{
                $retorno['error'] .= '<br/>Preencha RG/Inscrição da empresa.';
            }

            //endereço da empresa
            if($dados->empresa->endereco->validaEnderecoCompleto() === true) {
                $retorno['endereco_cliente'] = $dados->empresa->endereco->enderecoCompleto();
            }else{
                $erros_endereco = '';
                $valida = $dados->empresa->endereco->validaEnderecoCompleto();

                if(strpos($valida,'1'))
                    $erros_endereco.='<br/> Preencha o logradouro da empresa.';
                if(strpos($valida,'2'))
                    $erros_endereco.='<br/> Preencha o bairro da empresa.';
                if(strpos($valida,'3'))
                    $erros_endereco.='<br/> Preencha o cep da empresa.';
                if(strpos($valida,'4'))
                    $erros_endereco.='<br/> Preencha a cidade da empresa.';
                if(strpos($valida,'5'))
                    $erros_endereco.='<br/> Preencha o estado da empresa.';

                $retorno['error'] .= '<br/>'.$erros_endereco;
            }

            //conjuge
            if($conjuge) {
                //nome do(a) conjuge
                if(!empty($conjuge->nome)) {
                    $retorno['nome_conjuge'] = $conjuge->nome;
                }else{
                    $retorno['error'] .= '<br/>Preencha o nome do(a) Cônjuge.';
                }

                //cpf do(a) conjuge
                if(!empty($conjuge->cpf_cnpj)) {
                    $retorno['cpf_conjuge'] = $conjuge->cpf_cnpj;
                }else{
                    $retorno['error'] .= '<br/>Preencha o CPF do(a) Cônjuge.';
                }

                //rg do(a) conjuge
                if(!empty($conjuge->rg)) {
                    $retorno['rg_conjuge'] = $conjuge->rg;
                }else{
                    $retorno['error'] .= '<br/>Preencha o RG do(a) Cônjuge.';
                }
            }


            $retorno['descricao_projeto'] =  (!empty($dados->projeto->descricao)?$dados->projeto->descricao:'');
            $retorno['custoestimado_projeto'] =  (!empty($dados->projeto->custoEstimado(true))?$dados->projeto->custoEstimado(true):'');
            $retorno['datainicio_projeto'] =  (!empty($dados->projeto->data_inicio)?$dados->projeto->data_inicio:'');
            $retorno['dataentrega_projeto'] = (!empty($dados->projeto->data_entrega)?$dados->projeto->data_entrega:'');

            //terreno projeto
            if(!empty($dados->projeto->terreno)) {
                $retorno['terreno_projeto'] = $dados->projeto->terreno;
            }else{
                $retorno['error'] .= '<br/>Preencha a metragem do terreno do projeto';
            }

            //area construida coberta projeto
            if(!empty($dados->projeto->area_construida_coberta)) {
                $retorno['areacobertaconstruida_projeto'] = $dados->projeto->area_construida_coberta;
            }else{
                $retorno['error'] .= '<br/>Preencha a metragem da área construída coberta do projeto';
            }

            //area construida aberta projeto
            if(!empty($dados->projeto->area_construida_aberta)) {
                $retorno['areaabertaconstruida_projeto'] = $dados->projeto->area_construida_aberta;
            }else{
                $retorno['error'] .= '<br/>Preencha a metragem da área construída aberta do projeto';
            }

            $retorno['areatotalconstruida_projeto'] = $dados->projeto->areaTotalConstruida(true);
            $retorno['ocupacao_projeto'] = $dados->projeto->taxaOcupacao(true);


            //endereço do projeto
            if($dados->projeto->endereco->validaEnderecoCompleto() === true) {
                $retorno['endereco_projeto'] = $dados->projeto->endereco->enderecoCompleto();
            }else{
                $erros_endereco = '';
                $valida = $dados->projeto->endereco->validaEnderecoCompleto();

                if(strpos($valida,'1'))
                    $erros_endereco.='<br/> Preencha o logradouro do projeto.';
                if(strpos($valida,'2'))
                    $erros_endereco.='<br/> Preencha o bairro do projeto.';
                if(strpos($valida,'3'))
                    $erros_endereco.='<br/> Preencha o cep do projeto.';
                if(strpos($valida,'4'))
                    $erros_endereco.='<br/> Preencha a cidade do projeto.';
                if(strpos($valida,'5'))
                    $erros_endereco.='<br/> Preencha o estado do projeto.';

                $retorno['error'] .= '<br/>'.$erros_endereco;
            }

            //valor orçamento
            if(!empty($dados->total(true))) {
                $retorno['valor_orcamento'] = $dados->total(true);
            }else{
                $retorno['error'] .= '<br/>Preencha o valor total do orçamento';
            }

            //detalhes orçamento
            if(!empty($dados->observacao)) {
                $retorno['detalhes_orcamento'] = $dados->observacao;
            }else{
                $retorno['error'] .= '<br/>Preencha os detalhes do orçamento';
            }

            //data assinatura contrato
            if(!empty($dados->contratos[0]->data_assinatura)) {
                $retorno['dataassinatura_contrato'] = $dados->contratos[0]->data_assinatura;
            }else{
                $retorno['error'] .= '<br/>Preencha a data de assinatura do contrato';
            }
        }

        return $retorno;
    }
}
