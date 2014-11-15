<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 4:52 PM
 *
 * This is a controller for the Users view. It picks which views to display and then processes
 * information that will be need for them or that is coming from them
 */

class UsersController extends AppController {
    // grab HTML and Form support
    public $helpers = array('Html', 'Form');
    // Also lets get session information support
    // We are gonna use this for the messages.
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
    }

    public function isAuthorized($user) {
        if ($this->action == 'add') {
            if($this->Auth->user('Type.edit_permissions') == 1) {
                return true;
            } else {
                return false;
            }
        }
        if ($this->action == 'update') {
            if(($this->request->params['pass'][0] == $this->Auth->user('User.id'))) {
                return true;
            } else if ($this->Auth->user('Type.edit_permissions') == 1) {
                return true;
            }
            return false;
        }
        return parent::isAuthorized($user);
    }

    // display control for the index/main view.
    public function index()
    {
        // simply grab a list of all users to display.
        $this->set('users', $this->User->find('all'));
    }

    // this is the controller for the adding user view.
    public function add()
    {
        // get a list of all current user types
        $this->set('userTypes', $this->User->Type->find('list',
            array('order' => array('Type.id' => 'asc'))));

        // this checks if the form was submitted and if it was then save the
        // new entry into the database and post a success or failure message either way.
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been added!'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add the user.'));
        }
    }

    public function login() {
        if ($this->request->is('post') || $this->request->is('get')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash('Logged In');
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Your login failed'), 'default', array(), 'auth');
            }
        }
    }

    function logout(){
        $this->Session->setFlash('Logged out.');
        $this->redirect($this->Auth->logout());
    }

    public function update($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid User ID'));
        }

        $user = $this->User->findByid($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid User ID'));
        }

        $this->set('userTypes', $this->User->Type->find('list',
            array('order' => array('Type.id' => 'asc'))));

        if ($this->request->is('post', 'put')) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User info has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update the user.'));
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }
} // end class UserController
