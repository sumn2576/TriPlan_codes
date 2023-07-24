<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\FavoriteitemsTable&\Cake\ORM\Association\HasMany $FavoriteItems
 * @property \App\Model\Table\PlansTable&\Cake\ORM\Association\HasMany $Plans
 * @property \App\Model\Table\ReportsTable&\Cake\ORM\Association\HasMany $Reports
 * @property \App\Model\Table\UserMessagesTable&\Cake\ORM\Association\HasMany $UserMessages
 * @property \App\Model\Table\ValuCommentsTable&\Cake\ORM\Association\HasMany $ValuComments
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('FavoriteItems', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Plans', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserMessages', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ValuComments', [
            'foreignKey' => 'user_id',
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
            ->scalar('user_name')
            ->maxLength('user_name', 10)
            ->requirePresence('user_name', 'create')
            ->notEmptyString('user_name');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 30)
            ->allowEmptyString('comment');

        $validator
            ->scalar('icon')
            ->allowEmptyString('icon');

        $validator
            ->scalar('rural')
            ->maxLength('rural', 3)
            ->allowEmptyString('rural');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 30)
            ->requirePresence('mail', 'create')
            ->notEmptyString('mail')
            ->add('mail', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password_code')
            ->maxLength('password_code', 255)
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
