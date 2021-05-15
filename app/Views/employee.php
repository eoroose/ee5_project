    <script src='C:\xampp\htdocs\ee5_project\public\assets\scripts\jquery-3.6.0.min.js'></script>
    <link href="/assets/css/tasks.css" rel="stylesheet" type="text/css" />

    <?php use App\Models\UserModel;

    foreach ($inhabitant as $i): ?>
    <h3 class="main-title tasks-title"><?php echo $i->firstname; ?> <?php echo $i->lastname; ?></h3>
    <?php endforeach; ?>

    <?php foreach ($isActive as $iA): ?>
        <?php if($iA->isActive == 1): ?>
            <button onclick="archive_user()"> Archive user </button>
        <?php elseif($iA->isActive == 0): ?>
            <button onclick="dearchive_user()"> De-archive user </button>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($isAdmin as $iA): ?>
        <?php if($iA->isAdmin == 1): ?>
            <button onclick="make_employee()"> Change from admin to employee </button>
        <?php elseif($iA->isAdmin == 0): ?>
            <button onclick="make_admin()"> Change from employee to admin </button>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="container tasks-container">
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
            <th>First name:</th>
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
            <th>Last name:</th>
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
            <th>Date added:</th>
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

        <?php endforeach; ?>

        <?php if (!empty($password)): ?>
        <?php foreach($password as $p): ?>
        <div class="col-12 card profile-col">
            <button type="button" class="main-btn profile-password-btn" onclick="showCangePasword()" id="changeP">change password</button>


            <div id="otherFieldDiv" style="display: none">
                <form class="" action="/UsersController/changePassword" method="post">
                    <input type="hidden" id="userID" name="userID" value="<?php echo $i->userID?>">
                    <input type="password" class="form-control main-input profile-input" name="new-password" id="new-password" value="" placeholder="new password">
                    <input type="password" class="form-control main-input profile-input" name="confirm-password" id="confirm-password" value="" placeholder="confirm password">
                    <button type="submit" class="main-btn profile-password-btn">change password</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

    </table>
    </div>

<form id="form1" action="/users/employee/setUsername" method="post">
    <input type="hidden" id="username" name="username">
    <input type="hidden" id="from2id" name="from2id">
</form>
    <?php if (isset($validation)): ?>
        <div class="main-alert-message">
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        </div>
    <?php endif; ?>
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
            var r = confirm("Weet je zeker dat je deze wilt wijzigen naar employee?");
            if(r==true)
            {
                $.post('/UsersController/makeEmployee', {id:<?php echo $userID; ?>})
            }
        }

        function make_admin()
        {
            var r = confirm("Weet je zeker dat je deze wilt wijzigen naar admin?");
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