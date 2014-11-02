<!-- File: /app/View/Tickets/create.ctp -->
<!--
This is a form that allows us to create a brand new ticket
-->
<h1>Create a Ticket</h1>

<!-- a link back to all of the current tickets -->
<?php echo $this->Html->link(
    'Cancel',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<!-- build the ticket creation form -->
<?php
echo $this->Form->create('Ticket');
echo $this->Form->input('description');
echo $this->Form->input('created_user_id');
echo $this->Form->input('assigned_user_id');
echo $this->Form->input('status');
echo $this->Form->end('Create');
?>