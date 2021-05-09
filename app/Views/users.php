<div>
    <h1>users page</h1>
    <h2>Check UsersController.php</h2>

    <p>any info given from this page can be changed, such as usernames, first/last names, birthdays, appointments anything from anyone</p>
    <p>can also assign yellow cards to inhabitants</p>
    <P>also a list of inhabitants that are no longer in de spiegel will be available</P>
    <p>with the option to re-enlist them</p>

    <h2> List of inhabitants </h2>
        <table>
                <tr>
                    <th>Avatar</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>

            <?php foreach ($inhabitants as $i): ?>
                <tr onclick="window.location.href='http://localhost/UsersController/inhabitant?user=<?php echo $i->userID; ?>';">
                    <td><?php echo $i->avatar;?></td>
                    <td><?php echo $i->firstname;?></td>
                    <td><?php echo $i->lastname;?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <h2> List of employees </h2>
        <table>
                    <tr>
                        <th>Avatar</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>

            <?php foreach ($users as $u): ?>
                <?php if($u->employeeAdminID == NULL): ?>
                <?php else: ?>
                    <tr onclick="window.location.href='http://localhost/UsersController/employee?user=<?php echo $u->userID; ?>';">
                        <td><?php echo $u->avatar;?></td>
                        <td><?php echo $u->firstname;?></td>
                        <td><?php echo $u->lastname;?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

</div>