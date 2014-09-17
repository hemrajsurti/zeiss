<?php
	error_reporting(E_ALL - (E_NOTICE + E_WARNING));
	session_start();
	if (isset($_SESSION['user'])){
		// echo "Welcome,".$_SESSION['user']."<br /> [ <a href=\"ops_logout.php\">Logout</a> ]";
	}else{
		// echo "You are not authorized into this page!";
		header( "refresh:5;url=ops_login.php?success=-1&message=Session Expired" );
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Create Event</title>
<script>
function validateFields(form) {
	var flag = true;
	
	var menu_item_name = document.getElementById("event_name").value;
	if (menu_item_name == "")
	{
		alert("Event Name is required.");
		document.getElementById("event_name").focus();
		flag = false;
		return false;
	}
	var menu_item_price = document.getElementById("event_date").value;
	if (menu_item_price == "")
	{
		alert("Event date is required.");
		document.getElementById("event_date").focus();
		flag = false;
		return false;
	}
	var menu_item_desc = document.getElementById("event_desc").value;
	if (menu_item_desc == "")
	{
		alert("Event desc is required.");
		document.getElementById("event_desc").focus();
		flag = false;
		return false;
	}
	var eta = document.getElementById("event_venue").value;
	if (eta == "")
	{
		alert("Venue is required.");
		document.getElementById("event_venue").focus();
		flag = false;
		return false;
	}
	alert(flag);
	if(flag == true) {
		form.submit();
	}
}
</script>

</head>

<body>
<div id="wrapper">
	<div id="header">	
			<div class="logo">
				<img src="images/logo.png" alt="OPS">
			</div>
			
			<div class="user_logout_box">	
				<span><a href="logout.php">SignOut</a></span>   
			</div>
			
			<div class="user_status_box">
				<span>Welcome <?php echo $_SESSION['user']?></span>
			</div>
			
	</div><!-- #header -->
	
	<div id="content">
		<div class="tablebox">
			<div class="tableheader">
				<span>Create Event</span>
			</div>
			
			<div class="tablestyle">
				<form id='menuForm' action='create_event_action.php' method='post' enctype='multipart/form-data' accept-charset='UTF-8'>
				<fieldset  style="border:0px;">
					<div>
						<input type='text' name='event_name' id='event_name' maxlength="50" placeholder="Event Name"/>
					</div>
					
					<div>
						<textarea placeholder="Event Description" id="event_desc" name="event_desc" rows="5" cols="25"></textarea>
					</div>
					
					<div>
						<input type="file" id="eventPhoto" name="eventPhoto" placeholder="Select Photo"/>
					</div>
					
					<div>
						<input type='text' name='event_date' id='event_date' maxlength="50" placeholder="Date"/>
					</div>
					
					<div>
						<input type='text' name='event_venue' id='event_venue' maxlength="50" placeholder="Venue"/>
					</div>
					
					<div>
						<button value="Add Event" id="btnAdd" name="btnSubmit" onclick="return validateFields(this.form);">Create</button>
					</div>
				</fieldset>
			</form> <!-- #form -->
			</div>
		</div>
	</div><!-- Content -->
	
	
	<div id="footer"></div><!-- #footer -->
</div>
</body>
</html>
