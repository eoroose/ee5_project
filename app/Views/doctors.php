<div>
    <h4>doctors page</h4>
    <h4>Check DoctorsController.php</h4>

    <p>page where there will be a list of doctors, and their appointments</p>
    <p>possibility to add new doctors</p>
</div>
<div>
    <div class="row justif-content-md-center card">
        <img src="assets/images/dashboard_page/verify.svg" height="50px" width="50px">
        <div class="card-body dashboard-card-body">
            <h5 class="card-title dashboard-card-title"style="text-align: center">Registreer een nieuwe Dokter</h5>
            <a onclick="registerDoctor()" class="stretched-link"></a>
            <!--  nclick="window.location.href='http://localhost/UsersController/inhabitant?user=<?php echo 't ' ?>' -->
        </div>
    </div>
</div>
<div>
    <div class="container">
        <?php foreach ($doctors as $row){?>
            <div class="row justif-content-md-center card">
                <img src="<?php if($row['gender']=="male"){echo base_url('assets/images/doctors/maledoctor.svg');}else{echo base_url('assets/images/doctors/maledoctor.svg');}?>" height="50px" width="50px">
                <div class="card-body dashboard-card-body">
                    <h5 class="card-title dashboard-card-title"style="text-align: center"><?php echo $row['lastname'].' '.$row['firstname']?></h5>
                    <a href="/doctors/doctorprofile/<?php echo $row['doctorID'];?>" class="stretched-link"></a>
                  <!--  nclick="window.location.href='http://localhost/UsersController/inhabitant?user=<?php echo 't ' ?>' -->
                </div>
            </div>
        <?php }?>
    </div>
</div>


<div id="model" class="main-modal" style="display:none;">
    <div class="card main-card">
        <h4>Registreer Dokter</h4>
        <div class="row main-avatar-modal-row">
            <form action="/DoctorsController/register" id="form2" name="form2" onsubmit="return(validate());">
                <div>
                    <label class="register-input-label" for="firstname">Voornaam</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Voornaam" value="" maxlength="75">
                </div>
                <div>
                    <label class="register-input-label" for="Achternaam">Achternaam</label>
                    <input type="text" id="Achternaam" name="Achternaam" placeholder="Achternaam" value="" maxlength="75">
                </div>
                <div>
                    <label class="register-input-label" for="Land">Land</label>
                    <input type="text" id="Land" name="Land" placeholder="Land" value="" maxlength="75">
                </div>
                <div>
                    <label class="register-input-label" for="Stad">Stad</label>
                    <input type="text" id="Stad" name="Stad" placeholder="Stad" value="" maxlength="75">
                </div>
                <div>
                    <label class="register-input-label" for="Address">Address</label>
                    <input type="text" id="Address" name="Address" placeholder="Address" value="" maxlength="75">
                </div>
                <div>
                    <label class="register-input-label" for="phone">Telefoonnummer</label>
                    <input type="tel" id="phone" name="phone" placeholder="Telefoonnummer" value="" maxlength="16">
                </div>
                <div>
                    <label class="register-input-label" for="Gender">Geslacht</label>
                    <select id='Gender' name='Gender'>
                        <option value='male' >male</option>
                        <option value='female' >female</option>
                        <option value='none of the above'>none of the above</option>
                    </select>
                </div>
                <button type="submit" value="submit">Registreer </button>
            </form>
        </div>
        <button id="submit_model_1" type="submit" class="main-modal-btn" onclick="cancelDoctor()">cancel</button>
    </div>
</div>


<script>
    function registerDoctor()
    {
        document.getElementById("model").style.display="block";

    }
    function cancelDoctor(){
        document.getElementById("model").style.display="none";
    }
    function validate(){
        if( document.form2.firstname.value == "" ) {
            alert( "Vergeet de voornaam niet" );
            document.form2.firstname.focus() ;
            return false;
        }
        if( document.form2.Achternaam.value == "" ) {
            alert( "Vergeet de achternaam niet!" );
            document.form2.Achternaam.focus() ;
            return false;
        }
        if( document.form2.Land.value == "" ) {
            alert( "Vergeet het land niet" );
            document.form2.Land.focus() ;
            return false;
        }
        if( document.form2.Address.value == "" ) {
            alert( "Vergeet de telefoonnummer niet" );
            document.form2.Address.focus() ;
            return false;
        }
        if( document.form2.Stad.value == "" ) {
            alert( "Vergeet de stad niet" );
            document.form2.Stad.focus() ;
            return false;
        }
        return( true );
    }
</script>