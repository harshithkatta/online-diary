<!DOCTYPE html>
<html>
<body onload="getDate()">


Date: <input type="text" id="frmDate">

<script>


function getDate(){
   var todaydate = new Date();
   var day = todaydate.getDate();
   var month = todaydate.getMonth() + 1;
   var year = todaydate.getFullYear();
   var datestring = day + "-" + month + "-" + year;
   document.getElementById("frmDate").value = datestring;
  } 
</script>
</body>
</html> 