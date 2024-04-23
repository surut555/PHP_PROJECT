<?php 
session_start();
include_once "../includes/function.php";
//Update ข้อมูลเข้าสู่ระบบของสมาชิก
$sql = "UPDATE tblusers SET LastLoginDate = NOW() WHERE UserNmae = '".$_SESSION['ssUserName']."'";
$result = manage_data_func($sql);
unset($_SESSION['ssRole']); //ทำลายตัวแปร Session
unset($_SESSION['ssUserName']);
unset($_SESSION['ssPerID']);
?>