
<?php
$db = new Database();
$Con = $db->Conectar();

$sql = $Con->prepare("SELECT title, color, start, end FROM cursos");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="es">

<head>
  <title>Calendario Web</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>

</head>

<body>

  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div id='calendar'></div>
    </div>
  </div>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: "es",
          headerToolbar:{
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          dateClick:function(info){
            alert("Valor: "+info.dateStr);
            $("#exampleModal").modal('toggle');
          },
          eventClick:function(info){
            console.log(info.event.title);
            console.log(info.event.start);
            var titulo = info.event.title;
            console.log("Holap: "+titulo);
            $("#NameEvent").html(info.event.title);
            $("#StartEvent").html(info.event.start);
            $("#EndEvent").html(info.event.end);
            <?php
            $Variable = 'titulo';
            ?>
            $("#exampleModal").modal('toggle');
            },
            
            events: [
            <?php 
            foreach($res as $row){
              ?>
              {
                title: '<?php echo $row['title'] ?>',
                start: '<?php echo $row['start'] ?>',
                end: '<?php echo $row['end'] ?>',
                color: '<?php echo $row['color'] ?>'
              },
              <?php } ?>
              {
                title: 'Evento Prueba',
                start: '2022-10-15T12:30:00',
                end: '2022-10-15T15:00:00',
                color: '#FFF000'
              }
            ]    //'http://localhost/Proyecto-Integrador/Courses/AluSeeCourse.php',
          });
          calendar.render();
      });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento">COURSE DETAIL</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div><strong>COURSE:</strong> </div> <div id="NameEvent"></div> <br>
            <div><strong>START COURSE:</strong> </div> <div id="StartEvent"></div> <br>
            <div><strong>END COURSE:</strong> </div> <div id="EndEvent"></div> <br>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>

</body>
</html>