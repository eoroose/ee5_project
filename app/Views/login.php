<div>

    <link href="./assets/css/login.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/background_animation.css" rel="stylesheet" type="text/css" />

    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="bg bg4"></div>

    <div class="container login-page-container">
        <div class="row login-page-row main-bottom-padding">
            <div class="col card main-card bg-card login-page-card">
                <img src="/assets/images/login_page/login_logo.svg" class="card-img-top login-logo" alt="login_logo image">

                <div class="login-container">
            
                    <form class="" action="/" method="post">

                        <div class="form-group pt-3 ">
                            <input type="text" class="form-control main-input login-input" name="username" id="username"  placeholder="username">
                        </div>

                        <div class="form-group pt-3 ">
                            <input type="password" class="form-control main-input login-input" name="password" id="password" value="" placeholder="password">
                        </div>


                        <?php if (isset($validation)): ?>
                            <div class="main-alert-message">
                                <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group pt-3 ">
                            <button type="submit" class="main-btn">Login</button>
                        </div>

                    </form>
                </div>

                <div class="form-group pt-3 login-last-element">
                    <a href="/screensaver">
                        <button class="main-btn">screensaver</button>
                    </a>
                </div>
                



            </div>
        </div>
    </div>
</div>
