<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 11/1/2014
 * Time: 11:40 AM
 */

class TicketsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index()
    {
        $this->set('tickets', $this->Ticket->find('all'));
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid Ticket'));
        }

        $ticket = $this->Ticket->findByid($id);
        if (!$ticket) {
            throw new NotFoundException(__('Invalid Ticket'));
        }
        $this->set('ticket', $ticket);
    }

    public function create()
    {
        $this->set('statuses', $this->Ticket->Status->find('list',
            array('order' => array('Status.id' => 'asc'))));

        $this->set('createdUsers', $this->Ticket->Creator->find('list',
            array('fields' => array('Creator.id', 'Creator.full_name'))));

        $this->set('assignedUsers', $this->Ticket->Assignee->find('list',
            array('fields' => array('Assignee.id', 'Assignee.full_name'))));

        if ($this->request->is('post')) {
            $this->Ticket->create();
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('Your ticket has been created!'));
                return $this->redirect(array('action' => 'view', $this->Ticket->getInsertID()));
            }
            $this->Session->setFlash(__('Unable to create the ticket.'));
        }
    }

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
}