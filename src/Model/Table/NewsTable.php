<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * News Model
 *
 * @method \App\Model\Entity\News get($primaryKey, $options = [])
 * @method \App\Model\Entity\News newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\News[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\News|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\News[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\News findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewsTable extends Table
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

        $this->table('news');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('excerpt', 'create')
            ->notEmpty('excerpt');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->requirePresence('meta_title', 'create')
            ->notEmpty('meta_title');

        $validator
            ->requirePresence('meta_keyword', 'create')
            ->notEmpty('meta_keyword');

        $validator
            ->requirePresence('meta_description', 'create')
            ->notEmpty('meta_description');

        $validator
            ->requirePresence('thumb', 'create')
            ->notEmpty('thumb');

        $validator
            ->integer('is_publish')
            ->requirePresence('is_publish', 'create')
            ->notEmpty('is_publish');

        /*$validator
            ->integer('sorting')
            ->requirePresence('sorting', 'create')
            ->notEmpty('sorting');*/

        $validator
            ->requirePresence('posted_by', 'create')
            ->notEmpty('posted_by');

        return $validator;
    }
}
