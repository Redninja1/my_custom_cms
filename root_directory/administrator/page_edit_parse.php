<?php
// You may want to obtain refering site name that this post came from for security purposes here
// exit the script if it is not from your site and script
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pid = $_POST['pid'];
$pagetitle = $_POST['pagetitle'];
$linklabel = $_POST['linklabel'];
$pagebody = $_POST['pagebody'];
// Filter Function -------------------------------------------------------------------
function filterFunction ($var) { 
    $var = nl2br(htmlspecialchars($var));
    $var =  str_replace("'", "&#39;", $var);
    $var =  str_replace("`", "&#39;", $var);		
    return $var; 
} 
$pagetitle = filterFunction($pagetitle);
$linklabel = filterFunction($linklabel);
$pagebody = filterFunction($pagebody);
// End Filter Function --------------------------------------------------------------
include_once "../scripts/connect_to_mysql.php";
// Add the updated info into the database table
	if (isset($_POST['pagebody'])){
	$pagebody = $_POST['pagebody'];		
			
        $query = mysqli_query($myConnection, "UPDATE pages SET pagetitle='$pagetitle', linklabel='$linklabel', pagebody='$pagebody', lastmodified='now()' WHERE id='$pid'") or die (mysqli_error($myConnection));
            if($query){
				echo 'Operation Completed Successfully! <br /><br /><a href="index.php">Click Here</a>';
            }
            else
			{
				echo 'Not Added to DB';
			}
		}
	exit();
?>