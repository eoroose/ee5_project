<div>
    <link href="./assets/css/register.css" rel="stylesheet" type="text/css" />
    <?php
        $current_date=date('Y-m-d');
        $date_doctor_1=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 8, date('Y')));
        $date_doctor_2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 22, date('Y')));
        $date_halfway=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 21, date('Y')));
    ?>

    <div class="container register-container">
        <div class="row register-row main-bottom-padding">
            <div class="col-md card main-card">

                <h3 class="main-title register-title">Register</h3>

                <div class="register-top-btn-container">
                    <hr class="register-hr">
                       <form action="archivedInhabitantsPage">
                           <button class="main-btn register-btn" >Activeer vorige bewonner</button>
                       </form>
                    <hr class="register-hr">
                </div>

                <div class="register-form-container">
                    <form class="" action="/register" method="post">
                        <div class="row register-form-row">

                            <!-- FIRSTNAME & LASTNAME -->
                            <div class="col-sm-6">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="firstname">Voornaam</label>
                                    <input type="text" class="form-control main-input register-input" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="lastname">Achternaam</label>
                                    <input type="text" class="form-control main-input register-input" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
                                </div>
                            </div>

                            <!-- USERNAME -->
                            <div class="col-md-12">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="username">Gebruikersnaam</label>
                                    <input type="text" class="form-control main-input register-input" name="username" id="username" value="<?= set_value('username') ?>">
                                </div>
                            </div>

                            <!-- PASSWORD & CONFIRM PASSWORD -->
                            <div class="col-sm-6">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="password">Paswoord</label>
                                    <input type="password" class="form-control main-input register-input" name="password" id="password" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="password_confirm">Bevestig paswoord</label>
                                    <input type="password" class="form-control main-input register-input" name="password_confirm" id="password_confirm" value="">
                                </div>
                            </div>

                            <!-- BIRTHDAY & GENDER -->
                            <div class="col-sm-6">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="birthday">Verjaardag</label>
                                    <input type="date" class="form-control main-input register-input" name="birthday" id="birthday">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="gender">Geslacht</label>
                                    <select class="form-control main-input register-input" id="gender" name="gender">
                                        <option value="male" >male</option>
                                        <option value="female" selected="selected">female</option>
                                        <option value="none of the above">none of the above</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Choose Avatar -->
                            <input type="hidden" id="avatar" name="avatar" value="">
                            <div class="col-md-12 card register-avatar-card">
                                <img src="" class="card-img-top register-avatar-img" id="avatarImg" alt="user image">
                                <div class="card-body register-avatar-card-body">
                                    <h5 class="card-title register-avatar-title"style="text-align: center">Choose Avatar</h5>
                                    <a onclick="chooseAvatar()" class="stretched-link"></a>
                                </div>
                            </div>

                            <!-- ROLE -->
                            <div class="col-md-12">
                                <div class="form-group register-input-container">
                                    <label class="register-input-label" for="inhabitantemployee">Wil je een medewerker of een inwonner aanmaken </label>
                                    <select class="form-control main-input register-input" id="inhabitantemployee" name="inhabitantemployee">
                                        <option value="1" >employee</option>
                                        <option value="2">inhabitant</option>
                                        <option value="3">admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="otherFieldDiv">
                                <div class="row register-form-row">

                                    <!-- ARRIVAL DATE & DOCTOR -->

                                    <div class="col-sm-6">
                                        <div class="form-group register-input-container">
                                            <label class="register-input-label" for="arrival_data">Datum aankomst</label>
                                            <input type="date" class="form-control main-input register-input" name="arrival_data" id="arrival_data" value="<?php echo $current_date ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group register-input-container">
                                            <label class="register-input-label" for="doctor">Doktor</label>
                                            <select class="form-control main-input register-input" id="doctor" name="doctor">
                                                <?php foreach($doctors as $row) { ?>
                                                    <option value="<?php echo $row['doctorID']; ?>"><?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?></option>;
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- FIRST & SECOND DOCTORS APPOINTMENT -->
                                    <div class="col-sm-6">
                                        <div class="form-group register-input-container">
                                            <label class="register-input-label" for="docter_appointment1">Datum 1ste dokters afspraak</label>
                                            <input type="date" class="form-control main-input register-input" name="docter_appointment1" id="docter_appointment1" value="<?php echo $date_doctor_1 ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group register-input-container">
                                            <label class="register-input-label" for="docter_appointment2">Datum 2de dokters afspraak</label>
                                            <input type="date" class="form-control main-input register-input" name="docter_appointment2" id="docter_appointment2" value="<?php echo $date_doctor_2 ?>">
                                        </div>
                                    </div>
                                    
                                    <!-- HALFWAY ASSIGNMENT & GODPARENT -->
                                    <div class="col-sm-6">
                                        <div class="form-group register-input-container">
                                            <label class="register-input-label" for="halfway_assignement">Datum halfweg opdracht</label>
                                            <input type="date" class="form-control main-input register-input" name="halfway_assignement" id="halfway_assignement" value="<?php echo $date_halfway ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group register-input-container">
                                            <label class="register-input-label" for="godfather">Peter</label>
                                            <select class="form-control main-input register-input" id="godfather" name="godfather">
                                                <?php foreach($godfathers as $row) { ?>
                                                    <option value="<?php echo $row['inhabitantID']; ?>"><?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?></option>;
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php if (isset($validation)):?>
                            <div class="col-12">
                                <div class="alert alert-danger main-alert-message register-alert-message" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif;?>

                        <div class="register-bottom-btn-container">
                            <hr class="register-hr">
                            <button type="submit" class="main-btn register-btn register-last-btn">Register</button>
                        </div>
                    
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL FOR AVATAR SELECTION -->
    <div id="avatarModal" class="main-modal">
        <div class="main-avatar-modal-content card main-card">
            <h4>Kies Avatar</h4>
            <div class="row main-avatar-modal-row">
                <?php foreach ($avatars as $row) { ?>
                    <div class="col-sm card main-avatar-modal-card">
                        <img src="<?php echo $row['location'];?>" class="card-img-top main-avatar-modal-img" alt="user image">
                        <a onclick="submitAvatar('<?php echo $row['id'];?>','<?php echo $row['location'];?>')" class="stretched-link"></a>
                    </div>
                    <div class="col-sm card main-avatar-modal-card-separator"></div>
                <?php }?>
            </div>
            <button type="submit" class="main-modal-btn" onclick="cancelAvatar()">cancel</button>
        </div>
    </div>

</div>


<script>
    $("#inhabitantemployee").change(function() {
        if ($(this).val() == "2") {
            $('#otherFieldDiv').show();
        } else {
            $('#otherFieldDiv').hide();
        }
    });
    $("#inhabitantemployee").trigger("change");
    function chooseAvatar(){
        document.querySelector('#avatarModal').style.display = 'block';
    }


    function cancelAvatar()
    {
        document.querySelector('#avatarModal').style.display = 'none';
    }
    function submitAvatar(id,pad)
    {
        var r= confirm("Weet je zeker dat je deze wilt?");
        if(r==true)
        {
            document.getElementById("avatar").value=id;
            document.getElementById("avatarImg").src=pad;
            document.getElementById("avatarImg").style.display='block';
            document.querySelector('#avatarModal').style.display = 'none';
        }

    }

</script>

<noscript>Sorry, your browser does not support JavaScript!</noscript>

