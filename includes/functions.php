<?php
	
	function get_product_name($pid){
		$result=mysql_query("select * from product where id=$pid") or die("select title from product where id=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		$title = $row['title'];
		$sku = $row['sku'];
		if($title=='') {
			$nrow=mysql_fetch_array(mysql_query("select * from product where sku='$sku' and title!=' '"));
			$title=$nrow['title'];
			}
		return $title;
	}
	function get_price($pid){
		$result=mysql_query("select web_price from product where id=$pid") or die("select title from product where id=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['web_price'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

	function random($length = 6)
	{     
    $chars = '0123456789bcdfghjklmnprstvwxzaeiou';
   
    	for ($p = 0; $p < $length; $p++)
    	{
        $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
   	}
   	return $result;
	}
	function orderid($length = 12)
	{     
    $chars = '0123456789bcdfghjklmnprstvwxzaeiou';
   
    	for ($p = 0; $p < $length; $p++)
    	{
        $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
   	}
   	return $result;
	}
	function redirect()
	{
		header('Location: viewdetail.php');
		echo "hi";
	}
?>