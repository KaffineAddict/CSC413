<!-- File: /app/View/Tickets/update.ctp -->
<!--
This file is a view that prints a form for updating a particular tickets information.
This will allow us to reassign or put a better description on a ticket.
-->
<?
$this->assign('title', 'Update Ticket');
?>

<!-- a link back to the main ticket view -->
<?php echo $this->Html->link(
    'Cancel',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<!-- dump the current ticket information to the form -->
<?php
echo $this->Form->create('Ticket');
echo $this->Form->input('description');
echo $this->Form->input('created_user_id');
echo $this->Form->input('assigned_user_id');
echo $this->Form->input('status');
echo $this->Form->end('Update Status');
?>