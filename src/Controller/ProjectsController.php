<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ProjectsController extends AppController {

    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('name' => 'asc'),
            'contain' => ['Clients', 'Jobs']
        );
        $projects = $this->paginate($this->Projects);
        $this->set('projects', $projects);
    }

    public function view($id = null) {
        if (!TableRegistry::get('Projects')->exists(['id' => $id])) {
            $this->Flash->error('This project does not exist.');
            $this->redirect(array('action' => 'index'));
        } else {
            $project = $this->Projects->get($id, [
                'contain' => ['Clients', 'Jobs']
            ]);
            $this->set('project', $project);
        }
    }

    public function add() {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project was added.');
                return $this->redirect(['action' => 'view', $project['id']]);
            } else {
                $this->Flash->error('The project was not saved. Please, try again.');
            }
        }
        $clients = $this->Projects->Clients->find('list');
        $this->set('project', $project);
        $this->set('clients', $clients);
    }

    public function edit($id = null) {
        $project = $this->Projects->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project was updated.');
                return $this->redirect(['action' => 'view', $project['id']]);
            } else {
                $this->Flash->error('The project was not updated. Please, try again.');
            }
        }
        //$project['startdate'] = $project['startdate']->i18nFormat('dd/MM/Y');
        //$project['finishdate'] = $project['finishdate']->i18nFormat('dd/MM/Y');
        $clients = $this->Projects->Clients->find('list');
        $this->set('project', $project);
        $this->set('clients', $clients);
    }

    public function delete($id = null) {
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success('The project was deleted.');
        } else {
            $this->Flash->error('The project was not deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
