<!-- File: /app/View/Users/add.ctp -->

<h1>Add a User</h1>

<?php echo $this->Html->link(
    'Cancel',
    array('controller' => 'users', 'action' => 'index')
); ?>

<?php
echo $this->Form->create('User');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('token');
echo $this->Form->input('user_type');
echo $this->Form->end('Add User');
?>