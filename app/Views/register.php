<?php
$current_date=date('Y-m-d');
$date_doctor_1=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 8, date('Y')));
$date_doctor_2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 22, date('Y')));
$date_halfway=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 21, date('Y')));


?>
    <div class="container">
     <div class="row"">
         <div class="col-12 col-sm-8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 form-wrapper" style="background-color: #81A2AC;">
            <div class="container">
                <h3>Register</h3>
                <hr>
                <form action="">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Activeer vorige bewonner</button>
                    </div>
                </form>
                <hr>
                <form class="" action="/register" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname">Voornaam</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Achternaam</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username">Gebruikersnaam</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                            </div>
                        </div>
                       <div class="col-12 col-sm-6">
                           <div class="form-group pt-3 ">
                               <label for="password">Passwoord</label>
                               <input type="password" class="form-control" name="password" id="password" value="">
                           </div>
                       </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group pt-3 ">
                                <label for="password_confirm">Bevestig passwoord</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group pt-3 ">
                                <label for="birthday">Verjaardag</label>
                                <input type="date" class="form-control" name="birthday" id="birthday">
                            </div>
                        </div>
                       <div class="col-12 col-sm-6">
                           <div class="form-group pt-3">
                               <label for="gender">Geslacht</label>
                               <select class="form-control" id="gender" name="gender">
                                   <option value="male" >male</option>
                                   <option value="female" selected="selected">female</option>
                                   <option value="none of the above">none of the above</option>
                               </select>
                           </div>
                       </div>
                        <!-- deze functie test of je een employee of admin wilt aanmaken-->
                        <div style="padding-top: .5em">
                            <label for="inhabitantemployee">Wil je een medewerker of een inwonner aanmaken </label>
                            <select class="form-control" id="inhabitantemployee" name="inhabitantemployee">
                                <option value="1" >employee</option>
                                <option value="2">inhabitant</option>
                                <option value="3">admin</option>
                            </select>
                        </div>

                        <div class="form-group" id="otherFieldDiv">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group pt-3 ">
                                        <label for="arrival_data">Datum aankomst</label>
                                        <input type="date" class="form-control" name="arrival_data" id="arrival_data" value="<?php echo $current_date ?>">
                                    </div>
                                </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group pt-3 ">
                                    <label for="docter_appointment1">Datum 1ste dokters afspraak</label>
                                    <input type="date" class="form-control" name="docter_appointment1" id="docter_appointment1" value="<?php echo $date_doctor_1 ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group pt-3 ">
                                    <label for="docter_appointment2">Datum 2de dokters afspraak</label>
                                    <input type="date" class="form-control" name="docter_appointment2" id="docter_appointment2" value="<?php echo $date_doctor_2 ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group pt-3 ">
                                    <label for="doctor">Doktor</label>
                                    <select class="form-control" id="doctor" name="doctor">
                                    <?php foreach($doctors as $row)
                                    { ?>
                                        <option value="<?php echo $row['doctorID']; ?>"><?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?></option>';
                                    <?php }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group pt-3 ">
                                    <label for="halfway_assignement">Datum halfweg opdracht</label>
                                    <input type="date" class="form-control" name="halfway_assignement" id="halfway_assignement" value="<?php echo $date_halfway ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group pt-3 ">
                                    <label for="godfather">peter</label>
                                    <select class="form-control" id="godfather" name="godfather">
                                        <?php foreach($godfathers as $row)
                                        { ?>
                                            <option value="<?php echo $row['inhabitantID']; ?>"><?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?></option>';
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                        <?php if (isset($validation)):?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="row pt-3 ">
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-primary">register</button>
                            </div>
                        </div>

                </form>
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


</script>

<noscript>Sorry, your browser does not support JavaScript!</noscript>

