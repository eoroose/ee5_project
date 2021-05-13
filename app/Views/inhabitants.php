<div>
    <h1>inhabitants page</h1>

    <?php if (!empty($activeinhabitants)): ?>
    <h2>active inhabitants</h2>
    <table>
        <tr>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

        <?php foreach ($activeinhabitants as $i): ?>
        <tr onclick="window.location.href='http://localhost/UsersController/inhabitant?user=<?php echo $i->userID; ?>';">
            <td><img src="<?php echo $i->location;?>"></td>
            <td><?php echo $i->firstname;?></td>
            <td><?php echo $i->lastname;?></td>
        </tr>
        <?php endforeach; ?>

    </table>
    <?php endif; ?>

    <h2>archived inhabitants</h2>
    <table>
        <tr>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>

        <?php foreach ($archivedinhabitants as $i): ?>
        <tr onclick="window.location.href='http://localhost/UsersController/inhabitant?user=<?php echo $i->userID; ?>';">
            <td><img src="<?php echo $i->location;?>"></td>
            <td><?php echo $i->firstname;?></td>
            <td><?php echo $i->lastname;?></td>
        </tr>
        <?php endforeach; ?>

    </table>

</div>