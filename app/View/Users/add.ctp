<!-- File: /app/View/Users/add.ctp -->
<!--
This is a form that allows us to add a new user
-->
<h1>Add a User</h1>

<!-- a link back to all of our users -->
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