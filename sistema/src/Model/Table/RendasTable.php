<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rendas Model
 *
 * @property \App\Model\Table\PessoasTable&\Cake\ORM\Association\BelongsTo $Pessoas
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\Renda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Renda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Renda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Renda|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Renda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Renda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Renda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Renda findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RendasTable extends Table
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

        $this->setTable('rendas');
        $this->setDisplayField('fonte_pagadora');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('fonte_pagadora')
            ->maxLength('fonte_pagadora', 255)
            ->allowEmptyString('fonte_pagadora');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 1)
            ->allowEmptyString('tipo');

        $validator
            ->scalar('cpf_cnpj')
            ->maxLength('cpf_cnpj', 15)
            ->allowEmptyString('cpf_cnpj');

        $validator
            ->decimal('renda_bruta')
            ->allowEmptyString('renda_bruta');

        $validator
            ->decimal('renda_liquida')
            ->allowEmptyString('renda_liquida');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
