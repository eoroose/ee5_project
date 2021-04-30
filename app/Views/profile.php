<style>


    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

    }


</style>
<?php if (session()->get('succes')):?>
    <div class="alert alert-succes" role="alert">
        <?= session()->get('succes')?>
    </div>
<?php endif; ?>
<div>
    <link href="/assets/css/profile.css" rel="stylesheet" type="text/css" />

    <div class="container profile-container">
        <div class="row profile-row main-bottom-padding">
            
            <div class="col-12 card profile-col">
                <h1 class="main-title profile-title"><?php echo $user['firstname']?> <?php echo $user['lastname']?> </h1>
            </div>
            <div class="col-12 card profile-col">
                <div class="card-body dashboard-card-body">
                    <img src="<?php echo $avatar['location'];?>" id='avatarImg' height="75px" width="75px">
                    <h5 class="card-title">Change Avatar</h5>
                    <a onclick="chooseAvatar()" class="stretched-link"></a>
                </div>
            </div>
            <div class="col-12 card username-container">
                
                    <h1 class="main-title profile-title">username:</h1>
                    <h1 class="profile-title"><?php echo $user['username']?></h1>
                
            </div>

            <div class="col-12 card username-container">
                <h1 class="main-title profile-title">birthday:</h1>
                <h1 class="profile-title"><?php echo $user['birthday']?></h1>
            </div>
            <div class="col-12 card">
                <button type="button" class="main-btn" onclick="showCangePasword()" id="changeP">change password</button>
                <?php if (isset($validation)): ?>
                    <div class="main-alert-message">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div id="otherFieldDiv" style="display: none">
                    <form class="" action="/changePassword" method="post">
                        <input type="password" class="form-control main-input profile-input" name="old-password" id="old-password" value="" placeholder="old password">
                        <input type="password" class="form-control main-input profile-input" name="new-password" id="new-password" value="" placeholder="new password">
                        <input type="password" class="form-control main-input profile-input" name="confirm-password" id="confirm-password" value="" placeholder="confirm password">
                        <button type="submit" class="main-btn">change password</button>
                    </form>
                    </div>
                </div>
            <?php if(session()->get('role')=='inhabitant'){?>
            <div class="col-12 card username-container">
                <h1 class="main-title profile-title">Godparent:</h1>
                <h1 class="profile-title"><?php echo $godparent['firstname'].' '.$godparent['lastname']?></h1>
            </div>
            <?php if($godchilds==null){}else{?>
            <div class="col-12 card username-container">
                <h1 class="main-title profile-title">Godchilds:</h1>
                <p class="">
                <?php foreach ($godchilds as $childs) { ?>
                <?php echo $childs['firstname'].' '.$childs['lastname']?><br>
                <?php } ?>
                </p>
            </div>
            <?php } ?>
            <div class="col-12 card username-container">
                <h1 class="main-title profile-title">appointments :</h1>
                <p class="">
                    <?php foreach ($appointments as $appoints) { ?>

                        <?php echo 'doctor: '.$appoints['doctorFirstname'].' '.$appoints['doctorLasttname'];?> <br>
                    <?php echo 'date:'.$appoints['dateAppointment'].' reden:'.$appoints['reason'] ;?><br>

                    <?php } ?>
                </p>

            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!--Hidden field for changing avatars-->
<div id="avatarModal" class="modal"">
<div class="modal-content">
    <div class="container">
        <h4>Kies Avatar</h4>
        <?php foreach ($avatars as $row){?>
            <div class="card">
                <div class="col-md card">
                    <img src="<?php echo $row['location'];?>" class="card-img-top dashboard-card-logo" alt="user image" height="50px" width="50px">
                    <div class="card-body">
                        <h5 class="card-title"style="text-align: center"><?php echo $row['title'];?></h5>
                        <a onclick="submitAvatar('<?php echo $row['id'];?>','<?php echo $row['location'];?>')" class="stretched-link"></a>
                    </div>
                </div>
            </div>

        <?php } ?>

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