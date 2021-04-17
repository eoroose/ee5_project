<link href="./assets/css/login.css" rel="stylesheet" type="text/css" />

 <div class="container">

    <object class="logo" data="<?php echo base_url('./assets/images/login_logo.svg'); ?>"></object>

    <div class="login-container">
        
        <form class="" action="/" method="post">

            <div class="form-group pt-3 ">
                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username')?>" placeholder="username">
            </div>

            <div class="form-group pt-3 ">
                <input type="password" class="form-control" name="password" id="password" value="" placeholder="password">
            </div>

            <?php if (isset($validation)): ?>
                <div class="alert-message">
                    <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group pt-3 ">
                <button type="submit" class="login-btn">Login</button>
            </div>

        </form>    
    </div>

    <div class="form-group pt-3">
        <a href="/splashscreen">
            <button class="login-btn">screensaver</button>
        </a>
    </div>
 </div>