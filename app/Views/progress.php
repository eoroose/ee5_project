<div>
    <link href="/assets/css/progress.css" rel="stylesheet" type="text/css" />
    
    <div class="container progress-container main-padding-bottom">

        <div class="row progress-row">
            <!-- AVATAR -->
            <div class="col-12 card progress-avatar-col">
                <img class="progress-avatar" src="<?php echo $location;?>" style="-webkit-filter: blur(<?php echo (10-$total).'px' ?>)">
            </div>

            <!-- TITLE -->
            <div class="col-12 card progress-title-col">
                <h3 class="main-title progress-title">Total Progress: <?php echo ($total*10).'%'?></h3>
            </div>

            <!-- PROGRESS BARS -->
            <?php foreach ($percentage as $circle) { ?>
                
                <div class="col-12 progress-progress-col">
                    <div class="card progress-progress-card">
                        <div class="card-body progress-progress-card-body">
                            <h5 class="progress-progress-card-text">
                                Phase <?php echo $circle['phase']?>
                            </h5>
                            <div class="progress rounded-pill progress-progress-rounded-pill">
                                <div role="progressbar" aria-valuenow="<?php echo $circle['percentage']?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $circle['percentage']?>%" class="progress-bar rounded-pill progress-progress-width"></div>
                            </div>
                            <h5 class="progress-progress-percentage"><?php echo $circle['percentage']?>%</h5>
                            <a onclick="getInfo(<?php echo $circle['phase']?>)" class="stretched-link"></a>
                        </div>  
                    </div> 
                </div>

                <div id="<?php echo "otherFieldDiv".$circle['phase']?>" class="progress-info-container <?php echo "otherFieldDiv".$circle['phase']?>" style="display: none !important;">
                    <?php foreach ($progress as $row) {

                            if($circle['phase']==$row['phase']) { ?>
                                <div class="col-12 card progress-info-card">

                                    <?php if($row["completed"]==1) { ?>
                                        <div class="progress-info-completed">
                                            <!-- <img src="/assets/images/note_progress_page/check.svg" alt="check image">     -->
                                            <h5><?php echo $row['description'];?></h5>
                                            <img src="/assets/images/note_progress_page/check.svg" alt="check image">
                                        </div>
                                    <?php } else {?>
                                        <div class="progress-info-incomplete">
                                            <!-- <img src="/assets/images/note_progress_page/development.svg" alt="cross image">     -->
                                            <h5><?php echo $row['description'];?></h5>
                                            <img src="/assets/images/note_progress_page/development.svg" alt="development image">
                                        </div>
                                    <?php } ?>

                                    <!-- <p class="</?php if($row["completed"]==1){echo "text-success";}else{echo "text-warning";}?>"> 
                                        </?php echo $row['description']; if($row["completed"]==1){echo " ==>Completed";}else{echo " ==>Not completed";}?>
                                    </p> -->
                                </div>
                    <?php }} ?>
                    
                    <div class="progress-info-btn-container">
                        <button type="submit" class="progress-info-btn" onclick="closeForm(<?php echo $circle['phase']?>)">
                            <img src="/assets/images/note_progress_page/up.svg" alt="up image">
                        </button>
                    </div>

                </div>       

            <?php } ?>

        </div>
    </div>
</div>

<script>
    function getInfo(phase){
        document.getElementById("otherFieldDiv"+phase+"").style.display="block";
    }
    function closeForm(phase){
        document.getElementById("otherFieldDiv"+phase+"").style.display="none";
    }
</script>