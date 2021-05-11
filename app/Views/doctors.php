<div>
    <h4>doctors page</h4>
    <h4>Check DoctorsController.php</h4>

    <p>page where there will be a list of doctors, and their appointments</p>
    <p>possibility to add new doctors</p>
</div>

<div>
    <div class="container">
        <?php foreach ($doctors as $row){?>
            <div class="row justif-content-md-center card">
                <img src="<?php if($row['gender']=="male"){echo base_url('assets/images/doctors/maledoctor.svg');}else{echo base_url('assets/images/doctors/maledoctor.svg');}?>" height="50px" width="50px">
                <div class="card-body dashboard-card-body">
                    <h5 class="card-title dashboard-card-title"style="text-align: center"><?php echo $row['lastname'].' '.$row['firstname']?></h5>
                    <a href="/doctor/doctorprofile/<?php echo $row['doctorID']?> class="stretched-link"></a>
                </div>
            </div>
        <?php }?>
    </div>
</div>
