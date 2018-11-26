<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProjectsTable extends Table {
    
    public function initialize(array $config){
        $this->table('projects');
	$this->displayField('name');
	$this->primaryKey('id');
        
        $this->belongsTo('Clients');
        $this->hasMany('Jobs');
        $this->addBehavior('Timestamp');
    }
    
    public function validationDefault(Validator $validator) {
        $validator
                ->add('name', [
                    'unique' => [
                        'rule' => ['validateUnique', ['scope' => 'name']],
                        'provider' => 'table',
                        'message' => 'There is already a project with that name!'
                    ]
                ])
                ->notEmpty('name')
                ->notEmpty('client_id');
        return $validator;
    }
}
