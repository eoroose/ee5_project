<div>
    <link href="/assets/css/dashboard.css" rel="stylesheet" type="text/css" />

    <div class="container dashboard-container">

        <?php if (session()->get('succes')):?>
            <div class="alert alert-succes" role="alert">
                <?= session()->get('succes')?>
            </div>
        <?php endif; ?>
        
        <div class="dashboard-greetings-container">
            
            <h1 class="main-title dashboard-greetings">Hello, <?=session()->get('firstname')?> <?=session()->get('lastname')?></h1>

            <?php if(session()->get('role')=='inhabitant'): ?>
                <?php if($yellowCard==1){ ?>
                    <div class="card dashboard-card-animation dashboard-notification-card">
                        <img src="/assets/images/dashboard_page/yellow_card_yellow.svg" class="card-img-top dashboard-notification-logo" alt="yellow_card_yellow image">
                        <img src="/assets/images/dashboard_page/yellow_card_purple.svg" class="card-img-top dashboard-notification-logo dashboard-notification-logo-purple" alt="yellow_card_purple image">    
                        <div class="card-body dashboard-card-body">
                            <a onclick="openForm2()" class="stretched-link"></a>
                        </div>
                    </div>
                <?php }?>
                
                <!-- </?php if($godParent!=null){ ?>
                    <div class="card dashboard-card-animation dashboard-notification-card">
                        <img src="/assets/images/dashboard_page/magic_wand_cyan.svg" class="card-img-top dashboard-notification-logo" alt="magic_wand_cyan image">    
                        <img src="/assets/images/dashboard_page/magic_wand_purple.svg" class="card-img-top dashboard-notification-logo dashboard-notification-logo-purple" alt="magic_wand_purple image">
                        <div class="card-body dashboard-card-body">
                            <a onclick="openForm()" class="stretched-link"></a>
                        </div>
                    </div>
                </?php }?> -->
            <?php endif; ?>

        </div>
        
        <div class="row dashboard-first-row">
            <?php if(session()->get('role')=='inhabitant'): ?>
            <div class="col-md card main-card dashboard-quote-card">
            <?php else:?>
            <div class="col-md card dashboard-card-animation dashboard-quote-card">
                <a href="/quote" class="stretched-link"></a>
            <?php endif; ?>

                <div class="card-body dashboard-quote-card-body">
                    <h5 class="card-title main-title dashboard-quote-of-the-day">Quote of the day</h5>
                    <p class="dashboard-quote-text">"<?php echo $quote;?>"</p>
                </div>
            </div>

            <div class="col-md card dashboard-card-separator"></div>

            <div class="col-md card dashboard-card-animation">
                <h5 class="card-title dashboard-card-title dashboard-card-title-top">Agenda</h5>
                <a href="/agenda" class="stretched-link"></a>
                <div class="table-responsive">

                    <table id="productSizes" class="table">
                        <thead>
                            <tr>
                                <th>Start hour</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($event as $data) {?>
                                <tr>
                                    <td><?php echo $data['Start']?></td>
                                    <td><?php echo $data['title']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php if(session()->get('role')=='inhabitant'){if($apointment==null) {
                    } else { ?>
                        <h5 class="card-title dashboard-card-title" style="text-align: center">Doctors Apointment today at <?php echo $apointment['time']?></h5>
                    <?php }} ?>

                </div>  
            </div>
            
        </div>
        

        <div class="dsahboard-cards-container">
            
            <!-- PROFILE & USERS/INHABITANTS/JOURNAL -->
            <div class="row dashboard-row">

                <div class="col-md card dashboard-card-animation">
                    <img src="/assets/images/dashboard_page/user.svg" class="card-img-top dashboard-card-logo" alt="user image">
                    <div class="card-body dashboard-card-body">
                        <h5 class="card-title dashboard-card-title"style="text-align: center">Profile</h5>
                        <a href="/profile" class="stretched-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-card-separator"></div>
                
                <div class="col-md card dashboard-card-animation">
                    <?php if(session()->get('role')=='admin'): ?>
                        <img src="/assets/images/dashboard_page/users.svg" class="card-img-top dashboard-card-logo" alt="users image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title" style="text-align: center">Users</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    <?php elseif(session()->get('role')=='employee'): ?>
                        <img src="/assets/images/dashboard_page/users.svg" class="card-img-top dashboard-card-logo" alt="users image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title" style="text-align: center">Inhabitants</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    <?php else:?>
                        <img src="/assets/images/dashboard_page/journal.svg" class="card-img-top dashboard-card-logo" alt="users image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title" style="text-align: center">Journal</h5>
                            <a href="/journal" class="stretched-link"></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- INHABITANT->CHORES OR TASKS & NOTE PROGRESS  -->
            <div class="row dashboard-row">
                <?php if(session()->get('role')=='inhabitant'): ?>
                    <div class="col card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/sweeping.svg" class="card-img-top dashboard-card-logo" alt="users image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title" style="text-align: center">Chores</h5>
                            <a href="/chore" class="stretched-link"></a>
                        </div>
                    </div>
                
                <?php else:?>
                    <div class="col-md card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/clipboard.svg" class="card-img-top dashboard-card-logo" alt="user image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title"style="text-align: center">Tasks</h5>
                            <a href="/tasks" class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-md card dashboard-card-separator"></div>

                    <div class="col-md card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/development.svg" class="card-img-top dashboard-card-logo" alt="user image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title"style="text-align: center">Note progress</h5>
                            <a href="/note-progress" class="stretched-link"></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- CHORES & CELEBRATION -->
            <?php if(session()->get('role')=='admin' || session()->get('role')=='employee'): ?>
                
                <?php if(session()->get('role')=='admin'): ?>
                <div class="row dashboard-row">
                <?php else:?>
                <div class="row dashboard-row main-bottom-padding">
                <?php endif; ?>
                
                    <div class="col-md card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/sweeping.svg" class="card-img-top dashboard-card-logo" alt="user image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title"style="text-align: center">Chores</h5>
                            <a href="/chore" class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-md card dashboard-card-separator"></div>

                    <div class="col-md card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/party.svg" class="card-img-top dashboard-card-logo" alt="user image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title"style="text-align: center">Celebration</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>

                </div>
            <?php endif; ?>

            <!-- REGISTER & BACKUP OR PROGRESS -->
            
            <?php if(session()->get('role')=='admin'): ?>
                <div class="row dashboard-row main-bottom-padding">
                    
                    <div class="col-md card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/verify.svg" class="card-img-top dashboard-card-logo" alt="user image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title"style="text-align: center">Register</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>

                    <div class="col-md card dashboard-card-separator"></div>

                    <div class="col-md card dashboard-card-animation">
                        <img src="/assets/images/dashboard_page/backup.svg" class="card-img-top dashboard-card-logo" alt="user image">
                        <div class="card-body dashboard-card-body">
                            <h5 class="card-title dashboard-card-title"style="text-align: center">Backup</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>

                </div>

            <?php elseif(session()->get('role')=='inhabitant'): ?>
                <div class="row dashboard-row main-bottom-padding">

                    <div class="card dashboard-card-animation dashboard-progress-container">
                        <h4 class="card-title dashboard-card-title dashboard-card-title-top">Progress</h4>
                        <a href="/progress" class="stretched-link"></a>
                        <?php foreach ($progress as $row){?>
                            <div class="row dashboard-progress-row">
                                <div class="card dashboard-progress-card">
                                    <div class="card-body dashboard-progress-card-body">
                                        <h5 class="dashboard-progress-card-text">
                                            Phase <?php echo $row['phase']?>
                                        </h5>
                                        <div class="progress rounded-pill dashboard-progress-rounded-pill">
                                            <div role="progressbar" aria-valuenow="<?php echo $row['percentage']?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row['percentage']?>%" class="progress-bar rounded-pill dashboard-progress-percentage">
                                                <?php echo $row['percentage']?>%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

                        <!-- <div id="newEntryModal" class="modal"">
                            <div class="modal-content">

                                <h1>Godfather/godChild</h1>

                                <h4>Godfather/Godmother</h4>
                                <p></?php echo $godParent['firstname']; echo ' '; echo $godParent['lastname']?></p>
                                <br>

                                <h4>godchilds</h4>
                                </?php foreach ($godchilds as $row){   echo $row['firstname']; echo ' '; echo $row['lastname']; ?> <br> </?php } ?>

                                <button type="submit" class="btn cancel" onclick="closeFormEE()">Cancel</button>
                            </div>
                        </div> -->
                        

                <?php if($yellowCard==1) { ?>
                    <div id="yellowCardModal" class="main-modal">
                        <div class="modal-content card main-card">

                            <h4>Je hebt een gele kaart gekregen</h4>

                            <p><b>Reden: </b> <?php echo $info['reason'];?></p>
                            <p><b>Ontvangen op: </b> <?php echo $info['date'];?></p>

                            <button type="submit" class="modal-btn" onclick="closeForm()">close</button>
                        </div>
                    </div>
                <?php }?>
                    
            <?php endif; ?>

        </div>
    </div>
</div>

<?php if(session()->get('role')=='inhabitant') { ?>
    <script>
        //function yellowCard() {
       //     alert("Je hebt een gele kaart gekregen\n reden:<?php if($yellowCard==1){ echo $info['reason'];}?> \n wanneer ontvangen <?php if($yellowCard==1){ echo $info['date'];}?> ");
     //   }

        //function godParents(){
      //       alert("Je god parent is: <?php echo $godParent['firstname'];?> <?php echo $godParent['lastname'];?>\nJe god childs zijn: \n<?php foreach ($godchilds as $row){ ?>   <?php echo $row['firstname'];?> <?php echo $row['lastname'];?> <br> <?php }?>");
      //  }
        function openForm(){
            document.querySelector('#newEntryModal').style.display = 'block';

        }
        function  closeFormEE() {
            document.querySelector('#newEntryModal').style.display = 'none';
        }
        function openForm2(){
            document.querySelector('#yellowCardModal').style.display = 'block';

        }
        function  closeForm() {
            document.querySelector('#yellowCardModal').style.display = 'none';
        }
    </script>
<?php }?>
