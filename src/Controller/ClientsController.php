<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ClientsController extends AppController {

    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('name' => 'asc'),
            'contain' => ['Projects']
        );
        $clients = $this->paginate($this->Clients);
        $this->set('clients', $clients);
    }

    public function view($id = null) {
        if (!TableRegistry::get('Clients')->exists(['id' => $id])) {
            $this->Flash->error('This client does not exist.');
            $this->redirect(array('action' => 'index'));
        } else {
            $client = $this->Clients->get($id, [
                'contain' => ['Projects']
            ]);
            $this->set('client', $client);
        }
    }

    public function add() {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success('The client was saved.');
                return $this->redirect(['action' => 'view', $client['id']]);
            } else {
                $this->Flash->error('The client was not saved. Please, try again.');
            }
        }
        $this->set('client', $client);
    }
    
    public function edit($id = null)
    {
        $client = $this->Clients->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success('The client was saved.');
                return $this->redirect(['action' => 'view', $client['id']]);
            } else {
                $this->Flash->error('The client was not saved. Please, try again.');
            }
        }
        $this->set('client', $client);
    }
    
    public function delete($id = null)
    {
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success('The client was deleted.');
        } else {
            $this->Flash->error('The client was not deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
