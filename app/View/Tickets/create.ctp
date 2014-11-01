<!-- File: /app/View/Tickets/create.ctp -->

<h1>Create a Ticket</h1>

<?php echo $this->Html->link(
    'Cancel',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<?php
echo $this->Form->create('Ticket');
echo $this->Form->input('description');
echo $this->Form->input('created_user_id');
echo $this->Form->input('assigned_user_id');
echo $this->Form->input('status');
echo $this->Form->end('Create');
?>