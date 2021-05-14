<?php $phase=0;?>
<div>
    <link href="./assets/css/note_progress.css" rel="stylesheet" type="text/css" />

    <div class="container note-progress-container">
        <h3 class="main-title note-progress-title">Note progress</h3>
    

        <div class="row note-progress-row note-progress-custom-scrollbar">
            <div class="col-12 note-progress-col">
                <div class="card note-progress-card-head note-progress-card-head-phase">Phase</div>
                <div class="card note-progress-card-head note-progress-card-head-task">Task</div>
                <?php foreach ($inhabitants as $row1){ ?>
                    <div class="card note-progress-card-head note-progress-card-head-inhabitant">
                        <?php echo $row1['firstname'] ?> <?php echo $row1['lastname'] ?>
                    </div>
                <?php }?>

            </div>
            
            <?php foreach($tasks as $row){ ?>
                <div class="col-12 note-progress-col" id="<?php echo "row".$row['taskID']?>">

                    <!-- PHASE  -->
                    <?php if($row['phase']==$phase) { ?>
                        <div class="card note-progress-card-phase-blank note-progress-card-phase" id="<?php echo "phase_row".$row['taskID']?>"></div>
                    <?php } else { ?>
                        <div class="card note-progress-card-phase-number note-progress-card-phase" id="<?php echo "phase_row".$row['taskID']?>">
                            <?php if($row['phase']!=$phase) { 
                                $phase=$row['phase'];
                                echo $phase;
                            } ?>
                        </div>
                    <?php } ?>

                    <!-- TASK -->
                    <div class="card note-progress-card note-progress-card-task" id="<?php echo "phase_row".$row['taskID']?>">
                        <?php echo $row['description']?>
                    </div>

                    <!-- PROGRESS -->
                    <?php foreach ($inhabitants as $row1) { ?>
                        <?php foreach ($progress as $progress_row) {
                            if($progress_row['taskID']==$row['taskID']) {
                                if ($progress_row['inhabitantID']==$row1['inhabitantID']) { ?>
                                    <div class="card note-progress-card note-progress-card-inhabitant">
                                        
                                        <button class="note-progress-check-btn" type="edit" id="<?php echo "complete".$progress_row['progressID']?>" onclick="uncomplete('<?php echo $progress_row['progressID']?>')" style="display: <?php if($progress_row['isCompleted']==1){echo 'block';}else{echo 'none';} ?>">
                                            <img src="/assets/images/note_progress_page/check.svg" class="note-progress-btn-svg" alt="check image">
                                        </button>

                                        <button class="note-progress-cross-btn" type="save" id="<?php echo "uncomplete".$progress_row['progressID']?>" class="btn btn-danger" onclick="complete('<?php echo $progress_row['progressID']?>')" style="display: <?php if($progress_row['isCompleted']==0){echo 'block';}else{echo 'none';} ?>">
                                            <img src="/assets/images/note_progress_page/cross.svg" class="note-progress-btn-svg" alt="cross image">
                                        </button>
                                    </div>
                        <?php }}}?>  
                    <?php }?>

                </div>
            <?php }?>

            <div class="col-12 note-progress-col">
                <div class="card note-progress-card-last-phase"></div>
                <div class="card note-progress-card-last-task"></div>
                <?php foreach ($inhabitants as $row1) { ?>
                    <?php foreach ($progress as $progress_row) {
                        if($progress_row['taskID']==$row['taskID']) {
                            if ($progress_row['inhabitantID']==$row1['inhabitantID']) { ?>
                                <div class="card note-progress-card-last-inhabitant"></div>
                    <?php }}}?>  
                <?php }?>
            </div>
            
        </div>
    </div>
</div>


<div class="popup" id="edidt_popup" style="display: none"><span class="popuptext" id="myPopup">Popup text...</span></div>
<form action="/tasks/complete" id="form1">
    <input type="hidden" id="id" name="id" value="">
</form>
<form action="/tasks/uncomplete" id="form2">
    <input type="hidden" id="id2" name="id2" value="">
</form>
<script>
    function complete(no)
    {
        document.getElementById("complete"+no).style.display="block";
        document.getElementById("uncomplete"+no).style.display="none";

        $.post('tasks/complete',{id:no})
    }


    function uncomplete(no)
    {
        document.getElementById("complete"+no).style.display="none";
        document.getElementById("uncomplete"+no).style.display="block";

        $.post('tasks/uncomplete',{id:no})
    }

    function delete_row(no)
    {
        document.getElementById("row"+no+"").outerHTML="";

        document.getElementById("taskId3").value=no;
        document.getElementById("form3").submit();
    }

    function add_row()
    {
        var new_phase=document.getElementById("new_phase").value;
        var new_description=document.getElementById("new_description").value;

        document.getElementById("phase2").value=new_phase;
        document.getElementById("description2").value=new_description;
        document.getElementById("form2").submit();

    }

</script>
