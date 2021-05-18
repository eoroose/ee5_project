<div>
    <script src='/assets/scripts/jquery-3.6.0.min.js'></script>
    <link href="/assets/css/journal.css" rel="stylesheet" type="text/css" />

    <div class="container journal-container main-bottom-padding">
        <h3 class="main-title journal-title">Journal</h3>

        <div class="row journal-row">
            
            <div class="col-12 card journal-btn">
                <button onclick="openForm()">
                    <img src="/assets/images/journal_page/pencil.svg" alt="pencil image">
                </button>
            </div>

            <?php foreach ($entries as $entry): ?>
                <div class="journal-card">

                    <div class="card journal-card-clickable">
                        <div class="card-body journal-card-body">
                            <img src="/assets/images/journal_page/agenda.svg" alt="agenda image">
                            <p> <?php echo $entry->title?></p>
                        </div>
                        <a id="<?php echo $entry->journalEntryID?>" onclick="openPage(this)" class="stretched-link"></a>
                    </div>

                    <div class="journal-card-buttons">
                        <button class="journal-card-btn" id="change<?php echo $entry->journalEntryID?>" onclick="openChangeModal(this.id)">
                            <img src="/assets/images/tasks_page/edit.svg" class="journal-btn-svg" alt="edit image">
                        </button>

                        <button class="journal-card-btn" id="remove<?php echo $entry->journalEntryID?>" onclick="removeEntry(this.id)">
                            <img src="/assets/images/tasks_page/trash.svg" class="journal-btn-svg" alt="trash image">
                        </button>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <div id="newEntryModal" class="main-modal">
        <div class="journal-modal-content card main-card">
    
            <h4>New journal entry</h4>

            <label for="JETitle"><b>title</b></label>
            <input type="text" class="form-control main-input journal-input" placeholder="Enter title" id="JETitle" required>

            <label for="JEText"><b>entry</b></label>
            <textarea class="form-control main-input journal-input" cols="40" rows="5" placeholder="Enter entry" id="JEText" required></textarea>
            <div class="journal-modal-btns">
                <button type="submit" class="main-modal-btn" onclick="submitFormJE()">Create</button>
                <button type="submit" class="main-modal-btn" onclick="closeFormEE()">Cancel</button>
            </div>
        </div>
    </div>

    <div id="journalModal" class="modal">
        <div id="paper">
            <div id="pattern">
                <div id="content">

                </div>
            </div>
        </div>
    </div>

    <div id="changeEntryModal" class="main-modal">
        <div class="journal-modal-content card main-card">
    
            <h4>edit journal entry</h4>
            
            <input type="text" id="CEID">

            <label for="CETitle"><b>title</b></label>
            <input type="text" class="form-control main-input journal-input" placeholder="Enter title" id="CETitle" required>

            <label for="CEText"><b>entry</b></label>
            <textarea class="form-control main-input journal-input" cols="40" rows="5" placeholder="Enter entry" id="CEText" required></textarea>
            <div class="journal-modal-btns">
                <button type="submit" class="main-modal-btn" onclick="changeEntry()">apply</button>
                <button type="submit" class="main-modal-btn" onclick="closeFormCE()">Cancel</button>
            </div>
        </div>
    </div>

</div>

<script>
    function openPage(e){
        //alert(e.id);
        $.get('/journalController/getJournalEntry',{id:e.id}, function (data) {
                let Js = data.substring(1, data.length -1);
                let Json = JSON.parse(Js);
                let div = document.querySelector('#content');
                div.innerHTML = Json["title"];
                div.innerHTML += "<br> <br>";
                div.innerHTML += Json["entry"];

            })
        document.querySelector('#journalModal').style.display = 'block';
    }

    window.onclick = function(event) {
        let modal = document.getElementById('journalModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function openForm(){
        document.querySelector('#newEntryModal').style.display = 'block';

    }
    function  closeFormEE() {
        document.getElementById('JETitle').value ="";
        document.getElementById('JEText').value="";
        document.querySelector('#newEntryModal').style.display = 'none';
    }

    function submitFormJE(){
        let title = document.getElementById('JETitle').value;
        let text = document.getElementById('JEText').value;
        let id;
        $.get('/journalController/addJournalEntry',{title:title,text:text}, function (data) {
           id = data;
        })


        //This line is needed to make sure the page isn't reloaded before the get is done
        let x = id;


        // let div = document.querySelector('#myUL');
        // div.innerHTML += id;
        // div.innerHTML += "'onclick='openPage(this)'>";
        // div.innerHTML += title;
        // div.innerHTML += "</li>";
        document.querySelector('#newEntryModal').style.display = 'none';

        setTimeout(() => {  location.reload(); }, 500);
    }

    function delete_row(id){
        alert(id);
    }

    function removeEntry(id){
        var r= confirm("Weet je zeker dat je deze wilt verwijderen?");
        if(r==true)
        {
            $.get('/JournalController/removeEntry',{ID:id.substring(6,14)});
            document.location.reload();
        }


    }

    function openChangeModal(id){
        // alert('hoi');
        document.getElementById("CEID").style.display = "none";
        document.querySelector("#CEID").value = id;
        $.get('/JournalController/getJournalEntry',{id:id.substring(6,14)}, function (data) {
            let Js = data.substring(1, data.length -1);
            let Json = JSON.parse(Js);


            document.querySelector("#CETitle").value = Json["title"];
            document.querySelector("#CEText").value = Json["entry"];
        })
        document.getElementById("changeEntryModal").style.display = "block";
    }

    function changeEntry(){
        var id = document.querySelector("#CEID").value;
        var titleZ = document.querySelector("#CETitle").value;
        var textZ = document.querySelector("#CEText").value;
        $.get('/JournalController/changeJournalEntry',{id:id.substring(6,14),title:titleZ,text:textZ});

        setTimeout(() => {  location.reload(); }, 500);

    }

    function closeFormCE(){
        document.getElementById("changeEntryModal").style.display = "none";
    }

</script>