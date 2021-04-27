
<h1></h1>
<div class="container" style="padding-top: 2em">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">phase</th>
                    <th scope="col">description</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tasks as $row)
                { ?>
                <tr id="<?php echo "row".$row['taskID']?>">

                    <th id="<?php echo "phase_row".$row['taskID']?>"><?php echo $row['phase']?></th>
                    <td id="<?php echo "description_row".$row['taskID']?>"><?php echo $row['description']?></td>
                    <td>

                            <button type="edit" id="<?php echo "edit".$row['taskID']?>" class="btn btn-success" onclick="edit_row('<?php echo $row['taskID']?>')" style="width: 50px;"><img src="/assets/images/edit.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button>
                            <button type="save" id="<?php echo "save".$row['taskID']?>" class="btn btn-success" onclick="save_row('<?php echo $row['taskID']?>')" style="width: 50px; display: none"><img src="/assets/images/download.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button>

                    </td>
                    <td>
                        <button type="button" id="<?php echo "delete".$row['taskID']?>" class="btn btn-danger" style="width: 50px;" onclick="delete_row('<?php echo $row['taskID']?>')"><img src="/assets/images/delete.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button></td>

                </tr>
                <?php }
                ?>
                <tr>
                    <td><input type="number" id="new_phase"></td>
                    <td><input type="text" id="new_description"></td>
                    <td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>

                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="popup" id="edidt_popup" style="display: none"><span class="popuptext" id="myPopup">Popup text...</span></div>

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

        phase.innerHTML="<input type='number' id='phase_text"+no+"' value='"+phase_data+"'>";
        description.innerHTML="<input type='text' id='description_text"+no+"' value='"+description_data+"'>";
    }


    function save_row(no)
    {
        var phase_val=document.getElementById("phase_text"+no).value;
        var description_val=document.getElementById("description_text"+no).value;

        document.getElementById("phase_row"+no).innerHTML=phase_val;
        document.getElementById("description_row"+no).innerHTML=description_val;

        document.getElementById("edit"+no).style.display="block";
        document.getElementById("save"+no).style.display="none";


        $.post('http://localhost/tasks/edit',{id:no,phase:phase_val,description:description_val})

    }

    function delete_row(no)
    {
        var r= confirm("Weet je zeker dat je deze wilt verwijderen?");
        if(r==true)
        {
            document.getElementById("row"+no+"").outerHTML="";
            $.post('http://localhost/tasks/delete',{id:no})
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