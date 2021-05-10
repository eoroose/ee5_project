    <script src='C:\xampp\htdocs\ee5_project\public\assets\scripts\jquery-3.6.0.min.js'></script>

    <button onclick=""> Archive user </button>
    <table style="width:100%">

        <?php foreach ($inhabitant as $i): ?>

        <tr>
            <th>Avatar:</th>
            <td><img src="<?php echo $i->location;?>"></td>
        </tr>

        <tr>
            <th>Username:</th>
            <td id="<?php echo "username".$i->username?>"><?php echo $i->username; ?></td>
            <td>
                <div class="username-edit-save-container">
                    <button class="username-btn-edit-save" type="edit" id="<?php echo "edit".$i->username?>" onclick="edit_username('<?php echo $i->username?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="username-btn-edit-save" type="save" id="<?php echo "save".$i->username?>" onclick="save_username('<?php echo $i->username?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <th>First Name:</th>
            <td id="<?php echo "firstname".$i->firstname?>"><?php echo $i->firstname; ?></td>
            <td>
                <div class="firstname-edit-save-container">
                    <button class="firstname-btn-edit-save" type="edit" id="<?php echo "edit".$i->firstname?>" onclick="edit_firstname('<?php echo $i->firstname?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="firstname-btn-edit-save" type="save" id="<?php echo "save".$i->firstname?>" onclick="save_firstname('<?php echo $i->firstname?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <th>Last Name:</th>
            <td id="<?php echo "lastname".$i->lastname?>"><?php echo $i->lastname; ?></td>
            <td>
                <div class="lastname-edit-save-container">
                    <button class="lastname-btn-edit-save" type="edit" id="<?php echo "edit".$i->lastname?>" onclick="edit_lastname('<?php echo $i->lastname?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="lastname-btn-edit-save" type="save" id="<?php echo "save".$i->lastname?>" onclick="save_lastname('<?php echo $i->lastname?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <th>Birthday:</th>
            <td id="<?php echo "birthday".$i->birthday?>"><?php echo $i->birthday; ?></td>
            <td>
                <div class="birthday-edit-save-container">
                    <button class="birthday-btn-edit-save" type="edit" id="<?php echo "edit".$i->birthday?>" onclick="edit_birthday('<?php echo $i->birthday?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="birthday-btn-edit-save" type="save" id="<?php echo "save".$i->birthday?>" onclick="save_birthday('<?php echo $i->birthday?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <th>Date of first arrival:</th>
            <td id="<?php echo "dateAdded".$i->dateAdded?>"><?php echo $i->dateAdded; ?></td>
            <td>
                <div class="dateAdded-edit-save-container">
                    <button class="dateAdded-btn-edit-save" type="edit" id="<?php echo "edit".$i->dateAdded?>" onclick="edit_dateAdded('<?php echo $i->dateAdded?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="dateAdded-btn-edit-save" type="save" id="<?php echo "save".$i->dateAdded?>" onclick="save_dateAdded('<?php echo $i->dateAdded?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <th>Date of latest arrival:</th>
            <td id="<?php echo "arrivalDate".$i->arrivalDate?>"><?php echo $i->arrivalDate; ?></td>
            <td>
                <div class="arrivalDate-edit-save-container">
                    <button class="arrivalDate-btn-edit-save" type="edit" id="<?php echo "edit".$i->arrivalDate?>" onclick="edit_arrivalDate('<?php echo $i->arrivalDate?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="arrivalDate-btn-edit-save" type="save" id="<?php echo "save".$i->arrivalDate?>" onclick="save_arrivalDate('<?php echo $i->arrivalDate?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <tr>
            <th>Date of departure:</th>
            <td id="<?php echo "departureDate".$i->departureDate?>"><?php echo $i->departureDate; ?></td>
            <td>
                <div class="departureDate-edit-save-container">
                    <button class="departureDate-btn-edit-save" type="edit" id="<?php echo "edit".$i->departureDate?>" onclick="edit_departureDate('<?php echo $i->departureDate?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="departureDate-btn-edit-save" type="save" id="<?php echo "save".$i->departureDate?>" onclick="save_departureDate('<?php echo $i->departureDate?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
        </tr>

        <?php endforeach; ?>

        <tr>
            <th>Chore:</th>
            <?php foreach ($chore as $c): ?>
            <td id="<?php echo "chore".$c->description?>"><?php echo $c->description ?></td>
            <td>
                <div class="chore-edit-save-container">
                    <button class="chore-btn-edit-save" type="edit" id="<?php echo "edit".$c->description?>" onclick="edit_chore('<?php echo $c->description?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="chore-btn-edit-save" type="save" id="<?php echo "save".$c->description?>" onclick="save_chore('<?php echo $c->description?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
            <?php endforeach; ?>
        </tr>

        <tr>
            <th>Doctors Appointments:</th>
            <?php foreach ($appointments as $a): ?>
            <div>
            <td>
                <p id="<?php echo "firstnameDoctor".$a->appointmentID?>"><?php echo $a->firstname; ?> </p>
                <p id="<?php echo "lastnameDoctor".$a->appointmentID?>"><?php echo $a->lastname ?>: </p>
                <p id="<?php echo "date".$a->appointmentID?>"><?php echo $a->date ?> - </p>
                <p id="<?php echo "reason".$a->appointmentID?>"><?php echo $a->reason ?> </p>
            </td>
            <td>
                <div class="app-edit-save-container">
                    <button class="app-btn-edit-save" type="edit" id="<?php echo "edit".$a->appointmentID?>" onclick="edit_appointments('<?php echo $a->appointmentID?>')" style="display: block">
                        <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                    </button>

                    <button class="app-btn-edit-save" type="save" id="<?php echo "save".$a->appointmentID?>" onclick="save_appointments('<?php echo $a->appointmentID?>')" style="display: none">
                        <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                    </button>
                </div>
            </td>
            <td>
                <button class="app-btn-delete" type="button" id="<?php echo "delete".$a->appointmentID?>" onclick="delete_appointment('<?php echo $a->appointmentID?>')" style="display: block">
                    <img src="/assets/images/tasks_page/trash.svg" class="tasks-btn-svg" alt="trash image">
                </button>
            </td>
            </div>
            <?php endforeach; ?>
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

<script>
        function edit_username(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var username=document.getElementById("username"+no);
            var username_data=username.innerHTML;

            username.innerHTML="<input type='text' id='username_text"+no+"' value='"+username_data+"' style='width: 90%;border-radius: 10px;'>";
        }

        function save_username(no)
        {
            var username_val=document.getElementById("username_text"+no).value;

            document.getElementById("username"+no).innerHTML=username_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setUsername', {id:<?php echo $userID; ?>, username:username_val})
        }

        function edit_firstname(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var firstname=document.getElementById("firstname"+no);
            var firstname_data=firstname.innerHTML;

            firstname.innerHTML="<input type='text' id='firstname_text"+no+"' value='"+firstname_data+"' style='width: 90%;border-radius: 10px;'>";
        }


        function save_firstname(no)
        {
            var firstname_val=document.getElementById("firstname_text"+no).value;

            document.getElementById("firstname"+no).innerHTML=firstname_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setFirstname', {id:<?php echo $userID; ?>, firstname:firstname_val})
        }

        function edit_lastname(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var lastname=document.getElementById("lastname"+no);
            var lastname_data=lastname.innerHTML;

            lastname.innerHTML="<input type='text' id='lastname_text"+no+"' value='"+lastname_data+"' style='width: 90%;border-radius: 10px;'>";
        }


        function save_lastname(no)
        {
            var lastname_val=document.getElementById("lastname_text"+no).value;

            document.getElementById("lastname"+no).innerHTML=lastname_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setLastname', {id:<?php echo $userID; ?>, lastname:lastname_val})
        }

        function edit_birthday(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var birthday=document.getElementById("birthday"+no);
            var birthday_data=birthday.innerHTML;

            birthday.innerHTML="<input type='date' id='birthday_text"+no+"' value='"+birthday_data+"' style='width: 90%;border-radius: 10px;'>";
        }


        function save_birthday(no)
        {
            var birthday_val=document.getElementById("birthday_text"+no).value;

            document.getElementById("birthday"+no).innerHTML=birthday_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setBirthday', {id:<?php echo $userID; ?>, birthday:birthday_val})
        }


        function edit_dateAdded(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var dateAdded=document.getElementById("dateAdded"+no);
            var dateAdded_data=dateAdded.innerHTML;

            dateAdded.innerHTML="<input type='date' id='dateAdded_text"+no+"' value='"+dateAdded_data+"' style='width: 90%;border-radius: 10px;'>";
        }

        function save_dateAdded(no)
        {
            var dateAdded_val=document.getElementById("dateAdded_text"+no).value;

            document.getElementById("dateAdded"+no).innerHTML=dateAdded_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setDateAdded', {id:<?php echo $userID; ?>, dateAdded:dateAdded_val})
        }


        function edit_arrivalDate(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var arrivalDate=document.getElementById("arrivalDate"+no);
            var arrivalDate_data=arrivalDate.innerHTML;

            arrivalDate.innerHTML="<input type='date' id='arrivalDate_text"+no+"' value='"+arrivalDate_data+"' style='width: 90%;border-radius: 10px;'>";
        }

        function save_arrivalDate(no)
        {
            var arrivalDate_val=document.getElementById("arrivalDate_text"+no).value;

            document.getElementById("arrivalDate"+no).innerHTML=arrivalDate_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setArrivalDate', {id:<?php echo $userID; ?>, arrivalDate:arrivalDate_val})
        }


        function edit_departureDate(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var departureDate=document.getElementById("departureDate"+no);
            var departureDate_data=departureDate.innerHTML;

            departureDate.innerHTML="<input type='date' id='departureDate_text"+no+"' value='"+departureDate_data+"' style='width: 90%;border-radius: 10px;'>";
        }

        function save_departureDate(no)
        {
            var departureDate_val=document.getElementById("departureDate_text"+no).value;

            document.getElementById("departureDate"+no).innerHTML=departureDate_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setDepartureDate', {id:<?php echo $userID; ?>, departureDate:departureDate_val})
        }


        function edit_chore(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var chore=document.getElementById("chore"+no);
            var chore_data=chore.innerHTML;

            chore.innerHTML='<form id="chore_text">'+
                            '<input type="radio" id="Not Assigned" name="chore" value="Not Assigned"> '+
                            '<label for="Not Assigned">Not Assigned</label>'+
                            '<input type="radio" id="Household" name="chore" value="Household"> '+
                            '<label for="Household">Household</label>'+
                            '<input type="radio" id="Kitchen" name="chore" value="Kitchen"> '+
                            '<label for="Kitchen">Kitchen</label>'+
                            '<input type="radio" id="Weekday Responsible" name="chore" value="Weekday Responsible"> '+
                            '<label for="Weekday Responsible">Weekday Responsible</label>'+
                            '<input type="radio" id="Weekend Responsible" name="chore" value="Weekend Responsible"> '+
                            '<label for="Weekend Responsible">Weekend Responsible</label></form>';
        }

        function save_chore(no)
        {
            const rbs = document.querySelectorAll('input[name="chore"]');
            let selectedValue;
            for (const rb of rbs) {
                if (rb.checked) {
                    selectedValue = rb.value;
                    break;
                }
            }

            var chore_val=selectedValue;

            document.getElementById("chore"+no).innerHTML=chore_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setChore', {id:<?php echo $userID; ?>, chore:chore_val})
        }

        function edit_appointments(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var firstnameDoctor=document.getElementById("firstnameDoctor"+no);
            var lastnameDoctor=document.getElementById("lastnameDoctor"+no);
            var date=document.getElementById("date"+no);
            var reason=document.getElementById("reason"+no);

            var firstnameDoctor_data=firstnameDoctor.innerHTML;
            var lastnameDoctor_data=lastnameDoctor.innerHTML;
            var date_data=date.innerHTML;
            var reason_data=reason.innerHTML;

            firstnameDoctor.innerHTML="<input type='text' id='firstnameDoctor_text"+no+"' value='"+firstnameDoctor_data+"'> ";
            lastnameDoctor.innerHTML="<input type='text' id='lastnameDoctor_text"+no+"' value='"+lastnameDoctor_data+"'> ";
            date.innerHTML="<input type='datetime-local' id='date_text"+no+"' value='"+date_data+"'> ";
            reason.innerHTML="<input type='text' id='reason_text"+no+"' value='"+reason_data+"'> ";
        }

        function save_appointments(no)
        {
            var firstnameDoctor_val=document.getElementById("firstnameDoctor_text"+no).value;
            var lastnameDoctor_val = document.getElementById("lastnameDoctor_text"+no).value;
            var date_val = document.getElementById("date_text"+no).value;
            var reason_val = document.getElementById("reason_text"+no).value;

            document.getElementById("firstnameDoctor"+no).innerHTML=firstnameDoctor_val;
            document.getElementById("lastnameDoctor"+no).innerHTML=lastnameDoctor_val;
            document.getElementById("date"+no).innerHTML=date_val;
            document.getElementById("reason"+no).innerHTML=reason_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            <?php $userID = htmlspecialchars($_GET["user"]); ?>

            $.post('/UsersController/setAppointment', {id:<?php echo $userID; ?>, firstnameDoctor:firstnameDoctor_val, lastnameDoctor:lastnameDoctor_val, date:date_val, reason:reason_val})
        }

</script>
