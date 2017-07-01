<?php
session_start();
require_once "scripts/connect_to_mysql.php";

//Determine which page id to use in the query below....

if (!isset($_GET['pid']) || empty($_GET['pid'])) {
	$pageid = '1';
}else {
	$pageid = preg_replace("[^0-9]", "", $_GET['pid']);
}
//Queary the body section
$sqlCommand = "SELECT pagebody FROM pages WHERE id='$pageid' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while ($row = mysqli_fetch_array($query)){
  $body = $row["pagebody"];
  }
  mysqli_free_result($query);

//Queary module data
$sqlCommand = "SELECT modulebody FROM modules WHERE showing='1' AND name='footer' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while ($row = mysqli_fetch_array($query)){
  $footer = $row["modulebody"];
  }
  mysqli_free_result($query);
  
$sqlCommand = "SELECT modulebody FROM modules WHERE showing='1' AND name='custom1' LIMIT 1";
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error());
while ($row = mysqli_fetch_array($query)){
  $custom1 = $row["modulebody"];
  }
  mysqli_free_result($query);

//Build main navagation menu
$sqlCommand = "SELECT id, linklabel FROM pages WHERE showing='1' ORDER BY id ASC"; 
$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error()); 

$menuDisplay = '';
while ($row = mysqli_fetch_array($query)) { 
    $pid = $row["id"];
    $linklabel = $row["linklabel"];
	
	$menuDisplay .= '<a href="index.php?pid=' . $pid . '">' . $linklabel . '</a><br />';
	
} 
  mysqli_free_result($query);
  mysqli_close($myConnection);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700" rel="stylesheet">
<title>EvInk</title>
<style type="text/css">

body {
	//background-image: url(style/EvBG.jpg);
	//background-repeat: repeat-x;
	color:#FFF;
	text-shadow: 0 0 3px black;
	background-color: black;
}

a {
	color: #17efa7;
	text-decoration: none;
	padding: 5px;
        
}
a:visited {
	color: #17efa7;
	text-decoration: none;
}
a:active {
	color: #d81adb;
	text-decoration: none;
}
a:hover {
	color: #d81adb;
	text-decoration:underline;
		}

img.resize {
  width:35%;
  height:auto%;
 // box-shadow: 8px 8px 10px black;
    border-style: inset;
	border: 2px solid;
    border-radius: 50%;
	}
.menuDisplay {
	//border:1px solid white;
    //border-top-left-radius: 25px;
	background-image: url(style/EvBG2.jpg);
	//background-repeat: repeat-x;
	//background-color: #996600;
    //box-shadow: 0 0 12px 1px white;
	background-size: 100%;
	background-repeat: no-repeat;
	font-family: 'Amatic SC', cursive;
	font-size: 18px;
}
.bodyBox {
//	border:1px solid white;
//	border-top-right-radius: 25px;
  //  box-shadow: 0 0 12px 1px white;
 //   background-image: url(style/menubg.png);
  //  background-repeat: repeat-x;
	color:#FFF;
	text-shadow: 0 0 3px black;
}
.footerBox {
//	border:1px solid white;
//	border-bottom-right-radius: 25px;
//    border-bottom-left-radius: 25px;
//    box-shadow: 0 0 12px 1px white;
//	background-image: url(style/menubg2.png);
//	background-repeat: repeat-x;
	
}
.fa {
	
    padding: 20px;
    font-size: 30px;
    width: 50px;
    text-align: center;
    text-decoration: none;
}

@keyframes slidy { 
	0%  { left: 0%; }
	20% { left: 0%; }
	25% { left: -100%; }
	45% { left: -100%; }
	50% { left: -200%; }
	70% { left: -200%; } 
	75% { left: -300%; }
	95% { left: -300%; }
	100% { left: -400%; } 
}
div#slider {
	width: 80%;
	max-width: 1000px;
}

div#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	padding: 0;
	font-size: 0;
	text-align: left;
}
div#slider figure img {
	width: 20%;
	height: auto;
	float: left;
}
div#slider {
	width: 80%;
	max-width: 1000px;
	overflow: hidden; 
}
div#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	padding: 0;
	font-size: 0;
	left: 0;
	text-align: left;
	animation: 30s slidy infinite;  
}
 p img {	
    max-width: 100%;
	height: auto;
	width: auto;
}   
	@media screen and (max-width: 600px) {
		table {
			display: block;
		} 
		td {
			display: block;
			border: none;
		} 
        img {
			didsplay: block;
			margin: 0;
			width: 100%;
			max-width: none;
		}
	    div#slider {
			display: none;
		}
		img.resize {
			width:100%;
            height:auto%;
		    margin-left: 60px;
		}
		.bodyBox {
			background-image: url(style/EvBG2.jpg);
			background-size: 100%;
	        background-repeat: no-repeat;
		}
		.menuDisplay {
			background-image: none;
		}
		
	}


</style>
</head>

<body>

<table width="100%" border="0" align="center" cellpadding="6">
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="8">
     <tr>
      <td colspan="2"><table width="100%" border="0">		
          <tr>
            <td width="50%">
			 <img class="resize" alt="EvInk" src="Logo.jpg" style="display: block;" border="0" /><a href="index.php"></a>
			</td>
			<td width="50%" valign="top" bgcolor="">
			 <?php echo $custom1; ?>
			</td>
          </tr>		 
        </table>
      </td>
     </tr>
      <tr>	  
        <td class="menuDisplay" valign="top" style="max-width=20%; line-height:1.5em;">
		 <?php echo $menuDisplay; ?>
        </td>		  
        <td class="bodyBox" valign="top" bgcolor="" style="max-width:100%; height:400px; overflow: auto; text-decoration: none;">
		 <div>
		  <?php echo $body; ?>
		 </div>          
       	</td>
      </tr>
	 
      <tr>
       <td align="center" class="footerBox" width="100%" colspan="2" bgcolor=""><?php echo $footer; ?></td>
      </tr>
	 
    </table>
	
    <div align="center">&copy;Copyright 2017 Redninja.net</div>
</td>
  </tr>
</table>
<div align="center"><a href="administrator">Admin</a></div><br />
</body>

</html>
