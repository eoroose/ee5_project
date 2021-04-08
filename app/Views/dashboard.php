<div class="container">
    <?php if (session()->get('succes')):?>
    <div class="alert alert-succes" role="alert">
        <?= session()->get('succes')?>
    </div>
    <?php endif; ?>


        <h1 style="background: white">Hello, <?=session()->get('firstname')?> <?=session()->get('lastname')?> </h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 card">
                    <div class="card-body">
                        <h5 class="card-title"style="text-align: center">Quote Of the day</h5>
                        <p>"In some ways, programming is like painting. You start with a blank canvas and certain basic raw materials. You use a combination of science, art, and craft to determine what to do with them."</p>
                    </div>
                </div>
                <div class="col-md-8 card">
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
        <?php if(session()->get('role')=='admin'):
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md card">
                        <img src="/assets/images/teamwork.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Inhabitants</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md card">
                        <img src="/assets/images/verify.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">Register</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md card">
                        <img src="/assets/images/calendar.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Agenda</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md card">
                        <img src="/assets/images/party.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">Celebration</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md card">
                        <img src="/assets/images/backup.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Backup</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif(session()->get('role')=='employee'): ?>
            <div class="container">
                <div class="row">
                    <div class="col-md card">
                        <img src="/assets/images/teamwork.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Inhabitants</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md card">
                        <img src="/assets/images/verify.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">Register</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md card">
                        <img src="/assets/images/calendar.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Agenda</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md card">
                        <img src="/assets/images/party.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">Celebration</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else:?>
            <div class="container">
                <div class="row">
                    <div class="col-md card">
                        <img src="/assets/images/journal.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Journal</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col-md card">
                        <img src="/assets/images/calendar.svg" class="card-img-top" alt="Register image" height="90em" width="90em" style="margin-top: 1em">
                        <div class="card-body">
                            <h5 class="card-title"style="text-align: center">Agenda</h5>
                            <a href="/register" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                   <h1>progress!!==> to be implemented</h1>
                    <h2>Or better something else?</h2>
                </div>
            </div>
        <?php endif; ?>


</div>