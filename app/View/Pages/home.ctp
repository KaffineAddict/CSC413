<h1>Home Page</h1>

<!-- print out the top navigation using cake php array links -->
<?php echo $this->Html->link(
    'Users',
    array('controller' => 'users', 'action' => 'index')
);
echo " ";
echo $this->Html->link(
    'Tickets',
    array('controller' => 'tickets', 'action' => 'index')
);
echo " ";
echo $this->Html->link(
    'Logout',
    array('controller' => 'users', 'action' => 'logout')
);
?>