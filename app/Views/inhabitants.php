<div>
    <link href="/assets/css/users.css" rel="stylesheet" type="text/css" />

    <div class="container users-container main-bottom-padding">
        <h3 class="main-title users-title">Inhabitants</h3>

        <!-- INHABITANTS -->
        <?php if (!empty($activeinhabitants)): ?>
            <div class="card users-card main-card">
                <h3 class="main-title users-card-title">Active</h3>

                <div class="row users-card-row">
                    <?php foreach ($activeinhabitants as $user): ?>
                        <div class="col-sm card users-inhabitant-card">
                            <img src="<?php echo base_url($user->location);?>" class="card-img-top users-inhabitant-card-img" alt="user image">
                            <p><?php echo $user->firstname?> <?php echo $user->lastname?></p>
                            <a onclick="window.location.href='users/inhabitant/<?php echo $user->userID; ?>';" class="stretched-link" ></a>
                        </div>
                        <div class="col-sm card users-inhabitant-card-separator"></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- ARCHIVED INHABITANTS -->
        <?php if (!empty($archivedinhabitants)): ?>
            <div class="card users-card main-card">
                <h3 class="main-title users-card-title">Archived</h3>

                <div class="row users-card-row">
                    <?php foreach ($archivedinhabitants as $user): ?>
                        <div class="col-sm card users-inhabitant-card users-archived-card">
                            <img src="<?php echo base_url($user->location);?>" class="card-img-top users-inhabitant-card-img" alt="user image">
                            <p><?php echo $user->firstname?> <?php echo $user->lastname?></p>
                            <a onclick="window.location.href='users/inhabitant/<?php echo $user->userID; ?>';" class="stretched-link" ></a>
                        </div>
                        <div class="col-sm card users-inhabitant-card-separator"></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    
    </div>
</div>
