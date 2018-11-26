<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Jobs',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'name')
                )
            )
        ]);
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['index', 'view', 'display', 'login', 'logout', 'register']);
        $this->set('title_for_layout', ucfirst($this->request['controller']) . ' > ' . ucfirst($this->request['action']));
        $this->set('referer', $this->referer(null, true));
        $this->set('auth', $this->returnUser());
    }

    public function returnUser() {
        return $this->Auth->user();
    }

}
