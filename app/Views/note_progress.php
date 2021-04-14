<?php $phase=0;?>
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 800px;
        overflow: auto;
        max-width: 800px;
    }
    .table-wrapper-scroll-y {
        display: block;
    }

</style>

<div class="container table-wrapper-scroll-y my-custom-scrollbar" style="padding-top: 2em">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered  table-striped mb-0" id="dtVerticalScrollExample">
                <thead>
                <tr>
                    <th scope="col" class="first-col">phase</th>
                    <th scope="col" class="first-col">tasks</th>
                    <?php foreach ($inhabitants as $row1)
                    {?>
                    <th scope="col"><?php echo $row1['firstname'] ?> <?php echo $row1['lastname'] ?></th>
                    <?php }?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($tasks as $row)
                { ?>
                    <tr id="<?php echo "row".$row['taskID']?>">
                        <?php if($row['phase']==$phase){ ?>
                        <th class="fixed-side" id="<?php echo "phase_row".$row['taskID']?>"></th>
                        <?php
                        }
                        else{
                            $phase=$row['phase'];
                            ?>
                            <th class="fixed-side" id="<?php echo "phase_row".$row['taskID']?>"><?php echo $phase; ?></th>
                        <?php
                        }
                        ?>
                        <th class="fixed-side" id="<?php echo "phase_row".$row['taskID']?>"><?php echo $row['description']?></th>
                        <?php foreach ($inhabitants as $row1)
                        {?>
                            <?php foreach ($progress as $progress_row){
                                if($progress_row['taskID']==$row['taskID'])
                                {if ($progress_row['inhabitantID']==$row1['inhabitantID'])
                                {
                            ?>
                                <td>
                                    <button type="edit" id="<?php echo "complete".$progress_row['progressID']?>" class="btn btn-success" onclick="uncomplete('<?php echo $progress_row['progressID']?>')" style="width: 50px; display: <?php if($progress_row['isCompleted']==1){echo 'block';}else{echo 'none';} ?>"><img src="/assets/images/edit.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button>
                                    <button type="save" id="<?php echo "uncomplete".$progress_row['progressID']?>" class="btn btn-danger" onclick="complete('<?php echo $progress_row['progressID']?>')" style="width: 50px; display: <?php if($progress_row['isCompleted']==0){echo 'block';}else{echo 'none';} ?>"><img src="/assets/images/download.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button>
                                </td>
                                <?php    }
                                }

                             }
                        }?>

                    </tr>
                <?php }
                ?>


                </tbody>
            </table>
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
        document.getElementById("complete"+no).style.display="none";
        document.getElementById("uncomplete"+no).style.display="block";

        document.getElementById("id").value=no;
        document.getElementById("form1").submit();
    }


    function uncomplete(no)
    {
        document.getElementById("complete"+no).style.display="block";
        document.getElementById("uncomplete"+no).style.display="none";

        document.getElementById("id2").value=no;
        document.getElementById("form2").submit();
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
<script>
    $(document).ready(function () {
        $('#dtVerticalScrollExample').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "scrollX": true

        });
    });
</script>