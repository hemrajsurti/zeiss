<?php
include_once('header.php');

$id = $_REQUEST['id'];

if($id!="")
{
	$q=mysql_fetch_array(mysql_query("select * from event where id=$id"));
	
	$title=$q[1];
	$desc=$q[2];
	$image=$q[3];
	$date=$q[4];
	$place=$q[5];
	
	$tmpString = str_replace("'", "&#39;", $desc);
	$tmpString = str_replace("\n", "", $tmpString);
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	$desc = str_replace('"', '\"', $tmpString);

}	

if(isset($_POST['submit']))
{
	$target_path = "eventimg/";
  	$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
  	
   $title=$_POST['title'];
   $desc=$_POST['desc'];
   $date=$_POST['date'];
	$place=$_POST['place'];
   
   $tmpString = str_replace("'", "&#39;", $title);
	$tmpString = str_replace("\n", "", $tmpString);
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	$title = str_replace('"', '\"', $tmpString);
   
	$tmpString = str_replace("'", "&#39;", $desc);
	$tmpString = str_replace("\n", "", $tmpString);
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	$desc = str_replace('"', '\"', $tmpString);
	
	$flag=true;

if($title!="")
{
    if($id=="")
		{
			 if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
			{
				executeQuery("insert into event (`title`, `desc`, `image`, `date`, `place`, `flag`) values ('$title','$desc','$target_path','$date','$place','$flag')");
				echo "<script type=\"text/javascript\">window.location='dashboard.php'</script>"; 
			}
			
			else
			{
				executeQuery("insert into event (`title`,`desc`,`date`,`place`,`flag`) values ('$title','$desc','$date','$place','$flag')");
				echo "<script type=\"text/javascript\">window.location='dashboard.php'</script>"; 
			} 
		}
	else 
		{
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
			{
				executeQuery("update event set `title`='$title',`desc`='$desc',`image`='$target_path',`date`='$date',`place`='$place',`flag`='$flag' where id=$id");
				echo "<script type=\"text/javascript\">window.location='dashboard.php'</script>";
			}
			
			else
			{
				executeQuery("update event set `title`='$title',`desc`='$desc',`date`='$date',`place`='$place',`flag`='$flag' where id=$id");
				echo "<script type=\"text/javascript\">window.location='dashboard.php'</script>";
			}
		}
} else { header("Location: event.php"); } // If validation ends here

}

?>

<form name="form1" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return submitForm();">
<ul>
<li><label for="username" class="styled">Title:</label>
				<input type="text" name="title" id="title" class="inputbox" value="<?php echo $title;?>"></li>
<div>&nbsp</div>
<li><label for="username" class="styled">Description:</label>
				<textarea id="desc" name="desc" style="width:550px; height:500px;"><?php echo $desc;?></textarea></li>
<div>&nbsp</div>
<li><label for="username" class="styled">Date:</label>
				<input type="text" name="date" id="date" class="inputbox" value="<?php echo $date;?>"></li>
<div>&nbsp</div>
<li><label for="username" class="styled">Place:</label>
				<input type="text" name="place" id="place" class="inputbox" value="<?php echo $place;?>"></li>
<div>&nbsp</div>
<li><label for="username" class="styled">Image:</label>
				<input name="uploadedfile" type="file" /></li>
<div>&nbsp</div>
<li>
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
<input type="submit" name="submit" value="Submit" class="button_sts green">
<input type="button" name="back" value="Back" class="button_sts green" onClick="javascript:window.location='dashboard.php'" style="margin-left:20px;">
</li>
</ul>
</form>
			
<?php
include_once('footer.php');
?>