<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<label for="from">From</label> <input type="text" id="from" name="from"/> <label for="to">to</label> <input type="text" id="to" name="to"/>




<script>
$('#from').datepicker(
         { 
            minDate: 0,
            beforeShow: function() {
            $(this).datepicker('option', 'maxDate', $('#to').val());
          }
       });
$('#to').datepicker(
         {
            defaultDate: "+1w",
            beforeShow: function() {
            $(this).datepicker('option', 'minDate', $('#from').val());
if ($('#from').val() === '') $(this).datepicker('option', 'minDate', 0);                             
         }
       });

</script>