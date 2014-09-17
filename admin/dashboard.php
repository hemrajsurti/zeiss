<?php
include_once("header.php");
$id=$_REQUEST['id'];

if ($_POST['hide']>=1) 
{
	$n=$_POST['hide'];
	executeQuery("delete from user where id='$n'");
}

/*This is for the Publishing Function*/
if ($_POST['val']>=1)
{
	$pub=$_POST['val'];
	$id=$_POST['nor'];

	executeQuery("update user set `publish`='$pub' where id=$id");
}
?>
<script language="javascript" type="text/javascript">
function del(a)
{
 	var x=window.confirm("Do you Want To delete this?")
	if (x)
	{
		document.getElementById('hide').value=a;
		document.form1.submit();
	}	
}
/*Javascript for publishing*/
function unpub(b)
{
	document.getElementById('nor').value=b;
	document.getElementById('val').value=2;
	document.form1.submit();
}
   
function pub(c)
{
	document.getElementById('nor').value=c;
	document.getElementById('val').value=1;
	document.form1.submit();
}
</script>
<div class="container_12">
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="grid_12">
  <div>&nbsp</div>
	<div class="line"></div>
  </div>
  <!-- end .grid_12 -->
  <div class="clear"></div>
  <div class="grid_2">
     <div>&nbsp</div>
  </div>
  <!-- end .grid_2 -->
  <div class="grid_10">
      <div class="inner_title">Users List</div>
      <div>&nbsp</div>

      <!-- Search content Starts -->
      <div class="search_result_content">
      	<div class="grid_12" id="titles"> 
      		<div class="grid_4"><b>Name</b>
      		</div>
      		<div class="grid_4"><b>Email</b>
      		</div>
      		<div class="grid_1"><b>Level</b>
      		</div>
      		<div class="grid_3"><b>Points</b>
      		</div>
      	</div>
      	<div>&nbsp</div>
<?php
$pagenum=$_REQUEST['pagenum'];
if (!(isset($pagenum)))
{
	$pagenum = 1;
}
				
$data = mysql_query("SELECT * FROM user") or die("there is no List yet");
$rows = mysql_num_rows($data);
	
echo "<input  type='hidden' id='pagenum' name='pagenum' value='$pagenum'> ";
$page_rows = 20;
				
$last = ceil($rows/$page_rows);
				
if ($pagenum < 1)
{
	$pagenum = 1;
}
elseif ($pagenum > $last)
{
	$pagenum = $last;
}
$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
//echo "====================================="."SELECT * FROM speaker_master where parent_id='$id' $max";
$data_p = mysql_query("SELECT * FROM user $max");// or die("there is no List yet");
if(!$data_p){
	echo "<p>There is no Users Yet</p>";
	}
$k=1;
while($info = mysql_fetch_array( $data_p ))
{
?>
  <div class="grid_12" id="content"> 
      		<div class="grid_4"><b><a href="#?id=<?php echo $info['id']; ?>"><?php echo $info['name']; ?></a></b>
      		</div>
      		<div class="grid_4"><b><?php echo $info['email']; ?></b>
      		</div>
      		<div class="grid_1"><b>
      		<?php echo $info['level']; ?>
      		</b>
      		</div>
      		<div class="grid_3"><b><?php echo $info['points']; ?></b>
      		</div>
      	</div>    	
<?php
	$k++;	  
}
$home = HOME;
echo "<div class=\"clear\"></div>
<div style='height: 10px;'></div>
<tr><td colspan='6'>&nbsp;</td></tr>
<tr><td colspan='6' align='center'>&nbsp;</td></tr>
<tr><td colspan='6' align='center'><span class=\"pagenav\"> --&nbsp;Page $pagenum of $last&nbsp;-- </span></td></tr>
<tr><td colspan='6' align='center'>";
				
if ($pagenum == 1)
{
	echo "<span class=\"pagenav\"><img src=\"images/bt_previous1.jpg\" alt=\"FIRST\" width=\"22\" height=\"22\" title=\"FIRST\" border=\"0\" /> </span>";
	echo "<span class=\"pagenav\"> <img src=\"images/bt_previous2.jpg\" alt=\"PREVIOUS\" width=\"65\" height=\"22\" title=\"PREVIOUS\" border=\"0\" /> </span>";
}
else
{
	echo "<span class=\"pagenav\"><a href='{$_SERVER['PHP_SELF']}?pagenum=1'><img src=\"images/bt_previous1.jpg\" alt=\"FIRST\" width=\"22\" height=\"22\" title=\"FIRST\" border=\"0\" /></a> </span>";
	$previous = $pagenum-1;
	echo "<span class=\"pagenav\"> <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'><img src=\"images/bt_previous2.jpg\" alt=\"PREVIOUS\" width=\"65\" height=\"22\" title=\"PREVIOUS\" border=\"0\" /></a> </span>";
}
		
echo "<span style=\"font-size:24px; color:#707070;\"> ..... </span>";
		
if ($pagenum == $last)
{
	echo "<span class=\"pagenav\"> <img src=\"images/bt_next2.jpg\" alt=\"FIRST\" width=\"65\" height=\"22\" title=\"FIRST\" border=\"0\" /> </span>";
	echo "<span class=\"pagenav\"> <img src=\"images/bt_next1.jpg\" alt=\"FIRST\" width=\"22\" height=\"22\" title=\"FIRST\" border=\"0\" /></span></td></tr>";
}
else {
	$next = $pagenum+1;
	echo "<span class=\"pagenav\"> <a href='{$_SERVER['PHP_SELF']}?pagenum=$next'><img src=\"images/bt_next2.jpg\" alt=\"FIRST\" width=\"65\" height=\"22\" title=\"FIRST\" border=\"0\" /></a> </span>";
	echo "<span class=\"pagenav\"> <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'><img src=\"images/bt_next1.jpg\" alt=\"FIRST\" width=\"22\" height=\"22\" title=\"FIRST\" border=\"0\" /></a></span></td></tr>";
}
?>
      </div>
      <div class="clear"></div>
      <div class="line_gray"></div>
      <!-- Search content Ends -->
     
      <div class="clear"></div>
      <div class="line_gray"></div>
  </div>

    <input type="hidden" id="hide" name="hide" value="0">
    <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
    <input type="hidden" id="nor" name="nor" value="0">
  <input type="hidden" id="val" name="val" value="0">
</form>
<div class="clear"></div>
</div>
<br><br>
<?php
include_once('footer.php');
?>
