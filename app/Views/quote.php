<div>
    <link href="./assets/css/tasks.css" rel="stylesheet" type="text/css" />

    <div class="container quote-container">
        
        <h3 class="main-title tasks-title">Quote of the day</h3>

        <div class="row tasks-row main-bottom-padding">
            <div class="col-12 tasks-col">
                <div class="card tasks-card-head tasks-card-head-phase">Date</div>
                <div class="card tasks-card-head tasks-card-head-description">Quote</div>
                <div class="card tasks-card-head tasks-card-head-edit"></div>
            </div>

            <?php foreach($quotes as $row) {?>
                <div class="col-12 tasks-col" id="<?php echo "row".$row['dailyQuoteID']?>">
                    <div class="card quote-card quote-card-phase">
                        <p id="<?php echo "date_row".$row['dailyQuoteID']?>"><?php echo $row['date']?></p>
                    </div>
                    <div class="card quote-card tasks-card-description" >
                        <p id="<?php echo "description_row".$row['dailyQuoteID']?>"><?php echo $row['description']?></p>
                    </div>
                    
                    <div class="card quote-card tasks-card-edit">
                        <div class="card-body tasks-card-body">

                            <div class="tasks-edit-save-container">
                                <button class="tasks-btn-edit-save" type="edit" id="<?php echo "edit".$row['dailyQuoteID']?>" onclick="edit_row('<?php echo $row['dailyQuoteID']?>')">
                                    <img src="/assets/images/tasks_page/edit.svg" class="tasks-btn-svg" alt="edit image">
                                </button>

                                <button class="tasks-btn-edit-save" type="save" id="<?php echo "save".$row['dailyQuoteID']?>" onclick="save_row('<?php echo $row['dailyQuoteID']?>')" style="display: none">
                                    <img src="/assets/images/tasks_page/save.svg" class="tasks-btn-svg" alt="save image">
                                </button>
                            </div>

                            <button class="tasks-btn-delete" type="button" id="<?php echo "delete".$row['dailyQuoteID']?>" onclick="delete_row('<?php echo $row['dailyQuoteID']?>')">
                                <img src="/assets/images/tasks_page/trash.svg" class="tasks-btn-svg" alt="trash image">
                            </button>
                        </div>

                    </div>
                </div>
            <?php }?>

            <div class="col-12 tasks-col">
                <div class="card quote-card quote-card-phase">
                    <input class="form-control main-input tasks-input" type="date" id="new_date">
                </div>

                <div class="card quote-card tasks-card-description">
                    <input class="form-control main-input tasks-input" type="text" id="new_description">
                </div>

                <div class="card quote-card tasks-card-edit">
                    <button class="card tasks-btn-add" type="button" onclick="add_row();">
                        <img src="/assets/images/tasks_page/add.svg" class="tasks-btn-add-svg" alt="add image">
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="popup" id="edidt_popup" style="display: none"><span class="popuptext" id="myPopup">Popup text...</span></div>

<form action="/quote/insert" id="form2">
    <input type="hidden" id="date" name="date" value="">
    <input type="hidden" id="description" name="description" value="">
</form>
<script>
    function edit_row(no)
    {
        document.getElementById("edit"+no).style.display="none";
        document.getElementById("save"+no).style.display="block";

        var date=document.getElementById("date_row"+no);
        var description=document.getElementById("description_row"+no);

        var date_data=date.innerHTML;
        var description_data=description.innerHTML;

        date.innerHTML="<input type='date' class='form-control main-input tasks-input' id='date_text"+no+"' value='"+date_data+"'>";
        description.innerHTML="<input type='text' class='form-control main-input tasks-input' id='description_text"+no+"' value='"+description_data+"'>";
        document.getElementById("description_text"+no).value=description_data;
    }


    function save_row(no)
    {
        var date_val=document.getElementById("date_text"+no).value;
        var description_val=document.getElementById("description_text"+no).value;

        document.getElementById("date_row"+no).innerHTML=date_val;
        document.getElementById("description_row"+no).innerHTML=description_val;

        document.getElementById("edit"+no).style.display="block";
        document.getElementById("save"+no).style.display="none";
        $.post('<?php  echo base_url('quote/edit'); ?>',{id:no,date:date_val,description:description_val})

    }

    function delete_row(no)
    {
        var r= confirm("Weet je zeker dat je deze wilt verwijderen?");
        if(r==true)
        {
            document.getElementById("row"+no+"").outerHTML="";
            $.post('/quote/delete',{id:no})
        }

    }

    function add_row()
    {
        var new_date=document.getElementById("new_date").value;
        var new_description=document.getElementById("new_description").value;

        document.getElementById("date").value=new_date;
        document.getElementById("description").value=new_description;
        document.getElementById("form2").submit();

    }

</script>