<!-- File: /app/View/Users/index.ctp -->
<!--
This file is the main view for the users page.
It loops through all users defined in app/Models/User.php and writes the relevant
information to an html table.
-->

<h1>User List</h1>

<!-- print out the top navigation using cake php array links -->
<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
);
echo " ";
echo $this->Html->link(
    'Show All Tickets',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<!-- print out the table headers -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
    </tr>
    <!-- loop through all users and dump the relevant information to the table -->
    <?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['full_name']; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['Type']['name']; ?></td>
    </tr>
        <!-- end users loop -->
    <?php endforeach; unset($user); ?>
</table>