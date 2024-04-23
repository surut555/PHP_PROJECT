<?php 
include_once("../includes/function.php");
// ตรวจสอบชื่อและรหัสผ่าน
$sql = "SELECT tblusers.UserNmae, tblusers.Role_ID, tblpersonal.Personal_ID FROM tblusers,tblpersonal
WHERE tblusers.UserNmae = tblpersonal.UserName AND tblusers.UserNmae = '".$s_POST['txtUserName']."' 
AND tblusers.Password = '".md5($s_POST['txtUserName'])."' ";
?>