<!-- File: /app/View/Tickets/view.ctp -->

<h1>Ticket Queue</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Creator</th>
        <th>Assignee</th>
        <th>Opened</th>
        <th>Status</th>
    </tr>
    <tr>
            <td><?php echo $ticket['Ticket']['id']; ?></td>
            <td><?php echo $ticket['Ticket']['created_user_id']; ?></td>
            <td><?php echo $ticket['Ticket']['assigned_user_id']; ?></td>
            <td><?php echo $ticket['Ticket']['created']; ?></td>
            <td><?php echo $ticket['Ticket']['status']; ?></td>
    </tr>
</table>

