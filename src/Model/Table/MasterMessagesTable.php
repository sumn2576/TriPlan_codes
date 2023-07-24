<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mastermessages Model
 *
 * @property \App\Model\Table\MasterUsersTable&\Cake\ORM\Association\BelongsTo $MasterUsers
 *
 * @method \App\Model\Entity\Mastermessage newEmptyEntity()
 * @method \App\Model\Entity\Mastermessage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Mastermessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mastermessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mastermessage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Mastermessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mastermessage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mastermessage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mastermessage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mastermessage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mastermessage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mastermessage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mastermessage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MastermessagesTable extends Table
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

        $this->setTable('master_messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterUsers', [
            'foreignKey' => 'master_id',
            'joinType' => 'INNER',
        ]);
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
            ->scalar('contact')
            ->maxLength('contact', 50)
            ->requirePresence('contact', 'create')
            ->notEmptyString('contact');

        $validator
            ->dateTime('day')
            ->requirePresence('day', 'create')
            ->notEmptyDateTime('day');

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
        $rules->add($rules->existsIn(['master_id'], 'MasterUsers'), ['errorField' => 'master_id']);

        return $rules;
    }
}
