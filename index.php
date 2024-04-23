<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- เรียกใช้ไฟล์สไตล์ชีท -->
    <link href="css/chat_style.css" rel="stylesheet" type="text/css" />
    <link href="css/content_style.css" rel="stylesheet" type="text/css" />
    <link href="css/layout_style.css" rel="stylesheet" type="text/css" />
    <link href="css/menbar_style.css" rel="stylesheet" type="text/css" />
    <link href="css/newspr_style.css" rel="stylesheet" type="text/css" />
    <link href="css/tab_style.css" rel="stylesheet" type="text/css" />
    <link href="css/feedrs_style.css" rel="stylesheet" type="text/css" />
    <!-- เรียกใช้ไฟล์ JavaScript -->
    <script src="includes/all_control.js" type="text/javascript"></script>
    <script src="includes/member_control.js" type="text/javascript"></script>
    <script src="includes/rss_feed.js" type="text/javascript"></script>
    <script src="includes/blog_control.js" type="text/javascript"></script>
    <script src="includes/learning_control.js" type="text/javascript"></script>
    <script src="includes/chat_control.js" type="text/javascript"></script>
    <title>DMSeLearning</title>
</head>

<body>
    <div id="container">
        <!-- โลโก้และป้ายโฆษณาเว็บไซต์ -->
        <div id="divHeader"><img src="images/head.jpg" width="100%" height="67" /></div>
        <div id="divMenuBar" class="hzmenu"></div> <!-- เมนูหลัก -->
        <div id="sidebar">
            <div id="divMember"></div> <!-- สมัครสมาชิก -->
            <div id="divNewsRSS"></div> <!--- รายการหมวดข่าวทันเหตุการณ์ -->
            <div id="divBlogHit"></div> <!--- รายการบทความที่น่าสนใจ -->
        </div>
        <div id="mainContent">
            <div id="divNewsPR"></div> <!-- รายการข่าวประชาสัมพันธ์ -->
            <div id="divContent"></div> <!-- ส่วนแสดงเนื้อหา -->
        </div>
        <br class="clearfloat" />
        <div id="footer">
            <p>&copy;
                <?php
                $startYear = 2023;
                $thisYear = idate('Y');
                if ($startYear == $thisYear) {
                    echo $startYear;
                } else {
                    echo "$startYear-$thisYear";
                }
                ?>
            </p>
        </div>
    </div>
</body>

</html>