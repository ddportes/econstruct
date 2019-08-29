<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modificacoes Model
 *
 * @property \App\Model\Table\UseresTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\Modificacao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modificacao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modificacao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modificacao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modificacao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modificacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modificacao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modificacao findOrCreate($search, callable $callback = null, $options = [])
 */
class ModificacoesTable extends Table
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

        $this->setTable('modificacoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->dateTime('datahora')
            ->requirePresence('datahora', 'create')
            ->notEmptyDateTime('datahora');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 125)
            ->requirePresence('controller', 'create')
            ->notEmptyString('controller');

        $validator
            ->scalar('action')
            ->maxLength('action', 125)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        $validator
            ->scalar('dados_originais')
            ->requirePresence('dados_originais', 'create')
            ->notEmptyString('dados_originais');

        $validator
            ->scalar('dados_novos')
            ->requirePresence('dados_novos', 'create')
            ->notEmptyString('dados_novos');

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

        return $rules;
    }

    public function emiteLog($controller,$action,$originais,$novos){
        if(!empty($_SESSION['Auth']['User'])) {
            $user = $_SESSION['Auth']['User'];
        }else{
            $o = json_decode($originais,true);
            $user['id'] = $o[0];
            $user['username'] = $o[1];
            $user['empresa_id'] = $o[2];
        }

        $log = $this->newEntity();
        $log->datahora = date('Y-m-d H:i');
        $log->user_id = $user['id'];
        $log->empresa_id = $user['empresa_id'];
        $log->controller = $controller;
        $log->action = $action;
        $log->dados_originais = $originais;
        $log->dados_novos = $novos;


        if ($this->save($log)) {
            return true;
        }
        return false;
    }
}
