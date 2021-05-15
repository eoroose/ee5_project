<div>

    <link href="/assets/css/celebration.css" rel="stylesheet" type="text/css" />

    <audio id="audio">
        <source type="audio/mpeg" src="<?php echo base_url('/assets/audio/CelebrateGoodTimes.mp3'); ?>">
    </audio>
    <audio id="audio_count">
        <source type="audio/mpeg" src="<?php echo base_url('/assets/audio/second_countdown.mp3'); ?>">
    </audio>

    <div class="container celebration_container">

        <div class="row celebration-row">
            <div class="col-4">
                <select class="celebration_input" id="inhabitants" name="inhabitants">
                    <?php foreach($inhabitants as $row) { ?>
                        <option class="celebration_option"  value="<?php echo $row['inhabitantID'];?>">
                            <?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?>
                        </option>
                    <?php }?>
                </select>
            </div>

            <div class="col-4">
                <select class="celebration_input" id="settings" name="settings">
                    <option class="celebration_option" value="automatic">automatic</option>
                    <option class="celebration_option" value="controller">controller</option>
                    <option class="celebration_option" value="keyboard">keyboard</option>
                </select>
            </div>

            <button class="col-4 celebration_btn" id="button" onclick="setCelebrated()">
                start
            </button>
            
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url('/assets/scripts/p5.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/scripts/celebration1.js'); ?>"></script>
    <?php foreach($inhabitants as $row) { ?>
        <input type="hidden" id="<?php  echo "inhabitant".$row['inhabitantID']?>" name="<?php echo "inhabitant".$row['inhabitantID']?>" value="<?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?>">
    <?php }?>

</div>
<script>
    function setCelebrated(){
        var no=document.getElementById("inhabitants").value;
        $.post('/CelebrationController/setCelebrated',{id:no})
    }
</script>