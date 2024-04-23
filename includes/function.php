<?php  require("connect_db.php");
//ฟังก์ชันสำหรับ Select ข้อมูล
function select_data_func($sqlSelect){ //รับพารามิเตอร์เป็นคำสั่ง SQL สำหรับดึงข้อมูล
global $mysqli; //เรียกใช้ตัวแปร mysql ที่ประกาศไว้ในไฟล์ connect_db.php
conn_db_func(); //เรียกใช้ฟังก์ชัน conn_db_func() ที่อยู่ในไฟล์ connect_db.php
$result = mysqli_query($mysqli,$sqlSelect) or die(mysqli_error($mysqli)); //คิวรีฐานข้อมูล
close_db_func(); //เรียกใช้ฟังก์ชัน close_db_func ที่อยูในไฟล์ connect_db.php
return $result; //คืนค่าเป็น Object
}

//ฟังก์ชันสำหรับ insert, Update และ Delete
function manage_data_func($sql){
    global $mysqli; 
    conn_db_func();
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    $affect = mysqli_affected_rows($mysqli); //จำนวนที่มีการเปลี่ยนแปลง
    close_db_func();
    return $affect; //คืนค่าเป็นจำนวนแถวที่มีการเปลี่ยนแปลง ,ค่า Default เป็น 0
}

//ฟังก์ชันสำหรับตรวจสอบข้อมูลก่อนที่จะ insert 
function insert_data_func($sqlSelect, $sqlinsert){
    global $mysqli; 
    conn_db_func();
    $result_se = mysqli_query($mysqli,$sqlinsert) or die(mysqli_error($mysqli)); //select ข้อมูลซ้ำหรือไม่
    $num_row = mysqli_num_rows($result_se);
    if($num_row == 0){ //ถ้าไม่ซ้ำ จึงจะ insert ช้อมูลได้
        $result_inst = mysqli_query($mysqli,$sqlinsert) or die(mysqli_error($mysqli));
        $affect = mysqli_affected_rows($mysqli);
        close_db_func();
        return $affect;
    }
    
}

//ฟังก์ชันสำหรับ Insert โดยคืนค่า ID ที่ Insert ด้วย 
function insert_returnid_func($sqlinsert,$sqlSelect){
    global $mysqli; 
    conn_db_func();
    $result_se = mysqli_query($mysqli,$sqlinsert) or die(mysqli_error($mysqli)); //Insert ข้อมูลก่อน
    $affect = mysqli_affected_rows($mysqli);
    if($affect > 0){//ถ้า insert ข้อมูลได้ จะคิวรี ID ข้อมูลนั้น
        $result = mysqli_query($mysqli,$sqlSelect) or die(mysqli_error($mysqli)); //คิวรีฐานข้อมูล
        close_db_func();
        return $affect; //คืนค่าเป็น ID ของข้อมูลที่ insert
    }
}

//ฟังก์ชันสำหรับตรวจสอบข้อมูลที่จะ Delete
function delete_data_func($ID, $table, $field){//คืนค่าเป็น true หรือ false เท่านั้น
    global $mysqli; //เรียกใช้ตัวแปร mysql ที่ประกาศไว้ในไฟล์ connect_db.php
    conn_db_func();
    $sqlSelect = "SELECT * FROM $table WHERE $field = '$ID'";
    $result = mysqli_query($mysqli,$sqlSelect) or die(mysqli_error($mysqli)); //คิวรีฐานข้อมูล
    $num_row = mysqli_num_rows($result);
    if($num_row == 0){
        close_db_func();
        return true;
    }elseif($num_row > 0) { //ถ้ามีข้อมูล ก็จะลบข้อมูลนั้น
        $sqlDelete = "DELETE FROM $table WHERE $field = '$ID'";
        $result = mysqli_query($mysqli,$sqlDelete) or die(mysqli_error($mysqli)); 
        $affect = mysqli_affected_rows($mysqli);
        close_db_func();
        if($affect > 0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

//ฟังก์ชันสำหรับกำหนด ID โดยอ่านค่าตัวเลขจากไฟล์
function gen_id_func($filename,$prefix){
    $fp = fopen($filename, "r"); //เปิดไฟล์เพื่ออ่าน
    $count = fgets($fp) +1; //นำค่ามาบวก
    fclose($fp);
    //ID มีความยาวจำนวน 6 ตัวอักษร, 2 ตัวแรก เป็นตัวอักษร ส่วน 4 ตัวหลังเป็นตัวเลข เช่น BP001
    switch(strlen($count)){
        case 1 : $id = $prefix."000".$count; break;
        case 2 : $id = $prefix."00".$count; break;
        case 3 : $id = $prefix."0".$count; break;
        case 4 : $id = $prefix.$count; break;
    }
    $fp = fopen($filename,'w'); //เปิดไฟล์เพื่อเขียน
    fwrite($fp,$count);
    fclose($fp);
    return $id;
}
//ฟังก์ชันสำหรับแปลงวันที่จากฐานข้อมูล (Date, DateTime, TimeStamp) มาแสดงแบบไทย
function convert_date_func($strDate, $mode, $type){
    $month_key = array("01","02","03","04","05","06","07","08","09","10","11","12");
    $month_full = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน",
                        "ตุลาคม","พฤศจิกายน","ธันวาคม");
    $month_short = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $dYear = substr($strDate,0,4); //รูปแบบวันที่ Y-m-d H:i:s
    $dMonth = substr($strDate,5,2);
    $dDay = substr($strDate,8,2);
    if($dYear < 2550){$dYear +=543;}
    switch($mode){
        case 'full': //วันที่ 12 เดือนเมษายน พ.ศ. 2567
            $thMonth = array_combine($month_key, $month_full);
            $new_date = "วันที่".$dDay."เดือน".$thMonth[$dMonth]."พ.ศ.".$dYear;
            break;
        case 'short': // 12 เม.ย. 67
            $thMonth = array_combine($month_key,$month_short);
            $new_date =$dDay."".$thMonth[$dMonth]."".substr($dYear,2,2);
            break;
        case 'digit': //12/08/2566
            $new_date = $dDay."/".$dMonth."/".$dYear;
            break;
    }
    if($type == "datatime"){//กรณีระบุเวลา
    $dTime = substr($strDate,11,8);
    $new_date = $new_date."".$dTime."น";
    }
    return $new_date;
}
//ฟังก์ชันสำหรับแสดงผลการทำงาน
function msg_func($title, $msg){
    $result = "<table class = 'cssTable' align = 'center'>";
    $result .= "<tr class = 'cssTitle'><td>".$title."</td></tr>";
    $result .= "<tr class = 'cssContent cssFontMsg'><td align = 'center'>".$msg."</table>";
    return $result;
}
//แปลงตัวเลขเดือน เป็นชื่อเดือนภาษาไทย
function thaimonth_func($dMonth){
    switch($dMonth){
        case '01' : $tMonth = "มกราคม";
        break;
        case '02' : $tMonth = "กุมภาพันธ์";
        break;
        case '03' : $tMonth = "มีนาคม";
        break;
        case '04' : $tMonth = "เมษายน";
        break;
        case '05' : $tMonth = "พฤษภาคม";
        break;
        case '06' : $tMonth = "มิถุนายน";
        break;
        case '07' : $tMonth = "กรกฎาคม";
        break;
        case '08' : $tMonth = "สิงหาคม";
        break;
        case '09' : $tMonth = "กันยายน";
        break;
        case '10' : $tMonth = "ตุลาคม";
        break;
        case '11' : $tMonth = "พฤศจิกายน";
        break;
        case '12' : $tMonth = "ธันวาคม";
        break;
    }
    return $tMonth;
}
//ตัวแปรอะเรย์เก็บรายชื่อจังหวัด
$province = array(1 => "กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น",
"จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก",
"นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส",
"น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง",
"พิจิตร","พิษณุโลก","เพชรบุรี","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","บึงกาฬ","แม่ฮ่องสอน",
"ยโยธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ",
"สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสาคร","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี",
"สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำพู","อ่างทอง","อำนาจเจริญ",
"อุดรธานี","อุตรดิสถ์","อุทัยธานี","อุบลราชธานี");