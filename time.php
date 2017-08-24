<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-10" ).datepicker({
                minDate: 0,
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1]
            });
         });
      </script>
   </head>
   
   <body>
      <!-- HTML --> 
      <p>Enter Date: <input type = "text" readonly="readonly" id = "datepicker-10"></p>
   </body>
</html>
