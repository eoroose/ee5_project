
<div class="container dashboard-container">

    <?php if (session()->get('succes')):?>
        <div class="alert alert-succes" role="alert">
            <?= session()->get('succes')?>
        </div>
    <?php endif; ?>

    <h1 class="dashboard-greetings">Hello, <?=session()->get('firstname')?> <?=session()->get('lastname')?></h1>
    
    <div class="container dashboard-quote-table-container">

        <div class="row dashboard-first-row">

            <?php if(session()->get('role')=='inhabitant'): ?>
            <div class="col-md card dashboard-quote-card">
            <?php else:?>
            <div class="col-md card dashboard-pages-card">
                <a href="/register" class="stretched-link dashboard-pages-link"></a>
            <?php endif; ?>

                <div class="card-body dashboard-quote-card-body">
                    <h5 class="card-title dashboard-quote-of-the-day">Quote of the day</h5>
                    <p class="dashboard-quote-text">"In some ways, programming is like painting. You start with a blank canvas and certain basic raw materials. You use a combination of science, art, and craft to determine what to do with them."</p>
                </div>
            </div>

            <div class="col-md card dashboard-pages-separator"></div>

            <div class="col-md card dashboard-pages-card dashboard-agenda-card">
                <h5 class="card-title dashboard-agenda-title" style="text-align: center">Agenda</h5>
                <a href="/register" class="stretched-link dashboard-pages-link"></a>
                <div class="table-responsive">
                    <table id="productSizes" class="table">
                        <thead>
                        <tr>
                            <th>Start hour</th>
                            <th>Activity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($event as $data) {?>
                                <tr>
                                    <td><?php echo $data['startTime']?></td>
                                    <td><?php echo $data['description']?></td>
                                </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <?php if(session()->get('role')=='admin'): ?>

        <div class="container dashboard-pages-container">

            <!-- Profile & Users -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/user.svg" class="card-img-top dashboard-pages-img" alt="user image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Profile</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/users.svg" class="card-img-top dashboard-pages-img" alt="users image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Users</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

            <!-- Tasks & Note progress -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/clipboard.svg" class="card-img-top dashboard-pages-img" alt="clipboard image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Tasks</h5>
                        <a href="/tasks" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/development.svg" class="card-img-top dashboard-pages-img" alt="development image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Note progress</h5>
                        <a href="/note-progress" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

            <!-- Register & Chores -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/verify.svg" class="card-img-top dashboard-pages-img" alt="verify image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Register</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>                

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/sweeping.svg" class="card-img-top dashboard-pages-img" alt="sweeping image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Chores</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

            <!-- Celebration & Backup -->
            <div class="row dashboard-pages-row dashboard-last-element">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/party.svg" class="card-img-top dashboard-pages-img" alt="party image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Celebration</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/backup.svg" class="card-img-top dashboard-pages-img">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Backup</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

        </div>
    
    <?php elseif(session()->get('role')=='employee'): ?>

        <div class="container dashboard-pages-container">

            <!-- Profile & Users -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/user.svg" class="card-img-top dashboard-pages-img" alt="user image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Profile</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/users.svg" class="card-img-top dashboard-pages-img" alt="users image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Inhabitants</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

            <!-- Tasks & Note progress -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/clipboard.svg" class="card-img-top dashboard-pages-img" alt="clipboard image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Tasks</h5>
                        <a href="/tasks" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/development.svg" class="card-img-top dashboard-pages-img" alt="development image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Note progress</h5>
                        <a href="/note-progress" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

            <!-- Chores & Celebration -->
            <div class="row dashboard-pages-row dashboard-last-element">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/sweeping.svg" class="card-img-top dashboard-pages-img" alt="sweeping image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Chores</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/party.svg" class="card-img-top dashboard-pages-img" alt="party image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Celebration</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

        </div>

    <?php else:?>

        <div class="container dashboard-pages-container">

            <!-- Profile & Journal -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/user.svg" class="card-img-top dashboard-pages-img" alt="user image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title"style="text-align: center">Profile</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>

                <div class="col-md card dashboard-pages-separator"></div>

                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/journal.svg" class="card-img-top dashboard-pages-img" alt="journal image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Journal</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

            <!-- Chores -->
            <div class="row dashboard-pages-row">
                <div class="col-md card dashboard-pages-card">
                    <img src="/assets/images/dashboard_page/sweeping.svg" class="card-img-top dashboard-pages-img" alt="sweeping image">
                    <div class="card-body dashboard-pages-card-body">
                        <h5 class="card-title dashboard-pages-title" style="text-align: center">Chores</h5>
                        <a href="/register" class="stretched-link dashboard-pages-link"></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="container dashboard-progress dashboard-last-element">
            <div class="row card dashboard-pages-card dashboard-progress-container">
                <h4 class="card-title dashboard-progress-title"style="text-align: center">Progress</h4>
                <a href="/note-progress" class="stretched-link dashboard-progress-link"></a>
                <?php foreach ($progress as $row){?>
                    <div class="row dashboard-progress-row">
                        <div class="card dashboard-progress-card">
                            <div class="card-body dashboard-progress-card-body">
                                <h5 class="dashboard-progress-card-text">
                                    Step <?php echo $row['phase']?>
                                </h5>
                                <div class="progress rounded-pill dashboard-progress-rounded-pill">
                                    <div role="progressbar" aria-valuenow="<?php echo $row['percentage']?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row['percentage']?>%" class="progress-bar rounded-pill dashboard-progress-percentage"><?php echo $row['percentage']?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>

    <?php endif; ?>

</div>
