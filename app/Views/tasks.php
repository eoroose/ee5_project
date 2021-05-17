<div>
    <link href="/assets/css/tasks.css" rel="stylesheet" type="text/css" />

    <div class="container tasks-container">

        <h3 class="main-title tasks-title">Tasks</h3>

        <div class="row tasks-row main-bottom-padding">
            <div class="col-12 tasks-col">
                <div class="card tasks-card-head tasks-card-head-phase">Phase</div>
                <div class="card tasks-card-head tasks-card-head-description">Description</div>
                <div class="card tasks-card-head tasks-card-head-edit"></div>
            </div>
            
            <?php foreach($tasks as $row) {?>
                <div class="col-12 tasks-col" id="<?php echo "row".$row['taskID']?>">
                    <div class="card tasks-card tasks-card-phase">
                        <p id="<?php echo "phase_row".$row['taskID']?>"><?php echo $row['phase']?></p>

                    </div>
                    <div class="card tasks-card tasks-card-description" >
                        <p id="<?php echo "description_row".$row['taskID']?>"><?php echo $row['description']?></p>
                    </div>
                    
                    <div class="card tasks-card tasks-card-edit">
                        <div class="card-body tasks-card-body">

                            <div class="tasks-edit-save-container">
                                <button class="tasks-btn-edit-save" type="edit" id="<?php echo "edit".$row['taskID']?>" onclick="edit_row('<?php echo $row['taskID']?>')">
                                    <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                                </button>

                                <button class="tasks-btn-edit-save" type="save" id="<?php echo "save".$row['taskID']?>" onclick="save_row('<?php echo $row['taskID']?>')" style="display: none">
                                    <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                                </button>
                            </div>

                            <button class="tasks-btn-delete" type="button" id="<?php echo "delete".$row['taskID']?>" onclick="delete_row('<?php echo $row['taskID']?>')">
                                <img src="/assets/images/tasks_page/trash.svg" class="tasks-btn-svg" alt="trash image">
                            </button>

                        </div>
                    </div>

                </div>
            <?php }?>

            <div class="col-12 tasks-col">
                <div class="card tasks-card tasks-card-phase">
                    <input class="form-control main-input tasks-input" type="number" id="new_phase">
                </div>

                <div class="card tasks-card tasks-card-description">
                    <input class="form-control main-input tasks-input" type="text" id="new_description">
                </div>

                <div class="card tasks-card tasks-card-edit">
                    <button class="card tasks-btn-add" type="button" onclick="add_row();">
                        <img src="/assets/images/tasks_page/add.svg" class="tasks-btn-add-svg" alt="add image">
                    </button>
                </div>

            </div>
        </div>     
    </div>
</div>


<form action="/tasks/insert" id="form2">
    <input type="hidden" id="phase2" name="phase2" value="">
    <input type="hidden" id="description2" name="description2" value="">
</form>
<script>

    function edit_row(no)
    {
        document.getElementById("edit"+no).style.display="none";
        document.getElementById("save"+no).style.display="block";

        var phase=document.getElementById("phase_row"+no);
        var description=document.getElementById("description_row"+no);

        var phase_data=phase.innerHTML;
        var description_data=description.innerHTML;

        phase.innerHTML="<input class='form-control main-input tasks-input' type='number' id='phase_text"+no+"' value='"+phase_data+"' '>";
        description.innerHTML="<input class='form-control main-input tasks-input' type='text' id='description_text"+no+"' value='"+description_data+"' '>";
    }


    function save_row(no)
    {
        var phase_val=document.getElementById("phase_text"+no).value;
        var description_val=document.getElementById("description_text"+no).value;

        document.getElementById("phase_row"+no).innerHTML=phase_val;
        document.getElementById("description_row"+no).innerHTML=description_val;

        document.getElementById("edit"+no).style.display="block";
        document.getElementById("save"+no).style.display="none";


        $.post('/tasks/edit',{id:no,phase:phase_val,description:description_val})

    }

    function delete_row(no)
    {
        var r= confirm("Weet je zeker dat je deze wilt verwijderen?");
        if(r==true)
        {
            document.getElementById("row"+no+"").outerHTML="";
            $.post('/tasks/delete',{id:no})
        }
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