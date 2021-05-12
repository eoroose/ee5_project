
<div>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-12 card profile-col">
                    <h1 ><b>Naam: </b> <span id="firstname" ><?php echo $doctor['firstname']?></span> <span id="lastname"><?php echo ' '.$doctor['lastname'] ?></span>
                        <button class="tasks-btn-edit-save" type="edit" id="editname" onclick="changeName()">
                            <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                        <button class="tasks-btn-edit-save" type="edit" id="savename" onclick="saveName(<?php echo $doctor['doctorID']; ?>)" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                    </h1>
                </div>
                <div class="col-12 card profile-col">
                    <h1><b>Stad: </b> <span id="stad"><?php echo $doctor['city']?></span>
                        <button class="tasks-btn-edit-save" type="edit" id="editStad" onclick="changeStad()">
                            <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                        <button class="tasks-btn-edit-save" type="edit" id="saveStad" onclick="saveStad(<?php echo $doctor['doctorID']; ?>)" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                    </h1>
                </div>
                <div class="col-12 card profile-col">
                    <h1><b>Adres: </b> <span id="addres"><?php echo $doctor['address']?></span>
                        <button class="tasks-btn-edit-save" type="edit" id="editaddres" onclick="changeAddres()">
                            <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                        <button class="tasks-btn-edit-save" type="edit" id="saveaddres" onclick="saveAddres(<?php echo $doctor['doctorID']; ?>)" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                    </h1>
                </div>
                <div class="col-12 card profile-col">
                    <h1><b>Telefoonnummer: </b> <span id="telefoon"><?php echo $doctor['phoneNumber']?></span>
                        <button class="tasks-btn-edit-save" type="edit" id="edittelefoon" onclick="changetelefooon()">
                            <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                        <button class="tasks-btn-edit-save" type="edit" id="savetelefoon" onclick="savetelefoon(<?php echo $doctor['doctorID']; ?>)" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                    </h1>
                </div>
                <div class="col-12 card profile-col">
                    <h1><b>geslacht: </b> <span id="gender"><?php echo $doctor['gender']?></span>
                        <button class="tasks-btn-edit-save" type="edit" id="editgender" onclick="changegender()">
                            <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                        <button class="tasks-btn-edit-save" type="edit" id="savegender" onclick="savegender(<?php echo $doctor['doctorID']; ?>)" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                        </button>
                    </h1>
                </div>
                <div class="col-12 card profile-col">
                    <h1><b>Afspraken: </b></h1>
                    <div>
                        <table>

                        <?php foreach ($appointments as $appointment){?>
                            <tr>
                                <th>date: <span id="<?php echo "date".$appointment['appointmentID']?>"> <?php echo $appointment['date'];?></span> </th>
                                <th>inhabitant: <span id="<?php echo "inhabitant".$appointment['appointmentID']?>"><?php echo $appointment['inhabitant_Firstname'].' '.$appointment['inhabitant_Lastname']?></span></th>
                                        <th>reason: <span id="<?php echo "reason".$appointment['appointmentID']?>"><?php echo $appointment['reason']?></span></th>
                                        <th>
                                            <button class="tasks-btn-edit-save" type="edit" id="<?php echo "editappoint".$appointment['appointmentID']?>" onclick="changeapoint(<?php echo $appointment['appointmentID']?>,<?php echo $appointment['inhabitantID'] ?>)">
                                                <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                                            </button>
                                            <button class="tasks-btn-edit-save" type="edit" id="<?php echo "saveappoint".$appointment['appointmentID']?>" onclick="saveapoint(<?php echo $appointment['appointmentID']?>)" style="display: none">
                                                <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="edit image" height="50px" width="50px">
                                            </button>
                                        </th>
                            </tr>
                        <?php } ?>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div id="inhabitantModel" class="main-modal" style="display:block;">
    <div class="main-avatar-modal-content card main-card">
        <h4>Kies Avatar</h4>
        <div class="row main-avatar-modal-row">
            <?php foreach ($inhabitants as $row) { ?>
                    <input type="hidden" id='appointValue' value="">
                <div class="col-sm card main-avatar-modal-card">
                    <img src="<?php echo base_url($row['location']);?>" class="card-img-top main-avatar-modal-img" alt="user image">
                    <p> <?php echo $row['firstname'].' '.$row['lastname']?></p>
                    <a onclick="submitInhabitant(<?php $row['inhabitantID'] ?>)" class="stretched-link"></a>
                </div>
                <div class="col-sm card main-avatar-modal-card-separator"></div>
            <?php }?>
        </div>
        <button type="submit" class="main-modal-btn" onclick="cancelInhabitant()">cancel</button>
    </div>
</div>


<script>
    function chooseInhabitant(no){
        document.querySelector('#inhabitantModel').style.display = 'block';

    }
    function cancelInhabitant(){
        document.querySelector('#inhabitantModel').style.display = 'none';
    }
    function submitInhabitant(no){
        document.querySelector('#inhabitantModel').style.display = 'none';
        var procesID=document.getElementById('appointValue').value;
        $.post('/DoctorsController/editAppoint',{id:procedID,inhabitantID:no})
    }
    function changeapoint(no,id){
        document.getElementById("editappoint"+no).style.display="none";
        document.getElementById("saveappoint"+no).style.display="block";

        var date=document.getElementById("date"+no);
        var reason=document.getElementById("reason"+no);
        var inhabitant=document.getElementById("inhabitant"+no);

        var date_data=date.innerHTML;
        var reason_data=reason.innerHTML;
        var inhabitant_data=inhabitant.innerHTML;

        date.innerHTML="<input type='datetime-local' id='phase_text"+no+"' value='"+date_data+"'>";
        reason.innerHTML="<input type='text' id='description_text"+no+"' value='"+reason_data+"' style='width: 90%;border-radius: 10px;'>";
        inhabitant.innerHTML="<button id='chooseInhabitant' value='"+inhabitant_data+"' onclick='chooseInhabitant()'></button>";
        document.getElementById('chooseInhabitant').innerHTML=inhabitant_data;
        document.getElementById('appointValue').value=no;
    }
    function saveapoint(no){
        document.getElementById("editappoint"+no).style.display="block";
        document.getElementById("saveappoint"+no).style.display="none";
    }
    function changegender(){
        document.getElementById("editgender").style.display="none";
        document.getElementById("savegender").style.display="block";
        var phase=document.getElementById("gender");

        var phase_data=phase.innerHTML;

        if(phase_data=='male') {
            phase.innerHTML = "<select id='Gender' name='Gender'> <option value='male'selected='selected' >male</option><option value='female' >female</option> <option value='none of the above'>none of the above</option></select>";
        }
        else{
            if(phase_data=='female'){
                phase.innerHTML = "<select id='Gender' name='Gender'> <option value='male' >male</option><option value='female' selected='selected'>female</option> <option value='none of the above'>none of the above</option></select>";

            }
            else{
                phase.innerHTML = "<select id='Gender' name='Gender'> <option value='male' >male</option><option value='female' selected='selected'>female</option> <option value='none of the above' selected='selected'>none of the above</option></select>";

            }
        }
        }
    function savegender(no){
        document.getElementById("editgender").style.display="block";
        document.getElementById("savegender").style.display="none";

        var phase_val=document.getElementById("Gender").value;

        document.getElementById("gender").innerHTML=phase_val;

        $.post('/DoctorsController/editgender',{id:no,gender:phase_val})
    }
    function changetelefooon(){
        document.getElementById("edittelefoon").style.display="none";
        document.getElementById("savetelefoon").style.display="block";

        var phase=document.getElementById("telefoon");

        var phase_data=phase.innerHTML;


        phase.innerHTML="<input type='tel' id='Telefoon' value='"+phase_data+"'>";
    }
    function savetelefoon(no){
        document.getElementById("edittelefoon").style.display="block";
        document.getElementById("savetelefoon").style.display="none";

        var phase_val=document.getElementById("Telefoon").value;

        document.getElementById("telefoon").innerHTML=phase_val;

        $.post('/DoctorsController/edittelefoon',{id:no,telefoon:phase_val})
    }
    function changeName(){
        document.getElementById("editname").style.display="none";
        document.getElementById("savename").style.display="block";

        var phase=document.getElementById("firstname");
        var lastname=document.getElementById("lastname");

        var phase_data=phase.innerHTML;
        var lastname_data=lastname.innerHTML;


        phase.innerHTML="<input type='text' id='firstName' value='"+phase_data+"'>";
        lastname.innerHTML="<input type='text' id='lastName' value='"+lastname_data+"'>";
    }
    function saveName(no){
        var phase_val=document.getElementById("firstName").value;
        var description_val=document.getElementById("lastName").value;

        document.getElementById("firstname").innerHTML=phase_val;
        document.getElementById("lastname").innerHTML=description_val;

        document.getElementById("editname").style.display="block";
        document.getElementById("savename").style.display="none";

        $.post('/DoctorsController/editname',{id:no,firstname:phase_val,lastname:description_val})
    }
    function changeStad(){
        document.getElementById("editStad").style.display="none";
        document.getElementById("saveStad").style.display="block";

        var phase=document.getElementById("stad");

        var phase_data=phase.innerHTML;


        phase.innerHTML="<input type='text' id='Stad' value='"+phase_data+"'>";

    }
    function saveStad(no){
        var phase_val=document.getElementById("Stad").value;

        document.getElementById("stad").innerHTML=phase_val;

        document.getElementById("editStad").style.display="block";
        document.getElementById("saveStad").style.display="none";

        $.post('/DoctorsController/editstad',{id:no,stad:phase_val})
    }
    function changeAddres(){
        document.getElementById("editaddres").style.display="none";
        document.getElementById("saveaddres").style.display="block";

        var phase=document.getElementById("addres");

        var phase_data=phase.innerHTML;


        phase.innerHTML="<input type='text' id='Addres' value='"+phase_data+"'>";
    }
    function saveAddres(no){
        var phase_val=document.getElementById("Addres").value;

        document.getElementById("addres").innerHTML=phase_val;

        document.getElementById("editaddres").style.display="block";
        document.getElementById("saveaddres").style.display="none";

        $.post('/DoctorsController/editaddres',{id:no,addres:phase_val})
    }
</script>
