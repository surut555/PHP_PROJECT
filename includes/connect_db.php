<?php 
$mysqli; //ตัวแปรสำหรับเชื่อมต่อฐานข้อมูล
$HostName = "localhost"; //ชื่อเครื่อง Server ที่ใช้บริการ
$UserName = "root"; //ชื่อผู้ใช้ สำหรับติดต่อ Mysql
$Password = ""; //รหัสผ่าน สำหรับติดต่อ Mysql
$Database = "dmselearning"; //ชื่อฐานข้อมูล

//ฟังก์ชันสำหรับเชื่อมต่อฐานข้อมูล
function conn_db_func(){
    global $mysqli;
    global $HostName;
    global $UserName;
    global $Password;
    global $Database;
    $mysqli=mysqli_connect($HostName,$UserName,$Password,$Database)
    or die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้');
    mysqli_query($mysqli,"SET NAMES utf-8");
}

//ฟังก์ชันสำหรับปิดการเชื่อมต่อฐานข้อมูล
function close_db_func(){
    global $mysqli;
    mysqli_close($mysqli);
}