<?php
include_once '../includes/function.php';
$encrype_pwd = md5($_POST['txtPwd']); //เข้ารหัส รหัสผ่าน
$encrype_ans = base64_encode(trim($_POST['txtAnswer'])); //เข้ารหัส คำตอบ
//ตรวจสอบว่าชื่อผู้ใช้ว่าซ้ำหรือไม่
$sqlUser = "SELECT * FROM tblusers WHERE UserName ='" . $_POST['txtUser'] . "'";
$valueUser = select_data_func($sqlUser);
$numUser = mysqli_num_rows($valueUser);
if ($numUser == 0) { //ถ้าชื่อผู้ใช้ไม่ซ้ำ ตรวจสอบอีเมล์ว่าซ้ำหรือไม่
    $sqlMail = "SELECT UserName, Email FROM tblusers WHERE Email = '" . $_POST['txtEmail'] . "'";
    $valueMail = select_data_func($sqlMail);
    $numEmail = mysqli_num_rows($valueMail);
    if ($numEmail == 0) { //ถ้าอีเมล์ไม่ซ้ำ
        //เพิ่มข้อมูลลงในตาราง "tblusers"
        $sqlUser = "INSERT INTO tblusers (UserNmae,Password,Email,Question,Answer,CreateDate,Role_ID)VALUES
(
    '" . $_POST['txtUser'] . "',
    '$encrype_pwd','" . $_POST['txtEmail'] . "',
    '" . $_POST['listQuestion'] . "',
    '$encrype_ans',NOW(),'2')";

        $affectUser = manage_data_func($sqlUser);
        //เพิ่มข้อมูลลงในตาราง "tblpersonal"
        $sqlPer = "INSERT INTO tblpersonal(UserName,FirstNmae,LastName,Address,Amphur,Province,ZipCode,Mobille,Phone)
VALUES
(
    '" . $_POST['txtUser'] . "',
    '" . $_POST['txtAnswer'] . "',
    '" . $_POST['txtAmphur'] . "',
    '" . $_POST['txtFirstName'] . "',
    '" . $_POST['txtLastName'] . "',
    '" . $_POST['txtAddress'] . "',
    '" . $_POST['txtAmphur'] . "',
    '" . $_POST['listProvince'] . "',
    '" . $_POST['txtZipCode'] . "',
    '" . $_POST['txtMobile'] . "',
    '" . $_POST['txtPhone'] . "'
)
";
        $affectPer = manage_data_func($sqlPer);
        if ($affectUser > 0 && $affectPer > 0) { //แสดงผลการสมัครสมาชิก
            $msg = msg_func(
                "ผลการสมัครสมาชิก",
                "ยินดีต้อนรับคุณ" . $_POST['txtUser'] . "เป็นสมาชิกเว็บไซต์ DMSeLearning"
            );
        }
    } else { //กรณีที่อีเมล์ซ้ำ จะแจ้งแก่ผู้ใช้
        $msg = "repeat_email";
    }
} else { //กรณีที่ชื่อผู้ใช้ซ้ำ จะแจ้งแก่ผู้ใช้
    $msg = "repeat_user";
}
echo $msg;
