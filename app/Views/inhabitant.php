<div>
    <script src='C:\xampp\htdocs\ee5_project\public\assets\scripts\jquery-3.6.0.min.js'></script>
    <link href="/assets/css/inhabitant.css" rel="stylesheet" type="text/css" />

    <div class="container inhabitant-container main-bottom-padding">

        <div class="card inhabitant-back-arrow">
            <img src="/assets/images/doctors/back-arrow.svg" class="card-img-top" alt="back-arrow image">
            <?php if(session()->get('role')=='admin'): ?>
                <a href="/users" class="stretched-link"></a>
            <?php else: ?>
                <a href="/inhabitants" class="stretched-link"></a>
            <?php endif; ?>
        </div>

        <div class="row inhabitant-row card main-card">

            <!-- AVATAR -->
            <?php foreach ($inhabitant as $i): ?>
                <div class="col-12 card inhabitant-avatar-col">
                    <img src="<?php echo $i->location;?>">
                </div>
            <?php endforeach; ?>

            <!-- ARCHIVE -->
            <?php foreach ($isActive as $iA): ?>
                <div class="col-12 card inhabitant-col">
                    <?php if($iA->isActive == 1): ?>
                        <button class="main-btn inhabitant-archive-btn" onclick="archive_user()"> archiveer bewoner </button>
                    <?php elseif($iA->isActive == 0): ?>
                        <button class="main-btn inhabitant-archive-btn" onclick="dearchive_user()"> de-archiveer bewoner </button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="row inhabitant-row card main-card">
            <?php foreach ($inhabitant as $i): ?>

                <!-- USERNAME -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Gebruikersnaam: </b>
                        <span id="<?php echo "username".$i->username?>"><?php echo $i->username; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->username?>" onclick="edit_username('<?php echo $i->username?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->username?>" onclick="save_username('<?php echo $i->username?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- FIRST NAME -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Voornaam: </b>
                        <span id="<?php echo "firstname".$i->firstname?>"><?php echo $i->firstname; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->firstname?>" onclick="edit_firstname('<?php echo $i->firstname?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->firstname?>" onclick="save_firstname('<?php echo $i->firstname?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- LAST NAME -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Achternaam: </b>
                        <span id="<?php echo "lastname".$i->lastname?>"><?php echo $i->lastname; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->lastname?>" onclick="edit_lastname('<?php echo $i->lastname?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->lastname?>" onclick="save_lastname('<?php echo $i->lastname?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- BIRTHDAY -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Verjaardag: </b>
                        <span id="<?php echo "birthday".$i->birthday?>"><?php echo $i->birthday; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->birthday?>" onclick="edit_birthday('<?php echo $i->birthday?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->birthday?>" onclick="save_birthday('<?php echo $i->birthday?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- GENDER -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Geslacht: </b>
                        <span id="<?php echo "gender".$i->gender?>"><?php echo $i->gender; ?> </span>
                        <form id="<?php echo "genderForm".$i->gender?>" style="display:none">

                            <select class='form-control main-input inhabitant-input' id="genderForm">
                                <option value="man">man</option>;
                                <option value="vrouw">vrouw</option>;
                                <option value="geen van bovenstaande">geen van bovenstaande</option>;
                            </select>
                        </form>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->gender?>" onclick="edit_gender('<?php echo $i->gender?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->gender?>" onclick="save_gender('<?php echo $i->gender?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- DATE ADDED -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Datum van eerste aankomst: </b>
                        <span id="<?php echo "dateAdded".$i->dateAdded?>"><?php echo $i->dateAdded; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->dateAdded?>" onclick="edit_dateAdded('<?php echo $i->dateAdded?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->dateAdded?>" onclick="save_dateAdded('<?php echo $i->dateAdded?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- ARRIVAL DATE -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Datum van laatste aankomst: </b>
                        <span id="<?php echo "arrivalDate".$i->arrivalDate?>"><?php echo $i->arrivalDate; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->arrivalDate?>" onclick="edit_arrivalDate('<?php echo $i->arrivalDate?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->arrivalDate?>" onclick="save_arrivalDate('<?php echo $i->arrivalDate?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

                <!-- DEPARTURE DATE -->
                <div class="col-12 inhabitant-col">
                    <h2><b>Datum van laatste vertrek: </b>
                        <span id="<?php echo "departureDate".$i->departureDate?>"><?php echo $i->departureDate; ?> </span>
                    </h2>
                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$i->departureDate?>" onclick="edit_departureDate('<?php echo $i->departureDate?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$i->departureDate?>" onclick="save_departureDate('<?php echo $i->departureDate?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>

            <!-- GODPARENT -->
            <?php foreach ($godparent as $g): ?>
                <div class="col-12 inhabitant-col">
                    <h2><b>Peetouder: </b>
                        <span id="<?php echo "firstnameGodp".$g->godparentID?>"><?php echo $g->firstname; ?> </span>
                        <span id="<?php echo "lastnameGodp".$g->godparentID?>"><?php echo $g->lastname; ?> </span>

                        <form id="<?php echo "godparentForm".$g->godparentID?>" style="display:none">
                            
                            <select class='form-control main-input inhabitant-input' id="godparent">
                                <?php foreach($inhabitants as $row): ?>
                                    <option value="<?php echo $row->inhabitantID; ?>"><?php echo $row->firstname;?>  <?php echo $row->lastname; ?></option>;
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </h2>

                    <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save btn-smaller" type="edit" id="<?php echo "edit".$g->godparentID?>" onclick="edit_godparent('<?php echo $g->godparentID?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg svg-smaller" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save btn-smaller" type="save" id="<?php echo "save".$g->godparentID?>" onclick="save_godparent('<?php echo $g->godparentID?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg svg-smaller" alt="save image">
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <!-- CHORE -->
            <?php foreach ($chore as $c): ?>
                <div class="col-12 inhabitant-col">
                    <h2><b>Klusje: </b>
                        <span id="<?php echo "chore".$c->description?>"><?php echo $c->description ?> </span>
                    </h2>

                    <!-- <div class="inhabitant-edit-save-container">
                        <button class="inhabitant-btn-edit-save" type="edit" id="</?php echo "edit".$c->description?>" onclick="edit_chore('</?php echo $c->description?>')">
                            <img src="/assets/images/tasks_page/edit.svg" class="inhabitant-btn-svg" alt="edit image">
                        </button>
                        <button class="inhabitant-btn-edit-save" type="save" id="</?php echo "save".$c->description?>" onclick="save_chore('</?php echo $c->description?>')" style="display: none">
                            <img src="/assets/images/tasks_page/save.svg" class="inhabitant-btn-svg" alt="save image">
                        </button>
                    </div> -->
                </div>
            <?php endforeach; ?>

            <!-- PASSWORD -->
            <?php if(!empty($password)): ?>
                <?php foreach($password as $p): ?>
                    <div class="col-12 card inhabitant-col">
                        <button type="button" class="main-btn inhabitant-password-btn" onclick="showCangePasword()" id="changeP">wijzig wachtwoord</button>
                        <?php if (isset($validation)): ?>
                            <div class="main-alert-message inhabitant-alert-message">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>

                                                <?php if (isset($alert)): ?>
                                                    <div class="main-alert-message inhabitant-alert-message">
                                                        <div class="alert alert-danger" role="alert">
                                                            <?= $alert ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                        <div id="otherFieldDiv" style="display: none">
                            <form class="" action="/UsersController/changePassword" method="post">
                                <input type="hidden" id="userID" name="userID" value="<?php echo $i->userID?>">
                                <input type="password" class="form-control main-input inhabitant-password-input" name="new-password" id="new-password" value="" placeholder="nieuw wachtwoord">
                                <input type="password" class="form-control main-input inhabitant-password-input" name="confirm-password" id="confirm-password" value="" placeholder="bevestig nieuw wachtwoord">
                                <button type="submit" class="main-btn inhabitant-password-btn">wijzig wachtwoord</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
        </div>
        
        <!-- APPOINTMENTS -->
        <div class="row inhabitant-row card main-card">
            <h1 class="col-12 card inhabitant-appointment-title"><b>Doktersafspraken:</b></h1>
            
            <?php if(count($appointments) > 0): ?>
                <?php foreach ($appointments as $a): ?>
                    <div class="col-12 card inhabitant-appointment">
                        <h1><b>datum: </b> <?php echo $a->date ?></h1>
                        <h1><b>dokter: </b> <?php echo $a->firstname; ?> <?php echo $a->lastname; ?></h1>
                        <h1><b>reden: </b> <?php echo $a->reason ?></h1>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 card inhabitant-appointment">
                    <h1> none </h1>
                </div>
            <?php endif; ?>
        </div>

        <!-- YELLOW CARD -->
        <?php foreach ($cards as $c): ?>
            <div class="row inhabitant-row card main-card">
                <h1 class="col-12 card inhabitant-appointment-title"><b>Gele kaart:</b></h1>
                
                <div class="col-12 card inhabitant-appointment inhabitant-yellowcard">
                    <?php if ($c->isActive == 1): ?>
                        <h1><b>reden: </b>
                            <span id="<?php echo "cardReason".$c->yellowCardID?>">
                                <?php echo $c->reason ?>
                            </span>
                        </h1>

                        <h1><b>datum: </b>
                            <span id="<?php echo "cardDate".$c->yellowCardID?>">
                                <?php echo $c->date ?>
                            </span>
                        </h1>

                        <div id="<?php echo "cardActive".$c->yellowCardID?>"></div>

                        <div class="col-12 card inhabitant-appointment inhabitant-yellowcard-edit-btn">
                            <button class="main-btn inhabitant-archive-btn" type="edit" id="editcard" onclick="edit_card('<?php echo $c->yellowCardID?>')"> wijzig </button>
                        </div>

                    <?php else: ?>
                        <h1><b>Geen gele kaart toegewezen</b>

                        <div class="col-12 card inhabitant-appointment inhabitant-yellowcard-edit-btn">
                            <button class="main-btn inhabitant-archive-btn" type="edit" id="editcard" onclick="assign_card('<?php echo $c->yellowCardID?>')"> gele kaart toewijzen </button>
                        </div>

                    <?php endif; ?>
                </div>
                

 
            </div>
        <?php endforeach; ?>

        <!-- PROGRESS -->
        <div class="row inhabitant-row card main-card">
            <h1 class="col-12 card inhabitant-appointment-title"><b>Vooruitgang:</b></h1>

            <?php foreach ($progress as $row){?>
                <div class="row inhabitant-progress-row">
                    <div class="card inhabitant-progress-card">
                        <div class="card-body inhabitant-progress-card-body">
                            <p class="inhabitant-progress-card-text">
                                Fase <?php echo $row['phase']?> (<?php echo $row['tasks_completed']?>/<?php echo $row['tasks_total']?>)
                            </p>
                            <div class="progress rounded-pill inhabitant-progress-rounded-pill">
                                <div role="progressbar" aria-valuenow="<?php echo $row['percentage']?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row['percentage']?>%" class="progress-bar rounded-pill inhabitant-progress-percentage"><?php echo $row['percentage']?>%</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>

        <!-- GOD CHILDREN -->
        <?php foreach ($godparent as $g): ?>
            <div class="row inhabitant-row card main-card">
                <h1 class="col-12 card inhabitant-appointment-title"><b>Petekinderen:</b></h1>

                <?php if(count($godchildren) > 0): ?>
                    <?php foreach ($godchildren as $g): ?>
                        <div class="col-12 card inhabitant-appointment inhabitant-yellowcard">
                            <h1><span>
                                <?php echo $g->firstname; ?> <?php echo $g->lastname ?>
                            </span></h1>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 card inhabitant-appointment inhabitant-yellowcard">
                        <h1><span> geen </span></h1>
                    </div>
                <?php endif ?>

            </div>
        <?php endforeach; ?>

        <!-- NOTES -->
        <div class="row inhabitant-row card main-card inhabitant-notes-container">
            <h1 class="col-12 card inhabitant-appointment-title"><b>Nota's:</b></h1>
        
            <?php foreach ($notes as $n): ?>
                <div class="col-12 doctor-prof-col-appointment">
                    
                    <div class="appointment-text" id="<?php echo "note".$n->noteID?>">
                        <h1><b>titel: </b>
                            <span id="<?php echo "noteTitle".$n->noteID?>">
                                <?php echo $n->title;?>
                            </span>
                        </h1>

                        <h1><b>beschrijving: </b>
                            <span id="<?php echo "noteDescription".$n->noteID?>">
                                <?php echo $n->description;?>
                            </span>
                        </h1>
                    </div>

                    <div class="appointment-btns">
                        <div class="doctor-prof-edit-save-container">
                            <button class="doctor-prof-btn-edit-save" type="edit" id="<?php echo "edit".$n->noteID?>" onclick="edit_note('<?php echo $n->noteID?>')">
                                <img src="/assets/images/tasks_page/edit.svg" class="doctor-prof-btn-svg" alt="edit image">
                            </button>
                            <button class="doctor-prof-btn-edit-save" type="save" id="<?php echo "save".$n->noteID?>" onclick="save_note('<?php echo $n->noteID?>')" style="display: none">
                                <img src="/assets/images/tasks_page/save.svg" class="doctor-prof-btn-svg" alt="save image">
                            </button>
                        </div>

                        <button class="doctor-prof-btn-delete" type="button" id="<?php echo "delete".$n->noteID?>" onclick="delete_note('<?php echo $n->noteID?>')">
                            <img src="/assets/images/tasks_page/trash.svg" class="doctor-prof-btn-svg" alt="trash image">
                        </button>
                    </div>


                </div>
            <?php endforeach; ?>
        
        </div>

        <!-- NEW NOTE -->
        <div class="row inhabitant-row card main-card inhabitant-notes-container">
            <h1 class="col-12 card inhabitant-appointment-title"><b>Nieuwe nota:</b></h1>
                      
            <div id="addnote" class="col-12 appointment-inputs">

                <h1><b>Titel: </b>
                    <input type="text" id="new_note_title" class="form-control main-input appointment-inputs-input">
                </h1>

                <h1><b>Beschrijving: </b>
                    <input type="text" id="new_note_description" class="form-control main-input appointment-inputs-input">
                </h1>

                <h1>
                    <button class="form-control appointment-inputs-btn appointment-inhabitant-btn appointment-add-btn" type="edit"  onclick="add_note();">
                        <img src="/assets/images/tasks_page/add.svg" class="appointment-btn-svg" alt="edit image">
                    </button>
                </h1>

            </div>
        </div>

    </div>
    
    <form id="form1" action="/users/inhabitant/setUsername" method="post">
        <input type="hidden" id="username" name="username">
        <input type="hidden" id="from2id" name="from2id">
    </form>

</div>

<script>
        function showCangePasword(){
            $('#otherFieldDiv').show();
            $('#changeP').hide();
        }

        function archive_user()
        {
            var r = confirm("Weet je zeker dat je deze wilt archiveren?");
            if(r==true)
            {
                $.post('/UsersController/archiveUser', {id:<?php echo $userID; ?>})
            }
        }

        function dearchive_user()
        {
            var r = confirm("Weet je zeker dat je deze wilt de-archiveren?");
            if(r==true)
            {
                $.post('/UsersController/dearchiveUser', {id:<?php echo $userID; ?>})
            }
        }

        function edit_username(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var username=document.getElementById("username"+no);
            var username_data=username.innerHTML;

            username.innerHTML="<input class='form-control main-input inhabitant-input' type='text' id='username_text"+no+"' value='"+username_data+"'>";
        }

        function save_username(no)
        {
            var username_val=document.getElementById("username_text"+no).value;


            document.getElementById("username" + no).innerHTML = username_val;

            document.getElementById("username").value=username_val;
            document.getElementById('from2id').value=<?php echo $userID;?>;
            document.getElementById("form1").submit();
            document.getElementById("edit" + no).style.display = "block";
            document.getElementById("save" + no).style.display = "none";

        }

        function edit_firstname(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var firstname=document.getElementById("firstname"+no);
            var firstname_data=firstname.innerHTML;

            firstname.innerHTML="<input class='form-control main-input inhabitant-input' type='text' id='firstname_text"+no+"' value='"+firstname_data+"'>";
        }


        function save_firstname(no)
        {
            var firstname_val=document.getElementById("firstname_text"+no).value;

            document.getElementById("firstname"+no).innerHTML=firstname_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setFirstname', {id:<?php echo $userID; ?>, firstname:firstname_val})
        }

        function edit_lastname(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var lastname=document.getElementById("lastname"+no);
            var lastname_data=lastname.innerHTML;

            lastname.innerHTML="<input class='form-control main-input inhabitant-input' type='text' id='lastname_text"+no+"' value='"+lastname_data+"'>";
        }


        function save_lastname(no)
        {
            var lastname_val=document.getElementById("lastname_text"+no).value;

            document.getElementById("lastname"+no).innerHTML=lastname_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setLastname', {id:<?php echo $userID; ?>, lastname:lastname_val})
        }

        function edit_birthday(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var birthday=document.getElementById("birthday"+no);
            var birthday_data=birthday.innerHTML;

            birthday.innerHTML="<input class='form-control main-input inhabitant-input' type='date' id='birthday_text"+no+"' value='"+birthday_data+"'>";
        }


        function save_birthday(no)
        {
            var birthday_val=document.getElementById("birthday_text"+no).value;

            document.getElementById("birthday"+no).innerHTML=birthday_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setBirthday', {id:<?php echo $userID; ?>, birthday:birthday_val})
        }


        function edit_dateAdded(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var dateAdded=document.getElementById("dateAdded"+no);
            var dateAdded_data=dateAdded.innerHTML;

            dateAdded.innerHTML="<input class='form-control main-input inhabitant-input' type='date' id='dateAdded_text"+no+"' value='"+dateAdded_data+"'>";
        }

        function save_dateAdded(no)
        {
            var dateAdded_val=document.getElementById("dateAdded_text"+no).value;

            document.getElementById("dateAdded"+no).innerHTML=dateAdded_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setDateAdded', {id:<?php echo $userID; ?>, dateAdded:dateAdded_val})
        }


        function edit_arrivalDate(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var arrivalDate=document.getElementById("arrivalDate"+no);
            var arrivalDate_data=arrivalDate.innerHTML;

            arrivalDate.innerHTML="<input class='form-control main-input inhabitant-input' type='date' id='arrivalDate_text"+no+"' value='"+arrivalDate_data+"'>";
        }

        function save_arrivalDate(no)
        {
            var arrivalDate_val=document.getElementById("arrivalDate_text"+no).value;

            document.getElementById("arrivalDate"+no).innerHTML=arrivalDate_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setArrivalDate', {id:<?php echo $userID; ?>, arrivalDate:arrivalDate_val})
        }


        function edit_departureDate(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var departureDate=document.getElementById("departureDate"+no);
            var departureDate_data=departureDate.innerHTML;

            departureDate.innerHTML="<input class='form-control main-input inhabitant-input' type='date' id='departureDate_text"+no+"' value='"+departureDate_data+"'>";
        }

        function save_departureDate(no)
        {
            var departureDate_val=document.getElementById("departureDate_text"+no).value;

            document.getElementById("departureDate"+no).innerHTML=departureDate_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setDepartureDate', {id:<?php echo $userID; ?>, departureDate:departureDate_val})
        }


        function edit_chore(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var chore=document.getElementById("chore"+no);
            var chore_data=chore.innerHTML;

            chore.innerHTML='<select id="chore_text">'+
                                '<option id="Not Assigned" value="Not Assigned" selected="selected" name="chore">'+
                                    'Not Assigned'+
                                '</option>'+
                                '<option id="Household" value="Household" name="chore">'+
                                    'Household'+
                                '</option>'+
                                '<option id="Kitchen" value="Kitchen" name="chore">'+
                                    'Kitchen'+
                                '</option>'+
                                '<option id="Weekday Responsible" value="Weekday Responsible" name="chore">'+
                                    'Weekday Responsible'+
                                '</option>'+
                                '<option id="Weekend Responsible" value="Weekend Responsible" name="chore">'+
                                    'Weekend Responsible'+
                                '</option>'+
                            '</select>'
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


            $.post('/UsersController/setChore', {id:<?php echo $userID; ?>, chore:chore_val})
        }

        function edit_appointment(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";
            document.getElementById("doctorform"+no).style.display="block";

            var firstname=document.getElementById("firstnameDoctor"+no);
            var lastname=document.getElementById("lastnameDoctor"+no);
            var date=document.getElementById("date"+no);
            var reason=document.getElementById("reason"+no);

            var firstname_data=firstname.innerHTML;
            var lastname_data=lastname.innerHTML;
            var date_data=date.innerHTML;
            var reason_data=reason.innerHTML;

            document.getElementById("firstnameDoctor"+no).style.display="none";
            document.getElementById("lastnameDoctor"+no).style.display="none";

            sb = document.querySelector('#doctor');

            date.innerHTML="<input type='datetime-local' id='date_text"+no+"' value='"+date_data+"'> ";
            reason.innerHTML="<input type='text' id='reason_text"+no+"' value='"+reason_data+"'> ";
        }

        function get_firstname_doctor(x)
        {
            return $.get('/UsersController/getFirstnameDoctor', {doctorID:x})
        }

        function get_lastname_doctor(x)
        {
            return $.get('/UsersController/getLastnameDoctor', {doctorID:x})
        }

        function save_appointment(no)
        {
            var doctor_val=sb.value;
            var date_val = document.getElementById("date_text"+no).value;
            var reason_val = document.getElementById("reason_text"+no).value;

            document.getElementById("date"+no).innerHTML=date_val;
            document.getElementById("reason"+no).innerHTML=reason_val;
            document.getElementById("firstnameDoctor"+no).innerHTML=get_firstname_doctor(doctor_val);
            document.getElementById("lastnameDoctor"+no).innerHTML=get_lastname_doctor(doctor_val);

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";
            document.getElementById("doctorform"+no).style.display="none";

            $.post('/UsersController/setAppointment', {appointmentid:no, doctorID:doctor_val, date:date_val, reason:reason_val})
            setTimeout(function(){location.reload()}, 500);
        }

        function delete_appointment(no)
        {
            var r = confirm("Weet je zeker dat je deze wilt verwijderen?");
            if(r==true)
            {
                document.getElementById("appointment"+no+"").outerHTML="";
                $.post('/UsersController/deleteAppointment', {id:no})
                setTimeout(function(){location.reload()}, 500);
            }
        }

        function add_appointment()
        {
            var new_doctor=document.getElementById("new_doctor").value;
            alert (new_doctor);
            var new_date=document.getElementById("new_date").value;
            var new_reason=document.getElementById("new_reason").value;

            $.post('/UsersController/insertAppointment', {id:<?php echo $userID; ?>, doctor:new_doctor, date:new_date, reason:new_reason})
            setTimeout(function(){location.reload()}, 500);
        }

        function edit_card(no)
        {
            document.getElementById("editcard").style.display="none";

            var cardDate=document.getElementById("cardDate"+no);
            var cardReason=document.getElementById("cardReason"+no);
            var cardActive=document.getElementById("cardActive"+no);

            var cardDate_data=cardDate.innerHTML;
            var cardReason_data=cardReason.innerHTML;
            var cardActive_data=cardActive.innerHTML;

            cardDate.innerHTML="<input class='form-control main-input inhabitant-input' type='datetime-local' id='cardDate_text"+no+"' value='"+cardDate_data+"'> ";
            cardReason.innerHTML="<input class='form-control main-input inhabitant-input' type='text' id='cardReason_text"+no+"' value='"+cardReason_data+"'> ";

            // cardActive.innerHTML='<form id="cardActive_text">'+
            //                         '<input type="radio" id="YES" name="cardActive" value="YES"> '+
            //                         '<label for="YES">Display card</label>'+
            //                      '<br>'+
            //                      '<input type="radio" id="NO" name="cardActive" value="NO"> '+
            //                      '<label for="NO">Delete card</label></form>';

            cardActive.innerHTML=   '<form id="cardActive_text">'+
                                        '<button class="inhabitant-yellowcard-display" type="submit" id="1" value="1" name="cardActive">Display</button>'+
                                        '<button class="inhabitant-yellowcard-delete" type="submit" id="0" value="0" name="cardActive">Delete</button>'+
                                    '</form>'
        }

        function save_card(no)
        {
            var cardDate_val=document.getElementById("cardDate_text"+no).value;
            var cardReason_val = document.getElementById("cardReason_text"+no).value;

            const rbs = document.querySelectorAll('input[name="cardActive"]');
            let selectedValue;
            for (const rb of rbs) {
                if (rb.checked) {
                    selectedValue = rb.value;
                    break;
                }
            }

            var cardActive_val=selectedValue;

            document.getElementById("cardDate"+no).innerHTML=cardDate_val;
            document.getElementById("cardReason"+no).innerHTML=cardReason_val;
            document.getElementById("cardActive"+no).innerHTML=cardActive_val;

            document.getElementById("cardedit").style.display="block";

            $.post('/UsersController/setCard', {cardid:no, date:cardDate_val, reason:cardReason_val, isActive:cardActive_val})
        }

        function edit_godparent(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";
            document.getElementById("godparentForm"+no).style.display="block";

            var firstname=document.getElementById("firstnameGodp"+no);
            var lastname=document.getElementById("lastnameGodp"+no);

            var firstname_data=firstname.innerHTML;
            var lastname_data=lastname.innerHTML;

            document.getElementById("firstnameGodp"+no).style.display="none";
            document.getElementById("lastnameGodp"+no).style.display="none";

            sb = document.querySelector('#godparent');
        }

        function save_godparent(no)
        {
            var godparentID_val=sb.value;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";
            document.getElementById("godparentForm"+no).style.display="none";


            $.post('/UsersController/setGodparent', {id:<?php echo $userID; ?>, godparentID:godparentID_val})
            setTimeout(function(){location.reload()}, 500);
        }

        function edit_gender(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";
            document.getElementById("genderForm"+no).style.display="block";

            var gender=document.getElementById("gender"+no);

            var gender_data=gender.innerHTML;

            document.getElementById("gender"+no).style.display="none";

            sb = document.querySelector('#genderForm');
        }

        function save_gender(no)
        {
            var gender_val=sb.value;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";
            document.getElementById("genderForm"+no).style.display="none";


            $.post('/UsersController/setGender', {id:<?php echo $userID; ?>, gender:gender_val})
            setTimeout(function(){location.reload()}, 300);
        }

        function edit_note(no)
        {
            document.getElementById("edit"+no).style.display="none";
            document.getElementById("save"+no).style.display="block";

            var noteTitle=document.getElementById("noteTitle"+no);
            var noteDescription=document.getElementById("noteDescription"+no);

            var noteTitle_data=noteTitle.innerHTML;
            var noteDescription_data=noteDescription.innerHTML;

            noteTitle.innerHTML=        "<input class='form-control main-input appointment-inputs-input' type='text' id='noteTitle_text"+no+"' value='"+noteTitle_data+"'> ";
            noteDescription.innerHTML=  "<input class='form-control main-input appointment-inputs-input' type='text' id='noteDescription_text"+no+"' value='"+noteDescription_data+"'> ";
        }

        function save_note(no)
        {
            var noteTitle_val=document.getElementById("noteTitle_text"+no).value;
            var noteDescription_val = document.getElementById("noteDescription_text"+no).value;

            document.getElementById("noteTitle"+no).innerHTML=noteTitle_val;
            document.getElementById("noteDescription"+no).innerHTML=noteDescription_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";

            $.post('/UsersController/setNote', {noteid:no, title:noteTitle_val, description:noteDescription_val})
        }

        function delete_note(no)
        {
            var r = confirm("Weet je zeker dat je deze wilt verwijderen?");
            if(r==true)
            {
                document.getElementById("note"+no+"").outerHTML="";
                $.post('/UsersController/deleteNote', {id:no})
                setTimeout(function(){location.reload()}, 500);
            }
        }

        function add_note()
        {
            var new_noteTitle=document.getElementById("new_note_title").value;
            var new_noteDescription=document.getElementById("new_note_description").value;


            $.post('/UsersController/insertNote', {id:<?php echo $userID; ?>, title:new_noteTitle, description:new_noteDescription})
            setTimeout(function(){location.reload()}, 500);
        }

</script>
