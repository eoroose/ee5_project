    <link href="/assets/css/progress.css" rel="stylesheet" type="text/css" />
    <h4>Progress</h4>
    <p style="font-size: small">push the phase to see your progress</p>
    <img height="100px" width="100px" src="<?php echo $location;?>" class="card-img-top dashboard-card-logo" alt="user image" style="-webkit-filter: blur(<?php echo (10-$total).'px' ?>)">
    <p style="text-align: center">Total progress: <?php echo ($total*10).'%'?></p>

    <?php foreach ($percentage as $circle){
            $rand=rand(0,12);
            ?>
                <div class="card">
                <h3 class="progress-title"><?php echo 'phase: '.$circle['phase']?> <?php if($circle['percentage']==0){ echo "--   Not started Yet";}
                    ?></h3>

                    <div class="<?php if($rand<=4){echo "progress yellow";}else{if($rand>=8){echo 'progress purple';}else{echo 'progress green';}}?>">

                        <div class="progress-bar" style="width:<?php echo $circle['percentage'].'%';?>;">
                            <div class="progress-value" style="overflow: unset"><?php echo $circle['percentage'].'%';?></div>
                        </div>
                        <a onclick="getInfo(<?php echo $circle['phase']?>)" class="stretched-link"></a>
                    </div>

                </div>
                <div id="<?php echo "otherFieldDiv".$circle['phase']?>" class="<?php echo "otherFieldDiv".$circle['phase']?>" style="display: none !important;">
                    <?php foreach ($progress as $row){?>
                            <?php if($circle['phase']==$row['phase']){?>
                            <p class="<?php if($row["completed"]==1){echo "text-success";}else{echo "text-warning";}?>"> <?php echo $row['description']; if($row["completed"]==1){echo " ==>Completed";}else{echo " ==>Not completed";}?></p>
                    <?php }} ?>
                    <button type="submit" class="btn cancel" onclick="closeForm(<?php echo $circle['phase']?>)">close</button>
                </div>


            <?php } ?>




<script>
    function getInfo(phase){
        document.getElementById("otherFieldDiv"+phase+"").style.display="block";
    }
    function closeForm(phase){
        document.getElementById("otherFieldDiv"+phase+"").style.display="none";
    }
</script>