<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link href='lib/main.css' rel='stylesheet' />
    <script src='lib/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
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