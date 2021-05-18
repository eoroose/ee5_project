<div>
    <link href='/fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='/assets/scripts/jquery-3.6.0.min.js'></script>
    <script src='/fullcalendar/lib/main.js'></script>
    <link href="/assets/css/agenda.css" rel="stylesheet" type="text/css" />

    <div class="container agenda-container main-bottom-padding">

        <div class="row agenda-row">
            
            <div class="col-12 card agenda-btns">
                <button class="main-modal-btn" onclick="openForm()">Add Event</button>
                <button class="main-modal-btn" onclick="openFormRecurring()">Add Recurring Event</button>
            </div>

            <div class="col-12 card agenda-calendar" id='calendar'></div>
        </div>
    </div>

    <!-- ADD EVENT MODAL -->
    <div id="myModal" class="main-modal"">
        <div class="agenda-modal-content card main-card">

            <h4>New Event</h4>

            <label for="title"><b>title</b></label>
            <input type="text" class="form-control main-input agenda-input" placeholder="Enter event" id="eventName" required>

            <label class="agenda-modal-label" for="fromDate"><b>starting</b></label>
            <input type="datetime-local" class="form-control main-input agenda-input" placeholder="Enter starting date" id="fromDate">

            <label class="agenda-modal-label" for="toDate"><b>ending</b></label>
            <input type="datetime-local" class="form-control main-input agenda-input" placeholder="Enter ending date" id="toDate">

            <label class="agenda-modal-label" for="color"><b>color</b></label>
            <input type="color" class="form-control main-input agenda-input agenda-modal-color" value="#e66465" id="color">

            <div class="row agenda-modal-btns">
                <button type="submit" class="col main-modal-btn" onclick="submitForm()">Add</button>
                <button type="submit" class="col main-modal-btn" onclick="closeForm()">Cancel</button>
            </div>
            
        </div>
    </div>

    <!-- SELECT EVENT MODAL -->
    <div id="selectEventModal" class="main-modal"">
        <div class="agenda-modal-content card main-card">

            <h4>New Event</h4>

            <label for="SETitle"><b>title</b></label>
            <input type="text" class="form-control main-input agenda-input" placeholder="Enter event" id="SETitle" required>

            <label class="agenda-modal-label" for="SEFromDate"><b>starting</b></label>
            <input type="datetime-local" class="form-control main-input agenda-input" placeholder="Enter starting date" id="SEFromDate">

            <label class="agenda-modal-label" for="SEToDate"><b>ending</b></label>
            <input type="datetime-local" class="form-control main-input agenda-input" placeholder="Enter ending date" id="SEToDate">

            <label class="agenda-modal-label" for="SEcolor"><b>color</b></label>
            <input type="color" class="form-control main-input agenda-input agenda-modal-color" value="#e66465" id="SEcolor">

            <div class="row agenda-modal-btns">
                <button type="submit" class="col main-modal-btn" onclick="submitFormSE()">Add</button>
                <button type="submit" class="col main-modal-btn" onclick="closeFormSE()">Cancel</button>
            </div>
            
        </div>
    </div>

    <!-- CHANGE EVENT MODAL -->
    <div id="existingEventModal" class="main-modal"">
        <div class="agenda-modal-content card main-card">

            <h4>Update Event</h4>

            <input type="text" class="form-control" placeholder="5" id="EEID" required>
            
            <label for="EETitle"><b>title</b></label>
            <input type="text" class="form-control main-input agenda-input" id="EETitle" required>

            <label class="agenda-modal-label" for="EEFromDate"><b>starting</b></label>
            <input type="datetime-local" class="form-control main-input agenda-input" id="EEFromDate">

            <label class="agenda-modal-label" for="EEToDate"><b>ending</b></label>
            <input type="datetime-local" class="form-control main-input agenda-input" id="EEToDate">

            <label class="agenda-modal-label" for="EEcolor"><b>color</b></label>
            <input type="color" class="form-control main-input agenda-input agenda-modal-color" value="#e66465" id="EEcolor">

            <div class="row agenda-modal-btns">
                <button type="submit" class="col main-modal-btn" onclick="submitFormEE()">Update</button>
                <button type="submit" class="col main-modal-btn" onclick="removeEvent()">Remove</button>
                <button type="submit" class="col main-modal-btn" onclick="closeFormEE()">Cancel</button>
            </div>

        </div>
    </div>

    <!-- ADD RECURRING EVENT MODAL -->
    <div id="newRecurringModal" class="main-modal">
        <div class="agenda-modal-content card main-card">

            <h4>New Recurring Event</h4>

            <label for="NRTitle"><b>title</b></label>
            <input type="text" class="form-control main-input agenda-input" placeholder="Enter event" id="NRTitle" required>

            <label class="agenda-modal-label" for="NRStart"><b>starting</b></label>
            <input type="time" class="form-control main-input agenda-input" placeholder="Enter starting time" id="NRStart">

            <label class="agenda-modal-label" for="NREnd"><b>ending</b></label>
            <input type="time" class="form-control main-input agenda-input" placeholder="Enter ending time" id="NREnd">

            <label class="agenda-modal-label" for="NRColor"><b>color</b></label>
            <input type="color" class="form-control main-input agenda-input agenda-modal-color" value="#e66465" id="NRColor">

            <label class="agenda-modal-label"><b>days</b></label>
            <div class="row agenda-modal-checkboxes">

                <div class="col">
                    <label for="NRMon">Mon:</label>
                    <input type="checkbox"   id="NRMon">
                </div>

                <div class="col">
                    <label for="NRTue">Tue:</label>
                    <input type="checkbox"   id="NRTue">
                </div>

                <div class="col">
                    <label for="NRWed">Wed:</label>
                    <input type="checkbox"   id="NRWed">
                </div>

                <div class="col">
                    <label for="NRThu">Thu:</label>
                    <input type="checkbox"   id="NRThu">
                </div>

                <div class="col">
                    <label for="NRFri">Fri:</label>
                    <input type="checkbox"   id="NRFri">
                </div>

                <div class="col">
                    <label for="NRSat">Sat:</label>
                    <input type="checkbox"   id="NRSat">
                </div>

                <div class="col">
                    <label for="NRSun">Sun:</label>
                    <input type="checkbox"   id="NRSun">
                </div>
            </div>

            <div class="row agenda-modal-btns">
                <button type="submit" class="col main-modal-btn" onclick="submitFormNR()">Add</button>
                <button type="submit" class="col main-modal-btn" onclick="closeFormNR()">Cancel</button>
            </div>
        </div>
    </div>
    
</div>


<!-- <meta charset='utf-8' />

<link href='/fullcalendar/lib/main.css' rel='stylesheet' />
<script src='/assets/scripts/jquery-3.6.0.min.js'></script>
<script src='/fullcalendar/lib/main.js'></script>
<link href="/assets/css/agenda.css" rel="stylesheet" type="text/css" /> -->


<script>


    var calendar;
    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable:true,
            selectable:true,
            firstDay:1,
            eventTimeFormat: { // like '14:30:00'
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                meridiem: true
            },
            eventDrop: function(info) {
                if (!confirm(info.event.title + " was dropped on " + info.event.start)) {
                    info.revert();
                }else{
                    alert(info.event.id);
                    $.post('/agendaController/alterInDatabase2',{id:info.event.id.substring(1), start:info.event.startStr, end:info.event.endStr});
                }
            },
            select: function(info) {
                // Ask for a title. If empty it will default to "New event"


                document.getElementById("selectEventModal").style.display = "block";
                document.querySelector('#SEFromDate').value = addTime(info.start);
                document.querySelector('#SEToDate').value = addTime(info.end);
                // Whatever happens, unselect selection
                calendar.unselect();

            }, // End select callback

            // Make events editable, globally
            editable : true,

            // Callback triggered when we click on an event

            eventClick: function(info){
                // Ask for a title. If empty it will default to "New event"
                if(info.event.id.startsWith('e')){
                    alert(info.event.id)
                    document.getElementById("existingEventModal").style.display = "block";
                    document.getElementById("EEID").style.display = "none";
                    document.querySelector('#EEID').value = info.event.id;
                    document.querySelector('#EETitle').value = info.event.title;
                    document.querySelector('#EEFromDate').value = dateTime(info.event.start);
                    document.querySelector('#EEToDate').value = dateTime(info.event.end);
                    document.querySelector('#EEcolor').value = info.event.backgroundColor;
                }else if(info.event.id.startsWith('a')){
                    alert(info.event.id)
                    document.getElementById("existingAppointmentModal").style.display = "block";
                    document.getElementById("EAID").style.display = "none";
                    document.querySelector('#EAID').value = info.event.id;
                    document.querySelector('#EADate').value = dateTime(info.event.start);
                }else if(info.event.groupId.startsWith('r')){
                    if(confirm('Do you want to delete this recurring event?')){
                        $.get('/agendaController/removeRecurring',{id:info.event.groupId.substring(1)})
                        info.event.remove();

                    }
                    // //alert(info.event.end);
                    // document.getElementById("ERID").style.display = "none";
                    // document.querySelector('#ERID').value = info.event.groupId;
                    // document.querySelector('#ERTitle').value = info.event.title;
                    // document.querySelector('#ERStart').value = getTime(info.event.start);
                    // document.querySelector('#EREnd').value = getTime(info.event.end);
                    // document.getElementById("existingReccuringModal").style.display = "block";
                }

            }, // End callback eventClick
            headerToolbar:{
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            eventSources: [

                {
                    url: '/agendaController/getEvents'
                },
                {
                    url:'/agendaController/getAppointments',
                    color: 'yellow'
                },
                {
                    url: '/agendaController/getRecurringEvents'
                },
                {
                    url: '/agendaController/getBirthdays',
                    color: 'green',
                    editable: false
                }
            ],

            //events: 'http://localhost:8081/public/agendaController/getEvents'

            customButtons: {
                addEventButton: {
                    text: 'Add event',
                    click: function() {
                        var dateStr = prompt('Enter a date in YYYY-MM-DD format');
                        var titleStr = prompt('Enter a title');
                        var date = new Date(dateStr + 'T00:00:00'); // will be in local time

                        $.post('/home/agenda3',{title:titleStr,date:dateStr})

                        if (!isNaN(date.valueOf())) { // valid?
                            calendar.addEvent({
                                title: titleStr,
                                start: date,
                                allDay: true
                            });

                        } else {
                            alert('Invalid date.');
                        }
                    }
                }
            }
        });
        calendar.render();

    });


    function openForm() {
        document.getElementById("myModal").style.display = "block";
    }

    function openFormAppointment() {
        document.getElementById("myModalAppointment").style.display = "block";
    }


    function openFormRecurring() {
        document.getElementById("newRecurringModal").style.display = "block";
    }



    function closeForm() {
        document.getElementById("myModal").style.display = "none";
    }

    function closeFormAppointment() {
        document.getElementById("myModalAppointment").style.display = "none";
    }

    function closeFormNR() {
        document.getElementById("newRecurringModal").style.display = "none";
    }

    function submitForm() {
        var titleStr = document.querySelector('#eventName').value;
        var startStr = document.querySelector('#fromDate').value;
        var endStr = document.querySelector('#toDate').value;
        var colorStr = document.querySelector('#color').value;
        $.get('/agendaController/addEvent',{title:titleStr,start:startStr,end:endStr,color:colorStr}, function (data) {
            calendar.addEvent({
                id: data,
                title: titleStr,
                start: startStr,
                end: endStr,
                color: colorStr
            })

        })
        document.getElementById("myModal").style.display = "none";
    }


    function submitFormNR() {
        var titleStr = document.querySelector('#NRTitle').value;
        var startStr = document.querySelector('#NRStart').value;
        var endStr = document.querySelector('#NREnd').value;
        var colorStr = document.querySelector('#NRColor').value;
        var recurringDays = '';
        if(document.querySelector('#NRMon').checked){recurringDays += '1,'};
        if(document.querySelector('#NRTue').checked){recurringDays += '2,'};
        if(document.querySelector('#NRWed').checked){recurringDays += '3,'};
        if(document.querySelector('#NRThu').checked){recurringDays += '4,'};
        if(document.querySelector('#NRFri').checked){recurringDays += '5,'};
        if(document.querySelector('#NRSat').checked){recurringDays += '6,'};
        if(document.querySelector('#NRSun').checked){recurringDays += '0,'};
        $.get('/agendaController/addRecurringEvent',{title:titleStr,start:startStr,end:endStr,color:colorStr,recur:recurringDays}, function (data) {
            calendar.addEvent({
                id: data,
                title: titleStr,
                startTime: startStr,
                endTime: endStr,
                color: colorStr,
                daysOfWeek: recurringDays
            })

        })
        document.getElementById("newRecurringModal").style.display = "none";
    }


    function submitFormAppointment() {
        var startStr = document.querySelector('#fromDateA').value;
        $.get('/agendaController/addAppointment',{start:startStr}, function (data) {
            calendar.addEvent({
                id: data,
                start: startStr,
                color: 'yellow'
            })

        })
        document.getElementById("myModalAppointment").style.display = "none";
    }


    function submitFormSE() {
        var titleStr = document.querySelector('#SETitle').value;
        var startStr = document.querySelector('#SEFromDate').value;
        var endStr = document.querySelector('#SEToDate').value;
        var colorStr = document.querySelector('#SEcolor').value;
        $.get('/agendaController/addEvent',{title:titleStr,start:startStr,end:endStr,color:colorStr}, function (data) {
            calendar.addEvent({
                id: data,
                title: titleStr,
                start: startStr,
                end: endStr,
                color: colorStr
            })

        })
        document.getElementById("selectEventModal").style.display = "none";
    }



    function submitFormEE() {

        var idV = document.querySelector("#EEID").value;
        alert(document.querySelector("#EEID").value);
        var startStr = document.querySelector('#EEFromDate').value;
        var endStr = document.querySelector('#EEToDate').value;
        var titleStr = document.querySelector('#EETitle').value;
        var color = document.querySelector('#EEcolor').value;

        var event = calendar.getEventById(idV);

        event.setProp('title', titleStr);
        event.setStart(startStr);
        event.setEnd(endStr);
        event.setProp('color', color)


        $.get('/agendaController/changeEvent',{title:titleStr,start:startStr,end:endStr,id:idV.substring(1)})

        document.getElementById("existingEventModal").style.display = "none";
    }

    function submitFormEA() {

        var idV = document.querySelector("#EAID").value;
        alert(idV);
        var startStr = document.querySelector('#EADate').value;

        var event = calendar.getEventById(idV);

        event.setStart(startStr);


        $.get('/agendaController/changeAppointment',{start:startStr,id:idV.substring(1)})

        document.getElementById("existingAppointmentModal").style.display = "none";
    }


    function closeFormEE() {
        document.getElementById("existingEventModal").style.display = "none";
    }

    function closeFormEA() {
        document.getElementById("existingAppointmentModal").style.display = "none";
    }

    function closeFormSE() {
        document.getElementById("selectEventModal").style.display = "none";
    }



    function removeEvent() {
        if (confirm("Are you sure you want to delete this event?")) {
            var idV = document.querySelector("#EEID").value;
            calendar.getEventById(idV).remove();
            document.getElementById("existingEventModal").style.display = "none";
            $.get('/agendaController/removeEvent',{id:idV.substring(1)})
        }

    }
    //////////////////Function to remove recurring event

    // function removeER() {
    //     if (confirm("Are you sure you want to delete all instances of this event?")) {
    //         var idV = document.querySelector("#ERID").value;
    //         calendar.getEventById(idV).remove();
    //         document.getElementById("existingReccuringModal").style.display = "none";
    //         $.get('http://localhost:8081/public/agendaController/removeRecurring',{id:idV.substring(1)})
    //     }
    //
    // }


    function removeAppointment() {
        if (confirm("Are you sure you want to delete this appointment?")) {
            var idV = document.querySelector("#EEID").value;
            calendar.getEventById(idV).remove();
            document.getElementById("existingEventModal").style.display = "none";
            $.get('/agendaController/removeAppointment',{id:idV.substring(1)})
        }

    }

    function addTime(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-') + 'T00:00';

    }

    function dateTime(date) {


        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear(),
            hours = '' + d.getHours().toString(),
            minutes = '' + d.getMinutes();


        if (hours.length < 2)
            hours = '0' + hours;
        if (minutes.length < 2)
            minutes = '0' + minutes;
        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;
        var date1 = [year, month, day].join('-')
        var date2 = 'T'
        var date3 = [hours, minutes].join(':')

        var date = date1.concat(date2);
        date = date.concat(date3);

        //return [year, month, day].join('-') + 'T' + [hours, minutes, seconds].join(':') + 'Z';
        return date;
    }


    function getTime(date) {


        var d = new Date(date),
            hours = '' + d.getHours().toString(),
            minutes = '' + d.getMinutes(),
            seconds = '' + d.getSeconds();


        if (hours.length < 2)
            hours = '0' + hours;
        if (minutes.length < 2)
            minutes = '0' + minutes;
        if (seconds.length < 2)
            seconds = '0' + seconds;
        //return [year, month, day].join('-') + 'T' + [hours, minutes, seconds].join(':') + 'Z';
        return [hours, minutes, seconds].join(':');
    }

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }






</script>


<!-- <button class="open-button" onclick="openForm()">Add Event</button>

<button class="open-button" onclick="openFormAppointment()">Add Appointment</button>

<button class="open-button" onclick="openFormRecurring()">Add Recurring Event</button>


<div id='calendar'></div>


<div id="selectEventModal" class="modal"">
<div class="modal-content">

    <h1>Create Event</h1>

    <label for="SETitle"><b>Title</b></label>
    <input type="text" class="form-control" placeholder="Enter event" id="SETitle" required>

    <label for="SEFromDate">From:</label>
    <input type="datetime-local" class="form-control"  id="SEFromDate">

    <label for="SEToDate">From:</label>
    <input type="datetime-local" class="form-control"  id="SEToDate">

    <label for="SEcolor">From:</label>
    <input type="color" class="form-control" value="#e66465" id="SEcolor">

    <button type="submit" class="btn" onclick="submitFormSE()">Create</button>
    <button type="submit" class="btn cancel" onclick="closeFormSE()">Cancel</button>
</div>
</div>

<div id="existingEventModal" class="modal"">
<div class="modal-content">

    <h1>Change Event Info</h1>

    <input type="text" class="form-control" placeholder="5" id="EEID" required>

    <label for="EETitle"><b>Title</b></label>
    <input type="text" class="form-control" placeholder="Enter event" id="EETitle" required>

    <label for="EEFromDate">From:</label>
    <input type="datetime-local" class="form-control"  id="EEFromDate">

    <label for="EEToDate">From:</label>
    <input type="datetime-local" class="form-control"  id="EEToDate">

    <label for="EEcolor">From:</label>
    <input type="color" class="form-control" value="#e66465" id="EEcolor">

    <button type="submit" class="btn" onclick="submitFormEE()">Update</button>
    <button type="submit" class="btn" onclick="removeEvent()">Remove</button>
    <button type="submit" class="btn cancel" onclick="closeFormEE()">Cancel</button>
</div>
</div>


<div id="existingAppointmentModal" class="modal"">
<div class="modal-content">

    <h1>Change Event Info</h1>

    <input type="text" class="form-control" placeholder="5" id="EAID" required>

    <label for="EADate">From:</label>
    <input type="datetime-local" class="form-control"  id="EADate">

    <button type="submit" class="btn" onclick="submitFormEA()">Update</button>
    <button type="submit" class="btn" onclick="removeAppointment()">Remove</button>
    <button type="submit" class="btn cancel" onclick="closeFormEA()">Cancel</button>
</div>
</div> -->


<!--<div id="existingReccuringModal" class="modal"">-->
<!--<div class="modal-content">-->
<!---->
<!--    <h1>Change Event Info</h1>-->
<!---->
<!--    <input type="text" class="form-control" placeholder="5" id="ERID" required>-->
<!---->
<!--    <label for="ERTitle">From:</label>-->
<!--    <input type="text" class="form-control"  id="ERTitle">-->
<!---->
<!--    <label for="ERStart">From:</label>-->
<!--    <input type="time" class="form-control"  id="ERStart">-->
<!---->
<!--    <label for="EREnd">From:</label>-->
<!--    <input type="time" class="form-control"  id="EREnd">-->
<!---->
<!--    <label for="ERMon">Mon:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERMon">-->
<!---->
<!--    <label for="ERTue">Tue:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERTue">-->
<!---->
<!--    <label for="ERWed">Wed:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERWed">-->
<!---->
<!--    <label for="ERThu">Thu:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERThu">-->
<!---->
<!--    <label for="ERFri">Fri:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERFri">-->
<!---->
<!--    <label for="ERSat">Sat:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERSat">-->
<!---->
<!--    <label for="ERSun">Sun:</label>-->
<!--    <input type="checkbox" class="form-control"  id="ERSun">-->
<!---->
<!--    <button type="submit" class="btn" onclick="submitFormER()">Update</button>-->
<!--    <button type="submit" class="btn" onclick="removeER()">Remove</button>-->
<!--    <button type="submit" class="btn cancel" onclick="closeFormER()">Cancel</button>-->
<!--</div>-->
<!--</div>-->


<!-- <div id="newRecurringModal" class="modal"">
<div class="modal-content">

    <h1>Create Recurring Event</h1>

    <label for="NRTitle">From:</label>
    <input type="text" class="form-control"  id="NRTitle">

    <label for="NRStart">From:</label>
    <input type="time" class="form-control"  id="NRStart">

    <label for="NREnd">From:</label>
    <input type="time" class="form-control"  id="NREnd">

    <label for="NRColor">From:</label>
    <input type="color" class="form-control" value="#e66465" id="NRColor">

    <label for="NRMon">Mon:</label>
    <input type="checkbox"   id="NRMon">

    <label for="NRTue">Tue:</label>
    <input type="checkbox"   id="NRTue">

    <label for="NRWed">Wed:</label>
    <input type="checkbox"   id="NRWed">

    <label for="NRThu">Thu:</label>
    <input type="checkbox"   id="NRThu">

    <label for="NRFri">Fri:</label>
    <input type="checkbox"   id="NRFri">

    <label for="NRSat">Sat:</label>
    <input type="checkbox"   id="NRSat">

    <label for="NRSun">Sun:</label>
    <input type="checkbox"   id="NRSun">

    <button type="submit" class="btn" onclick="submitFormNR()">Create</button>
    <button type="submit" class="btn cancel" onclick="closeFormNR()">Cancel</button>
</div>
</div>

<div id="myModal" class="modal"">
<div class="modal-content">

    <h1>Login</h1>

    <label for="title"><b>Title</b></label>
    <input type="text" class="form-control" placeholder="Enter event" id="eventName" required>

    <label for="fromDate">From:</label>
    <input type="datetime-local" class="form-control" placeholder="Enter from date" id="fromDate">

    <label for="toDate">From:</label>
    <input type="datetime-local" class="form-control" placeholder="Enter from date" id="toDate">

    <label for="color">From:</label>
    <input type="color" class="form-control" value="#e66465" id="color">

    <button type="submit" class="btn" onclick="submitForm()">Add Event</button>
    <button type="submit" class="btn cancel" onclick="closeForm()">Cancel</button>
</div>
</div>


<div id="myModalAppointment" class="modal"">
<div class="modal-content">

    <h1>Login</h1>

    <label for="fromDateA">From:</label>
    <input type="datetime-local" class="form-control" placeholder="Enter from date" id="fromDateA">

    <button type="submit" class="btn" onclick="submitFormAppointment()">Add Event</button>
    <button type="submit" class="btn cancel" onclick="closeFormAppointment()">Cancel</button>
</div>
</div> -->
