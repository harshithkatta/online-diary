<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>diary</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="getDate()"  >

	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
			
		<?php endif ?>
		<table>
    Date: <input type="text" id="myDate">
    <tr><td>Text to Save:</td></tr>
    <tr>
        <td colspan="3">
            <textarea id="inputTextToSave" cols="55" rows="25"></textarea>
        </td>
    </tr>
    <tr>
        <td action="first.php" method="POST" enctype="multipart/form-data"><button onclick="save()">Save</button></td>
    </tr>
</table>
<script>
function save()
{
    var textToSave = document.getElementById("inputTextToSave").value;
    var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
    var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
    var fileNameToSaveAs = document.getElementById("myDate").value;
 // save in a folder with the name of the user
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "C:\\xampp\\htdocs\\registration\\diary";
    downloadLink.href = textToSaveAsURL;
    downloadLink.onclick = destroyClickedElement;
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
 
    downloadLink.click();
}

function getDate(){
   var todaydate = new Date();
   var day = todaydate.getDate();
   
   var month = todaydate.getMonth() + 1;
   
   var year = todaydate.getFullYear();
   var datestring = day + "-" + month + "-" + year;
   document.getElementById("myDate").value = datestring;
  }
 
function destroyClickedElement(event)
{
    document.body.removeChild(event.target);
}
</script>
	</div>
		
</body>
</html>
