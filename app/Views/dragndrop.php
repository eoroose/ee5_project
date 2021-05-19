<div>
    <script src='/assets/scripts/jquery-3.6.0.min.js'></script>
    <link href="/assets/css/chores.css" rel="stylesheet" type="text/css" />

    <div class="container chores-container main-bottom-padding">
        <h3 class="main-title chores-title">Chores</h3>

        <div class="row chores-row">
            <?php foreach ($chores as $chore): ?>
            
                <div class="card chores-chore-card">
                    <h3 class="main-title chores-chore-title" id="title<?php echo $chore->choreID?>"><?php echo $chore->description?></h3>
                    
                    <!-- REMOVE BUTTON -->
                    <?php if(session()->get('role') !='inhabitant'): ?>
                        <?php if ($chore->choreID!=1): ?>
                                <div class="chores-chore-remove-container">
                                    <button class="chores-chore-remove-btn" id="<?php echo $chore->choreID?>" class="open-button" onclick="removeChore(this.id)">
                                        <img src="/assets/images/tasks_page/trash.svg" class="chores-chore-remove-svg" alt="trash image">
                                    </button>
                                </div>
                        <?php endif; ?>
                    <?php endif; ?>


                    <!-- DRAG & DROP AREA -->
                    <div class="row chores-drop-area" id="drop<?php echo $chore->choreID?>" ondrop="drop(event)" ondragover="allowDrop(event)">

                        <?php foreach ($users as $user): ?>
                            <?php if($user['chore'] == $chore->choreID): ?>

                                <?php if(session()->get('role') !='inhabitant'): ?>
                                    <div class="col chores-inhabitant" draggable="true" ondragstart="drag(event)" id="drag<?php echo $user['inhabitantID'];?>">
                                <?php else: ?>
                                    <div class="col chores-inhabitant">
                                <?php endif; ?>
                                
                                    <img class="card-img-top chores-inhabitant-img" src="<?php echo $user['location'];?>">
                                    <p><?php echo $user['firstname'];?> <?php echo $user['lastname'];?></p>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                </div>

            <?php endforeach; ?>
            
            <!-- NEW CHORE -->
            <?php if(session()->get('role') !='inhabitant'): ?>
                <div class="card chores-chore-card chores-new-chore">
                    <h3 class="main-title chores-chore-title">New Chore</h3>

                    <div class="col-12 chores-inputs">
                        <h1><b>Title: </b>
                            <input type="text" id="NewChoreTitle" class="form-control main-input chores-inputs-input" placeholder="add chore title" required>
                        </h1>

                        <h1>
                            <button class="form-control chores-btn chores-add-btn" type="edit" onclick="addChore()">
                                <img src="/assets/images/tasks_page/add.svg" class="chores-btn-svg" alt="edit image">
                            </button>
                        </h1>
                    </div>
                </div>
            <?php endif; ?>

        </div>


    </div>
</div>


<?php if(session()->get('role')=='inhabitant'){} else {?>
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
    <?php } ?>

