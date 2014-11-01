<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 4:52 PM
 */

class UsersController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index()
    {
        $this->set('users', $this->User->find('all'));
    }

    public function add()
    {
        $this->set('userTypes', $this->User->Type->find('list',
            array('order' => array('Type.id' => 'asc'))));

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been added!'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add the user.'));
        }
    }
} 