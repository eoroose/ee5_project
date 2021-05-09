<?php $user = 2; ?>

<body>
    <button onclick=""> Edit user </button>
    <button onclick=""> Archive user </button>
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
            <th>Date First Arrival:</th>
            <td><?php echo $i->dateAdded; ?></td>
        </tr>

        <tr>
            <th>Date Latest Arrival:</th>
            <td><?php echo $i->arrivalDate; ?></td>
        </tr>

        <?php endforeach; ?>

        <tr>
            <th>Chores:</th>
            <td><?php foreach ($chores as $c): ?><?php echo $c->date ?> - <?php echo $c->description ?><br><?php endforeach; ?></td>
        </tr>

        <tr>
            <th>Doctors Appointments:</th>
            <td><?php foreach ($appointments as $a): ?><?php echo $a->firstname; ?> <?php echo $a->lastname ?>: <?php echo $a->date ?> - <?php echo $a->reason ?><br><?php endforeach; ?></td>
        </tr>

        <tr>
            <th>Yellow Cards:</th>
            <td><?php foreach ($cards as $c): ?><?php echo $c->date ?> - <?php echo $c->reason ?><br><?php endforeach; ?></td>
        </tr>

        <tr>
            <th>Progress:</th>
            <td>

                <?php foreach ($progress as $row){?>
                    <div class="row dashboard-progress-row">
                        <div class="card dashboard-progress-card">
                            <div class="card-body dashboard-progress-card-body">
                                <p class="dashboard-progress-card-text">
                                    Step <?php echo $row['phase']?>
                                </p>
                                <div class="progress rounded-pill dashboard-progress-rounded-pill">
                                    <div role="progressbar" aria-valuenow="<?php echo $row['percentage']?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row['percentage']?>%" class="progress-bar rounded-pill dashboard-progress-percentage"><?php echo $row['percentage']?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </td>
        </tr>

        <tr>
            <th>Godparent:</th>
            <td><?php foreach ($godparent as $g): ?><?php echo $g->firstname; ?> <?php echo $g->lastname ?><?php endforeach; ?></td>
        </tr>

        <tr>
            <th>Godchildren:</th>
            <td><?php foreach ($godchildren as $g): ?><?php echo $g->firstname; ?> <?php echo $g->lastname ?><br><?php endforeach; ?></td>
        </tr>

        <tr>
            <th>Notes:</th>
            <td><?php foreach ($notes as $n): ?><?php echo $n->title; ?>: <?php echo $n->description ?><br><?php endforeach; ?></td>
        </tr>
    </table>
</body>

<script>
    function getUserID()
    {
    }
</script>