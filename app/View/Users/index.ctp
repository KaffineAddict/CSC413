<!-- File: /app/View/Users/index.ctp -->

<h1>User List</h1>

<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
);
echo " ";
echo $this->Html->link(
    'Show All Tickets',
    array('controller' => 'tickets', 'action' => 'index')
); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['full_name']; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['Type']['name']; ?></td>
    </tr>
    <?php endforeach; unset($user); ?>
</table>