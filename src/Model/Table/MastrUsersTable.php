<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MastrUsers Model
 *
 * @method \App\Model\Entity\MastrUser newEmptyEntity()
 * @method \App\Model\Entity\MastrUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MastrUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MastrUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\MastrUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MastrUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MastrUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MastrUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MastrUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MastrUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MastrUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MastrUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MastrUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MastrUsersTable extends Table
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

        $this->setTable('mastr_users');
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
