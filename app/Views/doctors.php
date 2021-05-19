<div>
    <link href="/assets/css/doctors.css" rel="stylesheet" type="text/css" />

    <div class="container doctors-container main-bottom-padding">
        <h3 class="main-title doctors-title">Dokters</h3>

        <div class="row doctors-row">
            
            <div class="col-12 card doctors-register-card">
                <img src="/assets/images/doctors/verify.svg" class="card-img-top" alt="verify image">
                <div class="card-body doctors-register-card-body">
                    <h5 class="card-title doctors-register-title" style="text-align: center">Registreer een nieuwe dokter</h5>
                    <a onclick="registerDoctor()" class="stretched-link"></a>
                </div>
            </div>

            <?php foreach ($doctors as $doctor): ?>
                <div class="doctor-card">

                    <div class="card doctor-card-clickable">
                        
                        <div class="card-body doctor-card-body">   
                            <img src="
                                <?php if($doctor['gender']=="male") {
                                    echo base_url('assets/images/doctors/maledoctor.svg');
                                } elseif($doctor['gender']=="female") {
                                    echo base_url('assets/images/doctors/femaledoctor.svg');
                                } else {
                                    echo base_url('assets/images/doctors/doctor.svg');
                                }?>
                            " alt="doctor image">
                            <p><?php echo $doctor['lastname'].' '.$doctor['firstname']?></p>
                        </div>

                        <a href="/doctors/doctorprofile/<?php echo $doctor['doctorID'];?>" class="stretched-link"></a>
                    </div>
                    
                    <div class="doctor-btn-container">
                        <button class="doctor-card-delete">
                            <img src="/assets/images/tasks_page/trash.svg" class="doctor-card-delete-svg" alt="trash image" onclick="delete_doctor(<?php echo $doctor['doctorID']; ?>)">
                        </button>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>


    <div id="model" class="main-modal">
        <div class="doctors-modal-content card main-card">
    
            <h4>Registreer Dokter</h4>
            
            <form class="doctors-modal-form" action="/DoctorsController/register" id="form2" name="form2" onsubmit="return(validate());">
                <div class="doctors-modal-input-label">
                    <label for="firstname">Voornaam</label>
                    <input class="form-control main-input" type="text" id="firstname" name="firstname" placeholder="Voornaam" value="" maxlength="75">
                </div>
                <div class="doctors-modal-input-label">
                    <label for="Achternaam">Achternaam</label>
                    <input class="form-control main-input" type="text" id="Achternaam" name="Achternaam" placeholder="Achternaam" value="" maxlength="75">
                </div>
                <div class="doctors-modal-input-label">
                    <label for="Land">Land</label>
                    <input class="form-control main-input" type="text" id="Land" name="Land" placeholder="Land" value="" maxlength="75">
                </div>
                <div class="doctors-modal-input-label">
                    <label for="Stad">Stad</label>
                    <input class="form-control main-input" type="text" id="Stad" name="Stad" placeholder="Stad" value="" maxlength="75">
                </div>
                <div class="doctors-modal-input-label">
                    <label for="Address">Address</label>
                    <input class="form-control main-input" type="text" id="Address" name="Address" placeholder="Address" value="" maxlength="75">
                </div>
                <div class="doctors-modal-input-label">
                    <label for="phone">Telefoonnummer</label>
                    <input class="form-control main-input" type="tel" id="phone" name="phone" placeholder="Telefoonnummer" value="" maxlength="16">
                </div>
                <div class="doctors-modal-input-label">
                    <label for="Gender">Geslacht</label>
                    <select class="main-input" id='Gender' name='Gender'>
                        <option value='male' >male</option>
                        <option value='female' >female</option>
                        <option value='none of the above'>none of the above</option>
                    </select>
                </div>
                
                <button type="submit" value="submit" class="main-modal-btn doctors-modal-btn">Registreer</button>
            </form>
            
            <button id="submit_model_1" type="submit" class="main-modal-btn doctors-modal-btn" onclick="cancelDoctor()">cancel</button>
        </div>
    </div>

</div>

<script>
    function delete_doctor(no){
        $.post('/DoctorsController/deletedoctor',{id:no})
        window.location.reload();
    }
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