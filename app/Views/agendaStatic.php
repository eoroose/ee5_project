<div>
    <link href='/fullcalendar/lib/main.css' rel='stylesheet' />
    <script src='/assets/scripts/jquery-3.6.0.min.js'></script>
    <script src='/fullcalendar/lib/main.js'></script>
    <link href="/assets/css/agenda.css" rel="stylesheet" type="text/css" />

    <div class="container agenda-container main-bottom-padding agenda-calendar-inhabitant">
        <div class="row agenda-row">
            <div class="col-12 card agenda-calendar" id='calendar'></div>
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
                editable:false,
                selectable:false,
                firstDay:1,
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    meridiem: true
                },

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
                        color: 'green'
                    }
                ]



            });
            calendar.render();

        });


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
<!-- <div id='calendar'></div> -->
