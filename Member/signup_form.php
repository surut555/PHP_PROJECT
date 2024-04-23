<?php
include_once '../includes/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, follow">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/roboto-font.css">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="form-v5">
    <!-- <div class="container">
</div> -->
    <div class="page-content">
        <div class="form-v5-content">
            <form id="frmRegis" class="form-detail" action="Member/signup_process.php" method="post">
                <h3 class="text-center">สมัครสมาชิก</h3>
                <div class="form-row">
                    <label for="full-name">ชื่อผู้ใช้ </label>
                    <input type="text" name="txtUser" id="full-name" class="input-text"
                        placeholder="ชื่อผู้ใช้งานเป็นภาษาอังกฤษความยาว 4 -25 ตัวอักษร" required maxlength="25">
                </div>
                <div class="form-row">
                    <label for="txtPwd">รหัสผ่าน</label>
                    <input type="password" name="txtPwd" id="txtPwd" class="input-text"
                        placeholder="รหัสผ่านความยาว 4 -25 ตัวอักษร" required maxlength="25">
                </div>
                <div class="form-row">
                    <label for="password">ยืนยันรหัสผ่าน</label>
                    <input type="password" name="txtConfirmPwd" id="txtConfirmPwd" class="input-text"
                        placeholder="รหัสผ่านต้องตรงกัน" required maxlength="25">
                </div>
                <div class="form-row">
                    <label for="txtEmail">อีเมล์</label>
                    <input type="text" name="txtEmail" id="your-email" class="input-text"
                        placeholder="ตัวอย่าง someone@gmail.com" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                        maxlength="100">
                </div>
                <div class="form-row-select">
                    <label for="listQuestion">คำถาม</label>
                    <select class="form-control form-control-md" name="listQuestion">
                        <option value="0">กรุณาเลือกคำถาม</option>
                        <option value="ชื่อเล่นของคุณ">ชื่อเล่นของคุณ</option>
                        <option value="สัตว์เลี้ยงตัวโปรด">สัตว์เลี้ยงตัวโปรด</option>
                    </select>
                </div><br>
                <p>เลือกคำถาม สำหรับกรณีลืมรหัสผ่าน</p>
                <div class="form-row">
                    <label for="txtAnswer">คำตอบ </label>
                    <input type="text" name="txtAnswer" id="txtAnswer" class="input-text" placeholder="คำตอบของคุณ"
                        required maxlength="50">
                </div>
                <div class="form-row">
                    <label for="txtFirstName">ชื่อ </label>
                    <input type="text" name="txtFirstName" id="txtFirstName" class="input-text" placeholder="ชื่อของคุณ"
                        required maxlength="50">
                </div>
                <div class="form-row">
                    <label for="txtLastName">นามสกุล </label>
                    <input type="text" name="txtLastName" id="txtLastName" class="input-text"
                        placeholder="นามสกุลของคุณ" required maxlength="50">
                </div>
                <div class="form-row">
                    <label for="txtAddress">ที่อยู่ </label>
                    <textarea type="text" name="txtAddress" id="txtAddress" class="form-control" cols="25" rows="3"
                        placeholder="ที่อยู่ของคุณ" required style="width: 95%; resize: none;"></textarea>
                </div>
                <div class="form-row">
                    <label for="txtAmphur">อำเภอ </label>
                    <input type="text" name="txtAmphur" id="txtAmphur" class="input-text" placeholder="อำเภอของคุณ"
                        required maxlength="50">
                </div>
                <div class="form-row-select">
                    <label for="listProvince">จังหวัด</label>
                    <select class="form-control form-control-md" name="listProvince">
                        <option value="0" select="select">--กรุณาเลือกจังหวัด--</option>
                        <?php
                        for ($i = 1; $i <= 77; $i++) { ?>
                        <option value="<?= $province[$i]; ?>"> <?= $province[$i]; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-row">
                    <label for="txtZipCode">รหัสไปรษณีย์ </label>
                    <input type="text" name="txtZipCode" id="txtZipCode" class="input-text"
                        placeholder="เฉพาะตัวเลข 5 หลักเท่านั้น" required maxlength="5">
                </div>
                <div class="form-row">
                    <label for="txtMobile">เบอร์โทร </label>
                    <input type="text" name="txtMobile" id="txtMobile" class="input-text" placeholder="เบอร์โทรของคุณ"
                        required maxlength="20">
                </div>
                <div class="form-row">
                    <label for="txtPhone">เบอร์โทรอื่นๆ </label>
                    <input type="text" name="txtPhone" id="txtPhone" class="input-text" placeholder="เบอร์โทรอื่นๆ"
                        required maxlength="50">
                </div>
                <div class="form-row-last">
                    <input type="submit" class="register" value="สมัครสมาชิก">
                    <input type="reset" class="reset" value="ล้างข้อมูล">
                </div>

            </form>
        </div>
    </div>


    <script src="../bootstrap/js/jquery.slim.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/googletagmanager.js"></script>
</body>

</html>