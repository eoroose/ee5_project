<div>
    <script src='C:\xampp\htdocs\ee5_project\public\assets\scripts\jquery-3.6.0.min.js'></script>
    <link href="/assets/css/inhabitant.css" rel="stylesheet" type="text/css" />

    <div class="container inhabitant-container main-bottom-padding">

    <div class="card inhabitant-back-arrow">
        <img src="/assets/images/doctors/back-arrow.svg" class="card-img-top" alt="back-arrow image">
        <a href="/users" class="stretched-link"></a>
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
                    <button class="main-btn inhabitant-archive-btn" onclick="archive_user()"> archiveer werknemer </button>
                <?php elseif($iA->isActive == 0): ?>
                    <button class="main-btn inhabitant-archive-btn" onclick="dearchive_user()"> de-archiveer werknemer </button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <!-- ADMIN/EMPLOYEE CHANGE -->
        <?php foreach ($isAdmin as $iA): ?>
            <div class="col-12 card inhabitant-col">
                <?php if($iA->isAdmin == 1): ?>
                    <button class="main-btn inhabitant-archive-btn" onclick="make_employee()" style="margin-top:-15px;"> maak werknemer </button>
                <?php elseif($iA->isAdmin == 0): ?>
                    <button class="main-btn inhabitant-archive-btn" onclick="make_admin()" style="margin-top:-15px;"> maak werkgever </button>
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
                <h2><b>Datum van aankomst: </b>
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

    <form id="form1" action="/users/employee/setUsername" method="post">
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

        function make_employee()
        {
            var r = confirm("Weet je zeker dat je deze wilt wijzigen naar werknemer?");
            if(r==true)
            {
                $.post('/UsersController/makeEmployee', {id:<?php echo $userID; ?>})
            }
        }

        function make_admin()
        {
            var r = confirm("Weet je zeker dat je deze wilt wijzigen naar werkgever?");
            if(r==true)
            {
                $.post('/UsersController/makeAdmin', {id:<?php echo $userID; ?>})
            }
        }

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

            firstname.innerHTML="<input type='text' id='firstname_text"+no+"' value='"+firstname_data+"' style='width: 90%;border-radius: 10px;'>";
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

            lastname.innerHTML="<input type='text' id='lastname_text"+no+"' value='"+lastname_data+"' style='width: 90%;border-radius: 10px;'>";
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

            birthday.innerHTML="<input type='date' id='birthday_text"+no+"' value='"+birthday_data+"' style='width: 90%;border-radius: 10px;'>";
        }


        function save_birthday(no)
        {
            var birthday_val=document.getElementById("birthday_text"+no).value;

            document.getElementById("birthday"+no).innerHTML=birthday_val;

            document.getElementById("edit"+no).style.display="block";
            document.getElementById("save"+no).style.display="none";


            $.post('/UsersController/setBirthday', {id:<?php echo $userID; ?>, birthday:birthday_val})
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


            $.post('/UsersController/setDateAdded', {id:<?php echo $userID; ?>, dateAdded:dateAdded_val})
        }
</script>