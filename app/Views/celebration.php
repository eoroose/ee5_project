<div>

    <link href="/assets/css/celebration.css" rel="stylesheet" type="text/css" />

    <div class="container celebration_container">

        <div class="row celebration-row">
            <div class="col-4">
                <select class="celebration_input" id="inhabitants" name="inhabitants">
                    <?php foreach($inhabitants as $row) { ?>
                        <option class="celebration_option" value="<?php echo $row['firstname'];?> <?php echo $row['lastname'];?>">
                            <?php echo $row['firstname'];?>  <?php echo $row['lastname']; ?>
                        </option>';
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
            
            <button class="col-4 celebration_btn" id="button">
                start
            </button>
            
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url('/assets/scripts/p5.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/scripts/celebration.js'); ?>"></script>

</div>