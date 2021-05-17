<html lang='en'>
  <head>
    <meta charset='utf-8' />


<link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href='lib/main.css' rel='stylesheet' />
    <script src='lib/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap',

        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listMonth'
      },

      events:'selectCalendar.php',
    });
        calendar.render();
      });



    </script>
  </head>
  <body>
    <div class="container">
   <div id='calendar'></div>

</div>

  </div>
  </body>
</html>