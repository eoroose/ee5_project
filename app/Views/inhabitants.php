<div>
    <H4>inhabitants page</H4>
    <h4>Check UsersController.php</h4>

    <p>similar to the users page for admin, but this one can only see inhabitants, this page cannot change variables from the inhabitants like in users page</p>
    <p>but still can assign yellow cards</p>

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