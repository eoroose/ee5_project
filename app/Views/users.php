<div>
    <h1>users page</h1>

    <?php if (!empty($activeinhabitants)): ?>
    <h2> List of active inhabitants </h2>
        <table>
                <tr>
                    <th>Avatar</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>

            <?php foreach ($activeinhabitants as $i): ?>
                <tr onclick="window.location.href='users/inhabitant/<?php echo $i->userID; ?>';">
                    <td><img src="<?php echo $i->location;?>"></td>
                    <td><?php echo $i->firstname;?></td>
                    <td><?php echo $i->lastname;?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php if (!empty($archivedinhabitants)): ?>
    <h2> List of archived inhabitants </h2>
        <table>
                <tr>
                    <th>Avatar</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>

            <?php foreach ($archivedinhabitants as $i): ?>
                <tr onclick="window.location.href='users/inhabitant/<?php echo $i->userID; ?>';">
                    <td><img src="<?php echo $i->location;?>"></td>
                    <td><?php echo $i->firstname;?></td>
                    <td><?php echo $i->lastname;?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php if (!empty($activeemployees)): ?>
    <h2> List of active employees </h2>
        <table>
                    <tr>
                        <th>Avatar</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>

            <?php foreach ($activeemployees as $u): ?>
                <?php if($u->employeeAdminID == NULL): ?>
                <?php else: ?>
                    <tr onclick="window.location.href='users/employee/<?php echo $u->userID; ?>';">
                        <td><img src="<?php echo $u->location;?>"></td>
                        <td><?php echo $u->firstname;?></td>
                        <td><?php echo $u->lastname;?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php if (!empty($archivedemployees)): ?>
    <h2> List of archived employees </h2>
        <table>
                    <tr>
                        <th>Avatar</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>

            <?php foreach ($archivedemployees as $u): ?>
                <?php if($u->employeeAdminID == NULL): ?>
                <?php else: ?>
                    <tr onclick="window.location.href='users/employee/<?php echo $u->userID; ?>';">
                        <td><img src="<?php echo $u->location;?>"></td>
                        <td><?php echo $u->firstname;?></td>
                        <td><?php echo $u->lastname;?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>