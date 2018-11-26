<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class JobsController extends AppController {

    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('name' => 'asc'),
            'contain' => ['Projects', 'Users']
        );
        $jobs = $this->paginate($this->Jobs);
        $this->set('jobs', $jobs);
    }

    public function dashboard() {
        $user = $this->Auth->user();
        $this->set('user', $user);
        $this->paginate = array(
            'limit' => 10,
            'order' => array('name' => 'asc'),
            'contain' => ['Projects', 'Users'],
            'conditions' => array('user_id' => $user['id'])
        );
        $jobs = $this->paginate($this->Jobs);
        $this->set('jobs', $jobs);
    }

    public function view($id = null) {
        if (!TableRegistry::get('Jobs')->exists(['id' => $id])) {
            $this->Flash->error('This Job does not exist.');
            $this->redirect(array('action' => 'index'));
        } else {
            $job = $this->Jobs->get($id, [
                'contain' => ['Projects', 'Users']
            ]);
            $this->set('job', $job);
            $other_users_jobs = $this->Jobs->find('all', ['conditions' => ['user_id' => $job->user['id'],
                    'not' => ['id' => $job['id']]]]);
            $this->set('other_users_jobs', $other_users_jobs);
            $other_project_jobs = $this->Jobs->find('all', ['conditions' => ['project_id' => $job->project['id'],
                    'not' => ['id' => $job['id']]]]);
            $this->set('other_project_jobs', $other_project_jobs);
        }
    }

    public function add() {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success('The job was added.');
                return $this->redirect(['action' => 'view', $job['id']]);
            } else {
                $this->Flash->error('The job was not added. Please, try again.');
            }
        }
        $users = $this->Jobs->Users->find('list', ['order' => array('name' => 'asc')]);
        $projects = $this->Jobs->Projects->find('list', ['order' => array('name' => 'asc')]);
        $this->set('users', $users);
        $this->set('projects', $projects);
        $this->set('job', $job);
    }

    public function edit($id = null) {
        $job = $this->Jobs->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success('The job was updated.');
                return $this->redirect(['action' => 'view', $job['id']]);
            } else {
                $this->Flash->error('The job was not updated. Please, try again.');
            }
        }
        $users = $this->Jobs->Users->find('list', ['order' => array('name' => 'asc')]);
        $projects = $this->Jobs->Projects->find('list', ['order' => array('name' => 'asc')]);
        $this->set('users', $users);
        $this->set('projects', $projects);
        $this->set('job', $job);
    }

    public function delete($id = null) {
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success('The job was deleted.');
        } else {
            $this->Flash->error('The job was not deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
