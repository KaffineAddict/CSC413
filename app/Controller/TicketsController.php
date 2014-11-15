<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 11:40 AM
 *
 * This is the controller for the main ticket view. It will allow us to view
 * one or multiple tickets as well us updating them. This is the main ticket queue
 * controller.
 */

class TicketsController extends AppController {
    // we will be using the HTML and Form support
    public $helpers = array('Html', 'Form');
    // This is needed for
    public $components = array('Session');

    public function isAuthorized($user) {
        if ($this->action == 'create') {
            if($this->Auth->user('Type.open_tickets') == 1) {
                $this->set('can_open', 1);
                return true;
            } else {
                return false;
            }
        }
        if ($this->action == 'update') {
            if(($this->request->params['pass'][0] == $this->Auth->user('User.id'))) {
                return true;
            } else if ($this->Auth->user('Type.') == 1) {
                $this->set('can_update', 1);
                return true;
            }
            return false;
        }
        if ($this->action == 'close') {
            if($this->Auth->user('Type.close_tickets') == 1) {
                $this->set('can_close', 1);
                return true;
            } else {
                return false;
            }
        }
        return parent::isAuthorized($user);
    }

    // grab all tickets and display them using the index view
    public function index()
    {
        $this->set('tickets', $this->Ticket->find('all'));
    }

    // this view is for a single ticket
    // if the id/ticket does not exist it will through an error
    // otherwise it will display to the view.ctp view
    public function view($id = null)
    {
        // check that we got an ID
        if (!$id) {
            throw new NotFoundException(__('Invalid Ticket'));
        }

        $ticket = $this->Ticket->findByid($id);
        // check that a ticket exists with that ID
        if (!$ticket) {
            throw new NotFoundException(__('Invalid Ticket'));
        }
        $this->set('ticket', $ticket);
    }

    // This control will be used when creating a new ticket
    // it grabs the status list and users to make dropdowns
    // for easy ticket creation
    public function create()
    {
        // get a list of all status id's and names
        $this->set('statuses', $this->Ticket->Status->find('list',
            array('order' => array('Status.id' => 'asc'))));

        // get a list of users for the created by dropdown
        $this->set('createdUsers', $this->Ticket->Creator->find('list',
            array('fields' => array('Creator.id', 'Creator.full_name'))));

        // get a list of users for the assigned to dropdown
        $this->set('assignedUsers', $this->Ticket->Assignee->find('list',
            array('fields' => array('Assignee.id', 'Assignee.full_name'))));

        // check if the form was submitted and then save it if all information is valid.
        if ($this->request->is('post')) {
            $this->Ticket->create();
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('Your ticket has been created!'));
                return $this->redirect(array('action' => 'view', $this->Ticket->getInsertID()));
            }
            // something went wrong display error
            $this->Session->setFlash(__('Unable to create the ticket.'));
        }
    }

    // this controller runs on the update view check the comments for the create
    // as they are very similar. with the exception that this checks if the ticket already
    // exists and then builds the form with data already in the ticket.
    public function update($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid Ticket'));
        }

        $ticket = $this->Ticket->findByid($id);
        if (!$ticket) {
            throw new NotFoundException(__('Invalid Ticket'));
        }

        $this->set('statuses', $this->Ticket->Status->find('list',
            array('order' => array('Status.id' => 'asc'))));

        $this->set('createdUsers', $this->Ticket->Creator->find('list',
            array('fields' => array('Creator.id', 'Creator.full_name'))));

        $this->set('assignedUsers', $this->Ticket->Assignee->find('list',
            array('fields' => array('Assignee.id', 'Assignee.full_name'))));

        if ($this->request->is('post', 'put')) {
            $this->Ticket->id = $id;
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('Your ticket has been updated.'));
                return $this->redirect(array('action' => 'view', $id));
            }
            $this->Session->setFlash(__('Unable to update the ticket.'));
        }

        if (!$this->request->data) {
            $this->request->data = $ticket;
        }
    }
} // end class TicketController