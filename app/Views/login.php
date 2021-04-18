
<div class="container login-page">

    <object class="login-logo" data="<?php echo base_url('./assets/images/login_logo.svg'); ?>"></object>
    
    <div class="login-container">
        
        <form class="" action="/" method="post">

            <div class="form-group pt-3 ">
                <input type="text" class="form-control login-input" name="username" id="username" value="<?= set_value('username')?>" placeholder="username">
            </div>

            <div class="form-group pt-3 ">
                <input type="password" class="form-control login-input" name="password" id="password" value="" placeholder="password">
            </div>

            <?php if (isset($validation)): ?>
                <div class="login-alert-message">
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