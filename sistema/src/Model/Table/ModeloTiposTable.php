<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModeloTipos Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\UsTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ModelosTable&\Cake\ORM\Association\HasMany $Modelos
 *
 * @method \App\Model\Entity\ModeloTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModeloTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ModeloTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModeloTipo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModeloTipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModeloTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModeloTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModeloTipo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModeloTiposTable extends Table
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

        $this->setTable('modelo_tipos');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'u_id'
        ]);
        $this->hasMany('Modelos', [
            'foreignKey' => 'modelo_tipo_id'
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
            ->scalar('descricao')
            ->maxLength('descricao', 63)
            ->allowEmptyString('descricao');

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
