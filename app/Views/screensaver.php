<div>
    <?php 
        $phase=0;
        $size = 100 / (count($tasks) + 2);
        $scroll = 70 * count($inhabitants) - (70 * 4);
    ?>

    <link href="./assets/css/screensaver.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/background_animation.css" rel="stylesheet" type="text/css" />

    <style>
        .screensaver-rest-of-table {
            overflow: hidden;   
        }

        .screensaver-scroll-info {
            animation: progress-scroll 50s ease-in-out infinite alternate;
        }

        @keyframes progress-scroll {
            0% {
                transform:translateY(5px);
            }
            100% {
                transform:translateY(-<?php echo $scroll?>px);
            }
        }
    </style>

    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="bg bg4"></div>

    <div class="container screensaver-top-container">
        <div class="row screensaver-top-row">
            <div class="col screensaver-top-col">
                <div class="card screensaver-top-logo bg-card">
                    <img src="/assets/images/login_page/login_logo.svg" class="card-img-top login-logo" alt="login_logo image">
                    <a href="/" class="stretched-link"></a>
                </div>
            </div>

            <div class="col screensaver-top-col">
                <div class="card screensaver-top-quote bg-card">
                    <h1>Quote van de dag</h1>
                    <p><?php echo $quote;?></p>
                </div>
            </div>
        </div>
        
    </div>

    <div class="container screensaver-progress-container bg-card">
        
        <div class="container screensaver-progress">
            <!-- HEADER TABLE -->
            <div class="col screensaver-col screensaver-scroll-header">

                <div class="row card screensaver-table-header" style="width: <?php echo ($size*2) ?>%;">
                    <p>Inhabitant</p>
                </div>

                <!-- TASKS -->
                <?php foreach($tasks as $task): ?>
                    <?php if($task['phase']==$phase): ?>
                        <!-- NOT FIRST -->
                        <diV class="row card screensaver-table-header" style="width: <?php echo $size ?>%;">
                            <p><?php echo $task['description'];?></p>
                        </diV>
                    <?php else: ?>
                        <diV class="row card screensaver-table-header" style="width: <?php echo $size ?>%;">
                            <p><?php $phase=$task['phase']; echo $task['description']; ?></p>
                        </diV>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- REST OF TABLE -->
            <div class="screensaver-rest-of-table">
                <?php foreach ($inhabitants as $inhabitant): ?>
                    <div class="col screensaver-col screensaver-scroll-info">

                        <!-- AVATAR -->
                        <diV class="row card screensaver-table-cells screensaver-table-avatar" style="width: <?php echo ($size*2/3) ?>%;">
                            <img src="<?php echo $inhabitant['location'];?>" alt="user-img">
                        </diV>

                        <!-- NAME -->
                        <diV class="row card screensaver-table-cells screensaver-table-name" style="width: <?php echo ($size*4/3) ?>%;">
                            <p><?php echo $inhabitant['firstname'] ?> <?php echo $inhabitant['lastname'] ?></p>
                        </diV>

                        <!-- PROGRESS -->
                        <?php foreach($tasks as $task): ?>
                            <?php foreach($progress as $prog): ?>
                                <?php if($prog['taskID']==$task['taskID'] && $prog['inhabitantID']==$inhabitant['inhabitantID']): ?>

                                    <?php if($prog['isCompleted']==1): ?>
                                        <diV class="row card screensaver-table-cells screensaver-table-checked bg-card" style="width: <?php echo $size ?>%;">
                                            <?php if($task['phase'] == 1 || $task['phase']%3 == 1): ?>
                                                <img src="/assets/images/screensaver_page/checked_red.svg" alt="checked-img">
                                            <?php elseif($task['phase']%3 == 2): ?>
                                                <img src="/assets/images/screensaver_page/checked_orange.svg" alt="checked-img">
                                            <?php else: ?>
                                                <img src="/assets/images/screensaver_page/checked_green.svg" alt="checked-img">
                                            <?php endif; ?>
                                        </diV>
                                    <?php else: ?>
                                        <diV class="row card screensaver-table-cells bg-card" style="width: <?php echo $size ?>%;">
                                            <p></p>
                                        </diV>
                                    <?php endif; ?>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>  
    
    </div>

</div>
