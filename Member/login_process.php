<!-- ตรวจสอบการเข้าสู่ระบบ -->
<?php 
include_once("../includes/function.php");
// ตรวจสอบชื่อและรหัสผ่าน
$sql = "SELECT tblusers.UserNmae, tblusers.Role_ID, tblpersonal.Personal_ID FROM tblusers,tblpersonal
WHERE tblusers.UserNmae = tblpersonal.UserName AND tblusers.UserNmae = '".$_POST['txtUserName']."' 
AND tblusers.Password = '".md5($_POST['txtUserName'])."'";
$result = select_data_func($sql);
$num_row = mysqli_num_rows($result);
if($num_row == 1){
    $value = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['ssUserName'] = $value["UserNmae"];
    $_SESSION['ssPerID'] = $value["Personal_ID"];
    $_SESSION['ssRole'] = $value["Role_ID"];
    //Update ข้อมูลระบบของสมาชิก
$sql = "UPDATE tblusers SET LastLoginDate = NOW(), FreqLogin = FreqLogin + 1
WHERE UserNmae = '".$_SESSION['ssUserName']."'";
$result = manage_data_func($sql);
echo "Correct";
}else{
    echo "Incorrect";
}
?>