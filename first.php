<?php
@$name = $_FILES['file']['name'];
@$size = $_FILES['file']['size'];
@$type = $_FILES['file']['type'];
@$tmp_name = $_FILES['file']['tmp_name'];
if (isset($name)) {
    if (!empty($name)) 
    {
    $location = 'uploads/';
    if (move_uploaded_file($tmp_name, $location. $name));
	echo "<script type='text/javascript')>alert('Uploaded');
	window.location = 'http://localhost/kishore/upload.html';</script>";
	
	echo '<script type="text/javascript">'; 
        echo 'alert("uploaded")'; 
        echo 'window.location= "upload.html"';
        echo '</script>'; 
    }
    else 
    {
        echo "<script type='text/javascript'>alert('choose a file');</script>";
    
    }

}
?>