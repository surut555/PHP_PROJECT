//ฟังก์ชันสำหรับตรวจสอบให้ป้อนข้อมูล
function isEmpty(elem, helperMsg){
    if(elem.value.length == 0){
        alert(helperMsg); 
        elem.focus(); 
        return false;
    }else{
        return true;
    }
}
//ฟังก์ชันสำหรับตรวจสอบข้อมูลที่เป็นตัวเลข
function isNumeric(elem, helperMsg){
    var numericExpression =/^[0-9]+$/;
    if(elem.value.match(numericExpression)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
//ฟังก์ชันสำหรับตรวจสอบข้อมูลที่เป็นตัวอักษร
function isAlphabet(elem, helperMsg){
    var alphaExp = /^[a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
//ฟังก์ชันสำหรับตรวจสอบข้อมูลที่เป็นตัวเลขและตัวอักษร
function isAlphanumeric(elem, helperMsg){
    var alphaExp = /^[0-9a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus()
        return false;
    }
}
//ฟังก์ชันสำหรับตรวจสอบความยาวของข้อมูล
function lengthRestrtiction(elem, descript, min, max){
    var uInput = elem.value;
    if(uInput.length >= min && uInput.length <= max){
        return true;
    }else{
        alert("กรุณากรอก"+descript+"ความยาว"+min+"-"+max+"ตัวอักษร");
        elem.focus();
        return false;
    }
}
//ฟังก์ชันสำหรับตรวจสอบการเลือก List/Menu
function madeSelection(elem, helperMsg){
    if(elem.value == "0"){
        alert(helperMsg);
        elem.focus();
        return false;
    }else{
        return true;
    }
}
//ฟังก์ชันสำหรับตรวจสอบรูปแบบของอีเมล์
function emailValidator(elem, helperMsg){
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
    if(elem.value.match(emailExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
//ฟังก์ชันสำหรับเปิดหน้าต่างใหม่เป็น Popup Window
function PopUpWindow(theURL, winName, features){
    window.open(theURL,winName,features);
}