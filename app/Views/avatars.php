<?php foreach ($avatars as $row){?>
    <div class="container">
            <div class="col-md card">
            <img src="<?php echo $row['location'];?>" class="card-img-top dashboard-card-logo" alt="user image" height="50px" width="50px">
                <div class="card-body">
                    <h5 class="card-title"style="text-align: center"><?php echo $row['title'];?></h5>
                    <a onclick="" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
