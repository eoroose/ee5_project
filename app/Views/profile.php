<div>
    <link href="/assets/css/profile.css" rel="stylesheet" type="text/css" />

    <div class="container profile-container">
        <div class="row profile-row main-bottom-padding">
            
            <div class="col-12 card profile-col">
                <h1 class="main-title profile-title"><?php echo $firstname?> <?php echo $lastname?> </h1>
            </div>
                
            <div class="col-12 card username-container">
                
                    <h1 class="main-title profile-title">username:</h1>
                    <h1 class="profile-title"><?php echo $username?></h1>
                
            </div>

            <div class="col-12 card username-container">
                <h1 class="main-title profile-title">birthday:</h1>
                <h1 class="profile-title"><?php echo $birthday?></h1>
            </div>

            <div class="col-12 card">
                <button type="submit" class="main-btn">change password</button>

                <input type="password" class="form-control main-input profile-input" name="password" id="old-password" value="" placeholder="old password">
                <input type="password" class="form-control main-input profile-input" name="password" id="new-password" value="" placeholder="new password">
                <input type="password" class="form-control main-input profile-input" name="password" id="confirm-password" value="" placeholder="confirm password">
            </div>
        </div>
    </div>
</div>