 <div class="container">
     <div class="row"">
         <div class="col-12 col-sm-8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 form-wrapper" style="background-color: #81A2AC;">
            <div class="container">
                <h3>login</h3>
                <hr>
                <form class="" action="/" method="post">
                    <div class="form-group pt-3 ">
                        <label for="username">Email adres</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username')?>">
                        <!--set_value keeps the value in of the email in the field !!-->
                    </div>
                    <div class="form-group pt-3 ">
                        <label for="password">Passwoord</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                    <?php if (isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row pt-3 ">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="col-12 col-sm-8 " style="text-align: right">
                            <a href="/splashscreen">go to splash screen</a>
                        </div>
                    </div>
                </form>
            </div>
     </div>
 </div>