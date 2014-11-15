<!-- File: /app/View/Users/index.ctp -->
<!--
This file is the main view for the users page.
It loops through all users defined in app/Models/User.php and writes the relevant
information to an html table.
-->
<?
$this->assign('title', 'User List');
?>

<!-- print out the table headers -->
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Type</th>
            <th>Update</th>
        </tr>
    </thead>
    <!-- loop through all users and dump the relevant information to the table -->
    <tbody>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['full_name']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['Type']['name']; ?></td>
        <td><?php echo $this->Html->link('Update User', array('action' => 'update', $user['User']['id'])); ?></td>
    </tr>
        <?php endforeach; unset($user); ?>
    </tbody>
</table>