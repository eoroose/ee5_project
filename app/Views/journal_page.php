

    <script src='/assets/scripts/jquery-3.6.0.min.js'></script>
    <link href="/assets/css/journal_page.css" rel="stylesheet" type="text/css" />

<div class="wrapper">
    <h1>Journal</h1>

    <button class="open-button" onclick="openForm()">Add Journal Entry</button>

    <ul id="myUL">
        <?php foreach ($entries as $entry): ?>
            <li id="<?php echo $entry->journalEntryID?>" onclick="openPage(this)"> <?php echo $entry->title?></li>
        <?php endforeach; ?>
    </ul>


<div id="newEntryModal" class="modal"">
    <div class="modal-content">

        <h1>Create a Journal Entry</h1>

        <label for="JETitle"><b>Title</b></label>
        <input type="text" class="inputSmall" placeholder="Enter title" id="JETitle" required>

        <label for="JEText"><b>Title</b></label>
        <textarea class="inputLarge" cols="40" rows="5" placeholder="Enter title" id="JEText" required></textarea>

        <button type="submit" class="btn" onclick="submitFormJE()">Create</button>
        <button type="submit" class="btn cancel" onclick="closeFormEE()">Cancel</button>
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


<script>
    function openPage(e){
        //alert(e.id);
        $.get('http://localhost/journalController/getJournalEntry',{id:e.id}, function (data) {
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
        $.get('http://localhost/journalController/addJournalEntry',{title:title,text:text}, function (data) {
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
        location.reload();
    }

</script>