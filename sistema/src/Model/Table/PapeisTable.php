<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Papeis Model
 *
 * @property \App\Model\Table\PapelPaisTable&\Cake\ORM\Association\BelongsTo $PapelPais
 * @property &\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\PermissaoPapeisTable&\Cake\ORM\Association\HasMany $PermissaoPapeis
 * @property \App\Model\Table\UserPapeisTable&\Cake\ORM\Association\HasMany $UserPapeis
 *
 * @method \App\Model\Entity\Papel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Papel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Papel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Papel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Papel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Papel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Papel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Papel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PapeisTable extends Table
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

        $this->setTable('papeis');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('FiltroAcesso');

        $this->belongsTo('PapelPais', [
            'foreignKey' => 'papel_pai_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'u_id',
        ]);
        $this->hasMany('PermissaoPapeis', [
            'foreignKey' => 'papel_id'
        ]);
        $this->hasMany('UserPapeis', [
            'foreignKey' => 'papel_id'
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
            ->maxLength('descricao', 63)
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
        $rules->add($rules->existsIn(['papel_pai_id'], 'PapelPais'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['u_id'], 'Users'));

        return $rules;
    }
}
