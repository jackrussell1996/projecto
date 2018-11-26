<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class UsersController extends AppController {

    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array('name' => 'asc'),
            'contain' => ['Jobs']
        );
        $users = $this->paginate($this->Users);
        $this->set('users', $users);
    }

    public function view($id = null) {
        if (!TableRegistry::get('Users')->exists(['id' => $id])) {
            $this->Flash->error('This User does not exist.');
            $this->redirect(array('action' => 'index'));
        } else {
            $user = $this->Users->get($id, [
                'contain' => ['Jobs']
            ]);
            $this->set('user', $user);
        }
    }

    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                //if(!$auth){
                    //return $this->redirect(['action' => 'view', $user['id']]);
                //} else{
                    return $this->redirect(['action' => 'login']);
                //}
            }
            $this->Flash->error('Unable to register the user.');
            return $this->redirect(['action' => 'register']);
        }
        $this->set('user', $user);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Welcome ' . $user['name'] . '.');
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Invalid username or password, try again');
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
