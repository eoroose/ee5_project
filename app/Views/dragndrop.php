

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
        .drag{
            box-sizing: border-box;
            width: fit-content;
            height: fit-content;
            padding: 1px;
            border: 1px solid black;
        }
        .img{
            user-drag: none;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
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
            if(ev.target.id.substring(0,4) == "drop"){
                $.get('/choreController/changeChore',{inhabitantID:data.substring(4,10),choreID:ev.target.id.substring(4,10)})
                ev.target.appendChild(document.getElementById(data));
            }
        }

        function removeChore(id) {
            $.get('/choreController/removeChore',{choreID:id});
            setTimeout(() => {  location.reload(); }, 500);
        }

        function addChore() {
            var title = document.querySelector("#NewChoreTitle").value;
            $.get('/choreController/addChore',{choreTitle:title});
            setTimeout(() => {  location.reload(); }, 500);
        }



    </script>



<?php foreach ($chores as $chore): ?>
    <div>
        <?php echo $chore->choreID?>
        <div id="title<?php echo $chore->choreID?>"><?php echo $chore->description?></div>
        <div class="drop" id="drop<?php echo $chore->choreID?>" ondrop="drop(event)" ondragover="allowDrop(event)">
            <?php foreach ($users as $user): ?>
                <?php if ($user['chore'] == $chore->choreID): ?>

                    <div class="drag" draggable="true" ondragstart="drag(event)" id="drag<?php echo $user['inhabitantID'];?>">
                        <img class="img" src="<?php echo $user['location'];?>"  width="88" height="31">
                        <p><?php echo $user['firstname'];?>, <?php echo $user['lastname'];?></p>
                    </div>


                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>


    <div id="removeChoresModal" >
        <div>
            <?php foreach ($chores as $chore): ?>
                <?php if ($chore->choreID!=1): ?>
                    <div>
                        <button id="<?php echo $chore->choreID?>" class="open-button" onclick="removeChore(this.id)">Remove <?php echo $chore->description?> </button>

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="addChoreModal" >
        <div>
            <label for="NewChoreTitle"><b>Title</b></label>
            <input type="text" class="form-control" placeholder="Enter title" id="NewChoreTitle" required>
            <button type="submit" class="btn" onclick="addChore()">Create</button>
        </div>
    </div>


