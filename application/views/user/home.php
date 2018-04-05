<!DOCTYPE html>
<html>
	<head>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/css/icon.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/pickadate/lib/themes/default.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/pickadate/lib/themes/default.date.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url() ?>aset/pickadate/lib/themes/default.time.css">
		<link rel="shortcut icon" type="x-icon" href="<?=base_url() ?>aset/img/colorfullogo.png">

		<?php if (isset($calendar_js)) { ?>
			<link rel="stylesheet" href="<?=base_url() ?>aset/fullcalendar/fullcalendar.min.css">
    		<link rel="stylesheet" href="<?=base_url() ?>aset/fullcalendar/fullcalendar.print.css" media="print">
		<?php } ?>

		<?php if (isset($redir)) { ?>
			<meta http-equiv='refresh' content='2;url=<?=site_url('app') ?>'>
		<?php } ?>

		<?php if (isset($feed)) { ?>
			<meta http-equiv='refresh' content='2;url=<?=site_url('settings/4') ?>'>
		<?php } ?>

		<title><?=$title ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="row">
			<nav class="blue">
				<div class="nav-wrapper col s12">
					<div class="container">
						<?php if (!isset($redir) AND !isset($feed)) { ?>
						<div class="brand-logo left"><a href="<?=site_url('app') ?>"><img class="responsive-image" style="height: auto; width: 35px; padding-top: 10px; padding-bottom: 10px" src="<?=base_url() ?>aset/img/whitelogo.png"></a></div>
							<ul id="nav-mobile" class="right">
								<li style="cursor: pointer; padding-right: 10px;"><a href="#profile" class="modal-trigger"><i class="material-icons left" style="font-size: 12pt">account_circle</i><?=$name->username; ?></a></li>
								<li><a href="<?=site_url('settings') ?>"><i class="material-icons" style="font-size:13pt">settings</i></a></li>
							</ul>

						<?php } ?>
					</div>
				</div>
			</nav>
			<?php $this->load->view($content); ?>
			<?php if (isset($active_js)) { ?>
			<div class="fixed-action-btn">
				<a href="#modal1" class="btn-floating btn-large waves-effect waves-light teal right hoverable modal-trigger"><i class="material-icons">add</i></a>
			</div>
			<div id="modal1" class="modal">
				<div class="modal-footer">
					<a href="" style="top: 15px; right: 15px;" class="modal-action modal-close waves-effect waves-green"><i class="material-icons">close</i></a>
				</div>
				<div class="modal-content" style="padding: 15px;">
					<h5 style="margin-top: 0px; margin-bottom: 16px;" class="center-align teal-text">Add new Task to be done</h5>
					<div class="row">
						<form action="<?=site_url('home/add_task') ?>" enctype="multipart/form-data" method="post">
							<div class="input-field col s12 m12">
								<label for="name_task">Task Name</label>
								<input type="text" class="validate" name="task_name" id="name_task" required="true" data-length="50">
							</div>
							<div class="input-field col s6 m3">
								<label for="input_01">Due Date</label><br><br>
								<input
								id="input_01"
								class="datepicker"
								name="due_date"
								type="date"
								autofocuss
								data-valuee="2014-08-08">
								<!-- <input type="date" id="due" name="due_date" class="validate" required="true"> -->
							</div>
							<div class="input-field col s6 m3">
								<label for="input_from">Due Time</label><br><br>
								<input
								id="input_from"
								class="timepicker"
								type="time"
								name="due_time"
								autofocuss>
							</div>
							<div class="file-field input-field col s12 m6">
								<label for="photo">Preview Image</label><br><br>
								<div class="btn teal">
									<span><i class="material-icons">add_a_photo</i></span>
									<input id="photo" type="file" name="task_img">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" value="Add Preview Image" type="text" name="img_name">
								</div>
							</div>
							<div class="input-field col s6 m6">
								<select name="priority" required="true">
									<option value="" disabled selected>Priority</option>
									<option value="1">Low</option>
									<option value="2">Moderate</option>
									<option value="3">High</option>
								</select>
							</div>
							<div class="input-field col s6 m6">
								<select name="project" required="true">
									<option value="" disabled selected>Project</option>
									<?php foreach ($project as $q) { ?>
										<option value="<?=$q->id_project ?>"><?=$q->name_project ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="input-field col s12 m12">
								<label for="note">Add Some Note</label>
								<textarea id="note" class="validate materialize-textarea" name="note" data-length="100"></textarea>
							</div>
							<div class="input-field col s12 m12">
								<button type="submit" name="btn" class="btn-large teal right"><i class="material-icons">add</i></button>
							</div>
						</form>
						
					</div>
				</div>
				
			</div>
		</div>
		<br><br><br><br><br><br><br>
		<div id="expand"></div>
		<?php } ?>
		<script type="text/javascript" src="<?=base_url() ?>aset/js/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>aset/js/materialize.min.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>aset/js/init.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>aset/pickadate/lib/picker.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>aset/pickadate/lib/picker.date.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>aset/pickadate/lib/picker.time.js"></script>
		<script type="text/javascript" src="<?=base_url() ?>aset/pickadate/lib/legacy.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.modal').modal();
				$('select').select();
				$('#note').trigger('autoresize');
				$('input#name_task, textarea#note').characterCounter();
			});
		</script>
		<script type="text/javascript">
		var $input = $( '.datepicker' ).pickadate({
		formatSubmit: 'yyyy-mm-dd',
		// min: [2015, 7, 14],
		container: '#expand',
		// editable: true,
		closeOnSelect: true,
		closeOnClear: true,
		})
		var picker = $input.pickadate('picker')
		// picker.set('select', '14 October, 2014')
		// picker.open()
		// $('button').on('click', function() {
		//     picker.set('disable', true);
		// });
		</script>
		<script type="text/javascript">
		var $input = $( '.timepicker' ).pickatime({
			formatSubmit: 'h:i:s',
		// min: [2015, 7, 14],
		container: '#expand',
		// editable: true,
		closeOnSelect: true,
		closeOnClear: true,
		})
		// var picker = $input.pickatime('picker')
		
		</script>

	<?php if (isset($calendar_js)) { ?>
		<script src="<?=base_url() ?>aset/js/jquery-ui.min.js"></script>
		<script src="<?=base_url() ?>aset/js/moment.min.js"></script>
	    <script src="<?=base_url() ?>aset/fullcalendar/fullcalendar.min.js"></script>
	    <!-- Page specific script -->
	    <script>
	      $(function () {

	        /* initialize the externall events
	         -----------------------------------------------------------------*/
	        function ini_events(ele) {
	          ele.each(function () {

	            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
	            // it doesn't need to have a start or end
	            var eventObject = {
	              title: $.trim($(this).text()) // use the element's text as the event title
	            };

	            // store the Event Object in the DOM element so we can get to it later
	            $(this).data('eventObject', eventObject);

	            // make the event draggable using jQuery UI
	            $(this).draggable({
	              zIndex: 1070,
	              revert: true, // will cause the event to go back to its
	              revertDuration: 0  //  original position after the drag
	            });

	          });
	        }
	        ini_events($('#external-events div.external-event'));

	        /* initialize the calendar
	         -----------------------------------------------------------------*/
	        //Date for the calendar events (dummy data)
	        var date = new Date();
	        var d = date.getDate(),
	                m = date.getMonth(),
	                y = date.getFullYear();
	        $('#calendar').fullCalendar({
	          header: {
	            left: 'prev,next today',
	            center: 'title',
	            right: 'month,agendaWeek,agendaDay'
	          },
	          buttonText: {
	            today: 'today',
	            month: 'month',
	            week: 'week',
	            day: 'day'
	          },
	          editable: true,
	          droppable: true, // this allows things to be dropped onto the calendar !!!
	          drop: function (date, allDay) { // this function is called when something is dropped

	            // retrieve the dropped element's stored Event Object
	            var originalEventObject = $(this).data('eventObject');

	            // we need to copy it, so that multiple events don't have a reference to the same object
	            var copiedEventObject = $.extend({}, originalEventObject);

	            // assign it the date that was reported
	            copiedEventObject.start = date;
	            copiedEventObject.allDay = allDay;
	            copiedEventObject.backgroundColor = $(this).css("background-color");
	            copiedEventObject.borderColor = $(this).css("border-color");

	            // render the event on the calendar
	            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
	            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

	            // is the "remove after drop" checkbox checked?
	            if ($('#drop-remove').is(':checked')) {
	              // if so, remove the element from the "Draggable Events" list
	              $(this).remove();
	            }

	          }
	        });

	        /* ADDING EVENTS */
	        var currColor = "#3c8dbc"; //Red by default
	        //Color chooser button
	        var colorChooser = $("#color-chooser-btn");
	        $("#color-chooser > li > a").click(function (e) {
	          e.preventDefault();
	          //Save color
	          currColor = $(this).css("color");
	          //Add color effect to button
	          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
	        });
	        $("#add-new-event").click(function (e) {
	          e.preventDefault();
	          //Get value and make sure it is not null
	          var val = $("#new-event").val();
	          if (val.length == 0) {
	            return;
	          }

	          //Create events
	          var event = $("<div />");
	          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
	          event.html(val);
	          $('#external-events').prepend(event);

	          //Add draggable funtionality
	          ini_events(event);

	          //Remove event from text input
	          $("#new-event").val("");
	        });
	      });
	    </script>
	<?php } ?>

	<?php if (isset($achievement_js)) { ?>
		<script src="<?=base_url() ?>aset/js/chart.min.js"></script>
		<script type="text/javascript">
      $(function () {
      	var areaChartData = {
          labels: [
          	<?php foreach ($achieve as $s) {
          		echo '"'.convert_date($s->date).'", ';
          	} ?>
          		],
          datasets: [
            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [
              	<?php foreach ($achieve as $s) {
              		echo '"'.$s->task_done.'", ';
              	} ?>
              ]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);
    });
		</script>
	<?php } ?>
	</body>
</html>