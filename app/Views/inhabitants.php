<div>
    <H4>inhabitants page</H4>

    <table>
        <tr>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

        <?php foreach ($inhabitants as $i): ?>
        <tr onclick="window.location.href='http://localhost/UsersController/inhabitant?user=<?php echo $i->userID; ?>';">
            <td><img src="<?php echo $i->location;?>"></td>
            <td><?php echo $i->firstname;?></td>
            <td><?php echo $i->lastname;?></td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>