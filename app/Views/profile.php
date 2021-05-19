<?php if (session()->get('succes')):?>
    <div class="alert alert-succes" role="alert">
        <?= session()->get('succes')?>
    </div>
<?php endif; ?>

<div>
    <link href="/assets/css/profile.css" rel="stylesheet" type="text/css" />

    <div class="container profile-container main-bottom-padding">
        <div class="row profile-row card main-card">
            
            <!-- AVATAR -->
            <div class="col-12 card profile-avatar-col">
                <img class="profile-avatar" src="<?php echo $avatar['location'];?>" id='avatarImg'>
                <a onclick="chooseAvatar()" class="stretched-link"></a>
            </div>

            <!-- FIRST AND LAST NAME -->
            <div class="col-12 card profile-col profile-name-col">
                <h1><?php echo $user['firstname']?> <?php echo $user['lastname']?> </h1>
            </div>
        </div>

        
        <div class="row profile-row card main-card">
            <!-- USERNAME -->
            <div class="col-12 card profile-col">
                <h1><b>gebruikersnaam: </b> <?php echo $user['username']?> </h1>
            </div>

            <!-- BIRTHDAY -->
            <div class="col-12 card profile-col">
                <h1><b>verjaardag: </b> <?php echo $user['birthday']?> </h1>
            </div>

            <!-- CHANGE PASSWORD -->
            <div class="col-12 card profile-col">
                <button type="button" class="main-btn profile-password-btn" onclick="showCangePasword()" id="changeP">verander wachtwoord</button>
                <?php if (isset($validation)): ?>
                    <div class="main-alert-message">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div id="otherFieldDiv" style="display: none">
                    <form class="" action="/changePassword" method="post">
                        <input type="password" class="form-control main-input profile-input" name="old-password" id="old-password" value="" placeholder="oud wachtwoord">
                        <input type="password" class="form-control main-input profile-input" name="new-password" id="new-password" value="" placeholder="nieuw wachtwoord">
                        <input type="password" class="form-control main-input profile-input" name="confirm-password" id="confirm-password" value="" placeholder="bevestig nieuw wachtwoord">
                        <button type="submit" class="main-btn profile-password-btn">verander wachtwoord</button>
                    </form>
                </div>
            </div>

        </div>

        <?php if(session()->get('role')=='inhabitant') {?>
            <div class="row profile-row card main-card">
                <!-- GODPARENT -->
                <div class="col-12 card profile-col">
                    <h1><b>godparent: </b> <?php echo $godparent['firstname'].' '.$godparent['lastname']?> </h1>
                </div>

                <!-- GODCHILDREN -->
                <div class="col-12 card profile-col profile-col-godchildren-title">
                    <h1><b>godchildren:</b></h1>
                </div>

                <?php if($godchilds==null) { ?>
                    <div class="col-12 card profile-col profile-col-godchildren">
                        <h1>geen</h1>
                    </div>
                <?php } else { foreach ($godchilds as $childs) { ?>
                    <div class="col-12 card profile-col profile-col-godchildren">
                        <h1><?php echo $childs['firstname'].' '.$childs['lastname']?></h1>
                    </div>
                <?php }} ?>
            </div>

            <div class="row profile-row card main-card">
                <!-- APPOINTMENTS -->
                <div class="col-12 card profile-col profile-col-appointment-title">
                    <h1><b>doktersafspraken:</b></h1>
                </div>

                <?php foreach ($appointments as $appoints) { ?>
                    <div class="col-12 card profile-col-appointment">
                        <h1><b>datum: </b> <?php echo $appoints['dateAppointment'] ?></h1>
                        <h1><b>dokter: </b> <?php echo $appoints['doctorFirstname'].' '.$appoints['doctorLasttname']; ?></h1>
                        <h1><b>reden: </b> <?php echo $appoints['reason'] ?></h1>
                    </div>
                <?php } ?>
            </div>
                
        <?php } ?>
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
function showCangePasword(){
    $('#otherFieldDiv').show();
    $('#changeP').hide();
}
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
       // document.getElementById("avatar").value=id;
        document.getElementById("avatarImg").src=pad;
        document.querySelector('#avatarModal').style.display = 'none';
        $.post('/ProfileController/changeAvatar',{id:id})
    }

}
</script>