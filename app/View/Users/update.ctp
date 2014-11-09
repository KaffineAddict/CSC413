<!-- File: /app/View/Users/update.ctp -->
<!--
This file is a view that prints a form for updating a particular tickets information.
This will allow us to reassign or put a better description on a ticket.
-->

<h1>Update User</h1>

<!-- a link back to the main ticket view -->
<?php echo $this->Html->link(
    'Cancel',
    array('controller' => 'users', 'action' => 'index')
); ?>

<!-- dump the current ticket information to the form -->
<?php
echo $this->Form->create('User');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('user_type');
echo $this->Form->end('Update User');
?>