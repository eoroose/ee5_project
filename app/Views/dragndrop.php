

    <script src='/assets/scripts/jquery-3.6.0.min.js'></script>

    <style>
        .drop{
            float: left;
            width: 40%;
            height: 80%;
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
        }
        #div1, #div2 {
            float: left;
            width: 40%;
            height: 80%;
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
        }
    </style>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            //data is the ID of the dragged item. It is in the form drag#
            //ev.target.id is the ID of the place the item is dragged to. It is in the form drop#
            alert(ev.target.id);

            $.get('/choreController/changeChore',{inhabitantID:data.substring(4,10),choreID:ev.target.id.substring(4,10)})
            ev.target.appendChild(document.getElementById(data));
        }
    </script>



<?php foreach ($chores as $chore): ?>
    <div>
        <div id="title<?php echo $chore->choreID?>"><?php echo $chore->description?></div>
        <div class="drop" id="drop<?php echo $chore->choreID?>" ondrop="drop(event)" ondragover="allowDrop(event)">
            <?php foreach ($users as $user): ?>
                <?php if ($user['chore'] == $chore->choreID): ?>

                    <div draggable="true" ondragstart="drag(event)" id="drag<?php echo $user['inhabitantID'];?>">
                        <img src="<?php echo $user['location'];?>"  width="88" height="31">
                        <p><?php echo $user['firstname'];?>, <?php echo $user['lastname'];?></p>
                    </div>


                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>


