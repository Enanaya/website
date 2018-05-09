<?php
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  'AdminLTE./plugins/fullcalendar/fullcalendar.min',
],
['block' => 'script']);
?>
<?php $this->Html->scriptStart(['block' => true]); ?>

$(document).ready(function() {

   $('#calendar').fullCalendar({
     header: {
       left: 'prev,next today',
       center: 'title',
       right: 'month,agendaWeek,agendaDay,listWeek'
     },
     defaultDate: '2018-03-12',
     editable: true,
     navLinks: true, // can click day/week names to navigate views
     eventLimit: true, // allow "more" link when too many events
     events: {
       url: 'php/get-events.php',
       error: function() {
         $('#script-warning').show();
       }
     },
     loading: function(bool) {
       $('#loading').toggle(bool);
     }
   });

 });

<?php $this->Html->scriptEnd(); ?>
