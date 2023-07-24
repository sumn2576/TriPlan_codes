<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Valucomments Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PlansTable&\Cake\ORM\Association\BelongsTo $Plans
 * @property \App\Model\Table\ReportsTable&\Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Valucomment newEmptyEntity()
 * @method \App\Model\Entity\Valucomment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Valucomment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Valucomment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Valucomment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Valucomment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Valucomment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Valucomment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Valucomment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Valucomment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Valucomment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Valucomment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Valucomment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ValucommentsTable extends Table
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

        $this->setTable('valu_comments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'valu_comment_id',
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
            ->integer('valu')
            ->requirePresence('valu', 'create')
            ->notEmptyString('valu');

        $validator
            ->scalar('impression')
            ->maxLength('impression', 50)
            ->requirePresence('impression', 'create')
            ->notEmptyString('impression');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['plan_id'], 'Plans'), ['errorField' => 'plan_id']);

        return $rules;
    }
}
