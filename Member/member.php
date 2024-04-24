<?php 
//แสดงเมนูหลักตามสิทธิ์การใช้งานของ Member
session_start();
switch($_SESSION['ssRole']){
case "1": //กรณีเป็นผู้ดูแลระบบ
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member</title>
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
                        ผู้ดูแลระบบ
                    </a>
                    <a href="#" class="list-group-item list-group-item-action"onclick="getMethod('Useful/course_show.php')">หน้าแรก</a>
                    <a href="#" class="list-group-item list-group-item-action"onclick="showFormManageUser();">สมาชิก</a>
                    <a href="#" class="list-group-item list-group-item-action"onclick="showFormManageNews('tabPR');">ข่าว</a>
                    <a href="#" class="list-group-item list-group-item-action">บล็อก</a>
                    <a href="Blog/articlelnsert.php" class="list-group-item list-group-item-action">สร้างบทความ</a>
                    <a href="#" class="list-group-item list-group-item-action">อีเลอร์นนิ่ง</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/allcourse_show.php')">ครบหลักสูตร</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Management/adminCourseGroup_manage.php')">หลักสูตรวิชา</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/adminAllow_regis.php')">อนุมัตินักเรียน</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/adminReport.php')">รายงานสรุป</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethodChat('room_show.php')">สนทนา</a>
                </div>
            </div>
            <div class="col-md-9">
            </div>
        </div>


    <?php 
break;
case "2": //กรณีเป็นนักเรียน?> 

        <div class="row">
            <div class="col-md-12"> <br>

            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        นักเรียน
                    </a>
                    <a href="#" class="list-group-item list-group-item-action"onclick="getMethod('Useful/course_show.php')">หน้าแรก</a>
                    <a href="#" class="list-group-item list-group-item-action">บล็อก</a>      
                    <a href="#" class="list-group-item list-group-item-action" onclick="showBlogList('Art_Title')">บทความ</a>      
                    <a href="Blog/articlelnsert.php" class="list-group-item list-group-item-action">สร้างบทความ</a>
                    <a href="#" class="list-group-item list-group-item-action">อีเลอร์นนิ่ง</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/stuCourse_regis.php')">ลงทะเบียน</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/stuReport.php')">ผลการเรียน</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethodChat('room_show.php')">สนทนา</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="showFormContactUs()">ติดต่อเรา</a>
                </div>
            </div>
            <div class="col-md-9">
            </div>
        </div>
<?php 
break;
case "3":
 ?>
<div class="row">
            <div class="col-md-12"> <br>

            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        ครูผู้สอน
                    </a>
                    <a href="#" class="list-group-item list-group-item-action"onclick="getMethod('Useful/course_show.php')">หน้าแรก</a>
                    <a href="#" class="list-group-item list-group-item-action">บล็อก</a>      
                    <a href="#" class="list-group-item list-group-item-action" onclick="showBlogList('Art_Title')">บทความ</a>      
                    <a href="Blog/articlelnsert.php" class="list-group-item list-group-item-action">สร้างบทความ</a>
                    <a href="#" class="list-group-item list-group-item-action">อีเลอร์นนิ่ง</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/allcourse_show.php')">คลังหลักสูตร</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Management/teachCourse_manage.php')">หลักสูตรวิชา</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/teachExam.php')">ตรวจข้อสอบ</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethod('Useful/teachReport.php')">รายงานสรุป</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="getMethodChat('room_show.php')">สนทนา</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="showFormContactUs()">ติดต่อเรา</a>
                </div>
            </div>
            <div class="col-md-9">
            </div>
        </div>
<?php 
break;

default: //กรณีผู้ใช้งานทั่วไป
?>
<div class="row">
            <div class="col-md-12"> <br>

            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        ผู้ใช้งานทั่วไป
                    </a>
                    <a href="#" class="list-group-item list-group-item-action"onclick="getMethod('Useful/course_show.php')">หน้าแรก</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="showFormRegis()">สมัครสมาชิก</a>      
                    <a href="#" class="list-group-item list-group-item-action" onclick="showBlogList('Art_Title')">บล็อก</a>      
                    <a href="#" class="list-group-item list-group-item-action" onclick="showFormContactUs()">ติดต่อเรา</a>
                </div>
            </div>
            <div class="col-md-9">
            </div>
        </div>
    </div>
<?php 
break;
} 
?>

    <script src="../bootstrap/js/jquery.slim.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>