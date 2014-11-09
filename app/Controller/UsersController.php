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
        $this->Auth->allow('login');
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
} // end class UserController
