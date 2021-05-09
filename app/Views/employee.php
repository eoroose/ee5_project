<!DOCTYPE html>
<html lang="en">


<body>
        <table style="width:100%">

            <?php foreach ($inhabitant as $i): ?>

            <tr>
                <th>Avatar:</th>
                <td><?php echo $i->avatar; ?></td>
            </tr>

            <tr>
                <th>Username:</th>
                <td><?php echo $i->username; ?></td>
            </tr>

            <tr>
                <th>First Name:</th>
                <td><?php echo $i->firstname; ?></td>
            </tr>

            <tr>
                <th>Last Name:</th>
                <td><?php echo $i->lastname; ?></td>
            </tr>

            <tr>
                <th>Birthday:</th>
                <td><?php echo $i->birthday; ?></td>
            </tr>

            <tr>
                <th>Date of Arrival:</th>
                <td><?php echo $i->dateAdded; ?></td>
            </tr>

            <?php endforeach; ?>

        </table>


</body>
</html>