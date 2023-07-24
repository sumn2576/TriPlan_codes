<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Masterusers Model
 *
 * @method \App\Model\Entity\Masteruser newEmptyEntity()
 * @method \App\Model\Entity\Masteruser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Masteruser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Masteruser get($primaryKey, $options = [])
 * @method \App\Model\Entity\Masteruser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Masteruser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Masteruser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Masteruser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Masteruser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Masteruser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Masteruser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Masteruser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Masteruser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MasterusersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('master_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 30)
            ->requirePresence('mail', 'create')
            ->notEmptyString('mail')
            ->add('mail', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password_code')
            ->maxLength('password_code', 20)
            ->requirePresence('password_code', 'create')
            ->notEmptyString('password_code');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['mail']), ['errorField' => 'mail']);

        return $rules;
    }
}
