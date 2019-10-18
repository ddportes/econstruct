<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClienteSituacoes Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\HasMany $Clientes
 *
 * @method \App\Model\Entity\ClienteSituacao get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClienteSituacao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClienteSituacao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClienteSituacao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClienteSituacao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClienteSituacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClienteSituacao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClienteSituacao findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClienteSituacoesTable extends Table
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

        $this->setTable('cliente_situacoes');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'u_id'
        ]);
        $this->hasMany('Clientes', [
            'foreignKey' => 'cliente_situacao_id'
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
            ->scalar('descricao')
            ->maxLength('descricao', 125)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

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
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
