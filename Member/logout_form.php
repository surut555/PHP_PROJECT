<?php 
//ตรวจสอบสิทธิ์การใช้งาน
if($_SESSION['ssRole'] == 1){
    $right .= 'ผู้ดูแลระบบ';
}elseif($_SESSION['ssRole'] == 2){
    $right .= 'นักเรียน';
}elseif($_SESSION['ssRole'] == 3){
    $right .= 'ครูผู้สอน';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยินดีต้อนรับ</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
</head>

<body>
<div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                   
                </div>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            ข้อมูลส่วนตัว
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" 
                        onclick="showFormChangePwd(); return false">เปลี่ยนรหัสผ่าน</a>
                        <a href="#" class="list-group-item list-group-item-action" 
                        onclick="showformEditProfile(); return false">แก้ไขข้อมูลส่วนตัว</a>
                        <a href="logout_process.php" class="list-group-item list-group-item-danger" 
                        onclick="return confirm('ยืนยันการออกจากระบบ');">ออกจากระบบ</a>
                    </div>
                </div>
                <div class="col-md-9">
                    
                    <h5 class="text-center">สวัสดีคุณ <?= $_SESSION['ssUserName'];?></h5>
                </div>
            </div>
        </div>







<script src="../bootstrap/js/jquery.slim.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>