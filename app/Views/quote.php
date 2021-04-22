
<h1></h1>
<div class="container" style="padding-top: 2em">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">date</th>
                    <th scope="col">description</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($quotes as $row)
                { ?>
                <tr id="<?php echo "row".$row['dailyQuoteID']?>">

                    <th id="<?php echo "date_row".$row['dailyQuoteID']?>"><?php echo $row['date']?></th>
                    <td id="<?php echo "description_row".$row['dailyQuoteID']?>"><?php echo $row['description']?></td>
                    <td>

                            <button type="edit" id="<?php echo "edit".$row['dailyQuoteID']?>" class="btn btn-success" onclick="edit_row('<?php echo $row['dailyQuoteID']?>')" style="width: 50px;"><img src="/assets/images/edit.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button>
                            <button type="save" id="<?php echo "save".$row['dailyQuoteID']?>" class="btn btn-success" onclick="save_row('<?php echo $row['dailyQuoteID']?>')" style="width: 50px; display: none"><img src="/assets/images/download.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button>

                    </td>
                    <td>
                        <button type="button" id="<?php echo "delete".$row['dailyQuoteID']?>" class="btn btn-danger" style="width: 50px;" onclick="delete_row('<?php echo $row['dailyQuoteID']?>')"><img src="/assets/images/delete.svg" width="3px" height="33px" class="card-img-top" alt="Register image"></button></td>

                </tr>
                <?php }
                ?>
                <tr>
                    <td><input type="date" id="new_date"></td>
                    <td><input type="text" id="new_description"></td>
                    <td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>

                </tr>

                </tbody>
            </table>
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

        date.innerHTML="<input type='date' id='date_text"+no+"' value='"+date_data+"'>";
        description.innerHTML="<input type='text' id='description_text"+no+"' value='"+description_data+"'>";
    }


    function save_row(no)
    {
        var date_val=document.getElementById("date_text"+no).value;
        var description_val=document.getElementById("description_text"+no).value;

        document.getElementById("date_row"+no).innerHTML=date_val;
        document.getElementById("description_row"+no).innerHTML=description_val;

        document.getElementById("edit"+no).style.display="block";
        document.getElementById("save"+no).style.display="none";
        $.post('http://localhost/quote/edit',{id:no,date:date_val,description:description_val})

    }

    function delete_row(no)
    {
        var r= confirm("Weet je zeker dat je deze wilt verwijderen?");
        if(r==true)
        {
            document.getElementById("row"+no+"").outerHTML="";
            $.post('http://localhost/quote/delete',{id:no})
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